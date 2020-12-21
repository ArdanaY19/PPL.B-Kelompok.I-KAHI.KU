
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
          <h1 class="text-light"><a href="/petani/dashboard"><span>KAHI.KU</span></a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html"><img src="dashboard/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav class="nav-menu d-none d-lg-block">
          <ul>
            <li class="{{ request()->is('petani/dashboard') ? 'active' : '' }}"><a href="/petani/dashboard">Home</a></li>
            <li class="{{ request()->is('petani/produk') ? 'active' : '' }}"><a href="/petani/produk">Produk</a></li>
            <li class="{{ request()->is('petani/verifikasi') ? 'active' : '' }}"><a href="/petani/verifikasi">Pembayaran</a></li>
            <li class="{{ request()->is('petani/pendapatan') ? 'active' : '' }}"><a href="/petani/pendapatan">Pendapatan</a></li>
            <li class="{{ request()->is('petani/artikel') ? 'active' : '' }}"><a href="/petani/artikel">Artikel</a></li>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{auth()->user()->username}}</span>
                <img class="img-profile rounded-circle" src="{{ url('foto') }}/{{ auth()->user()->petani->foto }}" width="20" height="20">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="/petani/{{auth()->user()->petani->id}}/profile">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{url('/logout')}}" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
            
          </ul>
        </nav><!-- .nav-menu -->
      </div><!-- End Header Container -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
      <h1>Selamat Datang di KAHI.KU</h1>
      <h1>{{auth()->user()->petani->nama}}</h1>
  </section><!-- End Hero -->
   
       <!-- Page Heading -->
       @yield('content')

       <footer id="footer">



<div class="container d-md-flex py-4 mt-5">

  <div class="mr-md-auto text-center text-md-left small">
    <div class="copyright">
      &copy; Copyright <strong><span>KAHI.KU</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bethany-free-onepage-bootstrap-theme/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </div>
  <div class="social-links text-center text-md-right pt-3 pt-md-0">
    <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
    <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
    <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
    <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
    <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
  </div>
</div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-success" href="/logout">Logout</a>
        </div>
      </div>
    </div>
  </div>

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