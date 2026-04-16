# Case Attributes

Attach UI metadata directly to enum cases via PHP attributes — no `match` statements, no boilerplate, no framework lock-in. Values are plain strings, so they work with Filament, Livewire, Blade, Inertia, Tailwind or any custom UI.

## Available Attributes

| Attribute         | Purpose                                                               |
|-------------------|-----------------------------------------------------------------------|
| `#[Label('...')]`       | Human-readable display text                                     |
| `#[Color('...')]`       | Arbitrary color identifier (`green`, `#10b981`, `success`, …)   |
| `#[Icon('...')]`        | Arbitrary icon identifier (Heroicons, Font Awesome, …)          |
| `#[Description('...')]` | Long-form text suitable for tooltips or help texts              |

All four are declared with `#[\Attribute(\Attribute::TARGET_CLASS_CONSTANT)]` and expose a single `readonly string $value` property.

## Basic Usage

```php
use Lucastuzina\Laranums\Laranum;
use Lucastuzina\Laranums\Attributes\{Label, Color, Icon, Description};

enum OrderStatus: string
{
    use Laranum;

    #[Label('Pending'), Color('yellow'), Icon('clock'), Description('Awaiting payment')]
    case PENDING = 'pending';

    #[Label('Paid'), Color('green'), Icon('check-circle')]
    case PAID = 'paid';

    #[Label('Cancelled'), Color('red'), Icon('x-circle')]
    case CANCELLED = 'cancelled';
}
```

## Reading Attributes

The `Laranum` trait exposes instance methods that read the attributes via reflection:

```php
$status = OrderStatus::PAID;

$status->label();        // 'Paid'
$status->color();        // 'green'
$status->icon();         // 'check-circle'
$status->description();  // null  (not set on this case)
```

- `label()` always returns a string (see fallback chain below).
- `color()`, `icon()`, `description()` return `?string` — `null` if the attribute is not present.

## Label Fallback Chain

`label()` resolves in this order, so you can adopt attributes gradually:

1. `#[Label('...')]` on the case
2. Translation under key `enums.{snake_case_class}.{CASE_NAME}` (via Laravel's `Lang::get()`)
3. The raw case name

This means enums already using the translation workflow keep working — adding `#[Label]` simply takes precedence.

## Building Form Options

`toSelectOptions()` produces an array of `[value => label]` — ready for `<select>` elements, Filament options or Livewire form arrays. Labels are resolved via the same fallback chain as `label()`:

```php
OrderStatus::toSelectOptions();
// [
//     'pending'   => 'Pending',
//     'paid'      => 'Paid',
//     'cancelled' => 'Cancelled',
// ]
```

Usage in a Blade template:

```blade
<select name="status">
    @foreach (OrderStatus::toSelectOptions() as $value => $label)
        <option value="{{ $value }}">{{ $label }}</option>
    @endforeach
</select>
```

## Filament / Livewire Integration

The attribute methods map 1:1 to Filament's `HasLabel`, `HasColor`, `HasIcon` contracts:

```php
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum OrderStatus: string implements HasLabel, HasColor, HasIcon
{
    use Laranum;

    // ...your cases with #[Label], #[Color], #[Icon]...

    public function getLabel(): string { return $this->label(); }
    public function getColor(): ?string { return $this->color(); }
    public function getIcon(): ?string { return $this->icon(); }
}
```

## Custom Attributes

The four built-in attributes are just simple value objects. If you need more metadata, create your own attribute with the same shape and read it via reflection — the pattern is trivially extendable.
