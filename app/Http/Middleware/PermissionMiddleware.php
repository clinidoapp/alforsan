<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next , string $permission): Response
    {

        $userId = session('logged_user_id');
        if (!$userId) {
            return redirect('/login');
        }
        $hasPermission = DB::table('user_role')
            ->join('role_permission', 'user_role.role_id', '=', 'role_permission.role_id')
            ->join('permissions', 'role_permission.permission_id', '=', 'permissions.id')
            ->where('user_role.user_id', $userId)
            ->where('permissions.name', $permission)
            ->exists();

        if (!$hasPermission) {
            dd('Permission denied');
           // TODO
        }



        return $next($request);
    }
}
