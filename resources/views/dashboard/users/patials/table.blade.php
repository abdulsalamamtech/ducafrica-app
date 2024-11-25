{{-- Start Table --}}
    <div class="col-span-12 transition duration-300 transform bg-white rounded-lg shadow-xl hover:scale-105 sm:col-span-6 xl:col-span-3 intro-y">
        {{-- Table title --}}
        <div class="p-6 px-6 text-xl text-gray-900 dark:text-gray-100">
            {{ __("Users Information") }}
        </div>
        <!--Card-->
        <div id='recipients' class="p-8 mt-6 overflow-x-scroll bg-white rounded shadow lg:mt-0">
            <table id="example" class="overflow-x-scroll stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead>
                    <tr>
                        <th data-priority="1">S/N</th>
                        <th data-priority="2">Image</th>
                        <th data-priority="3">Name</th>
                        <th data-priority="4">Email</th>
                        <th data-priority="5">Role</th>
                        <th data-priority="6">No. of Assets</th>
                        <th data-priority="7">Phone no.</th>
                        <th data-priority="7">State</th>
                        <th data-priority="8">Action</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td class="text-left md:text-center">{{'LA-USER-000' . $user->id}}</td>

                        <td class="md:h-32 md:max-w-32"><img class="xl:px-4 w-100 h-100"  src="
                            @if(isset($user->user_profile->image) && isset($user->user_profile->image->path) )
                                {{(asset('storage/assets/' . $user->user_profile->image->path) ?? 'no---')}}
                            @else
                                {{'/img/img2.jpg'}}
                            @endif
                            "/>
                        </td>
                        
                        <td class="text-left md:text-center">{{$user->name}}</td>
                        <td class="text-left md:text-center">{{$user->email}}</td>
                        <td class="text-left md:text-center">{{$user->role}}</td>
                        <td class="text-left md:text-center">{{$user->lostAssets->count()}}</td>  
                        <td class="text-left md:text-center">{{$user->userProfile->phone_number ?? 'unknown'}}</td>                       
                        <td class="text-left md:text-center">{{$user->userProfile->state ?? 'unknown'}}</td>
                        <td class="sm:text-left md:text-center">
                            <div class="mt-2 sm:mx-2 sm:flex md:block">
                                <p>
                                    <a href="{{route('users.show',$user->id)}}" 
                                        class="bg-gray-300 hover:text-white hover:bg-[yellowgreen] p-1">
                                        View
                                    </a>
                                </p>                        
                            </div>
                        </td>
                        
                    </tr>
                @empty
                    <tr class="text-center">
                        <td>Null</td>
                        <td>Null</td>
                        <td>Null</td>
                        <td>Null</td>
                        <td>Null</td>
                        <td>Null</td>
                        <td>Null</td>
                        <td>Null</td>
                        <td>Null</td>

                    </tr>
                @endforelse

                    <!-- Rest of your data (refer to https://datatables.net/examples/server_side/ for server side processing)-->
                </tbody>

            </table>

        </div>
        <!--Card-->
    </div>
{{-- End Table --}}