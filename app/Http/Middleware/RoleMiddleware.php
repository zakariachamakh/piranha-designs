<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * @param Request $request
     * @param Closure $next
     * @param $role
     * @return Response
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Check if the authenticated user's role matches the required role
        if (Auth::check() && Auth::user()->role === $role) {
            return $next($request);
        }

        // If the user doesn't have the required role, deny access
        abort(403, 'Unauthorized action.');
    }
}
