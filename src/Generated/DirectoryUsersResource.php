<?php

// Generated from spec/openapi-v1.yaml (core c9fe6d0b5dde). Regenerate; do not edit.

declare(strict_types=1);

namespace OhAuthCat\Generated;

use OhAuthCat\OhAuthCatClient;
use OhAuthCat\RequestOptions;

final class DirectoryUsersResource
{
    public function __construct(private readonly OhAuthCatClient $client)
    {
    }

    /** GET /v1/directory_users/{user} */
    public function getDirectoryUser(string $user, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\DirectoryUser
    {
        return \OhAuthCat\Models\DirectoryUser::fromJson($this->client->request("getDirectoryUser", [$user], $query, null, $options));
    }

    /** GET /v1/directory_users/{user}/groups */
    public function listDirectoryUserGroups(string $user, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\DirectoryGroupList
    {
        return \OhAuthCat\Models\DirectoryGroupList::fromJson($this->client->request("listDirectoryUserGroups", [$user], $query, null, $options));
    }

    /** @return \Generator<int, \OhAuthCat\Models\DirectoryGroup> every item across pages, following next_cursor. */
    public function listDirectoryUserGroupsAutoPaging(string $user, array $query = [], ?RequestOptions $options = null): \Generator
    {
        return $this->client->paginate("listDirectoryUserGroups", [$user], $query, $options, \OhAuthCat\Models\DirectoryGroup::class);
    }
}
