<?php

// Generated from spec/openapi-v1.yaml (core c9fe6d0b5dde). Regenerate; do not edit.

declare(strict_types=1);

namespace OhAuthCat\Generated;

use OhAuthCat\OhAuthCatClient;
use OhAuthCat\RequestOptions;

final class VaultResource
{
    public function __construct(private readonly OhAuthCatClient $client)
    {
    }

    /** POST /v1/vault/keys */
    public function createVaultKey(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\VaultKey
    {
        return \OhAuthCat\Models\VaultKey::fromJson($this->client->request("createVaultKey", [], $query, $body, $options));
    }

    /** DELETE /v1/vault/objects/{name} */
    public function deleteVaultObject(string $name, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Deleted
    {
        return \OhAuthCat\Models\Deleted::fromJson($this->client->request("deleteVaultObject", [$name], $query, null, $options));
    }

    /** GET /v1/vault/objects/{name} */
    public function getVaultObject(string $name, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\VaultObjectValue
    {
        return \OhAuthCat\Models\VaultObjectValue::fromJson($this->client->request("getVaultObject", [$name], $query, null, $options));
    }

    /** GET /v1/vault/keys */
    public function listVaultKeys(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\VaultKeyList
    {
        return \OhAuthCat\Models\VaultKeyList::fromJson($this->client->request("listVaultKeys", [], $query, null, $options));
    }

    /** GET /v1/vault/objects/{name}/versions */
    public function listVaultObjectVersions(string $name, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\VaultObjectList
    {
        return \OhAuthCat\Models\VaultObjectList::fromJson($this->client->request("listVaultObjectVersions", [$name], $query, null, $options));
    }

    /** PUT /v1/vault/objects/{name} */
    public function putVaultObject(string $name, mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\VaultObject
    {
        return \OhAuthCat\Models\VaultObject::fromJson($this->client->request("putVaultObject", [$name], $query, $body, $options));
    }

    /** POST /v1/vault/keys/{key}/rotate */
    public function rotateVaultKey(string $key, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\VaultKey
    {
        return \OhAuthCat\Models\VaultKey::fromJson($this->client->request("rotateVaultKey", [$key], $query, null, $options));
    }

    /** POST /v1/vault/decrypt */
    public function vaultDecrypt(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\VaultDecryptResult
    {
        return \OhAuthCat\Models\VaultDecryptResult::fromJson($this->client->request("vaultDecrypt", [], $query, $body, $options));
    }

    /** POST /v1/vault/encrypt */
    public function vaultEncrypt(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\VaultEncryptResult
    {
        return \OhAuthCat\Models\VaultEncryptResult::fromJson($this->client->request("vaultEncrypt", [], $query, $body, $options));
    }
}
