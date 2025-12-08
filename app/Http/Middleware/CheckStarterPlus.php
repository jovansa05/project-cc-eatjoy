<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckStarterPlus
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || !Auth::user()->isPremiumStarterPlus()) {
            return redirect()->route('dashboard')->with('error', 'Fitur ini hanya tersedia untuk paket EatJoy Starter+.');
        }

        return $next($request);
    }
}
