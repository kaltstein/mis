@extends('layouts.app')

@section('content')
    <main class="container mx-auto md:w-3/5 mt-3">

        <div class="grid md:grid-cols-2  sm:grid-cols-1 gap-3 justify-items-center">
            <div class="w-full"> <canvas id="gender" width="25" height="25"></canvas></div>
            <div class="w-full"> <canvas id="civil_status" width="25" height="25"></canvas></div>
            <div class="gender">
                <input type="hidden" id="male_count" value="{{ $gender->male }}">
                <input type="hidden" id="female_count" value="{{ $gender->female }}">

            </div>

            <div class="civil_status">
                <input type="hidden" id="single_count" value="{{ $civil_status->single }}">
                <input type="hidden" id="married_count" value="{{ $civil_status->married }}">
                <input type="hidden" id="live_in_count" value="{{ $civil_status->live_in }}">
                <input type="hidden" id="civil_status_other_count" value="{{ $civil_status->other }}">
            </div>

        </div>
        <div class="grid md:grid-cols-4 sm:grid-cols-1 ">

            <div class="w-full"> <canvas id="enrolled" width="25" height="25"></canvas></div>
            <div class="w-full"> <canvas id="solo_parent" width="25" height="25"></canvas></div>
            <div class="w-full"> <canvas id="pwd" width="25" height="25"></canvas></div>
            <div class="w-full"> <canvas id="lgbtq" width="25" height="25"></canvas></div>


            <div class="enrolled">
                <input type="hidden" id="enrolled_count" value="{{ $enrolled->enrolled }}">
                <input type="hidden" id="not_enrolled_count" value="{{ $enrolled->not_enrolled }}">
            </div>

            <div class="solo_parent">
                <input type="hidden" id="solo_parent_count" value="{{ $solo_parent->solo_parent }}">
                <input type="hidden" id="not_solo_parent_count" value="{{ $solo_parent->not_solo_parent }}">
            </div>
            <div class="pwd">
                <input type="hidden" id="pwd_count" value="{{ $pwd->pwd }}">
                <input type="hidden" id="not_pwd_count" value="{{ $pwd->not_pwd }}">
            </div>
            <div class="lgbtq">
                <input type="hidden" id="lgbtq_count" value="{{ $lgbtq->lgbtq }}">
                <input type="hidden" id="not_lgbtq_count" value="{{ $lgbtq->not_lgbtq }}">
            </div>
        </div>


    </main>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>

    <script>
        $(document).ready(function() {
            $('.dashboard-nav').removeClass('text-gray-700');
            $('.dashboard-nav').addClass('text-blue-500');


            const gender_canvas = document.getElementById('gender');
            const gender_labels = ['Male', 'Female'];
            const gender_data = [
                parseInt($('#male_count').val()),
                parseInt($('#female_count').val())
            ];
            const gender_bg_color = [
                'rgb(52, 134, 235)',
                'rgb(255, 77, 237)',
            ]

            pieChart(gender_canvas, gender_labels, gender_data, gender_bg_color, 'Gender');

            //CIVIL STATUS
            const civil_status_canvas = document.getElementById('civil_status');
            const civil_status_labels = ['Single', 'Married', 'Live In', 'Other'];
            const civil_status_data = [
                parseInt($('#single_count').val()),
                parseInt($('#married_count').val()),
                parseInt($('#live_in_count').val()),
                parseInt($('#civil_status_other_count').val())
            ];
            const civil_status_bg_color = [
                'rgb(12, 127, 166)',
                'rgb(52, 134, 235)',
                'rgb(222, 181, 0)',
                'rgb(101, 0, 224)',
            ]

            pieChart(civil_status_canvas, civil_status_labels, civil_status_data, civil_status_bg_color,
                'Civil Status');

            //ENROLLED
            const enrolled_canvas = document.getElementById('enrolled');
            const enrolled_labels = ['YES', 'NO'];
            const enrolled_data = [
                parseInt($('#enrolled_count').val()),
                parseInt($('#not_enrolled_count').val()),

            ];
            const enrolled_bg_color = [
                'rgb(22, 189, 0)',
                'rgb(219, 29, 92)',
            ]

            pieChart(enrolled_canvas, enrolled_labels, enrolled_data, enrolled_bg_color,
                'Enrolled');

            //SOLO PARENT
            const solo_parent_canvas = document.getElementById('solo_parent');
            const solo_parent_labels = ['YES', 'NO'];
            const solo_parent_data = [
                parseInt($('#solo_parent_count').val()),
                parseInt($('#not_solo_parent_count').val()),

            ];
            const solo_parent_bg_color = [
                'rgb(22, 189, 0)',
                'rgb(219, 29, 92)',
            ]

            pieChart(solo_parent_canvas, solo_parent_labels, solo_parent_data,
                solo_parent_bg_color,
                'Solo Parent');

            //PWD
            const pwd_canvas = document.getElementById('pwd');
            const pwd_labels = ['YES', 'NO'];
            const pwd_data = [
                parseInt($('#pwd_count').val()),
                parseInt($('#not_pwd_count').val()),

            ];
            const pwd_bg_color = [
                'rgb(22, 189, 0)',
                'rgb(219, 29, 92)',
            ]

            pieChart(pwd_canvas, pwd_labels, pwd_data,
                pwd_bg_color,
                'PWD');

            //LGBTQ

            const lgbtq_canvas = document.getElementById('lgbtq');
            const lgbtq_labels = ['YES', 'NO'];
            const lgbtq_data = [
                parseInt($('#lgbtq_count').val()),
                parseInt($('#not_lgbtq_count').val()),

            ];
            const lgbtq_bg_color = [
                'rgb(22, 189, 0)',
                'rgb(219, 29, 92)',
            ]

            pieChart(lgbtq_canvas, lgbtq_labels, lgbtq_data,
                lgbtq_bg_color,
                'LGBTQ+');

            function pieChart(canvas, chart_labels, chart_data, chart_bg_color, chart_title) {

                const config = {
                    type: 'pie',
                    data: {
                        labels: chart_labels,
                        datasets: [{
                            label: '',
                            data: chart_data,
                            backgroundColor: chart_bg_color,

                        }]
                    },
                    options: {
                        responsive: true,
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: chart_title,
                        },
                        plugins: {

                            datalabels: {
                                formatter: (value, canvas) => {

                                    let sum = 0;
                                    let dataArr = canvas.chart.data.datasets[0].data;
                                    dataArr.map(data => {
                                        sum += data;
                                    });
                                    let percentage = (value * 100 / sum).toFixed(2) + "%";


                                    if (value != 0) {
                                        return percentage;

                                    }



                                },
                                color: '#fff',
                            }


                        },

                    }
                }
                const gender = new Chart(
                    canvas,
                    config
                );
            }


        });
    </script>
@endsection
