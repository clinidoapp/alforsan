<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PermissionService extends Controller
{
    public static function Permission(string $permission): bool
    {
        $userId = session('logged_user_id');
        return DB::table('permissions')
            ->join('role_permissions', 'permissions.id', '=', 'role_permissions.permission_id')
            ->join('user_role', 'role_permissions.role_id', '=', 'user_role.role_id')
            ->where('user_role.user_id', $userId)
            ->where('permissions.slug', $permission)
            ->exists();
    }

}
