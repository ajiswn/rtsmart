@extends('component.layout')

@section('title', $activities_detail->title . ' - RTSmart')

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
                                    <img src="{{ asset('storage/' . $activities_detail->image) }}"alt="" class="img-fluid">
                                </div>

                                <h2 class="title">{{ $activities_detail->title }}</h2>

                                <div class="meta-top">
                                    <ul>
                                        <li class="d-flex align-items-center"><i
                                                class="bi bi-clock"></i><time
                                                datetime="{{ $activities_detail->date }}">{{ $activities_detail->date }}</time>
                                        </li>
                                    </ul>
                                </div><!-- End meta top -->

                                <div class="content mb-4">
                                    {!! nl2br(e($activities_detail->content)) !!}
                                </div><!-- End post content -->

                                <div class="meta-bottom">
                                    <i class="bi bi-folder"></i>
                                    <ul class="cats">
                                        <li><a
                                                href="{{ url('/activities/category/'.$tes=strtolower($activities_detail->category)) }}">{{ $activities_detail->category }}</a>
                                        </li>
                                    </ul>
                                </div><!-- End meta bottom -->

                            </article>

                        </div>
                    </div><!-- /Blog Details Section -->

                    <!-- Blog Comments Section -->
                    <section id="blog-comments" class="blog-comments section">
                        <div class="container">
                            <h4 class="comments-count">{{ $activities_detail->comments->count() }} Komentar</h4>
                    
                            @foreach($activities_detail->comments as $comment)
                            <div id="comment-{{ $comment->id }}" class="comment">
                                <div class="d-flex">
                                    <div class="comment-img">
                                        <img src="{{ $comment->user->warga->name ?? asset('assets/img/blank-profile.png') }}" alt="" class="rounded-circle">
                                    </div>
                                    <div>
                                        <h5>{{ $comment->user->kartukeluarga->nama }}</h5>
                                        <time datetime="{{ $comment->created_at }}">{{ $comment->created_at->format('d M, Y') }}</time>
                                        <p>{{ $comment->comment }}</p>
                                        @if(auth()->check() && auth()->id() == $comment->user_id)
                                        <a href="javascript:void(0);" class="btn btn-primary btn-sm" onclick="editComment('{{ $comment->id }}', '{{ $comment->comment }}')">Edit</a>
                                        <form action="{{ route('comments.destroy', $comment) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                        @endif
                                    </div>
                                </div>
                            </div><!-- End comment -->
                            @endforeach
                    
                            @auth
                            <div class="reply-form" id="create-comment-form">
                                <h4>Tinggalkan komentar</h4>
                                <p>Komentar sebagai <b>{{ auth()->user()->kartukeluarga->nama }}</b></p>
                                <form action="{{ route('comments.store', $activities_detail->id) }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col form-group">
                                            <textarea name="comment" class="form-control" placeholder="Masukkan Komentar Anda..." required></textarea>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Tambahkan Komentar</button>
                                    </div>
                                </form>
                            </div>
                            
                            <div class="reply-form" id="edit-comment-form" style="display: none;">
                                <h4>Edit Komentar</h4>
                                <p>Komentar sebagai {{ auth()->user()->kartukeluarga->nama }}</p>
                                <form action="{{ isset($comment) ? route('comments.update', $comment->id) : '#' }}  " method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col form-group">
                                            <textarea name="comment" class="form-control" placeholder="Masukkan Komentar Anda..." required>{{ isset($comment) ? $comment->comment : '' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Perbarui Komentar</button>
                                    </div>
                                </form>
                            </div>
                            @else
                            <p><a href="{{ route('login') }}">Login</a> untuk berkomentar</p>
                            @endauth
                        </div>
                    </section>
                    <!-- /Blog Comments Section -->
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
    </section>

    <script>
        function editComment(commentId, currentComment) {

            // Menyembunyikan form untuk membuat komentar baru
            document.getElementById('create-comment-form').style.display = 'none';
            // Menampilkan form untuk edit
            let form = document.getElementById('edit-comment-form');
            form.style.display = 'block';  // Tampilkan form edit

            // Mengisi nilai komentar yang ingin diedit
            form.querySelector('textarea[name="comment"]').value = currentComment;

            // Ubah action form menjadi route untuk update
            form.querySelector('form').action = `/comments/${commentId}`;
        }
    </script>
    
@endsection
