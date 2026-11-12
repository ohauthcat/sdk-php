<?php

// Generated from spec/openapi-v1.yaml (core c9fe6d0b5dde). Regenerate; do not edit.

declare(strict_types=1);

namespace OhAuthCat\Generated;

use OhAuthCat\OhAuthCatClient;
use OhAuthCat\RequestOptions;

final class SessionsResource
{
    public function __construct(private readonly OhAuthCatClient $client)
    {
    }

    /** POST /v1/sessions/migrate */
    public function migrateSession(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\SessionMigrateResult
    {
        return \OhAuthCat\Models\SessionMigrateResult::fromJson($this->client->request("migrateSession", [], $query, $body, $options));
    }
}
