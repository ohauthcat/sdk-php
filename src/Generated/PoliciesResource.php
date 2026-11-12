<?php

// Generated from spec/openapi-v1.yaml (core c9fe6d0b5dde). Regenerate; do not edit.

declare(strict_types=1);

namespace OhAuthCat\Generated;

use OhAuthCat\OhAuthCatClient;
use OhAuthCat\RequestOptions;

final class PoliciesResource
{
    public function __construct(private readonly OhAuthCatClient $client)
    {
    }

    /** POST /v1/policies */
    public function createPolicy(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Policy
    {
        return \OhAuthCat\Models\Policy::fromJson($this->client->request("createPolicy", [], $query, $body, $options));
    }

    /** DELETE /v1/policies/{policy} */
    public function deletePolicy(string $policy, array $query = [], ?RequestOptions $options = null): mixed
    {
        return $this->client->request("deletePolicy", [$policy], $query, null, $options);
    }

    /** GET /v1/policies/{policy} */
    public function getPolicy(string $policy, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Policy
    {
        return \OhAuthCat\Models\Policy::fromJson($this->client->request("getPolicy", [$policy], $query, null, $options));
    }

    /** GET /v1/policies */
    public function listPolicies(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\PolicyList
    {
        return \OhAuthCat\Models\PolicyList::fromJson($this->client->request("listPolicies", [], $query, null, $options));
    }

    /** PATCH /v1/policies/{policy} */
    public function updatePolicy(string $policy, mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Policy
    {
        return \OhAuthCat\Models\Policy::fromJson($this->client->request("updatePolicy", [$policy], $query, $body, $options));
    }
}
