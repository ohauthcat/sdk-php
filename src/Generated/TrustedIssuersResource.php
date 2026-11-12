<?php

// Generated from spec/openapi-v1.yaml (core c9fe6d0b5dde). Regenerate; do not edit.

declare(strict_types=1);

namespace OhAuthCat\Generated;

use OhAuthCat\OhAuthCatClient;
use OhAuthCat\RequestOptions;

final class TrustedIssuersResource
{
    public function __construct(private readonly OhAuthCatClient $client)
    {
    }

    /** POST /v1/trusted_issuers */
    public function createTrustedIssuer(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\TrustedIssuer
    {
        return \OhAuthCat\Models\TrustedIssuer::fromJson($this->client->request("createTrustedIssuer", [], $query, $body, $options));
    }

    /** DELETE /v1/trusted_issuers/{issuer_id} */
    public function deleteTrustedIssuer(string $issuerId, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Deleted
    {
        return \OhAuthCat\Models\Deleted::fromJson($this->client->request("deleteTrustedIssuer", [$issuerId], $query, null, $options));
    }

    /** GET /v1/trusted_issuers */
    public function listTrustedIssuers(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\TrustedIssuerList
    {
        return \OhAuthCat\Models\TrustedIssuerList::fromJson($this->client->request("listTrustedIssuers", [], $query, null, $options));
    }
}
