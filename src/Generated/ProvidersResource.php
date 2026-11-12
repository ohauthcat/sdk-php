<?php

// Generated from spec/openapi-v1.yaml (core c9fe6d0b5dde). Regenerate; do not edit.

declare(strict_types=1);

namespace OhAuthCat\Generated;

use OhAuthCat\OhAuthCatClient;
use OhAuthCat\RequestOptions;

final class ProvidersResource
{
    public function __construct(private readonly OhAuthCatClient $client)
    {
    }

    /** GET /v1/providers */
    public function getProviderCatalogue(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\ProviderCatalogue
    {
        return \OhAuthCat\Models\ProviderCatalogue::fromJson($this->client->request("getProviderCatalogue", [], $query, null, $options));
    }
}
