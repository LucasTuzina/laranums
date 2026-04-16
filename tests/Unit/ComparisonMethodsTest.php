<?php

namespace Lucastuzina\Laranums\Tests\Unit;

use Lucastuzina\Laranums\Tests\Fixtures\StatusEnum;
use Lucastuzina\Laranums\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class ComparisonMethodsTest extends TestCase
{
    #[Test]
    public function is_returns_true_for_same_case()
    {
        $this->assertTrue(StatusEnum::Active->is(StatusEnum::Active));
    }

    #[Test]
    public function is_returns_false_for_different_case()
    {
        $this->assertFalse(StatusEnum::Active->is(StatusEnum::Inactive));
    }

    #[Test]
    public function in_returns_true_when_case_is_in_list()
    {
        $this->assertTrue(
            StatusEnum::Active->in([StatusEnum::Active, StatusEnum::Pending])
        );
    }

    #[Test]
    public function in_returns_false_when_case_is_not_in_list()
    {
        $this->assertFalse(
            StatusEnum::Active->in([StatusEnum::Inactive, StatusEnum::Pending])
        );
    }

    #[Test]
    public function in_returns_false_for_empty_list()
    {
        $this->assertFalse(StatusEnum::Active->in([]));
    }

    #[Test]
    public function not_in_is_inverse_of_in()
    {
        $this->assertTrue(
            StatusEnum::Active->notIn([StatusEnum::Inactive, StatusEnum::Pending])
        );
        $this->assertFalse(
            StatusEnum::Active->notIn([StatusEnum::Active, StatusEnum::Pending])
        );
    }
}
