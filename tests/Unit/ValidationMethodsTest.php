<?php

namespace Lucastuzina\Laranums\Tests\Unit;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Enum as EnumRule;
use Lucastuzina\Laranums\Tests\Fixtures\StatusEnum;
use Lucastuzina\Laranums\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class ValidationMethodsTest extends TestCase
{
    #[Test]
    public function rule_returns_a_laravel_enum_rule()
    {
        $this->assertInstanceOf(EnumRule::class, StatusEnum::rule());
    }

    #[Test]
    public function rule_validates_correct_values()
    {
        $validator = Validator::make(
            ['status' => 'active'],
            ['status' => ['required', StatusEnum::rule()]]
        );
        $this->assertTrue($validator->passes());
    }

    #[Test]
    public function rule_rejects_unknown_values()
    {
        $validator = Validator::make(
            ['status' => 'foobar'],
            ['status' => ['required', StatusEnum::rule()]]
        );
        $this->assertFalse($validator->passes());
    }

    #[Test]
    public function rule_only_restricts_allowed_cases()
    {
        $validator = Validator::make(
            ['status' => 'inactive'],
            ['status' => ['required', StatusEnum::ruleOnly([StatusEnum::Active, StatusEnum::Pending])]]
        );
        $this->assertFalse($validator->passes());

        $validator = Validator::make(
            ['status' => 'active'],
            ['status' => ['required', StatusEnum::ruleOnly([StatusEnum::Active, StatusEnum::Pending])]]
        );
        $this->assertTrue($validator->passes());
    }

    #[Test]
    public function rule_except_forbids_specified_cases()
    {
        $validator = Validator::make(
            ['status' => 'inactive'],
            ['status' => ['required', StatusEnum::ruleExcept([StatusEnum::Inactive])]]
        );
        $this->assertFalse($validator->passes());
    }
}
