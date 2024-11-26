# Laranums
Larnums Package provides useful methods nearly every Laravel application that uses enums needs.

## Instalation
`composer require lucastuzina/laranums`

## Usage
To use the Package simple import the trait on your enum:

```php
use Lucastuzina\Laranums\HandleEnums;

enum SomeEnum
{
    use HandleEnums;

    case FirstCase;
    case SecondCase;
}
```

## License
This package is open-sourced software licensed under the MIT license.
