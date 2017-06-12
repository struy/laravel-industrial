@foreach ($list as $key => $item)


    @if ($item != 'time')
        <div class="form-group @if($errors->has($item)) has-error has-feedback @endif">
            <label for="{{$item}}">{{$labels[$key]}} </label>
            <input type="text" class="form-control" name="{{$item}}"
                   placeholder="{{$placeholder[$key]}}"
                   value="{{ old($item) }}">
            @if ($errors->has($item))
                <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span>
                    {{ $errors->first($item) }}
                </p>
            @endif
        </div>

    @else

        <div class="form-group @if($errors->has('time')) has-error @endif">
            <label for="time">Start date</label>

            <div class="input-group">
                <input type="text" class="form-control" name="time" placeholder="Select your time"
                       value="{{ old('time') }}">
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

    @endif
@endforeach