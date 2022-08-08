@extends('admin.layouts.default')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                        <div class="row">
                            <div class="col">
                                <a href="" class="text-dark font-weight-bold"><i class="right fas fa-angle-left"></i> kembali</a>
                            </div>
                            <div class="col d-flex justify-content-end">
                                <h4 class="card-title font-weight-normal">Edit berita</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body mx-5">
                        {{-- {{ route('admin.matkul.store') }} --}}
                        <form method="POST" action="{{ route('admin.berita.update', $item->id) }}" enctype="multipart/form-data" id="form">
                            @csrf
                            @method('PUT')
                              
                            {{-- <hr> --}}
                            <div class="form-group">
                                <label for="judul">Judul berita<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('judul') is-invalid @enderror"  id="judul" name="judul" value="{{ old('judul') ? old('judul') : $item->judul }}" required>
                                @error('judul')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                                
                           
                            <div class="form-group">
                                <label for="isi">Isi </label>
                                <textarea class="description form-control @error('isi') is-invalid @enderror" name="isi" id="isi" rows="15" required>{{ old('isi') ? old('isi') : $item->isi }}</textarea>
                                @error('isi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <hr>
                            
                            <div class="form-group">
                                <label for="foto">Gambar berita</label>
                                <input type="file" class="form-control-file" id="foto" name="foto">
                              </div>
                            <div class="btn-bap text-right">
                                <button type="submit" class="btn btn-success">Ubah berita</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@push('before-style')
<link rel="stylesheet" href="{{ asset('assets/adminLte/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/adminLte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
{{-- <link rel="stylesheet" href="https://unpkg.com/jcrop/dist/jcrop.css"> --}}
{{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
@endpush
@push('after-script')
<script src="{{ asset('assets/adminLte/plugins/select2/js/select2.full.min.js') }}"></script>
{{-- <script src="https://unpkg.com/jcrop"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
<script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>

<script>
    ClassicEditor
    .create( document.querySelector( '#deskripsi' ), {
        // removePlugins: [ 'insertImage', 'insertTable', 'insertMedia' ],
        toolbar: [ 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote', 'link' ]
    } )
    .catch( error => {
        console.error( error );
    } );
        
        
       
    </script>
@endpush