<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, ...$guard)
    {
          
             $guards = empty($guards) ? [null] : $guards;
                   
        foreach ($guards as $guard) { 
            if($guard == 'admin')
            {                
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('admin.dashboard'); 
                }
               else {
                    return redirect('/');
                }                        
            }     
        }

            
        
        return $next($request);
    }
}
