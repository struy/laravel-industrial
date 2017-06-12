<h2>You are applying for
    (#{{$job->id}} / {{$job->title}} ):</h2>
<b>Start date:</b>
{{ date("jS M Y", strtotime($job->start_date)) }}
<br> <br>
<b>Salary:</b>
{{$job->salary_euro}}
<br> <br>


<div class="form-group @if($errors->has('name')) has-error has-feedback @endif">
    <label for="name"> Name: </label>
    <input type="text" class="form-control" name="name"
           placeholder="Enter the name..."
           value="{{ old('name') }}">
    @if ($errors->has('name'))
        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span>
            {{ $errors->first('name') }}
        </p>
    @endif
</div>

<input type="hidden" name="job_id" value="{{$job->id}}">

<div class="form-group @if($errors->has('email')) has-error has-feedback @endif">
    <label for="email">Email:</label>
    <input type="text" class="form-control" name="email" placeholder=" email@example.com"
           value="{{ old('text') }}">
    @if ($errors->has('text'))
        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span>
            {{ $errors->first('email') }}
        </p>
    @endif
</div>

<div class="form-group @if($errors->has('phone')) has-error has-feedback @endif">
    <label for="phone">Phone: </label>
    <input type="text" class="form-control" name="phone" placeholder="1234567890"
           value="{{ old('phone') }}">
    @if ($errors->has('phone'))
        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span>
            {{ $errors->first('phone') }}
        </p>
    @endif
</div>

<div class="form-group @if($errors->has('address')) has-error has-feedback @endif">
    <label for="addresse">Address </label>
    <input type="text" class="form-control" name="address" placeholder="City, street"
           value="{{ old('address') }}">
    @if ($errors->has('address'))
        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span>
            {{ $errors->first('address ') }}
        </p>
    @endif
</div>


<div class="form-group @if($errors->has('attachment')) has-error has-feedback @endif">
    <label for=attachment">File: </label>
    <input type="file" class="form-control" name="attachment" placeholder="E.g. text"
           value="{{ old('attachment') }}">
    @if ($errors->has('attachment'))
        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span>
            {{ $errors->first('attachment') }}
        </p>
    @endif
</div>







