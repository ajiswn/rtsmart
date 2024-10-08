@extends('component.admin_layout')

@section('title', 'Data Warga - RTSmart')

@section('body')
<div class="pagetitle">
  <h1>Data Warga</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Beranda</li>
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
            <a href="{{route('warga.create')}}"><button type="button" class="btn btn-primary rounded"><i class="bi bi-plus"></i> Tambah</button></a>
          </h5>

          <!-- Table with hoverable rows -->
          <table class="table table-hover datatable" style="vertical-align: middle">
            <thead>
              <tr class="table-success">
                <th scope="col">#</th>
                <th scope="col">NIK</th> 
                <th scope="col">Nama</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Tempat dan Tanggal Lahir</th>
                <th scope="col">Alamat</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @if(!$warga->isEmpty())
              <?php $no=1; ?>
              @foreach($warga as $data)
              <tr>
                <th scope="row">{{$no}}</th>
                <td>{{ $data->nik }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->jenis_kelamin }}</td>
                <td>{{ $data->ttl}}</td>
                <td>{{ $data->alamat }}</td>
                <td>{{ $data->status }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('warga.show',$data->id) }}"><i class="bi bi-eye" title="Detail"></i></a>
                    <a title="Edit" href="{{ route('warga.edit',$data->id) }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                    @if($data->status != 'Aktif')
                    <button title="Hapus" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal" onclick="deleteAction('{{ route('warga.destroy', $data->id) }}')">
                      <i class="bi bi-trash3"></i>
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

<!-- Start Konfirmasi Hapus Modal -->
<div class="modal fade" id="hapusModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title">Konfirmasi Hapus Data Warga</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body border-0 text-center">
          Anda Yakin Ingin Menghapus Data Warga Ini?
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
  function deleteAction(actionUrl) {
      document.getElementById('deleteForm').action = actionUrl;
  }
</script>
@endsection
