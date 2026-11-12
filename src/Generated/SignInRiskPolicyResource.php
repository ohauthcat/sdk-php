<?php

// Generated from spec/openapi-v1.yaml (core c9fe6d0b5dde). Regenerate; do not edit.

declare(strict_types=1);

namespace OhAuthCat\Generated;

use OhAuthCat\OhAuthCatClient;
use OhAuthCat\RequestOptions;

final class SignInRiskPolicyResource
{
    public function __construct(private readonly OhAuthCatClient $client)
    {
    }

    /** DELETE /v1/sign_in_risk_policy */
    public function deleteSignInRiskPolicy(array $query = [], ?RequestOptions $options = null): mixed
    {
        return $this->client->request("deleteSignInRiskPolicy", [], $query, null, $options);
    }

    /** GET /v1/sign_in_risk_policy */
    public function getSignInRiskPolicy(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\SignInRiskPolicy
    {
        return \OhAuthCat\Models\SignInRiskPolicy::fromJson($this->client->request("getSignInRiskPolicy", [], $query, null, $options));
    }

    /** PUT /v1/sign_in_risk_policy */
    public function putSignInRiskPolicy(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\SignInRiskPolicy
    {
        return \OhAuthCat\Models\SignInRiskPolicy::fromJson($this->client->request("putSignInRiskPolicy", [], $query, $body, $options));
    }
}
