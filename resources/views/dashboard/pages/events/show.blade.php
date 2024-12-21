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
                            <div class="w-7/12 text-gray-500 dark:text-gray-400">{{ $event->eventType->name }}</div>
                        </div>


                        <div class="flex justify-between items-start border-b px-2">
                            <div class="w-1/3 text-gray-700 dark:text-gray-300">Status:</div>
                            <div class="w-7/12 text-gray-500 dark:text-gray-400">Active</div>
                        </div>

                        <div class="flex justify-between items-start border-b px-2">
                            <div class="w-1/3 text-gray-700 dark:text-gray-300">Address:</div>
                            <div class="w-7/12 text-gray-500 dark:text-gray-400">{{ $event->center->address }}, {{ $event->center->state }}
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
                            <div class="w-1/3 text-gray-700 dark:text-gray-300">Cost:</div>
                            <div class="w-7/12 text-gray-500 dark:text-gray-400">NGN. {{ $event->cost }}</div>
                        </div>


                        <div class="flex justify-between items-start border-b px-2">
                            <div class="w-1/3 text-gray-700 dark:text-gray-300">Booked Events:</div>
                                @if ($event->isBooked() )
                                    <div class="w-7/12 text-gray-500 dark:text-green-400">Booked</div>
                                @else
                                    <div class="w-7/12 text-gray-500 dark:text-gray-400">Not Booked</div>
                                @endif
                        </div>

                        <div class="flex justify-between items-start border-b px-2">
                            <div class="w-1/3 text-gray-700 dark:text-gray-300">Payment Type:</div>
                            @if ($event->isBooked() )
                                <div class="w-7/12 text-gray-500 dark:text-green-400">{{ $event->getBookedEvent()?->payment_type }}</div>
                            @else
                                <div class="w-7/12 text-gray-500 dark:text-gray-400">Full Payment</div>
                            @endif
                        </div>

                        <div class="flex justify-between items-start border-b px-2">
                            <div class="w-1/3 text-gray-700 dark:text-gray-300">Payment Status:</div>
                            @if ($event->isPaid() )
                                <div class="w-7/12 text-gray-500 dark:text-green-400">Paid</div>
                            @else
                                <div class="w-7/12 text-gray-500 dark:text-gray-400">Not Paid</div>
                            @endif
                        </div>

                        {{-- {{ $event->isBooked() }} --}}
                        {{-- {{ $event->getBookedEvent()?->payment_type }} --}}
                        {{-- {{ json_encode($event->allBookedEventsPaid()) }} --}}

                        {{-- {{ $event->getTransactions() }} --}}

                        {{-- {{ $event->getPaymentStatus() }} --}}

                        {{-- {{ $event->getPaymentDetails() }} --}}
                        {{-- {{ $event->getPaymentDetails()['balance'] }} --}}




                        {{-- If payment has not been made --}}
                        @if (!$event->isPaid())
                            {{-- If installment payment has been requested and payment is incomplete--}}
                            @if ($event->getBookedEvent()?->payment_type == 'installment' && !$event->getPaymentDetails()['payment_status'])
                                {{-- If istallment payment request hasn't been approved --}}
                                @if (!$event->getBookedEvent()?->installment()?->approved)                                    
                                    <div class="mt-2">
                                        <a href="#"
                                            class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-pink-600 hover:bg-pink-700">
                                            Installment payment not approved: request pending...
                                        </a>
                                    </div>
                                {{-- If the payment request is approved but payment isn't completed --}}
                                @else
                                    <div class="mt-2">
                                        <a href="#"
                                            class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-yellow-600 hover:bg-yellow-700">
                                            Incomplete Payment
                                        </a>
                                    </div>
                                @endif
                            @else
                                {{-- If installment payment has not been requested --}}
                                <div class="mt-2">
                                    <div class="flex gap-4">
                                        <div>
                                            <a href="{{ route('events.full-payment', $event->id) }}"
                                                class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                                                Make Payment
                                            </a>
                                        </div>
                                        <div>
                                            <form action="{{ route('user-installments.store') }}" method="POST">
                                                @method('POST')
                                                @csrf

                                                <input type="hidden" name="event_id" value="{{ $event->id }}">
                                                <button
                                                    class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700"
                                                    type="submit">Request for Installment</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @else
                        {{-- If payment is completed --}}
                            <div class="mt-2">
                                <a href="#"
                                    class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700">
                                    Paid
                                </a>
                            </div>
                        @endif

                        {{-- <div class="mt-2">
                            <a href="#"
                                class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700">
                                Payment Failed
                            </a>
                        </div> --}}

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

                
                {{-- Installment Payment --}}
                @if ( $event->getBookedEvent()?->payment_type == 'installment' && $event->getBookedEvent()?->installment()?->approved)
                    <div class="my-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">
                        <h2 class="px-4 py-5 text-center text-xl md:text-2xl font-semibold text-gray-700 dark:text-gray-300">Installment</h2>
                        <div class="flex flex-col md:flex-row justify-around items-start m-auto p-4 gap-8">
                            <div class="w-full md:w-1/2">
                                <div class="flex justify-between items-start border-b px-2">
                                    <div class="w-1/3 text-gray-700 dark:text-gray-300">Total Cost:</div>
                                    <div class="w-7/12 text-gray-500 dark:text-gray-400">{{ $event->getPaymentDetails()['payment_amount'] }}</div>
                                </div>

                                <div class="flex justify-between items-start border-b px-2">
                                    <div class="w-1/3 text-gray-700 dark:text-gray-300">Amount Paid:</div>
                                    <div class="w-7/12 text-gray-500 dark:text-gray-400">{{ $event->getPaymentDetails()['amount_paid'] }}</div>
                                </div>

                                <div class="flex justify-between items-start border-b px-2">
                                    <div class="w-1/3 text-gray-700 dark:text-gray-300">Balance:</div>
                                    <div class="w-7/12 text-gray-500 dark:text-gray-400">{{ $event->getPaymentDetails()['balance'] }}</div>
                                </div>

                                <div class="flex justify-between items-start border-b px-2">
                                    <div class="w-1/3 text-gray-700 dark:text-gray-300">Refund:</div>
                                    <div class="w-7/12 text-gray-500 dark:text-gray-400">{{ $event->getPaymentDetails()['refund'] }}</div>
                                </div>
                                <div class="flex justify-between items-start border-b px-2">
                                    <div class="w-1/3 text-gray-700 dark:text-gray-300">Status:</div>
                                    <div class="w-7/12 text-gray-500 dark:text-gray-400">{{ $event->getPaymentDetails()['payment_status'] ? 'completed': 'incomplete' }}</div>
                                </div>
                            </div>
                            <div class="w-full md:w-1/2">
                                <form action="{{ route('events.installment-payment', $event->id) }}" method="POST">
                                    @method('POST')
                                    @csrf

                                    <div class="col-span-6 sm:col-span-3 p-2">
                                        <label for="amount_to_pay"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Amount to pay
                                        </label>
                                        <input type="number" name="amount_to_pay" id="amount_to_pay" min="0" max="{{ $event->getPaymentDetails()['balance']}}"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="35000" value="{{ $event->getPaymentDetails()['balance'] ?? 0 }}" required="" 
                                            {{ $event->getPaymentDetails()['payment_status'] ? 'disabled': '' }}>
                                    </div>
                                    <div
                                        class="flex items-center py-4 space-x-3 rtl:space-x-reverse border-t border-gray-200 rounded-b dark:border-gray-600">
                                        @if ($event->getPaymentDetails()['payment_status'])
                                            <div class="text-sm px-2 text-green-500">You have successfully secure your slot for this event.</div>
                                        @else
                                            <button type="submit"
                                                class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                                Make Payment
                                            </button>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                @endif


                {{-- Payment Transactions table --}}
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-6 my-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">

                    {{-- Transactions --}}
                    <div class="p-2">
                        <h2 class="px-4 py-5 text-center text-xl md:text-2xl font-semibold text-gray-700 dark:text-gray-300">Transactions</h2>
                    </div>
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
                            @forelse ($event->getTransactions()  as  $transaction)
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
                                        <div class="ps-3">
                                            <div class="font-normal text-gray-500">
                                                {{ $transaction->bookedEvent->event->name }}
                                            </div>
                                            <div class="font-normal text-gray-500">
                                                {{ Str::limit($transaction->bookedEvent->event->description, 10); }}
                                            </div>
                                        </div>
                                    </td>
                                    <td >
                                        <div class="ps-3">
                                            <div class="font-normal text-gray-500">
                                                {{ $transaction->user->name }}
                                                {{ Str::limit($transaction->user->first_name . ' '. $transaction->user->last_name, 40); }}
                                            </div>
                                            <div class="font-normal text-gray-500">
                                                {{ Str::limit($transaction->user->email, 40); }}
                                            </div>
                                        </div>
                                    </td>
                                    {{-- <td class="px-6 py-4">
                                        {{ $transaction->bookedEvent->event->name }}
                                    </td> --}}
                                    <td class="px-6 py-4">
                                        <div class="font-normal text-gray-500">
                                            {{ Str::limit($transaction->bookedEvent->event->center->name, 40); }}
                                        </div>
                                        <div class="font-normal text-gray-500">
                                            {{ $transaction->bookedEvent->event->center->payment_id }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $transaction->bookedEvent->payment_type }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $transaction->reference }}
                                    </td>
                                    <td class="px-6 py-4">
                                        NGN.
                                        {{ $transaction->bookedEvent->payment_amount }}
                                    </td>
                                    <td class="px-6 py-4">
                                        NGN.
                                        {{ $transaction->amount }}
                                    </td>
                                    <td class="px-6 py-4">
                                        NGN. 0
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
                                        <a href="{{ route('events.show', $transaction->bookedEvent->event->id) }}/?trxref={{ $transaction->reference }}&reference={{ $transaction->reference }}"
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
                            @if (isset($event->getTransactions()) && !empty($event->getTransactions()) && $event->getTransactions())
                                {{ $event->getTransactions()->links() }}
                            @endif
                        </div>
                    </div>
                </div>

            </div>
            {{-- End of Data Information --}}



        </div>

    </div>
@endsection
