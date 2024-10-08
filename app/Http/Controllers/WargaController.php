<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warga;
use App\Models\KartuKeluarga;
use App\Models\Pekerjaan;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class WargaController extends Controller
{
    public function index()
    {
        $warga = Warga::with('kartuKeluarga')->get();

        $warga->transform(function ($item) {
            $item->ttl = $item->tempat_lahir . ', ' . $item->tanggal_lahir;
            $item->alamat = $item->kartuKeluarga ? $item->kartuKeluarga->alamat : 'Alamat tidak tersedia';
            return $item;
        });

        return view('ketua_rt.warga.index', compact('warga'));
    }


    public function create()
    {
        $kartukeluarga = KartuKeluarga::leftJoin('warga', 'kartu_keluarga.no_kk', '=', 'warga.no_kk')
        ->select('kartu_keluarga.*','warga.nama as nama_kepala_keluarga')
        ->where('warga.peran', 'Kepala Keluarga')
        ->orWhereNull('warga.peran')
        ->get();
        $pekerjaan = Pekerjaan::all();

        return view('ketua_rt.warga.create',compact('kartukeluarga','pekerjaan'));
    }

    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $filename = $request->nik . '.' . $request->file('image')->getClientOriginalExtension();
            Warga::create(['image'=> $request->file('image')->storeAs('img\kartu_warga',$filename,'public'),]);
        }

        Warga::create([
            'no_kk'         => $request->no_kk,
            'nik'           => $request->nik,
            'nama'          => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir'  => $request->tempat_lahir,
            'tanggal_lahir' => Carbon::parse($request->tanggal_lahir)->format('d F Y'),
            'agama'         => $request->agama,
            'pekerjaan'     => $request->pekerjaan,
            'status_kawin'  => $request->status_kawin,
            'no_telp'       => $request->no_telp,
            'peran'         => $request->peran,
        ]);

        return redirect('/manage_data/warga')->with('success','Data warga baru berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $warga = Warga::findOrFail($id);
        $kartukeluarga = KartuKeluarga::leftJoin('warga', 'kartu_keluarga.no_kk', '=', 'warga.no_kk')
        ->select('kartu_keluarga.*', 'warga.nama as nama_kepala_keluarga')
        ->where('kartu_keluarga.no_kk', $warga->no_kk) // Menggunakan no_kk dari warga
        ->where('warga.peran', 'Kepala Keluarga')
        ->first();
        
        return view('ketua_rt.warga.show', compact('warga','kartukeluarga'));
    }

    public function edit(string $id)
    {
        $warga = Warga::findOrFail($id);
        $tglLahir = Carbon::createFromFormat('d F Y', $warga->tanggal_lahir)->format('Y-m-d');
        $warga->tanggal_lahir = $tglLahir;
        $pekerjaan = Pekerjaan::all();
        $kartukeluarga = KartuKeluarga::leftJoin('warga', 'kartu_keluarga.no_kk', '=', 'warga.no_kk')
        ->select('kartu_keluarga.*','warga.nama as nama_kepala_keluarga')
        ->where('warga.peran', 'Kepala Keluarga')
        ->orWhereNull('warga.peran')
        ->get();

        return view('ketua_rt.warga.edit', compact('warga','kartukeluarga','pekerjaan'));
    }

    public function update(Request $request, string $id)
    {
        $warga = Warga::findOrFail($id);
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($warga->image) {
                Storage::delete($warga->image);
            }

            $filename = $request->nik . '.' . $request->file('image')->getClientOriginalExtension();
            $warga->image = $request->file('image')->storeAs('img\kartu_warga', $filename, 'public');
        }

        $warga->no_kk           = $request->no_kk;
        $warga->nik             = $request->nik;
        $warga->nama            = $request->nama;
        $warga->jenis_kelamin   = $request->jenis_kelamin;
        $warga->tempat_lahir    = $request->tempat_lahir;
        $warga->tanggal_lahir   = Carbon::parse($request->tanggal_lahir)->format('d F Y');
        $warga->agama           = $request->agama;
        $warga->pekerjaan       = $request->pekerjaan;
        $warga->status_kawin    = $request->status_kawin;
        $warga->no_telp         = $request->no_telp;
        $warga->peran           = $request->peran;
        $warga->status          = $request->status;

        $warga->save();

        return redirect('/manage_data/warga')->with('success', 'Data Warga berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $warga = Warga::findOrFail($id);
        if ($warga->image) {
            Storage::delete($warga->image);
        }
        $warga->delete();

        return redirect('/manage_data/warga')->with('success','Data Warga berhasil dihapus!');
    }
}
