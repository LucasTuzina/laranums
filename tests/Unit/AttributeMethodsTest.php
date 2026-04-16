<?php

namespace Lucastuzina\Laranums\Tests\Unit;

use Lucastuzina\Laranums\Tests\Fixtures\AttributedEnum;
use Lucastuzina\Laranums\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class AttributeMethodsTest extends TestCase
{
    #[Test]
    public function it_reads_label_attribute()
    {
        $this->assertEquals('Pending Order', AttributedEnum::Pending->label());
        $this->assertEquals('Paid Order', AttributedEnum::Paid->label());
    }

    #[Test]
    public function it_falls_back_to_case_name_when_no_label_and_no_translation()
    {
        $this->assertEquals('Plain', AttributedEnum::Plain->label());
    }

    #[Test]
    public function it_reads_color_attribute()
    {
        $this->assertEquals('yellow', AttributedEnum::Pending->color());
        $this->assertEquals('green', AttributedEnum::Paid->color());
    }

    #[Test]
    public function it_returns_null_for_missing_color()
    {
        $this->assertNull(AttributedEnum::Plain->color());
    }

    #[Test]
    public function it_reads_icon_attribute()
    {
        $this->assertEquals('clock', AttributedEnum::Pending->icon());
        $this->assertEquals('check', AttributedEnum::Paid->icon());
    }

    #[Test]
    public function it_returns_null_for_missing_icon()
    {
        $this->assertNull(AttributedEnum::Plain->icon());
    }

    #[Test]
    public function it_reads_description_attribute()
    {
        $this->assertEquals('Awaiting payment', AttributedEnum::Pending->description());
    }

    #[Test]
    public function it_returns_null_for_missing_description()
    {
        $this->assertNull(AttributedEnum::Paid->description());
        $this->assertNull(AttributedEnum::Plain->description());
    }

    #[Test]
    public function it_builds_select_options_using_labels()
    {
        $options = AttributedEnum::toSelectOptions();

        $this->assertEquals([
            'pending' => 'Pending Order',
            'paid' => 'Paid Order',
            'plain' => 'Plain',
        ], $options);
    }
}
