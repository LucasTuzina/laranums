<?php

namespace Lucastuzina\Laranums\Tests\Unit;

use Illuminate\Support\Facades\Lang;
use Lucastuzina\Laranums\Tests\Fixtures\StatusEnum;
use Lucastuzina\Laranums\Tests\Fixtures\PriorityEnum;
use Lucastuzina\Laranums\Tests\TestCase;

class TranslationMethodsTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        
        // Mock translations
        Lang::shouldReceive('get')
            ->with('enums.status_enum.Active')
            ->andReturn('Aktiv');
            
        Lang::shouldReceive('get')
            ->with('enums.status_enum.Inactive')
            ->andReturn('Inaktiv');
            
        Lang::shouldReceive('get')
            ->with('enums.status_enum.Pending')
            ->andReturn('Ausstehend');
            
        Lang::shouldReceive('get')
            ->with('enums.priority_enum.Low')
            ->andReturn('Niedrig');
            
        Lang::shouldReceive('get')
            ->with('enums.priority_enum.Medium')
            ->andReturn('Mittel');
            
        Lang::shouldReceive('get')
            ->with('enums.priority_enum.High')
            ->andReturn('Hoch');
    }

    /** @test */
    public function it_can_get_translated_names()
    {
        $expected = [
            'Active' => 'Aktiv',
            'Inactive' => 'Inaktiv',
            'Pending' => 'Ausstehend'
        ];
        
        $this->assertEquals($expected, StatusEnum::transNames());
    }

    /** @test */
    public function it_can_get_translated_values()
    {
        $expected = [
            'active' => 'Aktiv',
            'inactive' => 'Inaktiv',
            'pending' => 'Ausstehend'
        ];
        
        $this->assertEquals($expected, StatusEnum::transValues());
    }

    /** @test */
    public function it_can_translate_single_case()
    {
        $this->assertEquals('Aktiv', StatusEnum::trans('Active'));
        $this->assertEquals('Niedrig', PriorityEnum::trans('Low'));
    }

    /** @test */
    public function it_works_with_integer_backed_enums()
    {
        $expected = [
            1 => 'Niedrig',
            2 => 'Mittel',
            3 => 'Hoch'
        ];
        
        $this->assertEquals($expected, PriorityEnum::transValues());
    }
}
