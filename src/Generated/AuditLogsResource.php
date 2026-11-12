<?php

// Generated from spec/openapi-v1.yaml (core c9fe6d0b5dde). Regenerate; do not edit.

declare(strict_types=1);

namespace OhAuthCat\Generated;

use OhAuthCat\OhAuthCatClient;
use OhAuthCat\RequestOptions;

final class AuditLogsResource
{
    public function __construct(private readonly OhAuthCatClient $client)
    {
    }

    /** POST /v1/audit_logs/exports */
    public function createAuditLogExport(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\AuditLogExport
    {
        return \OhAuthCat\Models\AuditLogExport::fromJson($this->client->request("createAuditLogExport", [], $query, $body, $options));
    }

    /** GET /v1/audit_logs/exports/{export} */
    public function getAuditLogExport(string $export, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\AuditLogExport
    {
        return \OhAuthCat\Models\AuditLogExport::fromJson($this->client->request("getAuditLogExport", [$export], $query, null, $options));
    }

    /** GET /v1/audit_logs */
    public function listAuditLogs(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\AuditLogList
    {
        return \OhAuthCat\Models\AuditLogList::fromJson($this->client->request("listAuditLogs", [], $query, null, $options));
    }

    /** @return \Generator<int, \OhAuthCat\Models\AuditLog> every item across pages, following next_cursor. */
    public function listAuditLogsAutoPaging(array $query = [], ?RequestOptions $options = null): \Generator
    {
        return $this->client->paginate("listAuditLogs", [], $query, $options, \OhAuthCat\Models\AuditLog::class);
    }
}
