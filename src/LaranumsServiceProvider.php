<?php

namespace Lucastuzina\Laranums;

use Illuminate\Support\ServiceProvider;

class LaranumsServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
    }

    /**
     * Bootstrap any package services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                \Lucastuzina\Laranums\Console\MakeEnumCommand::class,
            ]);
        }
    }
}