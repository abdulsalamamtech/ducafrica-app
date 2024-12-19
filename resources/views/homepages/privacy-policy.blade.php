@extends('homepages.main')
@section('title', 'Privacy Policy')
@section('content') 
  <main id="main">
    <!-- ======= About Section ======= -->
     
    <!-- ======= Values Section ======= -->
    <section id="values" class="values">

      <div class="container" data-aos="fade-up">
 
        <header class="section-header">
         
          <div class="mt-5">
            <p class="mb-3">Privacy Policy.</p>
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
                &emsp;ducafrica.com is committed to protecting your privacy when you use our services and provide us with the personal information we require. In this policy, we explain how and why we collect your information, what we do with it, and the controls you have over its use. Any questions regarding our Privacy Policy should be directed to ducafrica.com via email at <b>contact@ducafrica.com</b>. 
                Your acceptance of these Privacy Statement terms is implied by using our website or our services, or sending us information. By doing so, you unconditionally agree to be bound by this Privacy Policy.

               </div>
                <div align="left" class="mt-4">
                <h4>What data do we collect and how do we use it?</h4>
                ducafrica.com uses your personal information to provide and manage our services, as well as conduct our operations and activities. We collect information about you for the following purposes:
                <ul>
                    <li>Identify you each time you wish to make a booking</li>
                    <li>Process a booking submitted by you on the Web Site or on the phone or in person through our Administrators and Coordinators.</li>
                    <li>Improve our Services and our Web Site</li>
                    <li>Optimize your experience</li>
                    <li>Send you information we think you may find useful, including updates on our activities</li>
                    <li>Provide any other related activities necessary to deliver the Services</li>
                </ul> 
                To access our website and book our activities, you will be required to register with us, providing information such as your name, email address, home address, and telephone number. Additional personal details may also be requested, such as dietary requirements, disability facilities needed, or infant facilities needed. When booking our activities, we may need to know your credit card details. While providing this information is optional, not doing so may result in our inability to book you into the offered activities, such as a retreat, course, or seminar.  
              </div>


                <div align="left" style="align-content: start;">
                <h4 class="mt-4">With whom is the information shared?</h4>
                ducafrica.com will not share, sell, or rent your personal information to third parties. Our website contains links to third-party sites; we recommend reading their privacy policies when visiting these sites. ducafrica.com is not responsible for the privacy policies or content of such external sites.
                <h4 class="mt-4">Security</h4>
                ducafrica.com prioritises the security of all information associated with our users. We have implemented security measures to protect against the loss, misuse, and alteration of customer data under our control. Only authorised personnel have access to user information. While we cannot guarantee that data loss, misuse, or alteration will not occur, we strive to prevent such incidents to the best of our ability.
                <h4 class="mt-4">Where is the information stored?</h4>
                Information submitted via our website or telephone services is stored on our secure data storage devices and/or secure cloud servers located  <a href="http://">http://</a>. This is necessary to process the information and send you requested information. To view the privacy statement of the organization providing our service, <a href="#">click here</a>.

                <h4 class="mt-4">Specific Services</h4>
                Retreats, courses, seminars, recollections, and other activities promoted by ducafrica.com. 
                <h4 class="mt-4">Comments</h4>
                Contact us with any questions, concerns, or comments about our Privacy Policy via email: contact@ducafrica.com.<br/>
                END OF PRIVACY POLICY
                <br/>
                Last Updated: 1st February 2024
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
