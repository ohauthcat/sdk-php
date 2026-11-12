<?php

// Generated from spec/openapi-v1.yaml (core c9fe6d0b5dde). Regenerate; do not edit.

declare(strict_types=1);

namespace OhAuthCat\Generated;

use OhAuthCat\OhAuthCatClient;
use OhAuthCat\RequestOptions;

final class RequestsResource
{
    public function __construct(private readonly OhAuthCatClient $client)
    {
    }

    /** GET /v1/requests */
    public function listRequests(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\RequestLogList
    {
        return \OhAuthCat\Models\RequestLogList::fromJson($this->client->request("listRequests", [], $query, null, $options));
    }

    /** @return \Generator<int, \OhAuthCat\Models\RequestLog> every item across pages, following next_cursor. */
    public function listRequestsAutoPaging(array $query = [], ?RequestOptions $options = null): \Generator
    {
        return $this->client->paginate("listRequests", [], $query, $options, \OhAuthCat\Models\RequestLog::class);
    }
}
