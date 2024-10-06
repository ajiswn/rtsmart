@extends('component.admin_layout')

@section('title', 'Dasbor Ketua RT - RTSmart')

@section('body')
    <div class="pagetitle">
        <h1>Dasbor</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Beranda</li>
                <li class="breadcrumb-item active">Dasbor</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row mb-xxl-5">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- Warga Card -->
                    <div class="col-xxl-12 col-md-12">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Warga</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>0</h6>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Warga Card -->

                    <!-- Kegiatan Card -->
                    <div class="col-xxl-6 col-md-12">
                        <div class="card info-card revenue-card">

                            <div class="card-body">
                                <h5 class="card-title">Kegiatan</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-card-text"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{$activities}}</h6>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Kegiatan Card -->

                    <!-- Pengajuan Card -->
                    <div class="col-xxl-6 col-xl-12">

                        <div class="card info-card customers-card">

                            <div class="card-body">
                                <h5 class="card-title">Pengajuan</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-envelope"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>0</h6>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Pengajuan Card -->

                </div>
            </div><!-- End Left side columns -->


        </div>
    </section>
@endsection
