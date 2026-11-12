<?php

// Generated from spec/openapi-v1.yaml (core c9fe6d0b5dde). Regenerate; do not edit.

declare(strict_types=1);

namespace OhAuthCat\Generated;

use OhAuthCat\OhAuthCatClient;
use OhAuthCat\RequestOptions;

final class EmailEventsResource
{
    public function __construct(private readonly OhAuthCatClient $client)
    {
    }

    /** GET /v1/email_events */
    public function listEmailEvents(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\EmailEventList
    {
        return \OhAuthCat\Models\EmailEventList::fromJson($this->client->request("listEmailEvents", [], $query, null, $options));
    }

    /** @return \Generator<int, \OhAuthCat\Models\EmailEvent> every item across pages, following next_cursor. */
    public function listEmailEventsAutoPaging(array $query = [], ?RequestOptions $options = null): \Generator
    {
        return $this->client->paginate("listEmailEvents", [], $query, $options, \OhAuthCat\Models\EmailEvent::class);
    }

    /** POST /v1/email_events/test */
    public function sendTestEmail(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\TestEmail
    {
        return \OhAuthCat\Models\TestEmail::fromJson($this->client->request("sendTestEmail", [], $query, $body, $options));
    }
}
