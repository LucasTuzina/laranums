<?php

namespace Lucastuzina\Laranums\Concerns;

use Random\RandomException;

trait HasFiltering
{
    /**
     * Keep only the given cases (declaration order preserved, result is reindexed).
     *
     * @param  array<int, self>  $cases
     * @return array<int, self>
     */
    public static function only(array $cases): array
    {
        return array_values(array_filter(
            self::cases(),
            static fn ($case) => in_array($case, $cases, true)
        ));
    }

    /**
     * Drop the given cases (declaration order preserved, result is reindexed).
     *
     * @param  array<int, self>  $cases
     * @return array<int, self>
     */
    public static function except(array $cases): array
    {
        return array_values(array_filter(
            self::cases(),
            static fn ($case) => !in_array($case, $cases, true)
        ));
    }

    /**
     * Get a single random case (excluding given cases).
     *
     * @param  array<int, self>  $ignoredCases
     * @throws RandomException
     */
    public static function rand(array $ignoredCases = []): ?self
    {
        $cases = self::cases();
        $filteredCases = array_filter($cases, static fn ($case) => !in_array($case, $ignoredCases, true));

        if (empty($filteredCases)) {
            return null;
        }

        return $filteredCases[array_rand($filteredCases)];
    }

    /**
     * Get $count distinct random cases (sampled without replacement, optionally ignoring some).
     *
     * @param  array<int, self>  $ignoredCases
     * @return array<int, self>
     */
    public static function random(int $count, array $ignoredCases = []): array
    {
        $pool = array_values(array_filter(
            self::cases(),
            static fn ($case) => !in_array($case, $ignoredCases, true)
        ));

        if ($count <= 0 || empty($pool)) {
            return [];
        }

        if ($count >= count($pool)) {
            shuffle($pool);
            return $pool;
        }

        $keys = array_rand($pool, $count);
        $keys = is_array($keys) ? $keys : [$keys];
        shuffle($keys);

        return array_map(static fn ($k) => $pool[$k], $keys);
    }
}
