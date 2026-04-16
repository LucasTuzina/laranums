<?php

namespace Lucastuzina\Laranums\Tests\Unit;

use Faker\Factory;
use InvalidArgumentException;
use Lucastuzina\Laranums\Faker\LaranumFakerProvider;
use Lucastuzina\Laranums\Tests\Fixtures\StatusEnum;
use Lucastuzina\Laranums\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class FakerProviderTest extends TestCase
{
    #[Test]
    public function it_returns_a_random_case_of_the_given_enum()
    {
        $faker = Factory::create();
        $faker->addProvider(new LaranumFakerProvider($faker));

        $case = $faker->enum(StatusEnum::class);

        $this->assertInstanceOf(StatusEnum::class, $case);
        $this->assertContains($case, StatusEnum::cases());
    }

    #[Test]
    public function it_excludes_ignored_cases()
    {
        $faker = Factory::create();
        $faker->addProvider(new LaranumFakerProvider($faker));

        for ($i = 0; $i < 50; $i++) {
            $case = $faker->enum(StatusEnum::class, [StatusEnum::Inactive]);
            $this->assertNotSame(StatusEnum::Inactive, $case);
        }
    }

    #[Test]
    public function it_throws_when_given_a_non_enum_class()
    {
        $faker = Factory::create();
        $faker->addProvider(new LaranumFakerProvider($faker));

        $this->expectException(InvalidArgumentException::class);
        $faker->enum(\stdClass::class);
    }

    #[Test]
    public function it_throws_when_all_cases_are_filtered_out()
    {
        $faker = Factory::create();
        $faker->addProvider(new LaranumFakerProvider($faker));

        $this->expectException(InvalidArgumentException::class);
        $faker->enum(StatusEnum::class, StatusEnum::cases());
    }
}
