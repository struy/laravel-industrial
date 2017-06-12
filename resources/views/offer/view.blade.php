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
@section('content')
    <div class="container">
        <div class="row">
            <div clss="col-lg-12">
                <ol class="breadcrumb">
                    <li>You are here: <a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/offers') }}">Offers</a></li>
                    <li class="active">{{ $offer->id }}</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <h2>
                    #({{$offer->id}}) <br>
                    <small>Apply for {{ $offer->job->title}}</small>
                </h2>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">

                <p>Start date: <br>
                    {{ date("g:ia\, jS M Y", strtotime($offer->job->start_date)) }}
                </p>

                <p>Salary : <br>
                    {{$offer->job->salary_euro}}
                </p>

                <p> Person name: <br>

                    {{$offer->name}}
                </p>

                <p> Address: <br>
                    {{$offer->address}}
                </p>

                <p> Phone: <br>
                    {{$offer->phone}}
                </p>

                <p> Email:
                    <a href="mailto: {{$offer->email}}   "> {{$offer->email}}  </a>
                </p>

                <p> Attachment:
                    <a href="http://abstracto-projects.com/uploads/{{$offer->attachment}}"> {{
                                    substr($offer->attachment,-3)}} </a></p>

                <p>
                @role('manager')
                <form action="{{ url('/'.$lang.'/offers/' . $offer->id) }}" style="display:inline;" method="POST">
                    <input type="hidden" name="_method" value="DELETE"/>
                    {{ csrf_field() }}
                    <button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-trash"></span> Delete
                    </button>
                </form>
                {{--<a class="btn btn-primary" href="{{ url('offers/' . $offer->id . '/edit')}}">--}}
                {{--<span class="glyphicon glyphicon-edit"></span> Edit</a>--}}
                @endrole
                </p>
            </div>
        </div>
    </div>


@endsection

@section('js')
    <script src="{{ url('_asset/fullcalendar/lib') }}/moment.min.js"></script>
    <script src="{{ url('_asset/js') }}/daterangepicker.js"></script>
    <script type="text/javascript">
        $(function () {
            $('input[name="time"]').daterangepicker({
                "timePicker": true,
                "timePicker24Hour": true,
                "timePickerIncrement": 15,
                "autoApply": true,
                "locale": {
                    "format": "DD/MM/YYYY HH:mm:ss",
                    "separator": " - ",
                }
            });
        });
    </script>
@endsection