@extends('user.layouts.default-auth')

@section('content')

  <section class="my-5">
    <div class="container text-center mb-5">
      <h3>Selamat Datang di <br> Sistem Informasi Pelayanan Administrasi Kependudukan Desa Jenggawur</h3>
    </div>
    <div class="container">
      @if (session('registerSuccess'))
      <div class="container pt-0">
        <div class="alert alert-success" role="alert">

          {{ __('Kamu berhasil mendaftar, silahkan lakukan login untuk masuk ke akun kamu') }}
          
        </div>
      </div>
      @endif
      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
      <div class="row">
        <div class="col-6 offset-3 rounded"  data-aos="fade-right" data-aos-delay="100" style="background-color: #fdfdfe; border: 4px solid #f7f8f8;">
            <div class="m-5" >
                <h3>Daftar</h3>
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mt-3">
                        <label for="nama">Nama</label>
                        <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="nama" autofocus>

                        @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="nik">Nomor Induk Keluarga (NIK)</label>
                        <input id="nik" type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ old('nik') }}" required autocomplete="nik" autofocus>

                        @error('nik')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="no_tlp">Nomor Telepon</label>
                        <input id="no_tlp" type="text" class="form-control @error('no_tlp') is-invalid @enderror" name="no_tlp" value="{{ old('no_tlp') }}" required autocomplete="no_tlp" autofocus>

                        @error('no_tlp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input id="tempat_lahir" type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required autocomplete="tempat_lahir" autofocus>

                        @error('tempat_lahir')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input id="tanggal_lahir" type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required autocomplete="tanggal_lahir" autofocus>

                        @error('tanggal_lahir')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea id="alamat" type="alamat" class="form-control @error('alamat') is-invalid @enderror" name="alamat" required autocomplete="alamat">{{ old('alamat') }}</textarea>

                        @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="agama">Jenis Kelamin</label> <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="jk1" value="LAKI-LAKI">
                            <label class="form-check-label" for="jk1">LAKI-LAKI</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="jk2" value="PEREMPUAN" >
                            <label class="form-check-label" for="jk2">PEREMPUAN</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="agama">Agama</label>
                        <select class="form-control" id="agama" name="agama">
                          <option value="Islam">Islam</option>
                          <option value="Kristen Protestan">Kristen Protestan</option>
                          <option value="Katolik">Katolik</option>
                          <option value="Hindu">Hindu</option>
                          <option value="Buddha">Buddha</option>
                          <option value="Konghucu">Konghucu</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Pekerjaan</label>
                        <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" id="pekerjaan" name="pekerjaan" value="{{ old('pekerjaan') ? old('pekerjaan') : '' }}">
                        @error('pekerjaan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="agama">Status Menikah</label> <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status_nikah" id="nikah1" value="sudah menikah" >
                            <label class="form-check-label" for="nikah1">sudah menikah</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status_nikah" id="nikah2" value="belum menikah" >
                            <label class="form-check-label" for="nikah2">belum menikah</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ktp">Foto KTP</label>
                        <input type="file" class="form-control-file" id="ktp" name="ktp">
                    </div>
                    <div class="form-group">
                        <label for="kk">Foto Kartu Keluarga</label>
                        <input type="file" class="form-control-file" id="kk" name="kk">
                      </div>
                    <div class="form-group mt-3">
                        <label for="password">Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="repassword">Ulangi Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary">Daftar</button>
                    </div>
                </form>
            </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-6 offset-3 text-center" data-aos="fade-left" data-aos-delay="100">
            <h4>Sudah mempunyai akun ?</h4>
            <div class="text-center">
            <a href="{{ route('login') }}" class="btn-get-started scrollto">Login</a>
            <a href="{{ route('user.home') }}" class="btn-get-started-home scrollto">Kembali ke Halaman utama</a>
            </div>
        </div>
      </div>
    </div>
  </section>  


  
@endsection

@push('after-script')

<script>
</script>
@endpush
