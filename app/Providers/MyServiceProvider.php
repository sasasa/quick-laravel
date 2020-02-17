<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        echo "<b><MyServiceProvider.register></b>";
        app()->singleton(
            'App\MyClasses\MyServiceInterface',
            'App\MyClasses\PowerMyService'
        );
        app()->singleton(
            'myservice',
            'App\MyClasses\PowerMyService'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        echo "<b><MyServiceProvider.boot></b>";
    }
}
