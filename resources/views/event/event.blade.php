@extends('layouts.app')

@section('content')
    <style>
        .dataTables_filter {
            margin-bottom: 8px;
        }
    </style>
    <main class="sm:container sm:mx-auto sm:mt-10">
        <div class="w-full sm:px-6">

            @if (session('status'))
                <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4"
                    role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Modal toggle -->
            <a href="{{ route('event.new') }}"
                class="m-3 float-right block text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                type="button">
                <i class="fa-solid fa-calendar-plus"></i> CREATE EVENT
            </a>

            <table id="events_tbl"
                class=" hover w-full text-xs md:text-sm hover:cursor-pointer   text-gray-500 shadow-md row-border no-wrap"
                width="100%">
                <thead class="text-white bg-gray-700"></thead>
            </table>

        </div>





    </main>
    <script>
        $(document).ready(function() {
            $('.event-nav').addClass('text-blue-500');
            $('.event-nav').removeClass('text-gray-700');
            var events_tbl = $('#events_tbl').DataTable({

                scrollX: true,
                scrollY: true,
                ajax: "{{ route('event.list') }}",
                // colReorder: true,

                // processing: true,
                // serverSide: true,

                "lengthChange": false,
                "pageLength": 15,
                columns: [{
                        data: 'id',
                        title: 'ID',
                        className: 'dt-right',

                    },

                    {
                        data: 'title',
                        title: 'TITLE',
                        render: function(data, type) {

                            return '<span class="text-gray-700 font-bold">' + data + '</span>';

                        }

                    },
                    {
                        data: 'venue',
                        title: 'VENUE'

                    },
                    {
                        data: 'address',
                        title: 'ADDRESS',
                    },
                    {
                        data: null,
                        title: 'DATE SCHEDULED',
                        className: 'dt-right',
                        render: function(data, type) {

                            if (data != null) {
                                return '<span class="font-bold">' + moment(data.from).format(
                                        'MMM DD, YYYY h:mm A') + ' - ' +
                                    moment(data.to).format('MMM DD, YYYY h:mm A'); + '</span>'
                            } else {
                                return "";
                            }

                        }
                    },
                    {
                        data: 'status',
                        title: 'STATUS',
                    },
                    {
                        data: 'created_at',
                        title: 'CREATED AT',
                        className: 'dt-right',
                        render: function(data, type) {

                            if (data != null) {
                                return moment(data).format('MMM DD, YYYY');
                            } else {
                                return "";
                            }

                        }
                    },
                    {
                        data: 'action',
                        title: 'VIEW',
                        className: 'dt-center',
                    },



                ],
                "columnDefs": [{
                    "targets": [1, 2],
                    "orderable": false
                }]
            });




        });
    </script>
@endsection
