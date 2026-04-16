<?php

namespace Lucastuzina\Laranums;

use Lucastuzina\Laranums\Concerns\HasAttributes;
use Lucastuzina\Laranums\Concerns\HasComparison;
use Lucastuzina\Laranums\Concerns\HasConversion;
use Lucastuzina\Laranums\Concerns\HasFiltering;
use Lucastuzina\Laranums\Concerns\HasJsonSerialization;
use Lucastuzina\Laranums\Concerns\HasLookup;
use Lucastuzina\Laranums\Concerns\HasMetadata;
use Lucastuzina\Laranums\Concerns\HasNavigation;
use Lucastuzina\Laranums\Concerns\HasOrdering;
use Lucastuzina\Laranums\Concerns\HasTranslations;
use Lucastuzina\Laranums\Concerns\HasValidation;

/**
 * Umbrella trait that composes all Laranum concerns.
 *
 * Each concern can also be used individually from Lucastuzina\Laranums\Concerns\*
 * if you only want a subset of the functionality.
 */
trait Laranum
{
    use HasLookup;
    use HasMetadata;
    use HasConversion;
    use HasTranslations;
    use HasAttributes;
    use HasNavigation;
    use HasFiltering;
    use HasComparison;
    use HasOrdering;
    use HasJsonSerialization;
    use HasValidation;
}
