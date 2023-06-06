@extends("layouts.landing_layout")
@section("landing-beranda", "border-warning")

@section('menu')
<li><a class="nav-link scrollto active" href="#hero">Home</a></li>
<li><a class="nav-link scrollto" href="#clients">Client</a></li>
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
        <a href="#why" class="get-started-btn text-dark fw-bold mt-2">Kenapa Motor Listrik?</a>

      </div>
    </div>
  </div>
</section>

<section id="why" class="about">
  <div class="container" data-aos="fade-up">
    <div class="row flex-row-reverse align-items-center mt-5 pt-5">
      <div class="col-lg-5 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
        <img src="{{asset('assets/img/ask-1.jpg')}}" class="img-fluid h-100" alt="">
      </div>
      <div class="col-lg-7 pe-5 pt-4 pt-lg-0 order-2 order-lg-1 content features" data-aos="fade-right" data-aos-delay="100">
        <h3 class="mb-4">Kenapa harus <span class="text-warning">Motor Listrik?</span></h3>
        <p>
          Menggunakan sepeda motor listrik adalah pilihan yang cerdas dan berkelanjutan untuk kebutuhan 
          transportasi Anda. Berikut adalah deskripsi tentang mengapa Anda harus mempertimbangkan
          untuk menggunakan motor listrik:
        </p>
        <div class="icon-box mt-5 mt-lg-3" data-aos="zoom-in" data-aos-delay="150">
          <i class="bx bx-check"></i>
          <h4>Efisiensi Energi</h4>
          <p>Motor listrik memanfaatkan energi listrik dengan lebih efisien daripada motor bensin konvensional.</p>
        </div>
        <div class="icon-box mt-5 mt-lg-3" data-aos="zoom-in" data-aos-delay="150">
          <i class="bx bx-check"></i>
          <h4>Lingkungan yang Lebih Bersih</h4>
          <p>Menggunakan motor listrik berarti mengurangi emisi gas buang dan polusi udara. </p>
        </div>
        <div class="icon-box mt-5 mt-lg-3" data-aos="zoom-in" data-aos-delay="150">
          <i class="bx bx-check"></i>
          <h4>Hemat Biaya</h4>
          <p>Menggunakan motor listrik dapat mengurangi biaya operasional jangka panjang.</p>
        </div>
        <div class="icon-box mt-5 mt-lg-3" data-aos="zoom-in" data-aos-delay="150">
          <i class="bx bx-check"></i>
          <h4>Kinerja yang Tangguh</h4>
          <p>Meskipun menggunakan tenaga listrik, motor listrik dapat memberikan akselerasi yang cepat dan responsif.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="perbandingan" class="about">
  <div class="container" data-aos="fade-up">
    <div class="row content text-center mt-5 pt-5">
      <h3 class="mb-4">Perbandingan <span class="text-warning">Motor Listrik</span> & <span class="text-dark">Motor Konvensional</span></h3>
      <span>Berikut adalah perbandingan antara motor listrik dan motor konvensional:
      </span>
    </div>
    <div class="row align-items-center justify-content-center mt-3">
      <div class="col-md-4">
        <div class="card rounded-lg">
          <div class="card-body text-center">
            <img src="{{asset('assets/img/perbandingan-2.jpg')}}" style="height: 260px" class="img-fluid" alt="">
            <h4>Motor Listrik</h4>

            <div class="card mt-3">
              <div class="card-body py-2 text-start d-flex align-items-center">
                <i class="bx bx-check text-success bx-md"></i> Harga : Rp 9 jutaan
              </div>
            </div>
            <div class="card mt-2">
              <div class="card-body py-2 text-start d-flex align-items-center">
                <i class="bx bx-check text-success bx-md"></i> Emisi Karbon (CO2) : 0 - 5 g/km
              </div>
            </div>
            <div class="card mt-2">
              <div class="card-body py-2 text-start d-flex align-items-center">
                <i class="bx bx-check text-success bx-md"></i> Biaya Bahan Bakar : Rp 1,445/kWh
              </div>
            </div>
            <div class="card mt-2">
              <div class="card-body py-2 text-start d-flex align-items-center">
                <i class="bx bx-check text-success bx-md"></i> Service : Minim pemeliharaan rutin (mesin tidak melibatkan proses pembakaran)
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card rounded-lg">
          <div class="card-body text-center">
            <img src="{{asset('assets/img/perbandingan-1.png')}}" style="height: 260px" class="img-fluid" alt="">
            <h4>Motor Konvensional</h4>

            <div class="card mt-3">
              <div class="card-body py-2 text-start d-flex align-items-center">
                <i class="bx bx-x text-danger bx-md"></i> Harga : Rp 16 jutaan
              </div>
            </div>
            <div class="card mt-2">
              <div class="card-body py-2 text-start d-flex align-items-center">
                <i class="bx bx-x text-danger bx-md"></i> Emisi Karbon (CO2) : 125 g/km
              </div>
            </div>
            <div class="card mt-2">
              <div class="card-body py-2 text-start d-flex align-items-center">
                <i class="bx bx-x text-danger bx-md"></i> Biaya Bahan Bakar : Rp 10,000/liter
              </div>
            </div>
            <div class="card mt-2">
              <div class="card-body py-2 text-start d-flex align-items-center">
                <i class="bx bx-x text-danger bx-md"></i> Service : Service rutin (biaya ganti oli, ganti busi, dan rantai motor)
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="cta" class="cta">
  <div class="container" data-aos="zoom-in">

    <div class="text-center">
      <h3>Beralih ke kendaraan Listrik?</h3>
      <p>GoToMotlis memiliki beberapa fitur andalan untuk membantu anda menemukan solusi untuk kendaraan yang sehat dan ramah lingkungan</p>
      <a class="cta-btn" href="#services">Lihat Selengkapnya</a>
    </div>

  </div>
