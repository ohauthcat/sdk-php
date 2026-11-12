<?php

// Generated from spec/openapi-v1.yaml (core c9fe6d0b5dde). Regenerate; do not edit.

declare(strict_types=1);

namespace OhAuthCat\Generated;

use OhAuthCat\OhAuthCatClient;
use OhAuthCat\RequestOptions;

final class PortalProfilesResource
{
    public function __construct(private readonly OhAuthCatClient $client)
    {
    }

    /** POST /v1/portal_profiles */
    public function createPortalProfile(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\PortalProfile
    {
        return \OhAuthCat\Models\PortalProfile::fromJson($this->client->request("createPortalProfile", [], $query, $body, $options));
    }

    /** DELETE /v1/portal_profiles/{profile} */
    public function deletePortalProfile(string $profile, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Deleted
    {
        return \OhAuthCat\Models\Deleted::fromJson($this->client->request("deletePortalProfile", [$profile], $query, null, $options));
    }

    /** GET /v1/portal_profiles/{profile} */
    public function getPortalProfile(string $profile, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\PortalProfile
    {
        return \OhAuthCat\Models\PortalProfile::fromJson($this->client->request("getPortalProfile", [$profile], $query, null, $options));
    }

    /** GET /v1/portal_profiles */
    public function listPortalProfiles(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\PortalProfileList
    {
        return \OhAuthCat\Models\PortalProfileList::fromJson($this->client->request("listPortalProfiles", [], $query, null, $options));
    }

    /** PUT /v1/portal_profiles/{profile} */
    public function replacePortalProfile(string $profile, mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\PortalProfile
    {
        return \OhAuthCat\Models\PortalProfile::fromJson($this->client->request("replacePortalProfile", [$profile], $query, $body, $options));
    }
}
