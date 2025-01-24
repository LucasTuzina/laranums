<?php

namespace Lucastuzina\Laranums;

use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;
use Random\RandomException;

trait Laranum
{
    // Get the name of the enum class
    public static function className(): string
    {
        return class_basename(static::class);
    }

    // Returns an array of the case values and their corresponding names
    public static function toArray(): array
    {
        $pairs = [];
        foreach (self::cases() as $case) {
            $pairs[$case->value] = $case->name;
        }
        
        return $pairs;
    }

    // Returns an array of the case names and their corresponding values
    public static function toArrayReversed(): array
    {
        $pairs = [];
        foreach (self::cases() as $case) {
            $pairs[$case->name] = $case->value;
        }
        
        return $pairs;
    }

    // Returns an array of the cases names
    public static function names(): array
    {
        $names = [];

        foreach (self::cases() as $case) {
            $names[] = $case->name;
        }

        return $names;
    }

    // Returns an array of the names as key and the translation as value
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

    // Returns an array of the case values
    public static function values(): array
    {
        return array_map(fn ($case) => $case->value, self::cases());
    }

    // Returns an array of the cases values as key and the translation as value
    public static function transValues(): array
    {
        $translated = [];

        foreach (self::cases() as $case) {
            $translated[$case->value] = Lang::get(
                'enums.'.Str::snake(class_basename(static::class)).'.'.$case->name
            );
        }

        return $translated;
    }

    // Returns translated string of a single name or value
    public static function trans(string $caseName): string
    {
        return Lang::get('enums.'.Str::snake(class_basename(static::class)).'.'.$caseName);
    }

    /**
     * Returns a random case of the enum
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

    // Checks if provided name belongs to a case
    public static function isValidName($name): bool
    {
        return in_array($name, self::names(), true);
    }

    // Checks if provided value belongs to a case
    public static function isValidValue($name): bool
    {
        return in_array($name, self::values(), true);
    }
}