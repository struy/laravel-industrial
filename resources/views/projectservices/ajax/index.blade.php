@foreach($services as $service)
    <tr class=" table-row" data-href="/projectservices/{{$service->id}}">
        <td>{{$service->name}}</td>
        <td>{{$service->background}}</td>
        <td style="width: 50%;">{{$service->result}}</td>
        <td>{{$service->duration_in_days}}</td>
        {{--<td>{{$service->cost}}&nbsp;€</td>--}}
        <td><a class="btn btn-my-success btn-flat" href="/{{$lang}}/bookings/create">
                New enquiry
            </a>
        </td>
    </tr>

@endforeach