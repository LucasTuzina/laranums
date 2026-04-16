<?php

namespace Lucastuzina\Laranums\Faker;

use Faker\Provider\Base as BaseProvider;
use InvalidArgumentException;

class LaranumFakerProvider extends BaseProvider
{
    /**
     * Return a random case from the given enum class.
     *
     *   $faker->addProvider(new LaranumFakerProvider($faker));
     *   $faker->enum(Status::class);                    // random Status
     *   $faker->enum(Status::class, [Status::PENDING]); // random Status, excluding PENDING
     *
     * @template T of \UnitEnum
     * @param  class-string<T>  $enumClass
     * @param  array<int, T>    $ignoredCases
     * @return T
     */
    public function enum(string $enumClass, array $ignoredCases = []): object
    {
        if (!enum_exists($enumClass)) {
            throw new InvalidArgumentException("Class {$enumClass} is not an enum.");
        }

        $cases = array_values(array_filter(
            $enumClass::cases(),
            static fn ($case) => !in_array($case, $ignoredCases, true)
        ));

        if (empty($cases)) {
            throw new InvalidArgumentException("No cases available after filtering ignored ones.");
        }

        return $cases[array_rand($cases)];
    }
}
