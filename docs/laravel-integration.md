# Laravel Integration

Laranums plugs into the parts of Laravel where enums tend to show up most: form validation, test factories and Eloquent queries. Everything works out of the box once the service provider is loaded (Laravel auto-discovers it).

## Validation

Every enum using the `Laranum` trait gets three static rule methods that return Laravel's native `Illuminate\Validation\Rules\Enum` instance — ready to drop into a FormRequest.

```php
use App\Enums\OrderStatus;

public function rules(): array
{
    return [
        'status' => ['required', OrderStatus::rule()],
    ];
}
```

### Restricting to a subset

```php
'status' => ['required', OrderStatus::ruleOnly([OrderStatus::PAID, OrderStatus::PENDING])],
```

### Forbidding specific cases

```php
'status' => ['required', OrderStatus::ruleExcept([OrderStatus::CANCELLED])],
```

| Method                                      | Returns         |
|---------------------------------------------|-----------------|
| `rule(): EnumRule`                          | Accept any case |
| `ruleOnly(array $cases): EnumRule`          | Whitelist       |
| `ruleExcept(array $cases): EnumRule`        | Blacklist       |

## Faker Provider

`LaranumFakerProvider` adds an `$faker->enum()` method that returns a random case of any enum.

```php
use Lucastuzina\Laranums\Faker\LaranumFakerProvider;

$faker = \Faker\Factory::create();
$faker->addProvider(new LaranumFakerProvider($faker));

$faker->enum(OrderStatus::class);                         // random case
$faker->enum(OrderStatus::class, [OrderStatus::CANCELLED]); // excluding CANCELLED
```

Inside a Laravel factory the provider is already available via `$this->faker`, so you only need to add the provider once (typically in `TestCase::setUp()` or an `AppServiceProvider::register()`).

## Eloquent Query Macros

The service provider registers three macros on both the query and Eloquent builders. They accept `BackedEnum` instances (or arrays of them) directly — no more scattering `->value` through your query code.

```php
use App\Models\Order;
use App\Enums\OrderStatus;

Order::whereEnum('status', OrderStatus::PAID)->get();

Order::whereEnum('status', [OrderStatus::PAID, OrderStatus::PENDING])->get();
// ↳ compiles to WHERE status IN ('paid', 'pending')

Order::whereEnumNot('status', OrderStatus::CANCELLED)->get();
// ↳ WHERE status != 'cancelled'

Order::whereEnum('status', OrderStatus::PAID)
    ->orWhereEnum('status', OrderStatus::PENDING)
    ->get();
```

### Available Macros

| Macro                                                    | Equivalent                             |
|----------------------------------------------------------|----------------------------------------|
| `whereEnum(string $column, UnitEnum\|array $value)`      | `where` / `whereIn` with unwrapping    |
| `whereEnumNot(string $column, UnitEnum\|array $value)`   | `where !=` / `whereNotIn`              |
| `orWhereEnum(string $column, UnitEnum\|array $value)`    | `orWhere` / `orWhereIn`                |

Unbacked enums are unwrapped via their `->name`.

## Route Model Binding

Laravel already supports backed enums in route model binding natively — no extra work needed. For completeness:

```php
Route::get('/orders/{status}', function (OrderStatus $status) {
    // $status is an OrderStatus instance
});
```
