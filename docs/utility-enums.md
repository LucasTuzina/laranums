# Utility Enums

Laranums ships with ready-to-use enums for common, domain-neutral needs. All of them include the full `Laranum` trait, so every utility method is available out of the box.

## Unit

A comprehensive units-of-measurement enum with built-in conversion.

```php
use Lucastuzina\Laranums\Enums\Unit;
```

### Supported Categories

| Category       | Cases                                                               |
|----------------|---------------------------------------------------------------------|
| Length         | Centimeter, Meter, Kilometer, Inch, Foot, Yard, Mile                |
| Weight         | Gram, Kilogram, Ton, Ounce, Pound                                   |
| Time           | Seconds, Minutes, Hours, Days, Weeks, Months, Years                 |
| Speed          | KilometersPerHour, MilesPerHour, MetersPerSecond, FeetPerSecond     |
| Temperature    | Celsius, Fahrenheit, Kelvin                                         |
| Other          | Percentage, BeatsPerMinute, Count, MlPerKgMin, Newton, Joule, Watt, Kilowatt |

### Usage

```php
$meters = Unit::Meter;
echo $meters->value; // 'm'

// Conversion between compatible units
Unit::convert(100, Unit::Centimeter, Unit::Meter);   // 1.0
Unit::convert(32, Unit::Fahrenheit, Unit::Celsius);  // 0.0
Unit::convert(1, Unit::Kilometer, Unit::Meter);      // 1000.0

// All Laranum trait methods are available
Unit::rand();                   // A random unit
Unit::fromValue('km');          // Unit::Kilometer
Unit::first();                  // First declared unit
Unit::Meter->label();           // Translated / attribute label
```

Converting between incompatible categories (e.g. meters to grams) will throw an exception — conversion is type-safe.

## HttpStatus

All common IANA status codes from 100 to 505. Each case carries a `#[Label]` with the official reason phrase.

```php
use Lucastuzina\Laranums\Enums\HttpStatus;

$status = HttpStatus::NOT_FOUND;

$status->value;           // 404
$status->reasonPhrase();  // 'Not Found'
$status->category();      // 4
$status->isClientError(); // true
$status->isError();       // true (covers 4xx + 5xx)
```

| Method                 | Description                                               |
|------------------------|-----------------------------------------------------------|
| `category(): int`      | Numeric category (1-5).                                   |
| `isInformational()`    | 1xx                                                       |
| `isSuccess()`          | 2xx                                                       |
| `isRedirection()`      | 3xx                                                       |
| `isClientError()`      | 4xx                                                       |
| `isServerError()`      | 5xx                                                       |
| `isError()`            | 4xx or 5xx                                                |
| `reasonPhrase()`       | Official IANA reason phrase (same as `label()`).          |

## HttpMethod

```php
use Lucastuzina\Laranums\Enums\HttpMethod;

HttpMethod::GET->isSafe();          // true
HttpMethod::POST->isIdempotent();   // false
HttpMethod::PUT->isIdempotent();    // true
HttpMethod::PATCH->hasRequestBody();// true
```

Cases: `GET`, `POST`, `PUT`, `PATCH`, `DELETE`, `HEAD`, `OPTIONS`, `TRACE`, `CONNECT`. Semantics follow RFC 7231.

| Method              | Description                                                             |
|---------------------|-------------------------------------------------------------------------|
| `isSafe()`          | Doesn't alter server state (GET, HEAD, OPTIONS, TRACE).                 |
| `isIdempotent()`    | Repeating has the same effect (GET, HEAD, OPTIONS, TRACE, PUT, DELETE). |
| `hasRequestBody()`  | Typically carries a request body (POST, PUT, PATCH).                    |

## Day

Days of the week using **ISO-8601 numbering** (Monday = 1 … Sunday = 7).

```php
use Lucastuzina\Laranums\Enums\Day;

Day::MONDAY->value;        // 1
Day::MONDAY->isWeekday();  // true
Day::SATURDAY->isWeekend();// true
Day::MONDAY->short();      // 'Mon'
```

## Month

```php
use Lucastuzina\Laranums\Enums\Month;

Month::FEBRUARY->daysInMonth(2024);  // 29 (leap-year aware)
Month::JULY->quarter();              // Quarter::Q3
Month::JANUARY->short();             // 'Jan'
```

| Method                            | Description                                                 |
|-----------------------------------|-------------------------------------------------------------|
| `daysInMonth(?int $year = null)`  | Leap-year-aware day count. Defaults to the current year.    |
| `quarter(): Quarter`              | The `Quarter` this month belongs to.                        |
| `short(): string`                 | Three-letter abbreviation.                                  |

## Quarter

