@extends('component.admin_layout')

@section('title', 'Pengajuan Surat - RTSmart')

@section('body')
<div class="pagetitle">
  <h1>Pengajuan Surat</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Dasbor</li>
      <li class="breadcrumb-item active">Pengajuan Surat</li>
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
            @can('warga')
              <a href="{{route('surat_ahli_waris.create')}}"><button type="button" class="btn btn-primary rounded"><i class="bi bi-plus"></i> Tambah</button></a>
            @endcan
          </h5>

          <!-- Table with hoverable rows -->
          <table class="table table-hover datatable" style="vertical-align: middle">
            <thead>
              <tr class="table-success">
                <th scope="col">#</th>
                <th scope="col">Tanggal</th> 
                <th scope="col">Nama Ahli Waris</th>
                <th scope="col">Nama Pewaris</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @if(!$suratAhliWaris->isEmpty())
              <?php $no=1; ?>
              @foreach($suratAhliWaris as $data)
              <tr>
                <th scope="row">{{$no}}</th>
                <td>{{ $data->updated_at }}</td>
                <td>{{ $data->warga->nama }}</td>
                <td>{{ $data->wargaku->nama }}</td>
                <td>{{ $data->status }}</td>
                <td>
                  
                  @can('ketua_rt')
                  <a class="btn btn-info" href="{{ route('submission_letter.show',$data->id) }}"><i class="bi bi-eye" title="Detail"></i></a>
                  @if ($data->status == 'Diproses')
                  <button title="Setujui" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#terimaModal" onclick="terimaAction('{{ route('surat.diterima', $data->id) }}')">
                    <i class="bi bi-check-lg"></i>
                  </button>
                  <button title="Tolak" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#tolakModal" onclick="tolakAction('{{ route('surat.ditolak', $data->id) }}')">
                    <i class="bi bi-x-lg"></i>
                  </button>
                  @endif
                  @endcan
                      
                  @can('warga')
                  <a class="btn btn-info" href="{{ route('surat_ahli_waris.show',$data->id) }}"><i class="bi bi-eye" title="Detail"></i></a>
                    @if ($data->status == 'Ditolak')
                    <a title="Edit" href="{{ route('surat_ahli_waris.edit',$data->id) }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                    @endif
                    @if ($data->status == 'Disetujui')
                    <a target="_blank" title="Cetak" href="{{ route('surat.print',$data->id) }}" class="btn btn-primary"><i class="bi bi-printer"></i></a>
                    @endif
                  @endcan
                </td>
              </tr>
              <?php $no++; ?>
              @endforeach
            </tr>
            @else
            <tr>
                <td class="text-center" colspan="8">Belum ada pengajuan surat</td>
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
        <h5 class="modal-title">Konfirmasi Setujui Surat</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body border-0 text-center">
          Anda Yakin Ingin Setujui Surat Ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-lg"></i> Tutup</button>
        <a href="" class="btn btn-primary" id="terimaButton"><i class="bi bi-check-lg"></i> Setujui</a>
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
        <h5 class="modal-title">Konfirmasi Tolak Surat</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body border-0 text-center">
          Anda Yakin Ingin Menolak Surat Ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-lg"></i> Tutup</button>
        <a href="" class="btn btn-danger" id="tolakButton"><i class="bi bi-x-lg"></i> Tolak</a>
      </div>
    </div>
  </div>
</div>
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
