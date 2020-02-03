<?php

namespace App\Http\Middleware;

use Closure;

class LogMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // ビュー変数を設定
        $request->merge([
            'title'=>"速習Laravel",
            'author'=>"YAMADA Yoshihiro",
        ]);
        
        file_put_contents('C:\Users\user07\php\quick-laravel\storage\logs\access.log', date('Y-m-d H:i:s')."\n", FILE_APPEND);
        return $next($request);
    }
}
