@extends('user.layouts.default_2')

@section('content')

  <section >
    <div class="container text-center mb-5">
      <h3>Selamat Datang di <br> Sistem Informasi Pelayanan Administrasi Kependudukan Desa Jenggawur</h3>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Dokumen diajukan</h5>
                        <h3>{{ Auth::user()->document_requests()->count() }}</h3>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Dokumen selesai</h5>
                        <h3>{{ Auth::user()->document_requests()->where('status', 'selesai')->count() }}</h3>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Dokumen diproses</h5>
                        <h3>{{ Auth::user()->document_requests()->where('status', 'diproses')->count() }}</h3>
                    </div>
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
