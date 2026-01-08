<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermissionsController extends Controller
{
    public function index()
    {
        $categories = DB::table('permissions')
            ->select('category')
            ->distinct()
            ->orderBy('category')
            ->paginate(3);
        $permissions = collect($categories->items())->map(function ($item) {
            return [
                'category' => $item->category,
                'permissions' => DB::table('permissions')
                    ->where('category', $item->category)
                    ->orderBy('name')
                    ->get(['id', 'name', 'slug']),
            ];
        });

        return view('users.pages-permission', compact('permissions'));
    }
}
