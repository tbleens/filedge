<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class InstallAppChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $installPrefix = $request->route()->getPrefix();

        if (!env('APP_INSTALL') && ($installPrefix=='/install')) {
            // dd($installPrefix);
            return $next($request);
        } elseif (!env('APP_INSTALL') && ($installPrefix!='/install')) {
            // dd($installPrefix);
            return Redirect::route('install');
        } elseif (env('APP_INSTALL') && ($installPrefix==='/install')) {
            return Redirect::route('login');
        }

        return $next($request);
    }
}
