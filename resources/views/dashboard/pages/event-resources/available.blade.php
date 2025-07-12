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
                                <a href="?filter=type"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Type</a>
                            </li>
                            <li>
                                <a href="?filter=centers"
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


                    @forelse ($event_resources as $event_resource)
                        <!-- Event Card -->
                        <div class="p-6 bg-white rounded-lg shadow-lg dark:bg-gray-700 dark:text-gray-200">
                                <a href="{{ $event_resource?->url }}" target="_blank">
                                    <img class="object-cover w-full h-40 mb-4 rounded" src="/images/africa.jpg" alt="Product Name">
                                    {{-- <h3 class="mb-2 text-xl font-semibold">{{ $event->center?->name }}</h3> --}}
                                    {{-- <h3 class="mb-2 text-xl font-semibold">NGN. {{ $event->cost }}</h3> --}}
                                    <div class="font-bold">
                                        <p class="text-gray-900 dark:text-gray-100">Title: 
                                            <span class="text-gray-500 dark:text-gray-400"> 
                                                {{ $event_resource->title }}
                                            </span>
                                        </p>
                                        <p class="text-gray-800 dark:text-gray-100">Description:
                                            <span class="text-gray-500 dark:text-gray-400">
                                                {{ $event_resource->description }}
                                            </span>
                                        </p>
                                        <p class="text-gray-900 dark:text-gray-100">Category: 
                                            <span class="text-gray-500 dark:text-gray-400"> 
                                                {{ $event_resource->category }}
                                            </span>
                                        </p>
                                        <p class="text-gray-900 dark:text-gray-100">Format: 
                                            <span class="text-gray-500 dark:text-gray-400"> 
                                                {{ $event_resource?->resource_format }}
                                            </span>
                                        </p>
                                        <p class="text-gray-800 dark:text-gray-100">Date:
                                            <span class="text-gray-500 dark:text-gray-400">
                                                {{ $event_resource->created_at->format('l, jS F Y') }} ({{ $event_resource->created_at->diffForHumans() }})
                                            </span>
                                        </p>                                   
                                    </div>
                                </a>
                            <div class="py-2">
                                <a href="{{ $event_resource?->url }}" target="_blank">
                                    <button class="bg-green-700 hover:bg-green-800 text-white font-medium py-2 px-4 rounded-lg">
                                        View
                                    </button>
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-12 w-100 p-8 text-center dark:text-gray-500 dark:bg-gray-700">
                            <h2 class="text-center">Resource unavailable</h2>
                        </div>
                    @endforelse

                </div>
            </div>
            {{-- End of Events --}}


            <div class="my-6 py-4 px-8 bg-white rounded-lg shadow-lg dark:bg-gray-800">
                {{-- Paginate --}}
                @isset($event_resources)
                    <div class="text-center dark:text-gray-100">
                        <div class="px-8">
                                {{ $event_resources->links() }}
                            </div>
                        </div>
                    </div>
                @endisset
                {{-- End of Paginate --}}
            </div>


    </div>
@endsection
