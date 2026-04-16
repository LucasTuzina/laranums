<?php

namespace Lucastuzina\Laranums\Tests\Feature;

use Illuminate\Support\Facades\File;
use Lucastuzina\Laranums\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class MakeLaranumCommandTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->cleanup();
    }

    protected function tearDown(): void
    {
        $this->cleanup();
        parent::tearDown();
    }

    private function cleanup(): void
    {
        $enumsPath = $this->app->basePath('app/Enums');
        if (File::exists($enumsPath)) {
            File::deleteDirectory($enumsPath);
        }

        foreach (['en', 'de', 'fr', 'es'] as $locale) {
            $langFile = $this->app->langPath("$locale/enums.php");
            if (File::exists($langFile)) {
                File::delete($langFile);
            }
            $localeDir = $this->app->langPath($locale);
            if (File::exists($localeDir) && count(File::files($localeDir)) === 0) {
                File::deleteDirectory($localeDir);
            }
        }
    }

    #[Test]
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

    #[Test]
    public function it_can_create_simple_enum_with_cases()
    {
        $this->artisan('make:laranum', [
            'name' => 'Status',
            'values' => ['active', 'inactive', 'pending'],
        ])->assertExitCode(0);

        $content = File::get($this->app->basePath('app/Enums/Status.php'));

        $this->assertStringContainsString('case Active;', $content);
        $this->assertStringContainsString('case Inactive;', $content);
        $this->assertStringContainsString('case Pending;', $content);
    }

    #[Test]
    public function it_can_create_string_backed_enum()
    {
        $this->artisan('make:laranum', [
            'name' => 'Status',
            'values' => ['active', 'inactive'],
            '--type' => 'string',
        ])->assertExitCode(0);

        $content = File::get($this->app->basePath('app/Enums/Status.php'));

        $this->assertStringContainsString('enum Status: string', $content);
        $this->assertStringContainsString("case Active = 'active';", $content);
        $this->assertStringContainsString("case Inactive = 'inactive';", $content);
    }

    #[Test]
    public function it_can_create_integer_backed_enum()
    {
        $this->artisan('make:laranum', [
            'name' => 'Priority',
            'values' => ['1', '2', '3'],
            '--type' => 'int',
        ])->assertExitCode(0);

        $content = File::get($this->app->basePath('app/Enums/Priority.php'));

        $this->assertStringContainsString('enum Priority: int', $content);
        $this->assertStringContainsString('case 1 = 1;', $content);
    }

    #[Test]
    public function it_creates_enums_directory_if_not_exists()
    {
        $enumsPath = $this->app->basePath('app/Enums');
        $this->assertFalse(File::exists($enumsPath));

        $this->artisan('make:laranum', ['name' => 'TestEnum'])->assertExitCode(0);

        $this->assertTrue(File::isDirectory($enumsPath));
    }

    #[Test]
    public function lang_flag_generates_translation_stub_for_single_locale()
    {
        $this->artisan('make:laranum', [
            'name' => 'UserRole',
            'values' => ['admin', 'editor', 'guest'],
            '--type' => 'string',
            '--lang' => ['en'],
        ])->assertExitCode(0);

        $path = $this->app->langPath('en/enums.php');
        $this->assertTrue(File::exists($path), 'en/enums.php should exist');

        $data = include $path;

        $this->assertArrayHasKey('user_role', $data);
        $this->assertSame([
            'Admin' => 'Admin',
            'Editor' => 'Editor',
            'Guest' => 'Guest',
        ], $data['user_role']);
    }

    #[Test]
    public function lang_flag_humanises_snake_case_case_names()
    {
        $this->artisan('make:laranum', [
            'name' => 'UserRole',
            'values' => ['super_admin', 'read_only_user'],
            '--type' => 'string',
            '--lang' => ['en'],
        ])->assertExitCode(0);

        $data = include $this->app->langPath('en/enums.php');

        $this->assertSame('Super Admin', $data['user_role']['Super_admin']);
        $this->assertSame('Read Only User', $data['user_role']['Read_only_user']);
    }

    #[Test]
    public function lang_flag_leaves_non_primary_locales_empty_for_translation()
    {
        $this->artisan('make:laranum', [
            'name' => 'UserRole',
            'values' => ['admin', 'editor'],
            '--type' => 'string',
            '--lang' => ['en,de,fr'],
        ])->assertExitCode(0);

        $en = include $this->app->langPath('en/enums.php');
        $de = include $this->app->langPath('de/enums.php');
        $fr = include $this->app->langPath('fr/enums.php');

        $this->assertSame('Admin', $en['user_role']['Admin']);
        $this->assertSame('', $de['user_role']['Admin']);
        $this->assertSame('', $fr['user_role']['Admin']);
        $this->assertSame('', $de['user_role']['Editor']);
    }

    #[Test]
    public function lang_flag_preserves_existing_translations_on_merge()
    {
        $langPath = $this->app->langPath('de');
        File::ensureDirectoryExists($langPath);
        File::put("$langPath/enums.php", <<<'PHP'
<?php

return [
    'user_role' => [
        'Admin' => 'Administrator',
    ],
    'other_enum' => [
        'Foo' => 'Bar',
    ],
];
PHP);

        $this->artisan('make:laranum', [
            'name' => 'UserRole',
            'values' => ['admin', 'editor'],
            '--type' => 'string',
            '--lang' => ['de'],
        ])->assertExitCode(0);

        $data = include "$langPath/enums.php";

        $this->assertSame('Administrator', $data['user_role']['Admin']);
        $this->assertArrayHasKey('Editor', $data['user_role']);
        $this->assertSame('Bar', $data['other_enum']['Foo']);
    }

    #[Test]
    public function lang_flag_accepts_comma_and_repeated_form()
    {
        $this->artisan('make:laranum', [
            'name' => 'Status',
            'values' => ['a'],
            '--type' => 'string',
            '--lang' => ['en,de', 'fr'],
        ])->assertExitCode(0);

        $this->assertTrue(File::exists($this->app->langPath('en/enums.php')));
        $this->assertTrue(File::exists($this->app->langPath('de/enums.php')));
        $this->assertTrue(File::exists($this->app->langPath('fr/enums.php')));
    }

    #[Test]
    public function lang_flag_is_noop_without_cases()
    {
        $this->artisan('make:laranum', [
            'name' => 'EmptyEnum',
            '--lang' => ['en'],
        ])->assertExitCode(0);

        $this->assertFalse(File::exists($this->app->langPath('en/enums.php')));
    }
}
