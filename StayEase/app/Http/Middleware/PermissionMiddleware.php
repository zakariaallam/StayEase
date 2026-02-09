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
        if(Auth::check()){
            abort(401);
        }
        if(Auth::user()->role?->role !== 'admin'){
            abort(403);
        }
        return $next($request);
    }
}