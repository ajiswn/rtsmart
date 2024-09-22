@extends('component.admin_layout')

@section('title', 'Detail Pendaftar Admin - GoGreen')

@section('body')
<div class="pagetitle">
  <h1>Detail Pendaftar</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Beranda</li>
      <li class="breadcrumb-item">Pendaftaran</li>
      <li class="breadcrumb-item active">Detail Pendaftar</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          {{-- <h5 class="card-title">Data Pendaftar</h5> --}}

          <!-- Vertical Form -->
          <form class="row g-3 mt-2">
            <div class="col-12">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" name="nama" class="form-control" id="nama" disabled value="{{ $pendaftar->nama }}">
            </div>
            <div class="col-12">
              <label for="nim" class="form-label">NIM</label>
              <input type="text" name="nim" class="form-control" id="nim" disabled value="{{ $pendaftar->nim }}">
            </div>
            <div class="col-12">
              <label for="prodi" class="form-label">Prodi</label>
              <input type="text" name="prodi" class="form-control" id="prodi" disabled value="{{ $pendaftar->prodi }}">
            </div>
            <div class="col-12">
              <label for="fakultas" class="form-label">Fakultas</label>
              <input type="text" name="fakultas" class="form-control" id="fakultas" disabled value="{{ $pendaftar->fakultas }}">
            </div>
            <div class="col-12">
              <label for="tempat_lahir" class="form-label">Tempat_lahir</label>
              <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" disabled value="{{ $pendaftar->tempat_lahir }}">
            </div>
            <div class="col-12">
              <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
              <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" disabled value="{{ $pendaftar->tgl_lahir }}">
            </div>
          </form>
          <!-- Vertical Form -->
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <form class="row g-3 mt-2">
            <div class="col-12 mt-3">
              <label for="angkatan" class="form-label">Angkatan</label>
              <input type="text" name="angkatan" class="form-control" id="angkatan" disabled value="{{ $pendaftar->angkatan }}">
            </div>
            <div class="col-12">
              <label for="email" class="form-label">Email</label>
              <input type="email" name="email" class="form-control" id="email" disabled value="{{ $pendaftar->email }}">
            </div>
            <div class="col-12">
              <label for="ktm" class="form-label">KTM</label><br>
              <a class="btn btn-primary" href="{{ asset('storage/'.$pendaftar->ktm)}}" target="_blank"><i class="bi bi-eye"></i> Lihat KTM</a>
            </div>
            <div class="col-12">
              <label for="twibbon" class="form-label">Twibbon</label>
              <input type="twibbon" name="twibbon" class="form-control" id="twibbon" disabled value="{{ $pendaftar->twibbon }}">
            </div>
            <div class="col-12">
              <label for="alasan" class="form-label">Alasan Ingin Gabung GoGreen</label>
              <textarea class="form-control" name="alasan" disabled>{{ $pendaftar->alasan }}</textarea>
            </div>
            <div class="mt-3">
              <a href="{{ url()->previous() }}" class="btn btn-primary ml-4"><i class="bi bi-arrow-left"></i> Kembali</a>
            </div>
          </form>
          
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
