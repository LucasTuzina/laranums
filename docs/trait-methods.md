# Trait Methods

All methods the `Laranum` trait adds to your enum. Organised by concern — each concern lives in its own trait under `Lucastuzina\Laranums\Concerns\*` and can also be used individually if you only want a subset.

## Lookup — `HasLookup`

Find cases by name or value, with optional default fallback.

| Method                                                | Description                                                  |
|-------------------------------------------------------|--------------------------------------------------------------|
| `fromName(string $name): ?self`                       | Get a case by its name.                                      |
| `fromValue(mixed $value): ?self`                      | Get a case by its value (for backed enums).                  |
| `fromNameOrDefault(string $name, self $default): self`| Get a case by name, fall back to `$default`.                 |
| `fromValueOrDefault(mixed $value, self $default): self`| Get a case by value, fall back to `$default`.               |
| `isValidName(mixed $name): bool`                      | Whether a name exists in the enum.                           |
| `isValidValue(mixed $value): bool`                    | Whether a value exists in the enum.                          |

```php
Status::fromName('Active');                          // Status::Active
Status::fromValue('inactive');                       // Status::Inactive
Status::fromNameOrDefault('Unknown', Status::Active); // Status::Active
Status::isValidValue('pending');                     // true
```

## Metadata — `HasMetadata`

| Method                      | Description                         |
|-----------------------------|-------------------------------------|
| `className(): string`       | Short class name without namespace. |

```php
Status::className(); // 'Status'
```

## Conversion — `HasConversion`

Turn the enum into arrays or Laravel collections.

| Method                              | Description                                            |
|-------------------------------------|--------------------------------------------------------|
| `toArray(): array`                  | `[value => name]`                                      |
| `toArrayReversed(): array`          | `[name => value]`                                      |
| `names(): array`                    | All case names.                                        |
| `values(): array`                   | All case values (or names for non-backed enums).       |
| `collect(): Collection`             | Laravel `Collection<int, static>` of all cases.        |

```php
Status::toArray();   // ['active' => 'Active', 'inactive' => 'Inactive']
Status::names();     // ['Active', 'Inactive']
Status::collect();   // Collection of cases
```

## Translations — `HasTranslations`

Resolve case names via Laravel's translator. Translation keys follow the pattern `enums.{snake_case_class}.{CASE_NAME}`.

| Method                                | Description                                             |
|---------------------------------------|---------------------------------------------------------|
| `trans(string $caseName): string`     | Translated string for one case.                         |
| `transNames(): array`                 | `[name => translation]`                                 |
| `transValues(): array`                | `[value => translation]`                                |

For a single case, you usually want the `label()` method from `HasAttributes` instead — it falls back through `#[Label]` → translation → case name.

## Attributes — `HasAttributes`

See [case-attributes.md](case-attributes.md) for the full write-up.

| Method                              | Description                                                    |
|-------------------------------------|----------------------------------------------------------------|
| `label(): string`                   | `#[Label]` → translation → case name.                          |
| `color(): ?string`                  | `#[Color]` value or `null`.                                    |
| `icon(): ?string`                   | `#[Icon]` value or `null`.                                     |
| `description(): ?string`            | `#[Description]` value or `null`.                              |
| `toSelectOptions(): array`          | `[value => label]` for form selects.                           |

## Navigation — `HasNavigation`

Walk through cases and locate them by position.

| Method                                  | Description                                                              |
|-----------------------------------------|--------------------------------------------------------------------------|
| `first(): self`                         | First declared case.                                                     |
| `last(): self`                          | Last declared case.                                                      |
| `count(): int`                          | Number of cases.                                                         |
| `at(int $index): ?self`                 | Case at zero-based index, or `null` if out of bounds.                    |
| `index(): int`                          | Zero-based position of this case within `cases()`.                       |
| `next(bool $cyclic = false): ?self`     | Next case; `null` at end unless `$cyclic` wraps around.                  |
| `previous(bool $cyclic = false): ?self` | Previous case; `null` at start unless `$cyclic` wraps around.            |

