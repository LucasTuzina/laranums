<?php

namespace Lucastuzina\Laranums\Concerns;

trait HasComparison
{
    /**
     * Strict identity check.
     */
    public function is(self $other): bool
    {
        return $this === $other;
    }

    /**
     * Whether this case is one of the given cases.
     *
     * @param  array<int, self>  $cases
     */
    public function in(array $cases): bool
    {
        return in_array($this, $cases, true);
    }

    /**
     * Whether this case is NOT one of the given cases.
     *
     * @param  array<int, self>  $cases
     */
    public function notIn(array $cases): bool
    {
        return !$this->in($cases);
    }
}
