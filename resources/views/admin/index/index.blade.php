@extends('admin.master')

@section('links')
    <link rel="stylesheet" href="{{asset('assets/plugins/fullcalendar/main.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/plugins/jquery.datetimepicker.min.css')}}"/>

    <style>
        #calendar .fc-day-today {
            background-color: #DEDEDE;
            border: 1px solid #0FC0FC;
        }

        #calendar .fc-day:hover {
            background-color: #D7DDFF;
        }

        #calendar .fc-day-sun {
            color: #A90000;
        }

        .shadowWin {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            z-index: 10;
            background: rgba(0, 0, 0, 0.7);
            display: none;

        }

        .modalEvent, .modalDelete {
            position: absolute;
            top: 200px;
            left: 35%;
            width: 550px;
            height: 380px;
            z-index: 20;
            margin: auto;
            display: none;
            line-height: 1.25;
            text-align: center;
            text-decoration: none;
            text-indent: 0;
            background: white;
            border: 2px solid #fff;
            -webkit-border-radius: 26px;
            -moz-border-radius: 26px;
            -o-border-radius: 26px;
            -ms-border-radius: 26px;
            -moz-box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);
            -webkit-box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);
            box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);
        }

        .modalDelete {
            height: 280px;
        }

        .popup-close {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 24px;
        }

        a .popup-close {
            text-decoration: none;
        !important;
        }

        .popup-close:hover {
            color: #490404;
        }


        .color_input {
            margin-right: 30px;
        }


    </style>

@endsection

@section('content')

    {{--    <!-- Content Header (Виджеты на главной) -->--}}
    <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">

                        <div class="col-lg-3 col-6 ">
                            <!-- small box -->
                            <div class="small-box bg-info shadow">
                                <div class="inner">
                                    <h3>{{$firmCount}}</h3>
                                    <p>Number of organizations</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="{{route('firm.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success shadow">
                                <div class="inner">
                                    <h3>{{$visit}}<sup style="font-size: 20px"></sup></h3>

                                    <p>views per day {{ now()->format('d.M') }}</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="{{route('admin.stat')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning shadow">
                                <div class="inner">
                                    <h3>{{$userCount}}</h3>
                                    <p>User Registrations</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="{{route('user.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger shadow">
                                <div class="inner">
                                    <h3>{{$useronline}}</h3>
                                    <p>Quantity Now online</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="{{route('user.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                    </div>
                </div><!-- /.container-fluid -->

    </section>

    {{--   Calendar  ------------------------------------------------------------}}
    <div class="container firm-border bg-white shadow mb-5">
        <div class="response"></div>
        <div id='calendar'></div>
    </div>

    {{--   Calendar  Modal  ADD -------------------------------------------------------}}
    <div class="shadowWin"></div>
    <div class="modalEvent" id="eventModal">
        <div class="modal-header">
            <h5>ADD event</h5><br>
            <a class="popup-close" href="#">x</a>
        </div>

        <div class="form-group">
            <label><input type="text" class="form-control" id="title" size="50" placeholder="Name event"></label>
        </div>
        <div class="form-group">
            <label>Start Date<input class="form-control picker" type="text" id="start" size="50" autocomplete="off"></label>
        </div>
        <div class="form-group">
            <label>End Date<input class="form-control picker" type="text" id="end" size="50" autocomplete="off"></label>
        </div>
        <div class="modal-footer">
            <label class="color_input">TextColor<input class="form-control " type="color" id="textColor" autocomplete="off"></label>
            <label class="color_input">FonColor<input class="form-control" type="color" id="color" autocomplete="off"></label>
            <button type="button" id="eventClick" class="btn btn-info">Submit</button>
        </div>
    </div>

    {{--   Calendar  Modal  DELETE  -------------------------------------------------------}}

    <div class="modalDelete" id="modalDelete">
        <div class="modal-header">
            <h5>View or Delete event</h5><br>
            <a class="popup-close" href="#">x</a>
        </div>
        <div class="eventInfo" ></div>
        <div class="modal-footer">
            <button type="button" id="vDelete" class="btn btn-danger">Delete</button>
            <button type="button" id="vCancel" class="btn btn-info">Cancel</button>
        </div>
    </div>



@endsection

