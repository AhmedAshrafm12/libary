<?php

namespace App\Http\Middleware;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate 
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;
   
        foreach ($guards as $guard) {
            if($guard == 'admins')
            $path = 'admin/login';
            
            if (!Auth::guard($guard)->check()) {
                if($guard == 'admins')
                return redirect('/admin/login');
                else   
                return redirect('/login');
               
            }
        }

        return $next($request);
    }
}
