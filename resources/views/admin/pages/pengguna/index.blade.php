@extends('admin.layouts.default')

@section('content')
{{-- {{  }} --}}
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if (session('password'))
                    <div class="alert alert-secondary">
                        Akun berhasil dibuat | password untuk akun tersebut : <b>{{ session('password') }}</b>
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
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                        <div class="row mb-3">
                            <div class="col">
                                <h4 class="card-title font-weight-normal">Daftar Pengguna</h4>
                            </div>
                            <div class="col text-right">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahUser">
                                    + Tambah Pengguna
                                </button>
                                
                                <!-- Modal -->
                                <div class="modal fade" id="tambahUser" tabindex="-1" aria-labelledby="tambahUserLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="tambahUserLabel">Tambah Pengguna</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body text-left">
                                            <form method="POST" action="{{ route('admin.pengguna.store') }}" id="form-submit" enctype="multipart/form-data">
                                                @csrf
                                                {{-- <p><span class="text-danger">* Wajib diisi</span></p> --}}
                                                
                                                <div class="form-group">
                                                    <label for="nik">Nomor Induk Keluarga (NIK)</label>
                                                    <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" required value="{{ old('nik') ? old('nik') : '' }}">
                                                    @error('nik')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="nama">Nama</label>
                                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required value="{{ old('nama') ? old('nama') : '' }}">
                                                    @error('nama')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required value="{{ old('email') ? old('email') : '' }}">
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="name">No Telepon</label>
                                                    <input type="text" class="form-control @error('no_tlp') is-invalid @enderror" id="no_tlp" name="no_tlp" value="{{ old('no_tlp') ? old('no_tlp') : '' }}">
                                                    @error('no_tlp')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="name">Alamat</label>
                                                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat') ? old('alamat') : '' }}">
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
                                                    <label for="name">Tempat Lahir</label>
                                                    <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') ? old('tempat_lahir') : '' }}">
                                                    @error('tempat_lahir')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="name">Tanggal Lahir</label>
                                                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') ? old('tanggal_lahir') : '' }}">
                                                    @error('tanggal_lahir')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
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
                    </div>
                    <div class="card-body">
                        <table class="table table-striped display nowrap"  id="crudTable" style="width: 100%">
                            <thead>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Nomor Telepon</th>
                                <th>Detail</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img class="" height="50" src="{{ $item->foto ?: asset('assets/admin/img/default-avatar.png') }}" alt="">
                                    </td>
                                    <td>{{ $item->nama }}
                                        <br>
                                        NIK : {{ $item->nik }}
                                    </td>
                                    <td>
                                        {{ $item->email }}
                                    </td>
                                    <td>
                                        {{ $item->no_tlp }}
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modal{{ $item->id }}">
                                            detail
                                          </button>
                                          <div class="modal fade" id="modal{{ $item->id }}" tabindex="-1" aria-labelledby="modal{{ $item->id }}Label" aria-hidden="true">
                                            <div class="modal-dialog">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="modal{{ $item->id }}Label">Detail {{ $item->nama }}</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h5 class="font-weight-bold mb-1">Detail Pengguna</h5>
                                                  @if ($item->user_detail)
                                                  <h6 class="font-weight-bold mb-1">Tempat Tanggal Lahir</h6>
                                                  <h6>{{ $item->user_detail->tempat_lahir.', '.$item->user_detail->tanggal_lahir }}</h6>
                                                  <h6 class="font-weight-bold mb-1">Alamat</h6>
                                                  <h6>{{ $item->user_detail->alamat }}</h6>
                                                  <h6 class="font-weight-bold mb-1">Jenis Kelamin</h6>
                                                  <h6>{{ $item->user_detail->jenis_kelamin }}</h6>
                                                  <h6 class="font-weight-bold mb-1">Agama </h6>
                                                  <h6>{{ $item->user_detail->agama }}</h6>
                                                  <h6 class="font-weight-bold mb-1">Pekerjaan </h6>
                                                  <h6>{{ $item->user_detail->pekerjaan }}</h6>
                                                  <h6 class="font-weight-bold mb-1">Status Nikah </h6>
                                                  <h6>{{ $item->user_detail->status_nikah }}</h6>
                                                  @else
                                                   <i>(Pengguna Belum Melengkapi data detail)</i>   
                                                  @endif
                                                    <hr>
                                                  <h5 class="font-weight-bold mb-1">Dokumen Pengguna</h5>
                                                  @if ($item->user_document)
                                                  <h6 class="font-weight-bold mb-1">KTP</h6>
                                                  <img src="{{ asset($item->user_document->ktp) }}" height="100px" alt="">
                                                  <h6 class="font-weight-bold mb-1">Kartu Keluarga</h6>
                                                  <img src="{{ asset($item->user_document->kk) }}" height="100px" alt="">
                                                  @else
                                                   <i>(Pengguna Belum Melengkapi Dokumen)</i>   
                                                  @endif
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.pengguna.edit', $item->id) }}" class="btn btn-warning btn-sm">Ubah</a>
                                        <form action="{{ route('admin.pengguna.destroy', $item->id) }}" method="post" class="ml-1 d-inline" id="form-hapus-{{ $item->id }}">
                                            @csrf
                                            @method('delete')
                                            <button type="button" onclick="hapus({{ $item->id }})" class="btn btn-danger btn-sm">Hapus akun</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Button trigger modal -->


@endsection

@push('after-script')
<script>
    function submit()
    {
        $('#form-modal').submit();
    }

    $(document).ready(function(){
        $('#crudTable').DataTable({
          dom: 'Blfrtip',
          buttons: [
                'excel',  'print',
{
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'LEGAL'
            }
            ],
          "scrollX": true
        });
    });
    function hapus(id){
        Swal.fire({
        title: 'Yakin menghapus akun user ini?',
        text: "Semua transaksi akun ini akan terhapus",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yakin, hapus akun user ini!'
        }).then((result) => {
        if (result.isConfirmed) {
            $('#form-hapus-'+id).submit();
        }
        });
    }
    
</script>
@endpush