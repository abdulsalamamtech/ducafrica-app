
@extends('homepages.main')
@section('title', 'something went wrong!')
@section('content')
  <main id="main">

    <!-- ======= Values Section ======= -->
    <section id="values" class="values">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <div class="mt-5">
            <p class="mb-3">Something went wrong</p>
          </div>
        </header>


        <div class="col-md-8 offset-md-2 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="100">
            <div class="box" align='left'>

                <h1>PAGE NOT FOUND</h1>
                <p>Error Code : 404</p>

                <div>
                    <div onClick="history.back()" class="p-3 btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center text-primary cursor-pointer"
                    style="cursor:pointer;">
                        <i class="bi bi-arrow-left"></i>
                        <span>Refresh</span>
                    </div>
                    <a href="{{route('home')}}" class="p-3 btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center text-primary">
                        <span>Home</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>

            </div>
        </div>

      </div>

    </section>

  </main>
@endsection

