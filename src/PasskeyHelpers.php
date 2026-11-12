<?php

declare(strict_types=1);

namespace OhAuthCat;

/** Headless end-user passkey helpers: session sign-in and passkey rename. */
final class PasskeyHelpers
{
    public function __construct(private readonly OhAuthCatClient $client)
    {
    }

    /** Trims $value; refuses it when blank, longer than $maximum characters or holding control characters. */
    public static function bounded(string $value, int $maximum): string
    {
        $text = trim($value);
        $length = preg_match_all('/./su', $text);
        if ($text === '' || $length === false || $length > $maximum || preg_match('/[\x00-\x1f\x7f]/', $text) === 1) {
            throw OhAuthCatException::client('request_invalid');
        }
        return $text;
    }

    /**
     * Verifies a WebAuthn assertion (the decoded JSON credential) and creates a session for
     * $clientId (the configured publishable key when null). When the environment requires MFA and
     * the assertion was not user-verified, the API answers mfa_required instead.
     *
     * @param array<string, mixed> $credential
     */
    public function authenticateWithSession(array $credential, ?string $clientId = null): PasskeySession
    {
        $audience = $clientId === null ? $this->client->clientId : self::bounded($clientId, 256);
        if ($audience === null) {
            throw OhAuthCatException::client('request_invalid');
        }
        $result = Models\EndUserPasskeyAuthentication::fromJson($this->client->request('authenticateEndUserPasskey', [], [], [
            'credential' => (object) $credential,
            'session' => true,
            'client_id' => $audience,
        ]));
        $sessionId = $result->getSessionId();
        $access = $result->getAccessToken();
        $refresh = $result->getRefreshToken();
        $idToken = $result->getIdToken();
        $expires = $result->getExpiresIn();
        if ($sessionId === null || $access === null || $refresh === null || $idToken === null || $expires === null) {
            throw OhAuthCatException::client('passkey_session_missing');
        }
        return new PasskeySession($result, $sessionId, $access, $refresh, $idToken, 'Bearer', $expires);
    }

    /**
     * Renames one of the user's passkeys (trimmed, 1 to 64 characters, no control characters).
     * Another user's passkey answers resource_not_found.
     */
    public function renamePasskey(string $user, string $passkey, string $name): Models\EndUserFactor
    {
        $path = [self::bounded($user, 64), self::bounded($passkey, 64)];
        return Models\EndUserFactor::fromJson($this->client->request('updateEndUserPasskey', $path, [], ['name' => self::bounded($name, 64)]));
    }
}