@section('scripts')


    <script src="{{asset('assets/plugins/fullcalendar/main.js')}}"></script>
    <script src="{{asset('assets/plugins/jquery.datetimepicker.full.min.js')}}"></script>



    <script>

        // document.addEventListener('DOMContentLoaded', function () {

        let calendarEl = document.getElementById('calendar');
        let calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            themeSystem: 'bootstrap',
            editable: true,
            eventDisplay: 'block',
            displayEventEnd: true,

            eventTimeFormat: {
                hour: '2-digit',
                minute: '2-digit',
                // second: '2-digit',
                meridiem: false,
                hour12: false
            },

            headerToolbar: {center: 'dayGridMonth,timeGridWeek,timeGridDay'},
            // footerToolbar: {center: 'dayGridMonth,timeGridWeek,timeGridDay'},
            selectable: true,
            height: 700,

            eventSources: [
                {
                    url: "{{ route('admin.event') }}",
                    method: 'post',
                    extraParams: {
                        _token: '{!! csrf_token() !!}'
                    },
                    failure: function () {
                        console.log('error events!');
                    },
                    color: '#0EB6A2',   // a non-ajax option
                    textColor: 'white', // a non-ajax option
                    allDay: true
                }
            ],


        });

        calendar.render();


        $(function () {
            calendar.on('dateClick', function (info) {

                $("#start").val(info.dateStr);
                $("#end").val(info.dateStr);
                $('#title').val("");
                $('#color').val("#000000");
                $('#textColor').val("#000000");

                $("#eventModal").fadeIn();
                $('.shadowWin').fadeIn();


            });
        });

        $(function () {
            calendar.on('eventClick', function (info) {

                let str1  = info.el.innerText
                let str2  = info.event._instance.range.start;
                let str3  = info.event._instance.range.end;

                $('.eventInfo').empty();
                $('.eventInfo').append(str1 + '<br>');
                $('.eventInfo').append(str2 + '<br>');
                $('.eventInfo').append(str3 + '<br>');

                $("#modalDelete").fadeIn();
                $('.shadowWin').fadeIn();

                $("#vDelete").click(function () {
                    $.ajax({
                        url: "{{ route('event.destroy', '')}}" + "/" + id,
                        type: 'DELETE',
                        data: {
                            id: id,
                            _token: '{!! csrf_token() !!}'
                        },
                        complete: function (res) {
                            calendar.prev();
                            calendar.next();
                        },
                    });
                    $("#modalDelete").fadeOut();
                    $('.shadowWin').fadeOut();
                });
            });
// ---------------------------------------------------------------------------------
            $("#eventClick").click(function () {
                let title = $('#title').val();
                let start = $('#start').val();
                let end = $('#end').val();
                let color = $('#color').val();
                let textColor = $('#textColor').val();

                if (title == "") {
                    title = "Event..."
                }
                ;
                if (color == "#000000") {
                    color = "#0FC0FC"
                }
                ;
                if (textColor == "#000000") {
                    textColor = "#FFF"
                }
                ;

                if (start <= end) {
                    $.ajax({
                        url: "{{ route('event.store')}}",
                        type: 'POST',
                        data: {
                            title: title,
                            start: start,
                            end: end,
                            color: color,
                            textColor: textColor,
                            _token: '{!! csrf_token() !!}'
                        },
                        complete: function (res) {
                            calendar.prev();
                            calendar.next();
                        },

                    })
                    $("#eventModal").fadeOut();
                    $('.shadowWin').fadeOut();


                } else {
                    alert('The second date is earlier than the first');
                }
            });
        });

        $('#start').datetimepicker({
            format: 'Y-m-d H:i',
        });
        $('#end').datetimepicker({
            format: 'Y-m-d H:i',
        });

    </script>

    <script>
        $(document).ready(function ($) {
            $('.popup-close, #vCancel').click(function () {
                $('.shadowWin').fadeOut();
                $("#eventModal").fadeOut();
                $("#modalDelete").fadeOut();
                return false;
            });
            $(document).keydown(function (e) {
                if (e.keyCode === 27) {
                    e.stopPropagation();
                    $('.shadowWin').fadeOut();
                    $("#eventModal").fadeOut();
                    $("#modalDelete").fadeOut();
                }
            });
            $('.shadowWin').click(function (e) {
                if ($(e.target).closest('.popup').length == 0) {
                    $(this).fadeOut();
                    $("#eventModal").fadeOut();
                    $("#modalDelete").fadeOut();
                }
            });
        });
    </script>


@endsection

