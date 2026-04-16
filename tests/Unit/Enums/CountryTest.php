<?php

namespace Lucastuzina\Laranums\Tests\Unit\Enums;

use Lucastuzina\Laranums\Enums\Continent;
use Lucastuzina\Laranums\Enums\Country;
use Lucastuzina\Laranums\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class CountryTest extends TestCase
{
    #[Test]
    public function it_has_all_iso_3166_countries()
    {
        $this->assertSame(249, Country::count());
    }

    #[Test]
    public function alpha2_is_the_case_value()
    {
        $this->assertSame('DE', Country::DE->alpha2());
        $this->assertSame('US', Country::US->alpha2());
    }

    #[Test]
    public function alpha3_is_correct()
    {
        $this->assertSame('DEU', Country::DE->alpha3());
        $this->assertSame('USA', Country::US->alpha3());
        $this->assertSame('GBR', Country::GB->alpha3());
        $this->assertSame('JPN', Country::JP->alpha3());
    }

    #[Test]
    public function numeric_is_zero_padded_three_digits()
    {
        $this->assertSame('276', Country::DE->numeric());
        $this->assertSame('840', Country::US->numeric());
        $this->assertSame('004', Country::AF->numeric());
    }

    #[Test]
    public function dial_code_includes_leading_plus()
    {
        $this->assertSame('+49', Country::DE->dialCode());
        $this->assertSame('+1', Country::US->dialCode());
        $this->assertSame('+44', Country::GB->dialCode());
    }

    #[Test]
    public function continent_returns_continent_enum()
    {
        $this->assertSame(Continent::EU, Country::DE->continent());
        $this->assertSame(Continent::NA, Country::US->continent());
        $this->assertSame(Continent::AS, Country::JP->continent());
        $this->assertSame(Continent::AF, Country::EG->continent());
    }

    #[Test]
    public function flag_is_a_regional_indicator_emoji()
    {
        $this->assertSame("🇩🇪", Country::DE->flag());
        $this->assertSame("🇺🇸", Country::US->flag());
        $this->assertSame("🇯🇵", Country::JP->flag());
    }

    #[Test]
    public function reserved_word_cases_still_work()
    {
        $this->assertSame('DO', Country::DO_->value);
        $this->assertSame('IN', Country::IN_->value);
        $this->assertSame('IS', Country::IS_->value);
        $this->assertSame('NO', Country::NO_->value);
    }
}
