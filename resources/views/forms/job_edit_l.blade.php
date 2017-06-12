{{--{{ Form::open(array('action' => 'JobController@store')) }}--}}

<div><h3>Job</h3></div>

<div class="form-group @if($errors->has('title_de')) has-error has-feedback @endif">
    <label for="title_de"> Name: </label>
    <input type="text" class="form-control" name="title_de"
           placeholder="Enter the name..."
           value="{{ old('title_de') }}">
    @if ($errors->has('title_de'))
        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span>
            {{ $errors->first('title_de') }}
        </p>
    @endif
</div>

<div class="form-group @if($errors->has('title_en')) has-error has-feedback @endif">
    <label for="title_en"> Name en: </label>
    <input type="text" class="form-control" name="title_en"
           placeholder="Enter the name..."
           value="{{ old('title_en') }}">
    @if ($errors->has('title_en'))
        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span>
            {{ $errors->first('title_en') }}
        </p>
    @endif
</div>

<div><h3>Contact Person</h3></div>

<div class="form-group @if($errors->has('person')) has-error has-feedback @endif">
    <label for="person">Person: </label>
    <input type="text" class="form-control" name="person"
           placeholder="Person info..."
           value="{{ old('person') }}">
    @if ($errors->has('person'))
        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span>
            {{ $errors->first('person') }}
        </p>
    @endif
</div>


<div class="form-group @if($errors->has('email')) has-error has-feedback @endif">
    <label for="email">Email: </label>
    <input type="text" class="form-control" name="email"
           placeholder="example@example.ex"
           value="{{ old('email') }}">
    @if ($errors->has('email'))
        <p class="help-block">
            <span class="glyphicon glyphicon-exclamation-sign"></span>
            {{ $errors->first('email') }}
        </p>
    @endif
</div>


<div class="form-group @if($errors->has('street')) has-error has-feedback @endif">
    <label for="street">Street : </label>
    <input type="text" class="form-control" name="street"
           placeholder="Enter street name...."
           value="{{ old('street') }}">
    @if ($errors->has('street'))
        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span>
            {{ $errors->first('street') }}
        </p>
    @endif
</div>


<div class="form-group @if($errors->has('street_num')) has-error has-feedback @endif">
    <label for="street_num">Street num : </label>
    <input type="text" class="form-control" name="street_num"
           placeholder="Enter street number...."
           value="{{ old('street_num') }}">
    @if ($errors->has('street_num'))
        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span>
            {{ $errors->first('street_num') }}
        </p>
    @endif
</div>

<div class="form-group @if($errors->has('post_code')) has-error has-feedback @endif">
    <label for="post_code">Post code : </label>
    <input type="text" class="form-control" name="post_code"
           placeholder="Enter post code...."
           value="{{ old('post_code') }}">
    @if ($errors->has('post_code'))
        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span>
            {{ $errors->first('post_code') }}
        </p>
    @endif
</div>

<div class="form-group @if($errors->has('country')) has-error has-feedback @endif">
    <label for="country">Country: </label>
    <input type="text" class="form-control" name="country"
           placeholder="Enter country code...."
           value="{{ old('country') }}">
    @if ($errors->has('country'))
        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span>
            {{ $errors->first('country') }}
        </p>
    @endif
</div>

<div class="form-group @if($errors->has('city')) has-error has-feedback @endif">
    <label for="city">City: </label>
    <input type="text" class="form-control" name="city"
           placeholder="Enter city name...."
           value="{{ old('city') }}">
    @if ($errors->has('city'))
        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span>
            {{ $errors->first('city') }}
        </p>
    @endif
</div>

<div><h3>Location</h3></div>

<div class="form-group @if($errors->has('loc_country_de')) has-error has-feedback @endif">
    <label for="loc_country_de">Country de:</label>
    <input type="text" class="form-control" name="loc_country_de"
           placeholder="Enter country name...."
           value="{{ old('loc_country_de') }}">
    @if ($errors->has('loc_country_de'))
        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span>
            {{ $errors->first('loc_country_de') }}
        </p>
    @endif
</div>

<div class="form-group @if($errors->has('loc_city_de')) has-error has-feedback @endif">
    <label for="loc_city_de">City de : </label>
    <input type="text" class="form-control" name="loc_city_de"
           placeholder="Enter city name...."
           value="{{ old('loc_city_de') }}">
    @if ($errors->has('loc_city_de'))
        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span>
            {{ $errors->first('loc_city_de') }}
        </p>
    @endif
</div>

