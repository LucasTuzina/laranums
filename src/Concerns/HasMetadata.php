<?php

namespace Lucastuzina\Laranums\Concerns;

trait HasMetadata
{
    /**
     * Get the class name of the enum.
     */
    public static function className(): string
    {
        return class_basename(static::class);
    }
}
