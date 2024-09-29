<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activities;
use Carbon\Carbon;


class GuestController extends Controller
{
    //Mengirim data ke Halaman Beranda (Guest)
    public function index()
    {
        $activities = Activities::select('id','title','image','category','date')
                            ->orderBy('created_at','desc')
                            ->take(3)
                            ->get();
        return view('index',compact('activities'));
    }
    
    //Proses Hitung Kategori
    private function countCategory() {
        return [
            'sosial' => Activities::where('category', 'sosial')->count(),
            'keagamaan' => Activities::where('category', 'keagamaan')->count(),
            'olahraga' => Activities::where('category', 'olahraga')->count(),
            'lingkungan' => Activities::where('category', 'lingkungan')->count(),
            'pendidikan' => Activities::where('category', 'pendidikan')->count()
        ];
    }

    //Mengirim Data ke Halaman Kegiatan (Guest)
    public function activities()
    {
        $activities = activities::orderBy('updated_at','desc')->get();
        $count = $this->countCategory();
        return view('activities', compact('activities','count'));
    }  

    ////Mengirim Data ke Halaman Detail Kegiatan (Guest)
    public function activities_detail(string $id)
    {
        $activities_detail = Activities::find($id);
        $activities = Activities::orderBy('updated_at','desc')->get();
        $count = $this->countCategory();
        return view('activities_detail', compact('activities_detail','count','activities'));
    }

    //Mengirim Data ke Halaman Kategori Artikel (Guest)
    public function activities_category(string $var)
    {
        $category = Activities::where('category', $var)->get();
        $var = ucfirst($var);
        $activities = Activities::orderBy('updated_at','desc')->get();
        $count = $this->countCategory();

        return view('activities_category', compact('category','count','var','activities'));
    }
}
