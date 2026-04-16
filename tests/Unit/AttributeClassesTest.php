<?php

namespace Lucastuzina\Laranums\Tests\Unit;

use Attribute;
use Lucastuzina\Laranums\Attributes\Color;
use Lucastuzina\Laranums\Attributes\Description;
use Lucastuzina\Laranums\Attributes\Icon;
use Lucastuzina\Laranums\Attributes\Label;
use Lucastuzina\Laranums\Tests\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use ReflectionClass;

class AttributeClassesTest extends TestCase
{
    public static function attributeClassProvider(): array
    {
        return [
            'Label'       => [Label::class],
            'Color'       => [Color::class],
            'Icon'        => [Icon::class],
            'Description' => [Description::class],
        ];
    }

    #[Test]
    #[DataProvider('attributeClassProvider')]
    public function it_stores_constructor_value_in_public_value_property(string $class)
    {
        $instance = new $class('some-value');

        $this->assertSame('some-value', $instance->value);
    }

    #[Test]
    #[DataProvider('attributeClassProvider')]
    public function it_exposes_value_as_readonly(string $class)
    {
        $reflection = new ReflectionClass($class);
        $property = $reflection->getProperty('value');

        $this->assertTrue($property->isReadOnly(), "{$class}::\$value must be readonly");
        $this->assertTrue($property->isPublic(), "{$class}::\$value must be public");
    }

    #[Test]
    #[DataProvider('attributeClassProvider')]
    public function it_targets_class_constants_only(string $class)
    {
        $reflection = new ReflectionClass($class);
        $attributes = $reflection->getAttributes(Attribute::class);

        $this->assertNotEmpty($attributes, "{$class} must declare the #[Attribute] meta-attribute");

        $instance = $attributes[0]->newInstance();

        $this->assertSame(
            Attribute::TARGET_CLASS_CONSTANT,
            $instance->flags,
            "{$class} must target TARGET_CLASS_CONSTANT only (enum cases are class constants)"
        );
    }

    #[Test]
    #[DataProvider('attributeClassProvider')]
    public function it_accepts_an_empty_string(string $class)
    {
        $instance = new $class('');

        $this->assertSame('', $instance->value);
    }

    #[Test]
    #[DataProvider('attributeClassProvider')]
    public function it_preserves_unicode_and_whitespace(string $class)
    {
        $value = '  Über–Größe ✓  ';
        $instance = new $class($value);

        $this->assertSame($value, $instance->value);
    }
}
