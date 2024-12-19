
@php
$brand = [
    'bg' => '#0828b9',
    'bg-dark' => '#082899',

    'bg-accent' => '#f0f0f0f',
    'bg-color' => '#0828ad'
];
@endphp


    <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">

                <div class="flex items-center justify-start rtl:justify-end">
                    <!-- Toggle Button -->
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                        aria-controls="logo-sidebar" type="button"
                        class="inline-flex items-center p-2 mx-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                            </path>
                        </svg>
                    </button>

                    <!-- Logo -->
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center shadow p-2 px-3 text-xl md:px-8 md:text-2xl text-gray-100 rounded-lg
                        dark:text-white dark:hover:bg-gray-700 group sm:text-center
                        hover:bg-[#0828b9] bg-[{{ $brand['bg'] }}] text-blue-100 font-bold leading">
                        <img src="{{ asset('images/favicon.png') }}" alt="Truck" class="w-6 md:w-8 rounded-full m-1">
                        <span class="flex-1 ms-3 whitespace-nowrap dark:text-white pe-1 {{ $brand['bg'] }}">DUCAFRICA</span>
                    </a>
                </div>


                <!-- User Menu -->
                <div class="flex items-center">
                    <div class="flex items-center ms-3">
                        <div>
                            <button type="button"
                                class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-8 h-8 rounded-full"
                                    src="
                                    @isset(Auth::user()->userProfile->image->path)
                                        {{asset('storage/profiles/'. Auth::user()->userProfile->image->path)}}
                                    @else
                                        {{'/images/default-profile.png' ?? 'https://flowbite.com/docs/images/people/profile-picture-5.jpg'}}
                                    @endisset
                                    "
                                    alt="user photo">
                            </button>
                        </div>
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                            id="dropdown-user">
                            <div class="px-4 py-3" role="none">
                                <p class="text-sm text-gray-900 dark:text-white" role="none">
                                    {{ Auth()->user()->name ?? 'Guest'}}
                                    ({{ Auth()?->user()?->activeRole() ?? Auth()?->user()?->role ?? 'user'}})
                                </p>
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                                    {{ Auth()->user()->email ?? 'guest@mail.com'}}
                                </p>
                            </div>
                            <ul class="py-1" role="none">
                                <li>
                                    <a href="{{ route('dashboard') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Dashboard</a>
                                </li>
                                <li>
                                    <form method="post" action="{{ route('logout') }}" class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                        @csrf
                                        <button type="submit"
                                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white group">
                                            <div
                                                lass="flex-shrink-0 w-8 h-5 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                                                <i class='fa fa-sign-out'></i>
                                            </div>
                                            <span class="flex-1 ms-3 whitespace-nowrap">Logout</span>
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </nav>
