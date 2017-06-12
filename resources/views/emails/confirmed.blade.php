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

  <i>  Have a great day ahead! </i>

</p>


    <h1 style="color:green;">Your Project Services Confirmed</h1>

<h2> Booking's Info </h2>
    <ul>
        <li><b>Name project services: </b>{{ $booking->services->name}}</li>
        <li><b>Your description: </b> {{ $booking->text}}</li>
        <li><b>Start: </b>{{ $booking->start_time}}</li>
        <li><b>End: </b>{{ $booking->end_time}}</li>
        <li><b>Total duration: </b>{{$booking->services->duration}}</li>
        <li><b>Cost: </b>{{$booking->services->cost}}</li>

    </ul>

<p> If you have any questions or need further information, please contact us at: mail@email.com</p>
</div>
</body>
</html>