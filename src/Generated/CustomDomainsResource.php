<?php

// Generated from spec/openapi-v1.yaml (core c9fe6d0b5dde). Regenerate; do not edit.

declare(strict_types=1);

namespace OhAuthCat\Generated;

use OhAuthCat\OhAuthCatClient;
use OhAuthCat\RequestOptions;

final class CustomDomainsResource
{
    public function __construct(private readonly OhAuthCatClient $client)
    {
    }

    /** POST /v1/custom_domains */
    public function createCustomDomain(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\CustomDomain
    {
        return \OhAuthCat\Models\CustomDomain::fromJson($this->client->request("createCustomDomain", [], $query, $body, $options));
    }

    /** DELETE /v1/custom_domains/{custom_domain} */
    public function deleteCustomDomain(string $customDomain, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Deleted
    {
        return \OhAuthCat\Models\Deleted::fromJson($this->client->request("deleteCustomDomain", [$customDomain], $query, null, $options));
    }

    /** GET /v1/custom_domains/{custom_domain} */
    public function getCustomDomain(string $customDomain, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\CustomDomain
    {
        return \OhAuthCat\Models\CustomDomain::fromJson($this->client->request("getCustomDomain", [$customDomain], $query, null, $options));
    }

    /** GET /v1/custom_domains */
    public function listCustomDomains(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\CustomDomainList
    {
        return \OhAuthCat\Models\CustomDomainList::fromJson($this->client->request("listCustomDomains", [], $query, null, $options));
    }

    /** @return \Generator<int, \OhAuthCat\Models\CustomDomain> every item across pages, following next_cursor. */
    public function listCustomDomainsAutoPaging(array $query = [], ?RequestOptions $options = null): \Generator
    {
        return $this->client->paginate("listCustomDomains", [], $query, $options, \OhAuthCat\Models\CustomDomain::class);
    }

    /** POST /v1/custom_domains/{custom_domain}/verify */
    public function verifyCustomDomain(string $customDomain, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\CustomDomain
    {
        return \OhAuthCat\Models\CustomDomain::fromJson($this->client->request("verifyCustomDomain", [$customDomain], $query, null, $options));
    }
}
