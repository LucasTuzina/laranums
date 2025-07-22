<?php

namespace Lucastuzina\Laranums\Tests\Unit;

use Illuminate\Support\Collection;
use Lucastuzina\Laranums\Tests\Fixtures\StatusEnum;
use Lucastuzina\Laranums\Tests\Fixtures\PriorityEnum;
use Lucastuzina\Laranums\Tests\TestCase;

class LaravelSpecificMethodsTest extends TestCase
{
    /** @test */
    public function it_can_create_collection_of_enum_cases()
    {
        $collection = StatusEnum::collect();
        
        $this->assertInstanceOf(Collection::class, $collection);
        $this->assertCount(3, $collection);
        $this->assertContains(StatusEnum::Active, $collection->all());
        $this->assertContains(StatusEnum::Inactive, $collection->all());
        $this->assertContains(StatusEnum::Pending, $collection->all());
    }

    /** @test */
    public function it_can_serialize_enum_to_json()
    {
        // Mock the translation method
        $this->app['translator']->shouldReceive('get')
            ->with('enums.status_enum.Active')
            ->andReturn('Aktiv');

        $json = StatusEnum::Active->jsonSerialize();
        
        $expected = [
            'name' => 'Active',
            'value' => 'active',
            'translation' => 'Aktiv'
        ];
        
        $this->assertEquals($expected, $json);
    }

    /** @test */
    public function it_can_serialize_integer_backed_enum_to_json()
    {
        // Mock the translation method
        $this->app['translator']->shouldReceive('get')
            ->with('enums.priority_enum.High')
            ->andReturn('Hoch');

        $json = PriorityEnum::High->jsonSerialize();
        
        $expected = [
            'name' => 'High',
            'value' => 3,
            'translation' => 'Hoch'
        ];
        
        $this->assertEquals($expected, $json);
    }
}
