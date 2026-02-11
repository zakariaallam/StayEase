<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Role;
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
        $user = Auth::user();
        $role = Role::where('id',$user->role_id)->first();
        $allowedRoles = ['admin', 'manager'];
        if (!in_array($role->role, $allowedRoles)) {
            abort(403, 'Access Denied: Admins and Managers only.');
        }
        return $next($request);
    }
}
