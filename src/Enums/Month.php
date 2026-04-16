<?php

namespace Lucastuzina\Laranums\Enums;

use Lucastuzina\Laranums\Attributes\Label;
use Lucastuzina\Laranums\Laranum;

enum Month: int
{
    use Laranum;

    #[Label('January')]
    case JANUARY = 1;
    #[Label('February')]
    case FEBRUARY = 2;
    #[Label('March')]
    case MARCH = 3;
    #[Label('April')]
    case APRIL = 4;
    #[Label('May')]
    case MAY = 5;
    #[Label('June')]
    case JUNE = 6;
    #[Label('July')]
    case JULY = 7;
    #[Label('August')]
    case AUGUST = 8;
    #[Label('September')]
    case SEPTEMBER = 9;
    #[Label('October')]
    case OCTOBER = 10;
    #[Label('November')]
    case NOVEMBER = 11;
    #[Label('December')]
    case DECEMBER = 12;

    /**
     * Number of days in this month. Defaults to the current year.
     * Uses cal_days_in_month for leap-year correctness.
     */
    public function daysInMonth(?int $year = null): int
    {
        $year ??= (int) date('Y');
        return (int) date('t', mktime(0, 0, 0, $this->value, 1, $year));
    }

    /**
     * The quarter (1-4) this month belongs to.
     */
    public function quarter(): Quarter
    {
        return Quarter::from((int) ceil($this->value / 3));
    }

    /**
     * Three-letter abbreviation (Jan, Feb, Mar, …).
     */
    public function short(): string
    {
        return substr($this->label(), 0, 3);
    }
}
