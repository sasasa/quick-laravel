<?php

namespace App\Http\Middleware;

use Closure;

class UpperMiddleware
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
        $response = $next($request);
        $response->setContent(mb_strtoupper($response->content()));
        return $response;
    }
}
