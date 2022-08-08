@extends('admin.layouts.default')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <div class="card ">
                    <div class="card-header">
                        <h5 class="font-weight-bold">Profil {{ ucwords(Auth::user()->hak_akses) }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="container my-4">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <div class="foto w-50 mx-auto">
                                        <img src="{{ Auth::user()->foto != null ? asset(Auth::user()->foto) : asset('assets/admin/img/default-avatar.png') }}" class="img-fluid rounded-circle mb-2" alt=""> <br>
                                        <button type="button" class="btn btn-link" data-toggle="modal" data-target="#gantiFoto">
                                            Ganti foto
                                        </button>
                                    </div>
                                    <h3 class="font-weight-bold">{{ Auth::user()->nama }}</h3>
                                    <h5>{{ Auth::user()->email }}</h5>
                                    <div class="btn-profil mt-5">
                                        
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#gantiEmail">
                                            Ubah Email
                                        </button>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#gantiPass">
                                            Ubah Password
                                        </button>
                                            
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

<!-- Modal ganti pass -->
<div class="modal fade" id="gantiEmail" tabindex="-1" aria-labelledby="ganti-pass" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ganti-pass">Ganti Email</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('admin.profil.update', 'update') }}" id="form-submit">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required value="{{ old('email') ? old('email') : Auth::user()->email }}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="btn-bap">
                    <button type="submit" id="tombol" class="btn btn-success w-100">Simpan</button>
                </div>
            </form>
        </div>
        <div class="modal-footer">s
        </div>
      </div>
    </div>
</div>
<!-- Modal ganti pass -->
<div class="modal fade" id="gantiPass" tabindex="-1" aria-labelledby="ganti-pass" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ganti-pass">Ganti Foto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('admin.profil.updatePassword') }}" id="pass-form" enctype="multipart/form-data">
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
          <button type="button" onclick="submitPass()" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </div>
</div>
<!-- Modal ganti pass -->
<div class="modal fade" id="gantiFoto" tabindex="-1" aria-labelledby="ganti-pass" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ganti-pass">Ganti Foto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{ route('admin.profil.ubahFoto') }}" id="edit-banner-form" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="foto">Foto Profil</label>
                    <input type="file" class="form-control" id="foto" name="foto" >
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
        </form>
      </div>
    </div>
</div>


@endsection
@push('after-script')
    <script>
        function submitFoto(){
            $('#foto-form').submit();
        }
        function submitPass(){
            // var lama = $("#password_old").val();
            // var baru = $("#password_new").val();
            // var konf = $("#password_new_konf").val();
            // if (lama == "") {
                
            // }
            $('#submit-form').click();
        }
    </script>
@endpush