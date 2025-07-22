<?php

namespace Lucastuzina\Laranums\Tests\Unit;

use Lucastuzina\Laranums\Tests\Fixtures\StatusEnum;
use Lucastuzina\Laranums\Tests\Fixtures\PriorityEnum;
use Lucastuzina\Laranums\Tests\Fixtures\SimpleEnum;
use Lucastuzina\Laranums\Tests\TestCase;

class ConversionMethodsTest extends TestCase
{
    /** @test */
    public function it_can_convert_to_array()
    {
        $expected = [
            'active' => 'Active',
            'inactive' => 'Inactive', 
            'pending' => 'Pending'
        ];
        
        $this->assertEquals($expected, StatusEnum::toArray());
    }

    /** @test */
    public function it_can_convert_to_array_reversed()
    {
        $expected = [
            'Active' => 'active',
            'Inactive' => 'inactive',
            'Pending' => 'pending'
        ];
        
        $this->assertEquals($expected, StatusEnum::toArrayReversed());
    }

    /** @test */
    public function it_can_get_all_names()
    {
        $expected = ['Active', 'Inactive', 'Pending'];
        $this->assertEquals($expected, StatusEnum::names());
    }

    /** @test */
    public function it_can_get_all_values()
    {
        $expected = ['active', 'inactive', 'pending'];
        $this->assertEquals($expected, StatusEnum::values());
        
        $expectedInt = [1, 2, 3];
        $this->assertEquals($expectedInt, PriorityEnum::values());
    }

    /** @test */
    public function it_works_with_simple_enums()
    {
        $names = SimpleEnum::names();
        $this->assertEquals(['One', 'Two', 'Three'], $names);
        
        // Simple enums don't have values, so values() should return the same as names()
        $values = SimpleEnum::values();
        $this->assertEquals(['One', 'Two', 'Three'], $values);
    }

    /** @test */
    public function it_can_convert_integer_backed_enums_to_array()
    {
        $expected = [
            1 => 'Low',
            2 => 'Medium',
            3 => 'High'
        ];
        
        $this->assertEquals($expected, PriorityEnum::toArray());
    }
}
