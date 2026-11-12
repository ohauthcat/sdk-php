<?php

declare(strict_types=1);

namespace OhAuthCat;

/** SSO sign-in helpers: build the authorization URL with PKCE and exchange the code. */
final class SsoHelpers
{
    private const VERIFIER = '/\A[A-Za-z0-9._~-]{43,128}\z/';
    private const DOMAIN = '/\A(?=.{1,253}\z)([a-zA-Z0-9]([a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?\.)+[a-zA-Z]{2,63}\z/';
    private const ORG = '/\Aorg_[0-9A-HJKMNP-TV-Z]{26}\z/';
    private const CONN = '/\Aconn_[0-9A-HJKMNP-TV-Z]{26}\z/';

    public function __construct(private readonly OhAuthCatClient $client)
    {
    }

    /** RFC 7636 S256 challenge for a verifier. */
    public static function pkceChallenge(string $verifier): string
    {
        if (preg_match(self::VERIFIER, $verifier) !== 1) {
            throw OhAuthCatException::client('request_invalid');
        }
        return rtrim(strtr(base64_encode(hash('sha256', $verifier, true)), '+/', '-_'), '=');
    }

    /**
     * An empty $state is replaced with a random one. Keep the returned verifier and state
     * server-side and compare the callback state with hash_equals() before the exchange.
     *
     * @return array{url: string, codeVerifier: string, state: string}
     */
    public function getAuthorizationUrl(
        string $redirectUri,
        string $state = '',
        ?string $organization = null,
        ?string $connection = null,
        ?string $domain = null,
        ?string $loginHint = null,
    ): array {
        $invalid = OhAuthCatException::client('request_invalid');
        if ($this->client->clientId === null || $redirectUri === '' || \strlen($redirectUri) > 2048 || str_contains($redirectUri, '#')) {
            throw $invalid;
        }
        $parts = parse_url($redirectUri);
        if ($parts === false || !\in_array($parts['scheme'] ?? '', ['http', 'https'], true) || ($parts['host'] ?? '') === '' || isset($parts['user'])) {
            throw $invalid;
        }
        if (\strlen($state) > 1024
            || ($organization !== null && preg_match(self::ORG, $organization) !== 1)
            || ($connection !== null && preg_match(self::CONN, $connection) !== 1)
            || ($domain !== null && preg_match(self::DOMAIN, trim($domain)) !== 1)) {
            throw $invalid;
        }
        if ($loginHint !== null) {
            $hint = trim($loginHint);
            $pieces = explode('@', $hint);
            if (\strlen($hint) > 320 || \count($pieces) !== 2 || $pieces[0] === '' || preg_match('/[\s<>"]/', $hint) === 1 || preg_match(self::DOMAIN, $pieces[1]) !== 1) {
                throw $invalid;
            }
        }
        if ($state === '') {
            $state = rtrim(strtr(base64_encode(random_bytes(32)), '+/', '-_'), '=');
        }
        $verifier = rtrim(strtr(base64_encode(random_bytes(32)), '+/', '-_'), '=');
        $query = [
            'client_id' => $this->client->clientId,
            'redirect_uri' => $redirectUri,
            'response_type' => 'code',
            'state' => $state,
            'code_challenge' => self::pkceChallenge($verifier),
            'code_challenge_method' => 'S256',
        ];
        foreach (['organization' => $organization, 'connection' => $connection, 'domain' => $domain, 'login_hint' => $loginHint] as $key => $value) {
            if ($value !== null) {
                $query[$key] = $value;
            }
        }
        return [
            'url' => $this->client->standby->snapshot(true)['origin'] . '/sso/authorize?' . http_build_query($query, '', '&', PHP_QUERY_RFC3986),
            'codeVerifier' => $verifier,
            'state' => $state,
        ];
    }

    /** Exchanges the code once (never retried). Throws RestartSignInException when the user must sign in again. */
    public function getProfileAndToken(string $code, string $codeVerifier, string $redirectUri): Models\SsoToken
    {
        if ($this->client->clientId === null) {
            throw OhAuthCatException::client('request_invalid', 'clientId');
        }
        if (!str_starts_with($this->client->apiKey, 'sk_')) {
            throw OhAuthCatException::client('request_invalid', 'apiKey');
        }
        if ($code === '' || \strlen($code) > 4096) {
            throw OhAuthCatException::client('request_invalid', 'code');
        }
        if ($redirectUri === '' || \strlen($redirectUri) > 2048) {
            throw OhAuthCatException::client('request_invalid', 'redirectUri');
        }
        self::pkceChallenge($codeVerifier);
        try {
            return Models\SsoToken::fromJson($this->client->request('exchangeSsoCode', [], [], [
                'grant_type' => 'authorization_code',
                'client_id' => $this->client->clientId,
                'code' => $code,
                'code_verifier' => $codeVerifier,
                'redirect_uri' => $redirectUri,
            ]));
        } catch (OhAuthCatException $e) {
            if (\in_array($e->errorCode, ['invalid_grant', 'flow_interrupted_retry', 'pkce_verification_failed'], true)) {
                throw new RestartSignInException('Restart the sign-in flow', $e->errorCode, $e->status, $e->type, $e->param, $e->docUrl, $e->requestId);
            }
            throw $e;
        }
    }

    private const TOKEN_TYPES = ['urn:ietf:params:oauth:token-type:jwt', 'urn:ietf:params:oauth:token-type:id_token'];

    /**
     * Exchanges a trusted third-party token for its profile and an OhAuthCat access token whose
     * audience is $clientId (the configured publishable key when null). The token's sub is the
     * profile ID (tprof_...), not an end-user ID; exchanged identities are not billable.
     */
    public function exchangeTrustedTokenForAccess(
        string $subjectToken,
        string $subjectTokenType = 'urn:ietf:params:oauth:token-type:jwt',
        ?string $clientId = null,
    ): TrustedTokenAccess {
        if (!str_starts_with($this->client->apiKey, 'sk_') || trim($subjectToken) === '' || \strlen($subjectToken) > 16384 || !\in_array($subjectTokenType, self::TOKEN_TYPES, true)) {
            throw OhAuthCatException::client('request_invalid');
        }
        $audience = $clientId === null ? $this->client->clientId : PasskeyHelpers::bounded($clientId, 256);
        if ($audience === null) {
            throw OhAuthCatException::client('request_invalid');
        }
        $profile = Models\TrustedTokenProfile::fromJson($this->client->request('exchangeTrustedToken', [], [], [
            'grant_type' => 'urn:ietf:params:oauth:grant-type:token-exchange',
            'subject_token' => $subjectToken,
            'subject_token_type' => $subjectTokenType,
            'client_id' => $audience,
        ]));
        $access = $profile->getAccessToken();
        $expires = $profile->getExpiresIn();
        if ($access === null || $expires === null) {
            throw OhAuthCatException::client('access_token_missing');
        }
        return new TrustedTokenAccess($profile, $access, $profile->getTokenType() ?? 'Bearer', $expires);
    }
}
