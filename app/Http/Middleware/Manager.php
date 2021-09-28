<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Manager
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
        foreach (auth()->user()->roles as $role) {
            if ($role->getSettingValue('en', 'string', 'name') == 'manager') {
                return $next($request);
            }
        }

        return redirect()->route('dashboard'); // If user is not an manager.
    }
}