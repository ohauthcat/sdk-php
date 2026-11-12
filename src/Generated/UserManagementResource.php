<?php

// Generated from spec/openapi-v1.yaml (core c9fe6d0b5dde). Regenerate; do not edit.

declare(strict_types=1);

namespace OhAuthCat\Generated;

use OhAuthCat\OhAuthCatClient;
use OhAuthCat\RequestOptions;

final class UserManagementResource
{
    public function __construct(private readonly OhAuthCatClient $client)
    {
    }

    /** POST /v1/user_management/passkeys/authenticate */
    public function authenticateEndUserPasskey(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\EndUserPasskeyAuthentication
    {
        return \OhAuthCat\Models\EndUserPasskeyAuthentication::fromJson($this->client->request("authenticateEndUserPasskey", [], $query, $body, $options));
    }

    /** DELETE /v1/user_management/social_providers/{provider} */
    public function deleteSocialProvider(string $provider, array $query = [], ?RequestOptions $options = null): mixed
    {
        return $this->client->request("deleteSocialProvider", [$provider], $query, null, $options);
    }

    /** GET /v1/user_management/bot_protection */
    public function getBotProtection(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\BotProtectionSettings
    {
        return \OhAuthCat\Models\BotProtectionSettings::fromJson($this->client->request("getBotProtection", [], $query, null, $options));
    }

    /** GET /v1/user_management/settings */
    public function getUserManagementSettings(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\UserManagementSettings
    {
        return \OhAuthCat\Models\UserManagementSettings::fromJson($this->client->request("getUserManagementSettings", [], $query, null, $options));
    }

    /** GET /v1/user_management/usage */
    public function getUserManagementUsage(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\UserManagementUsage
    {
        return \OhAuthCat\Models\UserManagementUsage::fromJson($this->client->request("getUserManagementUsage", [], $query, null, $options));
    }

    /** GET /v1/user_management/bot_detections */
    public function listBotDetections(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\BotDetectionList
    {
        return \OhAuthCat\Models\BotDetectionList::fromJson($this->client->request("listBotDetections", [], $query, null, $options));
    }

    /** @return \Generator<int, \OhAuthCat\Models\BotDetection> every item across pages, following next_cursor. */
    public function listBotDetectionsAutoPaging(array $query = [], ?RequestOptions $options = null): \Generator
    {
        return $this->client->paginate("listBotDetections", [], $query, $options, \OhAuthCat\Models\BotDetection::class);
    }

    /** GET /v1/user_management/social_providers */
    public function listSocialProviders(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\SocialProviderList
    {
        return \OhAuthCat\Models\SocialProviderList::fromJson($this->client->request("listSocialProviders", [], $query, null, $options));
    }

    /** POST /v1/user_management/passkeys/authentication_options */
    public function startEndUserPasskeyAuthentication(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\WebAuthnOptions
    {
        return \OhAuthCat\Models\WebAuthnOptions::fromJson($this->client->request("startEndUserPasskeyAuthentication", [], $query, null, $options));
    }

    /** PUT /v1/user_management/bot_protection */
    public function updateBotProtection(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\BotProtectionSettings
    {
        return \OhAuthCat\Models\BotProtectionSettings::fromJson($this->client->request("updateBotProtection", [], $query, $body, $options));
    }

    /** PUT /v1/user_management/social_providers/{provider} */
    public function updateSocialProvider(string $provider, mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\SocialProvider
    {
        return \OhAuthCat\Models\SocialProvider::fromJson($this->client->request("updateSocialProvider", [$provider], $query, $body, $options));
    }

    /** PUT /v1/user_management/settings */
    public function updateUserManagementSettings(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\UserManagementSettings
    {
        return \OhAuthCat\Models\UserManagementSettings::fromJson($this->client->request("updateUserManagementSettings", [], $query, $body, $options));
    }
}
