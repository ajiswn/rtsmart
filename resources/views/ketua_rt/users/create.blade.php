@extends('component.admin_layout')

@section('title', 'Tambah Akun Warga - RTSmart')

@section('body')
<div class="pagetitle">
  <h1>Tambah Akun Warga</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Beranda</li>
      <li class="breadcrumb-item">Akun Warga</li>
      <li class="breadcrumb-item active">Tambah Akun Warga</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Formulir Tambah Akun Warga</h5>

          <!-- Vertical Form -->
          <form class="row g-3" action="{{route('users.store')}}" method="POST">
            @csrf
            <div class="col-12">
              <label class="col-form-label" for>Kepala Keluarga</label>
              <select name="no_kk" class="form-select">
                <option selected hidden>-Pilih Kepala Keluarga-</option>
                @foreach ($kartu_keluarga as $item)
                  <option value="{{$item->no_kk}}">{{$item->no_kk}} - {{$item->nama_kepala_keluarga}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-12">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="password">
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
              <button type="reset" class="btn btn-secondary"> <i class="bi bi-arrow-counterclockwise"></i> Reset</button>
            </div>
            <div class="col-12">
              <a href="{{ url()->previous() }}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Kembali</a>
            </div>
          </form>
          <!-- Vertical Form -->
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
