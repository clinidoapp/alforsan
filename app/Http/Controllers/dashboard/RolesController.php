<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\select;

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

        return view('users.pages-role', compact('roles'));
    }

    public function roleDetails(Request $request ,  $id){
        $roleData = DB::table('roles')->where('id', $id)->
            select('name')->first();
        $permissions_ids = DB::table('role_permissions')->where('role_id', $id)->pluck('permission_id')->toArray();
        $permissions = DB::table('permissions')
            ->whereIn('permissions.id', $permissions_ids)
            ->join('permission_categories', 'permission_categories.id', '=', 'permissions.category_id')
            ->select(
                'permission_categories.id as category_id', 'permission_categories.name as category_name',
                'permissions.name as permission_name' , 'permissions.id'
            )->get();
        $grouped = $permissions
            ->groupBy('category_name')
            ->map(function ($items) use ($permissions_ids) {
                return [
                    'category_id' => $items->first()->category_id,
                    'category_name' => $items->first()->category_name,
                    'permissions' => $items->map(function ($p) use ($permissions_ids) {
                        return [
                            'id' => $p->id,
                            'name' => $p->permission_name,
                            //'checked' => in_array($p->id, $permissions_ids),
                        ];
                    })->values()
                ];
            })->values();

        $role = [
            'role_name' => $roleData->name,
            'permission_categories' => $grouped
        ];
        return view('users.pages-role-details', compact('role'));


    }

  //  public function addRole(Request $request)


}
