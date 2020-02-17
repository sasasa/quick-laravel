<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // app()->resolving(function ($obj, $app){
        //     if (is_object($obj)) {
        //         echo \get_class($obj). "<br>";
        //     } else {
        //         echo $obj. '<br>';
        //     }
        // });
    }
}
