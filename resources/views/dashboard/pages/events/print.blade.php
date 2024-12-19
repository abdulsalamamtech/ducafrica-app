{{-- @extends('dashboard.layouts.master')

@section('content')
@endsection --}}



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    {{-- <script src="js/cdn.tailwindcss.com.3.4.5.js"></script> --}}
    {{-- <script src="/js/cdn.tailwindcss.com.3.4.5.js"></script> --}}


    <style>
        rounded-lg{
            padding: 2px;
            border-radius: 0.5rem;
        }
        /* dark:border-gray-700{
            padding: 2px;
            border-color: rgb(55,65,81);
        } */
        mt-20{
            padding: 2px;
            margin-top: 5rem;
        }
        max-w-xlg{
            padding: 2px;
            width: 58.333333%;
        }
        /* xlg:mx-auto{
            padding: 2px;
            margin: auto !important;
        } */
        bg-white{
            padding: 2px;
            background-color: rgb(255,255,255);
        }
        /* dark:bg-gray-800{
            padding: 2px;
            background-color: rgb(31,41,55);
        } */
        p-6{
            padding: 2px;
            padding: 1.5rem;
        }
        rounded-lg{
            padding: 2px;
            border-radius: 0.5rem;
        }
        shadow-lg{
            padding: 2px;
            box-shadow: 0 0 #0000, 0 0 #0000, 0 10px 15px -3px rgb(0,0,0,0.1), 0 4px 6px -4px rgb(0,0,0,0.1);
        }
        flex{
            padding: 2px;
            display: flex;
        }
        justify-between{
            padding: 2px;
            justify-content: space-between;
        }
        items-start{
            padding: 2px;
            align-items: flex-start;
        }
        w-100{
            padding: 2px;
            width: 100%;
        }
        w-50{
            padding: 2px;
            width: 50%;
        }
        w-1/3{
            padding: 2px;
            width: 33.333333%;
        }
        w-7/12{
            padding: 2px;
            width: 58.333333%;
        }
        pl-10{
            padding-left: 10px;
        }
    </style>
</head>
<body>

    <table>
        <tr class="w-100 mt-20">
            <td class="w-50">Ref No:</td>
            <td class="w-50 pl-10">{{ $event->id . now()->format('dmY') }}</td>
        </tr>
        <tr class="w-100 mt-20">
            <td class="w-50">Ref No:</td>
            <td class="w-50 pl-10">{{ $event->id . now()->format('dmY') }}</td>
        </tr>
    </table>


    <!-- Container -->
    <div class="p-4">

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
                            <div class="w-7/12 text-gray-500 dark:text-gray-400">{{ $event->id . now()->format('dmY') }}</div>
                        </div>

                        {{-- Name --}}
                        <div class="flex justify-between items-start border-b px-2">
                            <div class="w-1/3 text-gray-700 dark:text-gray-300">Name:</div>
                            <div class="w-7/12 text-gray-500 dark:text-gray-400">{{ $event->name }}</div>
                        </div>

                        <div class="flex justify-between items-start border-b px-2">
                            <div class="w-1/3 text-gray-700 dark:text-gray-300">Type:</div>
                            <div class="w-7/12 text-gray-500 dark:text-gray-400">{{ $event->type }}</div>
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
                            <div class="w-1/3 text-gray-700 dark:text-gray-300">Payment Status:</div>
                            @if ($event->isPaid() )
                                <div class="w-7/12 text-gray-500 dark:text-green-400">Paid</div>
                            @else
                                <div class="w-7/12 text-gray-500 dark:text-gray-400">Not Paid</div>
                            @endif
                        </div>

                        {{-- {{ $event->isBooked() }}
                        {{ $event->getBookedEvent()?->payment_type }}
                        {{ $event->isPaid() }}

                        {{ $event->getTransactions() }} --}}






                    </div>



                    {{-- Print Event Details --}}
                    <div class="flex items-end justify-end mt-4">
                        <a href="{{ route('pdfs.events.print', $event->id) }}"
                            class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                            <i class="fa fa-print"></i>
                            <span class="pl-3">Print</span>
                        </a>
                    </div>

                </div>

            </div>
            {{-- End of Data Information --}}



        </div>

    </div>
</body>
</html>
