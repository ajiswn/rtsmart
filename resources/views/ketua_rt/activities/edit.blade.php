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
          <form class="row g-3" action="{{ route('activities.update', $activities->id) }}" method="POST"  enctype="multipart/form-data">
            @csrf @method('put')
            <div class="col-12">
              <label for="title" class="form-label">Judul</label>
              <input type="text" name="title" class="form-control" id="title" value="{{ $activities->title }}">
            </div>
            <div class="col-12">
              <label for="image" class="form-label">Gambar</label>
              <input type="file" name="image" class="form-control" id="image">
              @if ($activities->image)
                <img src="{{ asset('storage/'.$activities->image) }}" class="mt-2 img-fluid img-thumbnail" width="200" alt="Current Image" height="80">
              @endif
            </div>
            <div class="col-12">
              <label class="col-form-label" for>Kategori</label>
              <select name="category" class="form-select" aria-label="Default select example">
                <option selected hidden>-Pilih Kategori-</option>
                <option value="Sosial" {{ $activities->category == 'Sosial' ? 'selected' : '' }}>Sosial</option>
                <option value="Keagamaan" {{ $activities->category == 'Keagamaan' ? 'selected' : '' }}>Keagamaan</option>
                <option value="Olahraga" {{ $activities->category == 'Olahraga' ? 'selected' : '' }}>Olahraga</option>
                <option value="Lingkungan" {{ $activities->category == 'Lingkungan' ? 'selected' : '' }}>Lingkungan</option>
                <option value="Pendidikan" {{ $activities->category == 'Pendidikan' ? 'selected' : '' }}>Pendidikan</option>
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
              <label for="content" class="form-label">Konten</label>
              <textarea class="form-control" name="content" style="height: 300px">{{ $activities->content }}</textarea>
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
