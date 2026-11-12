<?php

// Generated from spec/openapi-v1.yaml (core c9fe6d0b5dde). Regenerate; do not edit.

declare(strict_types=1);

namespace OhAuthCat\Generated;

use OhAuthCat\OhAuthCatClient;
use OhAuthCat\RequestOptions;

final class DevResource
{
    public function __construct(private readonly OhAuthCatClient $client)
    {
    }

    /** POST /v1/dev/init */
    public function devInit(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\DevInit
    {
        return \OhAuthCat\Models\DevInit::fromJson($this->client->request("devInit", [], $query, $body, $options));
    }

    /** POST /v1/dev/trigger */
    public function devTrigger(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\DevEvent
    {
        return \OhAuthCat\Models\DevEvent::fromJson($this->client->request("devTrigger", [], $query, $body, $options));
    }
}
