<?php

// Generated from spec/openapi-v1.yaml (core c9fe6d0b5dde). Regenerate; do not edit.

declare(strict_types=1);

namespace OhAuthCat\Generated;

use OhAuthCat\OhAuthCatClient;
use OhAuthCat\RequestOptions;

final class FeatureFlagsResource
{
    public function __construct(private readonly OhAuthCatClient $client)
    {
    }

    /** POST /v1/feature_flags */
    public function createFeatureFlag(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\FeatureFlag
    {
        return \OhAuthCat\Models\FeatureFlag::fromJson($this->client->request("createFeatureFlag", [], $query, $body, $options));
    }

    /** DELETE /v1/feature_flags/{feature_flag} */
    public function deleteFeatureFlag(string $featureFlag, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\Deleted
    {
        return \OhAuthCat\Models\Deleted::fromJson($this->client->request("deleteFeatureFlag", [$featureFlag], $query, null, $options));
    }

    /** POST /v1/feature_flags/evaluate */
    public function evaluateFeatureFlag(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\FeatureFlagEvaluation
    {
        return \OhAuthCat\Models\FeatureFlagEvaluation::fromJson($this->client->request("evaluateFeatureFlag", [], $query, $body, $options));
    }

    /** POST /v1/feature_flags/evaluate_bulk */
    public function evaluateFeatureFlags(mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\FeatureFlagEvaluationList
    {
        return \OhAuthCat\Models\FeatureFlagEvaluationList::fromJson($this->client->request("evaluateFeatureFlags", [], $query, $body, $options));
    }

    /** GET /v1/feature_flags/{feature_flag} */
    public function getFeatureFlag(string $featureFlag, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\FeatureFlag
    {
        return \OhAuthCat\Models\FeatureFlag::fromJson($this->client->request("getFeatureFlag", [$featureFlag], $query, null, $options));
    }

    /** GET /v1/feature_flags */
    public function listFeatureFlags(array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\FeatureFlagList
    {
        return \OhAuthCat\Models\FeatureFlagList::fromJson($this->client->request("listFeatureFlags", [], $query, null, $options));
    }

    /** @return \Generator<int, \OhAuthCat\Models\FeatureFlag> every item across pages, following next_cursor. */
    public function listFeatureFlagsAutoPaging(array $query = [], ?RequestOptions $options = null): \Generator
    {
        return $this->client->paginate("listFeatureFlags", [], $query, $options, \OhAuthCat\Models\FeatureFlag::class);
    }

    /** PATCH /v1/feature_flags/{feature_flag} */
    public function updateFeatureFlag(string $featureFlag, mixed $body, array $query = [], ?RequestOptions $options = null): \OhAuthCat\Models\FeatureFlag
    {
        return \OhAuthCat\Models\FeatureFlag::fromJson($this->client->request("updateFeatureFlag", [$featureFlag], $query, $body, $options));
    }
}
