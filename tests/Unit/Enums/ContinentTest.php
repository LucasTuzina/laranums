<?php

namespace Lucastuzina\Laranums\Tests\Unit\Enums;

use Lucastuzina\Laranums\Enums\Continent;
use Lucastuzina\Laranums\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class ContinentTest extends TestCase
{
    #[Test]
    public function it_has_seven_continents()
    {
        $this->assertCount(7, Continent::cases());
    }

    #[Test]
    public function code_returns_two_letter_value()
    {
        $this->assertSame('AF', Continent::AF->code());
        $this->assertSame('EU', Continent::EU->code());
    }

    #[Test]
    public function labels_are_human_readable()
    {
        $this->assertSame('Africa', Continent::AF->label());
        $this->assertSame('North America', Continent::NA->label());
        $this->assertSame('South America', Continent::SA->label());
    }
}
