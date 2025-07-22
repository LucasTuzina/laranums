<?php

namespace Lucastuzina\Laranums\Tests\Unit;

use Lucastuzina\Laranums\Tests\Fixtures\StatusEnum;
use Lucastuzina\Laranums\Tests\Fixtures\PriorityEnum;
use Lucastuzina\Laranums\Tests\Fixtures\SimpleEnum;
use Lucastuzina\Laranums\Tests\TestCase;

class LookupMethodsTest extends TestCase
{
    /** @test */
    public function it_can_find_enum_case_by_name()
    {
        $case = StatusEnum::fromName('Active');
        $this->assertSame(StatusEnum::Active, $case);

        $case = StatusEnum::fromName('NonExistent');
        $this->assertNull($case);
    }

    /** @test */
    public function it_can_find_enum_case_by_value()
    {
        $case = StatusEnum::fromValue('active');
        $this->assertSame(StatusEnum::Active, $case);

        $case = StatusEnum::fromValue('non-existent');
        $this->assertNull($case);
    }

    /** @test */
    public function it_can_find_enum_case_by_name_with_default()
    {
        $case = StatusEnum::fromNameOrDefault('Active', StatusEnum::Inactive);
        $this->assertSame(StatusEnum::Active, $case);

        $case = StatusEnum::fromNameOrDefault('NonExistent', StatusEnum::Inactive);
        $this->assertSame(StatusEnum::Inactive, $case);
    }

    /** @test */
    public function it_can_find_enum_case_by_value_with_default()
    {
        $case = StatusEnum::fromValueOrDefault('active', StatusEnum::Inactive);
        $this->assertSame(StatusEnum::Active, $case);

        $case = StatusEnum::fromValueOrDefault('non-existent', StatusEnum::Inactive);
        $this->assertSame(StatusEnum::Inactive, $case);
    }

    /** @test */
    public function it_works_with_simple_enums_for_name_lookup()
    {
        $case = SimpleEnum::fromName('One');
        $this->assertSame(SimpleEnum::One, $case);

        $case = SimpleEnum::fromName('NonExistent');
        $this->assertNull($case);
    }

    /** @test */
    public function it_works_with_integer_backed_enums()
    {
        $case = PriorityEnum::fromValue(1);
        $this->assertSame(PriorityEnum::Low, $case);

        $case = PriorityEnum::fromValue(999);
        $this->assertNull($case);
    }
}
