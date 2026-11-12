<?php

declare(strict_types=1);

namespace OhAuthCat;

use OhAuthCat\Models\Registry;

/**
 * Base of every generated model. A model wraps its decoded JSON array, so unknown fields are
 * kept and toArray() is always available as an escape hatch. Typed getters and setters use it.
 */
abstract class Model implements \JsonSerializable
{
    public const NAME = '';
    /** @var array<string, string> */
    public const FIELDS = [];
    /** @var list<string> */
    public const REQUIRED = [];

    /** @param array<string, mixed> $json */
    final public function __construct(protected array $json = [])
    {
    }

    /** Validates decoded JSON and wraps it. */
    public static function fromJson(mixed $json): static
    {
        self::validate($json, 'M' . static::NAME, static::NAME, true);
        /** @var array<string, mixed> $json */
        return new static($json);
    }

    /** @return array<string, mixed> every field, including ones this SDK version does not know. */
    public function toArray(): array
    {
        return $this->json;
    }

    public function jsonSerialize(): mixed
    {
        return $this->json === [] ? new \stdClass() : $this->json;
    }

    protected function get(string $field): mixed
    {
        return self::decode($this->json[$field] ?? null, static::FIELDS[$field]);
    }

    protected function set(string $field, mixed $value): static
    {
        $this->json[$field] = self::encode($value);
        return $this;
    }

    private static function invalid(string $path): OhAuthCatException
    {
        return new OhAuthCatException('The response does not match the API schema at ' . $path, 'response_invalid');
    }

    public static function validate(mixed $value, string $desc, string $path, bool $present): void
    {
        $nullable = str_starts_with($desc, '?');
        $d = $nullable ? substr($desc, 1) : $desc;
        if ($value === null) {
            if ($nullable || !$present) {
                return;
            }
            throw self::invalid($path);
        }
        switch ($d[0]) {
            case 's':
                if (!\is_string($value)) {
                    throw self::invalid($path);
                }
                return;
            case 'i':
                if (!\is_int($value)) {
                    throw self::invalid($path);
                }
                return;
            case 'n':
                if (!\is_int($value) && !\is_float($value)) {
                    throw self::invalid($path);
                }
                return;
            case 'b':
                if (!\is_bool($value)) {
                    throw self::invalid($path);
                }
                return;
            case 'j':
                return;
            case 'L':
                if (!\is_array($value) || !array_is_list($value)) {
                    throw self::invalid($path);
                }
                foreach ($value as $i => $item) {
                    self::validate($item, substr($d, 1), $path . '[' . $i . ']', true);
                }
                return;
            case 'D':
                if (!\is_array($value)) {
                    throw self::invalid($path);
                }
                foreach ($value as $k => $item) {
                    self::validate($item, substr($d, 1), $path . '.' . $k, true);
                }
                return;
            case 'M':
                $class = Registry::CLASSES[substr($d, 1)] ?? null;
                if ($class === null || !\is_array($value) || (array_is_list($value) && $value !== [])) {
                    throw self::invalid($path);
                }
                foreach ($class::REQUIRED as $field) {
                    if (!\array_key_exists($field, $value)) {
                        throw self::invalid($path . '.' . $field);
                    }
                }
                foreach ($class::FIELDS as $field => $fieldDesc) {
                    if (!\array_key_exists($field, $value)) {
                        continue;
                    }
                    // Optional fields may be null even when the schema does not say so.
                    if ($value[$field] === null && !\in_array($field, $class::REQUIRED, true)) {
                        continue;
                    }
                    self::validate($value[$field], $fieldDesc, $path . '.' . $field, true);
                }
                return;
        }
        throw self::invalid($path);
    }

    public static function decode(mixed $value, string $desc): mixed
    {
        if ($value === null) {
            return null;
        }
        $d = ltrim($desc, '?');
        switch ($d[0]) {
            case 'n':
                return \is_int($value) ? (float) $value : $value;
            case 'L':
            case 'D':
                if (!\is_array($value)) {
                    return $value;
                }
                $out = [];
                foreach ($value as $k => $item) {
                    $out[$k] = self::decode($item, substr($d, 1));
                }
                return $out;
            case 'M':
                $class = Registry::CLASSES[substr($d, 1)] ?? null;
                return $class !== null && \is_array($value) ? new $class($value) : $value;
        }
        return $value;
    }

    /** Converts typed values (models, arrays) back into plain JSON values. */
    public static function encode(mixed $value): mixed
    {
        if ($value instanceof self) {
            return $value->json;
        }
        if (\is_array($value)) {
            $out = [];
            foreach ($value as $k => $item) {
                $out[$k] = self::encode($item);
            }
            return $out;
        }
        return $value;
    }
}
