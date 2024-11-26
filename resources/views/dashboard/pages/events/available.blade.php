@extends('dashboard.layouts.master')

@section('content')
    <!-- Container -->
    <div class="p-4 sm:ml-64">

        <div class="rounded-lg dark:border-gray-700 mt-20">

            {{-- Events --}}
            <div class="my-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">
                <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3 p-4">
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

                </div>
            </div>
            {{-- End of Events --}}

        </div>

    </div>
@endsection
