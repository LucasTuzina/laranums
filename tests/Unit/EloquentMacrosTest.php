<?php

namespace Lucastuzina\Laranums\Tests\Unit;

use Illuminate\Database\Query\Builder;
use Lucastuzina\Laranums\Tests\Fixtures\StatusEnum;
use Lucastuzina\Laranums\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class EloquentMacrosTest extends TestCase
{
    #[Test]
    public function where_enum_macro_is_registered()
    {
        $this->assertTrue(Builder::hasMacro('whereEnum'));
        $this->assertTrue(Builder::hasMacro('whereEnumNot'));
        $this->assertTrue(Builder::hasMacro('orWhereEnum'));
    }

    #[Test]
    public function where_enum_unwraps_backed_enum_value()
    {
        $sql = $this->app['db']->table('items')
            ->whereEnum('status', StatusEnum::Active)
            ->toSql();

        $bindings = $this->app['db']->table('items')
            ->whereEnum('status', StatusEnum::Active)
            ->getBindings();

        $this->assertStringContainsString('"status" =', $sql);
        $this->assertSame(['active'], $bindings);
    }

    #[Test]
    public function where_enum_accepts_an_array_of_enum_instances()
    {
        $query = $this->app['db']->table('items')
            ->whereEnum('status', [StatusEnum::Active, StatusEnum::Pending]);

        $this->assertStringContainsString('"status" in', strtolower($query->toSql()));
        $this->assertSame(['active', 'pending'], $query->getBindings());
    }

    #[Test]
    public function where_enum_not_negates_the_match()
    {
        $query = $this->app['db']->table('items')
            ->whereEnumNot('status', StatusEnum::Active);

        $this->assertSame(['active'], $query->getBindings());
        $this->assertStringContainsString('!=', $query->toSql());
    }

    #[Test]
    public function where_enum_not_with_array_uses_not_in()
    {
        $query = $this->app['db']->table('items')
            ->whereEnumNot('status', [StatusEnum::Active, StatusEnum::Pending]);

        $this->assertStringContainsString('not in', strtolower($query->toSql()));
        $this->assertSame(['active', 'pending'], $query->getBindings());
    }
}
