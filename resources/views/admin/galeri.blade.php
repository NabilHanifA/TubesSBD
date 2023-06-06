@extends("layouts.admin_layout")
@section("admin-forum", "border-warning")

@section('content')
<div class="pagetitle">
  <h1>Galeri</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
      <li class="breadcrumb-item active">Galeri</li>
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
              <a class="btn btn-success text-white mt-3" onclick="$('#createModal').modal('show');"><i class="fas fa-plus mr-2"></i>Upload Gallery</a>
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
        <table id="table-galeri" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
          <thead>
            <tr>
              <th>No</th>
              <th>Foto</th>
              <th>Judul</th>
              <th>Deskripsi</th>
              <th>Waktu Kegiatan</th>
              <th style="width: 100px;">Aksi</th>
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
@endsection