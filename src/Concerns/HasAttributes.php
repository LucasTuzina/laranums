<?php

namespace Lucastuzina\Laranums\Concerns;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Lang;
use Lucastuzina\Laranums\Attributes\Color;
use Lucastuzina\Laranums\Attributes\Description;
use Lucastuzina\Laranums\Attributes\Icon;
use Lucastuzina\Laranums\Attributes\Label;
use ReflectionClassConstant;

trait HasAttributes
{
    /**
     * Get the label for this case.
     * Resolves in order: #[Label] attribute → translation → case name.
     */
    public function label(): string
    {
        $attr = $this->attribute(Label::class);
        if ($attr !== null) {
            return $attr->value;
        }

        $key = 'enums.'.Str::snake(class_basename(static::class)).'.'.$this->name;
        $translation = Lang::get($key);

        return $translation === $key ? $this->name : $translation;
    }

    /**
     * Get the color for this case from #[Color] attribute, or null if not set.
     */
    public function color(): ?string
    {
        return $this->attribute(Color::class)?->value;
    }

    /**
     * Get the icon for this case from #[Icon] attribute, or null if not set.
     */
    public function icon(): ?string
    {
        return $this->attribute(Icon::class)?->value;
    }

    /**
     * Get the description for this case from #[Description] attribute, or null if not set.
     */
    public function description(): ?string
    {
        return $this->attribute(Description::class)?->value;
    }

    /**
     * Build an array of [value => label] suitable for HTML <select>, Filament, Livewire etc.
     */
    public static function toSelectOptions(): array
    {
        $options = [];
        foreach (self::cases() as $case) {
            $value = isset($case->value) ? $case->value : $case->name;
            $options[$value] = $case->label();
        }
        return $options;
    }

    /**
     * Read a single attribute instance from the current case via reflection.
     *
     * @template T of object
     * @param  class-string<T>  $attributeClass
     * @return T|null
     */
    private function attribute(string $attributeClass): ?object
    {
        $reflection = new ReflectionClassConstant(static::class, $this->name);
        $attributes = $reflection->getAttributes($attributeClass);

        if (empty($attributes)) {
            return null;
        }

        return $attributes[0]->newInstance();
    }
}
