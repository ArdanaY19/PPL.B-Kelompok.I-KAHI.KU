
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>KAHI.KU</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="dashboard/img/favicon.png" rel="icon">
  <link href="dashboard/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('../dashboard/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('../dashboard/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
  <link href="{{ asset('../dashboard/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('../dashboard/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('../dashboard/vendor/venobox/venobox.css') }}" rel="stylesheet">
  <link href="{{ asset('../dashboard/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('../dashboard/vendor/aos/aos.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('../dashboard/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Bethany - v2.1.0
  * Template URL: https://bootstrapmade.com/bethany-free-onepage-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container">
      <div class="header-container d-flex align-items-center">
        <div class="logo mr-auto">
          <h1 class="text-light"><a href="/"><span>KAHI.KU</span></a></h1>
        </div>

        <nav class="nav-menu d-none d-lg-block">
          <ul>
            <li><a href="{{ route('login') }}" class="font-weight-bold btn btn-success text-light">LOGIN</a></li>
            <li><a href=""></a></li>
          </ul>
        </nav><!-- .nav-menu -->
      </div><!-- End Header Container -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
      <h1>Selamat Datang di KAHI.KU</h1>
      <h2 class="text-uppercase">silahkan melakukan login terlebih dahulu</h2>
  </section><!-- End Hero -->
   
       <!-- Page Heading -->
       <!-- Begin Page Content -->

     

<div class="container d-md-flex mt-5">

  <div class="mr-md-auto text-center text-md-left">
    <div class="copyright">
      &copy; Copyright <strong><span>Bethany</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bethany-free-onepage-bootstrap-theme/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </div>
</div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


  <!-- Vendor JS Files -->
  <script src="{{ asset('../dashboard/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('../dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('../dashboard/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('../dashboard/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('../dashboard/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('../dashboard/vendor/counterup/counterup.min.js') }}"></script>
  <script src="{{ asset('../dashboard/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('../dashboard/vendor/venobox/venobox.min.js') }}"></script>
  <script src="{{ asset('../dashboard/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('../dashboard/vendor/aos/aos.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('../dashboard/js/main.js') }}"></script>

  @include('sweetalert::alert')
  
</body>

</html>