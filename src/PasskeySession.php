<?php

declare(strict_types=1);

namespace OhAuthCat;

/** The session a passkey sign-in created: the token set issued by the login host for the client ID. */
final class PasskeySession
{
    public function __construct(
        public readonly Models\EndUserPasskeyAuthentication $authentication,
        public readonly string $sessionId,
        public readonly string $accessToken,
        public readonly string $refreshToken,
        public readonly string $idToken,
        public readonly string $tokenType,
        public readonly int $expiresIn,
    ) {
    }
}
