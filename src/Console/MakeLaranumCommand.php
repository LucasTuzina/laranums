<?php

namespace Lucastuzina\Laranums\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeLaranumCommand extends Command
{
    protected $signature = 'make:enum {name} {values*} {--type= : The backed type (int|string)}';
    protected $description = 'Create a new enum class with the Laranum trait';

    public function handle(): void
    {
        $name = ucfirst($this->argument('name'));
        $values = $this->argument('values');
        $type = $this->option('type');

        $backedType = in_array($type, ['int', 'string']) ? ": $type" : "";

        $cases = array_map(static function ($value) use ($type) {
            $formattedValue = ucfirst($value);
            $backedValue = $type === 'int' ? (int) $value : "'$value'";

            return "    case $formattedValue $backedValue;";
        }, $values);

        $content = <<<PHP
            <?php
            
            namespace App\Enums;
            
            use Lucastuzina\Laranums\Laranum;
            
            enum $name$backedType
            {
                use Laranum;
            
            " . implode("\n", $cases) . "
            }
            
            PHP;

        if (!File::exists(app_path('Enums'))) {
            File::makeDirectory(app_path('Enums'), 0755, true);
        }

        File::put(app_path("Enums/$name.php"), $content);

        $this->info("$name enum created successfully with Laranum trait.");
    }
}