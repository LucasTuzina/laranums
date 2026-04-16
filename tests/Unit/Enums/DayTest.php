<?php

namespace Lucastuzina\Laranums\Tests\Unit\Enums;

use Lucastuzina\Laranums\Enums\Day;
use Lucastuzina\Laranums\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class DayTest extends TestCase
{
    #[Test]
    public function monday_is_one_per_iso_8601()
    {
        $this->assertSame(1, Day::MONDAY->value);
        $this->assertSame(7, Day::SUNDAY->value);
    }

    #[Test]
    public function weekdays_are_mon_to_fri()
    {
        $this->assertTrue(Day::MONDAY->isWeekday());
        $this->assertTrue(Day::FRIDAY->isWeekday());

        $this->assertFalse(Day::SATURDAY->isWeekday());
        $this->assertFalse(Day::SUNDAY->isWeekday());
    }

    #[Test]
    public function weekend_is_sat_and_sun()
    {
        $this->assertTrue(Day::SATURDAY->isWeekend());
        $this->assertTrue(Day::SUNDAY->isWeekend());

        $this->assertFalse(Day::MONDAY->isWeekend());
    }

    #[Test]
    public function short_returns_three_letter_abbreviation()
    {
        $this->assertSame('Mon', Day::MONDAY->short());
        $this->assertSame('Fri', Day::FRIDAY->short());
        $this->assertSame('Sun', Day::SUNDAY->short());
    }
}
