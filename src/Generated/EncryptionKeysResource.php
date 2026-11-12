<?php

// Generated from spec/openapi-v1.yaml (core c9fe6d0b5dde). Regenerate; do not edit.

declare(strict_types=1);

namespace OhAuthCat\Generated;

use OhAuthCat\OhAuthCatClient;
use OhAuthCat\RequestOptions;

final class EncryptionKeysResource
{
    public function __construct(private readonly OhAuthCatClient $client)
    {
    }

    /** POST /v1/encryption_keys/{key}/activate */
    public function activateEncryptionKey(string $key, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\EncryptionKey
    {
        return \OhAuthCat\Models\EncryptionKey::fromJson($this->client->request("activateEncryptionKey", [$key], $query, null, $options));
    }

    /** POST /v1/encryption_keys */
    public function createEncryptionKey(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\EncryptionKey
    {
        return \OhAuthCat\Models\EncryptionKey::fromJson($this->client->request("createEncryptionKey", [], $query, $body, $options));
    }

    /** POST /v1/encryption_keys/{key}/deprecate */
    public function deprecateEncryptionKey(string $key, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\EncryptionKey
    {
        return \OhAuthCat\Models\EncryptionKey::fromJson($this->client->request("deprecateEncryptionKey", [$key], $query, null, $options));
    }

    /** GET /v1/encryption_keys/{key} */
    public function getEncryptionKey(string $key, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\EncryptionKey
    {
        return \OhAuthCat\Models\EncryptionKey::fromJson($this->client->request("getEncryptionKey", [$key], $query, null, $options));
    }

    /** GET /v1/encryption_keys/setup */
    public function getEncryptionKeySetup(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\EncryptionKeySetup
    {
        return \OhAuthCat\Models\EncryptionKeySetup::fromJson($this->client->request("getEncryptionKeySetup", [], $query, null, $options));
    }

    /** GET /v1/encryption_keys */
    public function listEncryptionKeys(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\EncryptionKeyList
    {
        return \OhAuthCat\Models\EncryptionKeyList::fromJson($this->client->request("listEncryptionKeys", [], $query, null, $options));
    }

    /** POST /v1/encryption_keys/{key}/validate */
    public function validateEncryptionKey(string $key, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\EncryptionKey
    {
        return \OhAuthCat\Models\EncryptionKey::fromJson($this->client->request("validateEncryptionKey", [$key], $query, null, $options));
    }
}
