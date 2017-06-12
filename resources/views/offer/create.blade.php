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
                    <li> <a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/offers') }}">Offers</a></li>
                    <li class="active">Add new offer</li>
                </ol>
                {{--<h2>Add new offer</h2>--}}
                <br>
                <br>
            </div>
        </div>
    </div>
    @endsection









@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">  @include('message') </div>

            <div class="col-lg-6 col-lg-offset-3">
                {{--{{$lang =  LaravelLocalization::getCurrentLocale() }}--}}
                <form action="{{ url('/'.$lang.'/offers')}} " method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}


                    @include('forms.offer_create')


                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
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
                "singleDatePicker": true,
                "minDate": moment('<?php echo date('Y-m-d G')?>'),
                //"timePicker": true,
                "timePicker": false,
                "timePicker24Hour": true,
                "timePickerIncrement": 15,
                "autoApply":true,



                "locale": {
                    "format": "DD/MM/YYYY",
                    "separator": " - ",
                }





            });
        });
    </script>
@endsection


