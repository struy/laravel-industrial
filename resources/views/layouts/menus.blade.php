<?php
$link_name = 'name_' . \App::getLocale();
?>
@foreach($menus as $link )
    <?php $parentBool = False; ?>
    @foreach($menus as $parent)
        @if($link->id ==$parent->parent)
            <?php $parentBool = True; ?>
        @endif
    @endforeach
    @if($parentBool == True)
        <li class="dropdown">
            <a tabindex="0" data-toggle="dropdown" data-submenu="" aria-expanded="false">
                {{$link->$link_name}}<span class="caret"></span>
            </a>
            <ul class="dropdown-menu">

                @foreach($menus as $parent)
                    @if($parent->parent== $link->id)

                        <li><a href="{{ url($parent->url) }}">{{$parent->$link_name}} </a></li>
                    @endif
                @endforeach
            </ul>
        </li>
    @else
        @if($link->parent == 0)
            <li><a href="{{ url($link->url) }}">{{$link->$link_name}}</a></li>
        @endif
    @endif
@endforeach


{{--<li><a href="{{ url('/') }}">Home</a></li>--}}
{{--<li><a href="{{ url('') }}">HR services </a></li>--}}
{{--<li><a href="{{ url('/projectservices') }}">Project services  </a></li>--}}
{{--<li class="dropdown">--}}
{{--<a tabindex="1" data-toggle="dropdown" data-submenu="" aria-expanded="false">--}}
{{--Project services <span class="caret"></span>--}}
{{--</a>--}}
{{--<ul class="dropdown-menu">--}}
{{--<li><a href="{{ url('/home') }}">Bookable services </a></li>--}}
{{--<li><a href="{{ url('/home') }}">Industrial sectors </a></li>--}}
{{--<li><a href="{{ url('/home') }}">Enquiry form </a></li>--}}
{{--</ul>--}}
{{--</li>--}}
{{--<li><a href="{{ url('/') }}">Consulting </a></li>--}}
{{--<li><a href="{{ url('/') }}">Contact </a></li>--}}
{{--<li><a href="{{ url('/') }}">Legal notice </a></li>--}}
{{--<li class="dropdown">--}}
{{--<a tabindex="0" data-toggle="dropdown" data-submenu="" aria-expanded="false">--}}
{{--Topic: PM<span class="caret"></span>--}}
{{--</a>--}}
{{--<ul class="dropdown-menu">--}}
{{--<li><a href="{{ url('/') }}">References </a></li>--}}
{{--<li><a href="{{ url('/') }}">Team</a></li>--}}
{{--</ul>--}}
{{--</li>--}}
{{--<li><a href="{{ url('/list') }}"> <i class="fa fa-calendar" aria-hidden="true"></i>--}}
{{--Booking calendar </a></li>--}}

