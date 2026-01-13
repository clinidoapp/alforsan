<?php

namespace App\Http\Controllers\dashboard;

use App\Enums\AcademicTitle;
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
      //  dd($categories->links());
        $permissions = collect($categories->items())->map(function ($item) {
            return [
                'category' => $item->category,
                'permissions' => DB::table('permissions')
                    ->where('category', $item->category)
                    ->orderBy('name')
                    ->get(['id', 'name', 'slug']),
            ];
        });

/*

        dd($categories);
        $data = [
        'pagination' => [
        'current_page' => $categories->currentPage(),
        'last_page' => $categories->lastPage(),
        'per_page' => $categories->perPage(),
        'total' => $categories->total(),
            ]];
        dd($data);
*/

 //       return view('users.pages-permission', compact('permissions'));
    }
}
