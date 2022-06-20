<?php

namespace App\Http\Middleware;

use App\Models\Settings;
use Closure;
use Illuminate\Http\Request;

class SettingsTrust
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
        try {
            $settings = Settings::all()->pluck('value', 'name');

            foreach ($settings as $key => $value) {
                config(['settings.' . $key => $value]);
            }
        } catch (\Exception $e) {
        }

        return $next($request);
    }
}
