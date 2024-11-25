@extends('dashboard.layouts.master')

@section('content')
    <!-- Container -->
    <div class="p-4 sm:ml-64">

        <div class="rounded-lg dark:border-gray-700 mt-20">

            {{-- Data Information --}}
            <div class="p-6 my-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">

                <div class="max-w-xl xlg:mx-auto bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg">

                    <div class="overflow-hidden rounded-md mb-4">
                      <!-- Map image placeholder, replace src with actual image link -->
                      {{-- <img src="https://srv.carbonads.net/static/30242/5553640155979510763aebb62751652e628b00e1" alt="Map" class="w-full h-48 object-cover" /> --}}
                      <a href="#">
                          <img src="/images/world-map.png" alt="Map" class="w-full h-48 object-cover" />
                      </a>
                    </div>

                    <div class="space-y-3">
                      <!-- Country -->
                      <div class="flex justify-between items-center">
                        <span class="font-semibold text-gray-700 dark:text-gray-300">Country</span>
                        <span class="text-blue-600 dark:text-blue-400">Nigeria 🇳🇬</span>
                      </div>

                      <!-- State / Region -->
                      <div class="flex justify-between items-center">
                        <span class="font-semibold text-gray-700 dark:text-gray-300">State / Region</span>
                        <span class="text-gray-500 dark:text-gray-400">Lagos</span>
                      </div>

                      <!-- Address -->
                      <div class="flex justify-between items-center">
                        <span class="font-semibold text-gray-700 dark:text-gray-300">Address</span>
                        <span class="text-gray-500 dark:text-gray-400">No.345 Lagos (Victoria Island Annex)</span>
                      </div>

                      <!-- Payment ID -->
                      <div class="flex justify-between items-center">
                        <span class="font-semibold text-gray-700 dark:text-gray-300">Payment ID</span>
                        <span class="text-gray-500 dark:text-gray-400">PAY_98NIXD0012</span>
                      </div>

                      <!-- Name -->
                      <div class="flex justify-between items-center">
                        <span class="font-semibold text-gray-700 dark:text-gray-300">Name</span>
                        <span class="text-gray-500 dark:text-gray-400">Turin event center</span>
                      </div>

                      <div class="flex justify-between items-center">
                        <span class="font-semibold text-gray-700 dark:text-gray-300">Type</span>
                        <span class="text-gray-500 dark:text-gray-400">event & center</span>
                      </div>

                      <div class="flex justify-between items-center">
                        <span class="font-semibold text-gray-700 dark:text-gray-300">Contact</span>
                        <span class="text-gray-500 dark:text-gray-400">+23543476537</span>
                      </div>

                      <div class="flex justify-between items-center">
                        <span class="font-semibold text-gray-700 dark:text-gray-300">Events</span>
                        <span class="text-gray-500 dark:text-gray-400">665</span>
                      </div>

                      <div class="flex justify-between items-center">
                        <span class="font-semibold text-gray-700 dark:text-gray-300">Booked Events</span>
                        <span class="text-gray-500 dark:text-gray-400">6,650</span>
                      </div>

                      <!-- Total Earned -->
                      <div class="flex justify-between items-center">
                        <span class="font-semibold text-gray-700 dark:text-gray-300">Total Earn</span>
                        <span class="text-gray-500 dark:text-gray-400">Naira (NGN) 346,466</span>
                      </div>


                    </div>

                </div>


            </div>
            {{-- End of Data Information --}}



        </div>

    </div>
@endsection
