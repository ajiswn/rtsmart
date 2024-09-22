@extends('component.layout')

@section('title', 'Kegiatan - RTSmart')

@section('body')
  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Kegiatan</h2>
        <ol>
          <li><a href="{{ url('/') }}">Beranda</a></li>
          <li>Kegiatan</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->

  <section class="inner-page">
    <div class="container">
      <div class="row justify-content-center">

        <div class="col-lg-8">

          <!-- Blog Posts Section -->
          <div id="blog-posts" class="blog-posts section">

            <div class="container">

              <div class="row gy-5">
                @foreach ($artikel as $data)
                  <div class="col-12">
                    <article>

                      <div class="post-img">
                        <img src="{{ asset('storage/' . $data->gambar) }}" alt="{{ $data->judul }}" class="img-fluid">
                      </div>

                      <h2 class="title">
                        <a
                          href="{{ url('/detail_article/' . $data->id) }}">{!! \Illuminate\Support\Str::limit($data->judul, 50) !!}</a>
                      </h2>

                      <div class="meta-top">
                        <ul>
                          <li class="d-flex align-items-center">
                            <i class="bi bi-clock"></i><time
                              datetime="{{ $data->tanggal }}">{{ $data->tanggal }}</time>
                          </li>
                        </ul>
                      </div>

                      <div class="content">
                        <p>
                          {!! \Illuminate\Support\Str::limit($data->konten, 150) !!}
                        </p>

                        <div class="read-more">
                          <a
                            href="{{ url('/detail_article/' . $data->id) }}">Selengkapnya</a>
                        </div>
                      </div>

                    </article>
                  </div><!-- End post list item -->
                @endforeach

              </div><!-- End blog posts list -->

            </div>

          </div>

        </div>

        <div class="col-lg-3 sidebar">

          <div class="widgets-container">

            <!-- Categories Widget -->
            <div class="categories-widget widget-item">

              <h3 class="widget-title">Kategori</h3>
              <ul class="mt-3">
                <li><a href="{{ url('/article/category/sosial') }}">Sosial
                    <span>({{ $hitung['sosial'] }})</span></a>
                </li>
                <li><a href="{{ url('/article/category/keagamaan') }}">Keagamaan
                    <span>({{ $hitung['keagamaan'] }})</span></a>
                </li>
                <li><a href="{{ url('/article/category/olahraga') }}">Olahraga
                    <span>({{ $hitung['olahraga'] }})</span></a>
                </li>
                <li><a href="{{ url('/article/category/lingkungan') }}">Lingkungan
                    <span>({{ $hitung['lingkungan'] }})</span></a>
                </li>
                <li><a href="{{ url('/article/category/pendidikan') }}">Pendidikan
                    <span>({{ $hitung['pendidikan'] }})</span></a>
                </li>
              </ul>


            </div><!--/Categories Widget -->

            <!-- Recent Posts Widget -->
            <div class="recent-posts-widget widget-item">

              <h3 class="widget-title">Kegiatan Terbaru</h3>

              @php $counter = 0 @endphp
              @foreach ($artikel as $data)
                @if ($counter < 3)
                  <div class="post-item">
                    <img src="{{ asset('storage/' . $data->gambar) }}" alt="" class="img-fluid">
                    <div>
                      <h4>
                        <a href="{{ url('/detail_article/' . $data->id) }}">{!! \Illuminate\Support\Str::limit($data->judul, 25) !!}</a>
                      </h4>
                      <time datetime="{{$data->created_at}}">{{ $data->tanggal }}</time>
                    </div>
                  </div><!-- End recent post item-->
                  @php $counter++ @endphp
                @else
                @break
              @endif
            @endforeach


          </div><!--/Recent Posts Widget -->

        </div>

      </div>

    </div>
  </div>
</section>
@endsection
