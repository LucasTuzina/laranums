<?php

namespace Lucastuzina\Laranums\Concerns;

trait HasNavigation
{
    /**
     * Get the first case as declared.
     */
    public static function first(): self
    {
        return self::cases()[0];
    }

    /**
     * Get the last case as declared.
     */
    public static function last(): self
    {
        $cases = self::cases();
        return $cases[count($cases) - 1];
    }

    /**
     * Number of declared cases.
     */
    public static function count(): int
    {
        return count(self::cases());
    }

    /**
     * Get the case at a zero-based index, or null if out of bounds.
     */
    public static function at(int $index): ?self
    {
        $cases = self::cases();
        return $cases[$index] ?? null;
    }

    /**
     * Zero-based position of this case within cases().
     */
    public function index(): int
    {
        foreach (self::cases() as $i => $case) {
            if ($case === $this) {
                return $i;
            }
        }
        return -1;
    }

    /**
     * Next case after this one. Returns null at the end unless $cyclic is true.
     */
    public function next(bool $cyclic = false): ?self
    {
        $cases = self::cases();
        $index = $this->index();

        if ($index + 1 < count($cases)) {
            return $cases[$index + 1];
        }

        return $cyclic ? $cases[0] : null;
    }

    /**
     * Previous case before this one. Returns null at the start unless $cyclic is true.
     */
    public function previous(bool $cyclic = false): ?self
    {
        $cases = self::cases();

        if ($this->index() > 0) {
            return $cases[$this->index() - 1];
        }

        return $cyclic ? $cases[count($cases) - 1] : null;
    }
}
