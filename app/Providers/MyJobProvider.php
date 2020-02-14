<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MyJobProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bindMethod(MyJob::class.'@handle', function($job, $app){
            return $job->handle();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
