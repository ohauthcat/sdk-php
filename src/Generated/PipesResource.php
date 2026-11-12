<?php

// Generated from spec/openapi-v1.yaml (core c9fe6d0b5dde). Regenerate; do not edit.

declare(strict_types=1);

namespace OhAuthCat\Generated;

use OhAuthCat\OhAuthCatClient;
use OhAuthCat\RequestOptions;

final class PipesResource
{
    public function __construct(private readonly OhAuthCatClient $client)
    {
    }

    /** POST /v1/pipes/connections */
    public function createPipeConnection(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\PipeConnectSession
    {
        return \OhAuthCat\Models\PipeConnectSession::fromJson($this->client->request("createPipeConnection", [], $query, $body, $options));
    }

    /** DELETE /v1/pipes/providers/{provider} */
    public function deletePipeProvider(string $provider, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Deleted
    {
        return \OhAuthCat\Models\Deleted::fromJson($this->client->request("deletePipeProvider", [$provider], $query, null, $options));
    }

    /** DELETE /v1/pipes/connections/{connection} */
    public function disconnectPipeConnection(string $connection, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\PipeConnection
    {
        return \OhAuthCat\Models\PipeConnection::fromJson($this->client->request("disconnectPipeConnection", [$connection], $query, null, $options));
    }

    /** GET /v1/pipes/connections/{connection}/access_token */
    public function getPipeAccessToken(string $connection, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\PipeAccessToken
    {
        return \OhAuthCat\Models\PipeAccessToken::fromJson($this->client->request("getPipeAccessToken", [$connection], $query, null, $options));
    }

    /** GET /v1/pipes/connections/{connection} */
    public function getPipeConnection(string $connection, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\PipeConnection
    {
        return \OhAuthCat\Models\PipeConnection::fromJson($this->client->request("getPipeConnection", [$connection], $query, null, $options));
    }

    /** GET /v1/pipes/connections */
    public function listPipeConnections(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\PipeConnectionList
    {
        return \OhAuthCat\Models\PipeConnectionList::fromJson($this->client->request("listPipeConnections", [], $query, null, $options));
    }

    /** @return \Generator<int, \OhAuthCat\Models\PipeConnection> every item across pages, following next_cursor. */
    public function listPipeConnectionsAutoPaging(array $query = [], ?RequestOptions $options = null): \Generator
    {
        return $this->client->paginate("listPipeConnections", [], $query, $options, \OhAuthCat\Models\PipeConnection::class);
    }

    /** GET /v1/pipes/providers */
    public function listPipeProviders(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\PipeProviderList
    {
        return \OhAuthCat\Models\PipeProviderList::fromJson($this->client->request("listPipeProviders", [], $query, null, $options));
    }

    /** PUT /v1/pipes/providers/{provider} */
    public function putPipeProvider(string $provider, mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\PipeProvider
    {
        return \OhAuthCat\Models\PipeProvider::fromJson($this->client->request("putPipeProvider", [$provider], $query, $body, $options));
    }
}
