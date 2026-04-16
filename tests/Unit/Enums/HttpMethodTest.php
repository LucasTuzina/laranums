<?php

namespace Lucastuzina\Laranums\Tests\Unit\Enums;

use Lucastuzina\Laranums\Enums\HttpMethod;
use Lucastuzina\Laranums\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class HttpMethodTest extends TestCase
{
    #[Test]
    public function safe_methods_are_correct()
    {
        $this->assertTrue(HttpMethod::GET->isSafe());
        $this->assertTrue(HttpMethod::HEAD->isSafe());
        $this->assertTrue(HttpMethod::OPTIONS->isSafe());
        $this->assertTrue(HttpMethod::TRACE->isSafe());

        $this->assertFalse(HttpMethod::POST->isSafe());
        $this->assertFalse(HttpMethod::PUT->isSafe());
        $this->assertFalse(HttpMethod::PATCH->isSafe());
        $this->assertFalse(HttpMethod::DELETE->isSafe());
    }

    #[Test]
    public function idempotent_methods_are_correct()
    {
        $this->assertTrue(HttpMethod::GET->isIdempotent());
        $this->assertTrue(HttpMethod::PUT->isIdempotent());
        $this->assertTrue(HttpMethod::DELETE->isIdempotent());
        $this->assertTrue(HttpMethod::HEAD->isIdempotent());

        $this->assertFalse(HttpMethod::POST->isIdempotent());
        $this->assertFalse(HttpMethod::PATCH->isIdempotent());
    }

    #[Test]
    public function has_request_body_flags_state_changing_methods()
    {
        $this->assertTrue(HttpMethod::POST->hasRequestBody());
        $this->assertTrue(HttpMethod::PUT->hasRequestBody());
        $this->assertTrue(HttpMethod::PATCH->hasRequestBody());

        $this->assertFalse(HttpMethod::GET->hasRequestBody());
        $this->assertFalse(HttpMethod::DELETE->hasRequestBody());
    }
}
