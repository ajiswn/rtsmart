<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activities;
use Illuminate\Support\Facades\Storage;
use carbon\carbon;
use Session;

class ActivitiesController extends Controller
{

    // Halaman Utama Kegiatan
    public function index()
    {
        $activities = Activities::all();
        return view('ketua_rt.activities.index', compact('activities'));
    }

    //Ke Halaman Tambah Kegiatan
    public function create()
    {
        return view('ketua_rt.activities.create');
    }

    //Proses Input Kegiatan Baru
    public function store(Request $request)
    {
        // Mengambil dan membersihkan judul untuk dijadikan nama file
        $title = preg_replace('/[^A-Za-z0-9-_\.]/', '-', strtolower($request->title));
        if ($request->hasFile('image')) {
            $filename = $title . '.' . $request->file('image')->getClientOriginalExtension();
        }
        
        Activities::create([
            'title'         => $request->title,
            'image'         => $request->file('image')->storeAs('img\activities',$filename,'public'),
            'date'          => Carbon::now()->format('d F Y'),
            'category'      => $request->category,
            'content'       => $request->content,
        ]);

        return redirect('/manage/activities')->with('success','Kegiatan baru berhasil ditambahkan!');
    }

    //Mengirim data ke Edit Kegiatan
    public function edit(string $id)
    {
        $activities = Activities::findOrFail($id);
        return view('ketua_rt.activities.edit', compact('activities'));
    }

    public function update(Request $request, string $id)
    {
        $activities = Activities::findOrFail($id);
        $activities->title = $request->title;

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($activities->image) {
                Storage::delete($activities->image);
            }

            // Membersihkan judul untuk dijadikan nama file
            $title = preg_replace('/[^A-Za-z0-9-_\.]/', '-', strtolower($request->title));
            $filename = $title . '.' . $request->file('image')->getClientOriginalExtension();

            // Simpan gambar baru dengan nama sesuai judul
            $activities->image = $request->file('image')->storeAs('img\activities', $filename, 'public');
        }

        $activities->date = Carbon::now()->format('d F Y');
        $activities->category = $request->category;
        $activities->content = $request->content;

        $activities->save();

        return redirect('/manage/activities')->with('success', 'Kegiatan berhasil diedit!');
    }


    //Proses Hapus Kegiatan
    public function destroy(string $id)
    {
        $activities = Activities::findOrFail($id);
        //Hapus Gambar Artikel jika ada
        if ($activities->image) {
            Storage::delete($activities->image);
        }
        //Hapus Artikel
        $activities->delete();

        return redirect('/manage/activities')->with('success','Kegiatan berhasil dihapus!');
    }
}
