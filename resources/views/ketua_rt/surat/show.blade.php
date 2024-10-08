@extends('component.admin_layout')

@section('title', 'Detail Pengajuan Surat - RTSmart')

@section('body')
<div class="pagetitle">
  <h1>Detail Pengajuan Surat</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Beranda</li>
      <li class="breadcrumb-item">Pengajuan Surat</li>
      <li class="breadcrumb-item active">Detail Pengajuan Surat</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <!-- Vertical Form -->
          <form class="row g-3" action="{{route('submission_letter.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-12">
              <label class="col-form-label" for>NIK - Nama Ahli Waris</label>
              <input type="text" name="nik_ahli_waris" class="form-control" id="nik_ahli_waris" value="{{ $surat->nik_ahli_waris }} - {{ $surat->warga->nama }}" disabled>
            </div>
            <div class="col-12">
              <label class="col-form-label" for>NIK - Nama Pewaris</label>
              <input type="text" name="nik_pewaris" class="form-control" id="nik_pewaris" value="{{ $surat->nik_pewaris }} - {{ $surat->wargaku->nama }}" disabled>
            </div>
            <div class="col-12">
              <label for="hubungan_pewaris" class="form-label">Hubungan dengan Pewaris</label>
              <input type="text" name="hubungan_pewaris" class="form-control" id="hubungan_pewaris" value="{{ $surat->hubungan_pewaris }}" disabled>
            </div>
            <div class="col-12">
              <label for="ktp_ahli_waris" class="form-label">KTP Ahli Waris</label><br>
              <img src="{{ asset($surat->ktp_ahli_waris) }}" class="mt-2 img-fluid img-thumbnail" width="100" alt="KTP Ahli Waris" height="20">
            </div>
            <div class="col-12">
              <label for="ktp_pewaris" class="form-label">KTP Pewaris</label><br>
              <img src="{{ asset($surat->ktp_pewaris) }}" class="mt-2 img-fluid img-thumbnail" width="100" alt="KTP Ahli Waris" height="20">
            </div>
        </div>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <div class="col-mt-3">
            <div class="col-12 mt-3">
              <label for="kk" class="form-label">Kartu Keluarga</label><br>
              <img src="{{ asset($surat->kk) }}" class="mt-2 img-fluid img-thumbnail" width="100" alt="KTP Ahli Waris" height="20">
            </div>
            <div class="col-12 mt-3">
              <label for="akta_kematian" class="form-label">Akta Kematian, (opsional jika pewaris sudah meninggal)</label><br>
              @if ($surat->akta_kematian)
              <img src="{{ asset($surat->akta_kematian) }}" class="mt-2 img-fluid img-thumbnail" width="100" alt="KTP Ahli Waris" height="20">
              @else
                <input type="text" name="peran" class="form-control" id="peran" disabled value="Akta Kematian tidak ada">
              @endif              
            </div>
            <div class="col-12 mt-3">
              <label for="tujuan" class="form-label">Tujuan Pengajuan Surat</label>
              <input type="text" name="tujuan" class="form-control" id="tujuan" value="{{ $surat->tujuan }}">
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

