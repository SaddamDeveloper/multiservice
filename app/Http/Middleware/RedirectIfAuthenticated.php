<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            switch ($guard) {
               case 'admin':
                   $route = 'admin/dashboard';
                   break;
               case 'merchant':
                   $route = 'merchant/dashboard';
                   break;
               case 'user':
                   $route = 'user/dashboard';
                   break;
               case 'driver':
                   $route = 'driver/dashboard';
                   break;
              default:
                   $route = 'web.login';
           }
           return redirect($route);
       }

        return $next($request);
    }
}
