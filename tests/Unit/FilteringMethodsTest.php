<?php

namespace Lucastuzina\Laranums\Tests\Unit;

use Lucastuzina\Laranums\Tests\Fixtures\StatusEnum;
use Lucastuzina\Laranums\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class FilteringMethodsTest extends TestCase
{
    #[Test]
    public function it_keeps_only_given_cases_in_declaration_order()
    {
        $result = StatusEnum::only([StatusEnum::Pending, StatusEnum::Active]);

        $this->assertSame([StatusEnum::Active, StatusEnum::Pending], $result);
    }

    #[Test]
    public function only_returns_empty_array_when_nothing_matches()
    {
        $this->assertSame([], StatusEnum::only([]));
    }

    #[Test]
    public function it_excludes_given_cases_in_declaration_order()
    {
        $result = StatusEnum::except([StatusEnum::Inactive]);

        $this->assertSame([StatusEnum::Active, StatusEnum::Pending], $result);
    }

    #[Test]
    public function except_returns_all_when_nothing_excluded()
    {
        $this->assertSame(StatusEnum::cases(), StatusEnum::except([]));
    }

    #[Test]
    public function except_returns_empty_when_all_excluded()
    {
        $this->assertSame([], StatusEnum::except(StatusEnum::cases()));
    }

    #[Test]
    public function random_returns_requested_amount_of_distinct_cases()
    {
        $result = StatusEnum::random(2);

        $this->assertCount(2, $result);
        $this->assertCount(2, array_unique($result, SORT_REGULAR));
        foreach ($result as $case) {
            $this->assertInstanceOf(StatusEnum::class, $case);
        }
    }

    #[Test]
    public function random_returns_all_cases_when_count_exceeds_pool()
    {
        $result = StatusEnum::random(99);

        $this->assertCount(3, $result);
        $this->assertEqualsCanonicalizing(StatusEnum::cases(), $result);
    }

    #[Test]
    public function random_excludes_ignored_cases()
    {
        $result = StatusEnum::random(99, ignoredCases: [StatusEnum::Active]);

        $this->assertCount(2, $result);
        $this->assertNotContains(StatusEnum::Active, $result);
    }

    #[Test]
    public function random_returns_empty_array_for_zero_count()
    {
        $this->assertSame([], StatusEnum::random(0));
    }

    #[Test]
    public function random_returns_empty_array_when_pool_is_empty()
    {
        $this->assertSame([], StatusEnum::random(3, ignoredCases: StatusEnum::cases()));
    }
}
