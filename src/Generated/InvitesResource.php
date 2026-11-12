<?php

// Generated from spec/openapi-v1.yaml (core c9fe6d0b5dde). Regenerate; do not edit.

declare(strict_types=1);

namespace OhAuthCat\Generated;

use OhAuthCat\OhAuthCatClient;
use OhAuthCat\RequestOptions;

final class InvitesResource
{
    public function __construct(private readonly OhAuthCatClient $client)
    {
    }

    /** POST /v1/invites */
    public function createEndUserInvite(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\EndUserInviteCreated
    {
        return \OhAuthCat\Models\EndUserInviteCreated::fromJson($this->client->request("createEndUserInvite", [], $query, $body, $options));
    }

    /** GET /v1/invites */
    public function listEndUserInvites(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\EndUserInviteList
    {
        return \OhAuthCat\Models\EndUserInviteList::fromJson($this->client->request("listEndUserInvites", [], $query, null, $options));
    }

    /** @return \Generator<int, \OhAuthCat\Models\EndUserInvite> every item across pages, following next_cursor. */
    public function listEndUserInvitesAutoPaging(array $query = [], ?RequestOptions $options = null): \Generator
    {
        return $this->client->paginate("listEndUserInvites", [], $query, $options, \OhAuthCat\Models\EndUserInvite::class);
    }

    /** POST /v1/invites/{invite}/revoke */
    public function revokeEndUserInvite(string $invite, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\EndUserInvite
    {
        return \OhAuthCat\Models\EndUserInvite::fromJson($this->client->request("revokeEndUserInvite", [$invite], $query, null, $options));
    }
}
