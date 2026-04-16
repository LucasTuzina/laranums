<?php

namespace Lucastuzina\Laranums\Tests\Unit\Enums;

use Lucastuzina\Laranums\Enums\Month;
use Lucastuzina\Laranums\Enums\Quarter;
use Lucastuzina\Laranums\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class MonthTest extends TestCase
{
    #[Test]
    public function months_are_numbered_one_to_twelve()
    {
        $this->assertSame(1, Month::JANUARY->value);
        $this->assertSame(12, Month::DECEMBER->value);
    }

    #[Test]
    public function days_in_month_is_correct_for_fixed_months()
    {
        $this->assertSame(31, Month::JANUARY->daysInMonth(2024));
        $this->assertSame(30, Month::APRIL->daysInMonth(2024));
        $this->assertSame(31, Month::DECEMBER->daysInMonth(2024));
    }

    #[Test]
    public function days_in_february_handles_leap_year()
    {
        $this->assertSame(29, Month::FEBRUARY->daysInMonth(2024));
        $this->assertSame(28, Month::FEBRUARY->daysInMonth(2023));
    }

    #[Test]
    public function quarter_is_derived_correctly()
    {
        $this->assertSame(Quarter::Q1, Month::JANUARY->quarter());
        $this->assertSame(Quarter::Q1, Month::MARCH->quarter());
        $this->assertSame(Quarter::Q2, Month::APRIL->quarter());
        $this->assertSame(Quarter::Q3, Month::JULY->quarter());
        $this->assertSame(Quarter::Q4, Month::OCTOBER->quarter());
        $this->assertSame(Quarter::Q4, Month::DECEMBER->quarter());
    }

    #[Test]
    public function short_returns_three_letter_abbreviation()
    {
        $this->assertSame('Jan', Month::JANUARY->short());
        $this->assertSame('Feb', Month::FEBRUARY->short());
        $this->assertSame('Dec', Month::DECEMBER->short());
    }
}
