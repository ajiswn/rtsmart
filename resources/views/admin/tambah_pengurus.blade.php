@extends('component.admin_layout')

@section('title', 'Tambah Pengurus Admin - GoGreen')

@section('body')
<div class="pagetitle">
  <h1>Tambah Artikel</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Beranda</li>
      <li class="breadcrumb-item">Pengurus</li>
      <li class="breadcrumb-item active">Tambah Pengurus</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Formulir Tambah Pengurus</h5>

          <!-- Vertical Form -->
          <form class="row g-3" action="{{route('pengurus.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-12">
              <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
              <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap">
            </div>
            <div class="col-12">
              <label for="foto" class="form-label">Foto</label>
              <input type="file" name="foto" class="form-control" id="foto">
            </div>
            <div class="col-12">
              <label class="col-form-label" for>Jabatan</label>
              <select name="id_jabatan" class="form-select" aria-label="Default select example">
                <option selected hidden>-Pilih Jabatan-</option>
                @foreach ($jabatan as $item)
                  <option value="{{$item->id}}">{{$item->jabatan}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-12">
              <label for="prodi" class="form-label">Prodi</label>
              <input type="text" name="prodi" class="form-control" id="prodi">
            </div>
            <div class="col-12">
              <label for="angkatan" class="form-label">Angkatan</label>
              <input type="text" name="angkatan" class="form-control" id="angkatan">
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
