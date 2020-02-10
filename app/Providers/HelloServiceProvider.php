<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Http\Validators\HelloValidator;

class HelloServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // ビューコンポーザーの設定
        View::composer('hello.list', 'App\Http\Composers\HelloComposer');
        
        // バリデーターの設定
        $validator = $this->app['validator'];
        $validator->resolver(function($translator, $data, $rules, $messages){
            return new HelloValidator($translator, $data, $rules, $messages);
        });

    }
}
