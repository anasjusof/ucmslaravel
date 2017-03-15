<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class HQ
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
        
        if(Auth::check()){ // check if the user is logged in
            if(Auth::user()->roleHQ()){ // if authenticate user rolesHQ is true
                return $next($request);
            }
            else{
                return redirect('/home');
            }
        }

        return redirect('/login');
    }
}
