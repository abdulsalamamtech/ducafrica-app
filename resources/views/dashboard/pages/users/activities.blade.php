@extends('dashboard.layouts.master')

@section('content')
    <!-- Container -->
    <div class="p-4 sm:ml-64">

        <div class="rounded-lg dark:border-gray-700 mt-20">


            {{-- group Information --}}
            <div class="p-6 my-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">
                <div class="space-y-3 py-4 px-2">

                    {{-- Name --}}

                    <div class="font-semibold flex justify-between items-start border-b px-2">
                        <div class="w-1/3 text-gray-700 dark:text-gray-300">Name:</div>
                        <div class="w-7/12 text-gray-500 dark:text-gray-400">{{ $user->name . " (". $user?->last_name . " " . $user?->first_name .")" }}</div>
                    </div>

                    <div class="font-semibold flex justify-between items-start border-b px-2">
                        <div class="w-1/3 text-gray-700 dark:text-gray-300">Email:</div>
                        <div class="w-7/12 text-gray-500 dark:text-gray-400">{{ $user->email }}</div>
                    </div>

                    <div class="font-semibold flex justify-between items-start border-b px-2">
                        <div class="w-1/3 text-gray-700 dark:text-gray-300">Phone number:</div>
                        <div class="w-7/12 text-gray-500 dark:text-gray-400">{{ $user->phone }}</div>
                    </div>
                    <div class="font-semibold flex justify-between items-start border-b px-2">
                        <div class="w-1/3 text-gray-700 dark:text-gray-300">Total Booked Event:</div>
                        <div class="w-7/12 text-gray-500 dark:text-gray-400">{{ $user?->bookedEvents?->count() }}</div>
                    </div>
                    <div class="font-semibold flex justify-between items-start border-b px-2">
                        <div class="w-1/3 text-gray-700 dark:text-gray-300">Total Transactions:</div>
                        <div class="w-7/12 text-gray-500 dark:text-gray-400">{{ $user?->transactions?->count() }}</div>
                    </div>
                    <div class="font-semibold flex justify-between items-start border-b px-2">
                        <div class="w-1/3 text-gray-700 dark:text-gray-300">Total Amount:</div>
                        <div class="w-7/12 text-gray-500 dark:text-gray-400">₦ {{ $user?->transactions?->where('payment_status', 'success')?->sum('amount') ?? 0 }}</div>
                    </div>
                    <div class="font-semibold flex justify-between items-start border-b px-2">
                        <div class="w-1/3 text-gray-700 dark:text-gray-300">Created on</div>
                        <div class="w-7/12 text-gray-500 dark:text-gray-400">{{ $user->created_at }}</div>
                    </div>

                    <div class="font-semibold flex justify-between items-start border-b px-2">
                        <div class="w-1/3 text-gray-700 dark:text-gray-300">Status:</div>
                        <div class="w-7/12 text-gray-500 dark:text-gray-400">Active</div>
                    </div>


                </div>
            </div>    
            
            
            <div class="p-6 my-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">
                {{-- Page Title --}}
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl md:text-2xl font-semibold text-gray-700 dark:text-gray-300 px-6">User Activities</h2>
                </div>

                {{-- Customization Tabs --}}
                <div
                    class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
                    <ul class="flex flex-wrap -mb-px">
                        <li class="me-2">
                            {{-- Active Booked Events Tab --}}
                            @if (request()->routeIs('users.activities', $user->id))
                                <a href="{{ route('users.activities', $user->id) }}"
                                    class="inline-block py-4 px-8 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500"
                                    aria-current="page">Booked Events</a>
                            @else
                                <a href="{{ route('users.activities', $user->id) }}"
                                    class="inline-block py-4 px-8 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Booked Events</a>
                            @endif
                        </li>
                        <li class="me-2">
                            {{-- Active Transactions Tab --}}
                            @if (request()->routeIs('users.activities.transactions', $user->id))
                                <a href="{{ route('users.activities.transactions', $user->id) }}"
                                    class="inline-block py-4 px-8 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500"
                                    aria-current="page">Transactions</a>
                            @else
                                <a href="{{ route('users.activities.transactions', $user->id) }}"
                                    class="inline-block py-4 px-8 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Transactions</a>
                            @endif
                        </li>
                        <li class="me-2">
                            @if (request()->routeIs('users.activities.groups', $user->id))
                                <a href="{{ route('users.activities.groups', $user->id) }}"
                                    class="inline-block py-4 px-8 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500"
                                    aria-current="page">Groups</a>
                            @else
                                <a href="{{ route('users.activities.groups', $user->id) }}"
                                    class="inline-block py-4 px-8 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">
                                    Groups
                                </a>
                            @endif
                        </li>
                    </ul>
                </div>


                @if (request()->routeIs('users.activities.transactions', $user->id))
                    {{-- Payment Transactions table --}}
                    <div class="mt-4 relative overflow-x-auto shadow-md sm:rounded-lg p-6 my-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">

                        {{-- Transactions --}}
                        <div class="p-2">
                            <h2 class="px-4 py-5 text-center text-xl md:text-2xl font-semibold text-gray-700 dark:text-gray-300">User's Transactions</h2>
                        </div>

                        {{-- Download and Print --}}
                        <div>
                            {{-- <div class="text-right m-3">
                                <a href="{{ route('fast-excel.bookedEventTransactions', $booked_event->event->id) }}" class="">
                                    <button type="button"
                                        class="inline-flex items-center px-2.5 py-1.5 text-sm font-medium text-gray-100 bg-green-500 border border-gray-300 focus:outline-none hover:bg-green-400 focus:ring-4 focus:ring-gray-100 rounded-lg dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                        <i class="fa fa-file-excel-o"></i>
                                        <span class="pl-2">Export All Transaction</span>
                                    </button>
                                </a>
                            </div> --}}
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
                                        Event
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        User
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Payment To
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
                                {{-- Working on this --}}
                                @forelse ($transactions as  $transaction)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="w-4 p-4">
                                            <div class="flex items-center">
                                                <input id="checkbox-table-search-2" type="checkbox"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="checkbox-table-search-2" class="sr-only">checkbox</label>
                                            </div>
                                        </td>
                                        <td >
                                            <div class="ps-3 p-2">
                                                <div class="font-normal text-gray-500">
                                                    {{ $transaction?->bookedEvent?->event?->name }}
                                                </div>
                                                <div class="font-normal text-gray-400">
                                                    {{ Str::limit($transaction?->bookedEvent?->event?->description, 50); }}
                                                </div>
                                            </div>
                                        </td>
                                        <td >
                                            <div class="ps-3">
                                                <div class="font-normal text-gray-500">
                                                    {{ $transaction?->user?->name }}
                                                    {{ Str::limit($transaction?->user?->first_name . ' '. $transaction?->user?->last_name, 40); }}
                                                </div>
                                                <div class="font-normal text-gray-500">
                                                    {{ Str::limit($transaction?->user?->email, 40); }}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="font-normal text-gray-500">
                                                {{ Str::limit($transaction->bookedEvent->event->center?->name, 40); }}
                                            </div>
                                            <div class="font-normal text-gray-500">
                                                {{ $transaction->bookedEvent->event->center?->payment_id }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $transaction->bookedEvent?->payment_type }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $transaction->reference }}
                                        </td>
                                        <td class="px-6 py-4">
                                            NGN.
                                            {{ $transaction->bookedEvent?->payment_amount }}
                                        </td>
                                        <td class="px-6 py-4">
                                            NGN.
                                            {{ $transaction->amount }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{-- NGN. {{  $transaction->booked_event->event?->getPaymentDetails()['balance'] ?? 0 }} --}}
                                            NGN.
                                            {{ $transaction->bookedEvent?->payment_amount - $transaction->amount }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                @if ($transaction->payment_status == 'success')
                                                    <div class="h-2.5 w-2.5 rounded-full bg-green-500 ml-2 pl-2"></div> Paid
                                                @else
                                                    <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2 pl-2"></div> Incomplete
                                                @endif
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="{{ route('events.show', $transaction->bookedEvent->event?->id) }}/?trxref={{ $transaction->reference }}&reference={{ $transaction->reference }}"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                                Verify</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td class="text-center" colspan="10">Transactions unavailable</td>
                                    </tr>
                                @endforelse


                            </tbody>
                        </table>

                        {{-- Paginate --}}
                        <div class="text-center pt-4 bg-white dark:text-gray-100 dark:bg-gray-800">
                            <div class="px-8">
                                @if (isset($transactions) && !empty($transactions) && $transactions->links())
                                    {{ $transactions?->withQueryString()?->links() }}
                                @endif
                            </div>
                        </div>                    
                    </div>
                    {{-- End of Table --}}
                @elseIf (request()->routeIs('users.activities.groups', $user->id))
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white rounded-lg shadow-lg dark:bg-gray-800">
                        <div class="p-2">
                            <h2 class="p-4 text-center text-xl md:text-2xl font-semibold text-gray-700 dark:text-gray-300">User's Groups</h2>
                        </div>                        
                        {{-- Table content --}}
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
                                        Group Head
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Number of Members
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

                                {{-- Database Groups --}}
                                @forelse ($groups as $group)
                                    <!-- Group table record 2 -->
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
                                            {{-- <img class="w-10 h-10 rounded-full" src="/images/default-profile.png"
                                                alt="Jese image"> --}}
                                            <div class="ps-3">
                                                <div class="text-base font-semibold">{{ $group->name }}</div>
                                                <div class="font-normal text-gray-500">{{ $group->description }}</div>

                                            </div>
                                        </th>
                                        <th scope="row">
                                            <div class="ps-3">
                                                {{-- {{ $group}} --}}
                                                <div class="text-base font-semibold">{{$group?->groupHead?->name}}</div>
                                                <div class="font-normal text-gray-500">{{$group?->groupHead?->email}}</div>
                                                <div class="font-normal text-gray-500">{{$group?->groupHead?->phone}}</div>
                                            </div>
                                        </th>                                    
                                        <td class="px-6 py-4">
                                            {{ $group->users->count()}}
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                <div class="h-2.5 w-2.5 rounded-full bg-{{ $group->added_by?'green':'red' }}-500 me-2"></div> {{ $group->added_by?"Active":"Inactive" }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">

                                            <button id="dropdownMenuIconButton{{ $group->id }}" data-dropdown-toggle="dropdownDots{{ $group->id }}"
                                                class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                                                <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                                                </svg>
                                                </button>

                                                <!-- Dropdown menu -->
                                                <div id="dropdownDots{{ $group->id }}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconButton{{ $group->id }}">
                                                        <li>
                                                            <a href="{{ route('groups.members', $group->id) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">View Members</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td colspan="10" class="text-center p-8">Group unavailable</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>

                        {{-- Paginate --}}
                        <div class="text-center pt-4 bg-white dark:text-gray-100 dark:bg-gray-800">
                            <div class="px-8">
                                @if (isset($groups) && !empty($groups) && $groups->links())
                                    {{ $groups->links() }}
                                @endif
                            </div>
                        </div>                        
                    </div>
                @else
                    
                    {{-- Booked events --}}
                    <div class="mb-2 bg-white rounded-lg shadow-lg dark:bg-gray-800">
                        {{-- Booked Event Users --}}
                        <div class="overflow-x-scroll py-2 shadow-md sm:rounded-lg p-6 my-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">
                            <div class="p-2">
                                <h2 class="px-4 py-5 text-center text-xl md:text-2xl font-semibold text-gray-700 dark:text-gray-300">User's Booked Events</h2>
                            </div>

                            {{-- Download and Print --}}
                            <div>
                                {{-- <div class="text-right m-3">
                                    <a href="{{ route('fast-excel.booked_event_users', $booked_event->event->id) }}" class="">
                                        <button type="button"
                                            class="inline-flex items-center px-2.5 py-1.5 text-sm font-medium text-gray-100 bg-green-500 border border-gray-300 focus:outline-none hover:bg-green-400 focus:ring-4 focus:ring-gray-100 rounded-lg dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                            <i class="fa fa-file-excel-o"></i>
                                            <span class="pl-2">Export All Booked Users</span>
                                        </button>
                                    </a>
                                </div> --}}
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
                                            Details
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
                                    @forelse ($bookedEvents as $booked_event)
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
                                                        <div class="text-base font-semibold">{{ $booked_event?->user?->last_name . ' ' . $booked_event?->user?->first_name }}</div>
                                                        <div class="font-normal text-gray-600">{{ $booked_event?->user?->email }}</div>
                                                        <div class="font-normal text-gray-600">{{ $booked_event?->user?->phone }}</div>
                                                        <div class="font-normal text-gray-600">{{ $booked_event?->user?->address . ', ' .$booked_event?->user?->state }}</div>
                                                    </div>
                                                </div>
                                            </th>
                                            

                                            <th scope="row p-3"
                                                class="flex items-center p-3 text-gray-900 whitespace-nowrap dark:text-white">
                                                <img class="w-10 h-10 rounded-full" src="{{ $booked_event?->event?->center?->centerAsset?->url ??'/images/africa.jpg' }}"
                                                    alt="Jese image">
                                                <div class="p-3">
                                                    <div class="text-base font-semibold">{{ $booked_event?->event?->name }}</div>
                                                    <div class="font-normal text-gray-500">{{ $booked_event?->event?->eventType?->name }}</div>
                                                    <div class="fontUsers-normal text-gray-500 px-2">{{ $booked_event?->event?->description }}</div>
                                                    <div class="font-normal text-gray-400"><span class="font-bold text-gray-400">START:</span>
                                                        {{ $booked_event->event?->start_date->format('l jS, F Y') }} ({{ $booked_event?->event?->start_date->diffForHumans() }})
                                                    </div>
                                                    <div class="font-normal text-gray-400"><span class="font-bold text-gray-400">ENDS:</span>
                                                        {{ $booked_event->event?->end_date->format('l jS, F Y') }} ({{ $booked_event?->event?->end_date->diffForHumans() }})
                                                    </div>
                                                    <div class="font-normal text-gray-400">{{ $booked_event?->event?->contact_name }}</div>
                                                    <div class="font-normal text-gray-400">{{ $booked_event?->event?->contact_phone_number }}</div>
                                                </div>
                                            </th>                                    
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
                                                            <a href="#"
                                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Print</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <td colspan="10" class="text-center p-8">Booked Users Unavailable</td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>

                            {{-- Paginate --}}
                            <div class="text-center pt-4 bg-white dark:text-gray-100 dark:bg-gray-800">
                                <div class="px-8">
                                    @if (isset($bookedEvents) && !empty($bookedEvents) && $bookedEvents->links())
                                        {{ $bookedEvents?->withQueryString()?->links() }}
                                    @endif
                                </div>
                            </div>                      
                        </div>
                    </div>   
                @endif


            </div>




        </div>

    </div>
@endsection
