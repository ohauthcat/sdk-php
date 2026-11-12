<?php

// Generated from spec/openapi-v1.yaml (core c9fe6d0b5dde). Regenerate; do not edit.

declare(strict_types=1);

namespace OhAuthCat\Generated;

use OhAuthCat\OhAuthCatClient;
use OhAuthCat\RequestOptions;

final class AuditLogEventsResource
{
    public function __construct(private readonly OhAuthCatClient $client)
    {
    }

    /** POST /v1/audit_log_events */
    public function createAuditLogEvent(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\AuditLogEvent
    {
        return \OhAuthCat\Models\AuditLogEvent::fromJson($this->client->request("createAuditLogEvent", [], $query, $body, $options));
    }

    /** GET /v1/audit_log_events/export */
    public function exportAuditLogEvents(array $query = [], ?RequestOptions $options = null): mixed
    {
        return $this->client->request("exportAuditLogEvents", [], $query, null, $options);
    }

    /** GET /v1/audit_log_events/{audit_log_event} */
    public function getAuditLogEvent(string $auditLogEvent, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\AuditLogEvent
    {
        return \OhAuthCat\Models\AuditLogEvent::fromJson($this->client->request("getAuditLogEvent", [$auditLogEvent], $query, null, $options));
    }

    /** GET /v1/audit_log_events */
    public function listAuditLogEvents(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\AuditLogEventList
    {
        return \OhAuthCat\Models\AuditLogEventList::fromJson($this->client->request("listAuditLogEvents", [], $query, null, $options));
    }

    /** @return \Generator<int, \OhAuthCat\Models\AuditLogEvent> every item across pages, following next_cursor. */
    public function listAuditLogEventsAutoPaging(array $query = [], ?RequestOptions $options = null): \Generator
    {
        return $this->client->paginate("listAuditLogEvents", [], $query, $options, \OhAuthCat\Models\AuditLogEvent::class);
    }
}
