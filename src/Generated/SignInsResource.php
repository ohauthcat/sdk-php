<?php

// Generated from spec/openapi-v1.yaml (core c9fe6d0b5dde). Regenerate; do not edit.

declare(strict_types=1);

namespace OhAuthCat\Generated;

use OhAuthCat\OhAuthCatClient;
use OhAuthCat\RequestOptions;

final class SignInsResource
{
    public function __construct(private readonly OhAuthCatClient $client)
    {
    }

    /** GET /v1/sign_ins/{sign_in}/explanation */
    public function getSignInExplanation(string $signIn, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\SignInExplanation
    {
        return \OhAuthCat\Models\SignInExplanation::fromJson($this->client->request("getSignInExplanation", [$signIn], $query, null, $options));
    }

    /** GET /v1/sign_ins/{sign_in}/timeline */
    public function getSignInTimeline(string $signIn, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\SignInTimeline
    {
        return \OhAuthCat\Models\SignInTimeline::fromJson($this->client->request("getSignInTimeline", [$signIn], $query, null, $options));
    }

    /** GET /v1/sign_ins */
    public function listSignIns(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\SignInList
    {
        return \OhAuthCat\Models\SignInList::fromJson($this->client->request("listSignIns", [], $query, null, $options));
    }

    /** @return \Generator<int, \OhAuthCat\Models\SignIn> every item across pages, following next_cursor. */
    public function listSignInsAutoPaging(array $query = [], ?RequestOptions $options = null): \Generator
    {
        return $this->client->paginate("listSignIns", [], $query, $options, \OhAuthCat\Models\SignIn::class);
    }
}
