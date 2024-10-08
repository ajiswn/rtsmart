@extends('component.admin_layout')

@section('title', 'Tambah Pengajuan Surat - RTSmart')

@section('body')
<div class="pagetitle">
  <h1>Tambah Pengajuan Surat</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Beranda</li>
      <li class="breadcrumb-item">Pengajuan Surat</li>
      <li class="breadcrumb-item active">Tambah Pengajuan Surat</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Formulir Tambah Pengajuan Surat</h5>

          <!-- Vertical Form -->
          <form class="row g-3" action="{{route('surat_ahli_waris.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-12">
              <label class="col-form-label" for>NIK - Nama Ahli Waris</label>
              <select name="nik_ahli_waris" class="form-select" id="nik_ahli_waris" required>
                <option value="" selected hidden>-Pilih Ahli Waris-</option>
                @foreach ($warga as $data)
                  <option value="{{$data->nik}}">
                    {{$data->nik}} - {{ $data->nama }}
                  </option>
                @endforeach
              </select>
            </div>
            <div class="col-12">
              <label class="col-form-label" for>NIK - Nama Pewaris</label>
              <select name="nik_pewaris" class="form-select" id="nik_pewaris" required>
                <option value="" selected hidden>-Pilih Pewaris-</option>
                @foreach ($warga as $data)
                  <option value="{{$data->nik}}">
                    {{$data->nik}} - {{ $data->nama }}
                  </option>
                @endforeach
              </select>
            </div>
            <div class="col-12">
              <label for="hubungan_pewaris" class="form-label">Hubungan dengan Pewaris</label>
              <input type="text" name="hubungan_pewaris" class="form-control" id="hubungan_pewaris" required>
            </div>
            <div class="col-12">
              <label for="ktp_ahli_waris" class="form-label">KTP Ahli Waris</label>
              <input type="file" name="ktp_ahli_waris" class="form-control" id="ktp_ahli_waris" required>
            </div>
            <div class="col-12">
              <label for="ktp_pewaris" class="form-label">KTP Pewaris</label>
              <input type="file" name="ktp_pewaris" class="form-control" id="ktp_pewaris" required>
            </div>
        </div>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <div class="col-mt-3">
            <div class="col-12 mt-3">
              <label for="kk" class="form-label">Kartu Keluarga</label>
              <input type="file" name="kk" class="form-control" id="kk" required>
            </div>
            <div class="col-12 mt-3">
              <label for="akta_kematian" class="form-label">Akta Kematian, (opsional jika pewaris sudah meninggal)</label>
              <input type="file" name="akta_kematian" class="form-control" id="akta_kematian">
            </div>
            <div class="col-12 mt-3">
              <label for="tujuan" class="form-label">Tujuan Pengajuan Surat</label>
              <input type="text" name="tujuan" class="form-control" id="tujuan" required>
            </div>
            <div class="col-12 mt-4">
              <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
              <button type="reset" class="btn btn-secondary mx-2"> <i class="bi bi-arrow-counterclockwise"></i> Reset</button>
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
