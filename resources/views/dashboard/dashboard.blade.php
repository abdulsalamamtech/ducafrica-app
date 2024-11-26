@extends('dashboard.layouts.master')

@section('content')
    <!-- Container -->
    <div class="p-4 sm:ml-64">

        <div class="rounded-lg dark:border-gray-700 mt-20">

            {{-- Information --}}
            {{-- <div
                class="bg-white shadow-lg rounded-lg flex items-center gap-2 p-4 w-full dark:bg-slate-800 dark:text-gray-100">
                <div class="md:p-2">
                    <i class="fa fa-truck bg-[#0828b9] p-2 rounded-full md:text-2xl text-white"></i>
                </div>
                <div class="sm:p-2 mb-4 md:mb-0">
                    <h2 class="md:text-xl font-bold mb-2">Amtech Oil & Gas</h2>
                    <p class="text-gray-700 dark:text-slate-400 mb-1">manager@amtechoilandgas.com</p>
                    <p class="text-gray-500 dark:text-gray-300">No. 54 Rimi, Gwarzo Road, Kano State</p>
                </div>
            </div> --}}

            {{-- Statistica widge --}}
            <div class="p-6 my-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">

                <div class="grid gap-y-10 gap-x-6 md:grid-cols-2 xl:grid-cols-4 mb-4">
                    <div
                        class="dark:bg-gray-700 dark:text-gray-300 dark:border-gray-700 relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 border border-blue-gray-100 shadow-sm">
                        <div
                            class="bg-clip-border mt-4 mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-gray-900 to-gray-800 text-white shadow-gray-900/20 absolute grid h-12 w-12 place-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                aria-hidden="true" class="w-6 h-6 text-white">
                                <path d="M12 7.5a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z"></path>
                                <path fill-rule="evenodd"
                                    d="M1.5 4.875C1.5 3.839 2.34 3 3.375 3h17.25c1.035 0 1.875.84 1.875 1.875v9.75c0 1.036-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 011.5 14.625v-9.75zM8.25 9.75a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zM18.75 9a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V9.75a.75.75 0 00-.75-.75h-.008zM4.5 9.75A.75.75 0 015.25 9h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H5.25a.75.75 0 01-.75-.75V9.75z"
                                    clip-rule="evenodd"></path>
                                <path
                                    d="M2.25 18a.75.75 0 000 1.5c5.4 0 10.63.722 15.6 2.075 1.19.324 2.4-.558 2.4-1.82V18.75a.75.75 0 00-.75-.75H2.25z">
                                </path>
                            </svg>
                        </div>
                        <div class="p-4 text-right">
                            <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">
                                Total Transactions
                            </p>
                            <h4
                                class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">
                                $503k</h4>
                        </div>
                        <div class="dark:border-gray-500 border-t border-blue-gray-50 p-4">
                            <p class="block antialiased font-sans text-base leading-relaxed font-normal text-blue-gray-600">
                                <strong class="text-green-500">+55%</strong>&nbsp;than last week
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
                                2,300</h4>
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
                                62</h4>
                        </div>
                        <div class="border-t border-blue-gray-50 p-4">
                            <p class="block antialiased font-sans text-base leading-relaxed font-normal text-blue-gray-600">
                                <strong class="text-red-500">-2%</strong>&nbsp;than yesterday
                            </p>
                        </div>
                    </div>

                    <div
                        class="dark:bg-gray-700 dark:text-gray-300 dark:border-gray-700 relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 border border-blue-gray-100 shadow-sm">
                        <div
                            class="bg-clip-border mt-4 mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-gray-900 to-gray-800 text-white shadow-gray-900/20 absolute grid h-12 w-12 place-items-center">
                            <i class="fa fa-comments"></i>
                        </div>
                        <div class="p-4 text-right">
                            <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">
                                Messages</p>
                            <h4
                                class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">
                                30</h4>
                        </div>
                        <div class="border-t border-blue-gray-50 p-4">
                            <p class="block antialiased font-sans text-base leading-relaxed font-normal text-blue-gray-600">
                                <strong class="text-green-500">+5%</strong>&nbsp;than yesterday
                            </p>
                        </div>
                    </div>
                </div>

                <div class="grid gap-y-10 gap-x-6 md:grid-cols-2 xl:grid-cols-4 mb-4">
                    <div
                        class="dark:bg-gray-700 dark:text-gray-300 dark:border-gray-700 relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 border border-blue-gray-100 shadow-sm">
                        <div
                            class="bg-clip-border mt-4 mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-gray-900 to-gray-800 text-white shadow-gray-900/20 absolute grid h-12 w-12 place-items-center">
                            <i class="fa fa-th-large"></i>
                        </div>
                        <div class="p-4 text-right">
                            <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">
                                Centers
                            </p>
                            <h4
                                class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">
                                53k</h4>
                        </div>
                        <div class="dark:border-gray-500 border-t border-blue-gray-50 p-4">
                            <p class="block antialiased font-sans text-base leading-relaxed font-normal text-blue-gray-600">
                                <strong class="text-green-500">+55%</strong>&nbsp;than last week
                            </p>
                        </div>
                    </div>
                    <div
                        class="dark:bg-gray-700 dark:text-gray-300 dark:border-gray-700 relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 border border-blue-gray-100 shadow-sm">
                        <div
                            class="bg-clip-border mt-4 mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-gray-900 to-gray-800 text-white shadow-gray-900/20 absolute grid h-12 w-12 place-items-center">
                            <i class="fa fa-cube"></i>
                        </div>
                        <div class="p-4 text-right">
                            <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">
                                Events
                            </p>
                            <h4
                                class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">
                                120</h4>
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
                            <i class="fa fa-bookmark"></i>
                        </div>
                        <div class="p-4 text-right">
                            <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">
                                Booked Events
                            </p>
                            <h4
                                class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">
                                3,462</h4>
                        </div>
                        <div class="border-t border-blue-gray-50 p-4">
                            <p class="block antialiased font-sans text-base leading-relaxed font-normal text-blue-gray-600">
                                <strong class="text-red-500">-2%</strong>&nbsp;than yesterday
                            </p>
                        </div>
                    </div>

                    <div
                        class="dark:bg-gray-700 dark:text-gray-300 dark:border-gray-700 relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 border border-blue-gray-100 shadow-sm">
                        <div
                            class="bg-clip-border mt-4 mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-gray-900 to-gray-800 text-white shadow-gray-900/20 absolute grid h-12 w-12 place-items-center">
                            <i class="fa fa-times"></i>
                        </div>
                        <div class="p-4 text-right">
                            <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">
                                Cancel Events</p>
                            <h4
                                class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">
                                10</h4>
                        </div>
                        <div class="border-t border-blue-gray-50 p-4">
                            <p class="block antialiased font-sans text-base leading-relaxed font-normal text-blue-gray-600">
                                <strong class="text-green-500">+5%</strong>&nbsp;than yesterday
                            </p>
                        </div>
                    </div>
                </div>
            </div>



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
                                <form class="relative bg-white rounded-lg shadow dark:bg-gray-700">
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
                                                <label for="first-name"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Event
                                                    Title</label>
                                                <input type="text" name="first-name" id="first-name"
                                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="July Starter Event" required="">
                                            </div>


                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="email"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
                                                <select type="email" name="email" id="email"
                                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="workshop" required="" value="">
                                                    <option value="1">workshop</option>
                                                    <option value="2">retreat</option>
                                                    <option value="3">seminars</option>
                                                    <option value="4">recollection</option>
                                                    <option value="5">quarterlies</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="amount-cost"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                    Amount Cost</label>
                                                <input type="number" name="last-name" id="last-name"
                                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="150000" required="">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="slots"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                    Available Slots
                                                </label>
                                                <input type="number" name="phone-number" id="phone-number"
                                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="25" required="">
                                            </div>



                                        </div>


                                        {{-- Accessible Roles --}}
                                        <div class="w-100 text-center">Accessible Roles</div>
                                        <div class="flex justify-evenly gap-3 text-center flex-auto flex-wrap">
                                            <label for="standard" class="flex gap-2 justify-center items-center">
                                                <input type="checkbox" name="standard" id="standard">
                                                <span>Standard</span>
                                            </label>
                                            <label for="standard" class="flex gap-2 justify-center items-center">
                                                <input type="checkbox" name="standard" id="standard">
                                                <span>Standard</span>
                                            </label>
                                            <label for="standard" class="flex gap-2 justify-center items-center">
                                                <input type="checkbox" name="standard" id="standard">
                                                <span>Standard</span>
                                            </label>
                                            <label for="standard" class="flex gap-2 justify-center items-center">
                                                <input type="checkbox" name="standard" id="standard">
                                                <span>Standard</span>
                                            </label>
                                            <label for="standard" class="flex gap-2 justify-center items-center">
                                                <input type="checkbox" name="standard" id="standard">
                                                <span>Standard</span>
                                            </label>
                                            <label for="standard" class="flex gap-2 justify-center items-center">
                                                <input type="checkbox" name="standard" id="standard">
                                                <span>Standard</span>
                                            </label>

                                            <label for="standard" class="flex gap-2 justify-center items-center">
                                                <input type="checkbox" name="standard" id="standard">
                                                <span>Standard</span>
                                            </label>

                                        </div>

                                        {{-- Booking Information --}}
                                        <div class="w-100 text-center">Booking Information</div>

                                        <div class="flex gap-6">
                                            <div class="col-span-6 sm:col-span-3 w-100 md:w-6/12">
                                                <label for="amount-cost"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                    Start Date</label>
                                                <input type="date" name="last-name" id="last-name"
                                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="12/12/2024" required="">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3 w-100 md:w-6/12">
                                                <label for="slots"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                    End Date
                                                </label>
                                                <input type="date" name="phone-number" id="phone-number"
                                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="25/12/2024" required="">
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-6 gap-6">
                                            <div class="col-span-12">
                                                <label for="first-name"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                    Description
                                                </label>
                                                <input type="text" name="first-name" id="first-name"
                                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Bonnie event center" required="">
                                            </div>
                                        </div>

                                        <div class="flex gap-6">
                                            <div class="col-span-6 sm:col-span-3 w-100 md:w-6/12">
                                                <label for="amount-cost"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                    Organizer's Name</label>
                                                <input type="text" name="last-name" id="last-name"
                                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Mr. Issac James" required="">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3 w-100 md:w-6/12">
                                                <label for="slots"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                    Organizer's Number
                                                </label>
                                                <input type="tel" name="phone-number" id="phone-number"
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

                    {{-- Filter and Search --}}
                    <div
                        class="flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 py-4 bg-white dark:bg-gray-900 px-4">

                        {{-- Filter --}}
                        <div>
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
                            </div>
                            <!-- Dropdown menu -->
                            <div id="dropdownAction"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
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


                        {{-- Search --}}
                        <div class="flex flex-column md:flex-row gap-4 items-center justify-between">
                            <div class="">
                                <label for="table-search" class="sr-only">Search</label>
                                <div class="relative">
                                    <div
                                        class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                        </svg>
                                    </div>
                                    <input type="text" id="table-search-users"
                                        class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Search for users">
                                </div>
                            </div>
                        </div>


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
                            <a href="#" class="">
                                <button type="button"
                                    class="inline-flex items-center px-2.5 py-1.5 text-sm font-medium text-gray-100 bg-green-500 border border-gray-300 focus:outline-none hover:bg-green-400 focus:ring-4 focus:ring-gray-100 rounded-lg dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                    <i class="fa fa-download"></i>
                                    <span class="pl-2">Download</span>
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
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Payment ID
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Map Address
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        State
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
                                            <div class="text-base font-semibold">Neil Sims Center</div>
                                            <div class="font-normal text-gray-500">Center & Event</div>
                                            <div class="font-normal text-gray-500">+2349091920011</div>
                                        </div>
                                    </th>
                                    <td class="px-6 py-4">
                                        PAY_783960545948
                                    </td>
                                    <td class="px-6 py-4">
                                        {{-- Link to Map --}}
                                        <a href="#">
                                            No. 233 Ikorod layout
                                        </a>
                                    </td>
                                    <td class="px-6 py-4">
                                        Lagos State
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Active
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">

                                        <button id="dropdownMenuIconButton1" data-dropdown-toggle="dropdownDots1"
                                            class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                            type="button">
                                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor" viewBox="0 0 4 15">
                                                <path
                                                    d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                            </svg>
                                        </button>

                                        <!-- Dropdown menu -->
                                        <div id="dropdownDots1"
                                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                                aria-labelledby="dropdownMenuIconButton1">
                                                <li>
                                                    <a href="#"
                                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">View</a>
                                                </li>
                                                <li
                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                    <!-- Modal toggle -->
                                                    <div href="#" type="button" data-modal-target="editUserModal1"
                                                        data-modal-show="editUserModal1"
                                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                                        Edit
                                                    </div>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Deactivate</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Edit user modal 1 -->
                                <div id="editUserModal1" tabindex="-1" aria-hidden="true"
                                    class="fixed top-0 left-0 right-0 z-50 items-center justify-center hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative w-full max-w-2xl max-h-full bg-white dark:bg-gray-700">

                                        <!-- Modal content -->
                                        <form class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div
                                                class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600 dark:bg-gray-900">
                                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white ">
                                                    Edit Event 2
                                                </h3>
                                                <button type="button"
                                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-hide="editUserModal2">
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
                                            <div class="p-6 space-y-6 bg-white dark:bg-gray-800 dark:text-white">

                                                {{-- Basic Information --}}
                                                <div class="w-100 text-center">Basic Information</div>
                                                <div class="grid grid-cols-6 gap-6">


                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="first-name"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Event
                                                            Title</label>
                                                        <input type="text" name="first-name" id="first-name"
                                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="July Starter Event" required="">
                                                    </div>


                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="email"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
                                                        <select type="email" name="email" id="email"
                                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="workshop" required="" value="">
                                                            <option value="1">workshop</option>
                                                            <option value="2">retreat</option>
                                                            <option value="3">seminars</option>
                                                            <option value="4">recollection</option>
                                                            <option value="5">quarterlies</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="amount-cost"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                            Amount Cost</label>
                                                        <input type="number" name="last-name" id="last-name"
                                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="150000" required="">
                                                    </div>

                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="slots"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                            Available Slots
                                                        </label>
                                                        <input type="number" name="phone-number" id="phone-number"
                                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="25" required="">
                                                    </div>



                                                </div>


                                                {{-- Accessible Roles --}}
                                                <div class="w-100 text-center">Accessible Roles</div>
                                                <div class="flex justify-evenly gap-3 text-center flex-auto flex-wrap">
                                                    <label for="standard" class="flex gap-2 justify-center items-center">
                                                        <input type="checkbox" name="standard" id="standard">
                                                        <span>Standard</span>
                                                    </label>
                                                    <label for="standard" class="flex gap-2 justify-center items-center">
                                                        <input type="checkbox" name="standard" id="standard">
                                                        <span>Standard</span>
                                                    </label>
                                                    <label for="standard" class="flex gap-2 justify-center items-center">
                                                        <input type="checkbox" name="standard" id="standard">
                                                        <span>Standard</span>
                                                    </label>
                                                    <label for="standard" class="flex gap-2 justify-center items-center">
                                                        <input type="checkbox" name="standard" id="standard">
                                                        <span>Standard</span>
                                                    </label>
                                                    <label for="standard" class="flex gap-2 justify-center items-center">
                                                        <input type="checkbox" name="standard" id="standard">
                                                        <span>Standard</span>
                                                    </label>
                                                    <label for="standard" class="flex gap-2 justify-center items-center">
                                                        <input type="checkbox" name="standard" id="standard">
                                                        <span>Standard</span>
                                                    </label>

                                                    <label for="standard" class="flex gap-2 justify-center items-center">
                                                        <input type="checkbox" name="standard" id="standard">
                                                        <span>Standard</span>
                                                    </label>

                                                </div>

                                                {{-- Booking Information --}}
                                                <div class="w-100 text-center">Booking Information</div>

                                                <div class="flex gap-6">
                                                    <div class="col-span-6 sm:col-span-3 w-100 md:w-6/12">
                                                        <label for="amount-cost"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                            Start Date</label>
                                                        <input type="date" name="last-name" id="last-name"
                                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="12/12/2024" required="">
                                                    </div>

                                                    <div class="col-span-6 sm:col-span-3 w-100 md:w-6/12">
                                                        <label for="slots"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                            End Date
                                                        </label>
                                                        <input type="date" name="phone-number" id="phone-number"
                                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="25/12/2024" required="">
                                                    </div>
                                                </div>

                                                <div class="grid grid-cols-6 gap-6">
                                                    <div class="col-span-12">
                                                        <label for="first-name"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                            Description
                                                        </label>
                                                        <input type="text" name="first-name" id="first-name"
                                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="Bonnie event center" required="">
                                                    </div>
                                                </div>

                                                <div class="flex gap-6">
                                                    <div class="col-span-6 sm:col-span-3 w-100 md:w-6/12">
                                                        <label for="amount-cost"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                            Organizer's Name</label>
                                                        <input type="text" name="last-name" id="last-name"
                                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="Mr. Issac James" required="">
                                                    </div>

                                                    <div class="col-span-6 sm:col-span-3 w-100 md:w-6/12">
                                                        <label for="slots"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                            Organizer's Number
                                                        </label>
                                                        <input type="tel" name="phone-number" id="phone-number"
                                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="+23542623568" required="">
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- Modal footer -->
                                            <div
                                                class="flex items-center p-6 space-x-3 rtl:space-x-reverse border-t border-gray-200 rounded-b dark:border-gray-600 bg-white dark:bg-gray-800">
                                                <button type="submit"
                                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    Update
                                                </button>
                                            </div>
                                        </form>
                                    </div>

                                </div>

                                <!-- User table record 2 -->
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
                                            <div class="text-base font-semibold">Sims event and more</div>
                                            <div class="font-normal text-gray-500">Accommodation</div>
                                            <div class="font-normal text-gray-500">+2349070920011</div>

                                        </div>
                                    </th>
                                    <td class="px-6 py-4">
                                        PAY_35345456377
                                    </td>
                                    <td class="px-6 py-4">
                                        {{-- Link to Map --}}
                                        <a href="#">
                                            No. 67 MM way, Beliko
                                        </a>
                                    </td>
                                    <td class="px-6 py-4">
                                        Osun State
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2"></div> Inactive
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">

                                        <button id="dropdownMenuIconButton2" data-dropdown-toggle="dropdownDots2"
                                            class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                            type="button">
                                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor" viewBox="0 0 4 15">
                                                <path
                                                    d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                            </svg>
                                        </button>

                                        <!-- Dropdown menu -->
                                        <div id="dropdownDots2"
                                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                                aria-labelledby="dropdownMenuIconButton2">
                                                <li>
                                                    <a href="#"
                                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">View</a>
                                                </li>
                                                <li
                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                    <!-- Modal toggle -->
                                                    <a href="#" type="button" data-modal-target="editUserModal2"
                                                        data-modal-show="editUserModal2"
                                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Activate</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Edit user modal 2 -->
                                <div id="editUserModal2" tabindex="-1" aria-hidden="true"
                                    class="fixed top-0 left-0 right-0 z-50 items-center justify-center hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative w-full max-w-2xl max-h-full bg-white dark:bg-gray-700">
                                        <!-- Modal content -->
                                        <form class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div
                                                class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                    Edit Event 2
                                                </h3>
                                                <button type="button"
                                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-hide="editUserModal2">
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
                                            <div class="p-6 space-y-6 bg-white dark:bg-gray-800 dark:text-white">

                                                {{-- Basic Information --}}
                                                <div class="w-100 text-center">Basic Information</div>
                                                <div class="grid grid-cols-6 gap-6">


                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="first-name"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Event
                                                            Title</label>
                                                        <input type="text" name="first-name" id="first-name"
                                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="July Starter Event" required="">
                                                    </div>


                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="email"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
                                                        <select type="email" name="email" id="email"
                                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="workshop" required="" value="">
                                                            <option value="1">workshop</option>
                                                            <option value="2">retreat</option>
                                                            <option value="3">seminars</option>
                                                            <option value="4">recollection</option>
                                                            <option value="5">quarterlies</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="amount-cost"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                            Amount Cost</label>
                                                        <input type="number" name="last-name" id="last-name"
                                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="150000" required="">
                                                    </div>

                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="slots"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                            Available Slots
                                                        </label>
                                                        <input type="number" name="phone-number" id="phone-number"
                                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="25" required="">
                                                    </div>



                                                </div>


                                                {{-- Accessible Roles --}}
                                                <div class="w-100 text-center">Accessible Roles</div>
                                                <div class="flex justify-evenly gap-3 text-center flex-auto flex-wrap">
                                                    <label for="standard" class="flex gap-2 justify-center items-center">
                                                        <input type="checkbox" name="standard" id="standard">
                                                        <span>Standard</span>
                                                    </label>
                                                    <label for="standard" class="flex gap-2 justify-center items-center">
                                                        <input type="checkbox" name="standard" id="standard">
                                                        <span>Standard</span>
                                                    </label>
                                                    <label for="standard" class="flex gap-2 justify-center items-center">
                                                        <input type="checkbox" name="standard" id="standard">
                                                        <span>Standard</span>
                                                    </label>
                                                    <label for="standard" class="flex gap-2 justify-center items-center">
                                                        <input type="checkbox" name="standard" id="standard">
                                                        <span>Standard</span>
                                                    </label>
                                                    <label for="standard" class="flex gap-2 justify-center items-center">
                                                        <input type="checkbox" name="standard" id="standard">
                                                        <span>Standard</span>
                                                    </label>
                                                    <label for="standard" class="flex gap-2 justify-center items-center">
                                                        <input type="checkbox" name="standard" id="standard">
                                                        <span>Standard</span>
                                                    </label>

                                                    <label for="standard" class="flex gap-2 justify-center items-center">
                                                        <input type="checkbox" name="standard" id="standard">
                                                        <span>Standard</span>
                                                    </label>

                                                </div>

                                                {{-- Booking Information --}}
                                                <div class="w-100 text-center">Booking Information</div>

                                                <div class="flex gap-6">
                                                    <div class="col-span-6 sm:col-span-3 w-100 md:w-6/12">
                                                        <label for="amount-cost"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                            Start Date</label>
                                                        <input type="date" name="last-name" id="last-name"
                                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="12/12/2024" required="">
                                                    </div>

                                                    <div class="col-span-6 sm:col-span-3 w-100 md:w-6/12">
                                                        <label for="slots"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                            End Date
                                                        </label>
                                                        <input type="date" name="phone-number" id="phone-number"
                                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="25/12/2024" required="">
                                                    </div>
                                                </div>

                                                <div class="grid grid-cols-6 gap-6">
                                                    <div class="col-span-12">
                                                        <label for="first-name"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                            Description
                                                        </label>
                                                        <input type="text" name="first-name" id="first-name"
                                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="Bonnie event center" required="">
                                                    </div>
                                                </div>

                                                <div class="flex gap-6">
                                                    <div class="col-span-6 sm:col-span-3 w-100 md:w-6/12">
                                                        <label for="amount-cost"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                            Organizer's Name</label>
                                                        <input type="text" name="last-name" id="last-name"
                                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="Mr. Issac James" required="">
                                                    </div>

                                                    <div class="col-span-6 sm:col-span-3 w-100 md:w-6/12">
                                                        <label for="slots"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                            Organizer's Number
                                                        </label>
                                                        <input type="tel" name="phone-number" id="phone-number"
                                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="+23542623568" required="">
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- Modal footer -->
                                            <div
                                                class="flex items-center p-6 space-x-3 rtl:space-x-reverse border-t border-gray-200 rounded-b dark:border-gray-600 bg-white dark:bg-gray-800">
                                                <button type="submit"
                                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    Update
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>



                            </tbody>
                        </table>
                    </div>

                    {{-- Paginate --}}
                    <div class="text-center pt-4">
                        <div>Page: <span>5 of</span> 10</div>
                    </div>
                </div>

            </div>
            {{-- End of Table --}}




            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                <!-- Event Card -->
                <a href="">
                    <div class="p-6 bg-white rounded-lg shadow-lg">
                        <img class="object-cover w-full h-40 mb-4 rounded" src="/images/africa.jpg" alt="Product Name">
                        <h3 class="mb-2 text-xl font-semibold">Hododo event center</h3>
                        <h3 class="mb-2 text-xl font-semibold">NGN. 60,000</h3>
                        <div class="font-bold">
                            <p class="text-gray-800">Title: <span class="text-gray-500"> December Retreats</span></p>
                            <p class="text-gray-800">Description:
                                <span class="text-gray-500">
                                    orem ipsum dolor sit amet, consectetur adipiscing elit.
                                </span>
                            </p>
                            <p class="text-gray-800">Start: <span class="text-gray-500">22/12/2023</span></p>
                            <p class="text-gray-800">End: <span class="text-gray-500">12/11/2024</span></p>
                        </div>
                        <div class="py-2">
                            <button class="bg-blue-700 hover:bg-blue-800 text-white font-medium py-2 px-4 rounded-lg">
                                Book Now
                            </button>
                        </div>
                    </div>
                </a>

                <!-- Event Card -->
                <a href="">
                    <div class="p-6 bg-white rounded-lg shadow-lg">
                        <img class="object-cover w-full h-40 mb-4 rounded" src="/images/center_image1.jpeg" alt="Product Name">
                        <h3 class="mb-2 text-xl font-semibold">Hododo event center</h3>
                        <h3 class="mb-2 text-xl font-semibold">NGN. 80,000</h3>
                        <div class="font-bold">
                            <p class="text-gray-800">Title: <span class="text-gray-500"> December Retreats</span></p>
                            <p class="text-gray-800">Description:
                                <span class="text-gray-500">
                                    orem ipsum dolor sit amet, consectetur adipiscing elit.
                                </span>
                            </p>
                            <p class="text-gray-800">Start: <span class="text-gray-500">22/12/2023</span></p>
                            <p class="text-gray-800">End: <span class="text-gray-500">12/11/2024</span></p>
                        </div>
                        <div class="py-2">
                            <button class="bg-yellow-700 hover:bg-yellow-800 text-white font-medium py-2 px-4 rounded-lg">
                                Processing
                            </button>
                        </div>
                    </div>
                </a>

                <!-- Event Card -->
                <a href="">
                    <div class="p-6 bg-white rounded-lg shadow-lg">
                        <img class="object-cover w-full h-40 mb-4 rounded" src="/images/center_image1.jpeg" alt="Product Name">
                        <h3 class="mb-2 text-xl font-semibold">Hododo event center</h3>
                        <h3 class="mb-2 text-xl font-semibold">NGN. 80,000</h3>
                        <div class="font-bold">
                            <p class="text-gray-800">Title: <span class="text-gray-500"> December Retreats</span></p>
                            <p class="text-gray-800">Description:
                                <span class="text-gray-500">
                                    orem ipsum dolor sit amet, consectetur adipiscing elit.
                                </span>
                            </p>
                            <p class="text-gray-800">Start: <span class="text-gray-500">22/12/2023</span></p>
                            <p class="text-gray-800">End: <span class="text-gray-500">12/11/2024</span></p>
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

    </div>
@endsection
