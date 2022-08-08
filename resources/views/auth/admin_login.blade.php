@extends('user.layouts.default-auth')

@section('content')
<!-- ======= Hero Section ======= -->
  <section class="my-5">
    <div class="container text-center mb-5">
      <h3>Login <br> Sistem Informasi Pelayanan Administrasi Kependudukan Desa Jenggawur <br> (Khusus Admin & Kepala Desa)</h3>
    </div>
    <div class="container">
      @if (session('registerSuccess'))
      <div class="container pt-0">
        <div class="alert alert-success" role="alert">

          {{ __('Kamu berhasil mendaftar, silahkan lakukan login untuk masuk ke akun kamu') }}
          
        </div>
      </div>
      @endif
      <div class="row">
        <div class="col-6 offset-3 rounded"  data-aos="fade-right" data-aos-delay="100" style="background-color: #fdfdfe; border: 4px solid #f7f8f8;">
          <div class="m-5" >
            <h3>Login</h3>
            <form method="POST" action="{{ route('login') }}">
              @csrf
              <div class="form-group mt-3">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group mt-3">
                <label for="password">Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="text-center mt-3">
                <button type="submit" class="btn btn-primary">Login</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-6 offset-3 text-center" data-aos="fade-left" data-aos-delay="100">
            <a href="{{ route('user.home') }}" class="btn-get-started-home scrollto">Kembali ke Halaman utama</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Hero -->



  
@endsection

@push('after-script')

<script>
</script>
@endpush