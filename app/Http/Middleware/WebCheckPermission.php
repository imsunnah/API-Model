<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class WebCheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $permission)
    {
        $user = Auth::user();
        var_dump($user);exit;

        // Check if the user is authenticated
        // var_dump($user);exit;
        if (!$user) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        // Check if the user has the required permission
        if (!$user->hasPermissionTo($permission)) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
