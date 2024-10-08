<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = Setting::findOrFail(1);

        return view('ketua_rt.setting',compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $setting = Setting::findOrFail($id);

        if ($request->hasFile('logo')) {
            if ($setting->logo) {
                Storage::delete($setting->logo);
            }
            $filename = 'logo.'. $request->file('logo')->getClientOriginalExtension();
            $setting->logo = 'storage/'.$request->file('logo')->storeAs('img\setting', $filename, 'public');
        }

        if ($request->hasFile('tanda_tangan')) {
            if ($setting->tanda_tangan) {
                Storage::delete($setting->tanda_tangan);
            }
            $filename = 'tanda_tangan.'. $request->file('tanda_tangan')->getClientOriginalExtension();
            $setting->tanda_tangan = 'storage/'.$request->file('tanda_tangan')->storeAs('img\setting', $filename, 'public');
        }

        $setting->kab_kota = $request->kab_kota;
        $setting->kecamatan = $request->kecamatan;
        $setting->desa_kelurahan = $request->desa_kelurahan;
        $setting->rt = $request->rt;
        $setting->rw = $request->rw;
        $setting->alamat = $request->alamat;
        $setting->website = $request->website;

        $setting->save();

        return redirect('/setting')->with('success', 'Setting berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
