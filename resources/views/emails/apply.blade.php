<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>This message was automatically generated</h2>

<div>

    <p> Dear Mr/Ms, <br>
        Thank you for getting in touch! <br>
        We received your enquiry and we try to respond as soon as possible, <br>
        so one of our managers will get back to you within a few hours. </p>

    <i> Have a great day ahead! </i>

    </p>

    <h2> Job's Info </h2>
    <ul>

        <li><b>@lang('title.start_date'): </b>{{ $offer->start_date}}</li>
        <li><b>Salary: </b>{{$offer->job->salary_euro}}</li>
        <li><b>Description job: </b>{{ $offer->job->desc_job}}</li>
        <li><b>Requirements: </b>{{ $offer->job->requirements}}</li>

    </ul>

    <p> If you have any questions or need further information, please contact us at: mail@email.com</p>
</div>
</body>
</html>