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
                        <div class="w-1/3 text-gray-700 dark:text-gray-300">Group Name:</div>
                        <div class="w-7/12 text-gray-500 dark:text-gray-400">{{ $group->name }}</div>
                    </div>

                    <div class="font-semibold flex justify-between items-start border-b px-2">
                        <div class="w-1/3 text-gray-700 dark:text-gray-300">Description:</div>
                        <div class="w-7/12 text-gray-500 dark:text-gray-400">{{ $group->description }}</div>
                    </div>

                    <div class="font-semibold flex justify-between items-start border-b px-2">
                        <div class="w-1/3 text-gray-700 dark:text-gray-300">Total Members:</div>
                        <div class="w-7/12 text-gray-500 dark:text-gray-400">{{ $group->groupMember->count() }}</div>
                    </div>

                    <div class="font-semibold flex justify-between items-start border-b px-2">
                        <div class="w-1/3 text-gray-700 dark:text-gray-300">Created on</div>
                        <div class="w-7/12 text-gray-500 dark:text-gray-400">{{ $group->created_at }}</div>
                    </div>

                    <div class="font-semibold flex justify-between items-start border-b px-2">
                        <div class="w-1/3 text-gray-700 dark:text-gray-300">Group Head:</div>
                        <div class="w-7/12 text-gray-500 dark:text-gray-400">{{ $group->groupHead->name }}</div>
                    </div>



                    <div class="font-semibold flex justify-between items-start border-b px-2">
                        <div class="w-1/3 text-gray-700 dark:text-gray-300">Email:</div>
                        <div class="w-7/12 text-gray-500 dark:text-gray-400">{{ $group->groupHead->email }}</div>
                    </div>

                    <div class="font-semibold flex justify-between items-start border-b px-2">
                        <div class="w-1/3 text-gray-700 dark:text-gray-300">Phone number:</div>
                        <div class="w-7/12 text-gray-500 dark:text-gray-400">{{ $group->groupHead->phone }}</div>
                    </div>

                    <div class="font-semibold flex justify-between items-start border-b px-2">
                        <div class="w-1/3 text-gray-700 dark:text-gray-300">Status:</div>
                        <div class="w-7/12 text-gray-500 dark:text-gray-400">Active</div>
                    </div>


                </div>
            </div>            

            {{-- Tables --}}
            <div class="my-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">


                <div class="relative p-8 overflow-x-auto shadow-md sm:rounded-lg">
                    <!-- Header Section -->
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl md:text-2xl font-semibold text-gray-700 dark:text-gray-300">Group Members</h2>

                        @if(request()->user()->role == \App\Enum\UserRoleEnum::ADMIN || 
                        in_array(request()->user()->activeRole()??request()->user()->role, [
                            \App\Enum\UserRoleEnum::SUPERADMIN, 
                            \App\Enum\UserRoleEnum::ADMIN, 
                            \App\Enum\UserRoleEnum::GROUPHEAD])
                    )
                            <button class="px-3 md:px-4 py-2 bg-blue-800 text-white rounded-md hover:bg-blue-700"
                                data-modal-target="addgroupMemberModal" data-modal-show="addgroupMemberModal">
                                Add group Member
                            </button>

                        @endif


                        {{-- Add groupMember --}}
                        <!-- Add groupMember modal -->
                        <div id="addgroupMemberModal" tabindex="-1" aria-hidden="true"
                            class="fixed top-0 left-0 right-0 z-50 items-center justify-center hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full dark:bg-transparent">
                            <div class="relative w-full max-w-2xl max-h-auto bg-white dark:bg-gray-700">
                                <!-- Modal content -->
                                <form action="{{ route('group-members.store') }}" method="POST"
                                    class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    @method('POST')
                                    @csrf
                                    <!-- Modal header -->
                                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                            Add group Member
                                        </h3>
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="addgroupMemberModal">
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
                                            <label for="group_member_user_id"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                Select a group Member 
                                            </label>
                                            <select name="user_id" id="group_member_user_id"
                                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Select Group Members">
                                                    {{-- {{ $local_councils }} --}}
                                                    @forelse ($new_group_members as $user)
                                                        <option value="{{ $user->id }}">
                                                            {{ $user->name . ' (' . $user->activeRole() . ') | ' . $user->email}}
                                                        </option>
                                                    @empty
                                                        <option value="">unavailable</option>
                                                    @endforelse
                                            </select>
                                        </div>                                            
                                        <div>
                                            <input type="hidden" name="group_id" id="group_id" value="{{ $group?->id ?? 0 }}""
                                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="this groupMember are for premium users" required="">
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
                                    group
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                                @if(request()->user()->role == \App\Enum\UserRoleEnum::ADMIN || 
                                    in_array(request()->user()->activeRole()??request()->user()->role, [
                                        \App\Enum\UserRoleEnum::SUPERADMIN, 
                                        \App\Enum\UserRoleEnum::ADMIN, 
                                        \App\Enum\UserRoleEnum::GROUPHEAD])
                                )
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>

                            {{-- Database GroupMembers --}}
                            @forelse ($group_members as $groupMember)
                                <!-- groupMember table record 2 -->
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
                                            <div class="text-base font-semibold">{{ $groupMember?->user?->name }}</div>
                                            <div class="font-normal text-gray-500">{{ $groupMember?->user?->phone }}</div>
                                            <div class="font-normal text-gray-500">{{ $groupMember?->user?->email }}</div>
                                            <div class="font-normal text-gray-500">{{ $groupMember?->user?->address . ", ". $groupMember?->user?->city . ", ". $groupMember?->user?->country}}</div>
                                        </div>
                                    </th>
                                    <td class="px-6 py-4">
                                        <div>
                                            {{ $groupMember->group->name}}
                                        </div>
                                        <div class="text-base font-semibold">{{ $groupMember->group->groupHead->name }}</div>
                                        <div class="text-base font-semibold">{{ $groupMember->group->groupHead->phone }}</div>
                                        <div class="text-base font-semibold">{{ $groupMember->group->groupHead->email }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="h-2.5 w-2.5 rounded-full bg-{{ $groupMember->added_by?'green':'red' }}-500 me-2"></div> {{ $groupMember->added_by?"Active":"Inactive" }}
                                        </div>
                                    </td>
                                    @if(request()->user()->role == \App\Enum\UserRoleEnum::ADMIN || 
                                        in_array(request()->user()->activeRole()??request()->user()->role, [
                                            \App\Enum\UserRoleEnum::SUPERADMIN, 
                                            \App\Enum\UserRoleEnum::ADMIN, 
                                            \App\Enum\UserRoleEnum::GROUPHEAD])
                                    )
                                        <td class="px-6 py-4">

                                            <button id="dropdownMenuIconButton{{ $groupMember->id }}" data-dropdown-toggle="dropdownDots{{ $groupMember->id }}"
                                                class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                                                <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                                                </svg>
                                                </button>

                                                <!-- Dropdown menu -->
                                                <div id="dropdownDots{{ $groupMember?->id }}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconButton{{ $groupMember->id }}">
                                                        <li>
                                                            <a href="{{ route('users.show', $groupMember?->user?->id ?? 2 ) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">View</a>
                                                        </li>
                                                        <li>
                                                            {{-- Deactivate --}}
                                                            {{-- Delete Button --}}
                                                            <div href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                                <button data-modal-target="popup-modal{{  $groupMember->id }}" data-modal-toggle="popup-modal{{  $groupMember->id }}" class="block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:red-blue-800" type="button">
                                                                    Remove
                                                                </button>
                                                            </div>                                                    
                                                        </li>                                                    
                                                    </ul>
                                                </div>
                                        </td>
                                    @endif
                                </tr>
                                {{-- Delete Popup Modal --}}
                                <div id="popup-modal{{  $groupMember->id }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700" >
                                        <form 
                                            action="{{ route('group-members.delete',  $groupMember->id) }}" method="POST">
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
                                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to remove this resource? (Id: {{  $groupMember->id }})</h3>
                                                <button data-modal-hide="popup-modal{{  $groupMember->id}}" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                    Yes, I'm sure
                                                </button>
                                                <button data-modal-hide="popup-modal{{ $groupMember->id}}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                                
                            @empty
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td colspan="10" class="text-center p-8">groupMember unavailable</td>
                                </tr>
                            @endforelse



                        </tbody>
                    </table>

                    {{-- Paginate --}}
                    <div class="text-center pt-4 dark:text-gray-100">
                        <div class="px-8">
                            @isset($group_members)
                                {{ $group_members?->links() }}
                            @endisset
                        </div>
                    </div>

                </div>

            </div>
            {{-- End of Table --}}


        </div>

    </div>
@endsection
