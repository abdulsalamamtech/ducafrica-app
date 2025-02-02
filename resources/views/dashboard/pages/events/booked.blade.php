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
                                Total Events</p>
                            <h4
                                class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">
                                {{ Number::abbreviate(auth()->user()->statistics()['admin']['events']?? 0) }}
                            </h4>
                        </div>
                        <div class="dark:border-gray-500 border-t border-blue-gray-50 p-4">
                            <p class="block antialiased font-sans text-base leading-relaxed font-normal text-blue-gray-600">
                                <strong class="text-green-500">+1%</strong>&nbsp;than last week
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
                                Active Events</p>
                            <h4
                                class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">
                                {{ Number::abbreviate(auth()->user()->statistics()['admin']['events']?? 0) }}
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
                                Inactive Events</p>
                            <h4
                                class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">
                                {{ Number::abbreviate(auth()->user()->statistics()['admin']['events']?? 0) }}
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
                                Booked Events</p>
                            <h4
                                class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">
                                {{ Number::abbreviate(auth()->user()->statistics()['admin']['booked_events']?? 0) }}
                            </h4>
                        </div>
                        <div class="dark:border-gray-500 border-t border-blue-gray-50 p-4">
                            <p class="block antialiased font-sans text-base leading-relaxed font-normal text-blue-gray-600">
                                <strong class="text-green-500">+55%</strong>&nbsp;than last week
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
                        <h2 class="text-xl md:text-2xl font-semibold text-gray-700 dark:text-gray-300">Events</h2>
                        <button class="px-3 md:px-4 py-2 bg-blue-800 text-white rounded-md hover:bg-blue-700"
                            data-modal-target="addUserModal" data-modal-show="addUserModal">
                            <i class='fa fa-pencil-square-o'></i>
                            <span class="pl-2">Add Event</span>
                        </button>


                        {{-- Add Data --}}
                        <!-- Add Data modal -->
                        <div id="addUserModal" tabindex="-1" aria-hidden="true"
                            class="fixed top-0 left-0 right-0 z-50 items-center justify-center hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-2xl max-h-full bg-white">
                                <!-- Modal content -->
                                <form action="{{ route('events.store') }}" method="POST"
                                    class="relative bg-white rounded-lg shadow dark:bg-gray-700">

                                    @method('POST')
                                    @csrf

                                    <!-- Modal header -->
                                    <div
                                        class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                            Add Event
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
                                        <div class="w-100 text-center">Basic Information</div>
                                        <div class="grid grid-cols-6 gap-6">


                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="title_name"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Event
                                                    Title</label>
                                                <input type="text" name="name" id="title_name"
                                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="July Starter Event" required="">
                                            </div>


                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="add_type"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
                                                <select type="text" name="type" id="add_type"
                                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="workshop" required="" value="">
                                                    <option value="workshop">workshop</option>
                                                    <option value="retreat">retreat</option>
                                                    <option value="seminars">seminars</option>
                                                    <option value="recollection">recollection</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="amount-cost"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                    Amount Cost</label>
                                                <input type="number" name="cost" id="amount-cost"
                                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="150000" required="">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="slots"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                    Available Slots
                                                </label>
                                                <input type="number" name="slots" id="slots"
                                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="25" required="">
                                            </div>



                                        </div>

                                        <div class="grid grid-cols-6 gap-6">
                                            <div class="col-span-12">
                                                <label for="center_id"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                    Select center
                                                </label>
                                                <select type="text" name="center_id" id="center_id"
                                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Bonnie event center" required="">
                                                    @forelse ($centers as $center)
                                                        <option value="{{ $center->id }}">{{ $center->name }} -
                                                            {{ $center->address }} - {{ $center->state }}</option>
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
                                                    <input type="checkbox" name="event_roles[]"
                                                        id="role{{ $role->id }}" value="{{ $role->id }}">
                                                    <span>{{ $role->name }}</span>
                                                </label>
                                            @empty
                                                <label for="standard" class="flex gap-2 justify-center items-center">
                                                    <span>no available role</span>
                                                </label>
                                            @endforelse

                                        </div>

                                        {{-- Booking Information --}}
                                        <div class="w-100 text-center">Booking Information</div>

                                        <div class="flex gap-6">
                                            <div class="col-span-6 sm:col-span-3 w-100 md:w-6/12">
                                                <label for="start_date"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                    Start Date</label>
                                                <input type="date" name="start_date" id="start_date"
                                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="12/12/2024" required="">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3 w-100 md:w-6/12">
                                                <label for="end_date"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                    End Date
                                                </label>
                                                <input type="date" name="end_date" id="end_date"
                                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="25/12/2024" required="">
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-6 gap-6">
                                            <div class="col-span-12">
                                                <label for="description"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                    Description
                                                </label>
                                                <input type="text" name="description" id="description"
                                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="this event is..." required="">
                                            </div>
                                        </div>

                                        <div class="flex gap-6">
                                            <div class="col-span-6 sm:col-span-3 w-100 md:w-6/12">
                                                <label for="contact_name"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                    Organizer's Name</label>
                                                <input type="text" name="contact_name" id="contact_name"
                                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Mr. Issac James" required="">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3 w-100 md:w-6/12">
                                                <label for="contact_phone_number"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                    Organizer's Number
                                                </label>
                                                <input type="tel" name="contact_phone_number"
                                                    id="contact_phone_number"
                                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="+23542623568" required="">
                                            </div>
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
                            <label for="default-search" class="mb-1 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                    </svg>
                                </div>
                                <input name="search" type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search..." required />
                                <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                            </div>
                        </form>

                    </div>


                    {{-- Download and Print --}}
                    <div>
                        <div class="text-right mt-3">
                            <a href="{{ route('fast-excel.booked-events') }}" class="">
                                <button type="button"
                                    class="inline-flex items-center px-2.5 py-1.5 text-sm font-medium text-gray-100 bg-green-500 border border-gray-300 focus:outline-none hover:bg-green-400 focus:ring-4 focus:ring-gray-100 rounded-lg dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                    <i class="fa fa-file-excel-o"></i>
                                    <span class="pl-2">Export Booked Events</span>
                                </button>
                            </a>
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
                                        User
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Event
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Map Address
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Cost
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

                                @forelse ($booked_events as $booked_event)
                                    <!-- User table record 1 -->
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="w-4 p-4">
                                            <div class="flex items-center">
                                                <input id="checkbox-table-search-1" type="checkbox"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                            </div>
                                        </td>
                                        <th >
                                            <div class="ps-3">
                                                <img class="w-10 h-10 rounded-full" src="/images/default-profile.png"
                                                    alt="Jese image">
                                                <div class="ps-3">
                                                    <div class="text-base font-semibold">{{ $booked_event->user->last_name . ' ' . $booked_event->user->first_name }}</div>
                                                    <div class="font-normal text-gray-600">{{ $booked_event->user->email }}</div>
                                                    <div class="font-normal text-gray-600">{{ $booked_event->user->phone }}</div>
                                                    <div class="font-normal text-gray-600">{{ $booked_event->user->address . ', ' .$booked_event->user->state }}</div>
                                                </div>
                                            </div>
                                        </th>
                                        
                                        <th scope="row"
                                            class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                            <img class="w-10 h-10 rounded-full" src="{{ $booked_event?->event?->center?->centerAsset->url ?? '/images/africa.jpg' }}"
                                                alt="Jese image">
                                            <div class="ps-3">
                                                <div class="text-base font-semibold">{{ $booked_event->event->name }}</div>
                                                <div class="font-normal text-gray-500">{{ $booked_event->event->type }}</div>
                                                <div class="font-normal text-gray-600">{{ $booked_event->event->contact_name }}</div>
                                                <div class="font-normal text-gray-600">{{ $booked_event->event->contact_phone_number }}</div>
                                                <div class="font-normal text-gray-600">{{ $booked_event->event?->center?->state }}</div>

                                                <div class="font-normal text-gray-500">
                                                    {{-- <span class="font-bold text-gray-600">START:</span> --}}
                                                    {{ $booked_event->event?->start_date->format('l jS, F Y') }} ({{ $booked_event->event?->start_date->diffForHumans() }})
                                                </div>
                                                <div class="font-normal text-gray-500">
                                                    {{-- <span class="font-bold text-gray-600">ENDS:</span> --}}
                                                    {{ $booked_event->event->end_date->format('l jS, F Y') }} ({{ $booked_event->event?->end_date->diffForHumans() }})
                                                </div>
                                            </div>
                                        </th>
                                        
                                        <td class="px-6 py-4">
                                            {{-- Link to Map --}}
                                            <a href="{{ $booked_event->event->center?->map_url }}" class="text-blue-400">
                                                {{ $booked_event->event->center?->address . ', '. $booked_event->event->center?->state }}
                                            </a>
                                        </td>
                                        <td class="px-6 py-4">
                                            NGN. {{ $booked_event->payment_amount }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                @if ($booked_event->paid)
                                                    <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Successful
                                                @else
                                                    <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2"></div> Pending
                                                @endif
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">

                                            <button id="dropdownMenuIconButton{{ $booked_event->event->id }}" data-dropdown-toggle="dropdownDots{{ $booked_event->event->id }}"
                                                class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                                type="button">
                                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor" viewBox="0 0 4 15">
                                                    <path
                                                        d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                                </svg>
                                            </button>

                                            <!-- Dropdown menu -->
                                            <div id="dropdownDots{{ $booked_event->event->id }}"
                                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                                    aria-labelledby="dropdownMenuIconButton{{ $booked_event->event->id }}">
                                                    <li>
                                                        <a href="{{ route('events.show', $booked_event->event->id) }}"
                                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">View</a>
                                                    </li>
                                                    <li
                                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                        <!-- Modal toggle -->
                                                        <div href="#" type="button" data-modal-target="editUserModal{{ $booked_event->event->id }}"
                                                            data-modal-show="editUserModal{{ $booked_event->event->id }}"
                                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                                            Event Detail  
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('events.details', $booked_event->event->id ) }}"
                                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">View Booking Details</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Edit user modal 1 -->
                                    <div id="editUserModal{{ $booked_event->event->id }}" tabindex="-1" aria-hidden="true"
                                        class="fixed top-0 left-0 right-0 z-50 items-center justify-center hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative w-full max-w-2xl max-h-full bg-white dark:bg-gray-700">

                                            <!-- Modal content -->
                                            <form action="javascript::void()" method="POST"
                                                class="relative bg-white rounded-lg shadow dark:bg-gray-700">

                                                @method('PUT')
                                                @csrf

                                                <!-- Modal header -->
                                                <div
                                                    class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600 dark:bg-gray-900">
                                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white ">
                                                        Event Details {{ $booked_event->event->id }}
                                                    </h3>
                                                    <button type="button"
                                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                        data-modal-hide="editUserModal{{ $booked_event->event->id }}">
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
                                                <div class="p-6 space-y-6 bg-white dark:text-white dark:bg-gray-700">

                                                    {{-- Basic Information --}}
                                                    <div class="w-100 text-center">Basic Information</div>
                                                    <div class="grid grid-cols-6 gap-6">


                                                        <div class="col-span-6 sm:col-span-3">
                                                            <label for="title_name"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Event
                                                                Title</label>
                                                            <input type="text" name="name" id="title_name"
                                                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="July Starter Event" required="" value="{{ $booked_event->event->name }}" disabled>
                                                        </div>


                                                        <div class="col-span-6 sm:col-span-3">
                                                            <label for="add_type"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
                                                            <select type="text" name="type" id="add_type"
                                                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="workshop" required="" value="" disabled>
                                                                <option value="workshop">workshop</option>
                                                                <option value="retreat">retreat</option>
                                                                <option value="seminars">seminars</option>
                                                                <option value="recollection">recollection</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-span-6 sm:col-span-3">
                                                            <label for="amount-cost"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                                Amount Cost</label>
                                                            <input type="number" name="cost" id="amount-cost"
                                                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="150000" required="" value="{{ $booked_event->event->cost }}" disabled>
                                                        </div>

                                                        <div class="col-span-6 sm:col-span-3">
                                                            <label for="slots"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                                Available Slots
                                                            </label>
                                                            <input type="number" name="slots" id="slots"
                                                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="25" required="" value="{{ $booked_event->event->slots }}" disabled>
                                                        </div>



                                                    </div>

                                                    <div class="grid grid-cols-6 gap-6">
                                                        <div class="col-span-12">
                                                            <label for="center_id"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                                Select center
                                                            </label>
                                                            <select type="text" name="center_id" id="center_id"
                                                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="Bonnie event center" required="" disabled>
                                                                @forelse ($centers as $center)
                                                                    <option value="{{ $center->id }}">{{ $center->name }} -
                                                                        {{ $center->address }} - {{ $center->state }}</option>
                                                                @empty
                                                                    <option value="">unavailable</option>
                                                                @endforelse
                                                            </select>
                                                        </div>
                                                    </div>



                                                    {{-- Accessible Roles --}}
                                                    <div class="w-100 text-center">Accessible Roles</div>
                                                    <div class="flex justify-evenly gap-3 text-center flex-auto flex-wrap">

                                                        {{-- {{ $booked_event->event->eventRoles }} --}}

                                                        {{-- @foreach ( $booked_event->event->eventRoles as $event_role)
                                                            {{ $event_role->id }}
                                                        @endforeach --}}

                                                        @forelse ($roles as $role)
                                                            <label for="role{{ $role->id }}"
                                                                class="flex gap-2 justify-center items-center">
                                                                <input type="checkbox" name="event_roles[]"
                                                                    id="role{{ $role->id }}" value="{{ $role->id }}"

                                                                    @foreach ( $booked_event->event->eventRoles as $event_role)
                                                                        @if ($event_role->id == $role->id)
                                                                            {{ "checked"}}
                                                                        @endif
                                                                    @endforeach
                                                                    disabled>

                                                                <span>{{ $role->name }}</span>
                                                            </label>
                                                        @empty
                                                            <label for="standard" class="flex gap-2 justify-center items-center">
                                                                <span>no available role</span>
                                                            </label>
                                                        @endforelse

                                                    </div>

                                                    {{-- Booking Information --}}
                                                    <div class="w-100 text-center">Booking Information</div>

                                                    <div class="flex gap-6">
                                                        <div class="col-span-6 sm:col-span-3 w-100 md:w-6/12">
                                                            <label for="start_date"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                                Start Date</label>
                                                            <input type="date" name="start_date" id="start_date"
                                                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="12/12/2024" required="" value="{{ $booked_event->event->start_date->format('Y-m-d') }}" disabled>
                                                        </div>

                                                        <div class="col-span-6 sm:col-span-3 w-100 md:w-6/12">
                                                            <label for="end_date"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                                End Date
                                                            </label>
                                                            <input type="date" name="end_date" id="end_date"
                                                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="25/12/2024" required="" value="{{ $booked_event->event->end_date->format('Y-m-d') }}" disabled>
                                                        </div>
                                                    </div>

                                                    <div class="grid grid-cols-6 gap-6">
                                                        <div class="col-span-12">
                                                            <label for="description"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                                Description
                                                            </label>
                                                            <input type="text" name="description" id="description"
                                                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="this event is..." required="" value="{{ $booked_event->event->description }}" disabled>
                                                        </div>
                                                    </div>

                                                    <div class="flex gap-6">
                                                        <div class="col-span-6 sm:col-span-3 w-100 md:w-6/12">
                                                            <label for="contact_name"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                                Organizer's Name</label>
                                                            <input type="text" name="contact_name" id="contact_name"
                                                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="Mr. Issac James" required="" value="{{ $booked_event->event->contact_name }}" disabled>
                                                        </div>

                                                        <div class="col-span-6 sm:col-span-3 w-100 md:w-6/12">
                                                            <label for="contact_phone_number"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                                Organizer's Number
                                                            </label>
                                                            <input type="tel" name="contact_phone_number"
                                                                id="contact_phone_number"
                                                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="+23542623568" required="" value="{{ $booked_event->event->contact_phone_number }}" disabled>
                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- Modal footer -->
                                                <div
                                                    class="flex items-center p-6 space-x-3 rtl:space-x-reverse border-t border-gray-200 rounded-b dark:border-gray-600 bg-white dark:bg-gray-800">
                                                    <button type="submit" data-modal-hide="editUserModal{{ $booked_event->event->id }}"
                                                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                        Close
                                                    </button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                @empty
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td colspan="10" class="text-center p-8">Event unavailable</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>

                    
                    {{-- Paginate --}}
                    <div class="text-center pt-4 bg-white dark:text-gray-100 dark:bg-gray-800">
                        <div class="px-8">
                            @if (isset($booked_events) && !empty($booked_events) && $booked_events->links())
                                {{ $booked_events->links() }}
                            @endif
                        </div>
                    </div>
                    

                </div>

            </div>
            {{-- End of Table --}}


        </div>

    </div>
@endsection
