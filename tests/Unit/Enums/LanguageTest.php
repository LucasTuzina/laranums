<?php

namespace Lucastuzina\Laranums\Tests\Unit\Enums;

use Lucastuzina\Laranums\Enums\Language;
use Lucastuzina\Laranums\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class LanguageTest extends TestCase
{
    #[Test]
    public function it_covers_iso_639_1()
    {
        $this->assertGreaterThan(180, Language::count());
    }

    #[Test]
    public function code_is_the_lowercase_two_letter_value()
    {
        $this->assertSame('de', Language::DE->code());
        $this->assertSame('en', Language::EN->code());
    }

    #[Test]
    public function native_names_are_in_own_script()
    {
        $this->assertSame('Deutsch', Language::DE->nativeName());
        $this->assertSame('English', Language::EN->nativeName());
        $this->assertSame('日本語', Language::JA->nativeName());
        $this->assertSame('العربية', Language::AR->nativeName());
    }

    #[Test]
    public function english_labels_are_correct()
    {
        $this->assertSame('German', Language::DE->label());
        $this->assertSame('Japanese', Language::JA->label());
        $this->assertSame('Arabic', Language::AR->label());
    }

    #[Test]
    public function rtl_languages_are_marked()
    {
        $this->assertTrue(Language::AR->isRtl());
        $this->assertTrue(Language::HE->isRtl());
        $this->assertTrue(Language::FA->isRtl());
        $this->assertTrue(Language::UR->isRtl());
    }

    #[Test]
    public function ltr_languages_are_not_marked()
    {
        $this->assertFalse(Language::DE->isRtl());
        $this->assertFalse(Language::EN->isRtl());
        $this->assertFalse(Language::ZH->isRtl());
    }
}
