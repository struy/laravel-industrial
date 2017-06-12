<div class="container">

    <br>
    <div style="width: 40%;height: 90px; display: inline-block;">

    <img src="{{ URL::asset('images/logo.png') }}" alt="" height="90" style="display: inline-block;"></div>
    <div style="width: 60%; min-height: 90px; display: inline-block;">    {{$job->desc_company_de}}  </div>


    <div class="row">
        <div class="col-md-12 col-lg-12 btn-primary text-center">
            <p>  @lang('job.introduction_text') </p>
        </div>
    </div>

    <br>
    {{--title--}}
    <div class="row">
        <div class="col-lg-12">
            <h1>
                #({{$job->id}}) {{$job->title_de }}
            </h1>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12 col-lg-12">
            <h3>  @lang('job.description_job') </h3>
            {!! $job->desc_job_de !!}
            <h3> @lang('job.requirements')  </h3>
            {!! $job->requirements_de!!}
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
            {{$job->loc_country_de}} &nbsp; / &nbsp;
            {{$job->loc_city_de}}
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
            <p>@lang('job.contact_name') <br>
                @lang('job.contact_tel')<br>
                @lang('job.contact_address')</p>
        </div>
    </div>

</div>

