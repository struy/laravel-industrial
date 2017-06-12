<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ url('/') }}/_asset/favicon.png">
    {{--<title>Abstracto-projects</title>--}}
    <title>{{ config('app.name') }} - {{ $page_title or 'Industrial Projects'}}</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css"
          integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    {{--<link rel="stylesheet" href="//cdn.jsdelivr.net/medium-editor/latest/css/medium-editor.min.css" type="text/css" media="screen" charset="utf-8">--}}
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
    {{--<link href="{!! asset('css/bootstrap3-wysihtml5.min.css') !!}" media="all" rel="stylesheet" type="text/css" />--}}
    <link rel="stylesheet" href="{{ url('/') }}/css/main.css" type="text/css" media="screen" charset="utf-8">

    @yield('header-js')

</head>
<body id="app-layout">
<header class="header_site_base">
    {{--@role('manager')--}}
    <div class="container">
        <div class="row">
            <div class="wrap_header_top">
                <div class="col-md-3 col-sm-3 hidden-xs header_gray">
                    <a class="logo" href="{{ url('/') }}">
                        <img  src="/images/logo.png" alt="" height="90" >
                        <br>
                    </a>
                </div>
                <div class="col-md-7 col-sm-7 col-xs-7  header_gray">
                    <ul class="contact">
                        <li><i class="fa fa-phone-square" aria-hidden="true"></i>+1(312) 111-1111</li>
                        <li><i class="fa fa-envelope" aria-hidden="true"></i>
                            <a href="mailto:/ info@abstracto-projects.com">
                                info@abstracto-projects.com</a></li>
                        {{--<li>  adress: city</li>--}}
                    </ul>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2">
                    <div class="flags">
                        <ul class="language_bar_chooser">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                @if($localeCode == LaravelLocalization::getCurrentLocale())
                                    <li class="active">
                                        <span class="flag_up"> {{$localeCode}}    </span>
                                        {{--<span class="flag flag-{{$localeCode}}"> </span>--}}
                                    </li>
                                @elseif($url = LaravelLocalization::getLocalizedURL($localeCode))
                                    <li>
                                        <a rel="alternate" hreflang="{{$localeCode}}" href="{{$url}}">
                                            <span class="flag_up">{{$localeCode}}</span>
                                            {{--<span class="flag flag-{{$localeCode}}"> </span>--}}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="container container0 ">
        <nav class="navbar navbar-default navbar-abstracto">
            <div class="container container0">
                <div class="navbar-header">
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Branding Image -->
                    {{--<a class="navbar-brand" href="{{ url('/') }}">--}}
                    {{--<h2>Abstracto</h2>  <span>projects</span>--}}
                    {{--</a>--}}
                </div>

                <div class="collapse navbar-collapse " id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        {{--menu--}}
                        @include('layouts.menus')
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">

                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

    </div>
    @yield('our_expertise')

    {{--@endrole--}}
</header>
<div class="hidden-sm">
@yield('breadcrumb')
</div>

<section class="content">
    @yield('content')
</section>


{{--@role('manager')--}}

<div class="container container0">


    <footer>
        {{--<nav class="navbar navbar-default navbar-abstracto">--}}
            {{--<div class="container container0">--}}
                {{--<div class="navbar-header">--}}
                    {{--<!-- Collapsed Hamburger -->--}}
                    {{--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"--}}
                            {{--data-target="#app-navbar-collapse">--}}
                        {{--<span class="sr-only">Toggle Navigation</span>--}}
                        {{--<span class="icon-bar"></span>--}}
                        {{--<span class="icon-bar"></span>--}}
                        {{--<span class="icon-bar"></span>--}}
                    {{--</button>--}}
                    {{--<!-- Branding Image -->--}}
                    {{--<a class="navbar-brand" href="{{ url('/') }}">--}}
                    {{--<h2>Abstracto</h2>  <span>projects</span>--}}
                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="collapse navbar-collapse " id="app-navbar-collapse">--}}
                    {{--<!-- Left Side Of Navbar -->--}}
                    {{--<ul class="nav navbar-nav">--}}
                        {{--menu--}}
                        {{--@include('layouts.menus')--}}
                    {{--</ul>--}}
                    {{--<!-- Right Side Of Navbar -->--}}
                    {{--<ul class="nav navbar-nav navbar-right">--}}

                        {{--<!-- Authentication Links -->--}}
                        {{--@if (Auth::guest())--}}
                            {{--<li><a href="{{ url('/login') }}">Login</a></li>--}}
                            {{--<li><a href="{{ url('/register') }}">Register</a></li>--}}
                        {{--@else--}}
                            {{--<li class="dropdown">--}}
                                {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"--}}
                                   {{--aria-expanded="false">--}}
                                    {{--{{ Auth::user()->name }} <span class="caret"></span>--}}
                                {{--</a>--}}

                                {{--<ul class="dropdown-menu" role="menu">--}}
                                    {{--<li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                        {{--@endif--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</nav>--}}

        <div id="sub-footer">
            <div class="col-lg-9">
                <div class="copyright">
                    <p>
                        <span>© Me {{date('Y')}} All right reserved. </span>
                    </p>
                </div>
            </div>
            <div class="col-lg-3">
                <ul class="social-network">
                    <li><a data-original-title="Facebook" href="#" data-placement="top" title=""><i
                                    class="fa fa-facebook"></i></a></li>
                    <li><a data-original-title="Twitter" href="#" data-placement="top" title=""><i
                                    class="fa fa-twitter"></i></a></li>
                    <li><a data-original-title="Linkedin" href="#" data-placement="top" title=""><i
                                    class="fa fa-linkedin"></i></a></li>
                    <li><a data-original-title="Pinterest" href="#" data-placement="top" title=""><i
                                    class="fa fa-pinterest"></i></a></li>
                    <li><a data-original-title="Google plus" href="#" data-placement="top" title=""><i
                                    class="fa fa-google-plus"></i></a></li>
                </ul>
            </div>

        </div>

    </footer>
</div>
{{--@endrole--}}
        <!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"
        integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb"
        crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
        crossorigin="anonymous"></script>

{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

{{--<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>--}}
{{--<script type="text/javascript" src="{!! asset('js/wysihtml5-0.3.0.js') !!}"></script>--}}

{{--<script>--}}
    {{--$(document).ready(function() {--}}
{{--//        $('.summernote').summernote();--}}
{{--//        $('.textarea').wysihtml5();--}}
    {{--});--}}
{{--</script>--}}



@yield('js')


</body>
</html>
