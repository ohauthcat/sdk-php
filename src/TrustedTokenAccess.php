<?php

declare(strict_types=1);

namespace OhAuthCat;

/** A trusted-token profile with the OhAuthCat access token issued for it. */
final class TrustedTokenAccess
{
    public function __construct(
        public readonly Models\TrustedTokenProfile $profile,
        public readonly string $accessToken,
        public readonly string $tokenType,
        public readonly int $expiresIn,
    ) {
    }
}
