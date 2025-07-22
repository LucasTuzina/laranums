<?php

namespace Lucastuzina\Laranums\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            \Lucastuzina\Laranums\LaranumsServiceProvider::class,
        ];
    }

    protected function setUp(): void
    {
        parent::setUp();
        
        // Mock translations
        $this->app['translator']->addNamespace('test', __DIR__ . '/lang');
    }
}
