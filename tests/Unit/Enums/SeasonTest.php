<?php

namespace Lucastuzina\Laranums\Tests\Unit\Enums;

use Lucastuzina\Laranums\Enums\Month;
use Lucastuzina\Laranums\Enums\Season;
use Lucastuzina\Laranums\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class SeasonTest extends TestCase
{
    #[Test]
    public function northern_hemisphere_resolves_correctly()
    {
        $this->assertSame(Season::WINTER, Season::fromMonth(Month::JANUARY));
        $this->assertSame(Season::SPRING, Season::fromMonth(Month::APRIL));
        $this->assertSame(Season::SUMMER, Season::fromMonth(Month::JULY));
        $this->assertSame(Season::AUTUMN, Season::fromMonth(Month::OCTOBER));
        $this->assertSame(Season::WINTER, Season::fromMonth(Month::DECEMBER));
    }

    #[Test]
    public function southern_hemisphere_is_offset_by_six_months()
    {
        $this->assertSame(Season::SUMMER, Season::fromMonth(Month::JANUARY, southernHemisphere: true));
        $this->assertSame(Season::AUTUMN, Season::fromMonth(Month::APRIL, southernHemisphere: true));
        $this->assertSame(Season::WINTER, Season::fromMonth(Month::JULY, southernHemisphere: true));
        $this->assertSame(Season::SPRING, Season::fromMonth(Month::OCTOBER, southernHemisphere: true));
    }
}
