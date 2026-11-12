<?php

// Generated from spec/openapi-v1.yaml (core c9fe6d0b5dde). Regenerate; do not edit.

declare(strict_types=1);

namespace OhAuthCat\Generated;

use OhAuthCat\OhAuthCatClient;
use OhAuthCat\RequestOptions;

final class AuthorizationResource
{
    public function __construct(private readonly OhAuthCatClient $client)
    {
    }

    /** POST /v1/authorization/check */
    public function checkAuthorization(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\AuthorizationDecision
    {
        return \OhAuthCat\Models\AuthorizationDecision::fromJson($this->client->request("checkAuthorization", [], $query, $body, $options));
    }

    /** POST /v1/authorization/check/bulk */
    public function checkAuthorizationBulk(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\AuthorizationBulkDecision
    {
        return \OhAuthCat\Models\AuthorizationBulkDecision::fromJson($this->client->request("checkAuthorizationBulk", [], $query, $body, $options));
    }

    /** POST /v1/authorization/permissions */
    public function createPermission(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Permission
    {
        return \OhAuthCat\Models\Permission::fromJson($this->client->request("createPermission", [], $query, $body, $options));
    }

    /** POST /v1/authorization/roles */
    public function createRole(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Role
    {
        return \OhAuthCat\Models\Role::fromJson($this->client->request("createRole", [], $query, $body, $options));
    }

    /** DELETE /v1/authorization/permissions/{permission} */
    public function deletePermission(string $permission, array $query = [], ?RequestOptions $options = null): mixed
    {
        return $this->client->request("deletePermission", [$permission], $query, null, $options);
    }

    /** DELETE /v1/authorization/roles/{role} */
    public function deleteRole(string $role, array $query = [], ?RequestOptions $options = null): mixed
    {
        return $this->client->request("deleteRole", [$role], $query, null, $options);
    }

    /** GET /v1/authorization/permissions/{permission} */
    public function getPermission(string $permission, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Permission
    {
        return \OhAuthCat\Models\Permission::fromJson($this->client->request("getPermission", [$permission], $query, null, $options));
    }

    /** GET /v1/authorization/roles/{role} */
    public function getRole(string $role, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Role
    {
        return \OhAuthCat\Models\Role::fromJson($this->client->request("getRole", [$role], $query, null, $options));
    }

    /** GET /v1/authorization/permissions */
    public function listPermissions(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\PermissionList
    {
        return \OhAuthCat\Models\PermissionList::fromJson($this->client->request("listPermissions", [], $query, null, $options));
    }

    /** GET /v1/authorization/roles */
    public function listRoles(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\RoleList
    {
        return \OhAuthCat\Models\RoleList::fromJson($this->client->request("listRoles", [], $query, null, $options));
    }

    /** PATCH /v1/authorization/permissions/{permission} */
    public function updatePermission(string $permission, mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Permission
    {
        return \OhAuthCat\Models\Permission::fromJson($this->client->request("updatePermission", [$permission], $query, $body, $options));
    }

    /** PATCH /v1/authorization/roles/{role} */
    public function updateRole(string $role, mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Role
    {
        return \OhAuthCat\Models\Role::fromJson($this->client->request("updateRole", [$role], $query, $body, $options));
    }
}
