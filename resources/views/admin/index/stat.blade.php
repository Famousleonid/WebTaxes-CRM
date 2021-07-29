@extends('admin.master')

@section('links')
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css"/>
    <style>

    </style>
@endsection


@section('content')


    <div class="container mt-4 bg-white shadow firm-border">  {{-- #f6931f--}}

        <div class=" border-bottom p-4">
            <div class="row p-2 mb-2">
                <b>Date range: &nbsp;&nbsp;&nbsp;<span style="color:#FF8800; font-weight: bold; font-size: 1.2rem" id="amount"></span></b>
            </div>
            <div id="slider-range"></div>
        </div>

        <div class="card row">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <canvas id="canvas" height="280" width="600"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div id="mainDiv" class="container card shadow firm-border bg-white mt-2 collapsed-card">            {{--collapsed-card --}}

            <div class="card-header">
                <span class="text-primary text-bold text-lg">&nbsp;&nbsp;&nbsp; + / - </span><span> on the right to "open/close" the detailed table</span>

                <div class="card-tools">
                    <button id="tt" type="button" class="btn" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-plus text-primary"></i></button>
                </div>

            </div>

            <div class="card-body">

                <h5> Visits ( {{$visits->count()}} ) pieces</h5>

                <table id="show-stat" class="table-sm table-bordered table-hover table-striped bg-white w-100">
                    <thead>
                    <tr>
                        <th class="text-center" data-orderable="false">№</th>
                        <th>name</th>
                        <th>page</th>
                        <th>ip</th>
                        <th>country</th>
                        <th>city</th>
                        <th>platform</th>
                        <th>device</th>
                        <th>date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($visits as $visit)
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td>{{$visit->name}}</td>
                            <td>{{$visit->page}}</td>
                            <td>{{$visit->ip}}</td>
                            <td>{{$visit->country}}</td>
                            <td>{{$visit->city}}</td>
                            <td>{{$visit->platform}}</td>
                            <td>{{$visit->device_type}}</td>
                            <td><span style="display: none">{{$visit->created_at->format('Ymd')}}</span>{{$visit->created_at->format('d.m.Y')}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection

@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        // document.addEventListener('DOMContentLoaded', function () {

        let oTable = $('#show-stat').DataTable({
            "fixedHeader": true,
            "scrollY": ($(window).height() - 320),
            "scrollCollapse": true,
            "paging": false,
            "ordering": true,
            "info": false,
            // "order": [[ 8, "desc" ]],
        });

        let ctx = document.getElementById("canvas").getContext("2d");

        let period = @json($period);
        let current_period = 30

        let datemin = 0;
        let datemax = datemin + period - 1;
        let setMin = datemax - current_period
        if (setMin < 0) {
            let setMin = datemax;
        }

        let xDay = @json($day);
        let main = {{$main}};
        let price = {{$price}};
        let how_it_work = {{$how_it_work}};
        let faq = {{$faq}};
        let cabinet = {{$cabinet}};
        let profile = {{$profile}};
        let payment = {{$payment}};
        let report = {{$report}};

        let barChartData = {
            labels: xDay.slice(setMin, datemax),
            datasets: [
                {
                    label: 'Main',
                    backgroundColor: "pink",
                    borderColor: '#007BFF',
                    data: main.slice(setMin, datemax),
                    fill: false,
                },
                {
                    label: 'Price',
                    backgroundColor: "ping",
                    borderColor: 'red',
                    data: price.slice(setMin, datemax),
                    fill: false,
                },
                {
                    label: 'How it work',
                    backgroundColor: "ping",
                    borderColor: '#BA55D3',
                    data: how_it_work.slice(setMin, datemax),
                    fill: false,
                },
                {
                    label: 'F&Q',
                    backgroundColor: "ping",
                    borderColor: '#008080',
                    data: faq.slice(setMin, datemax),
                    fill: false,
                },
                {
                    label: 'Cabinet',
                    backgroundColor: "ping",
                    borderColor: 'green',
                    data: cabinet.slice(setMin, datemax),
                    fill: false,
                },
                {
                    label: 'Profile',
                    backgroundColor: "ping",
                    borderColor: '#0FC0FC',
                    data: profile.slice(setMin, datemax),
                    fill: false,
                },
                {
                    label: 'Payment',
                    backgroundColor: "ping",
                    borderColor: '#FF9564',
                    data: payment.slice(setMin, datemax),
                    fill: false,
                },
                {
                    label: 'report',
                    backgroundColor: "ping",
                    borderColor: 'grey',
                    data: report.slice(setMin, datemax),
                    fill: false,
                },
            ]
        };

        $(function () {
            $("#slider-range").slider({
                range: true,
                animate: "slow",
                min: datemin,
                max: datemax,
                step: 1,
                values: [setMin, datemax],
                slide: function (event, ui) {

                    $("#amount").text(xDay[ui.values[0]] + " - " + xDay[ui.values[1]]);

                    ichart.data.labels = xDay.slice(ui.values[0], ui.values[1])
                    ichart.data.datasets[0].data = main.slice(ui.values[0], ui.values[1])
                    ichart.data.datasets[1].data = price.slice(ui.values[0], ui.values[1])
                    ichart.data.datasets[2].data = how_it_work.slice(ui.values[0], ui.values[1])
                    ichart.data.datasets[3].data = faq.slice(ui.values[0], ui.values[1])
                    ichart.data.datasets[4].data = cabinet.slice(ui.values[0], ui.values[1])
                    ichart.data.datasets[5].data = profile.slice(ui.values[0], ui.values[1])
                    ichart.data.datasets[6].data = payment.slice(ui.values[0], ui.values[1])
                    ichart.data.datasets[7].data = report.slice(ui.values[0], ui.values[1])

                    ichart.update();
                }
            });
            $("#amount").text(xDay[$("#slider-range").slider("values", 0)] + " - " + xDay[$("#slider-range").slider("values", 1)]);

        });

        let ichart = new Chart(ctx, {
            type: 'line',
            data: barChartData,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: '#c1c1c1',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Pages Visit'
                },
                legend: {
                    display: true,
                    position: 'left',
                },
                tooltips: {
                    enabled: true,
                },
            },
        });

        [
            // ichart.getDatasetMeta(0),
            ichart.getDatasetMeta(1),
            ichart.getDatasetMeta(2),
            ichart.getDatasetMeta(3),
            ichart.getDatasetMeta(4),
            ichart.getDatasetMeta(5),
            ichart.getDatasetMeta(6),
            ichart.getDatasetMeta(7),
        ]
            .forEach(function (meta) {
                meta.hidden = meta.hidden === null ? !ichart.data.datasets[0].hidden : null;
            });

        ichart.update();

        // });
    </script>
@endsection


