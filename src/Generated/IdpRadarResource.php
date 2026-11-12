<?php

// Generated from spec/openapi-v1.yaml (core c9fe6d0b5dde). Regenerate; do not edit.

declare(strict_types=1);

namespace OhAuthCat\Generated;

use OhAuthCat\OhAuthCatClient;
use OhAuthCat\RequestOptions;

final class IdpRadarResource
{
    public function __construct(private readonly OhAuthCatClient $client)
    {
    }

    /** DELETE /v1/idp_radar/alert_subscription */
    public function deleteRadarAlertSubscription(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Deleted
    {
        return \OhAuthCat\Models\Deleted::fromJson($this->client->request("deleteRadarAlertSubscription", [], $query, null, $options));
    }

    /** GET /v1/idp_radar/alert_subscription */
    public function getRadarAlertSubscription(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\RadarAlertSubscription
    {
        return \OhAuthCat\Models\RadarAlertSubscription::fromJson($this->client->request("getRadarAlertSubscription", [], $query, null, $options));
    }

    /** PUT /v1/idp_radar/alert_subscription */
    public function putRadarAlertSubscription(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\RadarAlertSubscription
    {
        return \OhAuthCat\Models\RadarAlertSubscription::fromJson($this->client->request("putRadarAlertSubscription", [], $query, $body, $options));
    }
}
