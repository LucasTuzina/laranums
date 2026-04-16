<?php

namespace Lucastuzina\Laranums\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MakeLaranumCommand extends Command
{
    protected $signature = 'make:laranum {name} {values?*}
                            {--type= : The backed type (int|string)}
                            {--lang=* : Comma-separated locales to scaffold translation stubs for (e.g. --lang=en,de)}';

    protected $description = 'Create a new enum class with the Laranum trait';

    public function handle(): void
    {
        $name = ucfirst($this->argument('name'));
        $values = $this->argument('values') ?? [];
        $type = $this->option('type');

        $backedType = in_array($type, ['int', 'string']) ? ": $type" : "";

        $caseNames = [];
        $casesContent = "";
        if (!empty($values)) {
            $cases = [];
            foreach ($values as $value) {
                $formattedValue = ucfirst($value);
                $caseNames[] = $formattedValue;

                if ($type) {
                    $backedValue = $type === 'int' ? (int) $value : "'$value'";
                    $cases[] = "    case $formattedValue = $backedValue;";
                } else {
                    $cases[] = "    case $formattedValue;";
                }
            }

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

        $locales = $this->normaliseLocales($this->option('lang'));
        if (!empty($locales) && !empty($caseNames)) {
            $this->generateTranslations($name, $caseNames, $locales);
        }
    }

    /**
     * Flatten `--lang=en,de --lang=fr` into `['en', 'de', 'fr']`.
     *
     * @param  array<int, string>  $input
     * @return array<int, string>
     */
    protected function normaliseLocales(array $input): array
    {
        $locales = [];
        foreach ($input as $item) {
            foreach (explode(',', $item) as $locale) {
                $locale = trim($locale);
                if ($locale !== '') {
                    $locales[] = $locale;
                }
            }
        }
        return array_values(array_unique($locales));
    }

    /**
     * Write or merge enum translation stubs into lang/{locale}/enums.php.
     * The first locale in the list gets humanised defaults; the rest get empty strings.
     *
     * @param  array<int, string>  $caseNames
     * @param  array<int, string>  $locales
     */
    protected function generateTranslations(string $enumName, array $caseNames, array $locales): void
    {
        $key = Str::snake($enumName);
        $primary = $locales[0];

        foreach ($locales as $locale) {
            $path = $this->laravel->langPath("$locale/enums.php");
            $existing = File::exists($path) ? $this->loadLangFile($path) : [];

            $entries = [];
            foreach ($caseNames as $case) {
                $entries[$case] = $locale === $primary ? Str::headline($case) : '';
            }

            $existing[$key] = array_merge($entries, $existing[$key] ?? []);

            File::ensureDirectoryExists(dirname($path));
            File::put($path, $this->formatLangFile($existing));

            $this->line("  → lang/$locale/enums.php");
        }
    }

    /**
     * @return array<string, mixed>
     */
    protected function loadLangFile(string $path): array
    {
        $data = include $path;
        return is_array($data) ? $data : [];
    }

    /**
     * @param  array<string, mixed>  $data
     */
    protected function formatLangFile(array $data): string
    {
        return "<?php\n\nreturn " . $this->exportArray($data, 0) . ";\n";
    }

    /**
     * Pretty-print a nested associative array using Laravel-style 4-space indentation.
     *
     * @param  array<string, mixed>  $data
     */
    protected function exportArray(array $data, int $indent): string
    {
        if (empty($data)) {
            return '[]';
        }

        $pad = str_repeat('    ', $indent);
        $inner = str_repeat('    ', $indent + 1);
        $lines = ['['];

        foreach ($data as $key => $value) {
            $formattedKey = "'" . addslashes((string) $key) . "'";
            $formattedValue = is_array($value)
                ? $this->exportArray($value, $indent + 1)
                : "'" . addslashes((string) $value) . "'";
            $lines[] = "$inner$formattedKey => $formattedValue,";
        }

        $lines[] = "$pad]";

        return implode("\n", $lines);
    }
}
