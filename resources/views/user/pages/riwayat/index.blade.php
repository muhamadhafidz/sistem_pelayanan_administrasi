@extends('user.layouts.default_2')

@section('content')

<!-- ======= Services Section ======= -->
<section id="services" class="services" style="padding-bottom: 300px">
  <div class="container" data-aos="fade-up">

    <div class="section-title text-start mt-5">
      <h4>Riwayat/Status Pengajuan Dokumen</h4>
    </div>

    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif
    <div class="table-responsive">
      <table class="table" style="width: 100%">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Tanggal Diajukan</th>
            <th scope="col">Jenis Dokumen</th>
            <th scope="col">Keperluan</th>
            <th scope="col">Status</th>
            <th scope="col">keterangan</th>
            <th style="width: 20px" scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($reqs as $req)  
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>
              {{ $req->created_at->isoFormat('DD MMM YYYY') }}
            </td>
            <td>
              {{ $req->archive_document->jenis }}
            </td>
            <td>
              {{ $req->keperluan }}
            </td>
            <td>
              @if ($req->status == "selesai")
                <span class="badge badge-success">
              @elseif ($req->status == "diproses" || $req->status == "ditinjau")
                <span class="badge badge-warning">  
              @else
                <span class="badge badge-danger">  
              @endif
                {{ $req->status }}
              </span>
            </td>
            <td>
              {{ $req->keterangan }}
            </td>
            
            <td>
             @if ($req->status == 'ditinjau')  
             <form class="d-inline" action="{{ route('user.pengajuan.batal', $req->id) }}" method="POST">
               @csrf
               @method('PUT')
               <button class="btn btn-outline-danger btn-sm p-1" type="submit">Batalkan Pengajuan</button>
             </form>
             @elseif ($req->status == 'selesai')
             <form class="d-inline" action="{{ route('user.pengajuan.batal', $req->id) }}" method="POST">
               @csrf
               @method('PUT')
               <button class="btn btn-dark btn-sm p-1" type="submit"><i class="ti-printer"></i> Cetak</button>
              </form>
              @else
              -
             @endif
              
            </td>
          </tr>
          @empty
          <tr>
            <td class="text-center" colspan="6">
              Tidak ada riwayat
              <br>
              <a href="">Ajukan dokumen</a>
            </td>
          </tr>
          @endforelse
        </tbody>
      </table>
      
    </div>
  </div>
</section><!-- End Sevices Section -->


@endsection

@push('after-script')
<script>
</script>
@endpush