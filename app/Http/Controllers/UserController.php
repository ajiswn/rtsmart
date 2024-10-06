<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\KartuKeluarga;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::join('kartu_keluarga', 'users.no_kk', '=', 'kartu_keluarga.no_kk')
            ->join('warga', 'kartu_keluarga.no_kk', '=', 'warga.no_kk')
            ->where('warga.peran', 'Kepala Keluarga')
            ->select('users.*', 'warga.nama as nama_kepala_keluarga')
            ->get();
        return view('ketua_rt.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kartu_keluarga = KartuKeluarga::join('warga', 'kartu_keluarga.no_kk', '=', 'warga.no_kk')
        ->where('warga.peran', 'Kepala Keluarga')
        ->whereNotIn('kartu_keluarga.no_kk', function($query) {
            $query->select('no_kk')->from('users');
            })
        ->select('kartu_keluarga.*', 'warga.nama as nama_kepala_keluarga')
        ->get();
        return view('ketua_rt.users.create',compact('kartu_keluarga'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        User::create([
            'no_kk'         => $request->no_kk,
            'password'      => Hash::make($request->password),
        ]);

        return redirect('/ketua_rt/manage/users')->with('success','Akun warga baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
