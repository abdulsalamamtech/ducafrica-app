@extends('homepages.main')
@section('title', 'Activation Page')
@section('content') 
  <main id="main">
    <!-- ======= About Section ======= -->
     
    <!-- ======= Values Section ======= -->
    <section id="values" class="values">

      <div class="container" data-aos="fade-up">
 
        <header class="section-header">
         
          <div class="mt-5">
            <p class="mb-3">Account Registration.</p>
            {{-- <h3> Eum ad dolor et. Autem aut fugiat debitis voluptatem consequuntur sit. Et veritatis id. Ad cupiditate sed est odio</h3> --}}
          </div>
        </header>
        <div class="row">

          {{-- <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
            <h3>Account Login.</h3>
            <p>Use your email and password to login.</p>
             
          </div>  --}}
          <div class="col-md-8 offset-md-2 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="100">
            <div class="box">
                 
                 <h4>Your registration was successful, and an activation link has been sent to the email address you entered.
                  Note that you must activate the account by selecting the activation link when you get the email before you can log in.</h4>
            </div>
          </div>

        </div>

      </div>

    </section><!-- End Values Section -->
@endsection