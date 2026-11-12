<?php

// Generated from spec/openapi-v1.yaml (core c9fe6d0b5dde). Regenerate; do not edit.

declare(strict_types=1);

namespace OhAuthCat\Generated;

use OhAuthCat\OhAuthCatClient;
use OhAuthCat\RequestOptions;

final class EnvironmentResource
{
    public function __construct(private readonly OhAuthCatClient $client)
    {
    }

    /** GET /v1/environment */
    public function getEnvironment(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Environment
    {
        return \OhAuthCat\Models\Environment::fromJson($this->client->request("getEnvironment", [], $query, null, $options));
    }

    /** GET /v1/environment/signin_host */
    public function getEnvironmentSigninHost(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\EnvironmentSigninHost
    {
        return \OhAuthCat\Models\EnvironmentSigninHost::fromJson($this->client->request("getEnvironmentSigninHost", [], $query, null, $options));
    }

    /** PUT /v1/environment/signin_host */
    public function setEnvironmentSigninHost(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\EnvironmentSigninHost
    {
        return \OhAuthCat\Models\EnvironmentSigninHost::fromJson($this->client->request("setEnvironmentSigninHost", [], $query, $body, $options));
    }

    /** PATCH /v1/environment */
    public function updateEnvironment(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Environment
    {
        return \OhAuthCat\Models\Environment::fromJson($this->client->request("updateEnvironment", [], $query, $body, $options));
    }
}
