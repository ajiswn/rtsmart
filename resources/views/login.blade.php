@extends('component.login_layout')

@section('title','Login - RTSmart')

@section('body')
<div class="container">
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="d-flex justify-content-center py-4">
              <a href="{{ url('/') }}" class="logo d-flex align-items-center w-auto">
                <img src="assets/img/logo.png" alt="">
                <span class="d-none d-lg-block " style="color: #444444;">RT<span style="color: #1EB489;">Smart</span></span>
              </a>
            </div><!-- End Logo -->

            <div class="card mb-3">

              <div class="card-body">

                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">Login ke Akun Anda</h5>
                  <p class="text-center small">Masukkan username dan password Anda</p>
                </div>

                <form class="row g-3 needs-validation" action="{{ route('login.action') }}" method="POST">
                  @csrf
                  <div class="col-12">
                    <label for="username" class="form-label">Username</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person"></i></span>
                      <input type="text" name="username" class="form-control" id="username" placeholder="Username..." required>
                      <div class="invalid-feedback">Please enter your username!</div>
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-lock"></i></span>
                      <input type="password" name="password" class="form-control" id="password" placeholder="Password..." required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>
                  </div>
                  @if(session()->has('error'))
                  <div class="col-12 text-danger text-center">
                    {{ session('error') }}
                  </div>
                  @endif
                  <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">Login</button>
                  </div>
                  <div class="col-12">
                    <p class="text-center mb-0 small">Belum punya akun? Silahkan hubungi <a href="{{ url('/') }}">Ketua RT</a> untuk mendapatkan akun.</p>
                    <p></p>
                    <p class="small mb-0 text-center"><a href="{{ url('/') }}">Kembali ke Beranda</a></p>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>
@endsection