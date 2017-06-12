@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li>You are here: <a href="{{ url('/') }}">Home</a></li>
                    <li class="active"><a href="{{ url('/offers') }}">Offers</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                @if($offers->count() > 0)
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Offer's Title</th>
                            <td>job</td>
                            <td> Name</td>
                            <td> Email</td>
                            <td> Phone</td>
                            <td> Address</td>
                            <td> Attachment</td>


                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1;?>
                        @foreach($offers as $offer)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>
                                    <a href="{{ url('offers/'.$offer->id) }}">
                                        {{$offer->name}}
                                    </a>
                                </td>
                                <td>
                                    {{$offer->job_id}}  {{$offer->job->title_en}} <br>
                                    {{ date("jS M Y", strtotime($offer->job->start_date)) }}

                                </td>
                                <td>{{$offer->name}} </td>

                                <td>
                                    <a href="mailto: {{$offer->email}}   "> {{$offer->email}}  </a>
                                </td>
                                <td>{{$offer->phone}} </td>
                                <td>{{$offer->address}}</td>
                                <td>
                                    <a href="http://abstracto-projects.com/uploads/{{$offer->attachment}}"> {{
                                    substr($offer->attachment,-3)}} </a></td>
                                <td>
                                    {{--<a class="btn btn-primary btn-xs"--}}
                                       {{--href="{{ url('offers/' .$offer->id . '/edit')}}">--}}
                                        {{--<span class="glyphicon glyphicon-edit"></span> Edit</a>--}}

                                    <form action="{{ url('offers/' .$offer->id) }}" style="display:inline"
                                          method="POST">
                                        <input type="hidden" name="_method" value="DELETE"/>
                                        {{ csrf_field() }}
                                        <button class="btn btn-danger btn-xs" type="submit"><span
                                                    class="glyphicon glyphicon-trash"></span> Delete
                                        </button>
                                    </form>

                                </td>
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
@endsection
