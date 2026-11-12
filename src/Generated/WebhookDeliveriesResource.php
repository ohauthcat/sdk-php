<?php

// Generated from spec/openapi-v1.yaml (core c9fe6d0b5dde). Regenerate; do not edit.

declare(strict_types=1);

namespace OhAuthCat\Generated;

use OhAuthCat\OhAuthCatClient;
use OhAuthCat\RequestOptions;

final class WebhookDeliveriesResource
{
    public function __construct(private readonly OhAuthCatClient $client)
    {
    }

    /** POST /v1/webhook_deliveries/{delivery}/resend */
    public function resendWebhookDelivery(string $delivery, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\WebhookDelivery
    {
        return \OhAuthCat\Models\WebhookDelivery::fromJson($this->client->request("resendWebhookDelivery", [$delivery], $query, null, $options));
    }
}
