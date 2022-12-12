<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.4/dist/flowbite.min.css" />
    <link rel="stylesheet" href="{{ asset('data-table/datatables.min.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <script src="{{ asset('moment-js/moment.js') }}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <!-- Styles -->
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    <div id="app">
        <header class="">

            <nav class="px-2 py-3 bg-slate-800 border-gray-200 dark:bg-gray-900 dark:border-gray-700 shadow-md">
                <div class="container flex flex-wrap items-center justify-between mx-auto">
                    <a href="{{ route('home') }}" class="flex items-center">
                        <img src="{{ asset('images/sk.png') }}" class="h-6 mr-3 sm:h-10" alt="Flowbite Logo" />
                        <span
                            class="self-center text-xl font-semibold whitespace-nowrap dark:text-white text-white">Youth
                            Profiling
                            System</span>
                    </a>
                    <button data-collapse-toggle="navbar-dropdown" type="button"
                        class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                        aria-controls="navbar-dropdown" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
                        <ul
                            class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                            <li>
                                <a href="{{ route('home') }}"
                                    class="home-nav block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"><i
                                        class="fa-solid fa-house"></i> HOME

                                </a>
                            </li>

                            @if (Auth::check())
                                @if (Auth::user()->role == 'admin')
                                    <li>
                                        <a href="{{ route('dashboard') }}"
                                            class="dashboard-nav block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                                            <i class="fa-solid fa-chart-simple"></i> DASHBOARD
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('event') }}"
                                            class="event-nav block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                                            <i class="fa-solid fa-calendar-days"></i> EVENTS
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user') }}"
                                            class="user-nav block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"><i
                                                class="fa-solid fa-users"></i> USERS
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('about_us') }}"
                                            class="about_us-nav block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                                            <i class="fa-solid fa-address-card"></i> ABOUT US
                                        </a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ route('user.profile') }}"
                                            class="profile-nav block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"><i
                                                class="fa-solid fa-user-gear"></i> MY
                                            PROFILE
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('about_us') }}"
                                            class="about_us-nav block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                                            <i class="fa-solid fa-address-card"></i> ABOUT US
                                        </a>
                                    </li>
                                @endif
                                <li>
                                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                                        class="flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-gray-400 dark:hover:text-white dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent"><i
                                            class="fa-solid fa-circle-user fa-xl"></i>
                                        <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg></button>
                                    <!-- Dropdown menu -->

                                    <div id="dropdownNavbar"
                                        class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded shadow w-60 dark:bg-gray-700 dark:divide-gray-600">
                                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-400"
                                            aria-labelledby="dropdownLargeButton">
                                            <div class="p-3">

                                                <p
                                                    class="text-base font-semibold leading-none text-gray-900 dark:text-white">
                                                    <a class="font-bold"
                                                        href="{{ route('user.profile') }}">{{ Auth::user()->full_name }}</a>
                                                </p>
                                                <p class="mb-3 text-sm font-normal">
                                                    <a href="#"
                                                        class="hover:underline">{{ Auth::user()->email }}</a>
                                                </p>
                                                <p class="mb-4 text-sm font-light">{{ Auth::user()->address }}
                                                </p>
                                                {{-- <ul class="flex text-sm font-light">
                                                    <li class="mr-2">
                                                        <a href="#" class="hover:underline">
                                                            <span
                                                                class="font-semibold text-gray-900 dark:text-white">799</span>
                                                            <spa>Following</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="hover:underline">
                                                            <span
                                                                class="font-semibold text-gray-900 dark:text-white">3,758</span>
                                                            <span>Followers</span>
                                                        </a>
                                                    </li>
                                                </ul> --}}
                                            </div>
                                            <li>
                                                <a href="{{ route('user.profile') }}"
                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><i
                                                        class="fa-solid fa-user-gear"></i> My
                                                    Profile</a>
                                            </li>
                                        </ul>
                                        <div class="">
                                            <a href="{{ route('logout') }}"
                                                class=" logout-nav block px-4 py-2 text-sm text-red-600 hover:font-bold hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white"
                                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"><i
                                                    class="fa-solid fa-power-off"></i> {{ __('Logout') }}</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="hidden">
                                                {{ csrf_field() }}
                                            </form>
                                        </div>
                                    </div>

                                </li>
                            @else
                                <li>
                                    <a href="{{ route('about_us') }}"
                                        class="about_us-nav block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                                        <i class="fa-solid fa-address-card"></i> ABOUT US
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('event') }}"
                                        class="event-nav block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                                        <i class="fa-solid fa-right-to-bracket"></i> LOGIN
                                    </a>
                                </li>
                            @endif


                        </ul>
                    </div>
                </div>
            </nav>

        </header>

        @yield('content')


    </div>

    <script src="{{ asset('data-table/datatables.min.js') }}"></script>
    <script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>


</body>

</html>
