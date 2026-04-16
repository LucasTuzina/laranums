<?php

namespace Lucastuzina\Laranums\Tests\Unit\Enums;

use Lucastuzina\Laranums\Enums\Month;
use Lucastuzina\Laranums\Enums\Quarter;
use Lucastuzina\Laranums\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class QuarterTest extends TestCase
{
    #[Test]
    public function months_return_the_three_months_of_the_quarter()
    {
        $this->assertSame(
            [Month::JANUARY, Month::FEBRUARY, Month::MARCH],
            Quarter::Q1->months()
        );
        $this->assertSame(
            [Month::APRIL, Month::MAY, Month::JUNE],
            Quarter::Q2->months()
        );
        $this->assertSame(
            [Month::OCTOBER, Month::NOVEMBER, Month::DECEMBER],
            Quarter::Q4->months()
        );
    }

    #[Test]
    public function first_and_last_month_are_correct()
    {
        $this->assertSame(Month::JANUARY, Quarter::Q1->firstMonth());
        $this->assertSame(Month::MARCH, Quarter::Q1->lastMonth());
        $this->assertSame(Month::OCTOBER, Quarter::Q4->firstMonth());
        $this->assertSame(Month::DECEMBER, Quarter::Q4->lastMonth());
    }
}
