@extends('component.admin_layout')

@section('title', 'Edit Warga - RTSmart')

@section('body')
<div class="pagetitle">
  <h1>Edit Warga</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Beranda</li>
      <li class="breadcrumb-item">Data Warga</li>
      <li class="breadcrumb-item active">Edit Warga</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Edit Warga</h5>

          <!-- Vertical Form -->
          <form class="row g-3"  action="{{route('warga.update',$warga->id)}}" method="POST" enctype="multipart/form-data">
            @csrf @method('put')
            <div class="col-12">
              <label class="col-form-label" for>Nomor Kartu Keluarga</label>
              <select name="no_kk" class="form-select">
                <option selected hidden>-Pilih Kartu Keluarga-</option>
                @foreach ($kartukeluarga as $item)
                  <option value="{{$item->no_kk}}" {{ $warga->no_kk == $item->no_kk ? 'selected' : '' }}>{{$item->no_kk}} - {{ $item->nama_kepala_keluarga }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-12">
              <label for="nik" class="form-label">NIK (Nomor Induk Kependudukan)</label>
              <input type="text" name="nik" class="form-control" id="nik" value="{{ $warga->nik }}">
            </div>
            <div class="col-12">
              <label for="nama" class="form-label">Nama Lengkap</label>
              <input type="text" name="nama" class="form-control" id="nama" value="{{ $warga->nama }}">
            </div>
            <div class="col-12">
              <label class="col-form-label" for="jenis_kelamin">Jenis Kelamin</label>
              <select name="jenis_kelamin" class="form-select" aria-label="Default select example">
                <option selected hidden>-Pilih Jenis Kelamin-</option>
                <option value="Laki-laki" {{ $warga->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ $warga->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
              </select>
            </div>
            <div class="col-12">
              <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
              <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" value="{{ $warga->tempat_lahir }}">
            </div>
            <div class="col-12">
              <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
              <input type="date" class="form-control" name="tanggal_lahir" id="tgl_lahir" value="{{ $warga->tanggal_lahir }}">
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
              <select name="agama" class="form-select">
                <option selected hidden>-Pilih Agama-</option>
                <option value="Islam" {{ $warga->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                <option value="Protestan" {{ $warga->agama == 'Protestan' ? 'selected' : '' }}>Protestan</option>
                <option value="Katolik" {{ $warga->agama == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                <option value="Hindu" {{ $warga->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                <option value="Buddha" {{ $warga->agama == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                <option value="Konghucu" {{ $warga->agama == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
              </select>
            </div>
            <div class="col-12 mt-3">
              <label class="col-form-label" for="pekerjaan">Pekerjaan</label>
              <option selected hidden>-Pilih Pekerjaan-</option>
              <select name="pekerjaan" class="form-select">
                @foreach ($pekerjaan as $item)
                  <option value="{{$item->name}}" {{ $warga->pekerjaan == $item->name ? 'selected' : '' }}>{{ $item->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-12 mt-3">
              <label class="col-form-label" for="status_kawin">Status Kawin</label>
              <select name="status_kawin" class="form-select" aria-label="Default select example">
                <option selected hidden>-Pilih Status Kawin-</option>
                <option value="Belum Kawin" {{ $warga->status_kawin == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                <option value="Kawin" {{ $warga->status_kawin == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                <option value="Cerai Hidup" {{ $warga->status_kawin == 'Cerai Hidup' ? 'selected' : '' }}>Cerai Hidup</option>
                <option value="Cerai Mati" {{ $warga->status_kawin == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati</option>
              </select>
            </div> 
            <div class="col-12 mt-3">
              <label for="no_telp" class="form-label">Nomor Telepon</label>
              <input type="text" name="no_telp" class="form-control" id="no_telp" value="{{ $warga->no_telp }}">
            </div>
            <div class="col-12 mt-3">
              <label class="col-form-label" for="peran">Peran</label>
              <select name="peran" class="form-select" aria-label="Default select example">
                <option selected hidden>-Pilih peran-</option>
                <option value="Kepala Keluarga" {{ $warga->peran == 'Kepala Keluarga' ? 'selected' : '' }}>Kepala Keluarga</option>
                <option value="Anggota Keluarga" {{ $warga->peran == 'Anggota Keluarga' ? 'selected' : '' }}>Anggota Keluarga</option>
              </select>
            </div> 
            <div class="col-12 mt-3">
              <label class="col-form-label" for="status">Status</label>
              <select name="status" class="form-select" aria-label="Default select example">
                <option selected hidden>-Pilih Status-</option>
                <option value="Aktif" {{ $warga->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="Pindah" {{ $warga->status == 'Pindah' ? 'selected' : '' }}>Pindah</option>
                <option value="Meninggal" {{ $warga->status == 'Meninggal' ? 'selected' : '' }}>Meninggal</option>
              </select>
            </div> 
            <div class="col-12 mt-3">
              <label for="image" class="form-label">Foto KTP/KTM/Kartu Pelajar (opsional)</label>
              <input type="file" name="image" class="form-control" id="image">
              @if ($warga->image)
                <img src="{{ asset('storage/'.$warga->image) }}" class="mt-2 img-fluid img-thumbnail form-control" width="200" alt="Kartu Pengenal" height="80">
              @else
                <input type="text" name="peran" class="form-control mt-3" id="peran" value="Warga belum ada tanda pengenal" disabled>
              @endif
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


