# Release Notes

## 💎 Improvements

### Improved make command
- Neuer Artisan Command: `make:laranum`
    - Überschreibt nicht den Laravel Standard-Enum-Command
    - Nutzt das Keyword **Laranum** für die Generierung
    - Backed Type (`--type`) und Cases sind optional
    - Leere Enums werden korrekt erstellt
    - Enum-Dateien werden unter `app/Enums` abgelegt

### Testsuite
- Vollständige Testabdeckung für alle Methoden des Laranum-Traits
- Test-Fixtures für verschiedene Enum-Typen (unit, string-backed, int-backed)
- Feature-Tests für den neuen Command
- Verbesserte Kompatibilität mit Simple Enums (ohne backing type)
- PHPUnit und Orchestra Testbench als dev-dependencies
- Test-Dokumentation und Beispielbefehle

### Beispiel für den neuen Command

```bash
php artisan make:laranum Status active inactive pending --type=string
php artisan make:laranum Priority 1 2 3 --type=int
php artisan make:laranum SimpleEnum
```

### Testausführung

```bash
composer install
composer test
vendor/bin/phpunit
```

### Weitere Infos
- Siehe `tests/README.md` für Details zur Testabdeckung und Nutzung
- Verbesserungen am Trait: Robustheit für alle Enum-Typen, bessere value/name-Logik
