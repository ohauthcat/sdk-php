<?php

// Generated from spec/openapi-v1.yaml (core c9fe6d0b5dde). Regenerate; do not edit.

declare(strict_types=1);

namespace OhAuthCat\Generated;

use OhAuthCat\OhAuthCatClient;
use OhAuthCat\RequestOptions;

final class UsersResource
{
    public function __construct(private readonly OhAuthCatClient $client)
    {
    }

    /** DELETE /v1/users/{user}/password */
    public function clearEndUserPassword(string $user, array $query = [], ?RequestOptions $options = null): mixed
    {
        return $this->client->request("clearEndUserPassword", [$user], $query, null, $options);
    }

    /** POST /v1/users */
    public function createEndUser(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\EndUser
    {
        return \OhAuthCat\Models\EndUser::fromJson($this->client->request("createEndUser", [], $query, $body, $options));
    }

    /** DELETE /v1/users/{user} */
    public function deleteEndUser(string $user, array $query = [], ?RequestOptions $options = null): mixed
    {
        return $this->client->request("deleteEndUser", [$user], $query, null, $options);
    }

    /** DELETE /v1/users/{user}/factors/{factor} */
    public function deleteEndUserFactor(string $user, string $factor, array $query = [], ?RequestOptions $options = null): mixed
    {
        return $this->client->request("deleteEndUserFactor", [$user, $factor], $query, null, $options);
    }

    /** GET /v1/users/{user} */
    public function getEndUser(string $user, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\EndUser
    {
        return \OhAuthCat\Models\EndUser::fromJson($this->client->request("getEndUser", [$user], $query, null, $options));
    }

    /** GET /v1/users/{user}/factors */
    public function listEndUserFactors(string $user, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\EndUserFactorList
    {
        return \OhAuthCat\Models\EndUserFactorList::fromJson($this->client->request("listEndUserFactors", [$user], $query, null, $options));
    }

    /** GET /v1/users/{user}/identities */
    public function listEndUserIdentities(string $user, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\EndUserIdentityList
    {
        return \OhAuthCat\Models\EndUserIdentityList::fromJson($this->client->request("listEndUserIdentities", [$user], $query, null, $options));
    }

    /** GET /v1/users/{user}/sessions */
    public function listEndUserSessions(string $user, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\EndUserSessionList
    {
        return \OhAuthCat\Models\EndUserSessionList::fromJson($this->client->request("listEndUserSessions", [$user], $query, null, $options));
    }

    /** GET /v1/users */
    public function listEndUsers(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\EndUserList
    {
        return \OhAuthCat\Models\EndUserList::fromJson($this->client->request("listEndUsers", [], $query, null, $options));
    }

    /** @return \Generator<int, \OhAuthCat\Models\EndUser> every item across pages, following next_cursor. */
    public function listEndUsersAutoPaging(array $query = [], ?RequestOptions $options = null): \Generator
    {
        return $this->client->paginate("listEndUsers", [], $query, $options, \OhAuthCat\Models\EndUser::class);
    }

    /** POST /v1/users/{user}/passkeys */
    public function registerEndUserPasskey(string $user, mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\EndUserFactor
    {
        return \OhAuthCat\Models\EndUserFactor::fromJson($this->client->request("registerEndUserPasskey", [$user], $query, $body, $options));
    }

    /** DELETE /v1/users/{user}/sessions/{session} */
    public function revokeEndUserSession(string $user, string $session, array $query = [], ?RequestOptions $options = null): mixed
    {
        return $this->client->request("revokeEndUserSession", [$user, $session], $query, null, $options);
    }

    /** DELETE /v1/users/{user}/sessions */
    public function revokeEndUserSessions(string $user, array $query = [], ?RequestOptions $options = null): mixed
    {
        return $this->client->request("revokeEndUserSessions", [$user], $query, null, $options);
    }

    /** PUT /v1/users/{user}/password */
    public function setEndUserPassword(string $user, mixed $body, array $query = [], ?RequestOptions $options = null): mixed
    {
        return $this->client->request("setEndUserPassword", [$user], $query, $body, $options);
    }

    /** POST /v1/users/{user}/passkeys/registration_options */
    public function startEndUserPasskeyRegistration(string $user, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\WebAuthnOptions
    {
        return \OhAuthCat\Models\WebAuthnOptions::fromJson($this->client->request("startEndUserPasskeyRegistration", [$user], $query, null, $options));
    }

    /** PATCH /v1/users/{user} */
    public function updateEndUser(string $user, mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\EndUser
    {
        return \OhAuthCat\Models\EndUser::fromJson($this->client->request("updateEndUser", [$user], $query, $body, $options));
    }

    /** PATCH /v1/users/{user}/passkeys/{passkey} */
    public function updateEndUserPasskey(string $user, string $passkey, mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\EndUserFactor
    {
        return \OhAuthCat\Models\EndUserFactor::fromJson($this->client->request("updateEndUserPasskey", [$user, $passkey], $query, $body, $options));
    }
}
