@extends('component.admin_layout')

@section('title', 'Setting - RTSmart')

@section('body')
    <div class="pagetitle">
        <h1>Setting</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Beranda</li>
                <li class="breadcrumb-item active">Setting</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <section class="section profile">
        <div class="row">
          <div class="col-xl-8">
  
            <div class="card">
              <div class="card-body pt-3">
               <!-- Profile Edit Form -->
               <form action="{{route('setting.update',1)}}" method="POST" enctype="multipart/form-data">
                @csrf @method('put')
                <div class="row mb-3">
                  <label for="logo" class="col-md-4 col-lg-3 col-form-label">Logo</label>
                  <div class="col-md-8 col-lg-9">
                    @if ($setting->logo)
                    <img src="{{$setting->logo}}" alt="Logo" height="100">
                    @else
                    <img src="assets/img/setting/blank.png" alt="Logo" height="100">
                    @endif
                    <div class="pt-2">
                        <input type="file" class="form-control" name="logo"> 
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="kab_kota" class="col-md-4 col-lg-3 col-form-label">Kabupataen/Kota</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="kab_kota" type="text" class="form-control" id="kab_kota" value="{{ $setting->kab_kota }}">
                  </div>
                </div>

                <div class="row mb-3">
                    <label for="kecamatan" class="col-md-4 col-lg-3 col-form-label">Kecamatan</label>
                    <div class="col-md-8 col-lg-9">
                        <input name="kecamatan" type="text" class="form-control" id="kecamatan" value="{{ $setting->kecamatan }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="desa_kelurahan" class="col-md-4 col-lg-3 col-form-label">Desa/Kelurahan</label>
                    <div class="col-md-8 col-lg-9">
                        <input name="desa_kelurahan" type="text" class="form-control" id="desa_kelurahan" value="{{ $setting->desa_kelurahan }}">
                    </div>
                </div>   
                
                <div class="row mb-3">
                    <label for="rt" class="col-md-4 col-lg-3 col-form-label">RT</label>
                    <div class="col-md-8 col-lg-9">
                        <input name="rt" type="text" class="form-control" id="rt" value="{{ $setting->rt }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="rw" class="col-md-4 col-lg-3 col-form-label">RW</label>
                    <div class="col-md-8 col-lg-9">
                        <input name="rw" type="text" class="form-control" id="rw" value="{{ $setting->rw }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="alamat" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                    <div class="col-md-8 col-lg-9">
                        <input name="alamat" type="text" class="form-control" id="alamat" value="{{ $setting->alamat }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="website" class="col-md-4 col-lg-3 col-form-label">Website</label>
                    <div class="col-md-8 col-lg-9">
                        <input name="website" type="text" class="form-control" id="website" value="{{ $setting->website }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="tanda_tangan" class="col-md-4 col-lg-3 col-form-label">Tanda Tangan</label>
                    <div class="col-md-8 col-lg-9">
                        @if ($setting->tanda_tangan)
                        <img src="{{ $setting->tanda_tangan }}" alt="Tanda Tangan" height="100">
                        @else
                        <img src="assets/img/setting/blank.png" alt="Tanda Tangan" height="100">
                        @endif
                      <div class="pt-2">
                          <input type="file" class="form-control" name="tanda_tangan"> 
                      </div>
                    </div>
                  </div>

                <div class="text-center">
                    <a href="{{ url()->previous() }}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Kembali</a>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form><!-- End Profile Edit Form -->
  
              </div>
            </div>
  
          </div>
        </div>
      </section>

    
@endsection