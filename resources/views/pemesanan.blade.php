
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
<div class="container clearfix mt-5">

    <div class="row clearfix topmargin bottommargin">

        <div class="col-lg-4 col-md-6 topmargin bottommargin-sm">

            <div class="heading-block border-bottom-0">
                <h2 class="nott ls0" style="font-size: 44px; line-height: 1.2">Explore the {{@$kendaraan->nama_kendaraan}}</h2>
            </div>
            <span style="color: #BBB;">Eum nihil pretium quas aliqua, laboris ipsam diam congue natoque mollitia occaecati! Cubilia pede, numquam fringilla proident dis? Molestias repellat.<br><br>Quas perferendis urna, officiis necessitatibus deserunt recusandae urna ullamco hac do beatae cubilia iste dolorum, facilisi? Sit, hic, varius! Sollicitudin.<br><br>Nostrum feugiat beatae proident porro eleifend adipiscing nostrud aliquid sit.</span>
            <div class="clear"></div>
            <a href="#" class="button button-rounded button-black button-dark ml-0 topmargin-sm clearfix">Know More</a>

        </div>

        <div class="col-lg-4 d-md-none d-lg-block center">
            <img src="{{asset('assets/img/bg1.png')}}" alt="Car">
        </div>

        <div class="col-lg-4 col-md-6 topmargin bottommargin-sm">
            <div class="feature-box fbox-plain topmargin">
                <div class="fbox-icon">
                    <a href="#"><i class="icon-car-battery"></i></a>
                </div>
                <div class="fbox-content">
                    <h3>Long Battery Life</h3>
                    <p>Canvas provides support for Native HTML5 Videos that can be added to a Background.</p>
                </div>
            </div>

            <div class="feature-box fbox-plain topmargin">
                <div class="fbox-icon">
                    <a href="#"><i class="icon-car-cogs2"></i></a>
                </div>
                <div class="fbox-content">
                    <h3>24x7 Service</h3>
                    <p>Complete control on each &amp; every element that provides endless customization.</p>
                </div>
            </div>

            <div class="feature-box fbox-plain topmargin">
                <div class="fbox-icon">
                    <a href="#"><i class="icon-car-pump"></i></a>
                </div>
                <div class="fbox-content">
                    <h3>Petrol, Diesel &amp; LPG</h3>
                    <p>Change your Website's Primary Scheme instantly by simply adding the dark class.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5 pt-5">
        <div class="col mt-5">
            <div class="section-title">
                <h2></h2>
                <p>Pesan Sekarang</p>
            </div>

            <form action="{{ route('user.pemesanan.store', ['id' => request('id')]) }}" method="post" class="">
                @csrf
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <input type="hidden" name="kendaraan_id" value="{{@$kendaraan->id}}">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title pb-3">
                            <h2>Data Pelanggan</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 form-group">
                        <label for="">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" class="form-control" value="{{Auth::user()->name}}" id="name" required>
                    </div>
                    <div class="col-lg-6 form-group">
                        <label for="">No Telepon</label>
                        <input type="text" name="no_telepon" class="form-control" value="{{Auth::user()->no_telepon}}" id="no_telepon" required>
                    </div>
                    <div class="col-lg-12 form-group mt-3">
                        <label for="">Alamat</label>
                        <textarea rows="4" name="alamat" class="form-control" id="alamat" required>{{Auth::user()->alamat}}</textarea>
                    </div>
                    <div class="col-lg-12 form-group mt-3">
                        <label for="">Email</label>
                        <input type="text" name="email" class="form-control" value="{{Auth::user()->email}}" id="email" required>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-12">
                        <div class="section-title pb-3">
                            <h2>Data Pesanan</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 form-group">
                        <label for="">Kendaraan</label>
                        <input type="text" class="form-control" disabled value="{{@$kendaraan->nama_kendaraan}}" id="nama_kendaraan" required>
                    </div>
                    <div class="col-lg-6 form-group">
                        <label for="">Total Harga</label>
                        <input type="text" class="form-control" disabled value="{{@$kendaraan->harga}}" id="harga" required>
                    </div>
                    <div class="col-lg-12 form-group mt-3">
                        <label for="">Merk</label>
                        <input type="text" class="form-control" disabled value="{{@$kendaraan->nama_merk}}" id="merk" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <div class="form-group d-flex align-items-center">
                        <div class="form-check mr-5 px-10 py-2">
                            <input class="form-check-input" name="is_checked" required type="checkbox" value="checked" id="defaultCheck1">
                            <label class="form-check-label pl-2" for="defaultCheck1">
                            Seluruh pernyataan data dan informasi beserta seluruh dokumen yang saya <br>
                            lampirkan dalam berkas pendaftaran adalah benar.
                            </label>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="text-center"><button type="submit" class="mt-4 btn btn-warning">Pesan</button></div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')
@endpush