<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class FranchiseeMW
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
            if(Auth::user()->roleFranchisee()){ // if authenticate user rolesHQ is true
                return $next($request);
            }
            else{
                return redirect('/home');
            }
        }

        return redirect('/login');
    }
}
