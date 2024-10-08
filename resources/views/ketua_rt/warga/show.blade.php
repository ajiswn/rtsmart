@extends('component.admin_layout')

@section('title', 'Detail Warga - RTSmart')

@section('body')
<div class="pagetitle">
  <h1>Detail Warga</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Beranda</li>
      <li class="breadcrumb-item">Data Warga</li>
      <li class="breadcrumb-item active">Detail Warga</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Detail Warga</h5>

          <!-- Vertical Form -->
          <form class="row g-3">
            <div class="col-12">
              <label class="col-form-label" for>Nomor Kartu Keluarga</label>
              <input type="text" name="no_kk" class="form-control" id="no_kk" disabled value="{{ $warga->no_kk }} - {{ $kartukeluarga->nama_kepala_keluarga }}">
            </div>
            <div class="col-12">
              <label for="nik" class="form-label">NIK (Nomor Induk Kependudukan)</label>
              <input type="text" name="nik" class="form-control" id="nik" disabled value="{{ $warga->nik }}">
            </div>
            <div class="col-12">
              <label for="nama" class="form-label">Nama Lengkap</label>
              <input type="text" name="nama" class="form-control" id="nama" disabled value="{{ $warga->nama }}">
            </div>
            <div class="col-12">
              <label class="col-form-label" for="jenis_kelamin">Jenis Kelamin</label>
              <input type="text" name="jenis_kelamin" class="form-control" id="jenis_kelamin" disabled value="{{ $warga->jenis_kelamin }}">
            </div>
            <div class="col-12">
              <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
              <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" disabled value="{{ $warga->tempat_lahir }}">
            </div>
            <div class="col-12">
              <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
              <input type="text" name="tanggal_lahir" class="form-control" id="tanggal_lahir" disabled value="{{ $warga->tanggal_lahir }}">
            </div>
        </div>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <div class="col-mt-3">
            <div class="col-12 mt-3">
              <label class="col-form-label" for="agama">Agama</label>
              <input type="text" name="agama" class="form-control" id="agama" disabled value="{{ $warga->agama }}">
            </div>
            <div class="col-12 mt-3">
              <label class="col-form-label" for="pekerjaan">Pekerjaan</label>
              <input type="text" name="nik" class="form-control" id="nik" disabled value="{{ $warga->pekerjaan }}">
            </div>
            <div class="col-12 mt-3">
              <label class="col-form-label" for="status_kawin">Status Kawin</label>
              <input type="text" name="status_kawin" class="form-control" id="status_kawin" disabled value="{{ $warga->status_kawin }}">
            </div> 
            <div class="col-12 mt-3">
              <label class="col-form-label" for="peran">Peran</label>
              <input type="text" name="peran" class="form-control" id="peran" disabled value="{{ $warga->peran }}">
            </div> 
            <div class="col-12 mt-3">
              <label for="image" class="form-label">Foto KTP/KTM/Kartu Pelajar (opsional)</label>
              @if ($warga->image)
                <img src="{{ asset('storage/'.$warga->image) }}" class="mt-2 img-fluid img-thumbnail form-control" width="200" alt="Kartu Pengenal" height="80">
              @else
                <input type="text" name="peran" class="form-control" id="peran" disabled value="Warga belum ada tanda pengenal">
              @endif
            </div>
            <div class="col-12 mt-3">
              <a href="{{ url()->previous() }}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Kembali</a>
            </div>
          </div>
        </div>
      </div>
    </div>
          </form>
          <!-- Vertical Form -->
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('script')
<script>
  $(document).ready(function(){
    $('.selectPicker').selectpicker();
  });
</script>
@endsection

