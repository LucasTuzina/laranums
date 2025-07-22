<?php

namespace Lucastuzina\Laranums\Tests\Unit;

use Lucastuzina\Laranums\Tests\Fixtures\StatusEnum;
use Lucastuzina\Laranums\Tests\Fixtures\PriorityEnum;
use Lucastuzina\Laranums\Tests\Fixtures\SimpleEnum;
use Lucastuzina\Laranums\Tests\TestCase;

class UtilityMethodsTest extends TestCase
{
    /** @test */
    public function it_can_get_random_enum_case()
    {
        $case = StatusEnum::rand();
        $this->assertInstanceOf(StatusEnum::class, $case);
        $this->assertContains($case, StatusEnum::cases());
    }

    /** @test */
    public function it_can_get_random_enum_case_excluding_given_cases()
    {
        $ignoredCases = [StatusEnum::Active, StatusEnum::Inactive];
        $case = StatusEnum::rand($ignoredCases);
        
        $this->assertInstanceOf(StatusEnum::class, $case);
        $this->assertSame(StatusEnum::Pending, $case);
    }

    /** @test */
    public function it_returns_null_when_all_cases_are_ignored()
    {
        $allCases = StatusEnum::cases();
        $case = StatusEnum::rand($allCases);
        
        $this->assertNull($case);
    }

    /** @test */
    public function it_can_check_if_name_is_valid()
    {
        $this->assertTrue(StatusEnum::isValidName('Active'));
        $this->assertTrue(StatusEnum::isValidName('Inactive'));
        $this->assertFalse(StatusEnum::isValidName('NonExistent'));
        $this->assertFalse(StatusEnum::isValidName('active')); // Case sensitive
    }

    /** @test */
    public function it_can_check_if_value_is_valid()
    {
        $this->assertTrue(StatusEnum::isValidValue('active'));
        $this->assertTrue(StatusEnum::isValidValue('inactive'));
        $this->assertFalse(StatusEnum::isValidValue('non-existent'));
        $this->assertFalse(StatusEnum::isValidValue('Active')); // Value, not name
        
        // Test with integer backed enum
        $this->assertTrue(PriorityEnum::isValidValue(1));
        $this->assertTrue(PriorityEnum::isValidValue(2));
        $this->assertFalse(PriorityEnum::isValidValue(999));
    }

    /** @test */
    public function it_works_with_simple_enums_for_validation()
    {
        $this->assertTrue(SimpleEnum::isValidName('One'));
        $this->assertTrue(SimpleEnum::isValidName('Two'));
        $this->assertFalse(SimpleEnum::isValidName('NonExistent'));
        
        // For simple enums, name and value are the same
        $this->assertTrue(SimpleEnum::isValidValue('One'));
        $this->assertTrue(SimpleEnum::isValidValue('Two'));
        $this->assertFalse(SimpleEnum::isValidValue('NonExistent'));
    }
}
