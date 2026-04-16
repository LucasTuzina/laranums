<?php

namespace Lucastuzina\Laranums\Concerns;

use Illuminate\Support\Collection;

trait HasConversion
{
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
     * Get a Laravel collection of all enum cases.
     *
     * @return Collection<int, static>
     */
    public static function collect(): Collection
    {
        return collect(self::cases());
    }
}
