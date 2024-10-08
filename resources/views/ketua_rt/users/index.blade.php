@extends('component.admin_layout')

@section('title', 'Akun Warga - RTSmart')

@section('body')
<div class="pagetitle">
    <h1>Akun Warga</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Beranda</li>
        <li class="breadcrumb-item active">Akun Warga</li>
      </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section table">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">
              @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ session('success') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
              <a href="{{route('users.create')}}"><button type="button" class="btn btn-primary rounded"><i class="bi bi-plus"></i> Tambah</button></a>
            </h5>

            <!-- Table with hoverable rows -->
            <table class="table table-hover table-image">
              <thead>
                <tr class="table-success">
                  <th scope="col">#</th>
                  <th scope="col">Foto Profil</th>
                  <th scope="col">No. KK</th>
                  <th scope="col">Nama Kepala Keluarga</th>
                  <th scope="col">Status</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @if(!$users->isEmpty())
                <?php $no=1; ?>
                @foreach($users as $data)
                <tr>
                  <th scope="row">{{ $no }}</th>
                  <td><img src="{{ asset($data->photo) }}" alt="Profile" class="rounded-circle" width="40"></td>
                  <td>{{ $data->no_kk }}</td>
                  <td>{{ $data->nama_kepala_keluarga }}</td>
                  <td>{{ $data->status }}</td>
                  <td>
                    @if($data->status == 'Aktif')
                    <button title="Nonaktifkan" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#nonaktifkanModal" onclick="nonaktifkanAction('{{ route('user.nonaktifkan', $data->id) }}')">
                      <i class="bi bi-x-lg"></i>
                    </button>
                    @elseif($data->status == 'Nonaktif')
                      <button title="Aktifkan" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#aktifkanModal" onclick="aktifkanAction('{{ route('user.aktifkan', $data->id) }}')">
                        <i class="bi bi-check-lg"></i>
                      </button>
                      <button title="Hapus" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal" onclick="deleteAction('{{ route('users.destroy', $data->id) }}')">
                        <i class="bi bi-trash3"></i>
                      </button>
                    @endif
                  </td>
                </tr>
                <?php $no++; ?>
                @endforeach
                @else
                <tr>
                    <td class="text-center" colspan="6">Belum ada akun warga</td>
                </tr>
                @endif
              </tbody>
            </table>
            <!-- End Table with hoverable rows -->

          </div>
        </div>
        

      </div>
    </div>
</section>

<!-- Konfirmasi Aktifkan Modal -->
<div class="modal fade" id="aktifkanModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title">Konfirmasi Aktifkan Akun</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body border-0 text-center">
          Anda Yakin Ingin Mengaktifkan Akun Ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-lg"></i> Tutup</button>
        <a href="" class="btn btn-primary" id="aktifkanButton"><i class="bi bi-check-lg"></i> Aktifkan</a>
      </div>
    </div>
  </div>
</div>
<!-- Konfirmasi Aktifkan Modal-->

<!-- Konfirmasi Nonaktifkan Modal -->
<div class="modal fade" id="nonaktifkanModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title">Konfirmasi Nonaktifkan Akun</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body border-0 text-center">
          Anda Yakin Ingin Menonaktifkan Akun Ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-lg"></i> Tutup</button>
        <a href="" class="btn btn-danger" id="nonaktifkanButton"><i class="bi bi-x-lg"></i> Nonaktifkan</a>
      </div>
    </div>
  </div>
</div>
<!--Konfirmasi Nonaktifkan Modal-->

<!-- Start Konfirmasi Hapus Modal -->
<div class="modal fade" id="hapusModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title">Konfirmasi Hapus Akun</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body border-0 text-center">
          Anda Yakin Ingin Menghapus Akun Ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-lg"></i> Tutup</button>
        <form action="" id="deleteForm" method="POST">
          @csrf @method('delete')
          <button type="submit" class="btn btn-danger"><i class="bi bi-trash3"></i> Hapus</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End Konfirmasi Hapus Modal-->
@endsection

@section('script')
<script>
  function aktifkanAction(actionUrl) {
      document.getElementById('aktifkanButton').href = actionUrl;
  }

  function nonaktifkanAction(actionUrl) {
      document.getElementById('nonaktifkanButton').href = actionUrl;
  }

  function deleteAction(actionUrl) {
      document.getElementById('deleteForm').action = actionUrl;
  }
</script>
@endsection
