<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KartuKeluarga;
use App\Models\Activities;
use App\Models\Warga;

class DashboardController extends Controller
{
    //Mengirim data ke Dasbor Admin
    public function dashboard()
    {
        $activities = Activities::all()->count();
        $warga = Warga::all()->count();
        // $anggota = Pendaftaran::where('status','Diterima')->count();

        return view('ketua_rt.dashboard', compact('activities','warga'));
    }
}
