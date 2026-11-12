<?php

// Generated from spec/openapi-v1.yaml (core c9fe6d0b5dde). Regenerate; do not edit.

declare(strict_types=1);

namespace OhAuthCat\Generated;

use OhAuthCat\OhAuthCatClient;
use OhAuthCat\RequestOptions;

final class PortalResource
{
    public function __construct(private readonly OhAuthCatClient $client)
    {
    }

    /** POST /v1/portal/invites */
    public function createPortalInvite(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\PortalInvite
    {
        return \OhAuthCat\Models\PortalInvite::fromJson($this->client->request("createPortalInvite", [], $query, $body, $options));
    }

    /** POST /v1/portal/links */
    public function createPortalLink(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\PortalLink
    {
        return \OhAuthCat\Models\PortalLink::fromJson($this->client->request("createPortalLink", [], $query, $body, $options));
    }

    /** GET /v1/portal/invites */
    public function listPortalInvites(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\PortalInviteList
    {
        return \OhAuthCat\Models\PortalInviteList::fromJson($this->client->request("listPortalInvites", [], $query, null, $options));
    }

    /** @return \Generator<int, \OhAuthCat\Models\PortalInvite> every item across pages, following next_cursor. */
    public function listPortalInvitesAutoPaging(array $query = [], ?RequestOptions $options = null): \Generator
    {
        return $this->client->paginate("listPortalInvites", [], $query, $options, \OhAuthCat\Models\PortalInvite::class);
    }

    /** GET /v1/portal/links */
    public function listPortalLinks(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\PortalLinkInfoList
    {
        return \OhAuthCat\Models\PortalLinkInfoList::fromJson($this->client->request("listPortalLinks", [], $query, null, $options));
    }

    /** @return \Generator<int, \OhAuthCat\Models\PortalLinkInfo> every item across pages, following next_cursor. */
    public function listPortalLinksAutoPaging(array $query = [], ?RequestOptions $options = null): \Generator
    {
        return $this->client->paginate("listPortalLinks", [], $query, $options, \OhAuthCat\Models\PortalLinkInfo::class);
    }

    /** POST /v1/portal/invites/{invite}/resend */
    public function resendPortalInvite(string $invite, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\PortalInvite
    {
        return \OhAuthCat\Models\PortalInvite::fromJson($this->client->request("resendPortalInvite", [$invite], $query, null, $options));
    }

    /** POST /v1/portal/invites/{invite}/revoke */
    public function revokePortalInvite(string $invite, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\PortalInvite
    {
        return \OhAuthCat\Models\PortalInvite::fromJson($this->client->request("revokePortalInvite", [$invite], $query, null, $options));
    }

    /** POST /v1/portal/links/{link}/revoke */
    public function revokePortalLink(string $link, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\PortalLinkInfo
    {
        return \OhAuthCat\Models\PortalLinkInfo::fromJson($this->client->request("revokePortalLink", [$link], $query, null, $options));
    }
}
