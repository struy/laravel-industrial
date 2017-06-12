@extends('layouts.app')
@section('breadcrumb')
    <div class="container">
        <div class="row">
            <div class="hidden-sm col-lg-12">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>Project Services</li>
                </ol>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="text-center">Project Services</h2>
                        <div class="pull-right">
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        @include('message')
                    </div>
                    <div class="col-md-9 col-lg-9">
                        <div class="description">
                            <p>
                                @lang('projectservices.description')
                            </p>
                        </div>
                    </div>
                    @include('forms.enquiry')
                    @if($services->count() > 0)
                        <table class="table table-hover table-bordered list-projects">
                            <thead>
                            <tr>
                                <th>@lang('title.project_service')</th>
                                <th>@lang('title.background')</th>
                                <th>@lang('title.result')</th>
                                <th>@lang('title.duration')</th>
                                {{--<th>Cost</th>--}}
                                <th>@lang('title.booking')</th>
                            </tr>
                            </thead>
                            <tbody>
                            <section id="services" class="services endless-pagination"
                                     data-next-page="{{ $services->nextPageUrl() }}">
                                @foreach($services as $service)
                                    <tr class=" table-row" data-href="/projectservices/{{$service->id}}">
                                        <td>{{$service->name}}</td>
                                        <td>{{$service->background}}</td>
                                        <td style="width: 50%;">{{$service->result}}</td>
                                        <td>{{$service->duration_in_days}}</td>
                                        {{--<td>{{$service->cost}}&nbsp;€</td>--}}
                                        <td><a class="btn btn-my-success btn-flat" href="/{{$lang}}/bookings/create">
                                                @lang('title.enquiry')
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </section>
                            </tbody>
                        </table>
                        <div class="text-center">  {{ $services->links() }}  </div>
                        <div class="notice">
                            <p>@lang('title.notice') </p>
                        </div>
                    @else
                        <h2>No event yet!</h2>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script type="text/javascript" src="{{ url('/') }}/js/jquery.jscroll.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function ($) {
            $(".table-row").click(function () {
                window.document.location = $(this).data("href");
            });

//            $(window).scroll(fetchPosts);
//            function fetchPosts() {
//                var page = $('.endless-pagination').data('next-page');
//                if (page !== null) {
//                    clearTimeout($.data(this, "scrollCheck"));
//                    $.data(this, "scrollCheck", setTimeout(function () {
//                        var scroll_position_for_services_load = $(window).height() + $(window).scrollTop() + 100;
//
//                        if (scroll_position_for_services_load >= $(document).height()) {
//                            $.get(page, function (data) {
//                                $('.services').append(data.services);
//                                $('.endless-pagination').data('next-page', data.next_page);
//                            });
//                        }
//                    }, 350))
//                }
//            }
//
//            (function(){
//                var loading_options = {
//                    finishedMsg: "<div class='end-msg'>Congratulations! You've reached the end of the internet</div>",
//                    msgText: "<div class='center'>Loading news items...</div>",
//                    img: "/assets/img/ajax-loader.gif"
//                };
//
//                $('#services').infinitescroll({
//                    loading : loading_options,
//                    navSelector : " .pagination",
//                    nextSelector : " .pagination li.active + li a",
//                    itemSelector : "tr.table-row"
//                });
//            })();


            $('#services').jscroll({
                autoTrigger: true,
                nextSelector: '.pagination li.active + li a',
                contentSelector: 'tr.table-row',
                callback: function () {
                    $('ul.pagination:visible:first').hide();
                }
            });
        });
    </script>
@endsection
