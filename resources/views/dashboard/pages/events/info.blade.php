@extends('dashboard.layouts.master')

@section('content')
    <!-- Container -->
    <div class="p-4 sm:ml-64">

        <div class="rounded-lg dark:border-gray-700 mt-20">

            {{-- Data Information --}}
            <div class="p-6 my-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">

                {{-- Event details --}}
                <div class="max-w-xlg xlg:mx-auto bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg">

                    <div class="overflow-hidden rounded-md mb-4">
                        <!-- Map image placeholder, replace src with actual image link -->
                        {{-- <img src="https://srv.carbonads.net/static/30242/5553640155979510763aebb62751652e628b00e1" alt="Map" class="w-full h-48 object-cover" /> --}}
                        <a href="#">
                            <img src="/images/world-map.png" alt="Map" class="w-full h-48 object-cover" />
                        </a>
                    </div>



                    <div class="space-y-3 py-4 border px-2">
                        <!-- Country -->
                        {{-- <div class="flex justify-between items-center">
                        <span class="font-semibold text-gray-700 dark:text-gray-300">Country</span>
                        <span class="text-blue-600 dark:text-blue-400">Nigeria 🇳🇬</span>
                      </div> --}}

                      {{-- IDS user_id, center_id, event_id, booked_id, year--}}
                      <div class="flex justify-between items-start border-b px-2">
                        <div class="w-1/3 text-gray-700 dark:text-gray-300">Ref No:</div>
                        <div class="w-7/12 text-gray-500 dark:text-gray-400">121320562024</div>
                    </div>

                        {{-- Name --}}
                        <div class="flex justify-between items-start border-b px-2">
                            <div class="w-1/3 text-gray-700 dark:text-gray-300">Name:</div>
                            <div class="w-7/12 text-gray-500 dark:text-gray-400">Lorem ipsum event center</div>
                        </div>

                        <div class="flex justify-between items-start border-b px-2">
                            <div class="w-1/3 text-gray-700 dark:text-gray-300">Type:</div>
                            <div class="w-7/12 text-gray-500 dark:text-gray-400">Event & Center</div>
                        </div>


                        <div class="flex justify-between items-start border-b px-2">
                            <div class="w-1/3 text-gray-700 dark:text-gray-300">Status:</div>
                            <div class="w-7/12 text-gray-500 dark:text-gray-400">Active</div>
                        </div>

                        <div class="flex justify-between items-start border-b px-2">
                            <div class="w-1/3 text-gray-700 dark:text-gray-300">Address:</div>
                            <div class="w-7/12 text-gray-500 dark:text-gray-400">No.345 Lagos (Victoria Island Annex), State
                            </div>
                        </div>

                        <div class="flex justify-between items-start border-b px-2">
                            <div class="w-1/3 text-gray-700 dark:text-gray-300">Start Date:</div>
                            <div class="w-7/12 text-gray-500 dark:text-gray-400">23/05/2024</div>
                        </div>

                        <div class="flex justify-between items-start border-b px-2">
                            <div class="w-1/3 text-gray-700 dark:text-gray-300">End Date:</div>
                            <div class="w-7/12 text-gray-500 dark:text-gray-400">23/02/2025</div>
                        </div>

                        <div class="flex justify-between items-start border-b px-2">
                            <div class="w-1/3 text-gray-700 dark:text-gray-300">Organizer Name:</div>
                            <div class="w-7/12 text-gray-500 dark:text-gray-400">Emmanuel James</div>
                        </div>

                        <div class="flex justify-between items-start border-b px-2">
                            <div class="w-1/3 text-gray-700 dark:text-gray-300">Organizer Contact:</div>
                            <div class="w-7/12 text-gray-500 dark:text-gray-400">+234365467547</div>
                        </div>

                        <div class="flex justify-between items-start border-b px-2">
                            <div class="w-1/3 text-gray-700 dark:text-gray-300">Description:</div>
                            <div class="w-7/12 text-gray-500 dark:text-gray-400">This event is for church women fro LFC
                            </div>
                        </div>


                        <div class="flex justify-between items-start border-b px-2">
                            <div class="w-1/3 text-gray-700 dark:text-gray-300">Slot:</div>
                            <div class="w-7/12 text-gray-500 dark:text-gray-400">34</div>
                        </div>


                        <div class="flex justify-between items-start border-b px-2">
                            <div class="w-1/3 text-gray-700 dark:text-gray-300">Cost:</div>
                            <div class="w-7/12 text-gray-500 dark:text-gray-400">NGN. 38,000</div>
                        </div>


                        <div class="flex justify-between items-start border-b px-2">
                            <div class="w-1/3 text-gray-700 dark:text-gray-300">Booked Events:</div>
                            <div class="w-7/12 text-gray-500 dark:text-gray-400">Not booked</div>
                        </div>


                        <div class="flex justify-between items-start border-b px-2">
                            <div class="w-1/3 text-gray-700 dark:text-gray-300">Payment Status:</div>
                            <div class="w-7/12 text-gray-500 dark:text-gray-400">Not Paid</div>
                        </div>


                        <div class="mt-2">
                            <div class="flex gap-4">
                                <a href="#"
                                    class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                                    Make Payment
                                </a>
                                <a href="#"
                                    class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700">
                                    Request for Installment
                                </a>
                            </div>
                        </div>
                        <div class="mt-2">
                            <a href="#"
                                class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700">
                                Paid
                            </a>
                        </div>
                        <div class="mt-2">
                            <a href="#"
                                class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700">
                                Payment Failed
                            </a>
                        </div>



                    </div>

                    {{-- Print Event Details --}}
                    <div class="flex items-end justify-end mt-4">
                        <a href="#"
                            class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                            <i class="fa fa-print"></i>
                            <span class="pl-3">Print</span>
                        </a>
                    </div>

                </div>

                {{-- Payment table --}}
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-6 my-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">
                    <div
                        class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900 p-3">
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
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownActionButton">
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">All</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Failed</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Success</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
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
                                class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Search for users">
                        </div>
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
                                    Booked Center
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Transaction ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Type
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Reference
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Amount
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Paid
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Balance
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
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="w-4 p-4">
                                    <div class="flex items-center">
                                        <input id="checkbox-table-search-2" type="checkbox"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-table-search-2" class="sr-only">checkbox</label>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    Iwolo event and more
                                </td>
                                <td class="px-6 py-4">
                                    4213647645
                                </td>
                                <td class="px-6 py-4">
                                    Installment
                                </td>
                                <td class="px-6 py-4">
                                    wedkgjb4kiu
                                </td>
                                <td class="px-6 py-4">
                                    NGN. 70,000
                                </td>
                                <td class="px-6 py-4">
                                    NGN. 40,000
                                </td>
                                <td class="px-6 py-4">
                                    NGN. 30,000
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2"></div> Incomplete
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                        Verify</a>
                                </td>
                            </tr>

                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="w-4 p-4">
                                    <div class="flex items-center">
                                        <input id="checkbox-table-search-2" type="checkbox"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-table-search-2" class="sr-only">checkbox</label>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    Amani event and more
                                </td>
                                <td class="px-6 py-4">
                                    4213647645
                                </td>
                                <td class="px-6 py-4">
                                    Full
                                </td>
                                <td class="px-6 py-4">
                                    wedkgjb4kiu
                                </td>
                                <td class="px-6 py-4">
                                    NGN. 70,000
                                </td>
                                <td class="px-6 py-4">
                                    NGN. 0
                                </td>
                                <td class="px-6 py-4">
                                    NGN. 0
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Completed
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="#"
                                        class="font-medium text-green-600 dark:text-green-500 hover:underline">
                                        Verified</a>
                                </td>
                            </tr>

                        </tbody>
                    </table>

                </div>
            </div>
            {{-- End of Data Information --}}



        </div>

    </div>
@endsection
