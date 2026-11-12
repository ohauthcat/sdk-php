<?php

// Generated from spec/openapi-v1.yaml (core c9fe6d0b5dde). Regenerate; do not edit.

declare(strict_types=1);

namespace OhAuthCat\Generated;

use OhAuthCat\OhAuthCatClient;
use OhAuthCat\RequestOptions;

final class EventsResource
{
    public function __construct(private readonly OhAuthCatClient $client)
    {
    }

    /** GET /v1/events/{evt} */
    public function getEvent(string $evt, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Event
    {
        return \OhAuthCat\Models\Event::fromJson($this->client->request("getEvent", [$evt], $query, null, $options));
    }

    /** GET /v1/events */
    public function listEvents(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\EventList
    {
        return \OhAuthCat\Models\EventList::fromJson($this->client->request("listEvents", [], $query, null, $options));
    }

    /** @return \Generator<int, \OhAuthCat\Models\Event> every item across pages, following next_cursor. */
    public function listEventsAutoPaging(array $query = [], ?RequestOptions $options = null): \Generator
    {
        return $this->client->paginate("listEvents", [], $query, $options, \OhAuthCat\Models\Event::class);
    }
}
