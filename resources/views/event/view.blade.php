@extends('layouts.app')

@section('content')
    <div class="bg-gray-100">
        <main class="container mx-auto md:w-3/5 mt-3 ">
            <div class="flex">
                <div class="w-full">
                    <section class="">

                        <div class="text-center ">
                            <h1 class="text-4xl font-extrabold text-cyan-600 font-serif">
                                {{ $event_details->title }}
                            </h1>
                            <span class="font-semibold text-gray-700 uppercase">{{ $event_details->venue }}</span>
                            <br>


                            <small class="font-semibold uppercase">{{ $event_details->address }}</small>
                            <br><br>
                            <div class="italic">
                                @if (\Carbon\Carbon::parse($event_details->from)->format('m/d/Y') ==
                                    \Carbon\Carbon::parse($event_details->to)->format('m/d/Y'))
                                    <small class="font-semibold">
                                        {{ \Carbon\Carbon::parse($event_details->from)->format('M d, Y g:i A') }}
                                        -
                                        {{ \Carbon\Carbon::parse($event_details->to)->format('g:i A') }}</small>
                                @else
                                    <small class="font-semibold">
                                        {{ \Carbon\Carbon::parse($event_details->from)->format(' M d, Y g:i A') }} -
                                        {{ \Carbon\Carbon::parse($event_details->to)->format(' M d, Y g:i A') }}</small>
                                @endif
                            </div>

                        </div>

                        <div class="bg-orange-500 border-b-2 border-orange-500 my-2 w-3/4 mx-auto"></div>

                        <section>
                            <div class="content">
                                {!! $event_details->content !!}
                            </div>
                        </section>

                        <footer class="py-5">
                            <h1 class="text-cyan-600 font-extrabold text-xl font-serif text-center">MOST RECENT</h1>
                            <div class="bg-orange-500 border-b-2 border-orange-500 my-2 w-1/4 mx-auto"></div>

                            <div class="grid grid-cols-2 gap-4 my-5 ">

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
                                                    {{ \Carbon\Carbon::parse($recent->from)->format(' M d, Y g:i A') }}
                                                    -
                                                    {{ \Carbon\Carbon::parse($recent->to)->format(' M d, Y g:i A') }}</small>
                                            @endif

                                            <a href="{{ route('event.show', $recent->id) }}">
                                                <h5
                                                    class=" text-xl font-bold text-cyan-600 hover:text-orange-500 tracking-tight  dark:text-white">
                                                    {{ $recent->title }}</h5>
                                            </a>
                                            <small class="font-semibold">{{ $recent->venue }}</small>

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
                                    <h3 class="text-xl text-center text-gray-700">NO POST AVAILABLE</h3>
                                    <h3 class="text-xl text-center text-gray-700">NO POST AVAILABLE</h3>
                                @endforelse
                            </div>
                        </footer>



                    </section>
                </div>
            </div>
        </main>
    </div>
    <script>
        $(document).ready(function() {

            $('.event-nav').addClass('text-blue-500');
            // var start = moment();
            // var end = moment();

            var date = $('#date_schedule').val();
            var dateArray = date.split("to");

            $('#date_schedule').daterangepicker({
                timePicker: true,
                startDate: moment(dateArray[0]).format('MMM DD, YYYY hh:mm: A'),
                endDate: moment(dateArray[1]).format('MMM DD, YYYY hh:mm: A'),
                locale: {
                    format: 'MMM DD, YYYY hh:mm A'
                }
            });


            $('#content').summernote({
                placeholder: 'Post content here.',
                tabsize: 2,
                height: 600,
                dialogsInBody: true,

                toolbar: [
                    //FONTS
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph', 'style']],
                    ['height', ['height']],
                    //INSERTS
                    ['insert', ['link', 'picture', 'video', 'table', 'hr']],
                    ['view', ['codeview', 'help']],
                ]

            });



        });
    </script>
@endsection
