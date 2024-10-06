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
    public function authenticate(Request $request) 
    {
        $credentials = $request->validate([
            'no_kk'     => 'required',
            'password'  => 'required'
        ]);


        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/ketua_rt/dashboard');
        }

        return back()->with('error','Username atau password salah!');
    }

    //Proses Logout
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
