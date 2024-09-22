<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;

class PendaftaranController extends Controller
{
    //Menampilkan Halaman Pendaftaran (Admin)
    public function index()
    {
        $pendaftaran = Pendaftaran::all();
        return view('admin.pendaftaran', compact('pendaftaran'));
    }

    //Menampilkan Halaman Detail Pendaftar (Admin)
    public function show(string $id)
    {
        $pendaftar = Pendaftaran::findOrFail($id);
        return view('admin.detail_pendaftaran', compact('pendaftar'));
    }

    //Proses ubah status pendaftar menjadi diterima
    public function diterima(string $id)
    {
        Pendaftaran::find($id)->update([
            'status' => "Diterima"
        ]);

        return redirect('pendaftaran')->with('success','Pendaftar telah diterima!');
    }

    //Proses ubah status pendaftar menjadi ditolak
    public function ditolak(string $id)
    {
        Pendaftaran::find($id)->update([
            'status' => "Ditolak"
        ]);
        
        return redirect('pendaftaran')->with('success','Pendaftar telah ditolak!');
    }
}
