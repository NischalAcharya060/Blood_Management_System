<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (!auth()->check()) {
            abort(403, "You don't have access to this page. Ask Nischal Acharya for access.");
        }

        // Allow users with 'admin' role to bypass role restrictions
        if (auth()->user()->hasRole('admin')) {
            return $next($request);
        }

        if (!auth()->user()->hasRole($role)) {
            abort(403, "You don't have access to this page. Ask Nischal Acharya for access.");
        }

        return $next($request);
    }
}

