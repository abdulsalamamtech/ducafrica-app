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
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                aria-hidden="true" class="w-6 h-6 text-white">
                                <path
                                    d="M4.5 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM14.25 8.625a3.375 3.375 0 116.75 0 3.375 3.375 0 01-6.75 0zM1.5 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM17.25 19.128l-.001.144a2.25 2.25 0 01-.233.96 10.088 10.088 0 005.06-1.01.75.75 0 00.42-.643 4.875 4.875 0 00-6.957-4.611 8.586 8.586 0 011.71 5.157v.003z">
                                </path>
                            </svg>
                        </div>
                        <div class="p-4 text-right">
                            <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">
                                Users
                            </p>
                            <h4
                                class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">
                                {{ Number::abbreviate(auth()->user()->statistics()['admin']['users']['total'] ?? 0) }}
                            </h4>
                        </div>
                        <div class="border-t border-blue-gray-50 p-4">
                            <p class="block antialiased font-sans text-base leading-relaxed font-normal text-blue-gray-600">
                                <strong class="text-green-500">+3%</strong>&nbsp;than last month
                            </p>
                        </div>
                    </div>

                    <div
                        class="dark:bg-gray-700 dark:text-gray-300 dark:border-gray-700 relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 border border-blue-gray-100 shadow-sm">
                        <div
                            class="bg-clip-border mt-4 mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-gray-900 to-gray-800 text-white shadow-gray-900/20 absolute grid h-12 w-12 place-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                aria-hidden="true" class="w-6 h-6 text-white">
                                <path
                                    d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z">
                                </path>
                            </svg>
                        </div>
                        <div class="p-4 text-right">
                            <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">
                                New Users
                            </p>
                            <h4
                                class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">
                                {{ Number::abbreviate(auth()->user()->statistics()['admin']['users']['new_users'] ?? 0) }}
                            </h4>
                        </div>
                        <div class="border-t border-blue-gray-50 p-4">
                            <p class="block antialiased font-sans text-base leading-relaxed font-normal text-blue-gray-600">
                                <strong class="text-red-500">-0.1%</strong>&nbsp;than yesterday
                            </p>
                        </div>
                    </div>

                    <!-- Card -->
                    <div
                        class="dark:bg-gray-700 dark:text-gray-300 dark:border-gray-700 relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 border border-blue-gray-100 shadow-sm">
                        <div
                            class="bg-clip-border mt-4 mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-gray-900 to-gray-800 text-white shadow-gray-900/20 absolute grid h-12 w-12 place-items-center">
                            <i class="fa fa-user-circle text-white text-xl"></i>
                        </div>
                        <div class="p-4 text-right">
                            <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">
                                Verified Users</p>
                            <h4
                                class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">
                                {{ Number::abbreviate(auth()->user()->statistics()['admin']['users']['verified'] ?? 0) }}
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
                            <i class="fa fa-user-plus text-white text-xl"></i>
                        </div>
                        <div class="p-4 text-right">
                            <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">
                                Pending Users</p>
                            <h4
                                class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">
                                {{ Number::abbreviate(auth()->user()->statistics()['admin']['users']['pending'] ?? 0) }}                                
                            </h4>
                        </div>
                        <div class="dark:border-gray-500 border-t border-blue-gray-50 p-4">
                            <p class="block antialiased font-sans text-base leading-relaxed font-normal text-blue-gray-600">
                                <strong class="text-green-500">+0.1%</strong>&nbsp;than last week
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
                        <h2 class="text-xl md:text-2xl font-semibold text-gray-700 dark:text-gray-300">All Users</h2>
                        
                        <a href="{{ route('new-users') }}">
                            <button class="px-3 md:px-4 py-2 bg-blue-800 text-white rounded-md hover:bg-blue-700"
                                data-modal-target="addUserModal" data-modal-show="addUserModal">
                                    <i class="fa fa-user-plus"></i>
                                    <span class="pl-2">View New Users</span>
                            </button>
                        </a>

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
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">verified</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">pending</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <form class="w-full max-w-md mx-auto" action="{{ route('users.search') }}" method="POST">
                            @method('POST')
                            @csrf
                            <label for="default-search" class="mb-1 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                    </svg>
                                </div>
                                <input type="search" name="search" id="default-search" class="@error('search') {{ 'border-red-500' }} @enderror block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                                    placeholder="Search..." required   />
                                <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                            </div>
                        </form>

                    </div>


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
                                    DOB
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Address
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Role
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Booked events
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
                            @forelse ($users as $user)
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
                                    <th scope="row"
                                        class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                        <img class="w-10 h-10 rounded-full" src="/images/default-profile.png"
                                            alt="Jese image">
                                        <div class="ps-3">
                                            <div class="text-base font-semibold">{{ $user->first_name . ' ' . $user->last_name . ' ' . $user->other }}</div>
                                            <div class="font-normal text-gray-500">({{ $user->role }}): {{ $user->activeRole() }}</div>
                                            <div class="font-normal text-gray-500">{{ $user->email }}</div>
                                            <div class="font-normal text-gray-500">{{ $user->phone . " (". $user->phone_type .")"}}</div>
                                        </div>
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $user->dob->format('D, d M Y') }}
                                        ({{ now()->format('Y') - $user->dob->format('Y') }} Years Old)
                                    </td>
                                    <td class="ps-3">
                                        <div class="font-normal text-gray-500">{{ $user->address }}</div>
                                        <div class="font-normal text-gray-500">{{ $user->city }}</div>
                                        <div class="font-normal text-gray-500">{{ $user->state }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $user?->activeRole()?? 'user' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $user->bookedEvents->count() }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            @if ($user->status == 'active')
                                                <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Verified
                                            @else
                                                <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2"></div> Pending
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">

                                        <button id="dropdownMenuIconButton{{ $user->id }}" data-dropdown-toggle="dropdownDots{{ $user->id }}" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                                            <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                                            </svg>
                                            </button>

                                            <!-- Dropdown menu -->
                                            <div id="dropdownDots{{ $user->id }}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconButton{{ $user->id }}">
                                                    <li>
                                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">View</a>
                                                    </li>
                                                    <li class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                        <!-- Modal toggle -->
                                                        <div href="#" type="button"
                                                            data-modal-target="editUserModal{{ $user->id }}"
                                                            data-modal-show="editUserModal{{ $user->id }}"
                                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Deactivate</a>
                                                    </li>
                                                </ul>
                                            </div>
                                    </td>
                                </tr>
                                <!-- Edit user modal 1 -->
                                <div id="editUserModal{{ $user->id }}" tabindex="-1" aria-hidden="true"
                                    class="fixed top-0 left-0 right-0 z-50 items-center justify-center hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative w-full max-w-2xl max-h-full bg-white">
                                        <!-- Modal content -->
                                        <form class="relative bg-white rounded-lg shadow dark:bg-gray-700" 
                                            action="{{ route('users.update', $user->id) }}" method="POST">
                                            @method('PUT')
                                            @csrf
                                            <!-- Modal header -->
                                            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                    Edit user {{ $user->id }}
                                                </h3>
                                                <button type="button"
                                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-hide="editUserModal{{ $user->id }}">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="p-6 space-y-6">
                                                <div class="grid grid-cols-6 gap-6">
                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="first-name"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                            First Name
                                                        </label>
                                                        <input type="text" name="first_name" id="first-name"
                                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="Bonnie" required="" value="{{ $user->first_name }}">
                                                    </div>
                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="last-name"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                            Last Name.
                                                        </label>
                                                        <input type="text" name="last_name" id="last-name"
                                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="Green" required="" value="{{ $user->last_name }}">
                                                    </div>
                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="other_name"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                            Other Name
                                                        </label>
                                                        <input type="text" name="other_name" id="other_name"
                                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="example@company.com" required="" value="{{ $user->other_name }}">
                                                    </div>
                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="phone-number"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                            DOB
                                                        </label>
                                                        <input type="date" name="dob" id="phone-number"
                                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="e.g. 23 Nov 2000" required="" value="2000-11-11">
                                                    </div>
                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="email"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                                        <input type="email" name="email" id="email"
                                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="example@company.com" required="" value="{{ $user->email }}" disabled>
                                                    </div>
                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="phone"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone
                                                            Number</label>
                                                        <input type="tel" name="phone" id="phone"
                                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="e.g. +(12)3456 789" required="" value="{{$user->phone}}" disabled>
                                                    </div>                                                
                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="verified"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Verified</label>
                                                        <select type="text" name="status" id="verified"
                                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="Development" required="">
                                                            @if ($user->status == 'active')
                                                                <option value="active" selected="true">yes</option>
                                                                <option value="pending">no</option>
                                                            @else
                                                                <option value="active">yes</option>
                                                                <option value="pending" selected="true">no</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="userRole"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                                                        <select type="text" name="role" id="userRole"
                                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="e.g. user" required="">
                                                            <option value="">-- select role--</option>
                                                            @forelse (\App\Enum\UserRoleEnum::cases() as $available_role)
                                                                @if (Auth::user()->role !== \App\Enum\UserRoleEnum::SUPERADMIN && $available_role == \App\Enum\UserRoleEnum::SUPERADMIN )
                                                                    @continue
                                                                @else
                                                                    <option value="{{ $available_role->value() }}" @if (in_array($available_role->value(), [$user->role, $user->activeRole()])) {{ "selected" }}@endif> 
                                                                        {{Str::title($available_role->label())}}
                                                                    </option>          
                                                                @endif

                                                                {{-- {{ $available_role }} --}}
                                                            @empty
                                                                <option value="">roles unavailable</option>
                                                            @endforelse       
                                                            {{-- {{ json_encode($available_roles::getValue()) }}                                                      --}}
                                                        </select>
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
                            @empty
                                <tr class="text-center">
                                    <td colspan="7" class="p-4">Users unavailable</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>


                    {{-- Paginate --}}
                    <div class="text-center pt-4 bg-white dark:text-gray-100 dark:bg-gray-800">
                        <div class="px-8">
                            @if (isset($users) && !empty($users) && $users->links())
                                {{ $users->links() }}
                            @endif
                        </div>
                    </div>

                </div>



            </div>
            {{-- End of Table --}}


        </div>

    </div>
@endsection
