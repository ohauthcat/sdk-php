<?php

declare(strict_types=1);

namespace OhAuthCat;

use OhAuthCat\Generated\Resources;
use OhAuthCat\Generated\Routes;

/**
 * The OhAuthCat server SDK. Every v1 operation is on a resource group, for example
 * $client->organizations->getOrganization('org_...'). Responses are decoded JSON arrays.
 */
final class OhAuthCatClient extends Resources
{
    public const VERSION = '0.0.2';

    public readonly string $apiBaseUrl;
    public readonly string $authBaseUrl;
    public readonly SsoHelpers $ssoHelpers;
    public readonly PasskeyHelpers $passkeyHelpers;
    /** Edge failover state (see Standby). */
    public readonly Standby $standby;
    private readonly HttpTransport $transport;
    /** @var \Closure(float): void */
    private readonly \Closure $sleeper;

    /** @param (callable(float): void)|null $sleeper waits between retries (seconds). */
    public function __construct(
        public readonly string $apiKey,
        public readonly ?string $clientId = null,
        string $apiBaseUrl = 'https://api.ohauthcat.com',
        string $authBaseUrl = 'https://auth.ohauthcat.com',
        public readonly ?string $apiVersion = null,
        public readonly float $timeout = 30.0,
        public readonly int $maxRetries = 2,
        public readonly int $maxPages = 1000,
        ?HttpTransport $transport = null,
        ?callable $sleeper = null,
        ?bool $standby = null,
        ?string $standbyApiBaseUrl = null,
        ?string $standbyAuthBaseUrl = null,
        int $standbyThreshold = 3,
        float $standbyCooldown = 60.0,
        ?callable $clock = null,
    ) {
        if (trim($apiKey) === '' || !self::headerText($apiKey)) {
            throw new \InvalidArgumentException('apiKey is required');
        }
        if ($clientId !== null && (!str_starts_with($clientId, 'pk_') || \strlen($clientId) <= 3 || !self::headerText($clientId))) {
            throw new \InvalidArgumentException('clientId must be a publishable key (pk_...)');
        }
        if ($apiVersion !== null && preg_match('/\A1\.[0-9]+\z/', $apiVersion) !== 1) {
            throw new \InvalidArgumentException('apiVersion must look like 1.N');
        }
        if ($timeout <= 0 || $maxRetries < 0 || $maxRetries > 10 || $maxPages < 1) {
            throw new \InvalidArgumentException('timeout, maxRetries or maxPages out of range');
        }
        $this->apiBaseUrl = self::base($apiBaseUrl);
        $this->authBaseUrl = self::base($authBaseUrl);
        $this->transport = $transport ?? new StreamTransport();
        $this->sleeper = $sleeper === null ? static function (float $s): void {
            usleep((int) ($s * 1_000_000));
        } : \Closure::fromCallable($sleeper);
        $this->standby = new Standby($this->apiBaseUrl, $this->authBaseUrl, $standby, $standbyApiBaseUrl, $standbyAuthBaseUrl, $standbyThreshold, $standbyCooldown, $clock);
        $this->ssoHelpers = new SsoHelpers($this);
        $this->passkeyHelpers = new PasskeyHelpers($this);
        $this->initResources($this);
    }

    /** Webhook verification helpers. */
    public function webhooks(): string
    {
        return Webhooks::class;
    }

    /**
     * Sends one operation by name. Generated resource methods call this.
     *
     * @param list<string> $path
     * @param array<string, mixed> $query
     */
    public function request(string $operation, array $path, array $query, mixed $body, ?RequestOptions $options = null): mixed
    {
        return $this->send($operation, $path, $query, $body, $options)['value'];
    }

    /**
     * Operations whose request body is not JSON, with the media type sent as Content-Type.
     * The pinned contract does not carry request media, so a test checks this list against the spec.
     */
    public const RAW_BODY_MEDIA = [
        'confirmDirectorySourceOAuth' => 'application/x-www-form-urlencoded',
        'importDirectoryCSV' => 'text/csv',
        'importPortalDirectoryCSV' => 'text/csv',
        'removeFromWaitlistOneClick' => 'application/x-www-form-urlencoded',
        'unsubscribeSubprocessorNoticesOneClick' => 'application/x-www-form-urlencoded',
    ];

