<?php

// Generated from spec/openapi-v1.yaml (core c9fe6d0b5dde). Regenerate; do not edit.

declare(strict_types=1);

namespace OhAuthCat\Generated;

use OhAuthCat\OhAuthCatClient;
use OhAuthCat\RequestOptions;

final class RoleRulesResource
{
    public function __construct(private readonly OhAuthCatClient $client)
    {
    }

    /** POST /v1/role_rules */
    public function createRoleRule(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\RoleRule
    {
        return \OhAuthCat\Models\RoleRule::fromJson($this->client->request("createRoleRule", [], $query, $body, $options));
    }

    /** DELETE /v1/role_rules/{role_rule} */
    public function deleteRoleRule(string $roleRule, array $query = [], ?RequestOptions $options = null): mixed
    {
        return $this->client->request("deleteRoleRule", [$roleRule], $query, null, $options);
    }

    /** GET /v1/role_rules/{role_rule} */
    public function getRoleRule(string $roleRule, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\RoleRule
    {
        return \OhAuthCat\Models\RoleRule::fromJson($this->client->request("getRoleRule", [$roleRule], $query, null, $options));
    }

    /** GET /v1/role_rules */
    public function listRoleRules(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\RoleRuleList
    {
        return \OhAuthCat\Models\RoleRuleList::fromJson($this->client->request("listRoleRules", [], $query, null, $options));
    }

    /** POST /v1/role_rules/preview */
    public function previewRoleRules(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\RoleRulePreview
    {
        return \OhAuthCat\Models\RoleRulePreview::fromJson($this->client->request("previewRoleRules", [], $query, $body, $options));
    }

    /** PATCH /v1/role_rules/{role_rule} */
    public function updateRoleRule(string $roleRule, mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\RoleRule
    {
        return \OhAuthCat\Models\RoleRule::fromJson($this->client->request("updateRoleRule", [$roleRule], $query, $body, $options));
    }
}
