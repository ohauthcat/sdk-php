<?php

// Generated from spec/openapi-v1.yaml (core c9fe6d0b5dde). Regenerate; do not edit.

declare(strict_types=1);

namespace OhAuthCat\Generated;

use OhAuthCat\OhAuthCatClient;
use OhAuthCat\RequestOptions;

final class ItContactsResource
{
    public function __construct(private readonly OhAuthCatClient $client)
    {
    }

    /** POST /v1/organizations/{org}/it_contacts */
    public function createItContact(string $org, mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\ItContact
    {
        return \OhAuthCat\Models\ItContact::fromJson($this->client->request("createItContact", [$org], $query, $body, $options));
    }

    /** DELETE /v1/organizations/{org}/it_contacts/{contact} */
    public function deleteItContact(string $org, string $contact, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Deleted
    {
        return \OhAuthCat\Models\Deleted::fromJson($this->client->request("deleteItContact", [$org, $contact], $query, null, $options));
    }

    /** GET /v1/organizations/{org}/it_contacts/{contact} */
    public function getItContact(string $org, string $contact, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\ItContact
    {
        return \OhAuthCat\Models\ItContact::fromJson($this->client->request("getItContact", [$org, $contact], $query, null, $options));
    }

    /** GET /v1/organizations/{org}/it_contacts */
    public function listItContacts(string $org, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\ItContactList
    {
        return \OhAuthCat\Models\ItContactList::fromJson($this->client->request("listItContacts", [$org], $query, null, $options));
    }

    /** @return \Generator<int, \OhAuthCat\Models\ItContact> every item across pages, following next_cursor. */
    public function listItContactsAutoPaging(string $org, array $query = [], ?RequestOptions $options = null): \Generator
    {
        return $this->client->paginate("listItContacts", [$org], $query, $options, \OhAuthCat\Models\ItContact::class);
    }

    /** PATCH /v1/organizations/{org}/it_contacts/{contact} */
    public function updateItContact(string $org, string $contact, mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\ItContact
    {
        return \OhAuthCat\Models\ItContact::fromJson($this->client->request("updateItContact", [$org, $contact], $query, $body, $options));
    }
}
