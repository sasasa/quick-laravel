<?php

namespace App\Http\Middleware;

use Closure;

class ElapsedTimeMiddleware
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
        $starttime = microtime(true);
        $response = $next($request);
        /* do stuff here */
        $endtime = microtime(true);
        $timediff = $endtime - $starttime;
        
        $content = $response->content();
        $pattern = '/<\/body>/i';
        $replace =  "<p>ElapsedTime: ". $timediff. " seconds</p></body>";
        $content = preg_replace($pattern, $replace, $content);
        $response->setContent($content);
        return $response;
    }
}
