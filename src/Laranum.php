<?php

namespace Lucastuzina\Laranums;

use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;
use Random\RandomException;

trait Laranum
{
    /**
     * ===============================
     * Enum Case Lookup Methods
     * ===============================
     */

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
     * ===============================
     * Enum Metadata Methods
     * ===============================
     */

    /**
     * Get the class name of the enum.
     */
    public static function className(): string
    {
        return class_basename(static::class);
    }

    /**
     * ===============================
     * Enum Conversion Methods
     * ===============================
     */

    /**
     * Convert the enum cases into an associative array [value => name].
     */
    public static function toArray(): array
    {
        $pairs = [];
        foreach (self::cases() as $case) {
            $value = isset($case->value) ? $case->value : $case->name;
            $pairs[$value] = $case->name;
        }
        return $pairs;
    }

    /**
     * Convert the enum cases into an associative array [name => value].
     */
    public static function toArrayReversed(): array
    {
        $pairs = [];
        foreach (self::cases() as $case) {
            $value = isset($case->value) ? $case->value : $case->name;
            $pairs[$case->name] = $value;
        }
        return $pairs;
    }

    /**
     * Get an array of all enum case names.
     */
    public static function names(): array
    {
        return array_map(static fn ($case) => $case->name, self::cases());
    }

    /**
     * Get an array of all enum case values.
     */
    public static function values(): array
    {
        return array_map(static function ($case) {
            return isset($case->value) ? $case->value : $case->name;
        }, self::cases());
    }

    /**
     * ===============================
     * Enum Translation Methods
     * ===============================
     */

    /**
     * Get an array of translated names [name => translated value].
     */
    public static function transNames(): array
    {
        $translated = [];
        foreach (self::cases() as $case) {
            $translated[$case->name] = Lang::get(
                'enums.'.Str::snake(class_basename(static::class)).'.'.$case->name
            );
        }
        return $translated;
    }

    /**
     * Get an array of translated values [value => translated value].
     */
    public static function transValues(): array
    {
        $translated = [];
        foreach (self::cases() as $case) {
            $value = isset($case->value) ? $case->value : $case->name;
            $translated[$value] = Lang::get(
                'enums.'.Str::snake(class_basename(static::class)).'.'.$case->name
            );
        }
        return $translated;
    }

    /**
     * Get a translated string for a single enum name or value.
     */
    public static function trans(string $caseName): string
    {
        return Lang::get('enums.'.Str::snake(class_basename(static::class)).'.'.$caseName);
    }

    /**
     * ===============================
     * Enum Utility Methods
     * ===============================
     */

    /**
     * Get a random enum case (excluding given cases).
     * @throws RandomException
     */
    public static function rand(array $ignoredCases = []): ?self
    {
        $cases = self::cases();
        $filteredCases = array_filter($cases, fn($case) => !in_array($case, $ignoredCases, true));

        if (empty($filteredCases)) {
            return null;
        }

        return $filteredCases[array_rand($filteredCases)];
    }

    /**
     * Check if a given name exists in the enum.
     */
    public static function isValidName($name): bool
    {
        return in_array($name, self::names(), true);
    }

    /**
     * Check if a given value exists in the enum.
     */
    public static function isValidValue($name): bool
    {
        return in_array($name, self::values(), true);
    }

    /**
     * ===============================
     * Laravel-Specific Methods
     * ===============================
     */

    /**
     * Get a collection of all enum cases.
     * @return \Illuminate\Support\Collection<int, static>
     */
    public static function collect(): \Illuminate\Support\Collection
    {
        return collect(self::cases());
    }

    /**
     * Serialize enum to JSON.
     */
    public function jsonSerialize(): array
    {
        $value = isset($this->value) ? $this->value : $this->name;
        return [
            'name' => $this->name,
            'value' => $value,
            'translation' => self::trans($this->name),
        ];
    }
}
