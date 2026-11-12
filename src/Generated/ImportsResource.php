<?php

// Generated from spec/openapi-v1.yaml (core c9fe6d0b5dde). Regenerate; do not edit.

declare(strict_types=1);

namespace OhAuthCat\Generated;

use OhAuthCat\OhAuthCatClient;
use OhAuthCat\RequestOptions;

final class ImportsResource
{
    public function __construct(private readonly OhAuthCatClient $client)
    {
    }

    /** POST /v1/imports/{imp}/cancel */
    public function cancelImport(string $imp, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Import
    {
        return \OhAuthCat\Models\Import::fromJson($this->client->request("cancelImport", [$imp], $query, null, $options));
    }

    /** POST /v1/imports */
    public function createImport(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Import
    {
        return \OhAuthCat\Models\Import::fromJson($this->client->request("createImport", [], $query, $body, $options));
    }

    /** GET /v1/imports/{imp} */
    public function getImport(string $imp, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Import
    {
        return \OhAuthCat\Models\Import::fromJson($this->client->request("getImport", [$imp], $query, null, $options));
    }

    /** GET /v1/imports */
    public function listImports(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\ImportList
    {
        return \OhAuthCat\Models\ImportList::fromJson($this->client->request("listImports", [], $query, null, $options));
    }

    /** @return \Generator<int, \OhAuthCat\Models\ImportSummary> every item across pages, following next_cursor. */
    public function listImportsAutoPaging(array $query = [], ?RequestOptions $options = null): \Generator
    {
        return $this->client->paginate("listImports", [], $query, $options, \OhAuthCat\Models\ImportSummary::class);
    }

    /** POST /v1/imports/{imp}/organizations/{org}/rollback */
    public function rollbackImportOrganization(string $imp, string $org, mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Import
    {
        return \OhAuthCat\Models\Import::fromJson($this->client->request("rollbackImportOrganization", [$imp, $org], $query, $body, $options));
    }

    /** POST /v1/imports/{imp}/run */
    public function runImport(string $imp, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Import
    {
        return \OhAuthCat\Models\Import::fromJson($this->client->request("runImport", [$imp], $query, null, $options));
    }

    /** POST /v1/imports/{imp}/organizations/{org}/switch */
    public function switchImportOrganization(string $imp, string $org, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Import
    {
        return \OhAuthCat\Models\Import::fromJson($this->client->request("switchImportOrganization", [$imp, $org], $query, null, $options));
    }
}
