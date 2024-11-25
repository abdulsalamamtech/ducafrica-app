@extends('dashboard.layouts.master')

@section('content')
        <!-- Container -->
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">

            @php
                $var = "";
            @endphp
            
            <div class="py-12">
                <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
                    <div class="p-4 bg-white shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg">
                        <div class="flex items-center justify-center max-w-xl place-items-center">
                        <section>
                            <header>
                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    {{ __('My profile information') }}
                                </h2>

                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    {{ __("Update your account's profile information") }}
                                </p>
                            </header>


                            <form method="post" action="{{ route('dashboard.profile.update', $user_profile->id) }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                
                                <div class="flex items-center gap-4">
                                    <div class="block w-10 h-10 mt-1 profileimage" style="border-radius:50%;">
                                        <img  class="w-100" src="
                                            @isset($user_profile->image->path)
                                                {{asset('storage/profiles/'.$user_profile->image->path)}}
                                            @else
                                                {{'/img/img1.jpg'}}
                                            @endisset
                                        "/>
                                    </div>
                                    <div>
                                    <x-input-label for="image" :value="__('Picture')" />
                                    <x-text-input id="image" name="image" type="file" class="block w-full mt-1" :value="old('image')" autofocus autocomplete="name" />
                                    <x-input-error class="mt-2" :messages="$errors->get('image')" />
                                    </div>
                                </div>
                                
                                <div class="flex items-center gap-4">
                                    <div>
                                        <x-input-label for="name" :value="__('Name')" />
                                        <x-text-input id="name" name="name" type="text" class="block w-full mt-1" :value="old('name', Auth::user()->name)" required autofocus autocomplete="name" disabled/>
                                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                    </div>
                                    <div>
                                        <x-input-label for="emai" :value="__('Email')" />
                                        <x-text-input id="email" name="email" type="text" class="block w-full mt-1" :value="old('email', Auth::user()->email)" required autofocus autocomplete="name"  disabled/>
                                        <x-input-error class="mt-2" :messages="$errors->get('email')" />
                                    </div>
                                </div>
                                
                                <div class="flex items-center gap-4">
                                    <div>
                                        <x-input-label for="phone_number" :value="__('Phone number')" />
                                        <x-text-input id="phone_number" name="phone_number" type="tel" class="block w-full mt-1" placeholder="090********" :value="old('phone_number', $user_profile->phone_number ?? '')" required autofocus autocomplete="name" />
                                        <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
                                    </div>
                                    <div>
                                        <x-input-label for="dob" :value="__('Date of Birth')" />
                                        <x-text-input id="dob" name="dob" type="date" class="block w-full mt-1" :value="Illuminate\Support\Carbon::parse(old('dob', $user_profile->dob ?? ''))->format('Y-m-d')" autofocus autocomplete="name" />
                                        <x-input-error class="mt-2" :messages="$errors->get('dob')" />
                                    </div>
                                </div>

                                <div class="block w-full mt-1">
                                    <x-input-label for="address" :value="__('Enter your address')" />
                                    <x-text-input id="address" name="address" type="text" class="block w-full mt-1" :value="old('address', $user_profile->address ?? '')" autofocus autocomplete="name" />
                                    <x-input-error class="mt-2" :messages="$errors->get('address')" />
                                </div>
                                
                                <div class="flex items-center w-full gap-4 mt-1">
                                    <div>
                                        <x-input-label for="lga" :value="__('Local Government Area')" />
                                        <x-text-input id="lga" name="lga" type="text" class="block w-full mt-1" :value="old('lga', $user_profile->lga ?? '')" required autofocus autocomplete="name" />
                                        <x-input-error class="mt-2" :messages="$errors->get('lga')" />
                                    </div>
                                    <div>
                                        <x-input-label for="state" :value="__('State')" />
                                        <x-text-input id="state" name="state" type="text" class="block w-full mt-1" :value="old('state', $user_profile->state ?? '')" required autofocus autocomplete="name" />
                                        <x-input-error class="mt-2" :messages="$errors->get('state')" />
                                    </div>
                                </div>
                                <div class="flex items-center gap-4">
                                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                                </div>
                            </form>
                            
                        </section>
                        </div>
                    </div>


                        <div class="p-4 bg-white shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg">
                            <div class="max-w-xl">
                                @include('profile.partials.update-password-form')
                            </div>
                        </div>                    
                </div>
                
            </div>

            

        </div>
    </div>

@endsection
