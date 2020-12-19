
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
          <h1 class="text-light"><a href="/customer/index"><span>KAHI.KU</span></a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html"><img src="dashboard/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav class="nav-menu d-none d-lg-block">
          <ul>
            <li class="{{ request()->is('customer/index') ? 'active' : '' }}"><a href="/customer/index">Home</a></li>
            <li class="{{ request()->is('customer/produk') ? 'active' : '' }}"><a href="/customer/produk">Produk</a></li>
            <li class="{{ request()->is('customer/history') ? 'active' : '' }}"><a href="/customer/history">Riwayat Pemesanan</a></li>
            <li class="{{ request()->is('customer/ongkir') ? 'active' : '' }}"><a href="/customer/ongkir">Ongkir</a></li>
            <li class="{{ request()->is('#') ? 'active' : '' }}"><a href="/customer/artikel">Artikel</a></li>

            <li class="nav-item {{ request()->is('customer/check_out') ? 'active' : '' }}">
                <?php
                    $transaksi_utama = \App\Transaksi::where('user_id', Auth::user()->id)->where('status', 0)->first();
                    if(!empty($transaksi_utama))
                    {
                      $notif = \App\TransaksiDetail::where('transaksi_id', $transaksi_utama->id)->count();
                    }

                ?>
                <a class="nav-link" href="{{ url('/customer/check_out') }}"><i class="fa fa-shopping-cart"></i>
                @if(!empty($notif))
                <sup><span class="badge badge-danger">{{ $notif }}</span></sup>
                @endif
                </a>
            </li>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{auth()->user()->username}}</span>
                <img class="img-profile rounded-circle" src="{{ url('foto') }}/{{ auth()->user()->customer->foto }}" width="20" height="20">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="/customer/{{auth()->user()->customer->id}}/profile">
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
      <h1 class="text-uppercase">{{auth()->user()->customer->nama}}</h1>
    </div>
  </section><!-- End Hero -->
   
       <!-- Page Heading -->
       @yield('content')

       <footer id="footer">

<div class="footer-top mt-5">
  <div class="container">
    <div class="row">

      <div class="col-lg-3 col-md-6 footer-contact">
        <h3>KAHI.KU</h3>
        <p>
          A108 Adam Street <br>
          New York, NY 535022<br>
          United States <br><br>
          <strong>Phone:</strong> +1 5589 55488 55<br>
          <strong>Email:</strong> info@example.com<br>
        </p>
      </div>

      <div class="col-lg-2 col-md-6 footer-links">
        <h4>Useful Links</h4>
        <ul>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
        </ul>
      </div>

      <div class="col-lg-3 col-md-6 footer-links">
        <h4>Our Services</h4>
        <ul>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
        </ul>
      </div>

      <div class="col-lg-4 col-md-6 footer-newsletter">
        <h4>Join Our Newsletter</h4>
        <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
        <form action="" method="post">
          <input type="email" name="email"><input type="submit" value="Subscribe">
        </form>
      </div>

    </div>
  </div>
</div>

<div class="container d-md-flex py-4">

  <div class="mr-md-auto text-center text-md-left">
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