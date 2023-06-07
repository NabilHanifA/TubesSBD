@extends("layouts.admin_layout")
@section("admin-forum", "border-warning")

@section('content')
<div class="pagetitle">
  <h1>Kontak Pesan</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
      <li class="breadcrumb-item active">Kontak Pesan</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="card mb-5 mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0">
      <div class="card-toolbar">
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
          <!--begin::Item-->
          <li class="breadcrumb-item text-muted">
            {{-- <a class="btn btn-success text-white mt-3" onclick="$('#createModal').modal('show');"><i class="fas fa-plus mr-2"></i>Add Message</a> --}}
          </li>
          <!--end::Item-->
        </ul>
        <!--end::Breadcrumb-->
      </div> 
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-3">
      <!--begin::Table container-->
      <div class="table-responsive">
        <!--begin::Table-->
        <table id="table" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
          <thead>
            <tr>
              <th>No</th>
              <th>Email</th>
              <th>Nama Lengkap</th>
              <th>Subject</th>
              <th>Pesan</th>
              <th>Tanggal</th>
              {{-- <th style="width: 100px;">Aksi</th> --}}
            </tr>
          </thead>
        </table>
        <!--end::Table-->
      </div>
      <!--end::Table container-->
    </div>
    <!--begin::Body-->
</div>
</section>

<!-- Modal Create -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createModalLabel">Tambah Pesan</h5>
        <button type="button" class="btn" onclick="$('#createModal').modal('hide');" aria-label="Close"><i class="fas fa-times"></i></button>
      </div>
      <form id="scopeForm" name="scopeForm" method="POST" action="{{ route('admin.messages.store') }}" class="form-horizontal">
        <div class="modal-body">
          @csrf
          <div class="form-group mb-2">
              <label for="email" class="col-sm-4 control-label">Email:</label>
              <div class="col-sm-12 mt-2">
                  <input type="email" required class="form-control" id="email" name="email" placeholder="Masukan email...">
              </div>
          </div>
          <div class="form-group mb-2">
              <label for="nama_lengkap" class="col-sm-4 control-label">Nama Lengkap:</label>
              <div class="col-sm-12 mt-2">
                  <input type="text" required class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Masukan Nama Lengkap...">
              </div>
          </div>
          <div class="form-group mb-2">
              <label for="subject" class="col-sm-4 control-label">Subject:</label>
              <div class="col-sm-12 mt-2">
                  <input type="text" required class="form-control" id="subject" name="subject" placeholder="Masukan Subjek...">
              </div>
          </div>
          <div class="form-group mb-2">
              <label class="col control-label" for="pesan">Pesan :</label>
              <div class="col-sm-12 mt-2">
                  <textarea name="pesan" id="pesan" rows="5" class="form-control"></textarea>
              </div>
          </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- Modal Edit --}}
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Pesan</h5>
        <button type="button" class="btn" onclick="$('#editModal').modal('hide');" aria-label="Close"><i class="fas fa-times"></i></button>
      </div>
      <form id="updateForm" name="scopeForm" enctype="multipart/form-data" method="POST" action="" class="form-horizontal">
          <div class="modal-body">
              @method('PATCH')
              @csrf
              <div class="form-group mb-2">
                <label for="email" class="col-sm-4 control-label">Email:</label>
                <div class="col-sm-12 mt-2">
                    <input type="email" required class="form-control" id="email" name="email" placeholder="Masukan email...">
                </div>
              </div>
              <div class="form-group mb-2">
                  <label for="nama_lengkap" class="col-sm-4 control-label">Nama Lengkap:</label>
                  <div class="col-sm-12 mt-2">
                      <input type="text" required class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Masukan Nama Lengkap...">
                  </div>
              </div>
              <div class="form-group mb-2">
                  <label for="subject" class="col-sm-4 control-label">Subject:</label>
                  <div class="col-sm-12 mt-2">
                      <input type="text" required class="form-control" id="subject" name="subject" placeholder="Masukan Subjek...">
                  </div>
              </div>
              <div class="form-group mb-2">
                  <label class="col control-label" for="pesan">Pesan :</label>
                  <div class="col-sm-12 mt-2">
                      <textarea name="pesan" id="pesan" rows="5" class="form-control"></textarea>
                  </div>
              </div>
          </div>
          <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Perbarui</button>
          </div>
      </form>
    </div>
  </div>
</div>
@endsection

@push('js')
    {{-- AJAX READ --}}
    <script>
        $(document).ready( function () {
            var table = $('#table').DataTable({
                processing  : true,
                serverSide  : true,
                ajax        : "{{route('admin.messages.ajax')}}",
                columns     : [
                    {data   : 'DT_RowIndex', name: 'DT_RowIndex', orderlable: false, searchable: false},
                    {data   : 'email', name: 'email'},
                    {data   : 'nama_lengkap', name: 'nama_lengkap'},
                    {data   : 'subject', name: 'subject'},
                    {data   : 'pesan', name: 'pesan'},
                    {data   : 'tanggal_formatted', name: 'tanggal_formatted'},
                    // {data   : 'aksi', name: 'aksi', className:'text-center', orderlable: false, searchable: false}
                ],
            });
        });

        function editModal(id){
            $.get("{{url('messages/edit')}}" + "/" +id, function(data){
                $('#updateForm').attr('action', "{{ url('messages/update') }}"+"/"+id);
                $('#editModal').modal('show');
            });
        }

        function destroy(id){
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) { 
                    $.ajax({
                        type    : 'DELETE',
                        url     : "{{url('messages/delete')}}" +"/"+id,
                        data    : {_token   : "{{ csrf_token() }}"},
                        success: function (data) {
                            console.log(data)
                            if(data.status == 'success'){
                                Swal.fire(
                                'Deleted!',
                                'Your message has been deleted.',
                                'success'
                                )}
                            else{
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    html: data.message
                                });
                            }
                            $('#table').DataTable().ajax.reload();
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
                } 
                else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire(
                        'Dibatalkan',
                        'Pesan tidak jadi dihapus :)',
                        'error')
                }
            })
        }
    </script>
@endpush