```php
Status::first();                       // Status::Active
Status::Active->next();                // Status::Inactive
Status::Pending->next(cyclic: true);   // Status::Active (wraps around)
```

## Filtering — `HasFiltering`

Pick subsets of cases.

| Method                                                     | Description                                                |
|------------------------------------------------------------|------------------------------------------------------------|
| `only(array $cases): array`                                | Keep only the given cases (declaration order preserved).   |
| `except(array $cases): array`                              | Drop the given cases (declaration order preserved).        |
| `rand(array $ignoredCases = []): ?self`                    | A single random case.                                      |
| `random(int $count, array $ignoredCases = []): array`      | `$count` distinct random cases, sampled without replacement. |

```php
Status::only([Status::Active, Status::Pending]);   // [Active, Pending]
Status::except([Status::Inactive]);                // [Active, Pending]
Status::random(2);                                  // 2 distinct random cases
```

## Comparison — `HasComparison`

Instance checks against other cases.

| Method                              | Description                                    |
|-------------------------------------|------------------------------------------------|
| `is(self $other): bool`             | Strict identity check.                         |
| `in(array $cases): bool`            | Whether this case is one of the given.         |
| `notIn(array $cases): bool`         | Inverse of `in()`.                             |

```php
Status::Active->is(Status::Active);                         // true
Status::Active->in([Status::Active, Status::Pending]);      // true
Status::Active->notIn([Status::Inactive]);                  // true
```

## Ordering — `HasOrdering`

Compare cases by **declaration order** — works for backed and non-backed enums uniformly.

| Method                                  | Description                                                   |
|-----------------------------------------|---------------------------------------------------------------|
| `compare(self $other): int`             | Returns `-1`, `0` or `1` — usable directly in `usort()`.      |
| `lessThan(self $other): bool`           | Whether this case is declared before `$other`.                |
| `greaterThan(self $other): bool`        | Whether this case is declared after `$other`.                 |
| `between(self $a, self $b): bool`       | Inclusive range check; argument order doesn't matter.         |

```php
Status::Active->lessThan(Status::Pending);                     // true
Status::Inactive->between(Status::Active, Status::Pending);    // true
usort($list, fn ($a, $b) => $a->compare($b));                  // sort by declaration order
```

## Validation — `HasValidation`

Static helpers that return Laravel's native `Illuminate\Validation\Rules\Enum` — drop straight into a FormRequest's `rules()`.

| Method                                      | Description                                                         |
|---------------------------------------------|---------------------------------------------------------------------|
| `rule(): EnumRule`                          | Accept any case of this enum.                                       |
| `ruleOnly(array $cases): EnumRule`          | Accept only the given cases (whitelist).                            |
| `ruleExcept(array $cases): EnumRule`        | Reject the given cases (blacklist).                                 |

```php
'status' => ['required', OrderStatus::rule()],
'status' => ['required', OrderStatus::ruleOnly([OrderStatus::PAID])],
'status' => ['required', OrderStatus::ruleExcept([OrderStatus::CANCELLED])],
```

See [laravel-integration.md](laravel-integration.md) for the Faker provider and Eloquent query macros that pair with this.

## JSON Serialization — `HasJsonSerialization`

| Method                            | Description                                                         |
|-----------------------------------|---------------------------------------------------------------------|
| `jsonSerialize(): array`          | Output shape: `['name' => ..., 'value' => ..., 'translation' => ...]` |

Combined with `JsonSerializable`, this makes your enums serialize sensibly when returned from controllers.

## Using Single Concerns

If you don't want the whole trait, compose your own:

```php
use Lucastuzina\Laranums\Concerns\HasLookup;
use Lucastuzina\Laranums\Concerns\HasAttributes;

enum MyEnum: string
{
    use HasLookup, HasAttributes;
    // ...
}
```
