@extends('component.admin_layout')

@section('title', 'Edit Kartu Keluarga - RTSmart')

@section('body')
<div class="pagetitle">
  <h1>Edit Kartu Keluarga</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Beranda</li>
      <li class="breadcrumb-item">Data Kartu Keluarga</li>
      <li class="breadcrumb-item active">Edit Kartu Keluarga</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Formulir Edit Kartu Keluarga</h5>

          <!-- Vertical Form -->
          <form class="row g-3" action="{{route('kartukeluarga.update',$kartukeluarga->id)}}" method="POST" enctype="multipart/form-data">
            @csrf @method('put')
            <div class="col-12">
              <label for="no_kk" class="form-label">Nomor Kartu Keluarga</label>
              <input type="text" name="no_kk" class="form-control" id="no_kk" value="{{ $kartukeluarga->no_kk }}">
            </div>
            <div class="col-12">
              <label for="alamat" class="form-label">Alamat</label>
              <input type="text" name="alamat" class="form-control" id="alamat" value="{{ $kartukeluarga->alamat }}">
            </div>
            <div class="col-12">
              <label for="image" class="form-label">Foto Kartu Keluarga</label>
              <input type="file" name="image" class="form-control" id="image">
              @if ($kartukeluarga->image)
                <img src="{{ asset('storage/'.$kartukeluarga->image) }}" class="mt-2 img-fluid img-thumbnail form-control" width="200" alt="Current Image" height="80">
              @endif
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
