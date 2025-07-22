<?php

namespace Lucastuzina\Laranums\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeLaranumCommand extends Command
{
    protected $signature = 'make:laranum {name} {values?*} {--type= : The backed type (int|string)}';
    protected $description = 'Create a new enum class with the Laranum trait';

    public function handle(): void
    {
        $name = ucfirst($this->argument('name'));
        $values = $this->argument('values') ?? [];
        $type = $this->option('type');

        $backedType = in_array($type, ['int', 'string']) ? ": $type" : "";

        $casesContent = "";
        if (!empty($values)) {
            $cases = array_map(static function ($value) use ($type) {
                $formattedValue = ucfirst($value);
                
                if ($type) {
                    $backedValue = $type === 'int' ? (int) $value : "'$value'";
                    return "    case $formattedValue = $backedValue;";
                } else {
                    return "    case $formattedValue;";
                }
            }, $values);
            
            $casesContent = "\n" . implode("\n", $cases) . "\n";
        }

        $content = <<<PHP
<?php

namespace App\Enums;

use Lucastuzina\Laranums\Laranum;

enum $name$backedType
{
    use Laranum;$casesContent}

PHP;

        $enumsPath = $this->laravel->basePath('app/Enums');
        
        if (!File::exists($enumsPath)) {
            File::makeDirectory($enumsPath, 0755, true);
        }

        File::put("$enumsPath/$name.php", $content);

        $this->info("$name enum created successfully with Laranum trait.");
    }
}