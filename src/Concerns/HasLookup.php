<?php

namespace Lucastuzina\Laranums\Concerns;

trait HasLookup
{
    /**
     * Get an enum case by its name.
     */
    public static function fromName(string $name): ?self
    {
        foreach (self::cases() as $case) {
            if ($case->name === $name) {
                return $case;
            }
        }
        return null;
    }

    /**
     * Get an enum case by its value (for backed enums).
     */
    public static function fromValue($value): ?self
    {
        foreach (self::cases() as $case) {
            $caseValue = isset($case->value) ? $case->value : $case->name;
            if ($caseValue === $value) {
                return $case;
            }
        }
        return null;
    }

    /**
     * Get an enum case by name, with a default fallback.
     */
    public static function fromNameOrDefault(string $name, self $default): self
    {
        return self::fromName($name) ?? $default;
    }

    /**
     * Get an enum case by value, with a default fallback (for backed enums).
     */
    public static function fromValueOrDefault($value, self $default): self
    {
        return self::fromValue($value) ?? $default;
    }

    /**
     * Check if a given name exists in the enum.
     */
    public static function isValidName($name): bool
    {
        foreach (self::cases() as $case) {
            if ($case->name === $name) {
                return true;
            }
        }
        return false;
    }

    /**
     * Check if a given value exists in the enum.
     */
    public static function isValidValue($value): bool
    {
        foreach (self::cases() as $case) {
            $caseValue = isset($case->value) ? $case->value : $case->name;
            if ($caseValue === $value) {
                return true;
            }
        }
        return false;
    }
}