    /**
     * Replaces the users and groups of a directory whose provider is csv with the content of the
     * file, sent as a text/csv body. The generated directories->importDirectoryCSV cannot send it.
     *
     * @param bool|null $dryRun when true, reports the changes without applying them
     */
    public function importDirectoryCSV(string $directory, string $csv, ?bool $dryRun = null, ?RequestOptions $options = null): Models\DirectorySyncResult
    {
        if (trim($directory) === '' || $csv === '') {
            throw OhAuthCatException::client('request_invalid');
        }
        $query = $dryRun === null ? [] : ['dry_run' => $dryRun];
        return Models\DirectorySyncResult::fromJson($this->send('importDirectoryCSV', [$directory], $query, null, $options, $csv)['value']);
    }

    /**
     * Every item of a list operation, following next_cursor until has_more is false.
     *
     * @param list<string> $path
     * @param array<string, mixed> $query
     * @param class-string<Model>|null $model decodes each item into this model
     * @return \Generator<int, mixed>
     */
    public function paginate(string $operation, array $path, array $query, ?RequestOptions $options = null, ?string $model = null): \Generator
    {
        if (!self::route($operation)->list || \array_key_exists('before', $query)) {
            throw OhAuthCatException::client('invalid_pagination');
        }
        return $this->pages($operation, $path, $query, $options, $model);
    }

    /**
     * @param list<string> $path
     * @param array<string, mixed> $query
     * @return \Generator<int, mixed>
     */
    private function pages(string $operation, array $path, array $query, ?RequestOptions $options, ?string $model): \Generator
    {
        $seen = [];
        if (\is_string($query['after'] ?? null) && $query['after'] !== '') {
            $seen[$query['after']] = true;
        }
        for ($page = 0; ; $page++) {
            if ($page >= $this->maxPages) {
                throw OhAuthCatException::client('invalid_pagination');
            }
            $result = $this->request($operation, $path, $query, null, $options);
            if (!\is_array($result) || !\is_array($result['data'] ?? null)) {
                throw OhAuthCatException::client('response_invalid');
            }
            $more = ($result['has_more'] ?? false) === true;
            $cursor = $result['next_cursor'] ?? null;
            if ($more && (!\is_string($cursor) || $cursor === '' || $result['data'] === [] || isset($seen[$cursor]))) {
                throw OhAuthCatException::client('invalid_pagination');
            }
            foreach ($result['data'] as $item) {
                yield $model === null ? $item : $model::fromJson($item);
            }
            if (!$more) {
                return;
            }
            $seen[$cursor] = true;
            $query['after'] = $cursor;
        }
    }

