<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CleanRowDBServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        \App::bind('clean', function()
        {
            return new \App\Helpers\CleanRowDB;
        });
    }
}
