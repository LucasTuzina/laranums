<?php

namespace Lucastuzina\Laranums\Tests\Fixtures;

use Lucastuzina\Laranums\Laranum;

enum SimpleEnum
{
    use Laranum;

    case One;
    case Two;
    case Three;
}
