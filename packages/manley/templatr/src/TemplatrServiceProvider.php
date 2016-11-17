<?php

namespace Manley\Templatr;

use Illuminate\Support\ServiceProvider;

class TemplatrServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/views', 'templatr');


        $this->publishes([
        __DIR__.'/css' => public_path('vendor/templatr'),
        ], 'public');

        $this->publishes([
        __DIR__.'/js' => public_path('vendor/templatr'),
        ], 'public');


    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
