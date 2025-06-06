<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ducafrica @yield('title')</title>
  <meta content="" name="description">

  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('')}}assets/img/favicon.png" rel="icon">
  <link href="{{asset('')}}assets/img/africa.jpg" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('')}}assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="{{asset('')}}assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{asset('')}}assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{asset('')}}assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{asset('')}}assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{asset('')}}assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('')}}assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: ducafrica - v1.10.1
  * Template URL: https://bootstrapmade.com/ducafrica-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="{{route('home')}}" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span>ducafrica</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="{{route('home')}}">Home</a></li>
          {{-- <li><a class="nav-link scrollto" href="#about">About</a></li>  --}}
          {{-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> --}}
          @auth
            <li><a class="nav-link getstarted" href="{{ route('dashboard') }}">Dashboard</a></li>
            <li>
                <form method="post" action="{{ route('logout') }}">
                  @csrf
                  <button  class="nav-link getstarted" type="submit" >Logout</button>
                </form>
            </li>
          @else
            <li><a class="getstarted" href="{{ route('register') }}">Register</a></li>
            <li><a class="getstarted _scrollto" href="{{ route('login') }}">Login</a></li>
          @endauth
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
    @yield('content')
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    {{-- News Letter  --}}

    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="index.html" class="logo d-flex align-items-center">
              <img src="assets/img/logo.png" alt="">
              <span>ducafrica</span>
            </a>
           <div class="social-links mt-3">
              {{-- <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a> --}}
            </div>
          </div>

          {{-- <div class="col-lg-2 col-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#contact-us">Contact us</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div> --}}

          {{-- <div class="col-lg-2 col-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div> --}}

          {{-- <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
            <h4>Contact Us</h4>
            <p>

              Lagos, Nigeria<br>

              <strong>Phone:</strong>07059882669<br>
              <strong>Email:</strong> elerabookings@gmail.com<br>
            </p>

          </div> --}}

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>ducafrica</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        Developed by <a href="#">Next Gen Purse</a>
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        Maintain by <a href="https://www.facebook.com/abdulsalamamtech">Amtech</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('')}}assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="{{asset('')}}assets/vendor/aos/aos.js"></script>
  <script src="{{asset('')}}assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('')}}assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{asset('')}}assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="{{asset('')}}assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="{{asset('')}}assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('')}}assets/js/main.js"></script>


</body>

</html>
