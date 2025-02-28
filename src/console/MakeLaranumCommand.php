<?php

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeEnumCommand extends Command
{
    protected $signature = 'make:enum {name} {values*}';
    protected $description = 'Create a new enum class with the Laranum trait';

    public function handle()
    {
        $name = ucfirst($this->argument('name'));
        $values = array_map(fn($value) => "    case " . ucfirst($value) . " = '$value';", $this->argument('values'));

        // Enum-Template mit Laranum-Trait
        $content = <<<PHP
            <?php
            
            namespace App\Enums;
            
            use Lucastuzina\Laranums\Laranum;
            
            enum $name: string
            {
                use Laranum;
            
                " . implode("\n", $values) . "
            }
            
            PHP;

        if (!File::exists(app_path('Enums'))) {
            File::makeDirectory(app_path('Enums'), 0755, true);
        }

        File::put(app_path("Enums/$name.php"), $content);

        $this->info("$name enum created successfully with Laranum trait.");
    }
}