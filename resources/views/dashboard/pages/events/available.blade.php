@extends('dashboard.layouts.master')

@section('content')
    <!-- Container -->
    <div class="p-4 sm:ml-64">


        <div class="rounded-lg dark:border-gray-700 mt-20">
            {{-- Search and filter --}}
            <div class="flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 py-4 bg-white dark:bg-gray-900 px-4">

                <div>
                    <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction"
                        class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                        type="button">
                        <span class="sr-only">Action button</span>
                        Filter
                        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownAction"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600 pl-3">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownActionButton">
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">All</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Event</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Center</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <form class="w-full max-w-md mx-auto">
                    <label for="default-search" class="mb-1 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input name="search" value="{{ request('search') }}" type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search..." required />
                        <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                    </div>
                </form>

            </div>

            {{-- Events --}}
            <div class="my-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">
                <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3 p-4">


                    @forelse ($events as $event)
                        <!-- Event Card -->
                        <a href="
                                @if(!$event->isBooked() && $event->isAvailable())
                                    {{ route('events.book', $event->id) }}
                                @else
                                    {{ route('events.show', $event->id) }}
                                @endif
                            ">
                            <div class="p-6 bg-white rounded-lg shadow-lg dark:bg-gray-700 dark:text-gray-200">
                                <img class="object-cover w-full h-40 mb-4 rounded" src="{{ $event?->center?->centerAsset?->url ?? '/images/africa.jpg' }}" alt="Product Name">
                                <h3 class="mb-2 text-xl font-semibold">{{ $event->center?->name }}</h3>
                                <h3 class="mb-2 text-xl font-semibold">NGN. {{ $event->cost }}</h3>
                                <div class="font-bold">
                                    <p class="text-gray-900 dark:text-gray-100">Title: <span class="text-gray-500 dark:text-gray-400"> {{ $event->name }}</span></p>
                                    <p class="text-gray-800 dark:text-gray-100">Description:
                                        <span class="text-gray-500 dark:text-gray-400">
                                            {{ $event->description }}
                                        </span>
                                    </p>
                                    <p class="text-gray-800 dark:text-gray-100">Start:
                                        <span class="text-gray-500 dark:text-gray-400">
                                            {{ $event->start_date->format('l, jS F Y') }} ({{ $event->start_date->diffForHumans() }})
                                        </span>
                                    </p>
                                    <p class="text-gray-800 dark:text-gray-100">End:
                                        <span class="text-gray-500 dark:text-gray-400">
                                            {{ $event->end_date->format('l, jS F Y') }} ({{ $event->end_date->diffForHumans() }})
                                        </span>
                                    </p>
                                    <div class="p-2">
                                        <p class="text-gray-900 dark:text-gray-100">Slots: <span class="text-gray-500 dark:text-gray-400"> {{ $event->slots }}</span></p>
                                        <p class="text-gray-900 dark:text-gray-100">Available Slots: <span class="text-gray-500 dark:text-gray-400"> {{ $event->availableSlotsLimit() }}</span></p>
                                        {{-- <p class="text-gray-900 dark:text-gray-100">Confirmed Bookings: <span class="text-gray-500 dark:text-gray-400"> {{ $event?->allBookedEventWithPayment() ?? 0}}</span></p> --}}
                                        <p class="text-gray-900 dark:text-gray-100">Confirmed Bookings: <span class="text-gray-500 dark:text-gray-400"> {{  $event?->confirmedBookings()?->count() ?? 0}}</span></p>
                                        <p class="text-gray-900 dark:text-gray-100">Interested Slots: <span class="text-gray-500 dark:text-gray-400"> {{ $event->allBookedEvents()?->count() ?? 0 }}</span></p>
                                    </div>                                    
                                </div>
                                <div class="py-2">
                                    @if(!$event->isBooked() && $event->isAvailable())
                                        <button class="bg-blue-700 hover:bg-blue-800 text-white font-medium py-2 px-4 rounded-lg">
                                            Book Now
                                        </button>
                                    @else
                                        <button class="bg-green-700 hover:bg-green-800 text-white font-medium py-2 px-4 rounded-lg">
                                            View
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </a>
                    @empty
                        <div class="col-span-12 w-100 p-8 text-center dark:text-gray-500 dark:bg-gray-700">
                            <h2 class="text-center">Event unavailable</h2>
                        </div>
                    @endforelse


                    {{-- <!-- Event Card -->
                    <a href="{{ route('events.info') }}">
                        <div class="p-6 bg-white rounded-lg shadow-lg dark:bg-gray-700 dark:text-gray-200">
                            <img class="object-cover w-full h-40 mb-4 rounded" src="/images/africa.jpg" alt="Product Name">
                            <h3 class="mb-2 text-xl font-semibold">Hododo event center</h3>
                            <h3 class="mb-2 text-xl font-semibold">NGN. 60,000</h3>
                            <div class="font-bold">
                                <p class="text-gray-900 dark:text-gray-100">Title: <span class="text-gray-500 dark:text-gray-400"> December Retreats</span></p>
                                <p class="text-gray-800 dark:text-gray-100">Description:
                                    <span class="text-gray-500 dark:text-gray-400">
                                        orem ipsum dolor sit amet, consectetur adipiscing elit.
                                    </span>
                                </p>
                                <p class="text-gray-800 dark:text-gray-100">Start: <span class="text-gray-500 dark:text-gray-400">22/12/2023</span></p>
                                <p class="text-gray-800 dark:text-gray-100">End: <span class="text-gray-500 dark:text-gray-400">12/11/2024</span></p>
                            </div>
                            <div class="py-2">
                                <button class="bg-blue-700 hover:bg-blue-800 text-white font-medium py-2 px-4 rounded-lg">
                                    Book Now
                                </button>
                            </div>
                        </div>
                    </a>

                    <!-- Event Card -->
                    <a href="{{ route('events.info') }}">
                        <div class="p-6 bg-white rounded-lg shadow-lg dark:bg-gray-700 dark:text-gray-200">
                            <img class="object-cover w-full h-40 mb-4 rounded" src="/images/africa.jpg" alt="Product Name">
                            <h3 class="mb-2 text-xl font-semibold">Hododo event center</h3>
                            <h3 class="mb-2 text-xl font-semibold">NGN. 60,000</h3>
                            <div class="font-bold">
                                <p class="text-gray-900 dark:text-gray-100">Title: <span class="text-gray-500 dark:text-gray-400"> December Retreats</span></p>
                                <p class="text-gray-800 dark:text-gray-100">Description:
                                    <span class="text-gray-500 dark:text-gray-400">
                                        orem ipsum dolor sit amet, consectetur adipiscing elit.
                                    </span>
                                </p>
                                <p class="text-gray-800 dark:text-gray-100">Start: <span class="text-gray-500 dark:text-gray-400">22/12/2023</span></p>
                                <p class="text-gray-800 dark:text-gray-100">End: <span class="text-gray-500 dark:text-gray-400">12/11/2024</span></p>
                            </div>
                            <div class="py-2">
                                <button class="bg-yellow-700 hover:bg-yellow-800 text-white font-medium py-2 px-4 rounded-lg">
                                    View
                                </button>
                            </div>
                        </div>
                    </a>

                    <!-- Event Card -->
                    <a href="{{ route('events.info') }}">
                        <div class="p-6 bg-white rounded-lg shadow-lg dark:bg-gray-700 dark:text-gray-200">
                            <img class="object-cover w-full h-40 mb-4 rounded" src="/images/africa.jpg" alt="Product Name">
                            <h3 class="mb-2 text-xl font-semibold">Hododo event center</h3>
                            <h3 class="mb-2 text-xl font-semibold">NGN. 60,000</h3>
                            <div class="font-bold">
                                <p class="text-gray-900 dark:text-gray-100">Title: <span class="text-gray-500 dark:text-gray-400"> December Retreats</span></p>
                                <p class="text-gray-800 dark:text-gray-100">Description:
                                    <span class="text-gray-500 dark:text-gray-400">
                                        orem ipsum dolor sit amet, consectetur adipiscing elit.
                                    </span>
                                </p>
                                <p class="text-gray-800 dark:text-gray-100">Start: <span class="text-gray-500 dark:text-gray-400">22/12/2023</span></p>
                                <p class="text-gray-800 dark:text-gray-100">End: <span class="text-gray-500 dark:text-gray-400">12/11/2024</span></p>
                            </div>
                            <div class="py-2">
                                <button class="bg-green-700 hover:bg-green-800 text-white font-medium py-2 px-4 rounded-lg">
                                    Booked
                                </button>
                            </div>
                        </div>
                    </a>

                    <!-- Event Card -->
                    <a href="{{ route('events.info') }}">
                        <div class="p-6 bg-white rounded-lg shadow-lg dark:bg-gray-700 dark:text-gray-200">
                            <img class="object-cover w-full h-40 mb-4 rounded" src="/images/africa.jpg" alt="Product Name">
                            <h3 class="mb-2 text-xl font-semibold">Hododo event center</h3>
                            <h3 class="mb-2 text-xl font-semibold">NGN. 60,000</h3>
                            <div class="font-bold">
                                <p class="text-gray-900 dark:text-gray-100">Title: <span class="text-gray-500 dark:text-gray-400"> December Retreats</span></p>
                                <p class="text-gray-800 dark:text-gray-100">Description:
                                    <span class="text-gray-500 dark:text-gray-400">
                                        orem ipsum dolor sit amet, consectetur adipiscing elit.
                                    </span>
                                </p>
                                <p class="text-gray-800 dark:text-gray-100">Start: <span class="text-gray-500 dark:text-gray-400">22/12/2023</span></p>
                                <p class="text-gray-800 dark:text-gray-100">End: <span class="text-gray-500 dark:text-gray-400">12/11/2024</span></p>
                            </div>
                            <div class="py-2">
                                <button class="bg-green-700 hover:bg-green-800 text-white font-medium py-2 px-4 rounded-lg">
                                    Booked
                                </button>
                            </div>
                        </div>
                    </a>
                     --}}

                </div>
            </div>
            {{-- End of Events --}}


            <div class="my-6 py-4 px-8 bg-white rounded-lg shadow-lg dark:bg-gray-800">
                {{-- Paginate --}}
                @isset($events)
                    <div class="text-center dark:text-gray-100">
                        <div class="px-8">
                                {{ $events->links() }}
                            </div>
                        </div>
                    </div>
                @endisset

                
            </div>
            
            {{-- Paginate --}}
            <div class="text-center pt-4 bg-white dark:text-gray-100 dark:bg-gray-800">
                <div class="px-8">
                    @if (isset($centers) && !empty($centers) && $centers->links())
                        {{ $centers->links() }}
                    @endif
                </div>
            </div>


    </div>
@endsection
