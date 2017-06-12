<div class="container">

    <div class="row">
        <div class="wrap_header_top">
            <div class="col-md-3 col-sm-3  header_gray">
                <a class="logo" href="{{ URL::asset('/') }}">
                    <img src="{{ URL::asset('images/logo.png') }}"  alt="" height="90">
                    <br>
                </a>
            </div>
            <div class="col-md-9 col-lg-9" >
                {{$job->desc_company}}
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12 col-lg-12 btn-primary text-center">
            <p>  @lang('job.introduction_text') </p>
        </div>
    </div>

    {{--title--}}
    <div class="row">
        <div class="col-lg-12">
            <h1>
                #({{$job->id}}) {{$job->title }}
            </h1>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12 col-lg-12">
            <h3>  @lang('job.description_job') </h3>
            {!! $job->desc_job !!}
            <h3> @lang('job.requirements')  </h3>
            {!! $job->requirements!!}

        </div>
    </div>


    <div class="col-md-12 col-lg-12">
        <i class="fa fa-clock-o  fa-3x" aria-hidden="true"></i>
        <p>
            @lang('job.begin') &nbsp; {{ date("jS M Y", strtotime($job->date)) }}
        </p>
    </div>

    <div class="col-md-12 col-lg-12">
        <i class="fa fa-clock-o  fa-3x" aria-hidden="true"></i>
        <p>
            @lang('job.location') &nbsp;

            {{$job->loc_country}}  &nbsp; /  &nbsp;
            {{$job->loc_city}}
        </p>
    </div>

    <div class="row">
        <div class="col-md-12 col-lg-12 btn-primary text-center">
            <p>  @lang('job.closing_text') </p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-lg-8">
            <br><br>
            <p><i class="fa fa-user" aria-hidden="true"></i> @lang('job.contact_name') </p>
            <p><i class="fa fa-phone" aria-hidden="true"></i> @lang('job.contact_tel')</p>
            <p><i class="fa fa-map-marker" aria-hidden="true"></i> @lang('job.contact_address')</p>
        </div>
    </div>

</div>

