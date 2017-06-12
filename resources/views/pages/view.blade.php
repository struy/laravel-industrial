@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <h1 class="text-center"> {{$page->title}} </h1>

               <section class="page">
                   {!!  $page->content !!}
               </section>


            </div>
        </div>
    </div>
@endsection
