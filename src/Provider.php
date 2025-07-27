<?php

namespace Arrocy\DebugbarCollector;

use Arrocy\DebugbarCollector\ArrocyCollector;
use Arrocy\DebugbarCollector\ServerCollector;
use Barryvdh\Debugbar\LaravelDebugbar;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class Provider extends BaseServiceProvider
{
    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->extend(LaravelDebugbar::class, function ($debugbar) {
            $debugbar->addCollector(new ArrocyCollector());
            $debugbar->addCollector(new ServerCollector());

            return $debugbar;
        });
    }

    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        //
    }
}
