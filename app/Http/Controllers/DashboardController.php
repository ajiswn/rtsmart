<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KartuKeluarga;
use App\Models\Activities;
use App\Models\Warga;
use App\Models\SuratAhliWaris;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //Mengirim data ke Dasbor Admin
    public function dashboard()
    {
        $activities = Activities::all()->count();
        $warga = Warga::all()->count();
        $pengajuan = SuratAhliWaris::all()->count();

        $anggotakeluarga = Warga::where('no_kk', Auth::user()->no_kk)->count();
        $pengajuanperkeluarga = SuratAhliWaris::where('no_kk', Auth::user()->no_kk)->count();

        return view('ketua_rt.dashboard', compact('activities','warga','pengajuan','anggotakeluarga','pengajuanperkeluarga'));
    }
}
