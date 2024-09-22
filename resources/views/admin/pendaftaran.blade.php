@extends('component.admin_layout')

@section('title', 'Data Warga - RTSmart')

@section('body')
<div class="pagetitle">
  <h1>Data Warga</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Dasbor</li>
      <li class="breadcrumb-item active">Data Warga</li>
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
            <a href="#"><button type="button" class="btn btn-primary rounded" disabled><i class="bi bi-plus"></i> Tambah</button></a>
          </h5>

          <!-- Table with hoverable rows -->
          <table class="table table-hover" style="vertical-align: middle">
            <thead>
              <tr class="table-success">
                <th scope="col">#</th>
                <th scope="col">NIM</th> 
                <th scope="col">Nama</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Alamat</th>
                <th scope="col">KK</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @if(!$pendaftaran->isEmpty())
              <?php $no=1; ?>
              @foreach($pendaftaran as $data)
              <tr>
                <th scope="row">{{$no}}</th>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->prodi }}</td>
                <td>{{ $data->angkatan }}</td>
                <td>{{ $data->status }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('pendaftaran.show',$data->id) }}"><i class="bi bi-eye" title="Detail"></i></a>
                    @if($data->status == 'Proses')
                      <button title="Terima" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#terimaModal" onclick="terimaAction('{{ route('pendaftaran.diterima', $data->id) }}')">
                        <i class="bi bi-check-lg"></i>
                      </button>
                      <button title="Tolak" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#tolakModal" onclick="tolakAction('{{ route('pendaftaran.ditolak', $data->id) }}')">
                        <i class="bi bi-x-lg"></i>
                      </button>
                    @endif
                </td>
              </tr>
              <?php $no++; ?>
              @endforeach
            </tr>
            @else
            <tr>
                <td class="text-center" colspan="8">Belum ada data warga</td>
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

<!-- Konfirmasi Terima Modal -->
<div class="modal fade" id="terimaModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title">Konfirmasi Terima Pendaftar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body border-0 text-center">
          Anda Yakin Ingin Menerima Pendaftar Ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-lg"></i> Tutup</button>
        <a href="" class="btn btn-primary" id="terimaButton"><i class="bi bi-check-lg"></i> Terima</a>
      </div>
    </div>
  </div>
</div>
<!-- Konfirmasi Terima Modal-->

<!-- Konfirmasi Tolak Modal -->
<div class="modal fade" id="tolakModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title">Konfirmasi Tolak Pendaftar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body border-0 text-center">
          Anda Yakin Ingin Menolak Pendaftar Ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-lg"></i> Tutup</button>
        <a href="" class="btn btn-danger" id="tolakButton"><i class="bi bi-x-lg"></i> Tolak</a>
      </div>
    </div>
  </div>
</div>
<!--vKonfirmasi Tolak Modal-->
@endsection

@section('script')
<script>
  function terimaAction(actionUrl) {
      document.getElementById('terimaButton').href = actionUrl;
  }

  function tolakAction(actionUrl) {
      document.getElementById('tolakButton').href = actionUrl;
  }
</script>
@endsection
