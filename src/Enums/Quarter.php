<?php

namespace Lucastuzina\Laranums\Enums;

use Lucastuzina\Laranums\Attributes\Label;
use Lucastuzina\Laranums\Laranum;

enum Quarter: int
{
    use Laranum;

    #[Label('Q1')]
    case Q1 = 1;
    #[Label('Q2')]
    case Q2 = 2;
    #[Label('Q3')]
    case Q3 = 3;
    #[Label('Q4')]
    case Q4 = 4;

    /**
     * The three Month cases in this quarter, ordered.
     *
     * @return array<int, Month>
     */
    public function months(): array
    {
        $start = ($this->value - 1) * 3 + 1;

        return [
            Month::from($start),
            Month::from($start + 1),
            Month::from($start + 2),
        ];
    }

    public function firstMonth(): Month
    {
        return $this->months()[0];
    }

    public function lastMonth(): Month
    {
        return $this->months()[2];
    }
}
