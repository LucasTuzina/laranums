<?php

namespace Lucastuzina\Laranums\Enums;

use Lucastuzina\Laranums\Attributes\Label;
use Lucastuzina\Laranums\Laranum;

enum Continent: string
{
    use Laranum;

    #[Label('Africa')]
    case AF = 'AF';
    #[Label('Antarctica')]
    case AN = 'AN';
    #[Label('Asia')]
    case AS = 'AS';
    #[Label('Europe')]
    case EU = 'EU';
    #[Label('North America')]
    case NA = 'NA';
    #[Label('Oceania')]
    case OC = 'OC';
    #[Label('South America')]
    case SA = 'SA';

    /**
     * Two-letter continent code (the enum value).
     */
    public function code(): string
    {
        return $this->value;
    }
}
