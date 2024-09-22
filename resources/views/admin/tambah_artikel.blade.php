@extends('component.admin_layout')

@section('title', 'Tambah Kegiatan - RTSmart')

@section('body')
<div class="pagetitle">
  <h1>Tambah Kegiatan</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Beranda</li>
      <li class="breadcrumb-item">Kegiatan</li>
      <li class="breadcrumb-item active">Tambah Kegiatan</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Formulir Tambah Kegiatan</h5>

          <!-- Vertical Form -->
          <form class="row g-3" action="{{route('artikel.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-12">
              <label for="judul" class="form-label">Judul</label>
              <input type="text" name="judul" class="form-control" id="judul">
            </div>
            <div class="col-12">
              <label for="gambar" class="form-label">Gambar</label>
              <input type="file" name="gambar" class="form-control" id="gambar">
            </div>
            <div class="col-12">
              <label class="col-form-label" for>Kategori</label>
              <select name="kategori" class="form-select" aria-label="Default select example">
                <option selected hidden>-Pilih Kategori-</option>
                <option value="Sosial">Sosial</option>
                <option value="Keagamaan">Keagamaan</option>
                <option value="Olahraga">Olahraga</option>
                <option value="Lingkungan">Lingkungan</option>
                <option value="Pendidikan">Pendidikan</option>
              </select>
            </div>
          <!-- Vertical Form -->
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
            <div class="col-12 mt-3">
              <label for="konten" class="form-label">Konten</label>
              <textarea name="konten" class="form-control" style="height: 300px"></textarea>
            </div>
            <div class="mt-3">
              <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
              <button type="reset" class="btn btn-secondary"> <i class="bi bi-arrow-counterclockwise"></i> Reset</button>
            </div>
            <a href="{{ url()->previous() }}" class="btn btn-primary mt-2"><i class="bi bi-arrow-left"></i> Kembali</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
