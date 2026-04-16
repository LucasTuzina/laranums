# Artisan Command

Laranums ships with a `make:laranum` command that scaffolds a new enum with the `Laranum` trait already applied. The generated file is placed in `app/Enums`.

## Usage

```sh
php artisan make:laranum EnumName [caseOne caseTwo ...] [--type=string|int] [--lang=en,de]
```

- `EnumName` — class name of the enum.
- `caseOne caseTwo …` — one or more case names (optional).
- `--type` *(optional)* — `string` or `int` for backed enums. Omit for a non-backed enum.
- `--lang` *(optional)* — comma-separated locales. Scaffolds translation stubs under `lang/{locale}/enums.php`.

## Examples

### Backed string enum

```sh
php artisan make:laranum UserRole admin editor guest --type=string
```

Generates `app/Enums/UserRole.php`:

```php
<?php

namespace App\Enums;

use Lucastuzina\Laranums\Laranum;

enum UserRole: string
{
    use Laranum;

    case ADMIN = 'admin';
    case EDITOR = 'editor';
    case GUEST = 'guest';
}
```

### Non-backed enum

```sh
php artisan make:laranum Color red green blue
```

Generates:

```php
<?php

namespace App\Enums;

use Lucastuzina\Laranums\Laranum;

enum Color
{
    use Laranum;

    case Red;
    case Green;
    case Blue;
}
```

### With translation stubs

```sh
php artisan make:laranum UserRole admin editor super_admin --type=string --lang=en,de
```

On top of `app/Enums/UserRole.php`, this creates:

```php
// lang/en/enums.php
<?php

return [
    'user_role' => [
        'Admin' => 'Admin',
        'Editor' => 'Editor',
        'Super_admin' => 'Super Admin',
    ],
];

// lang/de/enums.php
<?php

return [
    'user_role' => [
        'Admin' => '',
        'Editor' => '',
        'Super_admin' => '',
    ],
];
```

- The **first locale** in the list gets humanised English defaults (`Str::headline(caseName)`).
- **All other locales** get empty strings, ready for your translator to fill in.
- If a lang file already exists, entries are **merged** — existing translations are preserved, new keys are added. Safe to re-run.
