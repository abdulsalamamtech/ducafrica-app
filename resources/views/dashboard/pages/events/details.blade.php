@extends('dashboard.layouts.master')

@section('content')
    <!-- Container -->
    <div class="p-4 sm:ml-64">

        <div class="rounded-lg dark:border-gray-700 mt-20">

            {{-- Data Information --}}
            <div id="showEvent" class="p-6 my-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">

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
                        <div class="w-7/12 text-gray-500 dark:text-gray-400">{{ $event->id . now()->format('dmY') }}</div>
                    </div>

                        {{-- Name --}}
                        <div class="flex justify-between items-start border-b px-2">
                            <div class="w-1/3 text-gray-700 dark:text-gray-300">Name:</div>
                            <div class="w-7/12 text-gray-500 dark:text-gray-400">{{ $event->name }}</div>
                        </div>

                        <div class="flex justify-between items-start border-b px-2">
                            <div class="w-1/3 text-gray-700 dark:text-gray-300">Type:</div>
                            <div class="w-7/12 text-gray-500 dark:text-gray-400">{{ $event->eventType?->name }}</div>
                        </div>


                        <div class="flex justify-between items-start border-b px-2">
                            <div class="w-1/3 text-gray-700 dark:text-gray-300">Status:</div>
                            <div class="w-7/12 text-gray-500 dark:text-gray-400">Active</div>
                        </div>

                        <div class="flex justify-between items-start border-b px-2">
                            <div class="w-1/3 text-gray-700 dark:text-gray-300">Address:</div>
                            <div class="w-7/12 text-gray-500 dark:text-gray-400">{{ $event->center?->address }}, {{ $event->center->state }}
                            </div>
                        </div>

                        <div class="flex justify-between items-start border-b px-2">
                            <div class="w-1/3 text-gray-700 dark:text-gray-300">Start Date:</div>
                            <div class="w-7/12 text-gray-500 dark:text-gray-400">
                                {{ $event->start_date->format('l, jS F Y') }} ({{ $event->start_date->diffForHumans() }})
                            </div>
                        </div>

                        <div class="flex justify-between items-start border-b px-2">
                            <div class="w-1/3 text-gray-700 dark:text-gray-300">End Date:</div>
                            <div class="w-7/12 text-gray-500 dark:text-gray-400">
                                {{ $event->end_date->format('l, jS F Y') }} ({{ $event->end_date->diffForHumans() }})
                            </div>
                        </div>

                        <div class="flex justify-between items-start border-b px-2">
                            <div class="w-1/3 text-gray-700 dark:text-gray-300">Organizer Name:</div>
                            <div class="w-7/12 text-gray-500 dark:text-gray-400">{{ $event->contact_name }}</div>
                        </div>

                        <div class="flex justify-between items-start border-b px-2">
                            <div class="w-1/3 text-gray-700 dark:text-gray-300">Organizer Contact:</div>
                            <div class="w-7/12 text-gray-500 dark:text-gray-400">{{ $event->contact_phone_number }}</div>
                        </div>

                        <div class="flex justify-between items-start border-b px-2">
                            <div class="w-1/3 text-gray-700 dark:text-gray-300">Description:</div>
                            <div class="w-7/12 text-gray-500 dark:text-gray-400">{{ $event->description }}</div>
                        </div>


                        <div class="flex justify-between items-start border-b px-2">
                            <div class="w-1/3 text-gray-700 dark:text-gray-300">Slot:</div>
                            <div class="w-7/12 text-gray-500 dark:text-gray-400">{{ $event->slots }}</div>
                        </div>
                        <div class="flex justify-between items-start border-b px-2">
                            <div class="w-1/3 text-gray-700 dark:text-gray-300">Available:</div>
                            <div class="w-7/12 text-gray-500 dark:text-gray-400">{{ $event?->availableSlotsLimit() ?? 0 }}</div>
                        </div>
                        {{-- <div class="flex justify-between items-start border-b px-2">
                            <div class="w-1/3 text-gray-700 dark:text-gray-300">Booked events with payment:</div>
                            <div class="w-7/12 text-gray-500 dark:text-gray-400">{{ $event?->allBookedEventWithPayment() ?? 0 }}</div>
                        </div> --}}
                        
                        <div class="flex justify-between items-start border-b px-2">
                            <div class="w-1/3 text-gray-700 dark:text-gray-300">Confirmed Booking:</div>
                            <div class="w-7/12 text-gray-500 dark:text-gray-400">{{ $event?->confirmedBookings()?->count() ?? 0 }}</div>
                        </div>
                        <div class="flex justify-between items-start border-b px-2">
                            <div class="w-1/3 text-gray-700 dark:text-gray-300">Interested Slots:</div>
                            <div class="w-7/12 text-gray-500 dark:text-gray-400">{{$event?->allBookedEvents()?->count() ?? 0 }}</div>
                        </div>                        


                        <div class="flex justify-between items-start border-b px-2">
                            <div class="w-1/3 text-gray-700 dark:text-gray-300">Cost:</div>
                            <div class="w-7/12 text-gray-500 dark:text-gray-400">NGN. {{ $event->cost }}</div>
                        </div>

                        <div class="flex justify-between items-start border-b px-2">
                            <div class="w-1/3 text-gray-700 dark:text-gray-300">Event Status:</div>
                            @if ($event->status)
                                <div class="w-7/12 text-gray-500 dark:text-green-400">Open</div>
                            @else
                                <div class="w-7/12 text-gray-500 dark:text-gray-400">Close</div>
                            @endif
                        </div>

                        {{-- {{ $event->isBooked() }} --}}
                        {{-- {{ $event->getBookedEvent()?->payment_type }} --}}
                        {{-- {{ json_encode($event->allBookedEventsPaid()) }} --}}

                        {{-- {{ $event->getTransactions() }} --}}

                        {{-- {{ $event->getPaymentStatus() }} --}}

                        {{-- {{ $event->getPaymentDetails() }} --}}
                        {{-- {{ $event->getPaymentDetails()['balance'] }} --}}


                    </div>


                    {{-- Print or Download Event Details --}}
                    <div class="flex items-end justify-end mt-4 gap-4">

                        {{-- Laravel PDF library --}}
                        <a href="{{ route('pdfs.events.print', $event->id) }}"
                            class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                            <i class="fa fa-print"></i>
                            <span class="pl-3">Print</span>
                        </a>


                        {{-- Javascript print PDF --}}
                        <div>
                            {{-- Button --}}
                            <button id="download" 
                                class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                                <i class="fa fa-download"></i>
                                <span class="pl-3">Download PDF</span>
                            </button>

                            {{-- HTML --}}
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
                            {{-- Javascript --}}
                            <script>
                                // The content you want to convert to PDF
                                const element = document.getElementById('showEvent'); 
                                const options = {
                                    // margin: 1,
                                    margin: 0,
                                    filename: 'ducafrica-event-document.pdf',
                                    image: { type: 'jpeg', quality: 0.98 },
                                    html2canvas: { scale: 2 },
                                    jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
                                };
                                document.getElementById('download').onclick = function() {
                                    html2pdf().from(element).set(options).save();
                                }
    
    
                            </script>
                        </div>
                    </div>


                </div>
                {{-- End of Event details --}}


                {{-- Booked Event Users --}}
                <div class="overflow-x-scroll py-2">
                    <div class="p-2">
                        <h2 class="px-4 py-5 text-center text-xl md:text-2xl font-semibold text-gray-700 dark:text-gray-300">Booked Users</h2>
                    </div>

                    {{-- Download and Print --}}
                    <div>
                        <div class="text-right m-3">
                            <a href="{{ route('fast-excel.booked_event_users', $event) }}" class="">
                                <button type="button"
                                    class="inline-flex items-center px-2.5 py-1.5 text-sm font-medium text-gray-100 bg-green-500 border border-gray-300 focus:outline-none hover:bg-green-400 focus:ring-4 focus:ring-gray-100 rounded-lg dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                    <i class="fa fa-file-excel-o"></i>
                                    <span class="pl-2">Export All Booked Users</span>
                                </button>
                            </a>
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

                            @forelse ($event->allBookedEvents() as $booked_event)
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
                                    <th >
                                        <div class="ps-3">
                                            <div class="ps-3">
                                                <div class="text-base font-semibold">Food allergies</div>
                                                <div class="font-normal text-gray-600">{{ $booked_event?->user?->food_allergies ?? 'none' }}</div>
                                                <div class="text-base font-semibold">Food diets</div>
                                                <div class="font-normal text-gray-600">{{ $booked_event?->user?->diets ?? 'none' }}</div>
                                                <div class="text-base font-semibold">Disability</div>
                                                <div class="font-normal text-gray-600">{{ $booked_event?->user?->other_disability ?? 'none' }}</div>                                                                                                        
                                                <div class="text-base font-semibold">NOK</div>
                                                <div class="font-normal text-gray-600">
                                                    {{ $booked_event?->user?->nok . ', ' ?? 'none' }}
                                                    {{ $booked_event?->user?->nok_relationship . ', ' ?? 'none' }}
                                                    {{ $booked_event?->user?->nok_phone . ', ' ?? 'none' }}
                                                </div>                                                     
                                            </div>
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

                                        <button id="dropdownMenuIconButton{{ $booked_event->id }}" data-dropdown-toggle="dropdownDots{{ $booked_event->id }}"
                                            class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                            type="button">
                                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor" viewBox="0 0 4 15">
                                                <path
                                                    d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                            </svg>
                                        </button>


                                        <!-- Dropdown menu -->
                                        <div id="dropdownDots{{ $booked_event->id }}"
                                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                                aria-labelledby="dropdownMenuIconButton{{ $booked_event->id }}">
                                                
                                                <li>
                                                    <a href="{{ route('users.activities', $booked_event->user->id) }}"
                                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">View user activities</a>
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
                </div>
                

                {{-- Payment Transactions table --}}
                <div class="mt-4 relative overflow-x-auto shadow-md sm:rounded-lg p-6 my-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">

                    {{-- Transactions --}}
                    <div class="p-2">
                        <h2 class="px-4 py-5 text-center text-xl md:text-2xl font-semibold text-gray-700 dark:text-gray-300">Transactions</h2>
                    </div>

                    {{-- Download and Print --}}
                    <div>
                        <div class="text-right m-3">
                            <a href="{{ route('fast-excel.bookedEventTransactions', $event->id) }}" class="">
                                <button type="button"
                                    class="inline-flex items-center px-2.5 py-1.5 text-sm font-medium text-gray-100 bg-green-500 border border-gray-300 focus:outline-none hover:bg-green-400 focus:ring-4 focus:ring-gray-100 rounded-lg dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                    <i class="fa fa-file-excel-o"></i>
                                    <span class="pl-2">Export All Transaction</span>
                                </button>
                            </a>
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
                            @forelse ($event?->transactions as  $transaction)
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
                                                {{ $transaction->bookedEvent->event->name }}
                                            </div>
                                            <div class="font-normal text-gray-400">
                                                {{ Str::limit($transaction->bookedEvent->event->description, 50); }}
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
                                        NGN. {{ $event?->getPaymentDetails()['balance'] ?? 0 }}
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
                </div>

            </div>
            {{-- End of Data Information --}}



        </div>

    </div>
@endsection
