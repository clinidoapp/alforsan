<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\Admins\StoreAdminRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use function Laravel\Prompts\select;

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

        $user = DB::table('users')
            ->where('email', $data['email'])->where('is_deleted', 0)
            ->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'Email does not exist',
            ])->withInput();
        }

        if ($user && Hash::check($data['password'], $user->password)) {

            if ($user->status == 0) {
                return back()->withErrors([
                    'activate' => 'Your account does not Activated',
                ])->withInput();

            }
            $request->session()->regenerate();
            session([
                'logged_user' => $user,
                'logged_user_id' => $user->id,

            ]);

            return redirect()->route('dashboard');

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
            ->where('is_deleted', 0)->whereNull('deleted_at')
            ->join('user_role', 'users.id', '=', 'user_role.user_id')
            ->join('roles', 'user_role.role_id', '=', 'roles.id')
            ->select(
            'users.id',
            'users.status',
            'users.is_deleted',
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
        return view('dashboard.pages.admins', compact('admins'));
    }
    public function addAdmin(Request $request)
    {
        $roles = DB::table('roles')->select('id' , 'name')->get();
        return view('dashboard.pages.addAdmin' , compact('roles'));
    }
    public function createOrEditAdmin(StoreAdminRequest $request , $id = null)
    {

        $data = $request->validated();

        DB::beginTransaction();


        if ($id) {
            DB::table('users')
                ->where('id', $id)
                ->update([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => !empty($data['password'])
                        ? Hash::make($data['password'])
                        : DB::raw('password'),
                ]);
            DB::table('user_role')
                ->where('user_id', $id)
                ->update([
                    'role_id' => $data['role_id'],
                ]);
        }else {
            $admin_id = DB::table('users')->insertGetId([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            DB::table('user_role')->insert([
                'user_id' => $admin_id,
                'role_id' => $data['role_id'],
            ]);
        }

        DB::commit();
        return redirect()->route('admin-list');
    }
    public function editAdmin(Request $request , $id)
    {
        $admin = DB::table('users')->where('users.id', $id)
            ->join('user_role', 'users.id', '=', 'user_role.user_id')
            ->select('users.id',
                'users.name',
                'users.email',
                'user_role.role_id')
            ->first();
        $roles = DB::table('roles')->select('id' , 'name')->get();
        return view('dashboard.pages.updateAdmins' , compact('roles'));
    }
    public function toggleAdminStatus(Request $request,$id)
    {

        $admin = DB::table('users')->where('id', $id);
        $currentStatus = $admin->value('status');
        $newStatus = $currentStatus == 1 ? 0 : 1;
        $admin->update(['status' => $newStatus]);
        return redirect()->route('admin-list');
    }
    public function deleteAdmin(Request $request,$id)
    {

        DB::table('users')
            ->where('id', $id)
            ->update([
                'is_deleted' => 1,
                'deleted_at' => Carbon::now(),
            ]);
        return redirect()->route('admin.admins');

    }



}
