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
            if(Auth::user()->type == "admin"){
                return redirect()->route('admin.index');
            } elseif(Auth::user()->type == "supervisor") {
                return redirect()->route('Soutenance.index');
            }else {
                return redirect()->route('formulaire.index');
                        }
        }

        return $next($request);
    }
}
