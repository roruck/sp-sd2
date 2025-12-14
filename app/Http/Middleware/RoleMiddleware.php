<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $role)
    {
        $user = $request->user();

        if (!$user || !$user->roles()->where('slug', $role)->exists()) {
            abort(403);
        }

        return $next($request);
    }
}