```php
use Lucastuzina\Laranums\Enums\Quarter;

Quarter::Q2->months();      // [Month::APRIL, Month::MAY, Month::JUNE]
Quarter::Q1->firstMonth();  // Month::JANUARY
Quarter::Q4->lastMonth();   // Month::DECEMBER
```

## Season

Meteorological seasons with hemisphere support.

```php
use Lucastuzina\Laranums\Enums\Season;
use Lucastuzina\Laranums\Enums\Month;

Season::fromMonth(Month::JULY);                                // Season::SUMMER
Season::fromMonth(Month::JULY, southernHemisphere: true);      // Season::WINTER
```

## CardinalDirection

Eight-point compass (four cardinal + four ordinal directions).

```php
use Lucastuzina\Laranums\Enums\CardinalDirection;

CardinalDirection::N->degrees();          // 0
CardinalDirection::NE->degrees();         // 45
CardinalDirection::N->opposite();         // CardinalDirection::S
CardinalDirection::NE->isOrdinal();       // true
CardinalDirection::fromDegrees(100);      // CardinalDirection::E  (nearest)
CardinalDirection::fromDegrees(-90);      // CardinalDirection::W  (wraps around)
```

| Method                                  | Description                                                  |
|-----------------------------------------|--------------------------------------------------------------|
| `degrees(): int`                        | Compass bearing (0° = N, clockwise).                         |
| `opposite(): self`                      | Directly opposite direction (involutive).                    |
| `isCardinal(): bool`                    | One of N, E, S, W.                                           |
| `isOrdinal(): bool`                     | One of NE, SE, SW, NW.                                       |
| `static fromDegrees(float $d): self`    | Nearest direction for a bearing; wraps around 360.           |

## Continent

Seven-continent model with ISO two-letter codes.

```php
use Lucastuzina\Laranums\Enums\Continent;

Continent::EU->code();   // 'EU'
Continent::NA->label();  // 'North America'
Continent::cases();      // 7 continents
```

Cases: `AF`, `AN`, `AS`, `EU`, `NA`, `OC`, `SA`.

## Currency

All active ISO 4217 currencies (~150 codes). Symbol and decimal places follow the ISO specification.

```php
use Lucastuzina\Laranums\Enums\Currency;

$eur = Currency::EUR;

$eur->code();     // 'EUR'
$eur->symbol();   // '€'
$eur->decimals(); // 2
$eur->label();    // 'Euro'

Currency::JPY->decimals();       // 0   (yen has no minor unit)
Currency::BHD->decimals();       // 3   (Bahraini Dinar)
Currency::USD->format(1234.5);   // '$1,234.50' (via intl, locale-aware if available)
```

> **Note on reserved-word cases:** `Currency::PHP_` (Philippine Peso) and `Currency::TRY_` (Turkish Lira) use trailing underscores because `PHP` and `TRY` are reserved tokens. Their values are still the clean `'PHP'` and `'TRY'`, so `Currency::fromValue('TRY')` works as expected.

## Country

All 249 ISO 3166-1 countries. Alpha-3 codes, numeric codes, dial codes and continent mappings are included out of the box.

```php
use Lucastuzina\Laranums\Enums\Country;

$de = Country::DE;

$de->alpha2();     // 'DE'
$de->alpha3();     // 'DEU'
$de->numeric();    // '276'
$de->dialCode();   // '+49'
$de->continent();  // Continent::EU
$de->label();      // 'Germany'
$de->flag();       // '🇩🇪'  (derived from alpha-2 via regional indicators)
```

> **Note on reserved-word cases:** A handful of countries whose alpha-2 code clashes with PHP reserved words are suffixed with an underscore — `AS_` (American Samoa), `DO_` (Dominican Republic), `IN_` (India), `IS_` (Iceland), `NA_` (Namibia), `NO_` (Norway), `TO_` (Tonga). Values remain the clean two-letter codes.

## Language

All ISO 639-1 language codes (~180). Native endonyms and RTL flags are bundled.

```php
use Lucastuzina\Laranums\Enums\Language;

$de = Language::DE;

$de->code();        // 'de'
$de->label();       // 'German'
$de->nativeName();  // 'Deutsch'
$de->isRtl();       // false

Language::AR->isRtl();       // true  (Arabic)
Language::HE->nativeName();  // 'עברית'  (Hebrew)
Language::JA->nativeName();  // '日本語'  (Japanese)
```

Commonly-known RTL cases: `AR` (Arabic), `HE` (Hebrew), `FA` (Persian), `UR` (Urdu), `PS` (Pashto), `DV` (Divehi), `YI` (Yiddish), `KU` (Kurdish), `UG` (Uyghur), `SD` (Sindhi), `KS` (Kashmiri), `HA` (Hausa).
