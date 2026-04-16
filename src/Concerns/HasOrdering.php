<?php

namespace Lucastuzina\Laranums\Concerns;

/**
 * Ordering is based on declaration order (the case's position in cases()).
 * This works for backed and non-backed enums uniformly.
 */
trait HasOrdering
{
    /**
     * Compare two cases by declaration order. Returns -1, 0 or 1 — usable in usort.
     */
    public function compare(self $other): int
    {
        return $this->positionInCases() <=> $other->positionInCases();
    }

    /**
     * Whether this case is declared before $other.
     */
    public function lessThan(self $other): bool
    {
        return $this->compare($other) < 0;
    }

    /**
     * Whether this case is declared after $other.
     */
    public function greaterThan(self $other): bool
    {
        return $this->compare($other) > 0;
    }

    /**
     * Whether this case lies between $a and $b (inclusive). Order of $a and $b does not matter.
     */
    public function between(self $a, self $b): bool
    {
        $low = min($a->positionInCases(), $b->positionInCases());
        $high = max($a->positionInCases(), $b->positionInCases());
        $i = $this->positionInCases();

        return $i >= $low && $i <= $high;
    }

    /**
     * Internal helper so HasOrdering doesn't depend on HasNavigation::index().
     */
    private function positionInCases(): int
    {
        foreach (self::cases() as $i => $case) {
            if ($case === $this) {
                return $i;
            }
        }
        return -1;
    }
}
