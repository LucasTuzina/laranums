<?php

namespace Lucastuzina\Laranums\Enums;

use InvalidArgumentException;
use Lucastuzina\Laranums\Laranum;

enum Unit: string
{
    use Laranum;

    case CENTIMETER = 'cm';
    case METER = 'm';
    case KILOMETER = 'km';
    case INCH = 'inch';
    case FOOT = 'ft';
    case YARD = 'yd';
    case MILE = 'mi';

    case GRAM = 'g';
    case KILOGRAM = 'kg';
    case TON = 't';
    case OUNCE = 'oz';
    case POUND = 'lbs';

    case SECONDS = 'sec';
    case MINUTES = 'min';
    case HOURS = 'h';
    case DAYS = 'd';
    case WEEKS = 'wk';
    case MONTHS = 'mo';
    case YEARS = 'yr';

    case PERCENTAGE = '%';
    case KILOMETERS_PER_HOUR = 'km/h';
    case MILES_PER_HOUR = 'mph';
    case METERS_PER_SECOND = 'm/s';
    case FEET_PER_SECOND = 'ft/s';

    case BEATS_PER_MINUTE = 'bpm';

    case COUNT = 'count';

    case ML_PER_KG_MIN = 'ml/kg/min';

    case NEWTON = 'N';
    case JOULE = 'J';
    case WATT = 'W';
    case KILOWATT = 'kW';

    case CELSIUS = '°C';
    case FAHRENHEIT = '°F';
    case KELVIN = 'K';

    public static function convert(float $value, Unit $from, Unit $to): float
    {
        if ($from === $to) {
            return $value;
        }

        $conversions = [
            self::CENTIMETER->value => [
                self::METER->value => fn ($v) => $v / 100,
            ],
            self::METER->value => [
                self::CENTIMETER->value => fn ($v) => $v * 100,
                self::KILOMETER->value => fn ($v) => $v / 1000,
            ],
            self::KILOMETER->value => [
                self::METER->value => fn ($v) => $v * 1000,
            ],

            self::GRAM->value => [
                self::KILOGRAM->value => fn ($v) => $v / 1000,
            ],
            self::KILOGRAM->value => [
                self::GRAM->value => fn ($v) => $v * 1000,
                self::TON->value => fn ($v) => $v / 1000,
            ],
            self::TON->value => [
                self::KILOGRAM->value => fn ($v) => $v * 1000,
            ],

            self::METERS_PER_SECOND->value => [
                self::KILOMETERS_PER_HOUR->value => fn ($v) => $v * 3.6,
            ],
            self::KILOMETERS_PER_HOUR->value => [
                self::METERS_PER_SECOND->value => fn ($v) => $v / 3.6,
            ],

            self::CELSIUS->value => [
                self::FAHRENHEIT->value => fn ($v) => $v * 9 / 5 + 32,
                self::KELVIN->value => fn ($v) => $v + 273.15,
            ],
            self::FAHRENHEIT->value => [
                self::CELSIUS->value => fn ($v) => ($v - 32) * 5 / 9,
            ],
            self::KELVIN->value => [
                self::CELSIUS->value => fn ($v) => $v - 273.15,
            ],
        ];

        $fromKey = $from->value;
        $toKey = $to->value;

        if (isset($conversions[$fromKey][$toKey])) {
            return $conversions[$fromKey][$toKey]($value);
        }

        throw new InvalidArgumentException("No conversion defined from $fromKey to $toKey.");
    }
}