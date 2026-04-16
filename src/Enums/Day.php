<?php

namespace Lucastuzina\Laranums\Enums;

use Lucastuzina\Laranums\Attributes\Label;
use Lucastuzina\Laranums\Laranum;

/**
 * Days of the week using ISO-8601 numbering (Monday = 1 … Sunday = 7).
 */
enum Day: int
{
    use Laranum;

    #[Label('Monday')]
    case MONDAY = 1;
    #[Label('Tuesday')]
    case TUESDAY = 2;
    #[Label('Wednesday')]
    case WEDNESDAY = 3;
    #[Label('Thursday')]
    case THURSDAY = 4;
    #[Label('Friday')]
    case FRIDAY = 5;
    #[Label('Saturday')]
    case SATURDAY = 6;
    #[Label('Sunday')]
    case SUNDAY = 7;

    public function isWeekday(): bool
    {
        return $this->value <= 5;
    }

    public function isWeekend(): bool
    {
        return !$this->isWeekday();
    }

    /**
     * Three-letter abbreviation (Mon, Tue, Wed, …).
     */
    public function short(): string
    {
        return substr($this->label(), 0, 3);
    }
}
