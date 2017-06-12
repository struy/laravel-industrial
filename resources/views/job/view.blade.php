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
        {{--breadcrumb--}}
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li>You are here: <a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/jobs') }}">Jobs</a></li>
                    <li>{{ $job->id }}</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="job_view">
        <div class="container container_for_job" style="min-height: 0px; padding-top: 0px">
            <div class="row">
                <div class="col-md-12 col-lg-12 btn-primary">
                    <p>  @lang('job.introduction_text') </p>
                </div>
            </div>
        </div>
        <div class="container">
            <p class="text-center">  {{$job->desc_company}} </p>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <h1>
                        <span class="btn btn-primary">  #{{$job->id}}    </span> {{$job->title }}
                    </h1>
                </div>
                <div class="col-lg-6 col-md-4">
                    <br><br>
                    @role('manager')
                    <form action="{{ url('/'.$lang.'/jobs/' . $job->id) }}" style="display:inline;" method="POST">
                        <input type="hidden" name="_method" value="DELETE"/>
                        {{ csrf_field() }}
                        <button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-trash"></span>
                            Delete
                        </button>
                    </form>
                    <a class="btn btn-primary" href="{{ url('jobs/' . $job->id . '/edit')}}">
                        <span class="glyphicon glyphicon-edit"></span> Edit</a>
                    @endrole
                    <a class="btn btn-warning" target="_blank" href="{{ url('jobs/pdf/' . $job->id )}}">
                        {{--<a class="btn btn-warning" target="_blank" href="{{ url('/uploads/pdfs/'.$pdf_name.'.pdf' )}}">--}}
                        <span class="fa  fa-file-text-o"></span> PDF</a>
                    <a class="btn btn-success" href="{{ url('offers/create/' . $job->id )}}">
                        <span class="glyphicon glyphicon-file"></span> APPLY NOW</a>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12 col-lg-12 job_list ">
                    <h3>  @lang('job.description_job') </h3>
                    {!! $job->desc_job !!}
                    <h3> @lang('job.requirements')  </h3>
                    {!! $job->requirements!!}
                    <br><br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-map-marker fa-3x" aria-hidden="true"></i>
                            <ul>
                                <li> {{$job->loc_country}} </li>
                                <li> {{$job->loc_city}}</li>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="col-md-6 col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-clock-o  fa-3x" aria-hidden="true"></i>
                            <ul>
                                <li>    {{ date("jS M Y", strtotime($job->date)) }}</li>
                                @role('manager')
                                <li>   {{$job->person}}</li>
                                <li><a href="mailto: {{$job->email}} "> {{$job->email}}  </a></li>
                                <li>  {{$job->street}} / {{$job->street_num}} /{{$job->post_code}}</li>
                                <li>   {{$job->country}} / {{$job->city}}</li>
                                @endrole
                            </ul>
                        </div>
                    </div>
                </div>

                {{--<div class="col-md-3 col-lg-3">--}}
                {{--<h2> Salary: </h2>--}}
                {{--{{$job->salary_euro}}--}}
                {{--</div>--}}

            </div>
        </div>
        {{--end container--}}


        <div class="container  container_for_job">
            <div class="row">
                <div class="col-md-12 col-lg-12 btn-primary">
                    <p>  @lang('job.closing_text') </p>
                </div>
            </div>
        </div>


        <div class="container container_for_job container_for_job_p ">
            <div class="row">
                <div class="col-md-8 col-lg-8">
                    <br><br>
                    <p><i class="fa fa-user" aria-hidden="true"></i> @lang('job.contact_name') </p>
                   <p><i class="fa fa-phone" aria-hidden="true"></i> @lang('job.contact_tel')</p>
                    <p><i class="fa fa-map-marker" aria-hidden="true"></i> @lang('job.contact_address')</p>
                </div>
                <div class="col-md-4 col-lg-4">
                    <br><br>
                    <a class="btn btn-success" href="{{ url('offers/create/' . $job->id )}}">
                        <span class="glyphicon glyphicon-file"></span> APPLY NOW</a>
                </div>
            </div>
        </div>
    </div>
@endsection




@section('js')
    <script src="{{ url('_asset/fullcalendar/lib') }}/moment.min.js"></script>
    <script src="{{ url('_asset/js') }}/daterangepicker.js"></script>
    <script src="js/jquery.equalheight.js"></script>

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

        function equa(eqElement) {
            $(window).load(function(){equalheight(eqElement);}).resize(function(){equalheight(eqElement);});
        }


        var arr= [".job_view .panel-default>.panel-heading"];

        arr.forEach(function(item, i, arr) {
            equa(item);
        });





    </script>
@endsection