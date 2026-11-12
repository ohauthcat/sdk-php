<?php

// Generated from spec/openapi-v1.yaml (core c9fe6d0b5dde). Regenerate; do not edit.

declare(strict_types=1);

namespace OhAuthCat\Generated;

use OhAuthCat\OhAuthCatClient;
use OhAuthCat\RequestOptions;

final class ExportsResource
{
    public function __construct(private readonly OhAuthCatClient $client)
    {
    }

    /** POST /v1/exports */
    public function createExport(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Export
    {
        return \OhAuthCat\Models\Export::fromJson($this->client->request("createExport", [], $query, $body, $options));
    }

    /** GET /v1/exports/{export} */
    public function getExport(string $export, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Export
    {
        return \OhAuthCat\Models\Export::fromJson($this->client->request("getExport", [$export], $query, null, $options));
    }
}
