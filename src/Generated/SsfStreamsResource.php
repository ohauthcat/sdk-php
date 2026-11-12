<?php

// Generated from spec/openapi-v1.yaml (core c9fe6d0b5dde). Regenerate; do not edit.

declare(strict_types=1);

namespace OhAuthCat\Generated;

use OhAuthCat\OhAuthCatClient;
use OhAuthCat\RequestOptions;

final class SsfStreamsResource
{
    public function __construct(private readonly OhAuthCatClient $client)
    {
    }

    /** POST /v1/ssf_streams */
    public function createSsfStream(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\SsfStream
    {
        return \OhAuthCat\Models\SsfStream::fromJson($this->client->request("createSsfStream", [], $query, $body, $options));
    }

    /** DELETE /v1/ssf_streams/{stream} */
    public function deleteSsfStream(string $stream, array $query = [], ?RequestOptions $options = null): mixed
    {
        return $this->client->request("deleteSsfStream", [$stream], $query, null, $options);
    }

    /** GET /v1/ssf_streams/{stream} */
    public function getSsfStream(string $stream, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\SsfStream
    {
        return \OhAuthCat\Models\SsfStream::fromJson($this->client->request("getSsfStream", [$stream], $query, null, $options));
    }

    /** GET /v1/ssf_streams */
    public function listSsfStreams(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\SsfStreamList
    {
        return \OhAuthCat\Models\SsfStreamList::fromJson($this->client->request("listSsfStreams", [], $query, null, $options));
    }

    /** PATCH /v1/ssf_streams/{stream} */
    public function updateSsfStream(string $stream, mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\SsfStream
    {
        return \OhAuthCat\Models\SsfStream::fromJson($this->client->request("updateSsfStream", [$stream], $query, $body, $options));
    }

    /** POST /v1/ssf_streams/{stream}/verify */
    public function verifySsfStream(string $stream, mixed $body, array $query = [], ?RequestOptions $options = null): mixed
    {
        return $this->client->request("verifySsfStream", [$stream], $query, $body, $options);
    }
}
