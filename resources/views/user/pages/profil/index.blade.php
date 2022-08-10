@extends('user.layouts.default_2')

@section('content')

<main id="main">
  <!-- ======= Breadcrumbs ======= -->
  
  </section><!-- End Breadcrumbs -->
  <!-- ======= Portfolio Details Section ======= -->
  <section id="portfolio-details" class="portfolio-details pt-0">
    <div class="container">
      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-3">
              <div class="text-center pt-5">
                <img src="{{ Auth::user()->foto ?: asset('assets/admin/img/default-avatar.png') }}" alt=""  class="rounded-circle" height="200px">
                <div class="mt-3">
                  <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#fotoModal">Ubah Foto</button>
                  <!-- Modal -->
                  <div class="modal fade" id="fotoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Ubah Data Profil</h5>
                          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="{{ route('user.profil.updateFoto') }}"  enctype="multipart/form-data">
                          @csrf
                          <div class="modal-body">
                            <div class="form-group mt-3">
                                <label for="foto">Foto</label>
                                <input id="foto" type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" required autocomplete="foto" autofocus>
                                @error('foto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-warning">Simpan</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-3">
              <div class=" pt-5">
                <h5 class="font-weight-bold">Nomor Induk Keluarga (NIK)</h5>
                <p>{{ Auth::user()->nik }}</p>
                <h5 class="font-weight-bold">Nama</h5>
                <p>{{ Auth::user()->nama }}</p>
                <h5 class="font-weight-bold">Email</h5>
                <p>{{ Auth::user()->email }}</p>
                <h5 class="font-weight-bold">Nomor Telepon</h5>
                <p>{{ Auth::user()->no_tlp }}</p>
              </div>
            </div>
            <div class="col-3">
              <div class=" pt-5">
                <h5 class="font-weight-bold">Pekerjaan</h5>
                <p>{{ Auth::user()->user_detail()->first()->pekerjaan }}</p>
                <h5 class="font-weight-bold">Status Nikah</h5>
                <p>{{ Auth::user()->user_detail()->first()->status_nikah }}</p>
                <h5 class="font-weight-bold">Tempat Tanggal Lahir</h5>
                <p>{{ Auth::user()->user_detail()->first()->tempat_lahir }}, {{ Auth::user()->user_detail()->first()->tanggal_lahir->isoFormat('DD MMM YYYY') }}</p>
                <h5 class="font-weight-bold">Alamat</h5>
                <p>{{ Auth::user()->user_detail()->first()->alamat }}</p>
                <!-- Button trigger modal -->
              </div>
            </div>
            <div class="col-3">
              <div class=" pt-5">
                <h5 class="font-weight-bold">KTP</h5>
                <img src="{{ Auth::user()->user_document()->first()->ktp }}" alt="" height="100px">
                <h5 class="font-weight-bold mt-2">Kartu Keluarga</h5>
                <img src="{{ Auth::user()->user_document()->first()->kk }}" alt="" height="100px">
              </div>
            </div>
          </div>
          <div class="mt-5 text-right">
            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal">
              Ubah Profil
            </button>

            <!-- Modal -->
            <div class="modal fade text-left" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data Profil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                    <form method="POST" action="{{ route('user.profil.update', Auth::user()->id) }}" id="form-submit" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required value="{{ old('nama') ? old('nama') : Auth::user()->nama }}">
                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nik">Nomor Induk Keluarga (NIK)</label>
                            <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" required value="{{ old('nik') ? old('nik') : Auth::user()->nik }}">
                            @error('nik')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ? old('email') : Auth::user()->email }}" required autocomplete="email">
  
                          @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">No Telepon</label>
                            <input type="text" class="form-control @error('no_tlp') is-invalid @enderror" id="no_tlp" name="no_tlp" value="{{ old('no_tlp') ? old('no_tlp') : Auth::user()->no_tlp }}">
                            @error('no_tlp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Alamat</label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat') ? old('alamat') : Auth::user()->user_detail()->first()->alamat }}">
                            @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="agama">Jenis Kelamin</label> <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jk1" value="LAKI-LAKI" {{ Auth::user()->user_detail()->first()->jenis_kelamin == "LAKI-LAKI" ? 'checked' : '' }}>
                                <label class="form-check-label" for="jk1">LAKI-LAKI</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jk2" value="PEREMPUAN" {{ Auth::user()->user_detail()->first()->jenis_kelamin == "PEREMPUAN" ? 'checked' : '' }}>
                                <label class="form-check-label" for="jk2">PEREMPUAN</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <select class="form-control" id="agama" name="agama">
                              <option value="Islam" {{ Auth::user()->user_detail()->first()->agama == "Islam" ? 'selected' : '' }}>Islam</option>
                              <option value="Kristen Protestan" {{ Auth::user()->user_detail()->first()->agama == "Kristen Protestan" ? 'selected' : '' }}>Kristen Protestan</option>
                              <option value="Katolik" {{ Auth::user()->user_detail()->first()->agama == "Katolik" ? 'selected' : '' }}>Katolik</option>
                              <option value="Hindu" {{ Auth::user()->user_detail()->first()->agama == "Hindu" ? 'selected' : '' }}>Hindu</option>
                              <option value="Buddha" {{ Auth::user()->user_detail()->first()->agama == "Buddha" ? 'selected' : '' }}>Buddha</option>
                              <option value="Konghucu" {{ Auth::user()->user_detail()->first()->agama == "Konghucu" ? 'selected' : '' }}>Konghucu</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Tempat Lahir</label>
                            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') ? old('tempat_lahir') : Auth::user()->user_detail()->first()->tempat_lahir }}">
                            @error('tempat_lahir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Tanggal Lahir</label>
                            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') ? old('tanggal_lahir') : Auth::user()->user_detail()->first()->tanggal_lahir->isoFormat('YYYY-MM-DD') }}">
                            @error('tanggal_lahir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Pekerjaan</label>
                            <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" id="pekerjaan" name="pekerjaan" value="{{ old('pekerjaan') ? old('pekerjaan') : Auth::user()->user_detail()->first()->pekerjaan }}">
                            @error('pekerjaan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="agama">Status Menikah</label> <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status_nikah" id="nikah1" value="sudah menikah" {{ Auth::user()->user_detail()->first()->status_nikah == "sudah menikah" ? 'checked' : '' }}>
                                <label class="form-check-label" for="nikah1">sudah menikah</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status_nikah" id="nikah2" value="belum menikah" {{ Auth::user()->user_detail()->first()->status_nikah == "belum menikah" ? 'checked' : '' }}>
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
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-warning">Simpan</button>
                      </div>
                    </form>
                </div>
              </div>
            </div>

            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#gantiPass">
              Ubah Password
            </button>
            <div class="modal fade text-left" id="gantiPass" tabindex="-1" aria-labelledby="ganti-pass" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="ganti-pass">Ganti Foto</h5>
                      <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <form method="POST" action="{{ route('user.profil.updatePassword') }}" id="pass-form" enctype="multipart/form-data">
                          {{-- @method('PUT') --}}
                          @csrf
                          <div class="form-group">
                              <label for="password_old">Password Lama</label>
                              <input type="password" class="form-control" id="password_old" name="password_old" required >
                          </div>
                          <div class="form-group">
                              <label for="password_new">Password Baru</label>
                              <input type="password" class="form-control" id="password_new" name="password_new" required>
                          </div>
                          <div class="form-group">
                              <label for="password_new_konf">Konfirmasi Password Baru</label>
                              <input type="password" class="form-control" id="password_new_konf" name="password_confirm" required>
                          </div>
                          <button type="submit" class="btn btn-primary " id="submit-form" hidden>Simpan</button>
                      </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section><!-- End Portfolio Details Section -->
</main>
@endsection

@push('after-script')
@endpush