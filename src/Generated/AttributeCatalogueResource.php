<?php

// Generated from spec/openapi-v1.yaml (core c9fe6d0b5dde). Regenerate; do not edit.

declare(strict_types=1);

namespace OhAuthCat\Generated;

use OhAuthCat\OhAuthCatClient;
use OhAuthCat\RequestOptions;

final class AttributeCatalogueResource
{
    public function __construct(private readonly OhAuthCatClient $client)
    {
    }

    /** GET /v1/attribute_catalogue */
    public function getAttributeCatalogue(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\AttributeCatalogue
    {
        return \OhAuthCat\Models\AttributeCatalogue::fromJson($this->client->request("getAttributeCatalogue", [], $query, null, $options));
    }

    /** POST /v1/attribute_catalogue/preview */
    public function previewAttributes(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\AttributePreview
    {
        return \OhAuthCat\Models\AttributePreview::fromJson($this->client->request("previewAttributes", [], $query, $body, $options));
    }

    /** PUT /v1/attribute_catalogue */
    public function replaceAttributeCatalogue(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\AttributeCatalogue
    {
        return \OhAuthCat\Models\AttributeCatalogue::fromJson($this->client->request("replaceAttributeCatalogue", [], $query, $body, $options));
    }
}
