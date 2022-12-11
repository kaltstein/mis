@extends('layouts.app')

@section('content')
    <style>
        body {
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>

    <body class="bg-cover bg-center"
        style="background-image: radial-gradient(ellipse at top, rgb(31, 31, 31), transparent),url({{ asset('images/index_bg.jpeg') }})">



        <main class="container mx-auto md:w-3/5 mt-3">




            @if (session('status'))
                <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4"
                    role="alert">
                    {{ session('status') }}
                </div>
            @endif


            {{-- <form class="flex items-center">
            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input type="text" id="simple-search"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search" required>
            </div>
            <button type="submit"
                class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-500 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <span class="sr-only">Search</span>
            </button>
        </form> --}}

            <h1 class="mb-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-4xl lg:text-6xl"><span
                    class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400 shadow-md">FEATURED
                    EVENT</span>
            </h1>

            <div class="grid grid-cols-1">

                @forelse ($featureds as $featured)
                    <div
                        class=" bg-white border-2 border-cyan-500 shadow-md dark:bg-gray-800 dark:border-gray-700 p-1 hover:-translate-y-1 hover:scale-100  duration-300 hover:cursor-pointer   hover:shadow-2xl">
                        <a href="#">
                            <img class="rounded-t-lg" src="/docs/images/blog/image-1.jpg" alt="" />
                        </a>
                        <div class="p-3">
                            @if (\Carbon\Carbon::parse($featured->from)->format('m/d/Y') ==
                                \Carbon\Carbon::parse($featured->to)->format('m/d/Y'))
                                <small class="font-semibold">
                                    {{ \Carbon\Carbon::parse($featured->from)->format('M d, Y g:i A') }}
                                    -
                                    {{ \Carbon\Carbon::parse($featured->to)->format('g:i A') }}</small>
                            @else
                                <small class="font-semibold">
                                    {{ \Carbon\Carbon::parse($featured->from)->format(' M d, Y g:i A') }} -
                                    {{ \Carbon\Carbon::parse($featured->to)->format(' M d, Y g:i A') }}</small>
                            @endif
                            <small class="float-right text-red-500"><i class="fa-solid fa-heart fa-xl"></i></small>

                            <a href="{{ route('event.show', $featured->id) }}">
                                <h5
                                    class=" text-xl font-bold text-cyan-600 hover:text-orange-500 tracking-tight  dark:text-white">
                                    {{ $featured->title }}</h5>
                            </a>
                            <small class="font-semibold">{{ $featured->venue }}</small>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 tracking-wide">
                                {{ $featured->address }}
                            </p>

                            <a href="{{ route('event.show', $featured->id) }}"
                                class="float-right mb-2 inline-flex items-center px-3 py-2 text-xs font-medium text-center text-white bg-blue-500  hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                READ MORE
                                <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </a>

                            {{-- <a href="#"
                            class="float-right mb-2 inline-flex items-center  px-3 py-2 text-xs font-medium text-center text-white bg-orange-500  hover:bg-orange-400 focus:ring-4 focus:outline-none focus:ring-orange-300 dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">
                            <i class="fa-regular fa-star"></i>&nbsp;Interested (11)

                        </a> --}}
                        </div>
                    </div>
                @empty
                    <h3 class="text-xl text-center text-white">NO POST AVAILABLE</h3>
                @endforelse
            </div>
            <br>
            <h3 class="font-extrabold text-2xl text-white pb-3 tracking-wider shadow-md"> UPCOMING</h3>

            <div class="grid grid-cols-2 gap-4 ">

                @forelse ($most_recents as $recent)
                    <div
                        class="max-w-lg bg-white border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 hover:-translate-y-1 hover:scale-100  duration-300 hover:cursor-pointer   hover:shadow-2xl">
                        <a href="#">
                            <img class="rounded-t-lg" src="/docs/images/blog/image-1.jpg" alt="" />
                        </a>
                        <div class="p-3">
                            @if (\Carbon\Carbon::parse($recent->from)->format('m/d/Y') == \Carbon\Carbon::parse($recent->to)->format('m/d/Y'))
                                <small class="font-semibold">
                                    {{ \Carbon\Carbon::parse($recent->from)->format('M d, Y g:i A') }}
                                    -
                                    {{ \Carbon\Carbon::parse($recent->to)->format('g:i A') }}</small>
                            @else
                                <small class="font-semibold">
                                    {{ \Carbon\Carbon::parse($recent->from)->format(' M d, Y g:i A') }} -
                                    {{ \Carbon\Carbon::parse($recent->to)->format(' M d, Y g:i A') }}</small>
                            @endif

                            <a href="{{ route('event.show', $recent->id) }}">
                                <h5
                                    class=" text-xl font-bold text-cyan-600 hover:text-orange-500 tracking-tight  dark:text-white">
                                    {{ $recent->title }}</h5>
                            </a>
                            <small class="font-semibold">{{ $recent->venue }}</small>
                            <p class=" font-normal text-gray-700 dark:text-gray-400 tracking-wide">
                                {{ $recent->address }}
                            </p>

                            <div class="py-3">
                                <a href="{{ route('event.show', $recent->id) }}"
                                    class="float-right mb-2 inline-flex items-center px-3 py-2 text-xs font-medium text-center text-white bg-blue-500  hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    READ MORE
                                    <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </a>

                                {{-- <a href="#"
                                class="float-right mb-2 inline-flex items-center  px-3 py-2 text-xs font-medium text-center text-white bg-orange-500  hover:bg-orange-400 focus:ring-4 focus:outline-none focus:ring-orange-300 dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">
                                <i class="fa-regular fa-star"></i>&nbsp;Interested (11)

                            </a> --}}
                            </div>
                        </div>
                    </div>
                @empty
                    <h3 class="text-xl text-center text-white">NO POST AVAILABLE</h3>
                    <h3 class="text-xl text-center text-white">NO POST AVAILABLE</h3>
                @endforelse


            </div>

        </main>
    </body>
    <script>
        $(document).ready(function() {
            $('.home-nav').removeClass('text-gray-700');
            $('.home-nav').addClass('text-blue-500');
        });
    </script>
@endsection
