@extends('layouts.app')

@section('header-js')
        <!-- Custom styles for this template -->
<link href="{{ url('_asset/css') }}/style.css" rel="stylesheet">
<link href="{{ url('_asset/css') }}/daterangepicker.css" rel="stylesheet">
<link href="{{ url('_asset/fullcalendar') }}/fullcalendar.min.css" rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}"/>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>
                    ({{$job->id}})/ {{$job->title }}
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
                @include('forms.job_edit')
                {{--<form action="{{ url('/'.$lang.'/jobs/' . $job->id) }}" method="POST">--}}
                {{--{{ csrf_field() }}--}}
                {{--<input type="hidden" name="_method" value="PUT" />--}}
                {{----}}
                {{--<button type="submit" class="btn btn-primary">Submit</button>--}}
                {{--</form>		--}}

            </div>
        </div>

    </div>
@endsection

@section('js')



    <script src="{{ url('_asset/fullcalendar/lib') }}/moment.min.js"></script>
    <script src="{{ url('_asset/js') }}/daterangepicker.js"></script>
    {{--<script src="{{ url('packages/frozennode/administrator/js') }}/ckeditor/ckeditor.js"></script>--}}
    {{--<script src="{{ url('packages/frozennode/administrator/js') }}/ckeditor/adapters/jquery.js"></script>--}}

    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    {{--<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>--}}
    <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>

    <script>
        $('textarea.ckeditor').ckeditor({
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
        });
    </script>




    <script type="text/javascript">
        $(function () {
            $('input[name="time"]').daterangepicker({
                "singleDatePicker": true,
                "timePicker": false,
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

    <script type="text/javascript">

        $(document).ready(function () {

//            $.ajaxSetup({
//                headers: {
//                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                }
//            });
/*

          function sendFile(file, editor) {
                data = new FormData();
                data.append("file", file);
                jQuery.ajax({
                    url: "{{ URL::to('ajaximage') }}",
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    type: 'POST',
                    success: function (s) {
                        editor.summernote("insertImage", s);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus + " " + errorThrown);
                    }
                });
            }
*/

//            jQuery('.summernote').each(function (index) {
//                jQuery(this).summernote({
//                    height: 250,
//                    callbacks: {
//                        onImageUpload: function (files, editor, $editable) {
//                            sendFile(files[0], jQuery(this));
//                        }
//                    }
//                });
//            });


        });
    </script>


@endsection