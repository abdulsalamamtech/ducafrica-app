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
                      <div class="w-7/12 text-gray-500 dark:text-gray-400">{{ $center->centerType?->name }}</div>
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
                      {{-- Get the total transaction made to this center --}}
                      <div class="w-7/12 text-gray-500 dark:text-gray-400">NGN.{{ $center?->transactions()?->sum('amount') ?? 0}}</div>
                    </div>



                  </div>

              </div>


              {{-- Center Groups --}}
              <div class="rounded-lg dark:border-gray-700 mt-10">
    
                {{-- Tables --}}
                <div class="my-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">
    
    
                    <div class="relative p-8 overflow-x-auto shadow-md sm:rounded-lg">
                        <!-- Header Section -->
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-xl md:text-2xl font-semibold text-gray-700 dark:text-gray-300">Center Groups</h2>
                            <button class="px-3 md:px-4 py-2 bg-blue-800 text-white rounded-md hover:bg-blue-700"
                            data-modal-target="addGroupModal" data-modal-show="addGroupModal">
                                Add Group To Center
                            </button>
    
    
                            {{-- Add Group --}}
                            <!-- Add Group modal -->
                            <div id="addGroupModal" tabindex="-1" aria-hidden="true"
                                class="fixed top-0 left-0 right-0 z-50 items-center justify-center hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full dark:bg-transparent">
                                <div class="relative w-full max-w-2xl max-h-auto bg-white dark:bg-gray-700">
                                    <!-- Modal content -->
                                    <form action="{{ route('centers.groups.store', $center->id) }}" method="POST"
                                        class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        @method('POST')
                                        @csrf
                                        <!-- Modal header -->
                                        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                Add Group To Center
                                            </h3>
                                            <button type="button"
                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-hide="addGroupModal">
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
                                            <div class="col-span-12">
                                                <label for="group_id"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                    Choose a group to add to center
                                                </label>
                                                <select type="dropdown" name="group_id" id="group_id"
                                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Group Head">
                                                        {{-- {{ $available groups }} --}}
                                                        @forelse ($available_groups as $available_group)
                                                            <option value="{{ $available_group->id }}">
                                                                {{ $available_group->name . ' (GH: ' . $available_group?->groupHead?->name . ' ' . $available_group?->groupHead?->email . ')' }}
                                                            </option>
                                                        @empty
                                                            <option value="">unavailable</option>
                                                        @endforelse
                                                </select>
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
    
                            <form class="w-full max-w-md mx-auto">
                                <label for="default-search" class="mb-1 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                        </svg>
                                    </div>
                                    <input type="search" name="search" value="{{ request('search') }}" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search..." required />
                                    <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                                </div>
                            </form>
    
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
                                                        <li class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                            <!-- Modal toggle -->
                                                            <a href="#" type="button"
                                                                data-modal-target="editGroupModal{{ $group->id }}"
                                                                data-modal-show="editGroupModal{{ $group->id }}"
                                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View Group
                                                            </a>
                                                        </li>
                                                        <li>
                                                            {{-- Deactivate --}}
                                                            {{-- Delete Button --}}
                                                            <div href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                                <button data-modal-target="popup-modal{{ $group->id }}" data-modal-toggle="popup-modal{{ $group->id }}" class="block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:red-blue-800" type="button">
                                                                    Delete
                                                                </button>
                                                            </div>                                                    
                                                        </li>
                                                    </ul>
                                                </div>
                                        </td>
                                    </tr>
    
                                    {{-- Delete Popup Modal --}}
                                    <div id="popup-modal{{ $group->id }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative p-4 w-full max-w-md max-h-full">
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700" >
                                            <form 
                                                action="{{ route('centers.groups.delete', [$center->id, $group->id]) }}" method="POST">
                                                @csrf
                                                @method("DELETE")
    
                                                <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal{{ $group->id }}">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <div class="p-4 md:p-5 text-center">
                                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                    </svg>
                                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this resource? (Id: {{ $group->id }})</h3>
                                                    <button data-modal-hide="popup-modal{{ $group->id }}" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                        Yes, I'm sure
                                                    </button>
                                                    <button data-modal-hide="popup-modal{{ $group->id }}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
    
                                    {{-- Changed to view group on model --}}
                                    <!-- Edit Group modal 2 -->
                                    <div id="editGroupModal{{ $group->id }}" tabindex="-1" aria-hidden="true"
                                        class="fixed top-0 left-0 right-0 z-50 items-center justify-center hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative w-full max-w-2xl max-h-full bg-white">
                                            <!-- Modal content -->
                                            <form action="#" method="GET"
                                                class="relative bg-white rounded-lg shadow dark:bg-gray-700">
    
                                                @csrf
                                                
                                                <!-- Modal header -->
                                                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                        View Group {{ $group->id }}
                                                    </h3>
                                                    <button type="button"
                                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                        data-modal-hide="editGroupModal{{ $group->id }}">
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
                                                    <div>
                                                        <label for="Group-name"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                                Name
                                                            </label>
                                                            <input type="text" name="name" id="Group-name"4
                                                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="Bonnie" required="" value="{{ $group->name }}" disabled>
                                                    </div>
    
                                                    <div>
                                                        <label for="Group-description"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                                Description
                                                                </label>
                                                            <input type="text" name="description" id="Group-description"
                                                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="this Group are for premium users" required="" value="{{ $group->description }}" disabled>
                                                    </div>
    
                                                    <div class="col-span-12">
                                                        <label for="update_local_councils"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                            Group head (is in-charge of this group)
                                                        </label>
                                                        <select type="state" name="added_by" id="update_local_councils"
                                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="FCT - Abuja" required="" disabled>
            
                                                                @if ($group->groupHead)
                                                                    <option value="{{ $group?->groupHead?->id }}" @if ($group->groupHead->id == $group->groupHead?->id) {{ 'selected' }}@endif>
                                                                        {{ $group->groupHead->name . ' (' . $group->groupHead->activeRole() . ') | ' . $group->groupHead->email}}
                                                                    </option>
                                                                @else
                                                                    <option value="">unavailable</option>
                                                                @endif
                                                        </select>
                                                    </div>                                                  
                                                </div>
    
                                                <!-- Modal footer -->
                                                <div
                                                    class="flex items-center p-6 space-x-3 rtl:space-x-reverse border-t border-gray-200 rounded-b dark:border-gray-600">
                                                    <button type="button"
                                                        data-modal-hide="editGroupModal{{ $group->id }}"
                                                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                                        Close
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
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
    
                </div>
                {{-- End of Table --}}
    
    
              </div>            
          </div>
          {{-- End of Data Information --}}


        </div>

    </div>
@endsection
