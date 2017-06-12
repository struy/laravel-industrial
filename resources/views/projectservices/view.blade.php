@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 project_services_view">
                <h2 class=" btn-lg btn-flat  btn-primary "># {{$service->id}}</h2>
                &nbsp;
                <h2>     {{$page_title}}  </h2>

                <p>{{$service->background}}</p>
                <hr>
                <h3>@lang('title.description')</h3>

                <p>{{$service->description}}</p>

                <hr>
                <h3>@lang('title.duration')</h3>


                <div class="col-md-1 col-lg-1 text-center " style="background-color: lightgrey; padding:10px ;">
                    {{$service->duration_in_days}}
                </div>

                <div class="col-md-11 col-lg-11">
                    {{ $service->duration_description}}
                </div>
                <p>    &nbsp;   </p>
                <hr>


                <h3>@lang('title.result')</h3>

                <p>{{$service->result}}</p>
                {{--<h3>Cost</h3>--}}
                {{--<p>{{$service->cost}}&nbsp;€</p>--}}
                <br>
                <br>
                <a class="btn btn-success btn-flat" href="/bookings/create">
                    Send enquiry
                </a>
                <br>

                <div class="text-center"><a class="btn text-center" onclick="window.history.back();"><i
                                class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a></div>
                <div class="pull-right">
                </div>
            </div>
        </div>
    </div>







@endsection



