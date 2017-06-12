{{ Form::model($job,['method' => 'PUT', 'route' => ['jobs.update',$job->id]]) }}

<div><h3>Job</h3></div>

<div>
    {{Form::label('title_de','Name de:')}}
    {{Form::text('title_de',null,['class' => 'form-control', 'placeholder' => 'Enter the  name...']) }}
</div>

<div>
    {{Form::label('title_en','Name en:')}}
    {{Form::text('title_en',null,['class' => 'form-control', 'placeholder' => 'Enter the  name...']) }}
</div>

<div><h3>Contact Person</h3></div>
<div>
    {{Form::label('person','Person:')}}
    {{Form::text('person',null,['class' => 'form-control', 'placeholder' => 'example@example.ex']) }}
</div>


<div>
    {{Form::label('email','Email:')}}
    {{Form::text('email',null,['class' => 'form-control', 'placeholder' => 'example@example.ex']) }}
</div>


<div>
    {{Form::label('street','Street:')}}
    {{Form::text('street',null,['class' => 'form-control', 'placeholder' => 'Enter street name....']) }}
</div>


<div>
    {{Form::label('street_num','Street num:')}}
    {{Form::text('street_num',null,['class' => 'form-control', 'placeholder' => 'Enter street number ....']) }}
</div>

<div>
    {{Form::label('post_code','Postcode:')}}
    {{Form::text('post_code',null,['class' => 'form-control', 'placeholder' => 'Enter post code....']) }}
</div>


<div>
    {{Form::label('country','Country:')}}
    {{Form::text('country',null,['class' => 'form-control', 'placeholder' => 'Enter country name....']) }}
</div>

<div>
    {{Form::label('city','City:')}}
    {{Form::text('city',null,['class' => 'form-control', 'placeholder' => 'Enter city name....']) }}
</div>

<div><h3>Location</h3></div>
<div>
    {{Form::label('loc_country_de','Country de:')}}
    {{Form::text('loc_country_de',null,['class' => 'form-control', 'placeholder' => 'Enter country name....']) }}
</div>

<div>
    {{Form::label('loc_city_de','City de:')}}
    {{Form::text('loc_city_de',null,['class' => 'form-control', 'placeholder' => 'Enter city name....']) }}
</div>

<div>
    {{Form::label('loc_country_en','Country en:')}}
    {{Form::text('loc_country_en',null,['class' => 'form-control', 'placeholder' => 'Enter country name....']) }}
</div>

<div>
    {{Form::label('loc_city_en','City en :')}}
    {{Form::text('loc_city_en',null,['class' => 'form-control', 'placeholder' => 'Enter city  name....']) }}
</div>

<div>
    <h3>Info</h3>
</div>

<div>
    {{Form::label('time','Start date:')}}
    {{Form::text('time',$job->start_date,['class' => 'form-control', 'placeholder' => 'Enter start date....']) }}
</div>

<div>
    {{Form::label('salary','Salary:')}}
    {{Form::text('salary',null,['class' => 'form-control', 'placeholder' => 'Enter salary....']) }}
</div>


<div>
    <h3>Description</h3>
</div>

<div>
    {{Form::label('desc_company_de','Company de:')}}
    {{Form::text('desc_company_de',null,['class' => 'form-control', 'placeholder' => 'Enter company description....']) }}
</div>


<div>
    {{Form::label('desc_company_en','Company en:')}}
    {{Form::text('desc_company_en',null,['class' => 'form-control', 'placeholder' => 'Enter company description....']) }}
</div>

<div>
    {{Form::label('desc_job_de','Job de:')}}
    {{Form::textarea('desc_job_de',null,['class' => 'form-control textarea ckeditor', 'placeholder' => 'Enter company description....']) }}
</div>


<div>
    {{Form::label('desc_job_en','Job en:')}}
    {{Form::textarea('desc_job_en',null,['class' => 'form-control textarea ckeditor', 'placeholder' => 'Enter company description....']) }}
</div>

<div>
    <h3>Requirements</h3>
</div>

<div>
    {{Form::label('requirements_de','Requirements de:')}}
    {{Form::textarea('requirements_de',null,['class' => 'form-control ckeditor', 'placeholder' => 'Enter company description....']) }}
</div>

<div>
    {{Form::label('requirements_en','Requirements en:')}}
    {{Form::textarea('requirements_en',null,['class' => 'form-control ckeditor', 'placeholder' => 'Enter company description....']) }}
</div>
<br>

<button type="submit" class="btn btn-primary">Submit</button>
<br><br>

{{ Form::close() }}






