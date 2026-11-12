<?php

// Generated from spec/openapi-v1.yaml (core c9fe6d0b5dde). Regenerate; do not edit.

declare(strict_types=1);

namespace OhAuthCat\Generated;

use OhAuthCat\OhAuthCatClient;
use OhAuthCat\RequestOptions;

final class WebhookEndpointsResource
{
    public function __construct(private readonly OhAuthCatClient $client)
    {
    }

    /** POST /v1/webhook_endpoints */
    public function createWebhookEndpoint(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\WebhookSecret
    {
        return \OhAuthCat\Models\WebhookSecret::fromJson($this->client->request("createWebhookEndpoint", [], $query, $body, $options));
    }

    /** DELETE /v1/webhook_endpoints/{endpoint} */
    public function deleteWebhookEndpoint(string $endpoint, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Deleted
    {
        return \OhAuthCat\Models\Deleted::fromJson($this->client->request("deleteWebhookEndpoint", [$endpoint], $query, null, $options));
    }

    /** GET /v1/webhook_endpoints/{endpoint} */
    public function getWebhookEndpoint(string $endpoint, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\WebhookEndpoint
    {
        return \OhAuthCat\Models\WebhookEndpoint::fromJson($this->client->request("getWebhookEndpoint", [$endpoint], $query, null, $options));
    }

    /** GET /v1/webhook_endpoints/{endpoint}/deliveries */
    public function listWebhookDeliveries(string $endpoint, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\WebhookDeliveryList
    {
        return \OhAuthCat\Models\WebhookDeliveryList::fromJson($this->client->request("listWebhookDeliveries", [$endpoint], $query, null, $options));
    }

    /** @return \Generator<int, \OhAuthCat\Models\WebhookDelivery> every item across pages, following next_cursor. */
    public function listWebhookDeliveriesAutoPaging(string $endpoint, array $query = [], ?RequestOptions $options = null): \Generator
    {
        return $this->client->paginate("listWebhookDeliveries", [$endpoint], $query, $options, \OhAuthCat\Models\WebhookDelivery::class);
    }

    /** GET /v1/webhook_endpoints */
    public function listWebhookEndpoints(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\WebhookEndpointList
    {
        return \OhAuthCat\Models\WebhookEndpointList::fromJson($this->client->request("listWebhookEndpoints", [], $query, null, $options));
    }

    /** @return \Generator<int, \OhAuthCat\Models\WebhookEndpoint> every item across pages, following next_cursor. */
    public function listWebhookEndpointsAutoPaging(array $query = [], ?RequestOptions $options = null): \Generator
    {
        return $this->client->paginate("listWebhookEndpoints", [], $query, $options, \OhAuthCat\Models\WebhookEndpoint::class);
    }

    /** POST /v1/webhook_endpoints/{endpoint}/rotate_secret */
    public function rotateWebhookSecret(string $endpoint, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\WebhookSecret
    {
        return \OhAuthCat\Models\WebhookSecret::fromJson($this->client->request("rotateWebhookSecret", [$endpoint], $query, null, $options));
    }

    /** POST /v1/webhook_endpoints/{endpoint}/test */
    public function testWebhookEndpoint(string $endpoint, mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\WebhookDelivery
    {
        return \OhAuthCat\Models\WebhookDelivery::fromJson($this->client->request("testWebhookEndpoint", [$endpoint], $query, $body, $options));
    }

    /** PATCH /v1/webhook_endpoints/{endpoint} */
    public function updateWebhookEndpoint(string $endpoint, mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\WebhookEndpoint
    {
        return \OhAuthCat\Models\WebhookEndpoint::fromJson($this->client->request("updateWebhookEndpoint", [$endpoint], $query, $body, $options));
    }
}
