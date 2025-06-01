@php
    $brand = [
        'bg' => '#5508b9',
        'bg-dark' => '#550899',

        'bg-accent' => '#0828b9',
        'bg-color' => '#0828ad',
    ];
@endphp


<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">

        {{-- Start of Sidebar Menu --}}
        <ul class="space-y-2 font-medium mt-2">

            {{-- Admin access to main dashboard --}}
            @if (request()->user()->role == \App\Enum\UserRoleEnum::ADMIN ||
                    in_array(request()->user()?->activeRole(), [\App\Enum\UserRoleEnum::SUPERADMIN, \App\Enum\UserRoleEnum::ADMIN]))
                <li class="">
                    <a href="{{ route('dashboard') }}"
                        class="{{ request()->routeIs('dashboard') ? 'text-white bg-[' . $brand['bg-color'] . ']' : '' }}
                            flex items-center p-2 text-gray-900 hover:text-gray-100 rounded-lg dark:text-white hover:bg-blue-700 dark:hover:bg-gray-700 group">
                        <div
                            class="flex-shrink-0 w-8 h-5 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                            <i class='fa fa-pie-chart'></i>
                        </div>
                        <span class="flex-1 ms-3 whitespace-nowrap">Dashboard</span>
                    </a>
                </li>
            @endif

            {{-- If user is not admin --}}
            @if (request()->user()->role == \App\Enum\UserRoleEnum::USER ||
                    in_array(request()->user()->activeRole(), [
                        \App\Enum\UserRoleEnum::COOPERATORS,
                        \App\Enum\UserRoleEnum::GROUPHEAD,
                        \App\Enum\UserRoleEnum::COOPERATORS,
                        \App\Enum\UserRoleEnum::STANDARD,
                        \App\Enum\UserRoleEnum::USER,
                    ]))
                <li class="">
                    <a href="{{ route('my-dashboard') }}"
                        class="{{ request()->routeIs('my-dashboard') ? 'text-white bg-[' . $brand['bg-color'] . ']' : '' }}
                            flex items-center p-2 text-gray-900 hover:text-gray-100 rounded-lg dark:text-white hover:bg-blue-700 dark:hover:bg-gray-700 group">
                        <div
                            class="flex-shrink-0 w-8 h-5 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                            <i class='fa fa-th'></i>
                        </div>
                        <span class="flex-1 ms-3 whitespace-nowrap">My Dashboard</span>
                    </a>
                </li>
            @endif


            {{-- Admin access to center and event --}}
            @if (request()->user()->role == \App\Enum\UserRoleEnum::ADMIN ||
                    in_array(request()->user()?->activeRole(), [\App\Enum\UserRoleEnum::SUPERADMIN, \App\Enum\UserRoleEnum::ADMIN]))
                <li class="" title="Centers to host events">
                    <a href="{{ route('centers.index') }}"
                        class="{{ request()->routeIs('centers.*') ? 'text-white bg-[' . $brand['bg-color'] . ']' : '' }}
                            flex items-center p-2 text-gray-900 hover:text-gray-100 rounded-lg dark:text-white hover:bg-blue-700 dark:hover:bg-gray-700 group">
                        <div
                            class="flex-shrink-0 w-8 h-5 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                            <i class='fa fa-th-large'></i>
                        </div>
                        <span class="flex-1 ms-3 whitespace-nowrap">Centers</span>
                        <span
                            class="inline-flex items-center justify-center w-3 h-3 p-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full ms-3 dark:bg-blue-900 dark:text-blue-300">
                            {{-- @if (Auth::user()->role == 'admin')
                                    {{ Number::abbreviate($lost_assets->count() ?? 0)}}
                                @else
                                    {{ Number::abbreviate(Auth::user()->lostAssets->count() ?? 0)}}
                                @endif --}}
                            {{ Number::abbreviate(auth()->user()->statistics()['admin']['centers'] ?? 0) }}

                        </span>
                    </a>
                </li>
                <li class="" title="Event or Activity">
                    <a href="{{ route('events.index') }}"
                        class="{{ request()->routeIs('events.*') ? 'text-white bg-[' . $brand['bg-color'] . ']' : '' }}
                            flex items-center p-2 text-gray-900 hover:text-gray-100 rounded-lg dark:text-white hover:bg-blue-700 dark:hover:bg-gray-700 group">
                        <div
                            class="flex-shrink-0 w-8 h-5 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                            <i class="fa fa-cube"></i>
                        </div>
                        <span class="flex-1 ms-3 whitespace-nowrap">Events</span>
                    </a>
                </li>
            @endif

            <li class="">
                <a href="{{ route('available-events') }}"
                    class="{{ request()->routeIs('available-events*') ? 'text-white bg-[' . $brand['bg-color'] . ']' : '' }}
                        flex items-center p-2 text-gray-900 hover:text-gray-100 rounded-lg dark:text-white hover:bg-blue-700 dark:hover:bg-gray-700 group">
                    <div
                        class="flex-shrink-0 w-8 h-5 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <span class="flex-1 ms-3 whitespace-nowrap">Available Events</span>
                </a>
            </li>


            @if (request()->user()->role == \App\Enum\UserRoleEnum::ADMIN ||
                    in_array(request()->user()?->activeRole(), [\App\Enum\UserRoleEnum::SUPERADMIN, \App\Enum\UserRoleEnum::ADMIN]))
                <li class="">
                    <a href="{{ route('booked-events.index') }}"
                        class="{{ request()->routeIs('booked-events.*') ? 'text-white bg-[' . $brand['bg-color'] . ']' : '' }}
                            flex items-center p-2 text-gray-900 hover:text-gray-100 rounded-lg dark:text-white hover:bg-blue-700 dark:hover:bg-gray-700 group">
                        <div
                            class="flex-shrink-0 w-8 h-5 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                            <i class="fa fa-bookmark"></i>
                        </div>
                        <span class="flex-1 ms-3 whitespace-nowrap">Booked Events</span>
                        <span
                            class="inline-flex items-center justify-center w-3 h-3 p-3 text-sm font-medium text-green-800 bg-green-100 rounded-full ms-3 dark:bg-blue-900 dark:text-blue-300">
                            {{ Number::abbreviate(auth()->user()->statistics()['admin']['booked_events'] ?? 0) }}
                        </span>
                    </a>
                </li>
            @endif


            {{-- If user is not admin --}}
            @if (request()->user()->role == \App\Enum\UserRoleEnum::USER ||
                    in_array(request()->user()->activeRole(), [
                        \App\Enum\UserRoleEnum::COOPERATORS,
                        \App\Enum\UserRoleEnum::GROUPHEAD,
                        \App\Enum\UserRoleEnum::COOPERATORS,
                        \App\Enum\UserRoleEnum::STANDARD,
                        \App\Enum\UserRoleEnum::USER,
                    ]))
                <li class="">
                    <a href="{{ route('my-events') }}"
                        class="{{ request()->routeIs('my-events*') ? 'text-white bg-[' . $brand['bg-color'] . ']' : '' }}
                            flex items-center p-2 text-gray-900 hover:text-gray-100 rounded-lg dark:text-white hover:bg-blue-700 dark:hover:bg-gray-700 group">
                        <div
                            class="flex-shrink-0 w-8 h-5 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                            <i class="fa fa-stack-overflow"></i>

                        </div>
                        <span class="flex-1 ms-3 whitespace-nowrap">My Events</span>
                    </a>
                </li>

                <li class="">
                    <a href="{{ route('my-transactions') }}"
                        class="{{ request()->routeIs('my-transactions.*') ? 'text-white bg-[' . $brand['bg-color'] . ']' : '' }}
                            flex items-center p-2 text-gray-900 hover:text-gray-100 rounded-lg dark:text-white hover:bg-blue-700 dark:hover:bg-gray-700 group">
                        <div
                            class="flex-shrink-0 w-8 h-5 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                            <i class="fa fa-money"></i>
                        </div>
                        <span class="flex-1 ms-3 whitespace-nowrap">My Transactions</span>
                    </a>
                </li>
            @endif


            {{-- If user is not admin --}}
            @if (request()->user()->role == \App\Enum\UserRoleEnum::ADMIN ||
                    in_array(request()->user()->activeRole() ?? request()->user()->role, [
                        \App\Enum\UserRoleEnum::SUPERADMIN,
                        \App\Enum\UserRoleEnum::ADMIN,
                        \App\Enum\UserRoleEnum::GROUPHEAD,
                    ]))
                <li class="">
                    <a href="{{ route('groups.index') }}"
                        class="{{ request()->routeIs('groups.*') ? 'text-white bg-[' . $brand['bg-color'] . ']' : '' }}
                            flex items-center p-2 text-gray-900 hover:text-gray-100 rounded-lg dark:text-white hover:bg-blue-700 dark:hover:bg-gray-700 group">
                        <div
                            class="flex-shrink-0 w-8 h-5 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                            {{-- <i class="fa fa-layer-group"></i> --}}
                            <i class="fa fa-flag"></i>
                        </div>
                        <span class="flex-1 ms-3 whitespace-nowrap">Groups</span>
                    </a>
                </li>
            @endif

            {{-- <li class="">
                    <a href="{{ route('my-groups.index') }}"
                        class="{{ request()->routeIs('my-groups.*')? 'text-white bg-['.$brand['bg-color'].']' :''; }}
                        flex items-center p-2 text-gray-900 hover:text-gray-100 rounded-lg dark:text-white hover:bg-blue-700 dark:hover:bg-gray-700 group">
                        <div
                            class="flex-shrink-0 w-8 h-5 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                            <i class="fa fa-tree"></i>
                        </div>
                        <span class="flex-1 ms-3 whitespace-nowrap">My Groups</span>
                    </a>
                </li>     --}}

            {{-- For users --}}
            {{-- If user is not admin --}}
            {{-- @if (request()->user()->role == \App\Enum\UserRoleEnum::USER || in_array(request()->user()->activeRole(), [\App\Enum\UserRoleEnum::COOPERATORS, \App\Enum\UserRoleEnum::GROUPHEAD, \App\Enum\UserRoleEnum::COOPERATORS, \App\Enum\UserRoleEnum::STANDARD, \App\Enum\UserRoleEnum::USER]))
                    <li class="">
                        <a href="{{ route('my-groups.index') }}"
                            class="{{ request()->routeIs('my-groups.*')? 'text-white bg-['.$brand['bg-color'].']' :''; }}
                            flex items-center p-2 text-gray-900 hover:text-gray-100 rounded-lg dark:text-white hover:bg-blue-700 dark:hover:bg-gray-700 group">
                            <div
                                class="flex-shrink-0 w-8 h-5 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                                <i class="fa fa-wpforms"></i>
                            </div>
                            <span class="flex-1 ms-3 whitespace-nowrap">My Groups</span>
                        </a>
                    </li>   
                @endif --}}

            {{-- If user is admin --}}
            @if (request()->user()->role == \App\Enum\UserRoleEnum::ADMIN ||
                    in_array(request()->user()?->activeRole(), [\App\Enum\UserRoleEnum::SUPERADMIN, \App\Enum\UserRoleEnum::ADMIN]))
                <hr>

                <li class="">
                    <a href="{{ route('users.index') }}"
                        class="{{ request()->routeIs('users.*') ? 'text-white bg-[' . $brand['bg-color'] . ']' : '' }}
                            flex items-center p-2 text-gray-900 hover:text-gray-100 rounded-lg dark:text-white hover:bg-blue-700 dark:hover:bg-gray-700 group">
                        <div
                            class="flex-shrink-0 w-8 h-5 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                            <i class="fa fa-users"></i>
                        </div>
                        <span class="flex-1 ms-3 whitespace-nowrap">Users</span>
                    </a>
                </li>

                <li class="">
                    <a href="{{ route('new-users') }}"
                        class="{{ request()->routeIs('new-users*') ? 'text-white bg-[' . $brand['bg-color'] . ']' : '' }}
                            flex items-center p-2 text-gray-900 hover:text-gray-100 rounded-lg dark:text-white hover:bg-blue-700 dark:hover:bg-gray-700 group">
                        <div
                            class="flex-shrink-0 w-8 h-5 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                            <i class='fa fa-user-plus'></i>
                        </div>
                        <span class="flex-1 ms-3 whitespace-nowrap">New Users</span>
                        <span
                            class="inline-flex items-center justify-center w-3 h-3 p-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full ms-3 dark:bg-blue-900 dark:text-blue-300">
                            {{ Number::abbreviate(auth()->user()->statistics()['admin']['users']['new_users'] ?? 0) }}
                        </span>
                    </a>
                </li>

                <hr>

                <li class="">
                    <a href="{{ route('roles.index') }}"
                        class="{{ request()->routeIs('roles.*') ? 'text-white bg-[' . $brand['bg-color'] . ']' : '' }}
                            flex items-center p-2 text-gray-900 hover:text-gray-100 rounded-lg dark:text-white hover:bg-blue-700 dark:hover:bg-gray-700 group">
                        <div
                            class="flex-shrink-0 w-8 h-5 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                            <i class="fa fa-lock"></i>
                        </div>
                        <span class="flex-1 ms-3 whitespace-nowrap">Roles</span>
                    </a>
                </li>

                <li class="">
                    <a href="{{ route('center-types.index') }}"
                        class="{{ request()->routeIs('center-types-.*') ? 'text-white bg-[' . $brand['bg-color'] . ']' : '' }}
                            flex items-center p-2 text-gray-900 hover:text-gray-100 rounded-lg dark:text-white hover:bg-blue-700 dark:hover:bg-gray-700 group">
                        <div
                            class="flex-shrink-0 w-8 h-5 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                            <i class="fa fa-lock"></i>
                        </div>
                        <span class="flex-1 ms-3 whitespace-nowrap">Center Types</span>
                    </a>
                </li>

                <li class="">
                    <a href="{{ route('event-types.index') }}"
                        class="{{ request()->routeIs('event-types.*') ? 'text-white bg-[' . $brand['bg-color'] . ']' : '' }}
                            flex items-center p-2 text-gray-900 hover:text-gray-100 rounded-lg dark:text-white hover:bg-blue-700 dark:hover:bg-gray-700 group">
                        <div
                            class="flex-shrink-0 w-8 h-5 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                            <i class="fa fa-lock"></i>
                        </div>
                        <span class="flex-1 ms-3 whitespace-nowrap">Event Types</span>
                    </a>
                </li>

                <hr>

                <li class="">
                    <a href="{{ route('transactions.index') }}"
                        class="{{ request()->routeIs('transactions.*') ? 'text-white bg-[' . $brand['bg-color'] . ']' : '' }}
                            flex items-center p-2 text-gray-900 hover:text-gray-100 rounded-lg dark:text-white hover:bg-blue-700 dark:hover:bg-gray-700 group">
                        <div
                            class="flex-shrink-0 w-8 h-5 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                            <i class="fa fa-exchange"></i>
                        </div>
                        <span class="flex-1 ms-3 whitespace-nowrap">Transactions</span>
                    </a>
                </li>



                <li class="">
                    <a href="{{ route('user-installments.index') }}"
                        class="{{ request()->routeIs('user-installments.*') ? 'text-white bg-[' . $brand['bg-color'] . ']' : '' }}
                            flex items-center p-2 text-gray-900 hover:text-gray-100 rounded-lg dark:text-white hover:bg-blue-700 dark:hover:bg-gray-700 group">
                        <div
                            class="flex-shrink-0 w-8 h-5 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                            <i class="fa fa-bank"></i>
                        </div>
                        <span class="flex-1 ms-3 whitespace-nowrap">Installment</span>
                    </a>
                </li>

                <li class="">
                    <a href="{{ route('pending-installments.request') }}"
                        class="{{ request()->routeIs('pending-installments.*') ? 'text-white bg-[' . $brand['bg-color'] . ']' : '' }}
                            flex items-center p-2 text-gray-900 hover:text-gray-100 rounded-lg dark:text-white hover:bg-blue-700 dark:hover:bg-gray-700 group">
                        <div
                            class="flex-shrink-0 w-8 h-5 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                            <i class="fa fa-credit-card-alt"></i>
                        </div>
                        <span class="flex-1 ms-3 whitespace-nowrap">Pending Request</span>
                        <span
                            class="inline-flex items-center justify-center w-3 h-3 p-3 text-sm font-medium text-yellow-700 bg-yellow-100 rounded-full ms-3 dark:bg-yellow-800 dark:text-yellow-2    00">
                            {{ Number::abbreviate(auth()->user()->statistics()['admin']['installment_requests'] ?? 0) }}
                        </span>
                    </a>
                </li>
            @endif


            <hr>

            @if (request()->user()->role == \App\Enum\UserRoleEnum::ADMIN ||
                    in_array(request()->user()?->activeRole(), [\App\Enum\UserRoleEnum::SUPERADMIN, \App\Enum\UserRoleEnum::ADMIN]))
                <li class="">
                    <a href="{{ route('messages.index') }}"
                        class="{{ request()->routeIs('messages.*') ? 'text-white bg-[' . $brand['bg-color'] . ']' : '' }}
                        flex items-center p-2 text-gray-900 hover:text-gray-100 rounded-lg dark:text-white hover:bg-blue-700 dark:hover:bg-gray-700 group">
                        <div
                            class="flex-shrink-0 w-8 h-5 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                            <i class="fa fa-comments"></i>
                        </div>
                        <span class="flex-1 ms-3 whitespace-nowrap">Messages</span>
                        <span
                            class="inline-flex items-center justify-center w-3 h-3 p-3 text-sm font-medium text-red-800 bg-red-100 rounded-full ms-3 dark:bg-red-900 dark:text-red-300">
                            {{ Number::abbreviate($unreadMessages ?? 0) }}
                        </span>
                    </a>
                </li>
            @else
                <li class="">
                    <a href="{{ route('fallback') }}"
                        class="{{ request()->routeIs('fallback.*') ? 'text-white bg-[' . $brand['bg-color'] . ']' : '' }}
                        flex items-center p-2 text-gray-900 hover:text-gray-100 rounded-lg dark:text-white hover:bg-blue-700 dark:hover:bg-gray-700 group">
                        <div
                            class="flex-shrink-0 w-8 h-5 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                            <i class="fa fa-comments"></i>
                        </div>
                        <span class="flex-1 ms-3 whitespace-nowrap">My Messages</span>
                        <span
                            class="inline-flex items-center justify-center w-3 h-3 p-3 text-sm font-medium text-red-800 bg-red-100 rounded-full ms-3 dark:bg-red-900 dark:text-red-300">
                            {{ Number::abbreviate(auth()->user()->statistics()['admin']['user']['unverified'] ?? 0) }}
                        </span>
                    </a>
                </li>
            @endif

            <li class="">
                <a href="{{ route('fallback') }}"
                    class="{{ request()->routeIs('fallback.*') ? 'text-white bg-[' . $brand['bg-color'] . ']' : '' }}
                        flex items-center p-2 text-gray-900 hover:text-gray-100 rounded-lg dark:text-white hover:bg-blue-700 dark:hover:bg-gray-700 group">
                    <div
                        class="flex-shrink-0 w-8 h-5 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                        <i class="fa fa-question-circle"></i>
                    </div>
                    <span class="flex-1 ms-3 whitespace-nowrap">Customer Support</span>
                </a>
            </li>



            <hr>

            <li class="">
                <a href="{{ route('fallback') }}"
                    class="{{ request()->routeIs('fallback.*') ? 'text-white bg-[' . $brand['bg-color'] . ']' : '' }}
                        flex items-center p-2 text-gray-900 hover:text-gray-100 rounded-lg dark:text-white hover:bg-blue-700 dark:hover:bg-gray-700 group">
                    <div
                        class="flex-shrink-0 w-8 h-5 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                        <i class="fa fa-user"></i>
                    </div>
                    <span class="flex-1 ms-3 whitespace-nowrap">Profile</span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('fallback') }}"
                    class="{{ request()->routeIs('fallback.*') ? 'text-white bg-[' . $brand['bg-color'] . ']' : '' }}
                        flex items-center p-2 text-gray-900 hover:text-gray-100 rounded-lg dark:text-white hover:bg-blue-700 dark:hover:bg-gray-700 group">
                    <div
                        class="flex-shrink-0 w-8 h-5 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                        <i class="fa fa-gear"></i>
                    </div>
                    <span class="flex-1 ms-3 whitespace-nowrap">Settings</span>
                </a>
            </li>

            <li>
                <form method="post" action="{{ route('logout') }}"
                    class="hover:bg-blue-700 dark:hover:bg-gray-700 text-gray-900 hover:text-gray-100 rounded-lg dark:text-white w-full">
                    @csrf
                    <button type="submit" class="w-100 py-2 flex items-center rounded-lg group">
                        <div
                            class="flex-shrink-0 w-8 h-5 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                            <i class='fa fa-sign-out'></i>
                        </div>
                        <span class="flex-1 pl-5 whitespace-nowrap">Logout</span>
                    </button>
                </form>
            </li>
        </ul>
        <!-- End of Sidebar Menu -->
    </div>
</aside>
