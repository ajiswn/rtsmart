<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function _construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    // Menampilkan Halaman Login
    public function login()
    {
        return view('auth.login');
    }

    // Proses Autentikasi Login
    public function authenticate(Request $request) 
    {
        $credentials = $request->validate([
            'no_kk'     => 'required',
            'password'  => 'required'
        ]);

        $user = \App\Models\User::where('no_kk', $credentials['no_kk'])->first();

        // Periksa apakah user ditemukan dan statusnya "Aktif"
        if ($user && $user->status === 'Aktif') {
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('/dashboard');
            }
        }

        return back()->with('error', 'Username atau password salah atau status tidak aktif!');
    }


    //Proses Logout
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
