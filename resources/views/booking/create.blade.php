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
                    <li><a href="{{ url('/'.$lang.'/projectservices') }}">Projectservices</a></li>
                    <li>Add new enquiry</li>
                </ol>
                {{--<h2>Add new booking</h2>--}}
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                @include('message')
            </div>
            <div class="create_form">
                <div class="col-lg-12 ">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2 class="text-center">@lang('booking.header')</h2>
                            <div class="pull-right">
                            </div>
                        </div>
                        </div>
                         <form action="{{ url('/'.$lang.'/bookings')}} " method="POST">
                            {{ csrf_field() }}
                            <div class="col-md-4 col-lg-4 col-lg-offset-2 col-md-offset-2">
                                <br><br>
                                <div class="form-group  @if($errors->has('text')) has-error has-feedback @endif">
                                    <p class="text-center"><label for="project_services_id">@lang('title.select_project_service')</label>
                                    </p>
                                    {{ Form::select('project_services_id',$items,  null, ['placeholder' => 'Pick a services...']) }}
                                    @if ($errors->has('project_services_id'))
                                        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span>
                                            {{ $errors->first('project_services_id') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 ">
                                <br> <br>
                                <div class="form-group @if($errors->has('time')) has-error @endif">
                                    <p class="text-center">
                                        <label for="time">@lang('title.start_date')</label>
                                    </p>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="time"
                                               placeholder="Select your time"
                                               value="{{ old('time') }}">
                                    </div>
                                    @if ($errors->has('time'))
                                        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span>
                                            {{ $errors->first('time') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-8 col-lg-offset-2 col-md-offset-2">
                                <br>
                                <div class="form-group @if($errors->has('text')) has-error has-feedback @endif">
                                    <p class="text-center"><label for="text">@lang('title.description') </label></p>
                                    {{--<input type="text" class="form-control" name="text" placeholder="E.g. text"--}}
                                    {{--value="{{ old('text') }}">--}}
                                    <textarea rows="5" name="text"></textarea>
                                    @if ($errors->has('text'))
                                        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span>
                                            {{ $errors->first('text') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-10 col-lg-10">
                                <button type="submit" class="btn btn-primary">@lang('title.submit')</button>
                            </div>
                        </form>
                    <br>
               </div>
            </div>
        </div>
        <br>
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
                "autoApply": true,
                "locale": {
                    "format": "DD/MM/YYYY",
                    "separator": " - ",
                }

            });
        });
    </script>
@endsection


