@extends('layouts.app_home')

@section('our_expertise')
    <div class="container">
        <div class="row text-center">
            <div class="ourexpertise"><h1> @lang('home.our_expertise')  </h1></div>
        </div>
        <div class="info-col">
            <div class="row">
                <div class="col-md-4 text-center ">
                    <div class="info-col-item">
                        <div class="item-icons-2"></div>
                        <h2> @lang('home.title_2')</h2>
                        <div class="hr_line"></div>
                        <p>  @lang('home.info_col_p_2') </p>
                        <a href="/projectservices" class="btn ">@lang('home.learn_more')</a>
                    </div>
                </div>
                <div class="col-md-4 text-center  ">
                    <div class="info-col-item">
                        <div class="item-icons-3"></div>
                        <h2> @lang('home.title_3')</h2>
                        <div class="hr_line"></div>
                        <p>  @lang('home.info_col_p_3')</p>
                        <a href="/pages/consulting" class="btn">@lang('home.learn_more')</a>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="info-col-item ">
                        <div class="item-icons-1"></div>
                        <h2>@lang('home.title_1')</h2>
                        <div class="hr_line"></div>
                        <p>@lang('home.info_col_p_1')</p>
                        <a href="/jobs" class="btn"> @lang('home.job_search') </a>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12 text-center"></div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    {{--<img src="/images/sliders/sliderfull2.png" alt="" width="100%">--}}
    {{--<br><br>--}}
    <div class="job_wrapper">
        <div class="container " style="background-color: transparent !important; margin-top: 10px;">
            <div class="row">
                <div class="col-md-12 text-center">
                    <br>
                    <div class="header_bg">
                        <h2 class="line">Jobticker</h2>  <br>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="owl-carousel">
                        @foreach ($jobs as $job)
                            <div class="item">
                                <a class="jobs" href="/jobs/ {{$job->id}}">
                                    <h2> {{$job->title}}</h2></a>
                                <div class="tickers_buttom">
                                    <p>  @lang('title.start_date'): <span> {{$job->date}}</span></p>
                                    <p> @lang('title.country'):<span>{{$job->loc_country}} </span></p>
                                    <p> @lang('title.city'): <span>{{$job->loc_city}} </span></p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                @include('message')
            </div>

            <div class="col-md-9 text-center">
                <h2>@lang('title.stories')</h2>
                <div class="owl-carousel_stories">
                    @foreach ($stories as $story)
                        <div class="item_story">
                            <h3>{!! $story->title!!}</h3>
                            {!! $story->content !!}
                            @if($story->link)
                                <a class="down_story" href="{{$story->link}}"> @lang('title.read_more')</a>
                            @endif
                        </div>
                    @endforeach
                </div>


            </div>

            @include('forms.enquiry')


                
        </div>
    </div>




@endsection

@section('header-js')
    <link rel="stylesheet" href="owl.carousel/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="owl.carousel/owl-carousel/owl.theme.css">

@endsection

@section('js')

    <script src="owl.carousel/owl-carousel/owl.carousel.min.js"></script>
    <script src="js/jquery.equalheight.js"></script>

    <script>
        $(document).ready(function () {

            $("#owl-demo").owlCarousel({
                navigation: false, // Show next and prev buttons
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true,
                slideSpeed: 500,
                rewindSpeed: 1000,
                autoPlay: true,
                stopOnHover: true,
                // "singleItem:true" is a shortcut for:
                // items : 1,
                // itemsDesktop : false,
                // itemsDesktopSmall : false,
                // itemsTablet: false,
                // itemsMobile : false
            });


            $('.owl-carousel').owlCarousel({
                autoPlay: true,
                items: 3,
                margin: 10,
                nav: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 5
                    }
                }
            });
            $('.owl-carousel_stories').owlCarousel({
                autoPlay: true,
                items: 2,
                margin: 10,
                nav: true,
                pagination: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 4
                    }
                }
            });


            $("#testimonial-slider").owlCarousel({
                items: 3,
                itemsDesktop: [1000, 2],
                itemsDesktopSmall: [979, 2],
                itemsTablet: [767, 1],
                pagination: true,
                autoPlay: true
            });

            function equa(eqElement) {
                $(window).load(function () {
                    equalheight(eqElement);
                }).resize(function () {
                    equalheight(eqElement);
                });
            }


            var arr = [".job_view.panel", ".item_story", ".owl-carousel .item ", ".job_view .panel-heading", ".info-col-item"];
            arr.forEach(function (item, i, arr) {
                equa(item);
            });

            function succesScroll() {

                jQuery('html, body').animate({
                    scrollTop: jQuery('#form-message').offset().top
                }, 500);

            };
            succesScroll();

        });
    </script>

@endsection



