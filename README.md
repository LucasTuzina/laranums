[![Packagist Downloads](https://img.shields.io/packagist/dt/lucastuzina/laranums.svg)](https://packagist.org/packages/lucastuzina/laranums)
# Laranums
Larnums Package provides useful methods nearly every Laravel application that uses enums needs.

## Installation
`composer require lucastuzina/laranums`

## Usage
To use the Package simple import the trait on your enum:

```php
use Lucastuzina\Laranums\Laranum;

enum SomeEnum
{
    use Laranum;

    case FirstCase;
    case SecondCase;
}
```

### Generating Enums with Artisan
Laranums provides a convenient Artisan command to generate enums with the `Laranum` trait automatically. This command creates an enum file in the `app/Enums` directory.

#### **Usage:**
```sh
php artisan make:enum EnumName [backedType] caseOne caseTwo caseThree
```

#### **Example:**
```sh
php artisan make:enum UserRole string admin editor guest
```

This will generate the following enum file:

```php
<?php

namespace App\Enums;

use Lucastuzina\Laranums\Laranum;

enum UserRole: string
{
    use Laranum;

    case Admin = 'admin';
    case Editor = 'editor';
    case Guest = 'guest';
}
```

The command ensures that your enums are structured correctly and automatically includes the `Laranum` trait, giving you access to all the useful utility methods provided by the package.

## Utility Methods
Laranums provides various helper methods to make working with enums easier:

- **fromName(string $name): ?self** – Get an enum case by name.
- **fromValue($value): ?self** – Get an enum case by value (for backed enums).
- **fromNameOrDefault(string $name, self $default): self** – Get an enum case by name, or return a default.
- **fromValueOrDefault($value, self $default): self** – Get an enum case by value, or return a default.
- **className(): string** – Get the enum class name.
- **toArray(): array** – Get an associative array of `[value => name]`.
- **toArrayReversed(): array** – Get an associative array of `[name => value]`.
- **names(): array** – Get an array of all case names.
- **values(): array** – Get an array of all case values.
- **transNames(): array** – Get translated names `[name => translation]`.
- **transValues(): array** – Get translated values `[value => translation]`.
- **trans(string $caseName): string** – Get a translated string for a specific case.
- **rand(array $ignoredCases = []): ?self** – Get a random case, optionally ignoring some.
- **isValidName($name): bool** – Check if a given name exists in the enum.
- **isValidValue($value): bool** – Check if a given value exists in the enum.
- **collect(): Collection** – Get a Laravel collection of all cases.
- **jsonSerialize(): array** – Serialize the enum for JSON output.

## License
This package is open-sourced software licensed under the MIT license.
