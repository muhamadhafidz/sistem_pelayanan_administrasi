@extends('admin.layouts.default')

@section('content')
{{-- {{  }} --}}
<div class="content">
    <div class="container-fluid">
      <h5 class="mb-2">Data Dokumen</h5>
      <div class="row">
        <div class="col-sm-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-info" style="background-color: #002a56!important"><i class="fas fa-file-alt"></i></span>

            <div class="info-box-content">
              <span class="info-box-text text-wrap">Total Dokumen yang telah dibuat</span>
              <span class="info-box-number">{{ App\Ready_document_request::count() }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-sm-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-info" style="background-color: #002a56!important"><i class="fas fa-file-signature"></i></span>

            <div class="info-box-content">
              <span class="info-box-text text-wrap">Dokumen menunggu ditanda tangani</span>
              <span class="info-box-number">{{ App\Document_request::where('status', 'diproses')->count() }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
      </div>
      
      <div class="row">
        @if (Auth::user()->hak_akses == "admin")    
        <div class="col-sm-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-info" style="background-color: #002a56!important"><i class="fas fa-hourglass-half"></i></span>

            <div class="info-box-content">
              <span class="info-box-text text-wrap">Dokumen menunggu diverifikasi</span>
              <span class="info-box-number">{{ App\Document_request::where('status', 'ditinjau')->count() }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        @endif
        
        <!-- /.col -->
      </div>
    </div>
</div>
<!-- Button trigger modal -->


@endsection

@push('after-script')
@endpush