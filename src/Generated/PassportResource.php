<?php

// Generated from spec/openapi-v1.yaml (core c9fe6d0b5dde). Regenerate; do not edit.

declare(strict_types=1);

namespace OhAuthCat\Generated;

use OhAuthCat\OhAuthCatClient;
use OhAuthCat\RequestOptions;

final class PassportResource
{
    public function __construct(private readonly OhAuthCatClient $client)
    {
    }

    /** GET /v1/passport/links */
    public function listPassportLinks(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\PassportLinkList
    {
        return \OhAuthCat\Models\PassportLinkList::fromJson($this->client->request("listPassportLinks", [], $query, null, $options));
    }

    /** @return \Generator<int, \OhAuthCat\Models\PassportLink> every item across pages, following next_cursor. */
    public function listPassportLinksAutoPaging(array $query = [], ?RequestOptions $options = null): \Generator
    {
        return $this->client->paginate("listPassportLinks", [], $query, $options, \OhAuthCat\Models\PassportLink::class);
    }

    /** DELETE /v1/passport/links/{link} */
    public function revokePassportLink(string $link, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\PassportLink
    {
        return \OhAuthCat\Models\PassportLink::fromJson($this->client->request("revokePassportLink", [$link], $query, null, $options));
    }
}
