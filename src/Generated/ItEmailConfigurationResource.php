<?php

// Generated from spec/openapi-v1.yaml (core c9fe6d0b5dde). Regenerate; do not edit.

declare(strict_types=1);

namespace OhAuthCat\Generated;

use OhAuthCat\OhAuthCatClient;
use OhAuthCat\RequestOptions;

final class ItEmailConfigurationResource
{
    public function __construct(private readonly OhAuthCatClient $client)
    {
    }

    /** DELETE /v1/it_email_configuration */
    public function deleteITEmailConfiguration(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Deleted
    {
        return \OhAuthCat\Models\Deleted::fromJson($this->client->request("deleteITEmailConfiguration", [], $query, null, $options));
    }

    /** GET /v1/it_email_configuration */
    public function getITEmailConfiguration(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\ITEmailConfiguration
    {
        return \OhAuthCat\Models\ITEmailConfiguration::fromJson($this->client->request("getITEmailConfiguration", [], $query, null, $options));
    }

    /** PUT /v1/it_email_configuration */
    public function putITEmailConfiguration(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\ITEmailConfiguration
    {
        return \OhAuthCat\Models\ITEmailConfiguration::fromJson($this->client->request("putITEmailConfiguration", [], $query, $body, $options));
    }
}
