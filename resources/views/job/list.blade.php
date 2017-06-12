@extends('layouts.app')

@section('breadcrumb')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>Jobs</li>
                    @role('manager')
                    <div class="text-right"><a class="btn bnt-flat btn-success" href="{{ url('jobs/create') }}">
                            @lang('title.new_job')
                        </a></div>
                    @endrole
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default job_list">
                    <div class="panel-heading">

                        {{--@lang('job.top_panel_header')--}}

                        <br>
                        <h2 class="text-center">
                            @lang('title.job_list')
                        </h2>
                        <div class="pull-right"></div>
                    </div>
                    <br>
                    <form class="text-center" action="/{{$lang}}/search_job" method="post">
                        {{ csrf_field() }}
                        <input id="job_search" type="text" name="search" value="{{$search}}"> &nbsp;
                        <input type="submit" value=" @lang('inscription.submit')"> &nbsp;
                        <span class="exact"> @lang('inscription.exact')   </span> &nbsp;
                        <input type="checkbox" name="exact_match" value="1"> &nbsp;
                    </form>
                    <h4 class="text-center">
                        @lang('inscription.records')
                        <strong>{{$search_result}}  </strong></h4>

                    {{--{{ Form::open(array('method' =>'POST','url'=>action('JobController@index'))) }}--}}
                    {{--{!! Form::text('search', null,--}}
                    {{--array('required',--}}
                    {{--'class'=>'form-control',--}}
                    {{--'placeholder'=>'Search for a job...')) !!}--}}
                    {{--{!! Form::submit('Search',--}}
                    {{--array('class'=>'btn btn-default')) !!}--}}
                    {{--{!! Form::close() !!}--}}

                    @if($jobs->count() > 0)
                        <table class="table table-striped table-job">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('title.title');</th>
                                @role('manager')
                                <th>@lang('title.contact_person')</th>
                                @endrole
                                <th>@lang('title.location')</th>
                                @role('manager')
                                <th> @lang('title.start_date')</th>
                                <th>@lang('title.salary')</th>
                                <th>@lang('title.description_company')</th>
                                <th>@lang('title.description_job')</th>
                                <th>@lang('title.requirements')</th>
                                @endrole
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1;?>
                            @foreach($jobs as $job)
                                <tr class="table-row" data-href="/jobs/{{$job->id}}">
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>
                                        {{--<a href="{{ url('jobs/' . $job->id) }}">--}}
                                        {{$job->title }}
                                        {{--</a>--}}
                                    </td>
                                    @role('manager')
                                    <td>
                                        {{$job->person}} <br>
                                        <a href="mailto: {{$job->email}} "> {{$job->email}}  </a> <br>
                                        {{$job->street}} / {{$job->street_num}} /{{$job->post_code}} <br>
                                        {{$job->country}} / {{$job->city}} <br>
                                    </td>
                                    @endrole
                                    <td>
                                        {{$job->loc_country}} <br>
                                        {{$job->loc_city}} <br>
                                    </td>

                                    @role('manager')
                                    <td>{{$job->date}}</td>
                                    <td>{{$job->salary_clean}}</td>
                                    <td>{{$job->desc_company}}</td>
                                    <td>{!!$job->desc_job !!}</td>
                                    <td>{!!$job->requirements!!}</td>
                                    <td>
                                        <a class="btn btn-primary btn-xs"
                                           href="{{ url('jobs/' . $job->id . '/edit')}}">
                                            <span class="glyphicon glyphicon-edit"></span> Edit</a>

                                        <form action="{{ url('jobs/' . $job->id) }}" style="display:inline"
                                              method="POST">
                                            <input type="hidden" name="_method" value="DELETE"/>
                                            {{ csrf_field() }}
                                            <button class="btn btn-danger btn-xs" type="submit"><span
                                                        class="glyphicon glyphicon-trash"></span> Delete
                                            </button>
                                        </form>
                                    </td>
                                    @endrole
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <h2></h2>
                    @endif
                    <div class="notice">
                        <p> @lang('title.notice') </p>
                    </div>
                </div>
                <div class="text-center">  {{ $jobs->links() }} </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script type="text/javascript">
        $(document).ready(function ($) {
            $(".table-row").click(function () {
                window.document.location = $(this).data("href");
            });
        });
    </script>
@endsection
