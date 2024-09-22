<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use Illuminate\Support\Facades\Storage;
use carbon\carbon;
use Session;

class ArtikelController extends Controller
{

    // Halaman Utama Artikel
    public function index()
    {
        $artikel = Artikel::all();
        return view('admin.artikel', compact('artikel'));
    }

    //Ke Halaman Tambah Artikel
    public function create()
    {
        return view('admin.tambah_artikel');
    }

    //Proses Input Artikel Baru
    public function store(Request $request)
    {
        // Mengambil dan membersihkan judul untuk dijadikan nama file
        $judul = preg_replace('/[^A-Za-z0-9-_\.]/', '-', strtolower($request->judul));
        $filename = $judul . '.' . $request->file('gambar')->getClientOriginalExtension();

        Artikel::create([
            'judul'         => $request->judul,
            'gambar'        => $request->file('gambar')->storeAs('gambar-artikel',$filename,'public'),
            'tanggal'       => Carbon::now()->format('d F Y'),
            'kategori'      => $request->kategori,
            'konten'        => $request->konten,
        ]);

        return redirect('artikel')->with('success','Kegiatan baru berhasil ditambahkan!');
    }

    //Mengirim data ke Edit Artikel
    public function edit(string $id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('admin.edit_artikel', compact('artikel'));
    }

    public function update(Request $request, string $id)
    {
        $artikel = Artikel::findOrFail($id);
        $artikel->judul = $request->judul;

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($artikel->gambar) {
                Storage::delete($artikel->gambar);
            }

            // Membersihkan judul untuk dijadikan nama file
            $judul = preg_replace('/[^A-Za-z0-9-_\.]/', '-', strtolower($request->judul));
            $filename = $judul . '.' . $request->file('gambar')->getClientOriginalExtension();

            // Simpan gambar baru dengan nama sesuai judul
            $artikel->gambar = $request->file('gambar')->storeAs('gambar-artikel', $filename, 'public');
        }

        $artikel->tanggal = Carbon::now()->format('d F Y');
        $artikel->kategori = $request->kategori;
        $artikel->konten = $request->konten;

        $artikel->save();

        return redirect('artikel')->with('success', 'Kegiatan berhasil diedit!');
    }


    //Proses Hapus Artikel
    public function destroy(string $id)
    {
        $artikel = Artikel::findOrFail($id);
        //Hapus Gambar Artikel jika ada
        if ($artikel->image) {
            Storage::delete($artikel->gambar);
        }
        //Hapus Artikel
        $artikel->delete();

        return redirect('artikel')->with('success','Kegiatan berhasil dihapus!');
    }
}
