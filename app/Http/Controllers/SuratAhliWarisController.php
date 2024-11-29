<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratAhliWaris;
use App\Models\Warga;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use PDF;

class SuratAhliWarisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->role === 'ketua_rt') {
            $suratAhliWaris = SuratAhliWaris::orderBy('updated_at', 'desc')->get();
        } elseif (auth()->user()->role === 'warga') {
            $suratAhliWaris = SuratAhliWaris::where('no_kk', auth()->user()->no_kk)->orderBy('updated_at','desc')->get();
        } else {
            abort(403, 'Unauthorized action.');
        }
        
        return view('ketua_rt.surat.index', compact('suratAhliWaris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $warga = Warga::select('nik','nama')
        ->where('no_kk', Auth::user()->no_kk)
        ->get();
        return view('ketua_rt.surat.create',compact('warga'));
    }

    public function generateNomorSurat()
    {
        $setting = Setting::select('rt', 'rw')->where('id', 1)->first();
        $lastId = SuratAhliWaris::max('id');
        $nextId = $lastId ? $lastId + 1 : 1;
        $nomorUrut = str_pad($nextId, 3, '0', STR_PAD_LEFT);
        $tahun = date('Y');
        $no_surat = "{$nomorUrut}/RT.{$setting->rt}/RW.{$setting->rw}/{$tahun}";
        return $no_surat;
    }


    public function store(Request $request)
    {
        
        $filePaths = [];
        if ($request->hasFile('ktp_ahli_waris')) {
            $filePaths['ktp_ahli_waris'] = 'storage/' . $request->file('ktp_ahli_waris')->store('img/surat_ahli_waris', 'public');
        }
    
        if ($request->hasFile('ktp_pewaris')) {
            $filePaths['ktp_pewaris'] = 'storage/' . $request->file('ktp_pewaris')->store('img/surat_ahli_waris', 'public');
        }
    
        if ($request->hasFile('kk')) {
            $filePaths['kk'] = 'storage/' . $request->file('kk')->store('img/surat_ahli_waris', 'public');
        }
    
        if ($request->hasFile('akta_kematian')) {
            $filePaths['akta_kematian'] = 'storage/' . $request->file('akta_kematian')->store('img/surat_ahli_waris', 'public');
        }

        $no_surat = $this->generateNomorSurat();
    
        // Simpan data ke dalam tabel surat_ahli_waris
        SuratAhliWaris::create([
            'no_surat'        => $no_surat,
            'no_kk'           => Auth::user()->no_kk,  
            'nik_ahli_waris'  => $request->nik_ahli_waris,
            'nik_pewaris'     => $request->nik_pewaris,
            'hubungan_pewaris'=> $request->hubungan_pewaris,
            'ktp_ahli_waris'  => $filePaths['ktp_ahli_waris'] ?? null,
            'ktp_pewaris'     => $filePaths['ktp_pewaris'] ?? null,
            'kk'              => $filePaths['kk'] ?? null,
            'akta_kematian'   => $filePaths['akta_kematian'] ?? null,
            'tujuan'          => $request->tujuan,
        ]);
    
        return redirect('/surat_ahli_waris')->with('success', 'Pengajuan surat berhasil ditambahkan!');
    }
    


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $surat = SuratAhliWaris::findOrFail($id);
        return view('ketua_rt.surat.show', compact('surat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Ambil data surat berdasarkan ID
        $surat = SuratAhliWaris::findOrFail($id);

        // Ambil data warga (untuk dropdown)
        $warga = Warga::all(); // Ganti dengan query sesuai struktur database

        // Kirim data ke view
        return view('ketua_rt.surat.edit_surat', compact('surat', 'warga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $request->validate([
            'nik_ahli_waris' => 'required',
            'nik_pewaris' => 'required',
            'hubungan_pewaris' => 'required|string|max:255',
            'tujuan' => 'required|string|max:255',
            'ktp_ahli_waris' => 'nullable|file|mimes:jpeg,png,pdf|max:2048',
            'ktp_pewaris' => 'nullable|file|mimes:jpeg,png,pdf|max:2048',
            'kk' => 'nullable|file|mimes:jpeg,png,pdf|max:2048',
            'akta_kematian' => 'nullable|file|mimes:jpeg,png,pdf|max:2048',
        ]);

        // Ambil data surat berdasarkan ID
        $surat = SuratAhliWaris::findOrFail($id);

        // Update data
        $surat->update([
            'nik_ahli_waris' => $request->nik_ahli_waris,
            'nik_pewaris' => $request->nik_pewaris,
            'hubungan_pewaris' => $request->hubungan_pewaris,
            'tujuan' => $request->tujuan,
            'status' => "Diproses",
        ]);

        // Upload file jika ada
        if ($request->hasFile('ktp_ahli_waris')) {
            $surat->ktp_ahli_waris = $request->file('ktp_ahli_waris')->store('ktp_ahli_waris');
        }
        if ($request->hasFile('ktp_pewaris')) {
            $surat->ktp_pewaris = $request->file('ktp_pewaris')->store('ktp_pewaris');
        }
        if ($request->hasFile('kk')) {
            $surat->kk = $request->file('kk')->store('kk');
        }
        if ($request->hasFile('akta_kematian')) {
            $surat->akta_kematian = $request->file('akta_kematian')->store('akta_kematian');
        }

        // Simpan perubahan
        $surat->save();

        // Redirect kembali ke halaman edit dengan pesan sukses
        return redirect('/surat_ahli_waris')->with('success', 'Pengajuan surat berhasil diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $suratAhliWaris = SuratAhliWaris::findOrFail($id);
        //Hapus Gambar jika ada
        if ($suratAhliWaris->ktp_ahli_waris) {
            Storage::delete($suratAhliWaris->ktp_ahli_waris);
        }
        if ($suratAhliWaris->ktp_pewaris) {
            Storage::delete($suratAhliWaris->ktp_pewaris);
        }
        if ($suratAhliWaris->kk) {
            Storage::delete($suratAhliWaris->kk);
        }
        if ($suratAhliWaris->akta_kematian) {
            Storage::delete($suratAhliWaris->akta_kematian);
        }
        //Hapus Artikel
        $suratAhliWaris->delete();

        return redirect('/manage/submission_letter')->with('success','Kegiatan berhasil dihapus!');
    }

    public function diterima(string $id)
    {
        SuratAhliWaris::find($id)->update([
            'status' => "Disetujui"
        ]);

        return redirect('manage/submission_letter')->with('success','Surat telah disetujui!');
    }

    //Proses ubah status pendaftar menjadi ditolak
    public function ditolak(string $id)
    {
        SuratAhliWaris::find($id)->update([
            'status' => "Ditolak"
        ]);
        
        return redirect('manage/submission_letter')->with('success','Surat telah ditolak!');
    }

    public function print(string $id)
    {
        $surat = SuratAhliWaris::find($id);

        if (!$surat) {
            abort(404, 'Surat tidak ditemukan.');
        }

        // Modifikasi nilai ttl_ahli_waris dan ttl_pewaris secara langsung
        $surat->ttl_ahli_waris = $surat->warga->tempat_lahir . ', ' . $surat->warga->tanggal_lahir;
        $surat->ttl_pewaris = $surat->wargaku->tempat_lahir . ', ' . $surat->wargaku->tanggal_lahir;

        $setting = Setting::findOrFail(1);
        
        if ($surat->status === 'Disetujui') {
            return view('ketua_rt.surat.print', compact('surat', 'setting'));
        }
    }

}
