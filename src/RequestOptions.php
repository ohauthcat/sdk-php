<?php

declare(strict_types=1);

namespace OhAuthCat;

/** Per-request overrides. All fields are optional. */
final class RequestOptions
{
    public function __construct(
        public readonly ?string $idempotencyKey = null,
        public readonly ?float $timeout = null,
        public readonly ?int $maxRetries = null,
        public readonly ?string $accessToken = null,
    ) {
    }
}
