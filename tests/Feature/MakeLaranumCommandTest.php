<?php

namespace Lucastuzina\Laranums\Tests\Feature;

use Illuminate\Support\Facades\File;
use Lucastuzina\Laranums\Tests\TestCase;

class MakeLaranumCommandTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        
        // Clean up any existing enum files
        $this->cleanupEnumFiles();
    }
    
    protected function tearDown(): void
    {
        $this->cleanupEnumFiles();
        parent::tearDown();
    }
    
    private function cleanupEnumFiles(): void
    {
        $enumsPath = $this->app->basePath('app/Enums');
        if (File::exists($enumsPath)) {
            File::deleteDirectory($enumsPath);
        }
    }

    /** @test */
    public function it_can_create_empty_enum()
    {
        $this->artisan('make:laranum', ['name' => 'Status'])
            ->expectsOutput('Status enum created successfully with Laranum trait.')
            ->assertExitCode(0);
            
        $enumPath = $this->app->basePath('app/Enums/Status.php');
        $this->assertTrue(File::exists($enumPath));
        
        $content = File::get($enumPath);
        $this->assertStringContainsString('enum Status', $content);
        $this->assertStringContainsString('use Laranum;', $content);
        $this->assertStringNotContainsString('case ', $content);
    }

    /** @test */
    public function it_can_create_simple_enum_with_cases()
    {
        $this->artisan('make:laranum', [
            'name' => 'Status',
            'values' => ['active', 'inactive', 'pending']
        ])->assertExitCode(0);
            
        $enumPath = $this->app->basePath('app/Enums/Status.php');
        $content = File::get($enumPath);
        
        $this->assertStringContainsString('case Active;', $content);
        $this->assertStringContainsString('case Inactive;', $content);
        $this->assertStringContainsString('case Pending;', $content);
    }

    /** @test */
    public function it_can_create_string_backed_enum()
    {
        $this->artisan('make:laranum', [
            'name' => 'Status',
            'values' => ['active', 'inactive'],
            '--type' => 'string'
        ])->assertExitCode(0);
            
        $enumPath = $this->app->basePath('app/Enums/Status.php');
        $content = File::get($enumPath);
        
        $this->assertStringContainsString('enum Status: string', $content);
        $this->assertStringContainsString("case Active = 'active';", $content);
        $this->assertStringContainsString("case Inactive = 'inactive';", $content);
    }

    /** @test */
    public function it_can_create_integer_backed_enum()
    {
        $this->artisan('make:laranum', [
            'name' => 'Priority',
            'values' => ['1', '2', '3'],
            '--type' => 'int'
        ])->assertExitCode(0);
            
        $enumPath = $this->app->basePath('app/Enums/Priority.php');
        $content = File::get($enumPath);
        
        $this->assertStringContainsString('enum Priority: int', $content);
        $this->assertStringContainsString('case 1 = 1;', $content);
        $this->assertStringContainsString('case 2 = 2;', $content);
        $this->assertStringContainsString('case 3 = 3;', $content);
    }

    /** @test */
    public function it_creates_enums_directory_if_not_exists()
    {
        $enumsPath = $this->app->basePath('app/Enums');
        $this->assertFalse(File::exists($enumsPath));
        
        $this->artisan('make:laranum', ['name' => 'TestEnum'])
            ->assertExitCode(0);
            
        $this->assertTrue(File::exists($enumsPath));
        $this->assertTrue(File::isDirectory($enumsPath));
    }
}
