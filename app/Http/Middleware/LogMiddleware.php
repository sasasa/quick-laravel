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
        
        $path = base_path(). '\storage\logs\access.log';
        file_put_contents($path, date('Y-m-d H:i:s'). "\n", FILE_APPEND);
        return $next($request);
    }
}
