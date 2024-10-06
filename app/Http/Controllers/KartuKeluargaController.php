<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KartuKeluarga;
use Illuminate\Support\Facades\Storage;

class KartuKeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $kartukeluarga = KartuKeluarga::leftJoin('warga', 'kartu_keluarga.no_kk', '=', 'warga.no_kk')
        ->select('kartu_keluarga.*','warga.nama as nama_kepala_keluarga')
        ->where('warga.peran', 'Kepala Keluarga')
        ->orWhereNull('warga.peran')
        ->get();

    return view('ketua_rt.kartu_keluarga.index', compact('kartukeluarga'));
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ketua_rt.kartu_keluarga.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $filename = $request->no_kk . '.' . $request->file('image')->getClientOriginalExtension();

        KartuKeluarga::create([
            'no_kk' => $request->no_kk,
            'alamat'=> $request->alamat,
            'image' => $request->file('image')->storeAs('img\kartu_keluarga',$filename,'public'),
        ]);

        return redirect('/ketua_rt/manage/kartukeluarga')->with('success','Kartu Keluarga baru berhasil ditambahkan!');
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
    public function edit(int $id)
    {
        $kartukeluarga = KartuKeluarga::findOrFail($id);
        return view('ketua_rt.kartu_keluarga.edit', compact('kartukeluarga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kartukeluarga = KartuKeluarga::findOrFail($id);

        $kartukeluarga->no_kk  = $request->no_kk;
        $kartukeluarga->alamat = $request->alamat;
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($kartukeluarga->image) {
                Storage::delete($kartukeluarga->image);
            }
            $filename = $request->no_kk . '.' . $request->file('image')->getClientOriginalExtension();

            // Simpan gambar baru dengan nama sesuai judul
            $kartukeluarga->image = $request->file('image')->storeAs('img\kartu_keluarga', $filename, 'public');
        }
        $kartukeluarga->save();

        return redirect('/ketua_rt/manage/kartukeluarga')->with('success', 'Kartu Keluarga berhasil diedit!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kartukeluarga = KartuKeluarga::findOrFail($id);
        //Hapus Gambar KK jika ada
        if ($kartukeluarga->image) {
            Storage::delete($kartukeluarga->image);
        }
        //Hapus KK
        $kartukeluarga->delete();

        return redirect('/ketua_rt/manage/kartukeluarga')->with('success','Kartu Keluarga berhasil dihapus!');
    }

    public function aktifkan(string $id)
    {
        KartuKeluarga::find($id)->update([
            'status' => "Aktif"
        ]);
        return redirect('/ketua_rt/manage/kartukeluarga')->with('success','Kartau Keluarga telah diaktifkan!');
    }

    public function nonaktifkan(string $id)
    {
        KartuKeluarga::find($id)->update([
            'status' => "Nonaktif"
        ]);
        return redirect('/ketua_rt/manage/kartukeluarga')->with('success','Kartau Keluarga telah dinonaktifkan!');
    }
}
