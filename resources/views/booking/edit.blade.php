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
		<div class="row">
			<div class="hidden-sm col-lg-12">
				<ol class="breadcrumb">
					<li> <a href="{{ url('/') }}">Home</a></li>
					<li><a href="{{ url('/bookings') }}">Booking</a></li>
					<li>Edit - {{ $booking->id }}</li>
				</ol>
			</div>
		</div>
	</div>
	@endsection







@section('content')
<div class="container">


	<div class="row">
		<div class="col-lg-12">
			<h2>
				({{$booking->id}}) {{$booking->services->name }}
				<small>booked by {{ $booking->users->name}}</small>
			</h2>
			<hr>
		</div>
	</div>



<div class="row">
	<div class="col-lg-6 col-lg-offset-3">
		
		@if($errors)
			@foreach($errors->all() as $error)
			<p>{{ $error }}</p>
			@endforeach
		@endif
		
		<form action="{{ url('/'.$lang.'/bookings/' . $booking->id) }}" method="POST">
			{{ csrf_field() }}





			<input type="hidden" name="_method" value="PUT" />



			<div class="form-group">
				<label for="project_services_id">Select Project Service</label> <br>
				{{ Form::select('project_services_id',$items,  $booking->project_services_id) }}
			</div>




			<div class="form-group @if($errors->has('text')) has-error has-feedback @endif">
				<label for="text">Description 	</label>
				<input type="text" class="form-control" name="text" value="{{ $booking->text }}" placeholder="E.g.text">
				@if ($errors->has('text'))
					<p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
					{{ $errors->first('text') }}
					</p>
				@endif
			</div>

@if( $confirmed == 0)

				<div class="form-group @if($errors->has('confirmed')) has-error has-feedback @endif">
					<label for="confirmed">Confirmed	</label>
					<input type="checkbox" class="form-control" name="confirmed" value="true" placeholder="E.g 0 1 ">
					@if ($errors->has('confirmed'))
						<p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span>
							{{ $errors->first('confirmed') }}
						</p>
					@endif
				</div>
	@endif







			<div class="form-group @if($errors->has('time')) has-error @endif">
				<label for="time">Start date</label>
				<div class="input-group">
					<input type="text" class="form-control" name="time" value="{{ $booking->start_time . ' - ' . $booking->end_time }}" placeholder="Select your time">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
                    </span>
				</div>
				@if ($errors->has('time'))
					<p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
					{{ $errors->first('time') }}
					</p>
				@endif
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>		
	</div>
</div>

</div>


@endsection

@section('js')
	<script src="{{ url('_asset/fullcalendar/lib') }}/moment.min.js"></script>
<script src="{{ url('_asset/js') }}/daterangepicker.js"></script>
<script type="text/javascript">
$(function () {
	$('input[name="time"]').daterangepicker({
		"singleDatePicker": true,
		"timePicker":false,
		"timePicker24Hour": true,
		"timePickerIncrement": 15,
		"autoApply": true,
		"locale": {
			"format": "DD/MM/YYYY",
			"separator": " - ",
		}
	});
});
</script>
@endsection