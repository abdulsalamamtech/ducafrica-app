@extends('homepages.main')
@section('title', 'Home Page')
@section('content')

<style>
  *{box-sizing: border-box;}
.carousel {
  position: relative;
  width: 100%;
  height: 270px;
  overflow: hidden;
  /* background-color: #cdcdcd; */
}
  .carousel-item {
    position: absolute;
    width: 100%;
    height: 270px;
    /* border: 1px solid #2e2e2e; */
    top: 0;
    left: 100%;
    &.active {
      left: 0;
      transition: all 0.3s ease-out;
    }
    /* div {height: 100%;} */
    /* .red {background-color: red;}
    .green {background-color: green;}
    .yellow {background-color: yellow;}
    .violet {background-color: violet;} */
  }
  .carousel-item img{

    width: 100%;
    height: 270px;
  }
  /* .slidImage
  {
    height: 270px;
    width: 400px;
  } */
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- Toastr -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<!-- Styles -->
	<style type="text/css">
		body {background: whitesmoke;text-align: center;}
		button{background-color: darkslategrey;color: white;border: 0;font-size: 18px;font-weight: 500;border-radius: 7px;padding: 10px 10px;cursor: pointer;white-space: nowrap;}
		#success{background: green;}
		#error{background: red;}
		#warning{background: coral;}
		#info{background: cornflowerblue;}
		#question{background: grey;}
	</style>
