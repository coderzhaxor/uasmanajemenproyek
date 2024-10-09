<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        // Check if the user is logged in and if the user is an admin
        if (Auth::check() && Auth::user()->is_admin) {
            return $next($request);
        }

        // Redirect to login or access denied page if not admin
        return redirect()->route('admin.login');
    }
}
