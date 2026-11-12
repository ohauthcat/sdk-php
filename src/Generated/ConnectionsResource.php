<?php

// Generated from spec/openapi-v1.yaml (core c9fe6d0b5dde). Regenerate; do not edit.

declare(strict_types=1);

namespace OhAuthCat\Generated;

use OhAuthCat\OhAuthCatClient;
use OhAuthCat\RequestOptions;

final class ConnectionsResource
{
    public function __construct(private readonly OhAuthCatClient $client)
    {
    }

    /** POST /v1/connections/{conn}/activate */
    public function activateConnection(string $conn, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Connection
    {
        return \OhAuthCat\Models\Connection::fromJson($this->client->request("activateConnection", [$conn], $query, null, $options));
    }

    /** POST /v1/connections/{conn}/client_keys/activate */
    public function activateConnectionClientKey(string $conn, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\ConnectionClientKeys
    {
        return \OhAuthCat\Models\ConnectionClientKeys::fromJson($this->client->request("activateConnectionClientKey", [$conn], $query, null, $options));
    }

    /** POST /v1/connections */
    public function createConnection(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Connection
    {
        return \OhAuthCat\Models\Connection::fromJson($this->client->request("createConnection", [], $query, $body, $options));
    }

    /** POST /v1/connections/{conn}/certificates */
    public function createConnectionCertificate(string $conn, mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Certificate
    {
        return \OhAuthCat\Models\Certificate::fromJson($this->client->request("createConnectionCertificate", [$conn], $query, $body, $options));
    }

    /** POST /v1/connections/{conn}/client_keys */
    public function createConnectionClientKey(string $conn, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\ConnectionClientKeys
    {
        return \OhAuthCat\Models\ConnectionClientKeys::fromJson($this->client->request("createConnectionClientKey", [$conn], $query, null, $options));
    }

    /** POST /v1/connections/{conn}/shares */
    public function createConnectionShare(string $conn, mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\ConnectionShare
    {
        return \OhAuthCat\Models\ConnectionShare::fromJson($this->client->request("createConnectionShare", [$conn], $query, $body, $options));
    }

    /** POST /v1/connections/{conn}/deactivate */
    public function deactivateConnection(string $conn, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Connection
    {
        return \OhAuthCat\Models\Connection::fromJson($this->client->request("deactivateConnection", [$conn], $query, null, $options));
    }

    /** DELETE /v1/connections/{conn} */
    public function deleteConnection(string $conn, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Deleted
    {
        return \OhAuthCat\Models\Deleted::fromJson($this->client->request("deleteConnection", [$conn], $query + ['confirm' => $conn], null, $options));
    }

    /** DELETE /v1/connections/{conn}/certificates/{fp} */
    public function deleteConnectionCertificate(string $conn, string $fp, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Deleted
    {
        return \OhAuthCat\Models\Deleted::fromJson($this->client->request("deleteConnectionCertificate", [$conn, $fp], $query, null, $options));
    }

    /** DELETE /v1/connections/{conn}/scim_binding */
    public function deleteConnectionSCIMBinding(string $conn, array $query = [], ?RequestOptions $options = null): mixed
    {
        return $this->client->request("deleteConnectionSCIMBinding", [$conn], $query, null, $options);
    }

    /** GET /v1/connections/{conn} */
    public function getConnection(string $conn, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Connection
    {
        return \OhAuthCat\Models\Connection::fromJson($this->client->request("getConnection", [$conn], $query, null, $options));
    }

    /** GET /v1/connections/{conn}/attribute_map */
    public function getConnectionAttributeMap(string $conn, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\CustomAttributeMap
    {
        return \OhAuthCat\Models\CustomAttributeMap::fromJson($this->client->request("getConnectionAttributeMap", [$conn], $query, null, $options));
    }

    /** GET /v1/connections/{conn}/attribute_preview */
    public function getConnectionAttributePreview(string $conn, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\AttributeTestPreview
    {
        return \OhAuthCat\Models\AttributeTestPreview::fromJson($this->client->request("getConnectionAttributePreview", [$conn], $query, null, $options));
    }

    /** GET /v1/connections/{conn}/health */
    public function getConnectionHealth(string $conn, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\ConnectionHealth
    {
        return \OhAuthCat\Models\ConnectionHealth::fromJson($this->client->request("getConnectionHealth", [$conn], $query, null, $options));
    }

    /** GET /v1/connections/{conn}/single_logout */
    public function getConnectionSingleLogout(string $conn, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\SingleLogoutSettings
    {
        return \OhAuthCat\Models\SingleLogoutSettings::fromJson($this->client->request("getConnectionSingleLogout", [$conn], $query, null, $options));
    }

    /** GET /v1/connections/{conn}/sp_metadata */
    public function getConnectionSpMetadata(string $conn, array $query = [], ?RequestOptions $options = null): mixed
    {
        return $this->client->request("getConnectionSpMetadata", [$conn], $query, null, $options);
    }

    /** GET /v1/connections/{conn}/test_result */
    public function getConnectionTestResult(string $conn, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\PortalTestResult
    {
        return \OhAuthCat\Models\PortalTestResult::fromJson($this->client->request("getConnectionTestResult", [$conn], $query, null, $options));
    }

    /** GET /v1/connections/{conn}/certificates */
    public function listConnectionCertificates(string $conn, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\CertificateList
    {
        return \OhAuthCat\Models\CertificateList::fromJson($this->client->request("listConnectionCertificates", [$conn], $query, null, $options));
    }

    /** @return \Generator<int, \OhAuthCat\Models\Certificate> every item across pages, following next_cursor. */
    public function listConnectionCertificatesAutoPaging(string $conn, array $query = [], ?RequestOptions $options = null): \Generator
    {
        return $this->client->paginate("listConnectionCertificates", [$conn], $query, $options, \OhAuthCat\Models\Certificate::class);
    }

    /** GET /v1/connections/{conn}/client_keys */
    public function listConnectionClientKeys(string $conn, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\ConnectionClientKeys
    {
        return \OhAuthCat\Models\ConnectionClientKeys::fromJson($this->client->request("listConnectionClientKeys", [$conn], $query, null, $options));
    }

    /** GET /v1/connections/{conn}/shares */
    public function listConnectionShares(string $conn, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\ConnectionShareList
    {
        return \OhAuthCat\Models\ConnectionShareList::fromJson($this->client->request("listConnectionShares", [$conn], $query, null, $options));
    }

    /** GET /v1/connections/{conn}/sessions */
    public function listConnectionSignIns(string $conn, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\SignInList
    {
        return \OhAuthCat\Models\SignInList::fromJson($this->client->request("listConnectionSignIns", [$conn], $query, null, $options));
    }

    /** @return \Generator<int, \OhAuthCat\Models\SignIn> every item across pages, following next_cursor. */
    public function listConnectionSignInsAutoPaging(string $conn, array $query = [], ?RequestOptions $options = null): \Generator
    {
        return $this->client->paginate("listConnectionSignIns", [$conn], $query, $options, \OhAuthCat\Models\SignIn::class);
    }

    /** GET /v1/connections */
    public function listConnections(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\ConnectionList
    {
        return \OhAuthCat\Models\ConnectionList::fromJson($this->client->request("listConnections", [], $query, null, $options));
    }

    /** @return \Generator<int, \OhAuthCat\Models\Connection> every item across pages, following next_cursor. */
    public function listConnectionsAutoPaging(array $query = [], ?RequestOptions $options = null): \Generator
    {
        return $this->client->paginate("listConnections", [], $query, $options, \OhAuthCat\Models\Connection::class);
    }

    /** PUT /v1/connections/{conn}/attribute_map */
    public function replaceConnectionAttributeMap(string $conn, mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\CustomAttributeMap
    {
        return \OhAuthCat\Models\CustomAttributeMap::fromJson($this->client->request("replaceConnectionAttributeMap", [$conn], $query, $body, $options));
    }

    /** POST /v1/connections/{conn}/client_keys/retire */
    public function retireConnectionClientKeys(string $conn, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\ConnectionClientKeys
    {
        return \OhAuthCat\Models\ConnectionClientKeys::fromJson($this->client->request("retireConnectionClientKeys", [$conn], $query, null, $options));
    }

    /** DELETE /v1/connections/{conn}/shares/{share} */
    public function revokeConnectionShare(string $conn, string $share, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\ConnectionShare
    {
        return \OhAuthCat\Models\ConnectionShare::fromJson($this->client->request("revokeConnectionShare", [$conn, $share], $query, null, $options));
    }

    /** PUT /v1/connections/{conn}/scim_binding */
    public function setConnectionSCIMBinding(string $conn, mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\ConnectionSCIMBinding
    {
        return \OhAuthCat\Models\ConnectionSCIMBinding::fromJson($this->client->request("setConnectionSCIMBinding", [$conn], $query, $body, $options));
    }

    /** PUT /v1/connections/{conn}/single_logout */
    public function setConnectionSingleLogout(string $conn, mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\SingleLogoutSettings
    {
        return \OhAuthCat\Models\SingleLogoutSettings::fromJson($this->client->request("setConnectionSingleLogout", [$conn], $query, $body, $options));
    }

    /** POST /v1/connections/{conn}/test */
    public function testConnection(string $conn, mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\ConnectionTest
    {
        return \OhAuthCat\Models\ConnectionTest::fromJson($this->client->request("testConnection", [$conn], $query, $body, $options));
    }

    /** PATCH /v1/connections/{conn} */
    public function updateConnection(string $conn, mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Connection
    {
        return \OhAuthCat\Models\Connection::fromJson($this->client->request("updateConnection", [$conn], $query, $body, $options));
    }
}
