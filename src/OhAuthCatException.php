<?php

declare(strict_types=1);

namespace OhAuthCat;

/**
 * An error returned by, or while talking to, the OhAuthCat API. Subclasses follow the
 * catalogue's error type; $code is the stable code (see Generated\ErrorCodes).
 */
class OhAuthCatException extends \RuntimeException
{
    public const UNKNOWN_ERROR = 'unknown_error';

    private const TYPES = [
        'invalid_request' => InvalidRequestException::class,
        'authentication' => AuthenticationException::class,
        'permission' => PermissionException::class,
        'not_found' => NotFoundException::class,
        'conflict' => ConflictException::class,
        'rate_limited' => RateLimitedException::class,
        'idp_error' => IdpException::class,
        'unavailable' => UnavailableException::class,
    ];

    final public function __construct(
        string $message,
        public readonly string $errorCode,
        public readonly int $status = 0,
        public readonly ?string $type = null,
        public readonly ?string $param = null,
        public readonly ?string $docUrl = null,
        public readonly ?string $requestId = null,
    ) {
        parent::__construct($message);
    }

    /** Error catalogue page for a code. */
    public static function docUrlFor(string $code): string
    {
        return 'https://docs.ohauthcat.com/errors/' . $code;
    }

    /** A refusal raised by the SDK before any request; $param names the argument that was wrong. */
    public static function client(string $code, ?string $param = null): self
    {
        $message = 'OhAuthCat SDK error: ' . $code . ($param !== null ? ' (' . $param . ' is missing or invalid)' : '');
        return new self($message, $code, param: $param, docUrl: self::docUrlFor($code));
    }

    /** Builds the typed error from a raw error body. Never throws. */
    public static function fromResponse(int $status, string $body, ?string $requestIdHeader = null): self
    {
        $headerId = self::trimmed($requestIdHeader);
        try {
            $parsed = json_decode($body, true, 128, JSON_THROW_ON_ERROR);
        } catch (\JsonException) {
            $parsed = null;
        }
        $inner = \is_array($parsed) ? ($parsed['error'] ?? null) : null;
        if (!\is_array($inner) || array_is_list($inner) && $inner !== []) {
            return new self("Unexpected error response (HTTP $status)", self::UNKNOWN_ERROR, $status, requestId: $headerId);
        }
        $field = static fn (string $key): ?string => self::trimmed($inner[$key] ?? null);
        $code = $field('code') ?? self::UNKNOWN_ERROR;
        $type = $field('type');
        $class = $code === 'plan_limit_reached' ? PlanLimitReachedException::class : (self::TYPES[$type ?? ''] ?? self::class);
        return new $class(
            $field('message') ?? 'OhAuthCat API error: ' . $code,
            $code,
            $status,
            $type,
            $field('param'),
            $field('doc_url'),
            $field('request_id') ?? $headerId,
        );
    }

    private static function trimmed(mixed $value): ?string
    {
        if (!\is_string($value)) {
            return null;
        }
        $text = trim($value);
        return $text === '' ? null : $text;
    }
}
