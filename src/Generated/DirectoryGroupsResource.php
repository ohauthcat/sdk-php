<?php

// Generated from spec/openapi-v1.yaml (core c9fe6d0b5dde). Regenerate; do not edit.

declare(strict_types=1);

namespace OhAuthCat\Generated;

use OhAuthCat\OhAuthCatClient;
use OhAuthCat\RequestOptions;

final class DirectoryGroupsResource
{
    public function __construct(private readonly OhAuthCatClient $client)
    {
    }

    /** GET /v1/directory_groups/{group} */
    public function getDirectoryGroup(string $group, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\DirectoryGroup
    {
        return \OhAuthCat\Models\DirectoryGroup::fromJson($this->client->request("getDirectoryGroup", [$group], $query, null, $options));
    }

    /** GET /v1/directory_groups/{group}/members */
    public function listDirectoryGroupMembers(string $group, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\DirectoryUserList
    {
        return \OhAuthCat\Models\DirectoryUserList::fromJson($this->client->request("listDirectoryGroupMembers", [$group], $query, null, $options));
    }

    /** @return \Generator<int, \OhAuthCat\Models\DirectoryUser> every item across pages, following next_cursor. */
    public function listDirectoryGroupMembersAutoPaging(string $group, array $query = [], ?RequestOptions $options = null): \Generator
    {
        return $this->client->paginate("listDirectoryGroupMembers", [$group], $query, $options, \OhAuthCat\Models\DirectoryUser::class);
    }
}
