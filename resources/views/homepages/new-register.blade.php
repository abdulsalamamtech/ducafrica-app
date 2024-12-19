@extends('homepages.main')
@section('title', 'Registration Page')
@section('content')


@php
        $states=[
            "Abia",
            "Adamawa",
            "Akwa Ibom",
            "Anambra",
            "Bauchi",
            "Bayelsa",
            "Benue",
            "Borno",
            "Cross River",
            "Delta",
            "Ebonyi",
            "Edo",
            "Ekiti",
            "Enugu",
            "FCT - Abuja",
            "Gombe",
            "Imo",
            "Jigawa",
            "Kaduna",
            "Kano",
            "Katsina",
            "Kebbi",
            "Kogi",
            "Kwara",
            "Lagos",
            "Nasarawa",
            "Niger",
            "Ogun",
            "Ondo",
            "Osun",
            "Oyo",
            "Plateau",
            "Rivers",
            "Sokoto",
            "Taraba",
            "Yobe",
            "Zamfara"
        ];

        $centers = [];
        $centers[] = 'Iwollo Conference Centre';
        $centers[] = 'Lagoon School';
        $centers[] = 'Imoran Centre';
        $centers = [];
        // dd($centers);

@endphp

  <main id="main">
    <!-- ======= About Section ======= -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
    <!-- ======= Values Section ======= -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <section id="values" class="values">

      <div class="container" data-aos="fade-up">

        <header class="section-header">

          <div class="mt-5">
            <p class="mb-3">Account Sign Up.</p>
            {{-- <h3> Eum ad dolor et. Autem aut fugiat debitis voluptatem consequuntur sit. Et veritatis id. Ad cupiditate sed est odio</h3> --}}
          </div>
        </header>
        <div class="row">

          {{-- <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
            <h3>Account Login.</h3>
            <p>Use your email and password to login.</p>

          </div>  --}}
          <div class="col-md-8 offset-md-2 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="100">

            <div align='center'><h4><font color='red'> {{session('error')}}</font></h4></div>
            <div class="box"  align='left'>
                <form method="POST" action="{{ route('register') }}"  align='left'>
                  @csrf
                  @method('post')

                  <div class="row mb-3">
                    {{-- <div class="col-md-4 mt-3 mb-3">Title</div> --}}
                    <div class="col-md-4 mb-3">
                      <label for="title" class="col-md-4_ col-form-label text-md-start">{{ __('Title') }}</label>
                      <select id="title" class="form-select @error('title') is-invalid @enderror" name="title" required>
                        <option value="Mrs">Mrs.</option>
                        <option value="Ms">Ms.</option>
                      </select>

                      @error('title')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    {{-- <div class="col-md-4 mt-3 mb-3"></div> --}}

                    <div class="col-md-4">
                        <label for="first_name" class="col-md-4_ col-form-label text-md-start">{{ __('First Name') }} <font color="red">*</font></label>
                          <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                          @error('first_name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                    </div>

                    <div class="col-md-4">
                      <label for="last_name" class="col-md-4_ col-form-label text-md-start">{{ __('Last Name ') }}<font color="red">*</font></label>
                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                        @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
                  <div class="col-md-4">
                    <label for="other_name" class="col-md-4_ col-form-label text-md-start">{{ __('Other Name') }}</label>
                      <input id="other_name" type="text" class="form-control @error('other_name') is-invalid @enderror" name="other_name" value="{{ old('other_name') }}" autocomplete="other_name" autofocus>

                      @error('other_name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                   </div>

                    <div class="col-md-4 mt-3">
                        <label for="email" class="col-md-4_ col-form-label text-md-start">{{ __('Email Address ') }}<font color="red">*</font></label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4 mt-3">
                      <label for="dob" class="col-md-4_ col-form-label text-md-start">{{ __('Date Of Birth ') }}<font color="red">*</font></label>
                      <input id="dob" type="date" class="form-control" name="dob" value="{{ old('dob') }}" required>

                      @error('dob')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    <div class="col-md-4 mt-3">
                        <label for="phone" class="col-md-4_ col-form-label text-md-start">{{ __('Phone ') }}<font color="red">*</font></label>
                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="new-phone">

                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4 mt-3 mb-3">
                        <label for="phone_type" class="col-md-4_ col-form-label text-md-start">{{ __('Phone Type') }}</label>
                        <select id="phone_type" class="form-select @error('phone_type') is-invalid @enderror" name="phone_type" required>
                          <option value="mobile">Mobile Number.</option>
                          <option value="whatsapp">Whatsapp Number.</option>
                        </select>

                        @error('phone_type')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-4 mt-3">
                      <label for="profession" class="col-md-4_ col-form-label text-md-start">{{ __('Profession ') }} <font color="red">*</font></label>
                      <input id="profession" type="text" class="form-control @error('profession') is-invalid @enderror" name="profession" value="{{ old('profession') }}" autocomplete="new-profession">

                      @error('profession')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                  <div class="col-md-4 mt-3">
                    <label for="address" class="col-md-4_ col-form-label text-md-start">{{ __('Residential Address ') }} <font color="red">*</font></label>
                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" placeholder="E.g. House No. Street..." autocomplete="new-address">

                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="col-md-4 mt-3">
                    <label for="city" class="col-md-4_ col-form-label text-md-start">{{ __('City ') }} <font color="red">*</font></label>
                    <input id="city" type="city" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="new-city">

                    @error('city')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4 mt-3">
                    <label for="state" class="col-md-4_ col-form-label text-md-start">{{ __('State ') }} <font color="red">*</font></label>
                    {{-- <input id="state" type="state" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ old('state') }}" required autocomplete="state"> --}}
                    <select id="state" class="form-control mb-4" name='state' placeholder="state"required>
                      <option value="">-- State --</option>
                      @foreach ($states as $state)
                          <option value="{{$state}}">{{$state}}</option>
                      @endforeach
                   </select>
                    @error('state')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              <div class="col-md-4 mt-3">
                  <label for="country" class="col-md-4_ col-form-label text-md-start">{{ __('Country ') }} <font color="red">*</font></label>
                  <input id="country" type="country" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" required autocomplete="country">

                  @error('country')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <div class="col-md-4 mt-3">
                  <label for="postal_code" class="col-md-4_ col-form-label text-md-start">{{ __('Postal code') }}</label>
                  <input id="postal_code" type="postal_code" class="form-control @error('postal_code') is-invalid @enderror" name="postal_code" value="{{ old('postal_code') }}" autocomplete="postal_code">

                  @error('postal_code')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <div class="col-md-4 mt-3">
                  <label for="nok" class="col-md-4_ col-form-label text-md-start">{{ __('Next of kin ') }}<font color="red">*</font></label>
                  <input id="nok" type="nok" class="form-control @error('nok') is-invalid @enderror" name="nok" value="{{ old('nok') }}" required autocomplete="nok">

                  @error('nok')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <div class="col-md-4 mt-3">
                  <label for="nok_relationship" class="col-md-4_ col-form-label text-md-start">{{ __('Next of kin Relationship ') }}<font color="red">*</font></label>
                  <input id="nok_relationship" type="nok_relationship" class="form-control @error('nok_relationship') is-invalid @enderror" name="nok_relationship" value="{{ old('nok_relationship') }}" required autocomplete="new-nok_relationship">

                  @error('nok_relationship')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>

              <div class="col-md-4 mt-3">
                  <label for="nok_phone" class="col-md-4_ col-form-label text-md-start">{{ __('Contact No. of Next of kin ') }}<font color="red">*</font></label>
                  <input id="nok_phone" type="nok_phone" class="form-control @error('nok_phone') is-invalid @enderror" name="nok_phone" value="{{ old('nok_phone') }}" required autocomplete="new-nok_phone">

                  @error('nok_phone')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>

              {{-- Food Allergies --}}
              <div class="col-md-4 mt-3">
                  <label for="food_allergies" class="col-md-4_ col-form-label text-md-start">{{ __('Food Allergies') }}</label>
                  <input id="food_allergies" type="food_allergies" class="form-control @error('food_allergies') is-invalid @enderror" value="{{ old('food_allergies') }}" name="food_allergies">

                  @error('food_allergies')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>

            {{-- Diets mutiple options --}}
              <div class="col-md-4 mt-3">
                  <label for="choices-multiple-remove-button" class="col-md-4_ col-form-label text-md-start">{{ __('Diets ') }}</label><font color="red">*</font>  <i class="bi bi-question-circle"
                  title='If complicated you may be required to bring the food items along.'></i>
                  <div class="row d-flex justify-content-center mt-100">
                    <div class="col-md-12">
                        <select id="choices-multiple-remove-button" class="form-select @error('diets') is-invalid @enderror" value="{{ old('diets') }}" name="diets" placeholder="Select Diets" multiple>
                        <option value="diabetic">Diabetic</option>
                        <option value="low_cholesterol">Low cholesterol</option>
                        <option value="low_salt">Low salt</option>
                        <option value="no_salt">No salt</option>
                        <option value="others">others</option>
                        <option value="none">none</option>
                        </select> </div>
                </div>
                  {{-- <select id="diets" class="form-select @error('diets') is-invalid @enderror" value="{{ old('diets') }}" name="diets" >
                    <option value="diabetic">Diabetic</option>
                    <option value="low_cholesterol">Low cholesterol</option>
                    <option value="low_salt">Low salt</option>
                    <option value="no_salt">No salt</option>
                    <option value="others">others</option>
                    <option value="none">none</option>
                  </select> --}}

                  @error('diets')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>

              {{-- Other Diets one option --}}
              <div class="col-md-4 mt-3" id="other_diets_box" style="display: none;">
                <label for="other_diets" class="col-md-4_ col-form-label text-md-start">{{ __('Diets ') }}</label> <i class="bi bi-question-circle"
                title='For example, wheelchair-bound, problems that would limit the use of a staircase, etc.'></i>
                <input id="other_diets" type="other_diets" class="form-control @error('other_diets') is-invalid @enderror" name="other_diets" value="{{ old('other_diets')??"none" }}" autocomplete="new-other_diets">

                @error('other_diets')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- Other disability --}}
              <div class="col-md-4 mt-3">
                  <label for="other_disability" class="col-md-4_ col-form-label text-md-start">{{ __('Disabilities ') }}</label> <i class="bi bi-question-circle" title='For example, wheelchair-bound,
                  problems that would limit the
                  use of a staircase, etc.'></i>
                  <input id="other_disability" type="other_disability" class="form-control @error('other_disability') is-invalid @enderror" name="other_disability" value="{{ old('other_disability') }}" autocomplete="new-other_disability">

                  @error('other_disability')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>


              {{-- Centers --}}
              <div class="col-md-4 mt-3">
                <label for="center" class="col-md-4_ col-form-label text-md-start">{{ __('Center ') }}</label> <i class="bi bi-question-circle" title='This is the centre you go to or
                closest to you.'></i>
                <select id="center" class="form-select @error('center') is-invalid @enderror" name="center" value="{{ old('center') }}" >

                  @foreach ($centers as $center)
                    <option value="{{$center->id}}">{{$center->title}}</option>
                  @endforeach

                </select>

                @error('center')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- Password --}}
              <div class="col-md-4 mt-3">
                <label for="password" class="col-md-4_ col-form-label text-md-start">{{ __('Password ') }}<font color="red">*</font></label>
                <div class="form-control passWordField">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    <svg class="showIcon" onclick="showPass('password')" style="height: 20px" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                      </svg>

                </div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="col-md-4 mt-3">
                <label for="password-confirm" class="col-md-4_ col-form-label text-md-start">{{ __('Confirm Password ') }}<font color="red">*</font></label>
                <div class="form-control passWordField">
                    <input id="password-confirm" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">

                    <svg class="showIcon" onclick="showPass('password-confirm')" style="height: 20px" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                      </svg>

                </div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="col-md-4 mt-3">
                <label for="password-clue" class="col-md-4_ col-form-label text-md-start">{{ __('Password Clue ') }}</label> <i class="bi bi-question-circle" title='This will be sent to you if you
                forget your password'></i>
                <input id="password-clue" type="text" class="form-control @error('password') is-invalid @enderror" value="{{ old('password_clue') }}" name="password_clue">

                @error('password_clue')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    <div class="col-md-12 mt-5" align='left'>
                      <div><input type="checkbox" class="form-control_" name="terms_and_conditions" required> I AGREE WITH THE <a href="{{route('terms-and-conditions')}}">Terms and Conditions</a></div>
                    </div>

                    <div class="col-md-12 mt-3" align='left'>
                      <div><input type="checkbox" class="form-control_" name="privacy_policy" required> I AGREE WITH THE <a href="{{route('privacy-policy')}}">Privacy Policy</a></div>
                    </div>
                <div class="row mt-3" align='right'>
                  <div class="col-md-12 _offset-md-3">
                      <button type="submit" class="btn btn-primary">
                          {{ __('Register') }}
                      </button>
                  </div>
              </div>
              </form>
            </div>
          </div>

        </div>

      </div>

    </section><!-- End Values Section -->

    <script src="{{asset('')}}assets/js/jquery-3.7.0.min.js"></script>
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
            $('button[type=submit]').on('click', function(){
                // alert($('#other_diets').val());
                if($('input[name=first_name]').val()=='')
                {
                    toastr.error('First name cannot be empty');
                }
                else if($('input[name=last_name]').val()=='')
                {
                    toastr.error('Last name cannot be empty');
                }
                else if($('input[name=email]').val()=='')
                {
                    toastr.error('email cannot be empty');
                }
                else if($('input[name=dob]').val()=='')
                {
                    toastr.error('Date of birth cannot be empty');
                }
                else if($('input[name=phone]').val()=='')
                {
                    toastr.error('Phone cannot be empty');
                }
                else if($('input[name=profession]').val()=='')
                {
                    toastr.error('Profession cannot be empty');
                }
                else if($('input[name=phone]').val()=='')
                {
                    toastr.error('Phone cannot be empty');
                }
                else if($('input[name=address]').val()=='')
                {
                    toastr.error('Address cannot be empty');
                }
                else if($('input[name=city]').val()=='')
                {
                    toastr.error('City cannot be empty');
                }
                else if($('input[name=state]').val()=='')
                {
                    toastr.error('State cannot be empty');
                }
                else if($('input[name=country]').val()=='')
                {
                    toastr.error('Country cannot be empty');
                }
                else if($('input[name=nok]').val()=='')
                {
                    toastr.error('Next of kin cannot be empty');
                }
                else if($('input[name=nok_relationship]').val()=='')
                {
                    toastr.error('Next of relationship cannot be empty');
                }
                else if($('input[name=nok_phone]').val()=='')
                {
                    toastr.error('Next of kin Phone cannot be empty');
                }
                else if($('input[name=password]').val()=='')
                {
                    toastr.error('Password cannot be empty');
                }
                else if($('input[name=confirm_password]').val()=='')
                {
                    toastr.error('Confirm password cannot be empty');
                }
            });


        $(document).ready(function(){

        var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
            removeItemButton: true,
            maxItemCount:5,
            searchResultLimit:5,
            renderChoiceLimit:5
            });
        });
        // $('#other_diets').val("none");
        $('select[name=diets]').on('change', function()
        {
            // alert($(this).val());
            if($(this).val()=='others'){

                $('#other_diets_box').show()
            }
            else{

                $('#other_diets_box').hide()
            }
            $('#other_diets').val(JSON.stringify($(this).val()));
        })
        function showPass(id)
        {
            const currtype=$('#'+id).get(0).type;

            $('#'+id).get(0).type=currtype=='password'?'text':'password';
            // $("#"+id).prop("type", "password");
            // alert($('#password').get(0).type);
        }
    </script>
@endsection
