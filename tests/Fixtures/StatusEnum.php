<?php

namespace Lucastuzina\Laranums\Tests\Fixtures;

use Lucastuzina\Laranums\Laranum;

enum StatusEnum: string
{
    use Laranum;

    case Active = 'active';
    case Inactive = 'inactive';
    case Pending = 'pending';
}
