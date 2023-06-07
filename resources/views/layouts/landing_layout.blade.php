<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tubes SBD</title>
     <!-- Favicons -->
    <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
    <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/@mladenilic/threesixty.js/dist/threesixty.js"></script> --}}
	  <script src="{{asset('assets/js/360rotator.js')}}"></script>
    
    @stack('css')
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="index.html">GTM<span>.</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      @include("layouts.landing_menu")

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <div class="col-xl-6 col-lg-8">
          <h1>GoToMotlis <span>.</span></h1>
          <h2>Beralih Menuju Kendaraan Sehat dan Ramah Lingkungan</h2>
        </div>
      </div>

      <div class="row gy-4 mt-5 justify-content-center" data-aos="zoom-in" data-aos-delay="250">
        <div class="col-xl-2 col-md-4">
          <div class="icon-box @yield('landing-beranda')">
            <i class="ri-store-line"></i>
            <h3><a href="{{ route('user.landing') }}">Beranda</a></h3>
          </div>
        </div>
        <div class="col-xl-2 col-md-4">
          <div class="icon-box @yield('landing-stasiun')">
            <i class="ri-bar-chart-box-line"></i>
            <h3><a href="{{ route('user.stasiun') }}">Stasiun Motlis</a></h3>
          </div>
        </div>
        <div class="col-xl-2 col-md-4">
          <div class="icon-box @yield('landing-store')">
            <i class="ri-bar-chart-box-line"></i>
            <h3><a href="{{ route('user.store') }}">Store Motlis</a></h3>
          </div>
        </div>
        <div class="col-xl-2 col-md-4">
          <div class="icon-box @yield('landing-forum')">
            <i class="ri-calendar-todo-line"></i>
            <h3><a href="{{ route('user.forum') }}">Forum Motlis</a></h3>
          </div>
        </div>
        <div class="col-xl-2 col-md-4">
          <div class="icon-box @yield('landing-tukar-tambah')">
            <i class="ri-calendar-todo-line"></i>
            <h3><a href="{{ route('user.tukar-tambah') }}">Tukar Tambah Motlis</a></h3>
          </div>
        </div>
      </div>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    @yield('content')

  </main><!-- End #main -->

  <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">
  
      <div class="section-title">
        <h2>Contact</h2>
        <p>Contact Us</p>
      </div>
  
      <div class="row mt-3">
  
        <div class="col-lg-4">
          <div class="info">
            <div class="address">
              <i class="bi bi-geo-alt"></i>
              <h4>Location:</h4>
              <p>Jl. Kemayoran no.35 RT01/RW05 <br>
                Wates, kec. Bandung Kidul</p>
            </div>
  
            <div class="email">
              <i class="bi bi-envelope"></i>
              <h4>Email:</h4>
              <p>0895 1234 1292</p>
            </div>
  
            <div class="phone">
              <i class="bi bi-phone"></i>
              <h4>Call:</h4>
              <p>gotomotlis@gmail.com</p>
            </div>
  
          </div>
  
        </div>
  
        <div class="col-lg-8 mt-5 mt-lg-0">
  
          <form action="{{ route('user.contact') }}" method="post" class="">
            @csrf
            <div class="row">
              <div class="col-md-6 form-group">
                <input type="text" name="nama_lengkap" class="form-control" id="name" placeholder="Nama Lengkap" required>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subjek" required>
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" name="pesan" rows="5" placeholder="Pesan" required></textarea>
            </div>
            <div class="text-center"><button type="submit" class="mt-4 btn btn-warning">Send Message</button></div>
          </form>
  
        </div>
  
      </div>
  
    </div>
  </section>

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>GTM<span>.</span></h3>
              <p>
                Jl. Kemayoran no.35 RT01/RW05 <br>
                Wates, kec. Bandung Kidul<br><br>
                <strong>Phone:</strong> 0895 1234 1292<br>
                <strong>Email:</strong> gotomotlis@gmail.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Stasiun</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Store</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>GTM</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key={{env('API_KEY_GOOGLE_MAP')}}&libraries=&v=weekly&callback=Function.prototype"></script>
  <script src="https://googlemaps.github.io/js-markerclustererplus/dist/index.min.js"></script>

  @if (session('success'))
  <script>
      Swal.fire(
        '{{ session('success') }}',
        'OK',
        'success'
      )
  </script>
  @endif
  @if (session('error'))
  <script>
      Swal.fire(
        "{{ session('error') }}",
        'OK',
        'error'
      )
  </script>
  @endif
  @if($errors->any())
  <script>
  Swal.fire({
      icon: 'error',
      title: 'Gagal',
      html: '@foreach($errors->all() as $error) {!! $error."<br>" !!}@endforeach',
  })
  </script>
  @endif

  @stack('js')
</body>

</html>