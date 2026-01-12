<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(){
        return view('dashboard.pages.login');
    }
    public function login(Request $request)
    {
        $data = $request->validate([
                'email'    => 'required|email',
                'password' => 'required|string',
        ]);
       // dd($data);

        $user = DB::table('users')
            ->where('email', $data['email'])
            ->first();
        if (!$user) {
            return back()->withErrors([
                'email' => 'Email does not exist',
            ])->withInput();
        }

        if ($user && Hash::check($data['password'], $user->password)) {

            $request->session()->regenerate();
            session([
                'logged_user' => $user,
                'logged_user_id' => $user->id,

            ]);
            return redirect('admin/dashboard');

        }

        return back()->withErrors([
            'password' => 'Incorrect password',
        ])->withInput();

    }
    public function logout(Request $request){
        $request->session()->forget('logged_user');
        $request->session()->forget('logged_user_id');
        return redirect('admin/login');

    }
    public function listAdmins(Request $request){

        $query = DB::table('users')
            ->join('user_role', 'users.id', '=', 'user_role.user_id')
            ->join('roles', 'user_role.role_id', '=', 'roles.id')
            ->select(
            'users.id',
            'users.name',
            'users.email',
            'roles.name as role_name');

        if ($request->filled('admin_id')) {
            $query->where('users.id', $request->admin_id);
        }
        if ($request->filled('admin_name')) {
            $query->where('users.name', 'like', '%' . $request->admin_name . '%');
        }
        $admins = $query->paginate(10);
        return view('dashboard.pages.listAdmins', compact('admins'));
    }


}
