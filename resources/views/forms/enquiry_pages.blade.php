<div class="grey-form">

    <div class="text-center"><h2>

           @lang('enquiry.quick')

        </h2></div>
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>

    {!! Form::open(array('route' => 'contact_store', 'class' => 'form')) !!}

    <div class="form-group">
        {!! Form::label('Name') !!}
        {!! Form::text('name', null,
 array('required',
 'class'=>'form-control',
 'placeholder'=>Lang::get('enquiry.your_name'))) !!}
    </div>

    <div class="form-group">
        {!! Form::label(   Lang::get('enquiry.email')) !!}
        {!! Form::text('email', null,
array('required',
'class'=>'form-control',
'placeholder'=>  Lang::get('enquiry.your_email'))) !!}
    </div>

    <div class="form-group">
        {!! Form::label(    Lang::get('enquiry.mobile')) !!}
        {!! Form::text('mobile', null,
array('required',
'class'=>'form-control',
'placeholder'=>Lang::get('enquiry.your_mobile'))) !!}
    </div>

    <div class="form-group">
        {!! Form::label(    Lang::get('enquiry.message')) !!}
        {!! Form::textarea('message', null,
array('required',
'class'=>'form-control',
'placeholder'=>Lang::get('enquiry.message'))) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('SEND',
array('class'=>'btn btn-primary')) !!}
    </div>
    {!! Form::close() !!}
</div>