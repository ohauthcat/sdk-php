<?php

// Generated from spec/openapi-v1.yaml (core c9fe6d0b5dde). Regenerate; do not edit.

declare(strict_types=1);

namespace OhAuthCat\Generated;

use OhAuthCat\OhAuthCatClient;
use OhAuthCat\RequestOptions;

final class BrandingResource
{
    public function __construct(private readonly OhAuthCatClient $client)
    {
    }

    /** GET /v1/branding */
    public function getBranding(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Branding
    {
        return \OhAuthCat\Models\Branding::fromJson($this->client->request("getBranding", [], $query, null, $options));
    }

    /** PATCH /v1/branding */
    public function updateBranding(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Branding
    {
        return \OhAuthCat\Models\Branding::fromJson($this->client->request("updateBranding", [], $query, $body, $options));
    }

    /** POST /v1/branding/favicon */
    public function uploadBrandingFavicon(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\BrandingFavicon
    {
        return \OhAuthCat\Models\BrandingFavicon::fromJson($this->client->request("uploadBrandingFavicon", [], $query, $body, $options));
    }

    /** POST /v1/branding/font */
    public function uploadBrandingFont(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\BrandingFont
    {
        return \OhAuthCat\Models\BrandingFont::fromJson($this->client->request("uploadBrandingFont", [], $query, $body, $options));
    }

    /** POST /v1/branding/logo */
    public function uploadBrandingLogo(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\BrandingLogo
    {
        return \OhAuthCat\Models\BrandingLogo::fromJson($this->client->request("uploadBrandingLogo", [], $query, $body, $options));
    }
}
