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
            return view('dashboard.pages.home');

        }

        return back()->withErrors([
            'password' => 'Incorrect password',
        ])->withInput();

    }
    public function logout(){
        dd('here');
    }






}
