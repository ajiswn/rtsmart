@extends('component.layout')

@section('title', $detail_artikel->judul . ' - RTSmart')

@section('body')
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Detail Kegiatan</h2>
                <ol>
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li>Detail Kegiatan</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-lg-8">

                    <!-- Blog Details Section -->
                    <div id="blog-details" class="blog-details section">
                        <div class="container">

                            <article class="article">

                                <div class="post-img">
                                    <img src="{{ asset('storage/' . $detail_artikel->gambar) }}"alt="" class="img-fluid">
                                </div>

                                <h2 class="title">{{ $detail_artikel->judul }}</h2>

                                <div class="meta-top">
                                    <ul>
                                        <li class="d-flex align-items-center"><i
                                                class="bi bi-clock"></i><time
                                                datetime="{{ $detail_artikel->tanggal }}">{{ $detail_artikel->tanggal }}</time>
                                        </li>
                                    </ul>
                                </div><!-- End meta top -->

                                <div class="content mb-4">
                                    {!! nl2br(e($detail_artikel->konten)) !!}
                                </div><!-- End post content -->

                                <div class="meta-bottom">
                                    <i class="bi bi-folder"></i>
                                    <ul class="cats">
                                        <li><a
                                                href="{{ url('/article/category/'.$tes=strtolower($detail_artikel->kategori)) }}">{{ $detail_artikel->kategori }}</a>
                                        </li>
                                    </ul>
                                </div><!-- End meta bottom -->

                            </article>

                        </div>
                    </div><!-- /Blog Details Section -->
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
    </section>
@endsection
