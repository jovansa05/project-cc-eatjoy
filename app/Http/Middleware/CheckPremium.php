<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckPremium
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || !Auth::user()->isPremium()) {
            return redirect()->route('subscription')->with('error', 'Anda perlu berlangganan untuk mengakses fitur ini.');
        }

        return $next($request);
    }
}
