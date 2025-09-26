<?php

namespace Lucastuzina\Laranums\Enums;

use InvalidArgumentException;
use Lucastuzina\Laranums\Laranum;

enum Unit: string
{
    use Laranum;

    case Centimeter = 'cm';
    case Meter = 'm';
    case Kilometer = 'km';
    case Inch = 'inch';
    case Foot = 'ft';
    case Yard = 'yd';
    case Mile = 'mi';

    case Gram = 'g';
    case Kilogram = 'kg';
    case Ton = 't';
    case Ounce = 'oz';
    case Pound = 'lbs';

    case Seconds = 'sec';
    case Minutes = 'min';
    case Hours = 'h';
    case Days = 'd';
    case Weeks = 'wk';
    case Months = 'mo';
    case Years = 'yr';

    case Percentage = '%';
    case KilometersPerHour = 'km/h';
    case MilesPerHour = 'mph';
    case MetersPerSecond = 'm/s';
    case FeetPerSecond = 'ft/s';

    case BeatsPerMinute = 'bpm';

    case Count = 'count';

    case MlPerKgMin = 'ml/kg/min';

    case Newton = 'N';
    case Joule = 'J';
    case Watt = 'W';
    case Kilowatt = 'kW';

    case Celsius = '°C';
    case Fahrenheit = '°F';
    case Kelvin = 'K';

    public static function convert(float $value, Unit $from, Unit $to): float
    {
        if ($from === $to) {
            return $value;
        }

        $conversions = [
            self::Centimeter->value => [
                self::Meter->value => fn ($v) => $v / 100,
            ],
            self::Meter->value => [
                self::Centimeter->value => fn ($v) => $v * 100,
                self::Kilometer->value => fn ($v) => $v / 1000,
            ],
            self::Kilometer->value => [
                self::Meter->value => fn ($v) => $v * 1000,
            ],

            self::Gram->value => [
                self::Kilogram->value => fn ($v) => $v / 1000,
            ],
            self::Kilogram->value => [
                self::Gram->value => fn ($v) => $v * 1000,
                self::Ton->value => fn ($v) => $v / 1000,
            ],
            self::Ton->value => [
                self::Kilogram->value => fn ($v) => $v * 1000,
            ],

            self::MetersPerSecond->value => [
                self::KilometersPerHour->value => fn ($v) => $v * 3.6,
            ],
            self::KilometersPerHour->value => [
                self::MetersPerSecond->value => fn ($v) => $v / 3.6,
            ],

            self::Celsius->value => [
                self::Fahrenheit->value => fn ($v) => $v * 9 / 5 + 32,
                self::Kelvin->value => fn ($v) => $v + 273.15,
            ],
            self::Fahrenheit->value => [
                self::Celsius->value => fn ($v) => ($v - 32) * 5 / 9,
            ],
            self::Kelvin->value => [
                self::Celsius->value => fn ($v) => $v - 273.15,
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