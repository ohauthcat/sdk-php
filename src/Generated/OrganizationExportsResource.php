<?php

// Generated from spec/openapi-v1.yaml (core c9fe6d0b5dde). Regenerate; do not edit.

declare(strict_types=1);

namespace OhAuthCat\Generated;

use OhAuthCat\OhAuthCatClient;
use OhAuthCat\RequestOptions;

final class OrganizationExportsResource
{
    public function __construct(private readonly OhAuthCatClient $client)
    {
    }

    /** POST /v1/organization_exports */
    public function createOrganizationExport(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\OrganizationExport
    {
        return \OhAuthCat\Models\OrganizationExport::fromJson($this->client->request("createOrganizationExport", [], $query, $body, $options));
    }

    /** GET /v1/organization_exports/{export} */
    public function getOrganizationExport(string $export, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\OrganizationExport
    {
        return \OhAuthCat\Models\OrganizationExport::fromJson($this->client->request("getOrganizationExport", [$export], $query, null, $options));
    }
}
