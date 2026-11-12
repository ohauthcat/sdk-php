<?php

// Generated from spec/openapi-v1.yaml (core c9fe6d0b5dde). Regenerate; do not edit.

declare(strict_types=1);

namespace OhAuthCat\Generated;

use OhAuthCat\OhAuthCatClient;
use OhAuthCat\RequestOptions;

final class AuditLogSchemasResource
{
    public function __construct(private readonly OhAuthCatClient $client)
    {
    }

    /** POST /v1/audit_log_schemas */
    public function createAuditLogSchema(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\AuditLogSchema
    {
        return \OhAuthCat\Models\AuditLogSchema::fromJson($this->client->request("createAuditLogSchema", [], $query, $body, $options));
    }

    /** GET /v1/audit_log_schemas/{action} */
    public function getAuditLogSchema(string $action, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\AuditLogSchema
    {
        return \OhAuthCat\Models\AuditLogSchema::fromJson($this->client->request("getAuditLogSchema", [$action], $query, null, $options));
    }

    /** GET /v1/audit_log_schemas */
    public function listAuditLogSchemas(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\AuditLogSchemaList
    {
        return \OhAuthCat\Models\AuditLogSchemaList::fromJson($this->client->request("listAuditLogSchemas", [], $query, null, $options));
    }

    /** @return \Generator<int, \OhAuthCat\Models\AuditLogSchema> every item across pages, following next_cursor. */
    public function listAuditLogSchemasAutoPaging(array $query = [], ?RequestOptions $options = null): \Generator
    {
        return $this->client->paginate("listAuditLogSchemas", [], $query, $options, \OhAuthCat\Models\AuditLogSchema::class);
    }
}
