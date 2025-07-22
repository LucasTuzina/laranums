<?php

namespace Lucastuzina\Laranums\Tests\Fixtures;

use Lucastuzina\Laranums\Laranum;

enum PriorityEnum: int
{
    use Laranum;

    case Low = 1;
    case Medium = 2;
    case High = 3;
}
