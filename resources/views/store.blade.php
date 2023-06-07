@extends("layouts.landing_layout")
@section("landing-store", "border-warning")

@section('menu')
{{-- <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
<li><a class="nav-link scrollto" href="#about">About</a></li> --}}
@endsection

@push('css')
<link href="{{asset('assets/css/car.css')}}" rel="stylesheet">
@endpush

@section('content')
<div class="container section mt-5">
    <div class="row">
        <div class="section-title">
            <h2>Tersedia berbagai macam kendaraan listrik</h2>
            <p>Store Motlis</p>
        </div>

        <div id="portfolio" class="portfolio row grid-container gutter-20 col-mb-30" data-layout="fitRows">
        
            @foreach ($kendaraan as $item)
                <article class="portfolio-item col-12 about col-sm-6 col-lg-4 mt-4 cf-sedan">
                    <div class="grid-inner">
                        <div class="portfolio-image">
                            <img src="{{$item->img}}" alt="img-car" class="w-100" style="height: 260px; object-fit: cover; object-position: bottom">
                            <div class="filter-p-pricing text-center">
                                <span class="p-price font-weight-bold ls1">Rp. {{ number_format($item->harga) }}</span>
                            </div>
                        </div>
                        <div class="portfolio-desc mt-3">
                            <h3>{{ $item->nama_kendaraan }}</h3>
                            <span>{{ $item->deskripsi }}</span>
                        </div>
                        <div class="row no-gutters car-p-features font-primary clearfix">
                            <div class="col-6 p-0"><i class="icon-car-meter"></i><span> Merk</span></div>
                            <div class="col-6 p-0"><i class="icon-car-door"></i><span> {{ $item->nama_merk }}</span></div>

                            <div class="col-6 p-0"><i class="icon-car-meter"></i><span> Tahun Produksi</span></div>
                            <div class="col-6 p-0"><i class="icon-car-door"></i><span> {{ $item->tahun_produksi }}</span></div>

                            <div class="col-6 p-0"><i class="icon-car-fuel2"></i><span> Jarak Tempuh</span></div>
                            <div class="col-6 p-0"><i class="icon-car-signal"></i><span> {{ $item->jarak_tempuh }}km/jam</span></div>

                            <div class="col-6 p-0"><i class="icon-car-fuel2"></i><span> Baterai</span></div>
                            <div class="col-6 p-0"><i class="icon-car-signal"></i><span> {{ $item->spesifikasi }} | {{ $item->kapasitas }}kWh</span></div>
                        </div>
                        <div class="row font-primary clearfix">
                            <div class="col-12">
                                <a href="{{ route('user.pemesanan', ['id' => $item->id]) }}" class="btn btn-warning mt-3">Pesan Sekarang</a>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
        
        
        </div>
    </div>
</div>
@endsection