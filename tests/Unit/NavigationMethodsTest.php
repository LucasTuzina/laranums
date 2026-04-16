<?php

namespace Lucastuzina\Laranums\Tests\Unit;

use Lucastuzina\Laranums\Tests\Fixtures\StatusEnum;
use Lucastuzina\Laranums\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class NavigationMethodsTest extends TestCase
{
    #[Test]
    public function it_returns_first_case()
    {
        $this->assertSame(StatusEnum::Active, StatusEnum::first());
    }

    #[Test]
    public function it_returns_last_case()
    {
        $this->assertSame(StatusEnum::Pending, StatusEnum::last());
    }

    #[Test]
    public function it_counts_cases()
    {
        $this->assertSame(3, StatusEnum::count());
    }

    #[Test]
    public function it_returns_case_at_index()
    {
        $this->assertSame(StatusEnum::Active, StatusEnum::at(0));
        $this->assertSame(StatusEnum::Inactive, StatusEnum::at(1));
        $this->assertSame(StatusEnum::Pending, StatusEnum::at(2));
    }

    #[Test]
    public function it_returns_null_for_out_of_bounds_index()
    {
        $this->assertNull(StatusEnum::at(99));
        $this->assertNull(StatusEnum::at(-1));
    }

    #[Test]
    public function it_returns_index_of_case()
    {
        $this->assertSame(0, StatusEnum::Active->index());
        $this->assertSame(1, StatusEnum::Inactive->index());
        $this->assertSame(2, StatusEnum::Pending->index());
    }

    #[Test]
    public function it_returns_next_case()
    {
        $this->assertSame(StatusEnum::Inactive, StatusEnum::Active->next());
        $this->assertSame(StatusEnum::Pending, StatusEnum::Inactive->next());
    }

    #[Test]
    public function it_returns_null_for_next_at_end()
    {
        $this->assertNull(StatusEnum::Pending->next());
    }

    #[Test]
    public function it_wraps_around_with_cyclic_next()
    {
        $this->assertSame(StatusEnum::Active, StatusEnum::Pending->next(cyclic: true));
    }

    #[Test]
    public function it_returns_previous_case()
    {
        $this->assertSame(StatusEnum::Inactive, StatusEnum::Pending->previous());
        $this->assertSame(StatusEnum::Active, StatusEnum::Inactive->previous());
    }

    #[Test]
    public function it_returns_null_for_previous_at_start()
    {
        $this->assertNull(StatusEnum::Active->previous());
    }

    #[Test]
    public function it_wraps_around_with_cyclic_previous()
    {
        $this->assertSame(StatusEnum::Pending, StatusEnum::Active->previous(cyclic: true));
    }
}
