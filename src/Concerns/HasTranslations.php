<?php

namespace Lucastuzina\Laranums\Concerns;

use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;

trait HasTranslations
{
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
}
