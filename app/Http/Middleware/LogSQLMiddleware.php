<?php

namespace App\Http\Middleware;

use Closure;
use DB;

class LogSQLMiddleware
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
        DB::enableQueryLog();
        $response = $next($request);
        
        $content = $response->content();
        // ddは処理を止めるがdumpは処理を止めない
        dump(DB::getQueryLog());

        return $response;
    }
}