<div class="form-group @if($errors->has('loc_country_en')) has-error has-feedback @endif">
    <label for="loc_country_en">Contry en : </label>
    <input type="text" class="form-control" name="loc_country_en"
           placeholder="Enter country name...."
           value="{{ old('loc_country_en') }}">
    @if ($errors->has('loc_country_en'))
        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span>
            {{ $errors->first('loc_country_en') }}
        </p>
    @endif
</div>

<div class="form-group @if($errors->has('loc_city_en')) has-error has-feedback @endif">
    <label for="loc_city_en">City en : </label>
    <input type="text" class="form-control" name="loc_city_en"
           placeholder="Enter city name...."
           value="{{ old('loc_city_en') }}">
    @if ($errors->has('loc_city_en'))
        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span>
            {{ $errors->first('loc_city_en') }}
        </p>
    @endif
</div>

<div><h3>Info</h3></div>


<div class="form-group @if($errors->has('time')) has-error has-feedback @endif">
    <label for="time">Start date : </label>
    <input type="text" class="form-control" name="time"
           placeholder="Enter start date..."
           value="{{ old('time') }}">
    @if($errors->has('time'))
        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span>
            {{ $errors->first('time') }}
        </p>
    @endif
</div>

<div class="form-group @if($errors->has('salary')) has-error has-feedback @endif">
    <label for="salary">Salary : </label>
    <input type="text" class="form-control" name="salary"
           placeholder="Enter salary..."
           value="{{ old('salary') }}">
    @if($errors->has('salary'))
        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span>
            {{ $errors->first('salary') }}
        </p>
    @endif
</div>

<div><h3>Description</h3></div>


<div class="form-group @if($errors->has('desc_company_de')) has-error has-feedback @endif">
    <label for="desc_company_de">Company de: </label>
    <input type="text" class="form-control" name="desc_company_de"
    placeholder="Enter company description..."
    value="{{ old('desc_company_de') }}">

    {{--<textarea rows="5" class="form-control summernote" name="desc_company_de"--}}
              {{--placeholder="Enter company description...."--}}
              {{--value="{{ old('desc_company_de') }}"></textarea>--}}
    @if($errors->has('desc_company_de'))
        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span>
            {{ $errors->first('desc_company_de') }}
        </p>
    @endif
</div>

<div class="form-group @if($errors->has('desc_company_en')) has-error has-feedback @endif">
    <label for="desc_company_en">Company en: </label>
    <input type="text" class="form-control" name="desc_company_en"
    placeholder="Enter company description..."
    value="{{ old('desc_company_en') }}">

    {{--<textarea rows="5" class="form-control summernote" name="desc_company_en"--}}
              {{--placeholder="Enter company description...."--}}
              {{--value="{{ old('desc_company_en') }}"></textarea>--}}


    @if($errors->has('desc_company_en'))
        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span>
            {{ $errors->first('desc_company_en') }}
        </p>
    @endif
</div>

<div class="form-group @if($errors->has('desc_job_de')) has-error has-feedback @endif">
    <label for="desc_job_de">Job de:</label>

    <textarea rows="5" class="form-control summernote" name="desc_job_de"
              placeholder="Enter company description...."
              value="{{ old('desc_job_de') }}"></textarea>
    @if($errors->has('desc_job_de'))
        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span>
            {{ $errors->first('desc_job_de') }}
        </p>
    @endif
</div>

<div class="form-group @if($errors->has('desc_job_en')) has-error has-feedback @endif">
    <label for="desc_job_en">Job en:</label>
    <textarea rows="5" class="form-control summernote" name="desc_job_en"
              placeholder="Enter company description...."
              value="{{ old('desc_job_en') }}"></textarea>
    @if($errors->has('desc_job_en'))
        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span>
            {{ $errors->first('desc_job_en') }}
        </p>
    @endif
</div>

<div><h3>Requirements</h3></div>

<div class="form-group @if($errors->has('requirements_de')) has-error has-feedback @endif">
    <label for="requirements_de">Requirements de:</label>


    <textarea rows="5" class="form-control summernote" name="requirements_de"
              placeholder="Enter company description...."
              value="{{ old('requirements_de') }}"></textarea>
    @if($errors->has('requirements_de'))
        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span>
            {{ $errors->first('requirements_de') }}
        </p>
    @endif
</div>

<div class="form-group @if($errors->has('requirements_en')) has-error has-feedback @endif">
    <label for="requirements_en">Requirements en:</label>


    <textarea rows="5" class="form-control summernote" name="requirements_en"
              placeholder="Enter company description...."
              value="{{ old('requirements_en') }}"></textarea>

    @if($errors->has('requirements_en'))
        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span>
            {{ $errors->first('requirements_en') }}
        </p>
    @endif
</div>

<br>







