@extends('homepages.main')
@section('title', 'Terms and Conditions')
@section('content') 
  <main id="main">
    <!-- ======= About Section ======= -->
     
    <!-- ======= Values Section ======= -->
    <section id="values" class="values">

      <div class="container" data-aos="fade-up">
 
        <header class="section-header">
         
          <div class="mt-5">
            <p class="mb-3">Terms and Conditions.</p>
            {{-- <h3> Eum ad dolor et. Autem aut fugiat debitis voluptatem consequuntur sit. Et veritatis id. Ad cupiditate sed est odio</h3> --}}
          </div>
        </header>
        <div class="row">

          {{-- <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
            <h3>Account Login.</h3>
            <p>Use your email and password to login.</p>
             
          </div>  --}}
          <div class="col-md-8 offset-md-2 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="100">
              <div class="box" align='left'>
               <div align="left">
                <p>
                  Welcome to ducafrica.com! By using this website, you agree to comply with and be bound by the following terms and conditions.
                </p>
                <h4>1. Retreat and Courses Booking Terms and Conditions</h4>
                <ol type="a">
                  <li><b>Booking Acceptance and Refund:</b> <p>If your booking is accepted, you will receive a confirmation email within a week. If, for any reason, your booking cannot be accepted (e.g., due to our inability to cater to your special needs), you wish to postpone or reschedule your booking, you will receive a refund of your payment as soon as possible.</p></li>
                  <li><b>Waiting List and Booking Confirmation:</b>
                  <p>Once all spaces for the retreat or course you wish to register for are filled, you will be automatically placed on the waiting list. You will be notified if a space becomes available. Upon acceptance of your booking, you will receive a confirmation email within a week. Please print the email and bring it, along with an identification document to the retreat or course.</p>
                  </li>
                  <li><b>Cancellation Policy:</b>
                  <p>Please inquire with your Centre or referee about the cancellation policy. Free cancellation or rescheduling or postponing  is allowed up until a week before the retreat or course. After that period, a 50% charge will apply up until 24 hours before the retreat or course. No refunds will be issued thereafter (i.e., within 24 hours of the retreat or course). Please note that your booking is non-transferable unless written approval is obtained from your Centre.</p>
                  </li>

              </ol> 
              <h4>2. Your use of this website is also governed by our Privacy Policy. </h4>
              <p>Please review our Privacy Policy to understand our practices.</p>
              <h4>3. Contact Information:</h4>
            </div>
              <div align="left" class="mt-4">
                If you have any questions regarding these terms and conditions, please contact us at <font color='blue'>contact@ducafrica.com </font> 
              </div>


                 
                
            </div>
          </div>

        </div>

      </div>

    </section><!-- End Values Section -->

    <script src="{{asset('')}}assets/js/jquery-3.7.0.min.js"></script>
    <script>
        $('select[name=diets]').on('change', function()
        {
            // alert()
            if($(this).val()=='others'){

                $('#other_diets_box').show()
            }
            else{

                $('#other_diets_box').hide()
            }
        })
    </script>
@endsection
