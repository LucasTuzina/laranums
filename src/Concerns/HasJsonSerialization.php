<?php

namespace Lucastuzina\Laranums\Concerns;

use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;

trait HasJsonSerialization
{
    /**
     * Serialize enum to JSON.
     */
    public function jsonSerialize(): array
    {
        $value = isset($this->value) ? $this->value : $this->name;

        return [
            'name' => $this->name,
            'value' => $value,
            'translation' => Lang::get(
                'enums.'.Str::snake(class_basename(static::class)).'.'.$this->name
            ),
        ];
    }
}
