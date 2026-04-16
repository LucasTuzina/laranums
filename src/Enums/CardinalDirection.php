<?php

namespace Lucastuzina\Laranums\Enums;

use Lucastuzina\Laranums\Attributes\Label;
use Lucastuzina\Laranums\Laranum;

enum CardinalDirection: string
{
    use Laranum;

    #[Label('North')]
    case N = 'N';
    #[Label('Northeast')]
    case NE = 'NE';
    #[Label('East')]
    case E = 'E';
    #[Label('Southeast')]
    case SE = 'SE';
    #[Label('South')]
    case S = 'S';
    #[Label('Southwest')]
    case SW = 'SW';
    #[Label('West')]
    case W = 'W';
    #[Label('Northwest')]
    case NW = 'NW';

    /**
     * Compass bearing in degrees (North = 0°, clockwise).
     */
    public function degrees(): int
    {
        return match ($this) {
            self::N  => 0,
            self::NE => 45,
            self::E  => 90,
            self::SE => 135,
            self::S  => 180,
            self::SW => 225,
            self::W  => 270,
            self::NW => 315,
        };
    }

    /**
     * The directly opposite direction.
     */
    public function opposite(): self
    {
        return match ($this) {
            self::N  => self::S,
            self::NE => self::SW,
            self::E  => self::W,
            self::SE => self::NW,
            self::S  => self::N,
            self::SW => self::NE,
            self::W  => self::E,
            self::NW => self::SE,
        };
    }

    /**
     * Whether this is one of the four cardinal directions (N, E, S, W).
     */
    public function isCardinal(): bool
    {
        return in_array($this, [self::N, self::E, self::S, self::W], true);
    }

    /**
     * Whether this is one of the four ordinal / intercardinal directions (NE, SE, SW, NW).
     */
    public function isOrdinal(): bool
    {
        return !$this->isCardinal();
    }

    /**
     * Pick the nearest direction for a given bearing in degrees (0-360, wraps).
     */
    public static function fromDegrees(float $degrees): self
    {
        $normalised = fmod(fmod($degrees, 360) + 360, 360);
        $bucket = (int) round($normalised / 45) % 8;

        return [
            self::N, self::NE, self::E, self::SE,
            self::S, self::SW, self::W, self::NW,
        ][$bucket];
    }
}
