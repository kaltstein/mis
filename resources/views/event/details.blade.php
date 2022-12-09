@extends('layouts.app')

@section('content')

    <head>
        <link rel="stylesheet" href="{{ asset('summernote-0.8.18/summernote-lite.min.css') }}">
        <script src="{{ asset('summernote-0.8.18/summernote-lite.min.js') }}"></script>
    </head>
    <div class="bg-gray-100">
        <main class="sm:container sm:mx-auto p-5 ">
            <div class="flex">
                <div class="w-full">
                    <section class="flex flex-col break-words bg-white sm:border-1  sm:shadow-sm sm:shadow-lg">

                        <header class="font-semibold bg-slate-700 text-white py-5 px-6 sm:py-6 sm:px-8 ">
                            <i class="fa-solid fa-pen"></i> {{ __('EDIT EVENT') }}
                        </header>

                        @if ($errors->any())
                            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                                role="alert">

                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        @if (session('success'))
                            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                                role="alert">
                                <i class="fa-solid fa-circle-check"></i> <span class="font-medium">
                                    {{ session('success') }}</span>
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                                role="alert">
                                <i class="fa-solid fa-xmark"></i> <span class="font-medium">Error !</span>
                                {{ session('error') }}
                            </div>
                        @endif

                        <form class="w-full px-6 py-3 " method="POST" action="{{ route('event.update') }}">
                            @csrf
                            <div class="grid gap-6 mb-6 md:grid-cols-1">
                                <input type="hidden" name="event_id" value="{{ $event_details->id }}">
                                <div>
                                    <div class="flex flex-wrap">
                                        <label for="title" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                            {{ __('Event Title') }} <span class="text-red-500">*</span>
                                        </label>

                                        <input id="title" type="text"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('email')  @enderror"
                                            name="title" value="{{ $event_details->title }}" required autocomplete="email"
                                            autofocus>

                                        @error('email')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                </div>


                                <div>
                                    <label for="venue"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Venue</label>
                                    <input type="text" id="venue" name="venue" value="{{ $event_details->venue }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Seminar">
                                </div>
                                <div>
                                    <label for="address"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address
                                        <span class="text-red-500">*</span></label>
                                    <input type="text" id="address" name="address"
                                        value="{{ $event_details->address }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="" required>
                                </div>

                                <div>
                                    <label for="date_schedule"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date
                                        <span class="text-red-500">*</span></label>

                                    <input id="date_schedule"
                                        class="cursor-pointer  md:w-1/4 sm:w-full text-gray-900 bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        type="text" name="date_schedule"
                                        value="{{ $event_details->from . ' to ' . $event_details->to }}" />

                                </div>

                                <div>
                                    <label for="content"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Post
                                        Description <span class="text-red-500">*</span></label>
                                    <textarea id="content" rows="4" name="content"
                                        class=" block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                                        placeholder="Your content...">{{ $event_details->content }}</textarea required>
                                </div>

                                <div>
                                    <label for="content"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Is this featured?
                                     <span class="text-red-500">*</span></label>
                                    <label class="inline-flex relative items-center mb-4 cursor-pointer">
                                        <input type="checkbox" value="1" class="sr-only peer" name="featured"  {{ $event_details->featured == '1' ? 'checked' : '' }}>
                                        <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                     
                                      </label>
                                </div>
                               

                                <div>
                                    <label for="content"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Publish?
                                     <span class="text-red-500">*</span></label>
                                    <label class="inline-flex relative items-center mb-4 cursor-pointer">
                                        <input type="checkbox" value="1" class="sr-only peer" name="status" {{ $event_details->status == '1' ? 'checked' : '' }}>
                                        <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                     
                                      </label>
                                </div>

                                <div>
                                    <label for="remarks"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Remarks
                                    </label>
                                    <textarea rows="4" type="text" id="remarks" name="remarks"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Additional Information">{{ $event_details->remarks }}</textarea>
                                </div>

                                <div class="flex flex-wrap py-3">
                                    <button type="submit"
                                        class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-800 hover:bg-blue-700 sm:py-4">
                                        <i class="fa-solid fa-floppy-disk"></i> {{ __('SAVE') }}
                                    </button>

                                </div>
                        </form>

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
