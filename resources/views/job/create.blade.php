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


<meta name="csrf-token" content="{{ csrf_token() }}"/>


@endsection

@section('breadcrumb')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/jobs') }}">Jobs</a></li>
                    <li class="active">Add new job</li>
                </ol>
                {{--<h2>Add new job</h2>--}}
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                @include('message')
            </div>


            <div class="col-md-12 col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="text-center">Create job</h2>
                        <div class="pull-right">
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-lg-offset-3">
                    {{--'/'.LaravelLocalization::getCurrentLocale().--}}
                    <form action="{{ url('/jobs')}} " method="POST">
                        {{ csrf_field() }}
                        @include('forms.job_create')
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <br><br>
                    </form>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

    <script src="{{ url('_asset/fullcalendar/lib') }}/moment.min.js"></script>
    <script src="{{ url('_asset/js') }}/daterangepicker.js"></script>
    <script src="{{ url('packages/frozennode/administrator/js') }}/ckeditor/ckeditor.js"></script>
    <script src="{{ url('packages/frozennode/administrator/js') }}/ckeditor/adapters/jquery.js"></script>

    <script type="text/javascript">

        $(function () {
            $('input[name="time"]').daterangepicker({
                "singleDatePicker": true,
                "minDate": moment('<?php echo date('Y-m-d G')?>'),
                //"timePicker": true,
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


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

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

        /*
         jQuery('.summernote').each(function (index) {
         jQuery(this).summernote({
         height: 250,
         callbacks: {
         onImageUpload: function (files, editor, $editable) {
         sendFile(files[0], jQuery(this));
         }
         }
         });
         });
         */


//        jQuery("#summernote1").summernote({
//            height: 250,
//            callbacks: {
//                onImageUpload: function (files, editor, $editable) {
//                    sendFile(files[0], jQuery(this));
//                }
//            }
//        });
//        jQuery("#summernote2").summernote({
//            height: 250,
//            callbacks: {
//                onImageUpload: function (files, editor, $editable) {
//                    sendFile(files[0], jQuery(this));
//                }
//            }
//        });
//        jQuery("#summernote3").summernote({
//            height: 250,
//            callbacks: {
//                onImageUpload: function (files, editor, $editable) {
//                    sendFile(files[0], jQuery(this));
//                }
//            }
//        });
//        jQuery("#summernote4").summernote({
//            height: 250,
//            callbacks: {
//                onImageUpload: function (files, editor, $editable) {
//                    sendFile(files[0], jQuery(this));
//                }
//            }
//        });


    </script>








@endsection