<section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <p data-aos="fade-down">RETREATS & COURSES</p>
          <h1 data-aos="fade-up">Welcome to ducafrica's Website.</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">
            You must be a registered user to view content on this website.
            {{-- Inform first-time users
            that they would need to
            register before
            accessing the content in
            the portal. --}}
          </h2>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
              @auth
                <a href="{{route('dashboard')}}" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                  <span>Dashboard</span>
                  <i class="bi bi-arrow-right"></i>
                </a>
                <div class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                  <form method="post" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" >
                        <div
                            lass="flex-shrink-0 w-8 h-5 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                            <i class='fa fa-sign-out'></i>
                        </div>
                        <span class="flex-1 ms-3 whitespace-nowrap">Logout</span>
                    </button>
                </form>
                </a>
              @else
                <a href="{{route('login')}}" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                  <span>Login</span>
                  <i class="bi bi-arrow-right"></i>
                </a>
                <a href="{{route('register')}}" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                  <span>Register</span>
                  <i class="bi bi-arrow-right"></i>
                </a>
              @endauth
            </div>
          </div>
        </div>
        <div class="col-lg-6 hero-img">
          <div class="carousel" data-aos="zoom-in" data-aos-delay="100">
            <div class="carousel-item">
              <div class="red">
                <img src="assets/img/center_image.jpeg" style="object-fit: cover" class="slidImage img-fluid rounded" alt="">
              </div>
            </div>
            <div class="carousel-item">
              <div class="red">
                <img src="assets/img/center_image2.jpeg" style="object-fit: cover" class="slidImage img-fluid rounded" alt="">
              </div>
            </div>
            <div class="carousel-item">
              <div class="red">
                <img src="assets/img/center_image_3.jpeg" style="object-fit: cover" class="slidImage img-fluid rounded" alt="">
              </div>
            </div>
            <div class="carousel-item">
              <div class="red">
                <img src="assets/img/center_image4.jpeg" style="object-fit: cover" class="slidImage img-fluid rounded" alt="">
              </div>
            </div>
            {{-- <div class="carousel-item">
              <div class="green"><img src="assets/img/center_image2.jpeg" style="object-fit: cover" class="slidImage img-fluid rounded mt-2 d-none d-lg-block" alt=""></div>
            </div>
            <div class="carousel-item">
              <div class="yellow">
                <img src="assets/img/center_image_3.jpeg" style="object-fit: cover" class="slidImage img-fluid rounded mt-2 d-none d-lg-block" alt="">
              </div>
            </div>
            <div class="carousel-item">
              <div class="violet"><img src="assets/img/center_image4.jpeg" style="object-fit: cover" class="slidImage img-fluid rounded mt-2 d-none d-lg-block" alt=""></div>
            </div> --}}
          </div>
          <!-- <button id="test" type="button" style="margin-top: 15px;">test</button> -->

          {{-- <div class="row">
            <div class="col-sm-12 mt-4">
              <img src="assets/img/center_image.jpeg" style="object-fit: cover" class="slidImage img-fluid rounded" alt=""data-aos="zoom-in" data-aos-delay="100">
              <img src="assets/img/center_image2.jpeg" style="object-fit: cover" class="img-fluid rounded mt-2 d-none d-lg-block" alt=""data-aos="zoom-out" data-aos-delay="300">
            </div>
            <div class="col-sm-6">
              <img src="assets/img/center_image_3.jpeg" class="img-fluid rounded d-none d-lg-block" alt=""data-aos="zoom-out" data-aos-delay="200">
              <img src="assets/img/center_image4.jpeg" style="object-fit: cover" class="img-fluid rounded mt-2 d-none d-lg-block" alt=""data-aos="zoom-in" data-aos-delay="400">
            </div>
          </div> --}}
          {{-- <img src="assets/img/center_image_3.jpeg" class="img-fluid rounded" alt=""> --}}
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= About Section ======= -->

    <!-- ======= Values Section ======= -->
    <section id="values" class="values">

      <div class="container" data-aos="fade-up">

        {{-- <header class="section-header">
          <h2>Our Values</h2>
          <div class="mt-3">
            <p class="mb-3">About Us</p>
            <h3> Eum ad dolor et. Autem aut fugiat debitis voluptatem consequuntur sit. Et veritatis id. Ad cupiditate sed est odio</h3>
          </div>
        </header> --}}

        <header class="section-header">

          <div class="mt-3">
            <p class="mb-3">How to use this site.</p>
            {{-- <h3> Eum ad dolor et. Autem aut fugiat debitis voluptatem consequuntur sit. Et veritatis id. Ad cupiditate sed est odio</h3> --}}
          </div>
        </header>
        <div class="row">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="box">
              {{-- <img src="assets/img/values-1.png" class="img-fluid" alt=""> --}}
              <h3>1. Create an account</h3>
              {{-- <p>Eum ad dolor et. Autem aut fugiat debitis voluptatem consequuntur sit. Et veritatis id.</p> --}}
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
            <div class="box">
              {{-- <img src="assets/img/values-2.png" class="img-fluid" alt=""> --}}
              <h3>2. Verify Account</h3>
              {{-- <p>Repudiandae amet nihil natus in distinctio suscipit id. Doloremque ducimus ea sit non.</p> --}}
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="600">
            <div class="box">
              {{-- <img src="assets/img/values-3.png" class="img-fluid" alt=""> --}}
              <h3>3. Login.</h3>
              {{-- <p>Quam rem vitae est autem molestias explicabo debitis sint. Vero aliquid quidem commodi.</p> --}}
            </div>
          </div>

        </div>

      </div>

    </section><!-- End Values Section -->


    <!-- ======= F.A.Q Section ======= -->
    {{-- <section id="faq" class="faq">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>F.A.Q</h2>
          <p>Frequently Asked Questions</p>
        </header>

        <div class="row">
          <div class="col-lg-6">
            <!-- F.A.Q List 1-->
            <div class="accordion accordion-flush" id="faqlist1">
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                    Non consectetur a erat nam at lectus urna duis?
                  </button>
                </h2>
                <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                  <div class="accordion-body">
                    Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-2">
                    Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque?
                  </button>
                </h2>
                <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                  <div class="accordion-body">
                    Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-3">
                    Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi?
                  </button>
                </h2>
                <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                  <div class="accordion-body">
                    Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                  </div>
                </div>
              </div>

            </div>
          </div>

          <div class="col-lg-6">

            <!-- F.A.Q List 2-->
            <div class="accordion accordion-flush" id="faqlist2">

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2-content-1">
                    Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?
                  </button>
                </h2>
                <div id="faq2-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                  <div class="accordion-body">
                    Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2-content-2">
                    Tempus quam pellentesque nec nam aliquam sem et tortor consequat?
                  </button>
                </h2>
                <div id="faq2-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                  <div class="accordion-body">
                    Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2-content-3">
                    Varius vel pharetra vel turpis nunc eget lorem dolor?
                  </button>
                </h2>
                <div id="faq2-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                  <div class="accordion-body">
                    Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Nibh tellus molestie nunc non blandit massa enim nec.
                  </div>
                </div>
              </div>

            </div>
          </div>

        </div>

      </div>

    </section><!-- End F.A.Q Section --> --}}

    <!-- ======= Portfolio Section ======= -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          {{-- <h2>Contact</h2> --}}
          <p>Contact Us</p>
        </header>

        <div class="row gy-4">

          {{-- <div class="col-lg-6">

            <div class="row gy-4">
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-geo-alt"></i>
                  <h3>Address</h3>
                  <p>--,<br>Lagos, Nigeria</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-telephone"></i>
                  <h3>Call Us</h3>
                  <p>07059882669<br></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-envelope"></i>
                  <h3>Email Us</h3>
                  <p>elarabookings@gmail.com<br>contact@ducafrica.com</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-clock"></i>
                  <h3>Open Hours</h3>
                  <p>Monday - Friday<br>9:00AM - 05:00PM</p>
                </div>
              </div>
            </div>

          </div> --}}

          <div class="col-lg-6 offset-lg-3" id="guestMessage">
            <form action="{{route('home')}}" method="post" class="_php-email-form">
              @csrf
              <div align='center'><h3 id='contactMessage'>{{$message}}</h3></div>
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                </div>

                <div class="col-md-12 text-center">
                  {{-- <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div> --}}

                  <button type="submit" name="submit" class="btn btn-primary">Send Message</button>
                </div>

              </div>
            </form>

          </div>

        </div>

      </div>

    </section><!-- End Contact Section -->
    <script>
      toastr.options = {
				'closeButton': true,
				'debug': false,
				'newestOnTop': false,
				'progressBar': false,
				'positionClass': 'toast-top-right',
				'preventDuplicates': false,
				'showDuration': '1000',
				'hideDuration': '1000',
				'timeOut': '5000',
				'extendedTimeOut': '1000',
				'showEasing': 'swing',
				'hideEasing': 'linear',
				'showMethod': 'fadeIn',
				'hideMethod': 'fadeOut',
			}

      window.onload = function(){
  var slides = document.getElementsByClassName('carousel-item'),
      addActive = function(slide) {slide.classList.add('active')},
      removeActive = function(slide) {slide.classList.remove('active')};
  addActive(slides[0]);

  setInterval(function (){
    for (var i = 0; i < slides.length; i++){
      if (i + 1 == slides.length) {
        addActive(slides[0]);
        slides[0].style.zIndex = 100;
        setTimeout(removeActive, 350, slides[i]); //Doesn't be worked in IE-9
        break;
      }
      if (slides[i].classList.contains('active')) {
        slides[i].removeAttribute('style');
        setTimeout(removeActive, 350, slides[i]); //Doesn't be worked in IE-9
        addActive(slides[i + 1]);
        break;
      }
    }
  }, 3000);


  var contactMessage = document.getElementById('contactMessage').innerHTML;
  if(contactMessage!='')
  {
    // alert(contactMessage);
    toastr.success(contactMessage);
  }
}

    </script>
@endsection
