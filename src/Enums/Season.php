<?php

namespace Lucastuzina\Laranums\Enums;

use Lucastuzina\Laranums\Attributes\Label;
use Lucastuzina\Laranums\Laranum;

/**
 * Meteorological seasons (northern-hemisphere convention).
 * Use Season::fromMonth() with a hemisphere flag for explicit resolution.
 */
enum Season: string
{
    use Laranum;

    #[Label('Spring')]
    case SPRING = 'spring';
    #[Label('Summer')]
    case SUMMER = 'summer';
    #[Label('Autumn')]
    case AUTUMN = 'autumn';
    #[Label('Winter')]
    case WINTER = 'winter';

    /**
     * Resolve a season from a month using meteorological definitions.
     *
     * Northern hemisphere: spring (Mar–May), summer (Jun–Aug),
     *   autumn (Sep–Nov), winter (Dec–Feb).
     * Southern hemisphere is shifted by six months.
     */
    public static function fromMonth(Month $month, bool $southernHemisphere = false): self
    {
        $m = $month->value;

        $season = match (true) {
            $m >= 3 && $m <= 5  => self::SPRING,
            $m >= 6 && $m <= 8  => self::SUMMER,
            $m >= 9 && $m <= 11 => self::AUTUMN,
            default             => self::WINTER,
        };

        if (!$southernHemisphere) {
            return $season;
        }

        return match ($season) {
            self::SPRING => self::AUTUMN,
            self::SUMMER => self::WINTER,
            self::AUTUMN => self::SPRING,
            self::WINTER => self::SUMMER,
        };
    }
}
