@extends('admin.layouts.default')

@section('content')
{{-- {{  }} --}}
<div class="container-fluid">
  <div class="row">
      <div class="col-md-12">
          <div class="card strpied-tabled-with-hover">
              <div class="card-header ">
                  <div class="row ">
                      <div class="col ">
                          
                        <h2 class="card-title font-weight-bold ">Daftar berita </h2>
                      </div>
                      <div class="col text-right">
                        <a href="{{ route('admin.berita.create') }}" class="btn btn-success btn-sm">+ Tambah berita</a>
                      </div>
                  </div>
              </div>
              <div class="card-body">
                  <table class="table table-striped display nowrap" id="crudTable" style="width: 100%">
                      <thead>
                          <th>No</th>
                          <th>Foto</th>
                          <th>Judul</th>
                          <th>Isi</th>
                          <th>Aksi</th>
                      </thead>
                      <tbody>
                          @foreach ($data as $item)
                          {{-- {{ dd($data) }} --}}
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img class="" height="50" src="{{ asset( $item->foto ) }}" alt="">
                            </td>
                            <td>{{ $item->judul }}</td>
                            <td>
                                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modal{{ $item->id }}">
                                    detail
                                  </button>
                                  <div class="modal fade" id="modal{{ $item->id }}" tabindex="-1" aria-labelledby="modal{{ $item->id }}Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="modal{{ $item->id }}Label">Detail berita {{ $item->judul }}</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                            {{ $item->isi }}
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </td>
                            <td class="align-middle">
                              <a href="{{ route('admin.berita.edit',$item->id) }}" class="btn btn-warning btn-sm">Ubah</a>
                              <form action="{{ route('admin.berita.destroy', $item->id) }}" method="post" id="form-hapus-{{ $item->id }}" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="button" onclick="hapus({{ $item->id }})" class="btn btn-danger btn-sm">Hapus</button>
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
<!-- Button trigger modal -->
<!-- Modal -->


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
"lengthMenu": [ 10, 25, 50, 75, 100 ],
          "columnDefs": [
            { "width": "5%", "targets": 0 },
          ],
          "scrollX": true
        });
        // $('#reservation').daterangepicker();
    });
    function hapus(id){
        Swal.fire({
        title: 'Yakin menghapus berita ini?',
        text: "",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yakin, hapus berita ini!'
        }).then((result) => {
        if (result.isConfirmed) {
            $('#form-hapus-'+id).submit();
        }
        });
    }
  

    
</script>
@endpush