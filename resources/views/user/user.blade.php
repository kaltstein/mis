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


            <table id="users_tbl"
                class=" hover w-full text-xs md:text-sm hover:cursor-pointer   text-gray-500 shadow-md row-border no-wrap"
                width="100%">
                <thead class="text-white bg-gray-700"></thead>
            </table>

        </div>
    </main>
    <script>
        $(document).ready(function() {
            $('.user-nav').removeClass('text-gray-700');
            $('.user-nav').addClass('text-blue-500');

            var users_tbl = $('#users_tbl').DataTable({

                scrollX: true,
                scrollY: true,
                ajax: "{{ route('user.list') }}",
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
                        data: 'full_name',
                        title: 'FULL NAME',
                        render: function(data, type) {

                            return '<span class="text-gray-700 font-bold">' + data + '</span>';

                        }

                    },
                    {
                        data: 'role',
                        title: 'ROLE',
                        render: function(data, type) {

                            if (data == 'admin') {
                                return '<span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">' +
                                    data + '</span>'
                            } else {
                                return '<span class="bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">' +
                                    data + '</span>';
                            }

                        }

                    },
                    {
                        data: 'gender',
                        title: 'GENDER',
                    },
                    {
                        data: 'contact_no',
                        title: 'CONTACT NO.',
                    },
                    {
                        data: 'email',
                        title: 'EMAIL',
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
                        data: 'edit',
                        title: 'ACTION',
                        className: 'dt-right',
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
