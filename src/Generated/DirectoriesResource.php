<?php

// Generated from spec/openapi-v1.yaml (core c9fe6d0b5dde). Regenerate; do not edit.

declare(strict_types=1);

namespace OhAuthCat\Generated;

use OhAuthCat\OhAuthCatClient;
use OhAuthCat\RequestOptions;

final class DirectoriesResource
{
    public function __construct(private readonly OhAuthCatClient $client)
    {
    }

    /** POST /v1/directories/{dir}/source/oauth/company */
    public function chooseDirectorySourceOAuthCompany(string $dir, mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\DirectorySourceOAuth
    {
        return \OhAuthCat\Models\DirectorySourceOAuth::fromJson($this->client->request("chooseDirectorySourceOAuthCompany", [$dir], $query, $body, $options));
    }

    /** POST /v1/directories */
    public function createDirectory(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\DirectoryCredentials
    {
        return \OhAuthCat\Models\DirectoryCredentials::fromJson($this->client->request("createDirectory", [], $query, $body, $options));
    }

    /** POST /v1/directories/{dir}/source/ssh_key */
    public function createDirectorySourceSSHKey(string $dir, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\DirectorySourceSSHKey
    {
        return \OhAuthCat\Models\DirectorySourceSSHKey::fromJson($this->client->request("createDirectorySourceSSHKey", [$dir], $query, null, $options));
    }

    /** DELETE /v1/directories/{dir} */
    public function deleteDirectory(string $dir, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Deleted
    {
        return \OhAuthCat\Models\Deleted::fromJson($this->client->request("deleteDirectory", [$dir], $query, null, $options));
    }

    /** GET /v1/directories/{dir} */
    public function getDirectory(string $dir, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Directory
    {
        return \OhAuthCat\Models\Directory::fromJson($this->client->request("getDirectory", [$dir], $query, null, $options));
    }

    /** GET /v1/directories/{dir}/attribute_map */
    public function getDirectoryAttributeMap(string $dir, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\CustomAttributeMap
    {
        return \OhAuthCat\Models\CustomAttributeMap::fromJson($this->client->request("getDirectoryAttributeMap", [$dir], $query, null, $options));
    }

    /** GET /v1/directories/{dir}/source */
    public function getDirectorySource(string $dir, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\DirectorySource
    {
        return \OhAuthCat\Models\DirectorySource::fromJson($this->client->request("getDirectorySource", [$dir], $query, null, $options));
    }

    /** GET /v1/directories/{dir}/source/oauth */
    public function getDirectorySourceOAuth(string $dir, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\DirectorySourceOAuth
    {
        return \OhAuthCat\Models\DirectorySourceOAuth::fromJson($this->client->request("getDirectorySourceOAuth", [$dir], $query, null, $options));
    }

    /** GET /v1/directories/{dir}/source/ssh_key */
    public function getDirectorySourceSSHKey(string $dir, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\DirectorySourceSSHKey
    {
        return \OhAuthCat\Models\DirectorySourceSSHKey::fromJson($this->client->request("getDirectorySourceSSHKey", [$dir], $query, null, $options));
    }

    /** POST /v1/directories/{dir}/csv_imports */
    public function importDirectoryCSV(string $dir, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\DirectorySyncResult
    {
        return \OhAuthCat\Models\DirectorySyncResult::fromJson($this->client->request("importDirectoryCSV", [$dir], $query, null, $options));
    }

    /** GET /v1/directories */
    public function listDirectories(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\DirectoryList
    {
        return \OhAuthCat\Models\DirectoryList::fromJson($this->client->request("listDirectories", [], $query, null, $options));
    }

    /** @return \Generator<int, \OhAuthCat\Models\Directory> every item across pages, following next_cursor. */
    public function listDirectoriesAutoPaging(array $query = [], ?RequestOptions $options = null): \Generator
    {
        return $this->client->paginate("listDirectories", [], $query, $options, \OhAuthCat\Models\Directory::class);
    }

    /** GET /v1/directories/{dir}/groups */
    public function listDirectoryGroups(string $dir, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\DirectoryGroupList
    {
        return \OhAuthCat\Models\DirectoryGroupList::fromJson($this->client->request("listDirectoryGroups", [$dir], $query, null, $options));
    }

    /** @return \Generator<int, \OhAuthCat\Models\DirectoryGroup> every item across pages, following next_cursor. */
    public function listDirectoryGroupsAutoPaging(string $dir, array $query = [], ?RequestOptions $options = null): \Generator
    {
        return $this->client->paginate("listDirectoryGroups", [$dir], $query, $options, \OhAuthCat\Models\DirectoryGroup::class);
    }

    /** GET /v1/directories/{dir}/users */
    public function listDirectoryUsers(string $dir, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\DirectoryUserList
    {
        return \OhAuthCat\Models\DirectoryUserList::fromJson($this->client->request("listDirectoryUsers", [$dir], $query, null, $options));
    }

    /** @return \Generator<int, \OhAuthCat\Models\DirectoryUser> every item across pages, following next_cursor. */
    public function listDirectoryUsersAutoPaging(string $dir, array $query = [], ?RequestOptions $options = null): \Generator
    {
        return $this->client->paginate("listDirectoryUsers", [$dir], $query, $options, \OhAuthCat\Models\DirectoryUser::class);
    }

    /** GET /v1/directories/{dir}/scim_requests */
    public function listScimRequests(string $dir, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\ScimRequestList
    {
        return \OhAuthCat\Models\ScimRequestList::fromJson($this->client->request("listScimRequests", [$dir], $query, null, $options));
    }

    /** @return \Generator<int, \OhAuthCat\Models\ScimRequest> every item across pages, following next_cursor. */
    public function listScimRequestsAutoPaging(string $dir, array $query = [], ?RequestOptions $options = null): \Generator
    {
        return $this->client->paginate("listScimRequests", [$dir], $query, $options, \OhAuthCat\Models\ScimRequest::class);
    }

    /** POST /v1/directories/{dir}/source/preview */
    public function previewDirectorySource(string $dir, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\DirectorySyncResult
    {
        return \OhAuthCat\Models\DirectorySyncResult::fromJson($this->client->request("previewDirectorySource", [$dir], $query, null, $options));
    }

    /** PUT /v1/directories/{dir}/source */
    public function putDirectorySource(string $dir, mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\DirectorySource
    {
        return \OhAuthCat\Models\DirectorySource::fromJson($this->client->request("putDirectorySource", [$dir], $query, $body, $options));
    }

    /** PUT /v1/directories/{dir}/attribute_map */
    public function replaceDirectoryAttributeMap(string $dir, mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\CustomAttributeMap
    {
        return \OhAuthCat\Models\CustomAttributeMap::fromJson($this->client->request("replaceDirectoryAttributeMap", [$dir], $query, $body, $options));
    }

    /** POST /v1/directories/{dir}/scim_replays */
    public function replayDirectoryScim(string $dir, mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\ScimReplay
    {
        return \OhAuthCat\Models\ScimReplay::fromJson($this->client->request("replayDirectoryScim", [$dir], $query, $body, $options));
    }

    /** POST /v1/directories/{dir}/rotate_token */
    public function rotateDirectoryToken(string $dir, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\DirectoryCredentials
    {
        return \OhAuthCat\Models\DirectoryCredentials::fromJson($this->client->request("rotateDirectoryToken", [$dir], $query, null, $options));
    }

    /** POST /v1/directories/{dir}/source/oauth/start */
    public function startDirectorySourceOAuth(string $dir, mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\DirectorySourceOAuthStart
    {
        return \OhAuthCat\Models\DirectorySourceOAuthStart::fromJson($this->client->request("startDirectorySourceOAuth", [$dir], $query, $body, $options));
    }

    /** POST /v1/directories/{dir}/source/sync */
    public function syncDirectorySource(string $dir, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\DirectorySource
    {
        return \OhAuthCat\Models\DirectorySource::fromJson($this->client->request("syncDirectorySource", [$dir], $query, null, $options));
    }

    /** PATCH /v1/directories/{dir} */
    public function updateDirectory(string $dir, mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Directory
    {
        return \OhAuthCat\Models\Directory::fromJson($this->client->request("updateDirectory", [$dir], $query, $body, $options));
    }

    /** PATCH /v1/directories/{dir}/source */
    public function updateDirectorySource(string $dir, mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\DirectorySource
    {
        return \OhAuthCat\Models\DirectorySource::fromJson($this->client->request("updateDirectorySource", [$dir], $query, $body, $options));
    }
}
