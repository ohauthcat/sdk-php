<?php

// Generated from spec/openapi-v1.yaml (core c9fe6d0b5dde). Regenerate; do not edit.

declare(strict_types=1);

namespace OhAuthCat\Generated;

use OhAuthCat\OhAuthCatClient;
use OhAuthCat\RequestOptions;

final class SsoResource
{
    public function __construct(private readonly OhAuthCatClient $client)
    {
    }

    /** POST /v1/sso/token */
    public function exchangeSsoCode(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\SsoToken
    {
        return \OhAuthCat\Models\SsoToken::fromJson($this->client->request("exchangeSsoCode", [], $query, $body, $options));
    }

    /** POST /v1/sso/token_exchange */
    public function exchangeTrustedToken(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\TrustedTokenProfile
    {
        return \OhAuthCat\Models\TrustedTokenProfile::fromJson($this->client->request("exchangeTrustedToken", [], $query, $body, $options));
    }

    /** POST /v1/sso/forwarded */
    public function forwardSsoResponse(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\SsoToken
    {
        return \OhAuthCat\Models\SsoToken::fromJson($this->client->request("forwardSsoResponse", [], $query, $body, $options));
    }

    /** GET /v1/sso/profile */
    public function getSsoProfile(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Profile
    {
        return \OhAuthCat\Models\Profile::fromJson($this->client->request("getSsoProfile", [], $query, null, $options));
    }

    /** POST /v1/sso/logout */
    public function startSsoLogout(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\SsoLogout
    {
        return \OhAuthCat\Models\SsoLogout::fromJson($this->client->request("startSsoLogout", [], $query, $body, $options));
    }
}
