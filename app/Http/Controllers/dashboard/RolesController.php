<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RolesController extends Controller
{
    public function listRoles(Request $request)
    {
        $query = DB::table('roles')
            ->leftJoin('user_role', 'roles.id', '=', 'user_role.role_id')

            ->select('roles.id', 'roles.name' ,
                DB::raw('COUNT(DISTINCT user_role.user_id) as users_count')
            )
            ->groupBy('roles.id', 'roles.name')
            ->orderBy('roles.name');

        if ($request->filled('role_name')) {
            $query->where('roles.name', 'like', '%' . $request->role_name . '%');
        }
        if ($request->filled('role_id')) {
            $query->where('roles.id', $request->role_id);
        }

        $roles = $query->paginate(10);

        return view('users.pages-permission', compact('roles'));
    }


}
