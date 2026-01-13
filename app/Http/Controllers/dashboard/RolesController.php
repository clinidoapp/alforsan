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
            ->select('id', 'name')
            ->orderBy('name');

        if ($request->filled('role_name')) {
            $query->where('name', 'like', '%' . $request->role_name . '%');
        }

        $roles = $query->paginate(10);

        return view('users.pages-permission', compact('roles'));
    }


}
