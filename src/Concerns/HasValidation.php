<?php

namespace Lucastuzina\Laranums\Concerns;

use Illuminate\Validation\Rules\Enum as EnumRule;

trait HasValidation
{
    /**
     * Laravel validation rule that accepts any case of this enum.
     * Ready to drop into a FormRequest's rules() array.
     *
     *   'status' => ['required', OrderStatus::rule()],
     */
    public static function rule(): EnumRule
    {
        return new EnumRule(static::class);
    }

    /**
     * Validation rule that restricts input to a subset of cases.
     *
     *   'status' => ['required', OrderStatus::ruleOnly([OrderStatus::PAID, OrderStatus::PENDING])],
     */
    public static function ruleOnly(array $cases): EnumRule
    {
        return (new EnumRule(static::class))->only($cases);
    }

    /**
     * Validation rule that forbids specific cases.
     *
     *   'status' => ['required', OrderStatus::ruleExcept([OrderStatus::CANCELLED])],
     */
    public static function ruleExcept(array $cases): EnumRule
    {
        return (new EnumRule(static::class))->except($cases);
    }
}
