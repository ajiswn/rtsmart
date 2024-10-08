<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratAhliWaris;
use App\Models\Warga;
use App\Models\Setting;
use Carbon\Carbon;
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
            $suratAhliWaris = SuratAhliWaris::all();
        } elseif (auth()->user()->role === 'warga') {
            $suratAhliWaris = SuratAhliWaris::where('no_kk', auth()->user()->no_kk)->get();
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
        $jumlahSurat = SuratAhliWaris::count() + 1;
        $nomorUrut = str_pad($jumlahSurat, 3, '0', STR_PAD_LEFT);
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
