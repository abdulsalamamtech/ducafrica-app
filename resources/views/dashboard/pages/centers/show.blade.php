@extends('dashboard.layouts.master')

@section('content')
    <!-- Container -->
    <div class="p-4 sm:ml-64">

        <div class="rounded-lg dark:border-gray-700 mt-20">

            {{-- Data Information --}}
            <div class="p-6 my-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">

                <div class="max-w-xlg xlg:mx-auto bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg">

                    <div class="overflow-hidden rounded-md mb-4">
                      <!-- Map image placeholder, replace src with actual image link -->
                      {{-- <img src="https://srv.carbonads.net/static/30242/5553640155979510763aebb62751652e628b00e1" alt="Map" class="w-full h-48 object-cover" /> --}}
                      <a href="#">
                          <img src="/images/world-map.png" alt="Map" class="w-full h-48 object-cover" />
                      </a>
                    </div>

                    <div class="space-y-3 pt-4">
                      <!-- Country -->
                      {{-- <div class="flex justify-between items-center">
                        <span class="font-semibold text-gray-700 dark:text-gray-300">Country</span>
                        <span class="text-blue-600 dark:text-blue-400">Nigeria 🇳🇬</span>
                      </div> --}}

                      {{-- Name --}}
                      <div class="flex justify-between items-start">
                          <div class="w-1/3 text-gray-700 dark:text-gray-300">Name:</div>
                          <div class="w-7/12 text-gray-500 dark:text-gray-400">{{ $center->name }}</div>
                        </div>

                      {{-- Payment ID --}}
                      <div class="flex justify-between items-start">
                        <div class="w-1/3 text-gray-700 dark:text-gray-300">Payment ID:</div>
                        <div class="w-7/12 text-gray-500 dark:text-gray-400">{{ $center->payment_id }}</div>
                      </div>

                      <div class="flex justify-between items-start">
                        <div class="w-1/3 text-gray-700 dark:text-gray-300">Type:</div>
                        <div class="w-7/12 text-gray-500 dark:text-gray-400">{{ $center->type }}</div>
                      </div>


                      <div class="flex justify-between items-start">
                        <div class="w-1/3 text-gray-700 dark:text-gray-300">Status:</div>
                        <div class="w-7/12 text-gray-500 dark:text-gray-400">Active</div>
                      </div>

                      <div class="flex justify-between items-start">
                        <div class="w-1/3 text-gray-700 dark:text-gray-300">Address:</div>
                        <div class="w-7/12 text-gray-500 dark:text-gray-400">{{ $center->address }}</div>
                      </div>

                      <div class="flex justify-between items-start">
                        <div class="w-1/3 text-gray-700 dark:text-gray-300">State:</div>
                        <div class="w-7/12 text-gray-500 dark:text-gray-400">{{ $center->state }}</div>
                      </div>

                      <div class="flex justify-between items-start">
                        <div class="w-1/3 text-gray-700 dark:text-gray-300">Contact:</div>
                        <div class="w-7/12 text-gray-500 dark:text-gray-400">{{ $center->phone_number }}</div>
                      </div>

                      <div class="flex justify-between items-start">
                        <div class="w-1/3 text-gray-700 dark:text-gray-300">State:</div>
                        <div class="w-7/12 text-gray-500 dark:text-gray-400">Event & Center</div>
                      </div>

                      <div class="flex justify-between items-start">
                        <div class="w-1/3 text-gray-700 dark:text-gray-300">Events:</div>
                        <div class="w-7/12 text-gray-500 dark:text-gray-400">{{ $center->id + 12 }}</div>
                      </div>

                      <div class="flex justify-between items-start">
                        <div class="w-1/3 text-gray-700 dark:text-gray-300">Booked Events:</div>
                        <div class="w-7/12 text-gray-500 dark:text-gray-400">{{ $center->id + 21 }}</div>
                      </div>

                      <div class="flex justify-between items-start">
                        <div class="w-1/3 text-gray-700 dark:text-gray-300">Total Earn:</div>
                        <div class="w-7/12 text-gray-500 dark:text-gray-400">NGN. 238,000</div>
                      </div>



                    </div>

                </div>


            </div>
            {{-- End of Data Information --}}



        </div>

    </div>
@endsection
