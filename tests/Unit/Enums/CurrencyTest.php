<?php

namespace Lucastuzina\Laranums\Tests\Unit\Enums;

use Lucastuzina\Laranums\Enums\Currency;
use Lucastuzina\Laranums\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class CurrencyTest extends TestCase
{
    #[Test]
    public function it_covers_all_major_currencies()
    {
        $this->assertGreaterThan(150, Currency::count());
    }

    #[Test]
    public function code_returns_the_iso_4217_value()
    {
        $this->assertSame('EUR', Currency::EUR->code());
        $this->assertSame('JPY', Currency::JPY->code());
        $this->assertSame('PHP', Currency::PHP_->code());
        $this->assertSame('TRY', Currency::TRY_->code());
    }

    #[Test]
    public function symbol_returns_known_symbols()
    {
        $this->assertSame('€', Currency::EUR->symbol());
        $this->assertSame('$', Currency::USD->symbol());
        $this->assertSame('¥', Currency::JPY->symbol());
        $this->assertSame('£', Currency::GBP->symbol());
    }

    #[Test]
    public function decimals_follow_iso_4217()
    {
        $this->assertSame(2, Currency::USD->decimals());
        $this->assertSame(2, Currency::EUR->decimals());
        $this->assertSame(0, Currency::JPY->decimals());
        $this->assertSame(0, Currency::KRW->decimals());
        $this->assertSame(3, Currency::BHD->decimals());
        $this->assertSame(3, Currency::KWD->decimals());
    }

    #[Test]
    public function format_produces_a_non_empty_string()
    {
        $result = Currency::EUR->format(1234.5);
        $this->assertNotEmpty($result);
        $this->assertIsString($result);
    }

    #[Test]
    public function labels_are_human_readable()
    {
        $this->assertSame('Euro', Currency::EUR->label());
        $this->assertSame('US Dollar', Currency::USD->label());
        $this->assertSame('Japanese Yen', Currency::JPY->label());
    }
}
