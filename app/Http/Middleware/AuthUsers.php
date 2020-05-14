<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class AuthUsers
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    // public function handle($request, Closure $next)
    // {
    //     return $next($request);
    // }
    public function handle($request, Closure $next)
    {
        if (false == Auth::check()) {
            return redirect()->route('login');
            //redirect User to login page
        }

        return $next($request);
    }
}
