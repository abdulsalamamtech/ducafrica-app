@extends('dashboard.layouts.master')

@section('content')
    <!-- Container -->
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">

            <div class="py-12">
                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                        <div class="px-6 pt-6 text-xl text-gray-900 tex dark:text-gray-100">
                            {{-- {{ __("You're logged in!") }} --}}
                            User Profile Information
                        </div>

                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            
                            {{-- <div class="mt-3">Name: <span class="text-gray-500">{{ "user->name" }}</span></div>
                            <div class="mt-3">Role: <span class="text-gray-500">{{ "user->role" ?? 'active user'}}</span></div>
                            <div class="mt-3">Email: <span class="text-gray-500">{{ "user->email" }}</span></div>

                            <hr class="my-3" />

                            <div class="mt-3">Phone number: <span class="text-gray-500">{{ "user_profile->phone_number" ?? '' }}</span></div>
                            <div class="mt-3">DOB: <span class="text-gray-500">{{ $user_profile?->dob?->format('D. d M Y. h:i:s a') ?? '' }}</span></div>
                            <div class="mt-3">Address: <span class="text-gray-500">{{ "user_profile?->address" }}</span></div>
                            <div class="mt-3">LGA: <span class="text-gray-500">{{ "user_profile?->lga" ?? '' }}</span></div>
                            <div class="mt-3">State: <span class="text-gray-500">{{ "user_profile?->state "?? '' }}</span></div>
                            <div class="mt-3">Country: <span class="text-gray-500">{{ "user_profile?->country" ?? '' }}</span></div> --}}

                            <hr class="my-3" />

                            {{-- <div class="mt-3">Registered on: <span class="text-gray-500">{{ "user_profile"?->created_at->format('D. d M Y. h:i:s a') ?? '' }}</span></div> --}}
                            {{-- <div class="mt-3">Account Created: <span class="text-gray-500">{{ "user_profile"?->created_at->diffForHumans() ?? '' }}</span></div> --}}

                            {{-- {{ $user }} --}}
                            @isset($user)
                                
                                @forelse ($user as $key => $value)
                                    <div class="mt-3">{{ $key }}: <span class="text-gray-500">{{ $value ?? 'null'}}</span></div>
                                @empty
                                    <div>
                                        No more data to display.
                                    </div>
                                @endforelse
                            @endisset
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
