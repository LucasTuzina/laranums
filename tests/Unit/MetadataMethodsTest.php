<?php

namespace Lucastuzina\Laranums\Tests\Unit;

use Lucastuzina\Laranums\Tests\Fixtures\StatusEnum;
use Lucastuzina\Laranums\Tests\Fixtures\PriorityEnum;
use Lucastuzina\Laranums\Tests\Fixtures\SimpleEnum;
use Lucastuzina\Laranums\Tests\TestCase;

class MetadataMethodsTest extends TestCase
{
    /** @test */
    public function it_can_get_class_name()
    {
        $this->assertEquals('StatusEnum', StatusEnum::className());
        $this->assertEquals('PriorityEnum', PriorityEnum::className());
        $this->assertEquals('SimpleEnum', SimpleEnum::className());
    }
}
