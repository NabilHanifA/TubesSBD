@extends("layouts.landing_layout")
@section("landing-beranda", "border-warning")

@section('menu')
<li><a class="nav-link scrollto active" href="#hero">Home</a></li>
<li><a class="nav-link scrollto" href="#about">About</a></li>
@endsection

@section('content')
<section id="clients" class="clients mt-5">
  <div class="container" data-aos="zoom-in">
    <div class="section-title text-center">
      <h2>Clients</h2>
      <p>Supported By</p>
    </div>

    <div class="clients-slider swiper">
      <div class="swiper-wrapper align-items-center">
        <div class="swiper-slide"><img src="{{asset('assets/img/clients/client-1.png')}}" class="img-fluid" alt=""></div>
        <div class="swiper-slide"><img src="{{asset('assets/img/clients/client-2.png')}}" class="img-fluid" alt=""></div>
        <div class="swiper-slide"><img src="{{asset('assets/img/clients/client-3.png')}}" class="img-fluid" alt=""></div>
        <div class="swiper-slide"><img src="{{asset('assets/img/clients/client-4.png')}}" class="img-fluid" alt=""></div>
        <div class="swiper-slide"><img src="{{asset('assets/img/clients/client-5.png')}}" class="img-fluid" alt=""></div>
        <div class="swiper-slide"><img src="{{asset('assets/img/clients/client-6.png')}}" class="img-fluid" alt=""></div>
        <div class="swiper-slide"><img src="{{asset('assets/img/clients/client-7.png')}}" class="img-fluid" alt=""></div>
        <div class="swiper-slide"><img src="{{asset('assets/img/clients/client-8.png')}}" class="img-fluid" alt=""></div>
      </div>
      <div class="swiper-pagination"></div>
    </div>

  </div>
</section>

<section id="about" class="about">
  <div class="container" data-aos="fade-up">

    <div class="row">
      <div class="col-lg-5 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
        <img src="{{asset('assets/img/motlis-5.jpg')}}" class="img-fluid border border-warning h-100" alt="">
      </div>
      <div class="col-lg-7 pe-5 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right" data-aos-delay="100">
        <h3 class="mb-4">Tentang <span class="text-warning">GoToMotlis.</span></h3>
        <p>
          GoToMotlis adalah platform inovatif yang dirancang khusus untuk meningkatkan
          penggunaan sepeda motor listrik! Kami menyediakan solusi yang praktis dan ramah lingkungan
          untuk mobilitas harian Anda. Dengan menggunakan aplikasi GoToMotlis,
          Anda akan mengalami kebebasan berkeliling kota dengan hemat biaya
          dan berkontribusi pada upaya perlindungan lingkungan.
        </p>
        <p>
          GoToMotlis adalah solusi terdepan bagi mereka yang ingin mengadopsi gaya hidup ramah lingkungan 
          tanpa mengorbankan kenyamanan atau efisiensi. 
          Bergabunglah dengan komunitas kami sekarang dan jadilah bagian dari revolusi sepeda motor listrik!
        </p>
      </div>
    </div>

    <div class="row flex-row-reverse align-items-center mt-5 pt-5">
      <div class="col-lg-5 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
        <img src="{{asset('assets/img/ask-1.jpg')}}" class="img-fluid h-100" alt="">
      </div>
      <div class="col-lg-7 pe-5 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right" data-aos-delay="100">
        <h3 class="mb-4">Kenapa harus <span class="text-warning">Motor Listrik?</span></h3>
        <p>
          Motor listrik 
        </p>
        <p>
          GoToMotlis adalah solusi terdepan bagi mereka yang ingin mengadopsi gaya hidup ramah lingkungan 
          tanpa mengorbankan kenyamanan atau efisiensi. 
          Bergabunglah dengan komunitas kami sekarang dan jadilah bagian dari revolusi sepeda motor listrik!
        </p>
      </div>
    </div>

    <div class="row mt-5 pt-5">
      <div class="col-12 mt-5 content text-center">
        <h3>Grafik Perkembangan dan Target Kendaraan Listrik Roda 2/3 di Indonesia</h3>
      </div>
      <div class="col">
        <iframe id="iframe-chart" style="height:600px; width:100%; border: none;" src="https://databoks.katadata.co.id/datapublishembed/116354/proyeksi-jumlah-kendaraan-listrik-di-indonesia-hingga-2030"></iframe>
      </div>
    </div>


  </div>
</section>



@endsection