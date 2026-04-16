<?php

namespace Lucastuzina\Laranums\Tests\Unit;

use Illuminate\Support\Collection;
use Lucastuzina\Laranums\Tests\Fixtures\StatusEnum;
use Lucastuzina\Laranums\Tests\Fixtures\PriorityEnum;
use Lucastuzina\Laranums\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class LaravelSpecificMethodsTest extends TestCase
{
    #[Test]
    public function it_can_create_collection_of_enum_cases()
    {
        $collection = StatusEnum::collect();
        
        $this->assertInstanceOf(Collection::class, $collection);
        $this->assertCount(3, $collection);
        $this->assertContains(StatusEnum::Active, $collection->all());
        $this->assertContains(StatusEnum::Inactive, $collection->all());
        $this->assertContains(StatusEnum::Pending, $collection->all());
    }

    #[Test]
    public function it_can_serialize_enum_to_json()
    {
        $this->app['translator']->addLines(
            ['enums.status_enum.Active' => 'Aktiv'],
            'en'
        );

        $this->assertEquals(
            ['name' => 'Active', 'value' => 'active', 'translation' => 'Aktiv'],
            StatusEnum::Active->jsonSerialize()
        );
    }

    #[Test]
    public function it_can_serialize_integer_backed_enum_to_json()
    {
        $this->app['translator']->addLines(
            ['enums.priority_enum.High' => 'Hoch'],
            'en'
        );

        $this->assertEquals(
            ['name' => 'High', 'value' => 3, 'translation' => 'Hoch'],
            PriorityEnum::High->jsonSerialize()
        );
    }
}
