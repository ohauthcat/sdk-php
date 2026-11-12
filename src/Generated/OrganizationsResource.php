<?php

// Generated from spec/openapi-v1.yaml (core c9fe6d0b5dde). Regenerate; do not edit.

declare(strict_types=1);

namespace OhAuthCat\Generated;

use OhAuthCat\OhAuthCatClient;
use OhAuthCat\RequestOptions;

final class OrganizationsResource
{
    public function __construct(private readonly OhAuthCatClient $client)
    {
    }

    /** POST /v1/organizations/{org}/memberships */
    public function createMembership(string $org, mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Membership
    {
        return \OhAuthCat\Models\Membership::fromJson($this->client->request("createMembership", [$org], $query, $body, $options));
    }

    /** POST /v1/organizations */
    public function createOrganization(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Organization
    {
        return \OhAuthCat\Models\Organization::fromJson($this->client->request("createOrganization", [], $query, $body, $options));
    }

    /** POST /v1/organizations/{org}/api_keys */
    public function createOrganizationApiKey(string $org, mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\ApiKeySecret
    {
        return \OhAuthCat\Models\ApiKeySecret::fromJson($this->client->request("createOrganizationApiKey", [$org], $query, $body, $options));
    }

    /** POST /v1/organizations/{org}/api_keys/{key}/secrets */
    public function createOrganizationApiKeySecret(string $org, string $key, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\ApiKeyExtraSecretCreated
    {
        return \OhAuthCat\Models\ApiKeyExtraSecretCreated::fromJson($this->client->request("createOrganizationApiKeySecret", [$org, $key], $query, null, $options));
    }

    /** POST /v1/organizations/{org}/memberships/{membership}/role_assignments */
    public function createRoleAssignment(string $org, string $membership, mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\RoleAssignment
    {
        return \OhAuthCat\Models\RoleAssignment::fromJson($this->client->request("createRoleAssignment", [$org, $membership], $query, $body, $options));
    }

    /** DELETE /v1/organizations/{org}/memberships/{membership} */
    public function deleteMembership(string $org, string $membership, array $query = [], ?RequestOptions $options = null): mixed
    {
        return $this->client->request("deleteMembership", [$org, $membership], $query, null, $options);
    }

    /** DELETE /v1/organizations/{org} */
    public function deleteOrganization(string $org, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Deleted
    {
        return \OhAuthCat\Models\Deleted::fromJson($this->client->request("deleteOrganization", [$org], $query, null, $options));
    }

    /** DELETE /v1/organizations/{org}/user_management_settings */
    public function deleteOrganizationUserManagementSettings(string $org, array $query = [], ?RequestOptions $options = null): mixed
    {
        return $this->client->request("deleteOrganizationUserManagementSettings", [$org], $query, null, $options);
    }

    /** DELETE /v1/organizations/{org}/memberships/{membership}/role_assignments/{assignment} */
    public function deleteRoleAssignment(string $org, string $membership, string $assignment, array $query = [], ?RequestOptions $options = null): mixed
    {
        return $this->client->request("deleteRoleAssignment", [$org, $membership, $assignment], $query, null, $options);
    }

    /** GET /v1/organizations/{org} */
    public function getOrganization(string $org, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Organization
    {
        return \OhAuthCat\Models\Organization::fromJson($this->client->request("getOrganization", [$org], $query, null, $options));
    }

    /** GET /v1/organizations/{org}/allowed_intents */
    public function getOrganizationAllowedIntents(string $org, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\OrganizationAllowedIntents
    {
        return \OhAuthCat\Models\OrganizationAllowedIntents::fromJson($this->client->request("getOrganizationAllowedIntents", [$org], $query, null, $options));
    }

    /** GET /v1/organizations/{org}/api_keys/{key} */
    public function getOrganizationApiKey(string $org, string $key, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\ApiKey
    {
        return \OhAuthCat\Models\ApiKey::fromJson($this->client->request("getOrganizationApiKey", [$org, $key], $query, null, $options));
    }

    /** GET /v1/organizations/{org}/oauth_settings */
    public function getOrganizationOAuthSettings(string $org, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\OrganizationOAuthSettings
    {
        return \OhAuthCat\Models\OrganizationOAuthSettings::fromJson($this->client->request("getOrganizationOAuthSettings", [$org], $query, null, $options));
    }

    /** GET /v1/organizations/{org}/profile */
    public function getOrganizationProfile(string $org, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\OrganizationProfile
    {
        return \OhAuthCat\Models\OrganizationProfile::fromJson($this->client->request("getOrganizationProfile", [$org], $query, null, $options));
    }

    /** GET /v1/organizations/{org}/status */
    public function getOrganizationStatus(string $org, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\OrganizationSetupStatus
    {
        return \OhAuthCat\Models\OrganizationSetupStatus::fromJson($this->client->request("getOrganizationStatus", [$org], $query, null, $options));
    }

    /** GET /v1/organizations/{org}/user_management_settings */
    public function getOrganizationUserManagementSettings(string $org, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\OrganizationUserManagementSettings
    {
        return \OhAuthCat\Models\OrganizationUserManagementSettings::fromJson($this->client->request("getOrganizationUserManagementSettings", [$org], $query, null, $options));
    }

    /** GET /v1/organizations/{org}/memberships/{membership}/permissions */
    public function listMembershipPermissions(string $org, string $membership, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\MembershipPermissions
    {
        return \OhAuthCat\Models\MembershipPermissions::fromJson($this->client->request("listMembershipPermissions", [$org, $membership], $query, null, $options));
    }

    /** GET /v1/organizations/{org}/memberships */
    public function listMemberships(string $org, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\MembershipList
    {
        return \OhAuthCat\Models\MembershipList::fromJson($this->client->request("listMemberships", [$org], $query, null, $options));
    }

    /** @return \Generator<int, \OhAuthCat\Models\Membership> every item across pages, following next_cursor. */
    public function listMembershipsAutoPaging(string $org, array $query = [], ?RequestOptions $options = null): \Generator
    {
        return $this->client->paginate("listMemberships", [$org], $query, $options, \OhAuthCat\Models\Membership::class);
    }

    /** GET /v1/organizations/{org}/api_keys/{key}/secrets */
    public function listOrganizationApiKeySecrets(string $org, string $key, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\ApiKeySecretList
    {
        return \OhAuthCat\Models\ApiKeySecretList::fromJson($this->client->request("listOrganizationApiKeySecrets", [$org, $key], $query, null, $options));
    }

    /** GET /v1/organizations/{org}/api_keys */
    public function listOrganizationApiKeys(string $org, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\ApiKeyList
    {
        return \OhAuthCat\Models\ApiKeyList::fromJson($this->client->request("listOrganizationApiKeys", [$org], $query, null, $options));
    }

    /** @return \Generator<int, \OhAuthCat\Models\ApiKey> every item across pages, following next_cursor. */
    public function listOrganizationApiKeysAutoPaging(string $org, array $query = [], ?RequestOptions $options = null): \Generator
    {
        return $this->client->paginate("listOrganizationApiKeys", [$org], $query, $options, \OhAuthCat\Models\ApiKey::class);
    }

    /** GET /v1/organizations/{org}/events */
    public function listOrganizationEvents(string $org, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\EventList
    {
        return \OhAuthCat\Models\EventList::fromJson($this->client->request("listOrganizationEvents", [$org], $query, null, $options));
    }

    /** @return \Generator<int, \OhAuthCat\Models\Event> every item across pages, following next_cursor. */
    public function listOrganizationEventsAutoPaging(string $org, array $query = [], ?RequestOptions $options = null): \Generator
    {
        return $this->client->paginate("listOrganizationEvents", [$org], $query, $options, \OhAuthCat\Models\Event::class);
    }

    /** GET /v1/organizations */
    public function listOrganizations(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\OrganizationList
    {
        return \OhAuthCat\Models\OrganizationList::fromJson($this->client->request("listOrganizations", [], $query, null, $options));
    }

    /** @return \Generator<int, \OhAuthCat\Models\Organization> every item across pages, following next_cursor. */
    public function listOrganizationsAutoPaging(array $query = [], ?RequestOptions $options = null): \Generator
    {
        return $this->client->paginate("listOrganizations", [], $query, $options, \OhAuthCat\Models\Organization::class);
    }

    /** GET /v1/organizations/{org}/memberships/{membership}/role_assignments */
    public function listRoleAssignments(string $org, string $membership, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\RoleAssignmentList
    {
        return \OhAuthCat\Models\RoleAssignmentList::fromJson($this->client->request("listRoleAssignments", [$org, $membership], $query, null, $options));
    }

    /** POST /v1/organizations/{org}/api_keys/{key}/revoke */
    public function revokeOrganizationApiKey(string $org, string $key, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\ApiKey
    {
        return \OhAuthCat\Models\ApiKey::fromJson($this->client->request("revokeOrganizationApiKey", [$org, $key], $query, null, $options));
    }

    /** POST /v1/organizations/{org}/api_keys/{key}/secrets/{secret}/revoke */
    public function revokeOrganizationApiKeySecret(string $org, string $key, string $secret, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\ApiKeyExtraSecret
    {
        return \OhAuthCat\Models\ApiKeyExtraSecret::fromJson($this->client->request("revokeOrganizationApiKeySecret", [$org, $key, $secret], $query, null, $options));
    }

    /** POST /v1/organizations/{org}/oauth_grants/revoke */
    public function revokeOrganizationOAuthGrants(string $org, mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\OAuthOrganizationRevokeResult
    {
        return \OhAuthCat\Models\OAuthOrganizationRevokeResult::fromJson($this->client->request("revokeOrganizationOAuthGrants", [$org], $query, $body, $options));
    }

    /** POST /v1/organizations/{org}/api_keys/{key}/roll */
    public function rollOrganizationApiKey(string $org, string $key, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\ApiKeySecret
    {
        return \OhAuthCat\Models\ApiKeySecret::fromJson($this->client->request("rollOrganizationApiKey", [$org, $key], $query, null, $options));
    }

    /** PUT /v1/organizations/{org}/allowed_intents */
    public function setOrganizationAllowedIntents(string $org, mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\OrganizationAllowedIntents
    {
        return \OhAuthCat\Models\OrganizationAllowedIntents::fromJson($this->client->request("setOrganizationAllowedIntents", [$org], $query, $body, $options));
    }

    /** PATCH /v1/organizations/{org}/memberships/{membership} */
    public function updateMembership(string $org, string $membership, mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Membership
    {
        return \OhAuthCat\Models\Membership::fromJson($this->client->request("updateMembership", [$org, $membership], $query, $body, $options));
    }

    /** PATCH /v1/organizations/{org} */
    public function updateOrganization(string $org, mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Organization
    {
        return \OhAuthCat\Models\Organization::fromJson($this->client->request("updateOrganization", [$org], $query, $body, $options));
    }

    /** PUT /v1/organizations/{org}/oauth_settings */
    public function updateOrganizationOAuthSettings(string $org, mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\OrganizationOAuthSettings
    {
        return \OhAuthCat\Models\OrganizationOAuthSettings::fromJson($this->client->request("updateOrganizationOAuthSettings", [$org], $query, $body, $options));
    }

    /** PATCH /v1/organizations/{org}/profile */
    public function updateOrganizationProfile(string $org, mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\OrganizationProfile
    {
        return \OhAuthCat\Models\OrganizationProfile::fromJson($this->client->request("updateOrganizationProfile", [$org], $query, $body, $options));
    }

    /** PUT /v1/organizations/{org}/user_management_settings */
    public function updateOrganizationUserManagementSettings(string $org, mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\OrganizationUserManagementSettings
    {
        return \OhAuthCat\Models\OrganizationUserManagementSettings::fromJson($this->client->request("updateOrganizationUserManagementSettings", [$org], $query, $body, $options));
    }
}
