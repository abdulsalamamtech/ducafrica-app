@extends('dashboard.layouts.master')

@section('content')
    <!-- Container -->
    <div class="p-4 sm:ml-64">


        <div class="rounded-lg dark:border-gray-700 mt-20">

            <form action="{{ route('available-event-resources.global-filter') }}" method="get"
                class="bg-orange-300 p-2 mb-3 bg-white dark:bg-gray-900">
                <input type="hidden" name="global-filter" value="true">
                <div
                    class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-3 p-4 bg-gray-50 rounded-lg shadow-inner dark:text-gray-100 dark:bg-gray-800">
                    {{-- <div class="flex gap-2  col-span-full"> --}}
                        <!-- Search Input -->
                        <div class="flex-1 min-w-[150px]">
                            <label for="search-input" class="block text-sm font-medium text-gray-700 dark:text-gray-400 mb-1">Search
                                Keyword</label>
                            <input name="search" type="text" id="search-input" placeholder="Search content..."
                                value="{{ request('search') }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <!-- Date Range Filters -->
                        <div class="flex-1 min-w-[120px]">
                            <label for="start-date" class="block text-sm font-medium text-gray-700 dark:text-gray-400 mb-1">Start Date</label>
                            <input name="start_date" type="date" id="start-date"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="flex-1 min-w-[120px]">
                            <label for="end-date" class="block text-sm font-medium text-gray-700 dark:text-gray-400 mb-1">End Date</label>
                            <input name="end_date" type="date" id="end-date"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                    {{-- </div> --}}

                    <!-- Type Dropdown -->
                    <div class="flex-1 min-w-[120px]">
                        <label for="type-select" class="block text-sm font-medium text-gray-700 dark:text-gray-400 mb-1">Resource
                            Format</label>
                        <select id="type-select" name="resource_format"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="general" @selected(request('resource_format') == 'general')>All (General)</option>
                            <option value="document" @selected(request('resource_format') == 'document')>Document</option>
                            <option value="image" @selected(request('resource_format') == 'image')>Image</option>
                            <option value="video" @selected(request('resource_format') == 'video')>Video</option>
                            <option value="audio" @selected(request('resource_format') == 'audio')>Audio</option>
                        </select>
                    </div>

                    <!-- Sub-Category Dropdown -->
                    <div class="flex-1 min-w-[150px]">
                        <label for="sub-category-select" class="block text-sm font-medium text-gray-700 dark:text-gray-400 mb-1">
                            Category
                        </label>
                        <select id="sub-category-select" name="category"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="general">All Category</option>
                            @foreach ($event_types as $event_type)
                                <option value="{{ $event_type->name }}" @selected(request('event_type') == $event_type->name)>{{ $event_type->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Sort By -->
                    <div class="flex-1 min-w-[150px]">
                        <label for="sort-by" class="block text-sm font-medium text-gray-700 dark:text-gray-400 mb-1">Sort By</label>
                        <select id="sort-by" name="sort_by"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="date-desc" @selected(request('sort_by') == 'date-desc')>Date (Newest First)</option>
                            <option value="date-asc" @selected(request('sort_by') == 'date-asc')>Date (Oldest First)</option>
                            <option value="title-asc" @selected(request('sort_by') == 'title-asc')>Title (A-Z)</option>
                            <option value="title-desc" @selected(request('sort_by') == 'title-desc')>Title (Z-A)</option>
                        </select>
                    </div>
                </div>
                <!-- Action Buttons -->
                <div class="w-full md:w-auto flex flex-col md:flex-row gap-2 mt-4 md:mt-0">
                    <button type="submit" id="apply-filters-btn"
                        class="w-full px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200 ease-in-out">
                        Apply Filters
                    </button>
                    {{-- <button href="#" type="reset" id="reset-filters-btn"
                        class="text-center w-full px-6 py-3 bg-gray-300 text-gray-800 font-semibold rounded-lg shadow-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-all duration-200 ease-in-out">
                        Reset
                    </button> --}}
                    <a href="{{ route('available-resources') }}" type="reset" id="reset-filters-btn"
                        class="text-center w-full px-6 py-3 bg-gray-300 text-gray-800 font-semibold rounded-lg shadow-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-all duration-200 ease-in-out">
                        Reset
                    </a>
                </div>
            </form>

            {{-- Search and filter --}}
            <div
                class="flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 py-4 bg-white dark:bg-gray-900 px-4">

                {{-- <div>
                    <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction"
                        class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                        type="button">
                        <span class="sr-only">Action button</span>
                        Filter
                        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownAction"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600 pl-3">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownActionButton">
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
                </div> --}}

                <form class="w-full max-w-md mx-auto">
                    <label for="default-search"
                        class="mb-1 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input name="search" value="{{ request('search') }}" type="search" id="default-search"
                            class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search..." required />
                        <button type="submit"
                            class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
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
                                <img class="object-cover w-full h-40 mb-4 rounded" src="/images/africa.jpg"
                                    alt="Product Name">
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
                                            {{ $event_resource->created_at->format('l, jS F Y') }}
                                            ({{ $event_resource->created_at->diffForHumans() }})
                                        </span>
                                    </p>
                                </div>
                            </a>
                            <div class="py-2">
                                <a href="{{ $event_resource?->url }}" target="_blank">
                                    <button
                                        class="bg-green-700 hover:bg-green-800 text-white font-medium py-2 px-4 rounded-lg">
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
                            @if (isset($event_resources) && !empty($event_resources) && $event_resources->links())
                                {{ $event_resources?->links() }}
                            @endif
                        </div>
                    </div>
                @endisset
            </div>
            {{-- End of Paginate --}}
        </div>


    </div>
@endsection
