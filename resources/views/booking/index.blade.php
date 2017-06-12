@extends('layouts.app')

@section('header-js')
        <!-- Custom styles for this template -->
<link href="{{ url('_asset/css') }}/style.css" rel="stylesheet">
<link href="{{ url('_asset/css') }}/daterangepicker.css" rel="stylesheet">
<link href="{{ url('_asset/fullcalendar') }}/fullcalendar.min.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
@endsection

@section('breadcrumb')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">
                        Calendar
                    </li>
                    <div class="text-right">
                    <a class="btn bnt-flat btn-success" href="{{ url('bookings/create') }}">Add new booking</a>
                    @role('manager')
                    <a class="btn bnt-flat btn-primary" href="{{ url('bookings') }}">Bookings List</a>
                    @endrole

                    </div>



                    <br>
                    <br>
                </ol>
            </div>
        </div>
    </div>



@endsection



@section('content')


    <div class="container">


        <div class="row">
            <div class="col-lg-12">
                <div id='calendar'></div>
                <br>
            </div>
        </div>
    </div>
@endsection

@section('js')

    <script src="{{ url('_asset/fullcalendar/lib') }}/moment.min.js"></script>
    <script src="{{ url('_asset/fullcalendar') }}/fullcalendar.min.js"></script>
    <script src="{{ url('_asset/fullcalendar') }}/lang-all.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            var initialLangCode = '{{$lang}}';
            var base_url = '{{ url('/') }}';

            $('#calendar').fullCalendar({
                weekends: true,
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                editable: false,
                lang: initialLangCode,
//                eventTextColor: 'red',
                eventAfterRender: function (event, element, view) {
                    var dataHoje = new Date();
                    if (event.start < dataHoje && event.end > dataHoje) {
                        //event.color = "#FFB347"; //Em andamento blue
                        //   element.css('background-color', 'blue');
                    } else if (event.start < dataHoje && event.end < dataHoje) {
                        //event.color = "#77DD77"; //Concluído OK
                        element.css('background-color', '#AE613A');
                    } else if (event.start > dataHoje && event.end > dataHoje) {
                        //event.color = "#AEC6CF"; //Não iniciado green
                        element.css('background-color', '#3AAE61');
                    }
                },


                eventLimit: true, // allow "more" link when too many events
                events: {
                    url: base_url + '/api',
                    error: function () {
                        console.log("cannot load json");
                    }
                }
            });
        });
    </script>
@endsection
