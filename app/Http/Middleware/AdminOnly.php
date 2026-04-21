<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminOnly
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('user_id')) {
            return redirect()->route('login')->with('error', 'Please login first.');
        }

        if (session('account_type') !== 'admin') {
            return redirect()
                ->route('home')
                ->with('error', 'You have insufficient permissions. Only admin can access that page.');
        }

        return $next($request);
    }
}