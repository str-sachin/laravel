<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class User
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
        if (!Auth::check()){
            return redirect()->route('login');
        }

        // For Admin
        if (Auth::user()->role == '1')
         {
           return redirect()->route('admin');
         }

        // For User
        if (Auth::user()->role == '2')
        {
          return $next($request); 
        }  
    }
}
