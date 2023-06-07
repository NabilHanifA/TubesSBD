@extends("layouts.admin_layout")
@section("admin-forum", "border-warning")

@section('content')
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
      <div class="col-md-3">
        <div class="card ">
          <div class="card-header">
            Total Pesanan
          </div>
          <div class="card-body">
            {{$data->total_pesanan}}
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card ">
          <div class="card-header">
            Total Kendaraan
          </div>
          <div class="card-body">
            {{$data->total_kendaraan}}
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card ">
          <div class="card-header">
            Total Baterai
          </div>
          <div class="card-body">
            {{$data->total_baterai}}
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card ">
          <div class="card-header">
            Total Stasiun
          </div>
          <div class="card-body">
            {{$data->total_stasiun}}
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Monitoring Status Pesanan
          </div>
          <div class="card-body">
            <div id="chart"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Top Provinsi dengan Stasiun Terbanyak
          </div>
          <div class="card-body py-3">
            <!--begin::Table container-->
            <div class="table-responsive">
              <!--begin::Table-->
              <table id="table-galeri" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Provinsi</th>
                    <th>Jumlah Stasiun</th>
                  </tr>
                </thead>
              </table>
              <!--end::Table-->
            </div>
            <!--end::Table container-->
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
var options = {
  series: [{
    name: 'Total Pesanan',
    data: [44, 55, 57]
  }],
    chart: {
    type: 'bar',
    height: 350
  },
  plotOptions: {
    bar: {
      horizontal: false,
      columnWidth: '55%',
      endingShape: 'rounded'
    },
  },
  dataLabels: {
    enabled: false
  },
  stroke: {
    show: true,
    width: 2,
    colors: ['transparent']
  },
  xaxis: {
    categories: ['Pending', 'Proses', 'Selesai'],
  },
  yaxis: {
    title: {
      text: '$ (thousands)'
    }
  },
  fill: {
    opacity: 1
  },
};

$(document).ready(function () {
  $.ajax({
    method: 'get',
    url: "{{ route('user.count-pesanan') }}",
    data: {_token: "{{csrf_token()}}", "tahun": null},
    success: function(res){
      options.series[0].data = [res.pesanan_pending, res.pesanan_proses, res.pesanan_selesai]
      var chart = new ApexCharts(document.querySelector("#chart"), options);
      chart.render();
    },
    error: function(res){
      console.log(res);
    }
  })

  var table = $('#table-galeri').DataTable({
      processing  : true,
      serverSide  : true,
      ajax        : "{{route('user.top-provinsi-stasiun')}}",
      columns     : [
          {data   : 'DT_RowIndex', name: 'DT_RowIndex', orderlable: false, searchable: false},
          {data   : 'nama_provinsi', name: 'nama_provinsi'},
          {data   : 'total_stasiun', name: 'total_stasiun'},
      ],
  });
});
</script>
@endpush