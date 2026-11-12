<?php

declare(strict_types=1);

namespace OhAuthCat;

/** One API operation from the pinned spec. */
final class Route
{
    public function __construct(
        public readonly string $name,
        public readonly string $method,
        public readonly string $path,
        public readonly string $server,
        public readonly string $auth,
        public readonly string $media,
        public readonly int $status,
        public readonly bool $supportsIdempotencyKey,
        public readonly bool $list,
    ) {
    }
}
