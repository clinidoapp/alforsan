<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RolesController extends Controller
{
    public function index()
    {

        $roles = DB::table('roles')
            ->select('id', 'name')
            ->orderBy('name')
            ->paginate(3);
        /*
        dd($roles);
        $data = collect($roles->items())->map(function ($role) {
            return [
                'id' => $role->id,
                'name' => $role->name,
                'permissions' => DB::table('role_permissions')
                    ->join('permissions', 'permissions.id', '=', 'role_permissions.permission_id')
                    ->where('role_permissions.role_id', $role->id)
                    ->orderBy('permissions.name')
                    ->get(['permissions.id', 'permissions.name', 'permissions.slug']),
            ];
        });
        $roles->item =

        dd($data);*/



        return view('users.pages-permission', compact('roles'));
    }


}