    /**
     * @param list<string> $path
     * @param array<string, mixed> $query
     * @return array{status: int, value: mixed, requestId: ?string}
     */
    public function send(string $operation, array $path, array $query, mixed $body, ?RequestOptions $options = null, ?string $rawBody = null): array
    {
        if ($rawBody !== null && ($body !== null || !\array_key_exists($operation, self::RAW_BODY_MEDIA))) {
            throw OhAuthCatException::client('request_invalid');
        }
        $options ??= new RequestOptions();
        $route = self::route($operation);
        $this->url($route, $path, $query, $this->apiBaseUrl);
        $token = $this->apiKey;
        if ($route->auth === 'accessToken') {
            if ($options->accessToken === null || trim($options->accessToken) === '' || !self::headerText($options->accessToken)) {
                throw OhAuthCatException::client('request_invalid');
            }
            $token = $options->accessToken;
        } elseif ($options->accessToken !== null) {
            throw OhAuthCatException::client('request_invalid');
        }
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept' => $route->media === '' ? 'application/json' : $route->media,
            'User-Agent' => 'ohauthcat-sdk-php/' . self::VERSION,
        ];
        if ($this->apiVersion !== null) {
            $headers['OhAuthCat-Version'] = $this->apiVersion;
        }
        $retryable = $route->method === 'GET' || $route->method === 'HEAD';
        if ($route->method !== 'GET') {
            $key = $options->idempotencyKey ?? self::uuid();
            if (trim($key) === '' || \strlen($key) > 255 || !self::headerText($key)) {
                throw OhAuthCatException::client('request_invalid');
            }
            $headers['Idempotency-Key'] = $key;
            $retryable = $route->supportsIdempotencyKey;
        }
        // A consumed authorization code must never be replayed.
        if ($operation === 'exchangeSsoCode') {
            $retryable = false;
        }
        $payload = null;
        if ($rawBody !== null) {
            $payload = $rawBody;
            $headers['Content-Type'] = self::RAW_BODY_MEDIA[$operation];
        } elseif ($body !== null) {
            // Every request body is a JSON object; send an empty PHP array as {}.
            // Pass \stdClass for empty objects nested deeper in a body.
            if ($body === []) {
                $body = new \stdClass();
            }
            try {
                $payload = json_encode($body, JSON_THROW_ON_ERROR | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRESERVE_ZERO_FRACTION);
            } catch (\JsonException) {
                throw OhAuthCatException::client('request_invalid');
            }
            $headers['Content-Type'] = 'application/json';
        }
        $retries = $options->maxRetries ?? $this->maxRetries;
        $timeout = $options->timeout ?? $this->timeout;
        $this->probe($timeout);
        $primaryError = null;
        for ($pass = 0; $pass < 2; $pass++) {
            $snap = $this->standby->snapshot($route->server === 'auth');
            $url = $this->url($route, $path, $query, $snap['origin']);
            try {
                $result = $this->attempt($route, $url, $headers, $payload, $timeout, $retries, $retryable, $snap);
                if (!$snap['onStandby']) {
                    $this->standby->success($snap['revision']);
                }
                return $result;
            } catch (OhAuthCatException $e) {
                if (!Standby::edgeError($e)) {
                    if (!$snap['onStandby'] && $e->status >= 400) {
                        $this->standby->success($snap['revision']);
                    }
                    throw $e;
                }
                if ($snap['onStandby']) {
                    $this->standby->unavailable($snap['revision']);
                    throw $primaryError ?? $snap['retained'] ?? $e;
                }
                $switched = $this->standby->edge($snap['revision'], $e);
                if ($primaryError === null && $switched && $retryable) {
                    $primaryError = $e;
                    continue;
                }
                throw $e;
            }
        }
        throw new ConnectionException('The request could not be sent', 'transport_error');
    }

    /**
     * @param array<string, string> $headers
     * @param array{origin: string, onStandby: bool, revision: int, retained: ?OhAuthCatException} $snap
     * @return array{status: int, value: mixed, requestId: ?string}
     */
    private function attempt(Route $route, string $url, array $headers, ?string $payload, float $timeout, int $retries, bool $retryable, array $snap): array
    {
        for ($attempt = 0; ; $attempt++) {
            try {
                $response = $this->transport->send($route->method, $url, $headers, $payload, $timeout);
            } catch (TransportException $e) {
                throw $e->timedOut
                    ? new ConnectionException('The request timed out', 'request_timeout')
                    : new ConnectionException('The request could not be sent', 'transport_error');
            }
            $status = $response->status;
            if (!$snap['onStandby'] && ($status === 429 || $status === 503)) {
                $this->standby->success($snap['revision']);
            }
            if (($status === 429 || $status === 503) && $retryable && $attempt < $retries) {
                $delay = self::retryDelay($response->header('Retry-After'), $attempt);
                if ($delay !== null) {
                    ($this->sleeper)($delay);
                    continue;
                }
            }
            $requestId = $response->header('Request-Id');
            if ($status < 200 || $status > 299) {
                throw OhAuthCatException::fromResponse($status, $response->body, $requestId);
            }
            if ($status === 204 || $response->body === '') {
                return ['status' => $status, 'value' => null, 'requestId' => $requestId];
            }
            if ($route->media !== '' && $route->media !== 'application/json') {
                return ['status' => $status, 'value' => $response->body, 'requestId' => $requestId];
            }
            try {
                $value = json_decode($response->body, true, 512, JSON_THROW_ON_ERROR | JSON_BIGINT_AS_STRING);
            } catch (\JsonException) {
                throw new OhAuthCatException('The response was not valid JSON', 'response_invalid', $status, requestId: $requestId);
            }
            return ['status' => $status, 'value' => $value, 'requestId' => $requestId];
        }
    }

    /** Re-probes the primary origins while on standby: both must answer /healthz with {"status":"ok"}. */
    private function probe(float $timeout): void
    {
        $revision = $this->standby->beginProbe();
        if ($revision === null) {
            return;
        }
        $healthy = false;
        try {
            $healthy = true;
            foreach ([$this->standby->api, $this->standby->auth] as $origin) {
                $response = $this->transport->send('GET', $origin . '/healthz', ['Accept' => 'application/json'], null, min($timeout, 1.0));
                $body = $response->status === 200 && \strlen($response->body) <= 1024
                    ? json_decode($response->body, true, 4, JSON_THROW_ON_ERROR)
                    : null;
                if ($body !== ['status' => 'ok']) {
                    $healthy = false;
                    break;
                }
            }
        } catch (\Throwable) {
            $healthy = false;
        } finally {
            $this->standby->finishProbe($revision, $healthy);
        }
    }

    /** Retry-After seconds or HTTP date, else jittered exponential backoff; null when too long. */
    public static function retryDelay(?string $header, int $attempt): ?float
    {
        if ($header !== null) {
            $value = trim($header);
            if (preg_match('/\A\d+(\.\d+)?\z/', $value) === 1) {
                $seconds = (float) $value;
                return $seconds > 60 ? null : $seconds;
            }
            $date = \DateTimeImmutable::createFromFormat(\DateTimeInterface::RFC7231, $value);
            if ($date !== false) {
                $seconds = (float) ($date->getTimestamp() - time());
                if ($seconds >= 0) {
                    return $seconds > 60 ? null : $seconds;
                }
            }
        }
        $limit = min(10.0, (float) (1 << max(0, min($attempt, 4))));
        return $limit / 2 + (random_int(0, 1000) / 1000) * $limit / 2;
    }

    private static function route(string $operation): Route
    {
        return Routes::all()[$operation] ?? throw OhAuthCatException::client('unknown_operation');
    }

    /**
     * @param list<string> $path
     * @param array<string, mixed> $query
     */
    private function url(Route $route, array $path, array $query, string $base): string
    {
        $values = array_values($path);
        $index = 0;
        $built = preg_replace_callback('/\{[^}]+\}/', static function () use (&$index, $values): string {
            $value = $values[$index++] ?? null;
            if (!\is_string($value) || trim($value) === '') {
                throw OhAuthCatException::client('request_invalid');
            }
            return rawurlencode($value);
        }, $route->path);
        if ($index !== \count($values) || !\is_string($built)) {
            throw OhAuthCatException::client('request_invalid');
        }
        $pairs = [];
        foreach ($query as $key => $value) {
            foreach (\is_array($value) && array_is_list($value) ? $value : [$value] as $item) {
                if ($item === null) {
                    continue;
                }
                if (\is_array($item) || \is_object($item)) {
                    throw OhAuthCatException::client('request_invalid');
                }
                $text = \is_bool($item) ? ($item ? 'true' : 'false') : (string) $item;
                $pairs[] = rawurlencode((string) $key) . '=' . rawurlencode($text);
            }
        }
        return $base . $built . ($pairs === [] ? '' : '?' . implode('&', $pairs));
    }

    private static function base(string $url): string
    {
        $parts = parse_url($url);
        if ($parts === false || !\in_array($parts['scheme'] ?? '', ['http', 'https'], true) || ($parts['host'] ?? '') === '' || isset($parts['query']) || isset($parts['fragment'])) {
            throw new \InvalidArgumentException('invalid base URL');
        }
        return rtrim($url, '/');
    }

    private static function headerText(string $value): bool
    {
        return preg_match('/\A[\x20-\x7e]*\z/', $value) === 1;
    }

    private static function uuid(): string
    {
        $bytes = random_bytes(16);
        $bytes[6] = \chr((\ord($bytes[6]) & 0x0f) | 0x40);
        $bytes[8] = \chr((\ord($bytes[8]) & 0x3f) | 0x80);
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($bytes), 4));
    }
}
