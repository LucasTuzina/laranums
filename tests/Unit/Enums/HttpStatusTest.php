<?php

namespace Lucastuzina\Laranums\Tests\Unit\Enums;

use Lucastuzina\Laranums\Enums\HttpStatus;
use Lucastuzina\Laranums\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class HttpStatusTest extends TestCase
{
    #[Test]
    public function it_derives_numeric_category()
    {
        $this->assertSame(1, HttpStatus::CONTINUE->category());
        $this->assertSame(2, HttpStatus::OK->category());
        $this->assertSame(3, HttpStatus::MOVED_PERMANENTLY->category());
        $this->assertSame(4, HttpStatus::NOT_FOUND->category());
        $this->assertSame(5, HttpStatus::INTERNAL_SERVER_ERROR->category());
    }

    #[Test]
    public function it_detects_informational_statuses()
    {
        $this->assertTrue(HttpStatus::CONTINUE->isInformational());
        $this->assertFalse(HttpStatus::OK->isInformational());
    }

    #[Test]
    public function it_detects_success_statuses()
    {
        $this->assertTrue(HttpStatus::OK->isSuccess());
        $this->assertTrue(HttpStatus::CREATED->isSuccess());
        $this->assertFalse(HttpStatus::NOT_FOUND->isSuccess());
    }

    #[Test]
    public function it_detects_redirection_statuses()
    {
        $this->assertTrue(HttpStatus::FOUND->isRedirection());
        $this->assertFalse(HttpStatus::OK->isRedirection());
    }

    #[Test]
    public function it_detects_client_error_statuses()
    {
        $this->assertTrue(HttpStatus::NOT_FOUND->isClientError());
        $this->assertFalse(HttpStatus::INTERNAL_SERVER_ERROR->isClientError());
    }

    #[Test]
    public function it_detects_server_error_statuses()
    {
        $this->assertTrue(HttpStatus::INTERNAL_SERVER_ERROR->isServerError());
        $this->assertFalse(HttpStatus::NOT_FOUND->isServerError());
    }

    #[Test]
    public function is_error_covers_4xx_and_5xx()
    {
        $this->assertTrue(HttpStatus::NOT_FOUND->isError());
        $this->assertTrue(HttpStatus::INTERNAL_SERVER_ERROR->isError());
        $this->assertFalse(HttpStatus::OK->isError());
        $this->assertFalse(HttpStatus::FOUND->isError());
    }

    #[Test]
    public function reason_phrase_returns_iana_text()
    {
        $this->assertSame('OK', HttpStatus::OK->reasonPhrase());
        $this->assertSame('Not Found', HttpStatus::NOT_FOUND->reasonPhrase());
        $this->assertSame('Internal Server Error', HttpStatus::INTERNAL_SERVER_ERROR->reasonPhrase());
    }
}
