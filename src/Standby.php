<?php

declare(strict_types=1);

namespace OhAuthCat;

/**
 * Edge failover to the standby hosts (api./auth.oauthcat.com). After $threshold consecutive edge
 * failures (timeouts, transport errors, HTTP 520-539) requests go to the standby origins; the
 * primary is re-probed at most every 60 s and used again once healthy. A failure on the standby
 * path switches back and blocks failover for the cooldown. State lives for the client's lifetime
 * (one PHP request in most deployments).
 */
final class Standby
{
    public const DEFAULT_API = 'https://api.ohauthcat.com';
    public const DEFAULT_AUTH = 'https://auth.ohauthcat.com';
    public const STANDBY_API = 'https://api.oauthcat.com';
    public const STANDBY_AUTH = 'https://auth.oauthcat.com';
    private const PROBE_INTERVAL = 60.0;

    public readonly string $fallbackApi;
    public readonly string $fallbackAuth;
    public readonly bool $enabled;
    /** @var \Closure(): float */
    private readonly \Closure $clock;
    private bool $active = false;
    private int $failures = 0;
    private float $blockedUntil;
    private float $probeAfter;
    private bool $probing = false;
    private int $revision = 0;
    private ?OhAuthCatException $primaryFailure = null;

    /** @param (callable(): float)|null $clock monotonic seconds */
    public function __construct(
        public readonly string $api,
        public readonly string $auth,
        ?bool $enabled,
        ?string $fallbackApi,
        ?string $fallbackAuth,
        private readonly int $threshold,
        private readonly float $cooldown,
        ?callable $clock = null,
    ) {
        $this->fallbackApi = self::trustedOrigin($fallbackApi ?? self::STANDBY_API);
        $this->fallbackAuth = self::trustedOrigin($fallbackAuth ?? self::STANDBY_AUTH);
        $custom = $api !== self::DEFAULT_API || $auth !== self::DEFAULT_AUTH;
        $explicit = $fallbackApi !== null && $fallbackAuth !== null;
        if ($enabled === true && $custom && !$explicit) {
            throw new \InvalidArgumentException('custom primary origins require both standby origins');
        }
        $this->enabled = $enabled !== false && (!$custom || $explicit);
        if ($threshold < 1 || $threshold > 100) {
            throw new \InvalidArgumentException('standbyThreshold must be 1..100');
        }
        if ($cooldown < 0.001 || $cooldown > 3600) {
            throw new \InvalidArgumentException('standbyCooldown must be 0.001..3600 s');
        }
        if ($this->enabled && ($api === $this->fallbackApi || $auth === $this->fallbackAuth)) {
            throw new \InvalidArgumentException('standby origins must differ from primary origins');
        }
        $this->clock = $clock === null ? static fn (): float => hrtime(true) / 1e9 : \Closure::fromCallable($clock);
        $this->blockedUntil = $this->probeAfter = ($this->clock)();
    }

    public static function trustedOrigin(string $value): string
    {
        $parts = parse_url($value);
        $scheme = \is_array($parts) ? ($parts['scheme'] ?? '') : '';
        $host = \is_array($parts) ? ($parts['host'] ?? '') : '';
        $local = $scheme === 'http' && \in_array($host, ['localhost', '127.0.0.1', '[::1]'], true);
        if (!\is_array($parts) || !($scheme === 'https' || $local) || $host === '' || isset($parts['user']) || isset($parts['query'])
            || isset($parts['fragment']) || !\in_array($parts['path'] ?? '', ['', '/'], true) || ($parts['port'] ?? null) === 0) {
            throw new \InvalidArgumentException('invalid standby origin');
        }
        return rtrim($value, '/');
    }

    /** Transport failures and Cloudflare 52x/53x, never API answers such as 429 or 503. */
    public static function edgeError(OhAuthCatException $e): bool
    {
        return ($e->status >= 520 && $e->status <= 539)
            || (\in_array($e->errorCode, ['transport_error', 'request_timeout'], true) && $e->status !== 429 && $e->status !== 503);
    }

    /** @return array{origin: string, onStandby: bool, revision: int, retained: ?OhAuthCatException} */
    public function snapshot(bool $authHost): array
    {
        $origin = $this->active ? ($authHost ? $this->fallbackAuth : $this->fallbackApi) : ($authHost ? $this->auth : $this->api);
        return ['origin' => $origin, 'onStandby' => $this->active, 'revision' => $this->revision, 'retained' => $this->primaryFailure];
    }

    public function success(int $revision): void
    {
        if ($revision === $this->revision && !$this->active) {
            $this->failures = 0;
        }
    }

    public function edge(int $revision, OhAuthCatException $error): bool
    {
        if ($revision !== $this->revision || !$this->enabled || $this->active) {
            return false;
        }
        $this->failures++;
        if ($this->failures < $this->threshold || ($this->clock)() < $this->blockedUntil) {
            return false;
        }
        $this->active = true;
        $this->primaryFailure = $error;
        $this->probeAfter = ($this->clock)() + self::PROBE_INTERVAL;
        $this->revision++;
        return true;
    }

    public function unavailable(int $revision): void
    {
        if ($revision !== $this->revision) {
            return;
        }
        $this->active = false;
        $this->failures = 0;
        $this->blockedUntil = ($this->clock)() + $this->cooldown;
        $this->revision++;
    }

    public function beginProbe(): ?int
    {
        if (!$this->active || $this->probing || ($this->clock)() < $this->probeAfter) {
            return null;
        }
        $this->probing = true;
        $this->probeAfter = ($this->clock)() + self::PROBE_INTERVAL;
        return $this->revision;
    }

    public function finishProbe(int $revision, bool $healthy): void
    {
        $this->probing = false;
        if ($healthy && $revision === $this->revision) {
            $this->active = false;
            $this->failures = 0;
            $this->revision++;
        }
    }
}
