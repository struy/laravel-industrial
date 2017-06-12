@extends('layouts.app')


@section('breadcrumb')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Bookings</li>
                </ol>
            </div>
        </div>


    </div>
    @endsection



@section('content')
    <div class="container">


        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="text-center">Booking list</h2>
                    <div class="pull-right">
                    </div>
                </div>




                @if($bookings->count() > 0)
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>

                            <th>Booking's Title</th>

                            @role('manager')       <th>User info</th>  @endrole
                            <th>Start</th>
                            <th>End</th>
                            <th>Duration</th>
                            @role('manager')         <th>Description</th> @endrole
                            <th>Confirmed</th>

                            @role('manager')     <th></th>  @endrole
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1;?>
                        @foreach($bookings as $booking)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>

                                <td>
                                    <a href="{{ url('bookings/' . $booking->id) }}">{{ $booking->id.' '.$booking->services->name }}</a>
                                </td>
                                @role('manager')        <td>{{$booking->users->name}}<br>
                               {{$booking->users->phone}} <br>
                                    {{$booking->users->company}}<br>
                                    <a  href="mailto: {{$booking->users->email}}   "> {{$booking->users->email}}  </a>    </td> @endrole


                                {{--<td>{{ date("g:ia\, jS M Y", strtotime($booking->start_time)) }}</td>      --}}
                                <td>{{ date("jS M Y", strtotime($booking->start_time)) }}</td>
                                <td>{{ date("jS M Y", strtotime($booking->end_time)) }}</td>
                                <td>{{$booking->services->duration_in_days}}</td>
                                @role('manager')                 <td>{{$booking->text}} </td> @endrole
                                <td style="color: #ff9700">@if($booking->confirmed == 0)  No  @else <b style="color:#9aca62">Yes</b>   @endif </td>
                                @role('manager')
                                <td>

                                    <a class="btn btn-primary btn-xs"
                                       href="{{ url('bookings/' . $booking->id . '/edit')}}">
                                        <span class="glyphicon glyphicon-edit"></span> Edit</a>

                                    <form action="{{ url('bookings/' . $booking->id) }}" style="display:inline"
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
                    <h2>No event yet!</h2>
                @endif
            </div>

            </div>


        </div>
    </div>
@endsection
