<?php

// Generated from spec/openapi-v1.yaml (core c9fe6d0b5dde). Regenerate; do not edit.

declare(strict_types=1);

namespace OhAuthCat\Generated;

use OhAuthCat\OhAuthCatClient;
use OhAuthCat\RequestOptions;

final class UploadsResource
{
    public function __construct(private readonly OhAuthCatClient $client)
    {
    }

    /** POST /v1/uploads */
    public function createUpload(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Upload
    {
        return \OhAuthCat\Models\Upload::fromJson($this->client->request("createUpload", [], $query, $body, $options));
    }
}
