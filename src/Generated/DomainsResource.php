<?php

// Generated from spec/openapi-v1.yaml (core c9fe6d0b5dde). Regenerate; do not edit.

declare(strict_types=1);

namespace OhAuthCat\Generated;

use OhAuthCat\OhAuthCatClient;
use OhAuthCat\RequestOptions;

final class DomainsResource
{
    public function __construct(private readonly OhAuthCatClient $client)
    {
    }

    /** POST /v1/organizations/{org}/domains */
    public function createDomain(string $org, mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Domain
    {
        return \OhAuthCat\Models\Domain::fromJson($this->client->request("createDomain", [$org], $query, $body, $options));
    }

    /** DELETE /v1/organizations/{org}/domains/{domain} */
    public function deleteDomain(string $org, string $domain, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Deleted
    {
        return \OhAuthCat\Models\Deleted::fromJson($this->client->request("deleteDomain", [$org, $domain], $query, null, $options));
    }

    /** GET /v1/organizations/{org}/domains */
    public function listDomains(string $org, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\DomainList
    {
        return \OhAuthCat\Models\DomainList::fromJson($this->client->request("listDomains", [$org], $query, null, $options));
    }

    /** @return \Generator<int, \OhAuthCat\Models\Domain> every item across pages, following next_cursor. */
    public function listDomainsAutoPaging(string $org, array $query = [], ?RequestOptions $options = null): \Generator
    {
        return $this->client->paginate("listDomains", [$org], $query, $options, \OhAuthCat\Models\Domain::class);
    }

    /** PATCH /v1/organizations/{org}/domains/{domain} */
    public function updateDomain(string $org, string $domain, mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Domain
    {
        return \OhAuthCat\Models\Domain::fromJson($this->client->request("updateDomain", [$org, $domain], $query, $body, $options));
    }

    /** POST /v1/organizations/{org}/domains/{domain}/verify */
    public function verifyDomain(string $org, string $domain, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Domain
    {
        return \OhAuthCat\Models\Domain::fromJson($this->client->request("verifyDomain", [$org, $domain], $query, null, $options));
    }
}
