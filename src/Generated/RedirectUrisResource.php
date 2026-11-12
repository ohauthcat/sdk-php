<?php

// Generated from spec/openapi-v1.yaml (core c9fe6d0b5dde). Regenerate; do not edit.

declare(strict_types=1);

namespace OhAuthCat\Generated;

use OhAuthCat\OhAuthCatClient;
use OhAuthCat\RequestOptions;

final class RedirectUrisResource
{
    public function __construct(private readonly OhAuthCatClient $client)
    {
    }

    /** POST /v1/redirect_uris */
    public function createRedirectUri(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\RedirectUri
    {
        return \OhAuthCat\Models\RedirectUri::fromJson($this->client->request("createRedirectUri", [], $query, $body, $options));
    }

    /** DELETE /v1/redirect_uris/{uri} */
    public function deleteRedirectUri(string $uri, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Deleted
    {
        return \OhAuthCat\Models\Deleted::fromJson($this->client->request("deleteRedirectUri", [$uri], $query, null, $options));
    }

    /** GET /v1/redirect_uris */
    public function listRedirectUris(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\RedirectUriList
    {
        return \OhAuthCat\Models\RedirectUriList::fromJson($this->client->request("listRedirectUris", [], $query, null, $options));
    }

    /** @return \Generator<int, \OhAuthCat\Models\RedirectUri> every item across pages, following next_cursor. */
    public function listRedirectUrisAutoPaging(array $query = [], ?RequestOptions $options = null): \Generator
    {
        return $this->client->paginate("listRedirectUris", [], $query, $options, \OhAuthCat\Models\RedirectUri::class);
    }
}
