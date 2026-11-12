<?php

// Generated from spec/openapi-v1.yaml (core c9fe6d0b5dde). Regenerate; do not edit.

declare(strict_types=1);

namespace OhAuthCat\Generated;

use OhAuthCat\OhAuthCatClient;
use OhAuthCat\RequestOptions;

final class SignInHooksResource
{
    public function __construct(private readonly OhAuthCatClient $client)
    {
    }

    /** POST /v1/sign_in_hooks */
    public function createSignInHook(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\SignInHookWithSecret
    {
        return \OhAuthCat\Models\SignInHookWithSecret::fromJson($this->client->request("createSignInHook", [], $query, $body, $options));
    }

    /** DELETE /v1/sign_in_hooks/{hook} */
    public function deleteSignInHook(string $hook, array $query = [], ?RequestOptions $options = null): mixed
    {
        return $this->client->request("deleteSignInHook", [$hook], $query, null, $options);
    }

    /** GET /v1/sign_in_hooks/{hook} */
    public function getSignInHook(string $hook, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\SignInHook
    {
        return \OhAuthCat\Models\SignInHook::fromJson($this->client->request("getSignInHook", [$hook], $query, null, $options));
    }

    /** GET /v1/sign_in_hooks/{hook}/deliveries */
    public function listSignInHookDeliveries(string $hook, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\SignInHookDeliveryList
    {
        return \OhAuthCat\Models\SignInHookDeliveryList::fromJson($this->client->request("listSignInHookDeliveries", [$hook], $query, null, $options));
    }

    /** @return \Generator<int, \OhAuthCat\Models\SignInHookDelivery> every item across pages, following next_cursor. */
    public function listSignInHookDeliveriesAutoPaging(string $hook, array $query = [], ?RequestOptions $options = null): \Generator
    {
        return $this->client->paginate("listSignInHookDeliveries", [$hook], $query, $options, \OhAuthCat\Models\SignInHookDelivery::class);
    }

    /** GET /v1/sign_in_hooks */
    public function listSignInHooks(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\SignInHookList
    {
        return \OhAuthCat\Models\SignInHookList::fromJson($this->client->request("listSignInHooks", [], $query, null, $options));
    }

    /** POST /v1/sign_in_hooks/{hook}/rotate_secret */
    public function rotateSignInHookSecret(string $hook, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\SignInHookWithSecret
    {
        return \OhAuthCat\Models\SignInHookWithSecret::fromJson($this->client->request("rotateSignInHookSecret", [$hook], $query, null, $options));
    }

    /** POST /v1/sign_in_hooks/{hook}/test */
    public function testSignInHook(string $hook, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\SignInHookTestResult
    {
        return \OhAuthCat\Models\SignInHookTestResult::fromJson($this->client->request("testSignInHook", [$hook], $query, null, $options));
    }

    /** PATCH /v1/sign_in_hooks/{hook} */
    public function updateSignInHook(string $hook, mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\SignInHook
    {
        return \OhAuthCat\Models\SignInHook::fromJson($this->client->request("updateSignInHook", [$hook], $query, $body, $options));
    }
}
