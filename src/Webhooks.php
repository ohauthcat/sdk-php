<?php

declare(strict_types=1);

namespace OhAuthCat;

/**
 * Webhook signature verification (OhAuthCat-Signature: t=<unix>,v1=<hex>). Verify the raw
 * request body before parsing; comparison is constant-time.
 */
final class Webhooks
{
    public const SIGNATURE_HEADER = 'OhAuthCat-Signature';
    public const DEFAULT_TOLERANCE = 300;
    private const MAX_SAFE = 9007199254740991;

    /** @return array{0: int, 1: list<string>} */
    public static function parseHeader(?string $header): array
    {
        if ($header === null || trim($header) === '') {
            throw new WebhookVerificationException('header_missing');
        }
        $timestamp = null;
        $signatures = [];
        foreach (explode(',', $header) as $part) {
            $pieces = explode('=', trim($part), 2);
            if (\count($pieces) !== 2) {
                throw new WebhookVerificationException('header_invalid');
            }
            [$name, $value] = $pieces;
            if ($name === 't') {
                if ($timestamp !== null || \strlen($value) > 20 || preg_match('/\A[0-9]+\z/', $value) !== 1) {
                    throw new WebhookVerificationException('header_invalid');
                }
                $timestamp = (int) $value;
                if ($timestamp <= 0 || $timestamp > self::MAX_SAFE || (string) $timestamp !== ltrim($value, '0')) {
                    throw new WebhookVerificationException('header_invalid');
                }
            } elseif ($name === 'v1') {
                $signature = strtolower($value);
                if (\strlen($signature) === 64) {
                    $signatures[] = $signature;
                }
            }
        }
        if ($timestamp === null || $signatures === []) {
            throw new WebhookVerificationException('header_invalid');
        }
        return [$timestamp, $signatures];
    }

    /** Hex HMAC-SHA256 over "<timestamp>.<body>", keyed by the whole UTF-8 secret. */
    public static function signatureDigest(string $rawBody, int $timestamp, string $secret): string
    {
        return hash_hmac('sha256', $timestamp . '.' . $rawBody, $secret);
    }

    /** @param string|list<string> $secrets */
    public static function verifySignature(string $rawBody, ?string $header, string|array $secrets, int $tolerance = self::DEFAULT_TOLERANCE, ?int $now = null): void
    {
        if ($tolerance <= 0) {
            throw new WebhookVerificationException('options_invalid');
        }
        [$timestamp, $signatures] = self::parseHeader($header);
        if (abs(($now ?? time()) - $timestamp) > $tolerance) {
            throw new WebhookVerificationException('timestamp_outside');
        }
        $held = \is_string($secrets) ? [$secrets] : $secrets;
        $matched = false;
        $nonempty = false;
        foreach ($held as $secret) {
            if (!\is_string($secret)) {
                throw new WebhookVerificationException('secret_missing');
            }
            if ($secret === '') {
                continue;
            }
            $nonempty = true;
            $expected = self::signatureDigest($rawBody, $timestamp, $secret);
            foreach ($signatures as $signature) {
                $matched = hash_equals($expected, $signature) || $matched;
            }
        }
        if (!$nonempty) {
            throw new WebhookVerificationException('secret_missing');
        }
        if (!$matched) {
            throw new WebhookVerificationException('signature_invalid');
        }
    }

    /**
     * Verifies the signature, then returns the decoded event.
     *
     * @param string|list<string> $secrets
     * @return array<string, mixed>
     */
    public static function verify(string $rawBody, ?string $header, string|array $secrets, int $tolerance = self::DEFAULT_TOLERANCE, ?int $now = null): array
    {
        self::verifySignature($rawBody, $header, $secrets, $tolerance, $now);
        try {
            $event = json_decode($rawBody, true, 128, JSON_THROW_ON_ERROR);
        } catch (\JsonException) {
            throw new WebhookVerificationException('event_invalid');
        }
        if (!\is_array($event) || !\is_string($event['id'] ?? null) || !\is_string($event['type'] ?? null)) {
            throw new WebhookVerificationException('event_invalid');
        }
        return $event;
    }
}
