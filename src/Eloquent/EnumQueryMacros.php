<?php

namespace Lucastuzina\Laranums\Eloquent;

use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use UnitEnum;

/**
 * Registers query-builder macros that accept enum instances directly, removing
 * the need to pass `->value` everywhere.
 */
class EnumQueryMacros
{
    public static function register(): void
    {
        $unwrap = static function (mixed $value): mixed {
            if ($value instanceof UnitEnum) {
                return $value instanceof \BackedEnum ? $value->value : $value->name;
            }
            if (is_array($value)) {
                return array_map(static fn ($v) => $v instanceof UnitEnum
                    ? ($v instanceof \BackedEnum ? $v->value : $v->name)
                    : $v, $value);
            }
            return $value;
        };

        foreach ([QueryBuilder::class, EloquentBuilder::class] as $builder) {
            $builder::macro('whereEnum', function (string $column, UnitEnum|array $value) use ($unwrap) {
                if (is_array($value)) {
                    return $this->whereIn($column, $unwrap($value));
                }
                return $this->where($column, $unwrap($value));
            });

            $builder::macro('whereEnumNot', function (string $column, UnitEnum|array $value) use ($unwrap) {
                if (is_array($value)) {
                    return $this->whereNotIn($column, $unwrap($value));
                }
                return $this->where($column, '!=', $unwrap($value));
            });

            $builder::macro('orWhereEnum', function (string $column, UnitEnum|array $value) use ($unwrap) {
                if (is_array($value)) {
                    return $this->orWhereIn($column, $unwrap($value));
                }
                return $this->orWhere($column, $unwrap($value));
            });
        }
    }
}
