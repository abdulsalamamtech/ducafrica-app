@extends('homepages.main')
@section('title', 'Login Page')
@section('content')
  <main id="main">
    <!-- ======= About Section ======= -->

    <!-- ======= Values Section ======= -->
    <section id="values" class="values">

      <div class="container" data-aos="fade-up">

        <header class="section-header">

          <div class="mt-5">
            <p class="mb-3">Account Login.</p>
            {{-- <h3> Eum ad dolor et. Autem aut fugiat debitis voluptatem consequuntur sit. Et veritatis id. Ad cupiditate sed est odio</h3> --}}
          </div>
        </header>
        <div class="row">

          {{-- <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
            <h3>Account Login.</h3>
            <p>Use your email and password to login.</p>

          </div>  --}}
          <div class="col-md-4 offset-md-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="200">
            <div class="box">
              <form method="POST" action="{{ route('login') }}">
                @csrf
                @method('post')

                <div class="row mb-3">
                    <label for="email" class="col-md-12 col-form-label text-md-start">{{ __('Email Address') }}</label>

                    <div class="col-md-12">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password" class="col-md-12 col-form-label text-md-start">{{ __('Password') }}</label>

                    <div class="col-md-12">
                        {{-- <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"> --}}
                        <div class="form-control passWordField">
                          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                          {{-- <b>=</b> --}}
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
                </div>

                {{-- <div class="row mb-3">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div> --}}

                <div class="row mb-0">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>


                    </div>
                    <div class="mt-4">
                      Don't have an account? <a class="btn_btn-link" href="{{ route('register') }}">
                      {{ __('Register now') }}
                      </a>
                    </div>
                    @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                </div>
            </form>
            </div>
          </div>

        </div>

      </div>

    </section><!-- End Values Section -->

    <script src="{{asset('')}}assets/js/jquery-3.7.0.min.js"></script>
    <script>
        function showPass(id)
        {
            const currtype=$('#password').get(0).type;
            $('#'+id).get(0).type=currtype=='password'?'text':'password';
            // $("#"+id).prop("type", "password");
            // alert($('#password').get(0).type);
        }
    </script>
@endsection
