<?php

namespace Lucastuzina\Laranums\Tests\Unit\Enums;

use Lucastuzina\Laranums\Enums\CardinalDirection;
use Lucastuzina\Laranums\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class CardinalDirectionTest extends TestCase
{
    #[Test]
    public function degrees_match_compass_bearings()
    {
        $this->assertSame(0, CardinalDirection::N->degrees());
        $this->assertSame(90, CardinalDirection::E->degrees());
        $this->assertSame(180, CardinalDirection::S->degrees());
        $this->assertSame(270, CardinalDirection::W->degrees());
        $this->assertSame(45, CardinalDirection::NE->degrees());
        $this->assertSame(315, CardinalDirection::NW->degrees());
    }

    #[Test]
    public function opposite_returns_directly_opposite_direction()
    {
        $this->assertSame(CardinalDirection::S, CardinalDirection::N->opposite());
        $this->assertSame(CardinalDirection::N, CardinalDirection::S->opposite());
        $this->assertSame(CardinalDirection::W, CardinalDirection::E->opposite());
        $this->assertSame(CardinalDirection::NE, CardinalDirection::SW->opposite());
    }

    #[Test]
    public function opposite_is_involutive()
    {
        foreach (CardinalDirection::cases() as $direction) {
            $this->assertSame($direction, $direction->opposite()->opposite());
        }
    }

    #[Test]
    public function is_cardinal_and_is_ordinal_partition_the_enum()
    {
        $this->assertTrue(CardinalDirection::N->isCardinal());
        $this->assertTrue(CardinalDirection::E->isCardinal());
        $this->assertFalse(CardinalDirection::NE->isCardinal());

        $this->assertTrue(CardinalDirection::NE->isOrdinal());
        $this->assertFalse(CardinalDirection::N->isOrdinal());
    }

    #[Test]
    public function from_degrees_picks_nearest_direction()
    {
        $this->assertSame(CardinalDirection::N,  CardinalDirection::fromDegrees(0));
        $this->assertSame(CardinalDirection::N,  CardinalDirection::fromDegrees(10));
        $this->assertSame(CardinalDirection::NE, CardinalDirection::fromDegrees(45));
        $this->assertSame(CardinalDirection::E,  CardinalDirection::fromDegrees(100));
        $this->assertSame(CardinalDirection::S,  CardinalDirection::fromDegrees(180));
        $this->assertSame(CardinalDirection::NW, CardinalDirection::fromDegrees(315));
    }

    #[Test]
    public function from_degrees_wraps_around()
    {
        $this->assertSame(CardinalDirection::N, CardinalDirection::fromDegrees(360));
        $this->assertSame(CardinalDirection::N, CardinalDirection::fromDegrees(720));
        $this->assertSame(CardinalDirection::W, CardinalDirection::fromDegrees(-90));
    }
}
