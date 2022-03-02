<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Blogpage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
    //    echo "<h1>mmmmmmmmmmmmmmm</h1>";

        return $next($request);
    }
    
}
