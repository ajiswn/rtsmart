@extends('component.admin_layout')

@section('title', 'Edit Kegiatan - GoGreen')

@section('body')
<div class="pagetitle">
  <h1>Edit Kegiatan</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Beranda</li>
      <li class="breadcrumb-item">Kegiatan</li>
      <li class="breadcrumb-item active">Edit Kegiatan</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Formulir Edit Kegiatan</h5>

          <!-- Vertical Form -->
          <form class="row g-3" action="{{ route('artikel.update', $artikel->id) }}" method="POST"  enctype="multipart/form-data">
            @csrf @method('put')
            <div class="col-12">
              <label for="judul" class="form-label">Judul</label>
              <input type="text" name="judul" class="form-control" id="judul" value="{{ $artikel->judul }}">
            </div>
            <div class="col-12">
              <label for="gambar" class="form-label">Gambar</label>
              <input type="file" name="gambar" class="form-control" id="gambar">
              @if ($artikel->gambar)
                <img src="{{ asset('storage/'.$artikel->gambar) }}" class="mt-2 img-fluid img-thumbnail" width="200" alt="Current Image" height="80">
              @endif
            </div>
            <div class="col-12">
              <label class="col-form-label" for>Kategori</label>
              <select name="kategori" class="form-select" aria-label="Default select example">
                <option selected hidden>-Pilih Kategori-</option>
                <option value="Sosial" {{ $artikel->kategori == 'Sosial' ? 'selected' : '' }}>Sosial</option>
                <option value="Keagamaan" {{ $artikel->kategori == 'Keagamaan' ? 'selected' : '' }}>Keagamaan</option>
                <option value="Olahraga" {{ $artikel->kategori == 'Olahraga' ? 'selected' : '' }}>Olahraga</option>
                <option value="Lingkungan" {{ $artikel->kategori == 'Lingkungan' ? 'selected' : '' }}>Lingkungan</option>
                <option value="Pendidikan" {{ $artikel->kategori == 'Pendidikan' ? 'selected' : '' }}>Pendidikan</option>
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
              <textarea class="form-control" name="konten" style="height: 300px">{{ $artikel->konten }}</textarea>
            </div>
            <div class="mt-3">
              <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
              <a href="{{ url()->previous() }}" class="btn btn-primary ml-4"><i class="bi bi-arrow-left"></i> Kembali</a>
            </div>
          </form>
          
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