</section>

<section id="services" class="services">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Services</h2>
      <p>Check our Services</p>
    </div>

    <div class="row justify-content-center">
      <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
        <div class="icon-box">
          <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="m19.616 6.48.014-.017-4-3.24-1.26 1.554 2.067 1.674a2.99 2.99 0 0 0-1.394 3.062c.15.899.769 1.676 1.57 2.111.895.487 1.68.442 2.378.194L18.976 18a.996.996 0 0 1-1.39.922.995.995 0 0 1-.318-.217.996.996 0 0 1-.291-.705L17 16a2.98 2.98 0 0 0-.877-2.119A3 3 0 0 0 14 13h-1V5a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2v-4h1c.136 0 .267.027.391.078a1.028 1.028 0 0 1 .531.533A.994.994 0 0 1 15 16l-.024 2c0 .406.079.799.236 1.168.151.359.368.68.641.951a2.97 2.97 0 0 0 2.123.881c.406 0 .798-.078 1.168-.236.358-.15.68-.367.951-.641A2.983 2.983 0 0 0 20.976 18L21 9a2.997 2.997 0 0 0-1.384-2.52zM6 18l1-5H4l5-7-1 5h3l-5 7zm12-8a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"></path></svg></div>
          <h4><a href="">Stasiun Motlis</a></h4>
          <p>Fitur untuk menemukan stasiun pengisian kendaraan listrik yang tersebar diseluruh Indonesia</p>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
        <div class="icon-box">
          <div class="icon"><i class="bx bx-store"></i></div>
          <h4><a href="">Store Motlis</a></h4>
          <p>Menyediakan berbagai macam jenis motor listrik untuk anda yang ingin beralih ke kendaraan sehat dan ramah lingkungan</p>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
        <div class="icon-box">
          <div class="icon"><i class="bx bx-chat"></i></div>
          <h4><a href="">Forum Motlis</a></h4>
          <p>Wadah untuk peminat motor listrik untuk saling berdiskusi dan mendapatkan pengetahuan terkait motor listrik</p>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-4" data-aos="zoom-in" data-aos-delay="200">
        <div class="icon-box">
          <div class="icon"><i class="bx bx-cart"></i></div>
          <h4><a href="">Tukar Tambah Motlis</a></h4>
          <p>Wadah untuk peminat motor listrik untuk saling berdiskusi dan mendapatkan pengetahuan terkait motor listrik</p>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-4" data-aos="zoom-in" data-aos-delay="200">
        <div class="icon-box">
          <div class="icon"><i class="bx bx-cart"></i></div>
          <h4><a href="">Sewa Motlis</a></h4>
          <p>Fitur untuk anda yang ingin mencoba serta ingin berkendara menggunakan motor listrik</p>
        </div>
      </div>

    </div>

  </div>
</section>

<section id="grafik" class="about">
  <div class="container" data-aos="fade-up">
    <div class="row mt-5 pt-5">
      <div class="col-12 mt-5 content text-center">
        <h3>Grafik Perkembangan dan Target <span class="text-warning">Kendaraan Listrik</span> Roda 2/3 di Indonesia</h3>
      </div>
      <div class="col">
        <iframe id="iframe-chart" style="height:600px; width:100%; border: none;" src="https://databoks.katadata.co.id/datapublishembed/116354/proyeksi-jumlah-kendaraan-listrik-di-indonesia-hingga-2030"></iframe>
      </div>
    </div>
  </div>
</section>
@endsection