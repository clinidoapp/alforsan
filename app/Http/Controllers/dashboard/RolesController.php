<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\Roles\StoreRoleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use function Laravel\Prompts\select;

class RolesController extends Controller
{
    public function listRoles(Request $request)
    {

        $roles = DB::table('roles')->
            select('id', 'name' , 'slug')
        ->get();

        $permissions = DB::table('permissions')
            ->join('permission_categories', 'permission_categories.id', '=', 'permissions.category_id')
            ->select(
                'permission_categories.id as category_id', 'permission_categories.name as category_name',
                'permissions.name as permission_name' , 'permissions.id' , 'permissions.slug as permission_slug'
            )->get();

        $permissions = $permissions
            ->groupBy('category_name')
            ->map(function ($items)  {
                return [
                    'category_id' => $items->first()->category_id,
                    'category_name' => $items->first()->category_name,
                    'permissions' => $items->map(function ($p) {
                        return [
                            'id' => $p->id,
                            'name' => $p->permission_name,
                            'slug' => $p->permission_slug,
                        ];
                    })->values()
                ];
            })->values();



        $rolePermissions = DB::table('roles')
            ->leftJoin('role_permissions', 'roles.id', '=', 'role_permissions.role_id')
            ->leftJoin('permissions', 'permissions.id', '=', 'role_permissions.permission_id')
            ->select(
                'roles.slug as role_slug',
                'permissions.slug as permission_slug'
            )
            ->get()
            ->groupBy('role_slug')
            ->map(function ($items) {
                return $items
                    ->pluck('permission_slug')
                    ->filter()
                    ->values()
                    ->toArray();
            })
            ->toArray();

        /*
             // dd($roles, $permissions , $rolePermissions );

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

        $roles = $query->paginate(10);*/

        return view('dashboard.pages.roles.list', compact('roles' , 'permissions' , 'rolePermissions'));
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
                        ];
                    })->values()
                ];
            })->values();

        $role = [
            'role_name' => $roleData->name,
            'permission_categories' => $grouped
        ];
        return view('dashboard.pages.roles.details', compact('role'));

    }
    public function addRole(Request $request){

       $permissions = DB::table('permissions')
           ->join('permission_categories', 'permission_categories.id', '=', 'permissions.category_id')
           ->select(
               'permission_categories.id as category_id', 'permission_categories.name as category_name',
               'permissions.name as permission_name' , 'permissions.id'
           )->get();

       $permissions = $permissions
           ->groupBy('category_name')
           ->map(function ($items)  {
               return [
                   'category_id' => $items->first()->category_id,
                   'category_name' => $items->first()->category_name,
                   'permissions' => $items->map(function ($p) {
                       return [
                           'id' => $p->id,
                           'name' => $p->permission_name,
                       ];
                   })->values()
               ];
           })->values();
       return view('dashboard.pages.roles.add', compact('permissions'));
   }
    public function storeRole(StoreRoleRequest $request){

        $data = $request->validated();
        DB::transaction(function () use ( $data ) {

            $existing = DB::table('role_permissions')
                ->get()
                ->groupBy('role_id')
                ->map(fn ($items) => $items->pluck('permission_id')->toArray());

            foreach ($data as $roleId => $newPermissionIds) {
                $newPermissionIds = array_map('intval', $newPermissionIds);
                $oldPermissionIds = $existing[$roleId] ?? [];

                $toInsert = array_diff($newPermissionIds, $oldPermissionIds);
                $toDelete = array_diff($oldPermissionIds, $newPermissionIds);

                if ($toDelete) {
                    DB::table('role_permissions')
                        ->where('role_id', $roleId)
                        ->whereIn('permission_id', $toDelete)
                        ->delete();
                }
                if ($toInsert) {
                    DB::table('role_permissions')->insert(
                        collect($toInsert)->map(fn ($pid) => [
                            'role_id'       => $roleId,
                            'permission_id' => $pid,
                            'created_at'    => now(),
                        ])->toArray()
                    );
                }
            }

                //////////////////////////////
           /* $baseSlug = Str::slug($data['name']);
            if (!$id) {
                $roleId = DB::table('roles')->insertGetId([
                    'name' => $data['name'],
                    'slug' => $baseSlug,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }else {
                DB::table('roles')->where('id', $id)->update([
                    'name' => $data['name'],
                    'slug' => $baseSlug,
                    'updated_at' => now(),
                ]);
                DB::table('role_permissions')->where('role_id', $id)->delete();
                $roleId = $id;
            }
            $rows = array_map(function ($permissionId) use ($roleId) {
                return [
                    'role_id' => $roleId,
                    'permission_id' => $permissionId,
                    'created_at' => now(),
                ];
            }, $data['permissions_ids']);
            DB::table('role_permissions')->insert($rows);*/
        });
        return redirect()->route('roles-list');
   }
    public function editRole(Request $request,$id){

       $roleData = DB::table('roles')->where('id', $id)->
       select('name', 'id')->first();

       $selected_permissions_ids = DB::table('role_permissions')->where('role_id', $id)->pluck('permission_id')->toArray();
       $permissions = DB::table('permissions')
           ->join('permission_categories', 'permission_categories.id', '=', 'permissions.category_id')
           ->select(
               'permission_categories.id as category_id', 'permission_categories.name as category_name',
               'permissions.name as permission_name' , 'permissions.id'
           )->get();

       $permissions = $permissions
           ->groupBy('category_name')
           ->map(function ($items) use ($selected_permissions_ids)  {
               $totalPermissions   = $items->count();
               $selectedPermissions = $items->whereIn('id', $selected_permissions_ids)->count();

              // dd($items , $totalPermissions , $selectedPermissions);
               return [
                   'category_id' => $items->first()->category_id,
                   'category_name' => $items->first()->category_name,
                   'category_is_checked' => $totalPermissions === $selectedPermissions,
                   'permissions' => $items->map(function ($p) use ($selected_permissions_ids) {
                       return [
                           'id' => $p->id,
                           'name' => $p->permission_name,
                           'is_checked' => in_array($p->id, $selected_permissions_ids),
                       ];
                   })->values()
               ];
           })->values();
    return view('dashboard.pages.roles.edit', compact('roleData', 'permissions'));
    }

}
