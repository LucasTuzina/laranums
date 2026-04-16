<?php

namespace Lucastuzina\Laranums;

use Illuminate\Support\ServiceProvider;
use Lucastuzina\Laranums\Eloquent\EnumQueryMacros;

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
        EnumQueryMacros::register();

        if ($this->app->runningInConsole()) {
            $this->commands([
                \Lucastuzina\Laranums\Console\MakeLaranumCommand::class,
            ]);
        }
    }
}
