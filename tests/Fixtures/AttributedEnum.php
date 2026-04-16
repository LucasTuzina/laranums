<?php

namespace Lucastuzina\Laranums\Tests\Fixtures;

use Lucastuzina\Laranums\Attributes\Color;
use Lucastuzina\Laranums\Attributes\Description;
use Lucastuzina\Laranums\Attributes\Icon;
use Lucastuzina\Laranums\Attributes\Label;
use Lucastuzina\Laranums\Laranum;

enum AttributedEnum: string
{
    use Laranum;

    #[Label('Pending Order'), Color('yellow'), Icon('clock'), Description('Awaiting payment')]
    case Pending = 'pending';

    #[Label('Paid Order'), Color('green'), Icon('check')]
    case Paid = 'paid';

    case Plain = 'plain';
}
