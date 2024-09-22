@extends('component.admin_layout')

@section('title', 'Kegiatan - RTSmart')

@section('body')
<div class="pagetitle">
    <h1>Kegiatan</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Dasbor</li>
        <li class="breadcrumb-item active">Kegiatan</li>
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
              <a href="{{route('artikel.create')}}"><button type="button" class="btn btn-primary rounded"><i class="bi bi-plus"></i> Tambah</button></a>
            </h5>

            <!-- Table with hoverable rows -->
            <table class="table table-hover table-image">
              <thead>
                <tr class="table-success">
                  <th scope="col">#</th>
                  <th scope="col">Gambar</th>
                  <th scope="col">Judul</th>
                  <th scope="col">Kategori</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @if(!$artikel->isEmpty())
                <?php $no=1; ?>
                @foreach($artikel as $data)
                <tr>
                  <th scope="row">{{ $no }}</th>
                  <td>
                    <img src="{{asset('storage/' . $data->gambar)}}" width="80" class="img-fluid img-thumbnail" alt="{{ $data->judul }}">
                  </td>
                  <td class="w-50">{{ $data->judul }}</td>
                  <td>{{ $data->kategori }}</td>
                  <td>
                      <a title="Edit" href="{{ route('artikel.edit',$data->id) }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                      <button title="Hapus" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#basicModal" onclick="deleteAction('{{ route('artikel.destroy', $data->id) }}')">
                        <i class="bi bi-trash3"></i>
                      </button>
                  </td>
                </tr>
                <?php $no++; ?>
                @endforeach
                @else
                <tr>
                    <td class="text-center" colspan="6">Data tidak tersedia di tabel</td>
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
<div class="modal fade" id="basicModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h5 class="modal-title">Konfirmasi Hapus Kegiatan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body border-0 text-center">
            Anda Yakin Ingin Menghapus Kegiatan Ini?
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
