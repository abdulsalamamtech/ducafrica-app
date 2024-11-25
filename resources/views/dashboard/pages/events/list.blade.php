

<!-- Header -->
@include('dashboard.partials.header')


<!-- Navigation -->
{{-- @include('dashboard.partials.navbar') --}}

<!-- Sidebar -->
{{-- @include('dashboard.partials.sidebar') --}}



{{-- @yield('content') --}}




<body class="bg-gray-100">

    <!-- header and nav -->
    <header class="bg-white shadow-lg z-50 fixed top-0 w-full">
        <div class="container flex items-center justify-between px-6 py-4 mx-auto">
            <!-- Logo -->
            <div class="text-2xl font-bold text-white p-2 shadow bg-[#a7ff22]">
                <i class="fa fa-search"></i>
                <a href="#">The Finder</a>
            </div>

            <!-- Navigation Links (Hidden on Mobile) -->
            <nav class="hidden space-x-6 md:flex">
                <a href="{{route('dashboard')}}" class="py-1 text-gray-600 hover:text-gray-900">Home</a>
                <a href="{{route('centers')}}#about" class="py-1 text-gray-600 hover:text-gray-900">About</a>
                <a href="{{route('events')}}#categories" class="py-1 text-gray-600 hover:text-gray-900">Categories</a>
                <a href="{{route('users')}}" class="py-1 text-gray-600 hover:text-gray-900">Faqs</a>
                <a href="{{route('events.list')}}#contact" class="py-1 text-gray-600 hover:text-gray-900">Contact</a>
            </nav>

            <!-- Register, Login, Logout (Hidden on Mobile) -->
            <div class="invisible md:visible">
                {{-- @auth --}}
                {{-- @else --}}
                {{-- @endauth --}}
                    <form method="post" action="{{ route('logout')}}" >
                        @csrf
                        @method('post')
                        <button class="inline-flex items-center px-3 py-1 text-base text-white bg-red-500 border-0 rounded focus:outline-none hover:bg-red-400">Logout</button>
                    </form>
                    <a href="{{route('dashboard')}}" class="inline-flex items-center px-3 py-1 text-base bg-[#e6ffce] border-0 rounded me-1 focus:outline-none hover:bg-[#9ed847]">LogIn</a>
                    <a href="{{route('dashboard')}}" class="inline-flex items-center px-3 py-1 text-base text-gray-800 bg-[#a7ff22] border-0 rounded focus:outline-none hover:bg-[#9ed847] hover:text-gray-900">Register</a>

            </div>

            <!-- Mobile Menu Button -->
            <div class="flex items-center md:hidden">
                <button id="mobile-menu-button" class="text-gray-800 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu (Hidden by Default) -->
        <div id="mobile-menu" class="hidden md:hidden">
            <nav class="px-2 pt-2 pb-4 space-y-1">
                <a href="#" class="block px-3 py-2 text-base font-medium text-gray-700 rounded-md hover:bg-gray-100">Home</a>
                <a href="#" class="block px-3 py-2 text-base font-medium text-gray-700 rounded-md hover:bg-gray-100">About</a>
                <a href="#" class="block px-3 py-2 text-base font-medium text-gray-700 rounded-md hover:bg-gray-100">Services</a>
                <a href="#" class="block px-3 py-2 text-base font-medium text-gray-700 rounded-md hover:bg-gray-100">Contact</a>
            </nav>
            <div class="block px-3 pb-4 text-base font-medium md:hidden">
                {{-- @auth --}}
                {{-- @else --}}
                {{-- @endauth --}}
                    <form method="post" action="{{ route('logout')}}" >
                        @csrf
                        @method('post')
                        <button class="inline-flex items-center px-3 py-1 text-base text-white bg-red-500 border-0 rounded focus:outline-none hover:bg-red-400">Logout</button>
                    </form>
                    <a href="{{route('dashboard')}}" class="inline-flex items-center px-3 py-1 text-base bg-[#e6ffce] border-0 rounded me-1 focus:outline-none hover:bg-[#9ed847]">LogIn</a>
                    <a href="{{route('dashboard')}}" class="inline-flex items-center px-3 py-1 text-base text-gray-800 bg-[#a7ff22] border-0 rounded focus:outline-none hover:bg-[#9ed847] hover:text-gray-900">Register</a>
            </div>
        </div>
    </header>


    <!-- Hero Section -->
    <section class="relative bg-center bg-cover h-[90vh] md:h-screen" style="background-image: url({{asset('images/more-cars.png')}});">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="container flex items-center justify-center h-full mx-auto text-center">
            <div class="z-10 px-5 text-white">
                <h1 class="mb-4 text-5xl font-bold">Welcome to The Finder Service</h1>
                <p class="mb-8 text-lg">We help locate and track all your lost assets!</p>

                <!-- Search Form -->
                <form class="max-w-lg mx-auto">
                    <div class="relative">
                        <input type="text" class="w-full p-4 pl-10 text-gray-900 rounded-lg shadow-lg" placeholder="Search for products...">
                        <button type="submit" class="absolute top-0 right-0 mt-3 mr-4 text-center text-gray-600">
                            <i class="fa fa-search pt-2"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="py-16">
        <div class="container px-6 mx-auto">
            <h2 class="mb-8 text-3xl font-bold text-center">Recent Lost Assets</h2>

            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                <!-- Product Card -->
                <a href="">
                    <div class="p-6 bg-white rounded-lg shadow-lg">
                        <img class="object-cover w-full h-40 mb-4 rounded" src="{{asset('images/bmw.png')}}" alt="Product Name">
                        <h3 class="mb-2 text-xl font-semibold">Honda Xpress</h3>
                        <div class="font-bold">
                            <p class="text-gray-800">Model: <span class="text-gray-500"> X20 2023</span></p>
                            <p class="text-gray-800">Plate no: <span class="text-gray-500">DAL-345-2344</span></p>
                            <p class="text-gray-800">Color: <span class="text-gray-500">Red</span></p>
                            <p class="text-gray-800">Description:
                                <span class="text-gray-500">
                                    orem ipsum dolor sit amet, consectetur adipiscing elit.
                                </span>
                            </p>
                        </div>
                    </div>
                </a>

                <!-- Product Card -->
                <a href="">
                    <div class="p-6 bg-white rounded-lg shadow-lg">
                        <img class="object-cover w-full h-40 mb-4 rounded" src="{{asset('images/benz1.png')}}" alt="Product Name">
                        <h3 class="mb-2 text-xl font-semibold">Honda Xpress</h3>
                        <div class="font-bold">
                            <p class="text-gray-800">Model: <span class="text-gray-500"> X20 2023</span></p>
                            <p class="text-gray-800">Plate no: <span class="text-gray-500">DAL-345-2344</span></p>
                            <p class="text-gray-800">Color: <span class="text-gray-500">Red</span></p>
                            <p class="text-gray-800">Description:
                                <span class="text-gray-500">
                                    orem ipsum dolor sit amet, consectetur adipiscing elit.
                                </span>
                            </p>
                        </div>
                    </div>
                </a>

                <!-- Product Card -->
                <a href="">
                    <div class="p-6 bg-white rounded-lg shadow-lg">
                        <img class="object-cover w-full h-40 mb-4 rounded" src="{{asset('images/benz2.png')}}" alt="Product Name">
                        <h3 class="mb-2 text-xl font-semibold">Honda Xpress</h3>
                        <div class="font-bold">
                            <p class="text-gray-800">Model: <span class="text-gray-500"> X20 2023</span></p>
                            <p class="text-gray-800">Plate no: <span class="text-gray-500">DAL-345-2344</span></p>
                            <p class="text-gray-800">Color: <span class="text-gray-500">Red</span></p>
                            <p class="text-gray-800">Description:
                                <span class="text-gray-500">
                                    orem ipsum dolor sit amet, consectetur adipiscing elit.
                                </span>
                            </p>
                        </div>
                    </div>
                </a>

                                <!-- Product Card -->
                <a href="">
                    <div class="p-6 bg-white rounded-lg shadow-lg">
                        <img class="object-cover w-full h-40 mb-4 rounded" src="{{asset('images/benz2.png')}}" alt="Product Name">
                        <h3 class="mb-2 text-xl font-semibold">Honda Xpress</h3>
                        <div class="font-bold">
                            <p class="text-gray-800">Model: <span class="text-gray-500"> X20 2023</span></p>
                            <p class="text-gray-800">Plate no: <span class="text-gray-500">DAL-345-2344</span></p>
                            <p class="text-gray-800">Color: <span class="text-gray-500">Red</span></p>
                            <p class="text-gray-800">Description:
                                <span class="text-gray-500">
                                    orem ipsum dolor sit amet, consectetur adipiscing elit.
                                </span>
                            </p>
                        </div>
                    </div>
                </a>

                <!-- Product Card -->
                <a href="">
                    <div class="p-6 bg-white rounded-lg shadow-lg">
                        <img class="object-cover w-full h-40 mb-4 rounded" src="{{asset('images/benz2.png')}}" alt="Product Name">
                        <h3 class="mb-2 text-xl font-semibold">Honda Xpress</h3>
                        <div class="font-bold">
                            <p class="text-gray-800">Model: <span class="text-gray-500"> X20 2023</span></p>
                            <p class="text-gray-800">Plate no: <span class="text-gray-500">DAL-345-2344</span></p>
                            <p class="text-gray-800">Color: <span class="text-gray-500">Red</span></p>
                            <p class="text-gray-800">Description:
                                <span class="text-gray-500">
                                    orem ipsum dolor sit amet, consectetur adipiscing elit.
                                </span>
                            </p>
                        </div>
                    </div>
                </a>

                

                @isset($lost_assets )
                    @forelse ($lost_assets as $lost_asset)
                        <!-- Product Card -->
                        <a href="{{route('lost-assets.show', $lost_asset->id)}}">
                            <div class="p-6 bg-white rounded-lg shadow-lg">
                                {{-- <img class="object-cover w-full h-40 mb-4 rounded" src="{{asset('images/benz2.png')}}" alt="Product Name"> --}}
                                <img class="object-cover w-full h-40 mb-4 rounded" alt="{{ $lost_asset->name .' '. $lost_asset->model .' '. $lost_asset->plate_number }}" src="
                                    @if(isset($lost_asset->images) && isset($lost_asset->images[0]) )
                                    {{(asset('storage/assets/' . $lost_asset->images[0]->path) ?? 'no---')}}
                                    @else
                                        {{'/img/img2.jpg'}}
                                    @endif
                                "/>
                                <h3 class="mb-2 text-xl font-semibold"> {{$lost_asset->name}} Honda Xpress</h3>
                                <div class="font-bold">
                                    <p class="text-gray-800">Model: <span class="text-gray-500"> {{$lost_asset->model}} X20 2023</span></p>
                                    <p class="text-gray-800">Plate no: <span class="text-gray-500"> {{$lost_asset->plate_number}} DAL-345-2344</span></p>
                                    <p class="text-gray-800">Color:
                                        <span class="text-gray-500">
                                                <span class="bg-[{{$lost_asset->color ?? $f4f4f4 }}] px-12 m-2"></span>
                                                <span class="m-2">{{$lost_asset->color ?? 'unknown'}}</span>
                                        </span>
                                    </p>
                                    <p class="text-gray-800">Description:
                                        <span class="text-gray-500">
                                            {{$lost_asset->description}}
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </a>
                    @empty
                    @endforelse
                @endisset
                <!-- Add more product cards as needed -->
            </div>

            {{-- Link --}}
            @isset($lost_assets )
                <div class="w-auto p-3 px-5 my-6 text-center bg-gray-100 shadow-xl">
                    <h2 class="text-3xl font-bold text-center">{{$lost_assets->links() ?? ''}}</h2>
                </div>
            @endisset

        </div>
    </section>


    <!-- Footer -->
    <footer class="text-gray-600 body-font">
        <div class="container flex flex-col flex-wrap px-5 py-24 mx-auto md:items-center lg:items-start md:flex-row md:flex-nowrap">
          <div class="flex-shrink-0 w-64 mx-auto text-center md:mx-0 md:text-left">
            <a class="flex items-center justify-center font-medium text-gray-900 title-font md:justify-start">
              <span class=" w-10 h-10 py-2 text-white bg-[#a7ff22] rounded-full text-center">
                <i class="fa fa-search pt-1"></i>
              </span>
              <span class="ml-3 text-xl">The Finder</span>
            </a>
            <p class="mt-2 text-sm text-gray-500">We help locate and track all your lost assets!</p>
          </div>
          <div class="flex flex-wrap flex-grow mt-10 -mb-10 text-center md:pl-20 md:mt-0 md:text-left">

            <div class="w-full px-4 lg:w-1/3 md:w-1/2">
              <h2 class="mb-3 text-sm font-medium tracking-widest text-gray-900 title-font">QUICK LINKS</h2>
              <nav class="mb-10 list-none">
                <li>
                  <a class="text-gray-600 hover:text-gray-800">Home</a>
                </li>
                <li>
                  <a class="text-gray-600 hover:text-gray-800">About</a>
                </li>
                <li>
                  <a class="text-gray-600 hover:text-gray-800">Categories</a>
                </li>
                <li>
                  <a class="text-gray-600 hover:text-gray-800">Contact</a>
                </li>
              </nav>
            </div>

            <div class="w-full px-4 lg:w-1/3 md:w-1/2">
              <h2 class="mb-3 text-sm font-medium tracking-widest text-gray-900 title-font">USEFUL LINKS</h2>
              <nav class="mb-10 list-none">
                <li>
                  <a class="text-gray-600 hover:text-gray-800">Terms & Conditions</a>
                </li>
                <li>
                  <a class="text-gray-600 hover:text-gray-800">Faqs</a>
                </li>
                <li>
                  <a class="text-gray-600 hover:text-gray-800">Blogs</a>
                </li>
                <li>
                  <a class="text-gray-600 hover:text-gray-800">Services</a>
                </li>
              </nav>
            </div>

            <div class="w-full px-4 lg:w-1/3 md:w-1/2">
              <h2 class="mb-3 text-sm font-medium tracking-widest text-gray-900 title-font">CATEGORIES</h2>
              <nav class="mb-10 list-none">
                <li>
                  <a class="text-gray-600 hover:text-gray-800">Vehicles</a>
                </li>
                <li>
                  <a class="text-gray-600 hover:text-gray-800">Cars</a>
                </li>
                <li>
                  <a class="text-gray-600 hover:text-gray-800">Bike</a>
                </li>
                <li>
                  <a class="text-gray-600 hover:text-gray-800">Trucks</a>
                </li>
              </nav>
            </div>

          </div>
        </div>
        <div class="bg-gray-100">
          <div class="container flex flex-col flex-wrap px-5 py-4 mx-auto sm:flex-row">
            <p class="text-sm text-center text-gray-500 sm:text-left"> © {{date('Y')}} The Finder —
              <a href="https://www.facebook.com/ToriCoder" rel="noopener noreferrer" class="ml-1 text-gray-600" target="_blank">ToriWebDev | </a>
              <a href="https://facebook.com/AbdulsalamAmtech" rel="noopener noreferrer" class="ml-1 text-gray-600" target="_blank">AmtechDigital</a>
            </p>
            <span class="inline-flex justify-center mt-2 sm:ml-auto sm:mt-0 sm:justify-start">
              <a class="text-gray-500">
                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                </svg>
              </a>
              <a class="ml-3 text-gray-500">
                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                </svg>
              </a>
              <a class="ml-3 text-gray-500">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                  <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                </svg>
              </a>
              <a class="ml-3 text-gray-500">
                <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
                  <path stroke="none" d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
                  <circle cx="4" cy="4" r="2" stroke="none"></circle>
                </svg>
              </a>
            </span>
          </div>
        </div>
    </footer>





    <!-- FontAwesome for icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <!-- Script to toggle mobile menu -->
    <script>
        const menuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        menuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>




<!-- Footer -->
@include('dashboard.partials.footer')

