<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="{{ asset('https://fonts.gstatic.com') }}" rel="preconnect">
  <link href="{{ asset('https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i') }}" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style-2.css') }}" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="#" class="logo d-flex align-items-center">
        <img src="{{ asset('assets/img/logo.png') }}" alt="">
        <span class="d-none d-lg-block">RT<span class="green">Smart</span></span>
      </a>
      <i type="button" class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{ asset(Auth::user()->photo) }}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->kartukeluarga->nama }}</span>
          </a><!-- End Profile Image Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{ Auth::user()->kartukeluarga->nama }}</h6>
              @if (Auth::user()->role == 'ketua_rt')
              <span>Ketua RT</span>
              @else
              <span>Warga</span>
              @endif
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-person"></i>
                <span>Akun Saya</span>
              </a>
            </li>
            @can('ketua_rt')
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ url('/setting') }}">
                <i class="bi bi-gear"></i>
                <span>Setting</span>
              </a>
            </li>
            @endcan
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" type="button" data-bs-toggle="modal" data-bs-target="#logoutModal">
                <i class="bi bi-box-arrow-right"></i>
                <span>Log Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav mt-2" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard') ? '' : 'collapsed' }}" href="{{ url('/dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dasbor</span>
        </a>
      </li><!-- End Dashboard Nav -->

      @can('ketua_rt')
      <li class="nav-item">
        <a class="nav-link {{ Request::is('manage/activities*') ? '' : 'collapsed' }}" href="{{ url('/manage/activities') }}">
          <i class="bi bi-card-text"></i>
          <span>Kegiatan</span>
        </a>
      </li><!-- End Articles Nav -->

      <li class="nav-item">
        <a class="nav-link {{ Request::is('manage_data*') ? '' : 'collapsed' }}" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-people"></i><span>Kelola Data</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse {{ Request::is('manage_data*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ url('/manage_data/kartukeluarga') }}" class="{{ Request::is('manage_data/kartukeluarga*') ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Data KK</span>
            </a>
          </li>
          <li>
            <a href="{{ url('/manage_data/warga') }}" class="{{ Request::is('manage_data/warga*') ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Data Warga</span>
            </a>
          </li>
          <li>
            <a href="{{ url('/manage_data/users') }}" class="{{ Request::is('manage_data/users*') ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Akun Warga</span>
            </a>
          </li>
        </ul>
      </li><!-- End Data Nav -->

      <li class="nav-item">
        <a class="nav-link {{ Request::is('manage/submission_letter*') ? '' : 'collapsed' }}" href="{{ url('/manage/submission_letter') }}">
          <i class="bi bi-envelope"></i>
          <span>Pengajuan Surat</span>
        </a>
      </li><!-- End Submission Letter Nav -->
      @endcan
      <!-- End Ketua RT's Sidebar -->

      <!-- Start Warga's Sidebar -->
      @can('warga')
      <li class="nav-item">
        <a class="nav-link {{ Request::is('surat_ahli_waris*') ? '' : 'collapsed' }}" href="{{ url('/surat_ahli_waris') }}">
          <i class="bi bi-card-text"></i>
          <span>Pengajuan Surat</span>
        </a>
      </li>
      @endcan

    </ul>

  </aside>
  <!-- End Sidebar-->
  
  <main id="main" class="main">
    @yield('body')
  </main>
  <!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright 2024<strong><span> RT<span style="color: #1EB489;">Smart</span></span></strong>. All Rights Reserved
    </div>
  </footer>
  <!-- End Footer -->

  <!-- Start Konfirmasi Logout Modal -->
  <div class="modal fade" id="logoutModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h5 class="modal-title">Konfirmasi Logout</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body border-0 text-center">
            Anda Yakin Ingin Logout?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-lg"></i> Tutup</button>
          <a href="{{route('logout')}}" class="btn btn-danger"><i class="bi bi-box-arrow-right"></i> Logout</a>
        </div>
      </div>
    </div>
  </div>
  <!-- End Konfirmasi Logout Modal-->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/quill/quill.js') }}"></script>
  <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('https://code.jquery.com/jquery-3.6.0.min.js')}}"></script>
  <script src="{{ asset('https://code.jquery.com/jquery-3.3.1.slim.min.js')}}"></script>
  <script src="{{ asset('https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js')}}"></script>
  <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js')}}"></script>


  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main-3.js')}}"></script>

  @yield('script')

</body>

</html>