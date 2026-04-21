<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class StaffOrAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('user_id')) {
            return redirect()->route('login')->with('error', 'Please login first.');
        }

        $allowedRoles = ['admin', 'staff'];

        if (!in_array(session('account_type'), $allowedRoles, true)) {
            return redirect()
                ->route('home')
                ->with('error', 'You have insufficient permissions. Only staff and admin can access that page.');
        }

        return $next($request);
    }
}