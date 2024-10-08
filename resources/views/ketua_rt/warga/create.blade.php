@extends('component.admin_layout')

@section('title', 'Tambah Warga - RTSmart')

@section('body')
<div class="pagetitle">
  <h1>Tambah Warga</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Beranda</li>
      <li class="breadcrumb-item">Data Warga</li>
      <li class="breadcrumb-item active">Tambah Warga</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Formulir Tambah Warga</h5>

          <!-- Vertical Form -->
          <form class="row g-3" action="{{route('warga.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-12">
              <label class="col-form-label" for>Nomor Kartu Keluarga</label>
              <select name="no_kk" class="form-select" id="no_kk" required>
                <option value="" selected hidden>-Pilih Kartu Keluarga-</option>
                @foreach ($kartukeluarga as $item)
                  <option value="{{$item->no_kk}}" data-nama-kepala-keluarga="{{ $item->nama_kepala_keluarga }}">
                    {{$item->no_kk}} - {{ $item->nama_kepala_keluarga }}
                  </option>
                @endforeach
              </select>
            </div>
            <div class="col-12">
              <label for="nik" class="form-label">NIK (Nomor Induk Kependudukan)</label>
              <input type="text" name="nik" class="form-control" id="nik" required>
            </div>
            <div class="col-12">
              <label for="nama" class="form-label">Nama Lengkap</label>
              <input type="text" name="nama" class="form-control" id="nama" required>
            </div>
            <div class="col-12">
              <label class="col-form-label" for="jenis_kelamin">Jenis Kelamin</label>
              <select name="jenis_kelamin" class="form-select" required>
                <option value="" selected hidden>-Pilih Jenis Kelamin-</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
            <div class="col-12">
              <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
              <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" required>
            </div>
            <div class="col-12">
              <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
              <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" required>
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
              <select name="agama" class="form-select" required>
                <option value="" selected hidden>-Pilih Agama-</option>
                <option value="Islam">Islam</option>
                <option value="Protestan">Protestan</option>
                <option value="Katolik">Katolik</option>
                <option value="Hindu">Hindu</option>
                <option value="Buddha">Buddha</option>
                <option value="Konghucu">Konghucu</option>
              </select>
            </div>
            <div class="col-12 mt-3">
              <label class="col-form-label" for="pekerjaan">Pekerjaan</label>
              <select name="pekerjaan" class="form-select" required>
                <option value="" selected hidden>-Pilih Pekerjaan-</option>
                @foreach ($pekerjaan as $item)
                  <option value="{{$item->name}}">{{ $item->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-12 mt-3">
              <label class="col-form-label" for="status_kawin">Status Kawin</label>
              <select name="status_kawin" class="form-select" required>
                <option value="" selected hidden>-Pilih Status Kawin-</option>
                <option value="Belum Kawin">Belum Kawin</option>
                <option value="Kawin">Kawin</option>
                <option value="Cerai Hidup">Cerai Hidup</option>
                <option value="Cerai Mati">Cerai Mati</option>
              </select>
            </div>
            <div class="col-12 mt-3">
              <label for="no_telp" class="form-label">Nomor Telepon</label>
              <input type="text" name="no_telp" class="form-control" id="no_telp">
            </div>
            <div class="col-12 mt-3">
              <label class="col-form-label" for="peran">Peran</label>
              <select name="peran" class="form-select" id="peran" required>
                <option value="" selected hidden>-Pilih Peran-</option>
                <option value="Kepala Keluarga">Kepala Keluarga</option>
                <option value="Anggota Keluarga">Anggota Keluarga</option>
              </select>
            </div> 
            <div class="col-12 mt-3">
              <label for="image" class="form-label">Foto KTP/KTM/Kartu Pelajar (opsional)</label>
              <input type="file" name="image" class="form-control" id="image">
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

@section('script')
<script>
  document.getElementById('no_kk').addEventListener('change', function() {
      var selectedOption = this.options[this.selectedIndex];
      var namaKepalaKeluarga = selectedOption.getAttribute('data-nama-kepala-keluarga');
      var peranSelect = document.getElementById('peran');

      // Reset peran options
      peranSelect.innerHTML = `
          <option value="" selected hidden>-Pilih Peran-</option>
          <option value="Kepala Keluarga">Kepala Keluarga</option>
          <option value="Anggota Keluarga">Anggota Keluarga</option>
      `;

      // Jika nama kepala keluarga ada (valid), maka hanya tampilkan opsi "Anggota Keluarga"
      if (namaKepalaKeluarga) {
          peranSelect.innerHTML = `
              <option value="" selected hidden>-Pilih Peran-</option>
              <option value="Anggota Keluarga" selected>Anggota Keluarga</option>
          `;
      }
  });
</script>
@endsection
