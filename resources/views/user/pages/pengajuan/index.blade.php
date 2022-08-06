@extends('user.layouts.default_2')

@section('content')
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
</div>
  <section >
    <form action="{{ route('user.pengajuan.ajukan') }}" method="POST">
        @csrf
        <div class="container text-center">
            <h3>Keperluan</h3>
        </div>
        <div class="container">
            <div class="form-group w-50 mx-auto">
                <input type="text" class="form-control" id="keperluan" name="keperluan">
            </div>
        </div>
        <div class="container text-center  mt-5">
          <h3>Silahkan pilih dokumen yang ingin dibuat</h3>
        </div>
        <section id="contact-info pt-1">
            <div class="container">
                <div class="row justify-content-center">
                    @foreach ($arcs as $arc)
                    <div class="col-md-4 mt-5">
                        <a href="" class="" onclick="checkedDocument('document{{ $arc->id }}')">
                            <div class="jenisdocument contact-info-block text-center h-100 " id="document{{ $arc->id }}Pilih">
                                <h4>{{ $arc->jenis }}</h4>
                            </div>
                        </a>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="document" id="document{{ $arc->id }}" value="{{ $arc->id }}" hidden>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <div class="text-center mt-5">
            <button type="submit" class="btn btn-success">Ajukan Dokumen</button>
        </div>
    </form>
    
  </section>  


  
@endsection

@push('after-style')
<style>
    .jenisdocument:hover{
        background-color: rgb(228, 228, 228);
    }

    .dokumenPilih{
        background-color: rgb(228, 228, 228);
    }
</style>
@endpush

@push('after-script')
<script>
    function checkedDocument(id) {
        event.preventDefault();
        $('#'+id).prop("checked", true);
        $('.dokumenPilih').removeClass('dokumenPilih');
        $('#'+id+'Pilih').addClass("dokumenPilih");
    }
</script>
@endpush
