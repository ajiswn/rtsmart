<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function _construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    // Menampilkan Halaman Login
    public function login()
    {
        return view('/login');
    }

    //Proses Autenfikasi Login
    public function login_action(Request $request) 
    {
        $request->validate([
            'username'=> 'required',
            'password'=> 'required'
        ]);

        $credentials = $request->only('username', 'password');

        if(Auth::attempt($credentials)) {
            
            $user = Auth::user();

            //Redirect berdasarkan Role
            
            if ($user->role == 'ketua_rt') {
                return redirect()->route('dashboard.ketua_rt');
            } elseif ($user->role == 'warga') {
                return redirect()->route('dashboard.warga');
            }
        }
        return back()->with('error','Username atau password salah!');
    }

    //Proses Logout
    public function logout(Request $request) {
        Auth::logout();
        return redirect('/');
    }
}
