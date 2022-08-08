@extends('admin.layouts.default')

@section('content')
{{-- {{  }} --}}
<div class="content">
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
    <div class="card-header">
      <div class="row">
        <div class="col">
          Detail Informasi Dokumen
        </div>
        <div class="col">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editDokumen">
            Ubah data
          </button>

          <!-- Modal -->
          <div class="modal fade" id="editDokumen" tabindex="-1" aria-labelledby="editDokumenLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="editDokumenLabel">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('admin.detailDokument.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h5>Data Surat :</h5>
                    <div class="form-group">
                      <label for="sktm">Surat Keterangan Tidak Mampu (SKTM)</label>
                      <input type="file" class="form-control-file" id="sktm" name="sktm">
                    </div>
                    <div class="form-group">
                      <label for="spkck">Surat Pengantar Keterangan Catatan Kepolisian</label>
                      <input type="file" class="form-control-file" id="spkck" name="spkck">
                    </div>
                    <div class="form-group">
                      <label for="domisili">Surat Keterangan Domisili</label>
                      <input type="file" class="form-control-file" id="domisili" name="domisili">
                    </div>
                    <div class="form-group">
                      <label for="hilang">Surat Keterangan Kehilangan</label>
                      <input type="file" class="form-control-file" id="hilang" name="hilang">
                    </div>
                    <div class="form-group">
                      <label for="usaha">Surat Keterangan Usaha</label>
                      <input type="file" class="form-control-file" id="usaha" name="usaha">
                    </div>
                    <h5>Data Persetujuan Dokumen : </h5>
                    <div class="form-group">
                      <label for="ttd_digital">Tanda Tangan Digital Kepala Desa</label>
                      <input type="file" class="form-control-file" id="ttd_digital" name="ttd_digital">
                    </div>
                    <div class="form-group">
                      <label for="nama_kades">Nama Kepala Desa</label>
                      <input type="text" class="form-control" id="nama_kades" name="nama_kades" value="{{ $acc->nama_kades }}">
                    </div>
                    <div class="form-group">
                      <button class="btn btn-success " type="submit"> Ubah data</button>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body">
      <h4>Data Surat :</h4>
      <h6 class="font-weight-bold mb-1">Surat Keterangan Tidak Mampu (SKTM)</h6>
      <h6><a href="{{ asset($arc[0]->file_dokumen) }}">unduh</a></h6>
      <h6 class="font-weight-bold mb-1">Surat Pengantar Keterangan Catatan Kepolisian</h6>
      <h6><a href="{{ asset($arc[1]->file_dokumen) }}">unduh</a></h6>
      <h6 class="font-weight-bold mb-1">Surat Keterangan Domisili</h6>
      <h6><a href="{{ asset($arc[2]->file_dokumen) }}">unduh</a></h6>
      <h6 class="font-weight-bold mb-1">Surat Keterangan Kehilangan</h6>
      <h6><a href="{{ asset($arc[3]->file_dokumen) }}">unduh</a></h6>
      <h6 class="font-weight-bold mb-1">Surat Keterangan Usaha</h6>
      <h6><a href="{{ asset($arc[4]->file_dokumen) }}">unduh</a></h6>
      <hr>
      <h4>Data Persetujuan Dokumen :</h4>
      <h6 class="font-weight-bold mb-1">Tanda Tangan Digital Kepala Desa</h6>
      <h6><img src="{{ asset($acc->ttd_digital) }}" height="150px" alt=""></h6>
      <h6 class="font-weight-bold mb-1">Nama Kepada Desa</h6>
      <h6>{{ $acc->nama_kades }}</h6>
    </div>
  </div>
</div>
<!-- Button trigger modal -->


@endsection

@push('after-script')
@endpush