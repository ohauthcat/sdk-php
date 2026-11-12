<?php

// Generated from spec/openapi-v1.yaml (core c9fe6d0b5dde). Regenerate; do not edit.

declare(strict_types=1);

namespace OhAuthCat\Generated;

use OhAuthCat\OhAuthCatClient;
use OhAuthCat\RequestOptions;

final class M2mClientsResource
{
    public function __construct(private readonly OhAuthCatClient $client)
    {
    }

    /** POST /v1/m2m_clients */
    public function createM2MClient(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\M2MClientWithSecret
    {
        return \OhAuthCat\Models\M2MClientWithSecret::fromJson($this->client->request("createM2MClient", [], $query, $body, $options));
    }

    /** GET /v1/m2m_clients/{client} */
    public function getM2MClient(string $client, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\M2MClient
    {
        return \OhAuthCat\Models\M2MClient::fromJson($this->client->request("getM2MClient", [$client], $query, null, $options));
    }

    /** GET /v1/m2m_clients */
    public function listM2MClients(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\M2MClientList
    {
        return \OhAuthCat\Models\M2MClientList::fromJson($this->client->request("listM2MClients", [], $query, null, $options));
    }

    /** @return \Generator<int, \OhAuthCat\Models\M2MClient> every item across pages, following next_cursor. */
    public function listM2MClientsAutoPaging(array $query = [], ?RequestOptions $options = null): \Generator
    {
        return $this->client->paginate("listM2MClients", [], $query, $options, \OhAuthCat\Models\M2MClient::class);
    }

    /** DELETE /v1/m2m_clients/{client} */
    public function revokeM2MClient(string $client, array $query = [], ?RequestOptions $options = null): mixed
    {
        return $this->client->request("revokeM2MClient", [$client], $query, null, $options);
    }

    /** POST /v1/m2m_clients/{client}/rotate_secret */
    public function rotateM2MClientSecret(string $client, mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\M2MClientWithSecret
    {
        return \OhAuthCat\Models\M2MClientWithSecret::fromJson($this->client->request("rotateM2MClientSecret", [$client], $query, $body, $options));
    }

    /** PATCH /v1/m2m_clients/{client} */
    public function updateM2MClient(string $client, mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\M2MClient
    {
        return \OhAuthCat\Models\M2MClient::fromJson($this->client->request("updateM2MClient", [$client], $query, $body, $options));
    }
}
