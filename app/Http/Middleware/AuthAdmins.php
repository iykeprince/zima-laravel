<?php

namespace App\Http\Middleware;

use Auth;
use Closure;


class AuthAdmins
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
        if (false == Auth::guard('admin')->check()) {
            return redirect()->route('login.admin');
        }

        return $next($request);
    }
}
