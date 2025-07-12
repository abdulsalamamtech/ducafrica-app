@extends('dashboard.layouts.master')

@section('content')
    <!-- Container -->
    <div class="p-4 sm:ml-64">

        <div class="rounded-lg dark:border-gray-700 mt-20">

            {{-- Statistica widge --}}
            <div class="p-6 my-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">

                <div class="grid gap-y-10 gap-x-6 md:grid-cols-2 xl:grid-cols-4">
                    <!-- Card -->
                    <div
                        class="dark:bg-gray-700 dark:text-gray-300 dark:border-gray-700 relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 border border-blue-gray-100 shadow-sm">
                        <div
                            class="bg-clip-border mt-4 mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-gray-900 to-gray-800 text-white shadow-gray-900/20 absolute grid h-12 w-12 place-items-center">
                            <i class="fa fa-th-large text-white text-xl"></i>
                        </div>
                        <div class="p-4 text-right">
                            <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">
                                Total Resources</p>
                            <h4
                                class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">
                                {{ Number::abbreviate(auth()->user()->statistics()['admin']['event_resources']['total'] ?? 0) }}
                            </h4>
                        </div>
                        <div class="dark:border-gray-500 border-t border-blue-gray-50 p-4">
                            <p class="block antialiased font-sans text-base leading-relaxed font-normal text-blue-gray-600">
                                <strong class="text-green-500">+2%</strong>&nbsp;than last week
                            </p>
                        </div>
                    </div>
                    <!-- Card -->
                    <div
                        class="dark:bg-gray-700 dark:text-gray-300 dark:border-gray-700 relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 border border-blue-gray-100 shadow-sm">
                        <div
                            class="bg-clip-border mt-4 mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-gray-900 to-gray-800 text-white shadow-gray-900/20 absolute grid h-12 w-12 place-items-center">
                            <i class="fa fa-th text-white text-xl"></i>
                        </div>
                        <div class="p-4 text-right">
                            <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">
                                Active Resources</p>
                            <h4
                                class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">
                                {{ Number::abbreviate(auth()->user()->statistics()['admin']['event_resources']['active'] ?? 0) }}
                            </h4>
                        </div>
                        <div class="dark:border-gray-500 border-t border-blue-gray-50 p-4">
                            <p class="block antialiased font-sans text-base leading-relaxed font-normal text-blue-gray-600">
                                <strong class="text-green-500">+0.1%</strong>&nbsp;than last week
                            </p>
                        </div>
                    </div>
                    <!-- Card -->
                    <div
                        class="dark:bg-gray-700 dark:text-gray-300 dark:border-gray-700 relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 border border-blue-gray-100 shadow-sm">
                        <div
                            class="bg-clip-border mt-4 mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-gray-900 to-gray-800 text-white shadow-gray-900/20 absolute grid h-12 w-12 place-items-center">
                            <i class="fa fa-square text-white text-xl"></i>
                        </div>
                        <div class="p-4 text-right">
                            <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">
                                Inactive Resources
                            </p>
                            <h4
                                class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">
                                {{ Number::abbreviate(auth()->user()->statistics()['admin']['event_resources']['inactive'] ?? 0) }}
                            </h4>
                        </div>
                        <div class="dark:border-gray-500 border-t border-blue-gray-50 p-4">
                            <p class="block antialiased font-sans text-base leading-relaxed font-normal text-blue-gray-600">
                                <strong class="text-green-500">+0.1%</strong>&nbsp;than last week
                            </p>
                        </div>
                    </div>
                    <!-- Card -->
                    <div
                        class="dark:bg-gray-700 dark:text-gray-300 dark:border-gray-700 relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 border border-blue-gray-100 shadow-sm">
                        <div
                            class="bg-clip-border mt-4 mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-gray-900 to-gray-800 text-white shadow-gray-900/20 absolute grid h-12 w-12 place-items-center">
                            <i class="fa fa-bookmark text-white text-xl"></i>
                        </div>
                        <div class="p-4 text-right">
                            <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">
                                General Resources</p>
                            <h4
                                class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">
                                {{ Number::abbreviate(auth()->user()->statistics()['admin']['event_resources']['general'] ?? 0) }}
                            </h4>
                        </div>
                        <div class="dark:border-gray-500 border-t border-blue-gray-50 p-4">
                            <p class="block antialiased font-sans text-base leading-relaxed font-normal text-blue-gray-600">
                                <strong class="text-green-500">+2%</strong>&nbsp;than last week
                            </p>
                        </div>
                    </div>
                </div>

            </div>
            {{-- End of Statistics --}}


            {{-- Tables --}}
            <div class="my-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">


                <div class="relative p-8 overflow-x-auto shadow-md sm:rounded-lg">

                    <!-- Header Section -->
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl md:text-2xl font-semibold text-gray-700 dark:text-gray-300">Resources</h2>
                        <button class="px-3 md:px-4 py-2 bg-blue-800 text-white rounded-md hover:bg-blue-700"
                            data-modal-target="addUserModal" data-modal-show="addUserModal">
                            <i class='fa fa-pencil-square-o'></i>
                            <span class="pl-2">Add Resource</span>
                        </button>


                        {{-- Add Data --}}
                        <!-- Add Data modal -->
                        <div id="addUserModal" tabindex="-1" aria-hidden="true"
                            class="fixed top-0 left-0 right-0 z-50 items-center justify-center hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-2xl max-h-full bg-white">
                                <!-- Modal content -->
                                <form action="{{ route('event-resources.store') }}" method="POST"
                                    class="relative bg-white rounded-lg shadow dark:bg-gray-700">

                                    @method('POST')
                                    @csrf

                                    <!-- Modal header -->
                                    <div
                                        class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                            Add Resources
                                        </h3>
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="addUserModal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-6 space-y-6 dark:text-white">

                                        {{-- Basic Information --}}
                                        <div class="grid grid-cols-6 gap-6">
                                            <div class="col-span-12">
                                                <label for="title"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                    Title
                                                </label>
                                                <input type="text" name="title" id="title"
                                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="enter the name of the resource..." required="">
                                            </div>


                                            <div class="col-span-12">
                                                <label for="description"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                    Description
                                                </label>
                                                <input type="text" name="description" id="description"
                                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="enter the name of the resource..." required="">
                                            </div>
                                        </div>


                                        <div class="grid grid-cols-6 gap-6">

                                            {{-- Resources format --}}
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="resource_format"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Format</label>
                                                <select type="text" name="resource_format" id="resource_format"
                                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="resource_format" required="" value="">
                                                    <option value="document">Document</option>
                                                    <option value="image">Image</option>
                                                    <option value="video">Video</option>
                                                    <option value="audio">Audio</option>
                                                </select>
                                            </div>

                                            {{-- Category --}}
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="category"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                                <select type="text" name="category" id="category"
                                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="category" required="" value="">
                                                    <option value="general">General (All)</option>
                                                    @forelse ($event_types as $event_type)
                                                        <option value="{{ $event_type->name }}">{{ $event_type->name }}
                                                        </option>
                                                    @empty
                                                        <option value="">unavailable</option>
                                                    @endforelse
                                                </select>
                                            </div>

                                        </div>

                                        {{-- URL --}}
                                        <div class="col-span-12">
                                            <label for="url"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                Link (URL) to resource
                                            </label>
                                            <input type="text" name="url" id="url"
                                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="this event is..." required="">
                                            <span class="text-sm">Google drive, YouTube, Online resources</span>
                                        </div>

                                        {{-- Events --}}
                                        <div class="grid grid-cols-6 gap-6">
                                            <div class="col-span-12">
                                                <label for="event_id"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                    Select Event
                                                </label>
                                                <select type="text" name="event_id" id="event_id"
                                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="December event">
                                                    @forelse ($events as $event)
                                                        <option value="{{ $event->id }}">{{ $event->name }} -
                                                            {{ $event->center->address }} - {{ $event->center->state }}
                                                        </option>
                                                    @empty
                                                        <option value="">unavailable</option>
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>



                                        {{-- Accessible Roles --}}
                                        <div class="w-100 text-center">Accessible Roles</div>
                                        <div class="flex justify-evenly gap-3 text-center flex-auto flex-wrap">

                                            @forelse ($roles as $role)
                                                <label for="role{{ $role->id }}"
                                                    class="flex gap-2 justify-center items-center">
                                                    <input type="checkbox" name="event_resource_roles[]"
                                                        id="role{{ $role->id }}" value="{{ $role->id }}">
                                                    <span>{{ $role->name }}</span>
                                                </label>
                                            @empty
                                                <label for="standard" class="flex gap-2 justify-center items-center">
                                                    <span>no available role</span>
                                                </label>
                                            @endforelse

                                        </div>


                                    </div>
                                    <!-- Modal footer -->
                                    <div
                                        class="flex items-center p-6 space-x-3 rtl:space-x-reverse border-t border-gray-200 rounded-b dark:border-gray-600">
                                        <button type="submit"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Save
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>

                    {{-- Search and filter --}}
                    <div
                        class="flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 py-4 bg-white dark:bg-gray-900 px-4">

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
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Active</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Inactive</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <form class="w-full max-w-md mx-auto" action="">
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
                                <input name="search" type="search" id="default-search"
                                    class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Search..." required />
                                <button type="submit"
                                    class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                            </div>
                        </form>

                    </div>


                    {{-- Download and Print --}}
                    <div>
                        <div class="text-right mt-3">
                            {{-- <a href="#">
                                <button type="button"
                                    class="inline-flex items-center px-2.5 py-1.5 text-sm font-medium text-gray-100 bg-green-500 border border-gray-300 focus:outline-none hover:bg-green-400 focus:ring-4 focus:ring-gray-100 rounded-lg dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                    <i class="fa fa-print"></i>
                                    <span class="pl-2">Print</span>
                                </button>
                            </a> --}}
                            {{-- <a href="{{ route('fast-excel.events') }}" class="">
                                <button type="button"
                                    class="inline-flex items-center px-2.5 py-1.5 text-sm font-medium text-gray-100 bg-green-500 border border-gray-300 focus:outline-none hover:bg-green-400 focus:ring-4 focus:ring-gray-100 rounded-lg dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                    <i class="fa fa-file-excel-o"></i>
                                    <span class="pl-2">Export Resources</span>
                                </button>
                            </a> --}}
                        </div>
                    </div>




                    {{-- Table Content --}}
                    <div class="overflow-x-scroll py-2">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="p-4">
                                        <div class="flex items-center">
                                            <input id="checkbox-all-search" type="checkbox"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Details
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Format
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Category
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Link
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($event_resources as $event_resource)
                                    <!-- User table record 1 -->
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                                        <td class="w-4 p-4">
                                            <div class="flex items-center">
                                                <input id="checkbox-table-search-1" type="checkbox"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                            </div>
                                        </td>
                                        <th scope="row p-3"
                                            class="flex items-center p-3 text-gray-900 whitespace-nowrap dark:text-white">
                                            <div class="p-3">
                                                {{ $event_resource?->id }}
                                                <div class="text-base font-semibold">{{ $event_resource?->title }}</div>
                                                <div class="font-normal text-gray-500">{{ $event_resource?->description }}
                                                    <div>For {{ $event_resource?->event?->name ?? 'general' }} </div>
                                                </div>
                                                <div class="font-normal text-gray-500"><span
                                                        class="font-bold text-gray-600">Date:</span>
                                                    {{ $event_resource?->created_at->format('l jS, F Y') }} <br>
                                                    ({{ $event_resource?->created_at->diffForHumans() }})
                                                </div>
                                            </div>
                                        </th>
                                        <td class="px-2 py-2">
                                            {{ $event_resource?->resource_format }}
                                        </td>
                                        <td class="px-2 py-2">
                                            {{ $event_resource?->category }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{-- Link to Map --}}
                                            <a href="{{ $event_resource?->url }}">
                                                open link
                                            </a>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                {{-- <div> --}}
                                                @if ($event_resource->status)
                                                    <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Active
                                                @else
                                                    <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2"></div> Suspended
                                                @endif
                                                {{-- </div> --}}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">

                                            <button id="dropdownMenuIconButton{{ $event_resource->id }}"
                                                data-dropdown-toggle="dropdownDots{{ $event_resource->id }}"
                                                class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                                type="button">
                                                <svg class="w-5 h-5" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 4 15">
                                                    <path
                                                        d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                                </svg>
                                            </button>

                                            <!-- Dropdown menu -->
                                            <div id="dropdownDots{{ $event_resource->id }}"
                                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                                    aria-labelledby="dropdownMenuIconButton{{ $event_resource?->id }}">
                                                    <li>
                                                        <a href="{{ $event_resource?->url }}"
                                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">View</a>
                                                    </li>
                                                    <li
                                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                        <!-- Modal toggle -->
                                                        <div href="#" type="button"
                                                            data-modal-target="editUserModal{{ $event_resource?->id }}"
                                                            data-modal-show="editUserModal{{ $event_resource?->id }}"
                                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                                            Edit
                                                        </div>
                                                    </li>
                                                    <li>
                                                        @if ($event_resource?->status)
                                                            <a href="{{ route('event-resources.close', $event_resource?->id) }}"
                                                                class="block px-4 py-2 hover:bg-red-100 dark:hover:bg-red-600 dark:hover:text-white">
                                                                Disable resource
                                                            </a>
                                                        @else
                                                            <a href="{{ route('event-resources.open', $event_resource?->id) }}"
                                                                class="block px-4 py-2 hover:bg-green-100 dark:hover:bg-green-600 dark:hover:text-white">
                                                                Open resources
                                                            </a>
                                                        @endif
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Edit user modal 1 -->
                                    <div id="editUserModal{{ $event_resource->id }}" tabindex="-1" aria-hidden="true"
                                        class="fixed top-0 left-0 right-0 z-50 items-center justify-center hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full ">
                                        <div class="relative w-full max-w-2xl max-h-full bg-white dark:bg-gray-700">

                                            {{-- Update form --}}
                                            <!-- Modal content -->
                                            <form action="{{ route('event-resources.update', $event_resource->id) }}"
                                                method="POST"
                                                class="relative bg-white rounded-lg shadow dark:bg-gray-700">

                                                @method('PUT')
                                                @csrf

                                                <!-- Modal header -->
                                                <div
                                                    class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                        Add Resources
                                                    </h3>
                                                    <button type="button"
                                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                        data-modal-hide="addUserModal">
                                                        <svg class="w-3 h-3" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                </div>
                                                <!-- Modal body -->
                                                <div class="p-6 space-y-6 dark:text-white">

                                                    {{-- Basic Information --}}
                                                    <div class="grid grid-cols-6 gap-6">
                                                        <div class="col-span-12">
                                                            <label for="title"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                                Title
                                                            </label>
                                                            <input type="text" name="title" id="title"
                                                                value="{{ $event_resource->title }}"
                                                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="enter the name of the resource..."
                                                                required="">
                                                        </div>


                                                        <div class="col-span-12">
                                                            <label for="description"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                                Description
                                                            </label>
                                                            <input type="text" name="description" id="description"
                                                                value="{{ $event_resource->description }}"
                                                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="enter the name of the resource..."
                                                                required="">
                                                        </div>
                                                    </div>


                                                    <div class="grid grid-cols-6 gap-6">

                                                        {{-- Resources format --}}
                                                        <div class="col-span-6 sm:col-span-3">
                                                            <label for="resource_format"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Format</label>
                                                            <select type="text" name="resource_format"
                                                                id="resource_format"
                                                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="resource_format" required=""
                                                                value="{{ $event_resource?->resource_format }}">
                                                                <option value="document" @selected($event_resource->resource_format === 'document')>
                                                                    Document</option>
                                                                <option value="image" @selected($event_resource->resource_format === 'image')>Image
                                                                </option>
                                                                <option value="video" @selected($event_resource->resource_format === 'video')>Video
                                                                </option>
                                                                <option value="audio" @selected($event_resource->resource_format === 'audio')>Audio
                                                                </option>
                                                            </select>
                                                        </div>

                                                        {{-- Category --}}
                                                        <div class="col-span-6 sm:col-span-3">
                                                            <label for="category"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                                            <select type="text" name="category" id="category"
                                                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="category" required=""
                                                                value="{{ $event_resource?->category }}">
                                                                <option value="general">General (All)</option>
                                                                @forelse ($event_types as $event_type)
                                                                    <option value="{{ $event_type->name }}"
                                                                        @selected($event_resource->category === $event_type->name)>
                                                                        {{ $event_type->name }}</option>
                                                                @empty
                                                                    <option value="">unavailable</option>
                                                                @endforelse
                                                            </select>
                                                        </div>

                                                    </div>

                                                    {{-- URL --}}
                                                    <div class="col-span-12">
                                                        <label for="url"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                            Link (URL) to resource
                                                        </label>
                                                        <input type="text" name="url" id="url"
                                                            value="{{ $event_resource->url }}"
                                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="this event is..." required="">
                                                        <span class="text-sm">Google drive, YouTube, Online
                                                            resources</span>
                                                    </div>

                                                    {{-- Events --}}
                                                    <div class="grid grid-cols-6 gap-6">
                                                        <div class="col-span-12">
                                                            <label for="event_id"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                                Select Event
                                                            </label>
                                                            <select type="text" name="event_id" id="event_id"
                                                                value="{{ $event_resource->event_id }}"
                                                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="December event">
                                                                @forelse ($events as $event)
                                                                    <option value="{{ $event->id }}"
                                                                        @selected($event_resource->event_id === $event->id)>{{ $event->name }} -
                                                                        {{ $event->center->address }} -
                                                                        {{ $event->center->state }}
                                                                    </option>
                                                                @empty
                                                                    <option value="">unavailable</option>
                                                                @endforelse
                                                            </select>
                                                        </div>
                                                    </div>



                                                    {{-- Accessible Roles --}}
                                                    <div class="w-100 text-center">Accessible Roles</div>
                                                    <div class="flex justify-evenly gap-3 text-center flex-auto flex-wrap">

                                                        @forelse ($roles as $role)
                                                            <label for="role{{ $role->id }}"
                                                                class="flex gap-2 justify-center items-center">
                                                                <input type="checkbox" name="event_resource_roles[]"
                                                                    @checked(in_array($role->id, $event_resource->roles->pluck('id')->toArray()))
                                                                    id="role{{ $role->id }}"
                                                                    value="{{ $role->id }}">
                                                                <span>{{ $role->name }}</span>
                                                            </label>
                                                        @empty
                                                            <label for="standard"
                                                                class="flex gap-2 justify-center items-center">
                                                                <span>no available role</span>
                                                            </label>
                                                        @endforelse

                                                    </div>


                                                </div>
                                                <!-- Modal footer -->
                                                <div
                                                    class="flex items-center p-6 space-x-3 rtl:space-x-reverse border-t border-gray-200 rounded-b dark:border-gray-600 bg-white dark:bg-gray-700">
                                                    <button type="submit"
                                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                        Save
                                                    </button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                @empty
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td colspan="10" class="text-center p-8">Resources unavailable</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>


                    {{-- Paginate --}}
                    <div class="text-center pt-4 bg-white dark:text-gray-100 dark:bg-gray-800">
                        <div class="px-8">
                            @if (isset($events) && !empty($events) && $events->links())
                                {{ $events->links() }}
                            @endif
                        </div>
                    </div>


                </div>

            </div>
            {{-- End of Table --}}


        </div>

    </div>
@endsection
