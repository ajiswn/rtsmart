@extends('component.layout')

@section('title', 'RT Smart')

@section('hero')
  <!-- ======= Hero Section ======= -->
  <section id="hero"
    class="d-flex flex-column justify-content-center align-items-center">
    <div class="container text-center text-md-left" data-aos="fade-up">
      <h1>Selamat datang di RT<span>Smart</span></h1>
      <h2>📖Solusi Cerdas untuk Kemudahan Warga📖</h2>
      {{-- <h3>Since 2012</h3> --}}
      {{-- <a href="{{ url('/registration') }}" class="btn-get-started scrollto">Gabung Kami</a> --}}
    </div>
  </section>
  <!-- End Hero -->
@endsection

@section('body')
  <!-- ======= What We Do Section ======= -->
  <section id="what-we-do" class="what-we-do">
    <div class="container">

      <div class="section-title">
        <h2>Fitur Utama di RT<span class="green">Smart</span></h2>
        <p>Kami di RTSmart berkomitmen untuk meningkatkan pelayanan administrasi warga dengan memanfaatkan teknologi digital. 
          Melalui platform kami, berbagai layanan RT dapat diakses dengan mudah dan transparan.
        </p>
      </div>

      <div class="row">
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
          <div class="icon-box">
            <div class="icon"><i class="bi bi-people"></i></div>
            <h4>Kelola Data Warga</h4>
            <p>Fitur ini memudahkan pengurus RT dalam mengelola data warga secara terstruktur dan aman.
            </p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
          <div class="icon-box">
            <div class="icon"><i class="bi bi-card-text"></i></div>
            <h4>Kegiatan Warga</h4>
            <p>Jelajahi berbagai kegiatan warga yang berlangsung di lingkungan RT kita!</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
          <div class="icon-box">
            <div class="icon"><i class="bi bi-envelope"></i></div>
            <h4>Pengajuan Surat</h4>
            <p>Pengajuan surat kini lebih mudah dan cepat!</p>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End What We Do Section -->

  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container">

      <div class="row align-items-center">
        <div class="col-lg-6">
          <img src="{{ asset('assets/img/about_us.jpeg') }}"
            class="img-fluid rounded img-cropped" alt="">
        </div>
        <div
          class="col-lg-6 pt-4 pt-lg-0 d-flex flex-column justify-content-center text-center">
          <h3>Tentang Kami</h3>
          <p>
            RT Smart merupakan sebuah platform digital berbasis layanan online yang secara resmi didirikan pada tanggal 1 Agustus 2024. 
            Platform ini dirancang dengan tujuan utama untuk memberikan kemudahan dalam berbagai proses administrasi bagi warga, 
            terutama dalam pengurusan dokumen-dokumen penting seperti surat keterangan ahli waris dan berbagai layanan administratif lainnya.
             Melalui RT Smart, warga dapat mengajukan dan memantau status permohonan surat secara efisien dan transparan tanpa harus melalui 
             prosedur yang berbelit atau mendatangi kantor RT secara langsung. Dengan adanya platform ini, diharapkan seluruh proses birokrasi 
             di tingkat RT dapat berjalan lebih cepat, mudah, dan terorganisir, sekaligus meningkatkan transparansi serta akuntabilitas dalam 
             pelayanan masyarakat.
          </p>
        </div>
      </div>

    </div>
  </section><!-- End About Section -->

  <!-- Recent Posts Section -->
  <section id="recent-posts" class="recent-posts section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>Kegiatan Terbaru</h2>
    </div><!-- End Section Title -->

    <div class="container">

      <div class="row gy-5">

        @foreach ($activities as $data)
          <div class="col-xl-4 col-md-6">
            <div class="post-item position-relative h-100" data-aos="fade-up"
              data-aos-delay="100">

              <div class="post-img position-relative overflow-hidden">
                <img src="{{ asset('storage/' . $data->image) }}"
                  class="img-fluid" alt="">
                <span class="post-date">{{ $data->date }}</span>
              </div>

              <div class="post-content d-flex flex-column">

                <h3 class="post-title">{{ $data->title }}</h3>

                <div class="meta d-flex align-items-center">
                  <div class="d-flex align-items-center">
                    <i class="bi bi-folder2"></i> <span
                      class="ps-2">{{ $data->category }}</span>
                  </div>
                </div>

                <hr>

                <a href="{{ url('/activities/detail/' . $data->id) }}"
                  class="readmore stretched-link"><span>Selengkapnya</span><i
                    class="bi bi-arrow-right"></i></a>

              </div>

            </div>
          </div><!-- End post item -->
        @endforeach
      </div>

    </div>

  </section><!-- /Recent Posts Section -->


  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact section-bg">
    <div class="container">

      <div class="section-title">
        <h2>Kontak</h2>
        <p>Magnam dolores commodi suscipit eius consequatur ex aliquid fuga</p>
      </div>

      <div class="row mt-5 justify-content-center">

        <div class="col-lg-10">

          <div class="info-wrap">
            <div class="row">
              <div class="col-lg-4 info">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>Jambi - Muara Bulian No.KM. 15 <br>
                  Mendalo Darat<br>
                  Kec. Jambi Luar Kota<br>
                  Kab. Muaro Jambi <br>
                  Jambi</p>
              </div>

              <div class="col-lg-4 info mt-4 mt-lg-0">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>info@example.com<br>contact@example.com</p>
              </div>

              <div class="col-lg-4 info mt-4 mt-lg-0">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+62 XXXX XXXXX XX<br>+62 XXXX XXXXX XX</p>
              </div>
            </div>
          </div>

        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->
@endsection
