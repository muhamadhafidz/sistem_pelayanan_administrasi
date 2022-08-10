@extends('admin.layouts.default')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                        <div class="row mb-3">
                            <div class="col">
                                <h4 class="card-title font-weight-normal">Ubah Pengguna</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.pengguna.update', $item->id) }}" id="form-submit" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            {{-- <p><span class="text-danger">* Wajib diisi</span></p> --}}
                            
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required value="{{ old('nama') ? old('nama') : $item->nama }}">
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">No Telepon</label>
                                <input type="text" class="form-control @error('no_tlp') is-invalid @enderror" id="no_tlp" name="no_tlp" value="{{ old('no_tlp') ? old('no_tlp') : $item->no_tlp }}">
                                @error('no_tlp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Alamat</label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat') ? old('alamat') : $item->user_detail->alamat }}">
                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="agama">Jenis Kelamin</label> <br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jk1" value="LAKI-LAKI" {{ $item->user_detail->jenis_kelamin == "LAKI-LAKI" ? 'checked' : '' }}>
                                    <label class="form-check-label" for="jk1">LAKI-LAKI</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jk2" value="PEREMPUAN" {{ $item->user_detail->jenis_kelamin == "PEREMPUAN" ? 'checked' : '' }}>
                                    <label class="form-check-label" for="jk2">PEREMPUAN</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="agama">Agama</label>
                                <select class="form-control" id="agama" name="agama">
                                  <option value="Islam" {{ $item->user_detail->agama == "Islam" ? 'selected' : '' }}>Islam</option>
                                  <option value="Kristen Protestan" {{ $item->user_detail->agama == "Kristen Protestan" ? 'selected' : '' }}>Kristen Protestan</option>
                                  <option value="Katolik" {{ $item->user_detail->agama == "Katolik" ? 'selected' : '' }}>Katolik</option>
                                  <option value="Hindu" {{ $item->user_detail->agama == "Hindu" ? 'selected' : '' }}>Hindu</option>
                                  <option value="Buddha" {{ $item->user_detail->agama == "Buddha" ? 'selected' : '' }}>Buddha</option>
                                  <option value="Konghucu" {{ $item->user_detail->agama == "Konghucu" ? 'selected' : '' }}>Konghucu</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Tempat Lahir</label>
                                <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') ? old('tempat_lahir') : $item->user_detail->tempat_lahir }}">
                                @error('tempat_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Tanggal Lahir</label>
                                <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') ? old('tanggal_lahir') : $item->user_detail->tanggal_lahir->isoFormat('YYYY-MM-DD') }}">
                                @error('tanggal_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Pekerjaan</label>
                                <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" id="pekerjaan" name="pekerjaan" value="{{ old('pekerjaan') ? old('pekerjaan') : $item->user_detail->pekerjaan }}">
                                @error('pekerjaan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="agama">Status Menikah</label> <br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status_nikah" id="nikah1" value="sudah menikah" {{ $item->user_detail->status_nikah == "sudah menikah" ? 'checked' : '' }}>
                                    <label class="form-check-label" for="nikah1">sudah menikah</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status_nikah" id="nikah2" value="belum menikah" {{ $item->user_detail->status_nikah == "belum menikah" ? 'checked' : '' }}>
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
                            <div class="btn-bap">
                                <button type="submit" id="tombol" class="btn btn-success w-100">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('after-script')
    <script>
        // function btnSbmt(){
        //     // e.prevent
        //     $("#tombol").attr("type", "submit").click();
        //     // cekForm();
        // }
        function cekForm(){
            // alert("s");
            
            
            // btnSbmt();
        }
    </script>
@endpush