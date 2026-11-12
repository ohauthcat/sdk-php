<?php

// Generated from spec/openapi-v1.yaml (core c9fe6d0b5dde). Regenerate; do not edit.

declare(strict_types=1);

namespace OhAuthCat\Generated;

use OhAuthCat\OhAuthCatClient;
use OhAuthCat\RequestOptions;

final class ConnectionHealthResource
{
    public function __construct(private readonly OhAuthCatClient $client)
    {
    }

    /** GET /v1/connection_health */
    public function listConnectionHealth(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\ConnectionHealthList
    {
        return \OhAuthCat\Models\ConnectionHealthList::fromJson($this->client->request("listConnectionHealth", [], $query, null, $options));
    }

    /** @return \Generator<int, \OhAuthCat\Models\ConnectionHealth> every item across pages, following next_cursor. */
    public function listConnectionHealthAutoPaging(array $query = [], ?RequestOptions $options = null): \Generator
    {
        return $this->client->paginate("listConnectionHealth", [], $query, $options, \OhAuthCat\Models\ConnectionHealth::class);
    }
}
