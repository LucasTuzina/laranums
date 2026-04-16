<?php

namespace Lucastuzina\Laranums\Tests\Unit;

use Lucastuzina\Laranums\Tests\Fixtures\StatusEnum;
use Lucastuzina\Laranums\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class OrderingMethodsTest extends TestCase
{
    #[Test]
    public function compare_returns_zero_for_same_case()
    {
        $this->assertSame(0, StatusEnum::Active->compare(StatusEnum::Active));
    }

    #[Test]
    public function compare_returns_negative_when_this_is_earlier()
    {
        $this->assertSame(-1, StatusEnum::Active->compare(StatusEnum::Inactive));
    }

    #[Test]
    public function compare_returns_positive_when_this_is_later()
    {
        $this->assertSame(1, StatusEnum::Pending->compare(StatusEnum::Active));
    }

    #[Test]
    public function compare_is_usable_in_usort()
    {
        $list = [StatusEnum::Pending, StatusEnum::Active, StatusEnum::Inactive];
        usort($list, fn ($a, $b) => $a->compare($b));

        $this->assertSame(
            [StatusEnum::Active, StatusEnum::Inactive, StatusEnum::Pending],
            $list
        );
    }

    #[Test]
    public function less_than_works_on_declaration_order()
    {
        $this->assertTrue(StatusEnum::Active->lessThan(StatusEnum::Pending));
        $this->assertFalse(StatusEnum::Pending->lessThan(StatusEnum::Active));
        $this->assertFalse(StatusEnum::Active->lessThan(StatusEnum::Active));
    }

    #[Test]
    public function greater_than_works_on_declaration_order()
    {
        $this->assertTrue(StatusEnum::Pending->greaterThan(StatusEnum::Active));
        $this->assertFalse(StatusEnum::Active->greaterThan(StatusEnum::Pending));
        $this->assertFalse(StatusEnum::Active->greaterThan(StatusEnum::Active));
    }

    #[Test]
    public function between_is_inclusive()
    {
        $this->assertTrue(StatusEnum::Active->between(StatusEnum::Active, StatusEnum::Pending));
        $this->assertTrue(StatusEnum::Inactive->between(StatusEnum::Active, StatusEnum::Pending));
        $this->assertTrue(StatusEnum::Pending->between(StatusEnum::Active, StatusEnum::Pending));
    }

    #[Test]
    public function between_works_regardless_of_argument_order()
    {
        $this->assertTrue(StatusEnum::Inactive->between(StatusEnum::Pending, StatusEnum::Active));
    }

    #[Test]
    public function between_returns_false_when_out_of_range()
    {
        $this->assertFalse(StatusEnum::Pending->between(StatusEnum::Active, StatusEnum::Inactive));
    }
}
