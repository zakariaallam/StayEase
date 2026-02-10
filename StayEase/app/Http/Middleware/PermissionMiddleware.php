<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PermissionMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            abort(401);
        }
        $userRole = Auth::user()->role;
        $allowedRoles = ['admin', 'manager'];
        if (!in_array($userRole, $allowedRoles)) {
            abort(403, 'Access Denied: Admins and Managers only.');
        }
        return $next($request);
    }
}
