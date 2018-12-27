<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PushNotifyServiceProvider extends ServiceProvider
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
        \App::bind('Notificar', function()
        {
            return new \App\Helpers\PushNotify;
        });
    }
}
