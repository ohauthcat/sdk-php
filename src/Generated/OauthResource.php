<?php

// Generated from spec/openapi-v1.yaml (core c9fe6d0b5dde). Regenerate; do not edit.

declare(strict_types=1);

namespace OhAuthCat\Generated;

use OhAuthCat\OhAuthCatClient;
use OhAuthCat\RequestOptions;

final class OauthResource
{
    public function __construct(private readonly OhAuthCatClient $client)
    {
    }

    /** POST /v1/oauth/clients */
    public function createOAuthClient(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\OAuthClientCreated
    {
        return \OhAuthCat\Models\OAuthClientCreated::fromJson($this->client->request("createOAuthClient", [], $query, $body, $options));
    }

    /** POST /v1/oauth/resources */
    public function createOAuthResource(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\OAuthResource
    {
        return \OhAuthCat\Models\OAuthResource::fromJson($this->client->request("createOAuthResource", [], $query, $body, $options));
    }

    /** DELETE /v1/oauth/clients/{client} */
    public function deleteOAuthClient(string $client, array $query = [], ?RequestOptions $options = null): mixed
    {
        return $this->client->request("deleteOAuthClient", [$client], $query, null, $options);
    }

    /** DELETE /v1/oauth/resources/{resource} */
    public function deleteOAuthResource(string $resource, array $query = [], ?RequestOptions $options = null): mixed
    {
        return $this->client->request("deleteOAuthResource", [$resource], $query, null, $options);
    }

    /** DELETE /v1/oauth/scopes/{scope} */
    public function deleteOAuthScope(string $scope, array $query = [], ?RequestOptions $options = null): mixed
    {
        return $this->client->request("deleteOAuthScope", [$scope], $query, null, $options);
    }

    /** GET /v1/oauth/clients/{client} */
    public function getOAuthClient(string $client, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\OAuthClient
    {
        return \OhAuthCat\Models\OAuthClient::fromJson($this->client->request("getOAuthClient", [$client], $query, null, $options));
    }

    /** GET /v1/oauth/resources/{resource}/protected_resource_metadata */
    public function getOAuthProtectedResourceMetadata(string $resource, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\OAuthProtectedResourceMetadata
    {
        return \OhAuthCat\Models\OAuthProtectedResourceMetadata::fromJson($this->client->request("getOAuthProtectedResourceMetadata", [$resource], $query, null, $options));
    }

    /** GET /v1/oauth/resources/{resource} */
    public function getOAuthResource(string $resource, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\OAuthResource
    {
        return \OhAuthCat\Models\OAuthResource::fromJson($this->client->request("getOAuthResource", [$resource], $query, null, $options));
    }

    /** GET /v1/oauth/clients */
    public function listOAuthClients(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\OAuthClientList
    {
        return \OhAuthCat\Models\OAuthClientList::fromJson($this->client->request("listOAuthClients", [], $query, null, $options));
    }

    /** @return \Generator<int, \OhAuthCat\Models\OAuthClient> every item across pages, following next_cursor. */
    public function listOAuthClientsAutoPaging(array $query = [], ?RequestOptions $options = null): \Generator
    {
        return $this->client->paginate("listOAuthClients", [], $query, $options, \OhAuthCat\Models\OAuthClient::class);
    }

    /** GET /v1/oauth/grants */
    public function listOAuthGrants(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\OAuthGrantList
    {
        return \OhAuthCat\Models\OAuthGrantList::fromJson($this->client->request("listOAuthGrants", [], $query, null, $options));
    }

    /** @return \Generator<int, \OhAuthCat\Models\OAuthGrant> every item across pages, following next_cursor. */
    public function listOAuthGrantsAutoPaging(array $query = [], ?RequestOptions $options = null): \Generator
    {
        return $this->client->paginate("listOAuthGrants", [], $query, $options, \OhAuthCat\Models\OAuthGrant::class);
    }

    /** GET /v1/oauth/resources */
    public function listOAuthResources(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\OAuthResourceList
    {
        return \OhAuthCat\Models\OAuthResourceList::fromJson($this->client->request("listOAuthResources", [], $query, null, $options));
    }

    /** GET /v1/oauth/scopes */
    public function listOAuthScopes(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\OAuthScopeList
    {
        return \OhAuthCat\Models\OAuthScopeList::fromJson($this->client->request("listOAuthScopes", [], $query, null, $options));
    }

    /** PUT /v1/oauth/scopes/{scope} */
    public function putOAuthScope(string $scope, mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\OAuthScope
    {
        return \OhAuthCat\Models\OAuthScope::fromJson($this->client->request("putOAuthScope", [$scope], $query, $body, $options));
    }

    /** DELETE /v1/oauth/grants/{grant} */
    public function revokeOAuthGrant(string $grant, array $query = [], ?RequestOptions $options = null): mixed
    {
        return $this->client->request("revokeOAuthGrant", [$grant], $query, null, $options);
    }

    /** POST /v1/oauth/clients/{client}/secret */
    public function rotateOAuthClientSecret(string $client, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\OAuthClientSecret
    {
        return \OhAuthCat\Models\OAuthClientSecret::fromJson($this->client->request("rotateOAuthClientSecret", [$client], $query, null, $options));
    }

    /** PUT /v1/oauth/clients/{client} */
    public function updateOAuthClient(string $client, mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\OAuthClient
    {
        return \OhAuthCat\Models\OAuthClient::fromJson($this->client->request("updateOAuthClient", [$client], $query, $body, $options));
    }

    /** PUT /v1/oauth/resources/{resource} */
    public function updateOAuthResource(string $resource, mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\OAuthResource
    {
        return \OhAuthCat\Models\OAuthResource::fromJson($this->client->request("updateOAuthResource", [$resource], $query, $body, $options));
    }
}
