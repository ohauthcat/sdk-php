<?php

// Generated from spec/openapi-v1.yaml (core c9fe6d0b5dde). Regenerate; do not edit.

declare(strict_types=1);

namespace OhAuthCat\Generated;

use OhAuthCat\OhAuthCatClient;
use OhAuthCat\RequestOptions;

final class LogStreamsResource
{
    public function __construct(private readonly OhAuthCatClient $client)
    {
    }

    /** POST /v1/log_streams */
    public function createLogStream(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\LogStream
    {
        return \OhAuthCat\Models\LogStream::fromJson($this->client->request("createLogStream", [], $query, $body, $options));
    }

    /** DELETE /v1/log_streams/{stream} */
    public function deleteLogStream(string $stream, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Deleted
    {
        return \OhAuthCat\Models\Deleted::fromJson($this->client->request("deleteLogStream", [$stream], $query, null, $options));
    }

    /** GET /v1/log_streams */
    public function listLogStreams(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\LogStreamList
    {
        return \OhAuthCat\Models\LogStreamList::fromJson($this->client->request("listLogStreams", [], $query, null, $options));
    }
}
