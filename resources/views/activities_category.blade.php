@extends('component.layout')

@section('title', 'Kategori '. $var.' - RTSmart')

@section('body')
  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Kategori {{$var}}</h2>
        <ol>
          <li><a href="{{ url('/') }}">Beranda</a></li>
          <li><a href="{{ url('/article') }}">Kegiatan</a></li>
          <li>Kategori {{$var}}</li>
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
                @foreach ($category as $data)
                  <div class="col-12">
                    <article>

                      <div class="post-img">
                        <img src="{{ asset('storage/' . $data->image) }}" alt="{{ $data->title }}" class="img-fluid">
                      </div>

                      <h2 class="title">
                        <a
                          href="{{ url('/detail_article/' . $data->id) }}">{!! \Illuminate\Support\Str::limit($data->title, 50) !!}</a>
                      </h2>

                      <div class="meta-top">
                        <ul>
                          <li class="d-flex align-items-center">
                            <i class="bi bi-clock"></i><time
                              datetime="{{ $data->date }}">{{ $data->date }}</time>
                          </li>
                        </ul>
                      </div>

                      <div class="content">
                        <p>
                          {!! \Illuminate\Support\Str::limit($data->content, 150) !!}
                        </p>

                        <div class="read-more">
                          <a
                            href="{{ url('/activities/detail/' . $data->id) }}">Selengkapnya</a>
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
                <li><a href="{{ url('/activities/category/sosial') }}">Sosial
                    <span>({{ $count['sosial'] }})</span></a>
                </li>
                <li><a href="{{ url('/activities/category/keagamaan') }}">Keagamaan
                    <span>({{ $count['keagamaan'] }})</span></a>
                </li>
                <li><a href="{{ url('/activities/category/olahraga') }}">Olahraga
                    <span>({{ $count['olahraga'] }})</span></a>
                </li>
                <li><a href="{{ url('/activities/category/lingkungan') }}">Lingkungan
                    <span>({{ $count['lingkungan'] }})</span></a>
                </li>
                <li><a href="{{ url('/activities/category/pendidikan') }}">Pendidikan
                    <span>({{ $count['pendidikan'] }})</span></a>
                </li>
              </ul>


            </div><!--/Categories Widget -->

            <!-- Recent Posts Widget -->
            <div class="recent-posts-widget widget-item">

              <h3 class="widget-title">Kegiatan Terbaru</h3>

              @php $counter = 0 @endphp
              @foreach ($activities as $data)
                @if ($counter < 3)
                  <div class="post-item">
                    <img src="{{ asset('storage/' . $data->image) }}" alt="" class="img-fluid">
                    <div>
                      <h4>
                        <a href="{{ url('/activities/detail/' . $data->id) }}">{!! \Illuminate\Support\Str::limit($data->title, 25) !!}</a>
                      </h4>
                      <time datetime="{{$data->created_at}}">{{ $data->date }}</time>
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
