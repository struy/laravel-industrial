<?php

namespace App\Http\Controllers;

use App\ProjectService;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Booking;
use DateTime;
use Mail;

class BookingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

        $data = [
            'page_title' => 'Bookings',
            'bookings' => Booking::orderBy('start_time')->get(),

        ];

        return view('booking/list', $data);
    }


    public function create()
    {
        $lang = \App::getLocale();
        $name = 'name_' . $lang;
        $items = ProjectService::pluck($name, 'id');
        $items->transform(function ($item, $key) {
            return $item . '/ ' . ProjectService::find($key)->duration_in_days;
        });
        $items->all();
        $data = [
            'page_title' => 'Add new booking',
            'items' => $items,
        ];
        return view('booking/create', $data);
    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'text' => 'required|min:5|max:1024',
            'project_services_id' => 'required|integer',
            'time' => 'required'
        ]);


        $booking = new Booking;
        $booking->text = $request->input('text');
        $booking->user_id = \Auth::id();
        $booking->project_services_id = $request->input('project_services_id');
        $project_duration = \DB::table('project_services')->where('id',
            $booking->project_services_id)->first();
        $time = explode(" - ", $request->input('time'));
        $td = $this->change_date_format($time[0]);
        $date = new DateTime($td);
        $date->add(new \DateInterval('PT' . $project_duration->duration . 'H'));
        $time_end = $date->format('Y-m-d H:i:s');
        $booking->start_time = $this->change_date_format($time[0]);
        //   $booking->end_time = $this->change_date_format($time[1]);
        $booking->end_time = $time_end;
        $booking->save();

        $user = \Auth::user();


//        Mail::later(5, 'emails.reminder', ['user' => $user, 'booking' => $booking], function ($m) use ($user) {
//            $m->from('manager@abstracto-projects.com', 'Abstracto Industrial Projects');
//            $m->to($user->email, $user->name)->subject('Your Reminder!');
//        });


        Mail::send('emails.reminder', ['user' => $user, 'booking' => $booking], function ($m) use ($user) {
            $m->from('manager@abstracto-projects.com', 'Abstracto Industrial Projects');
            $m->to($user->email, $user->name)->subject('Your Reminder!');
        });

        $request->session()->flash('success', 'The booking was successfully saved!');
        return redirect('bookings/create');
    }


    public function show($id)
    {
        $booking = Booking::findOrFail($id);
        $first_date = new DateTime($booking->start_time);
        $second_date = new DateTime($booking->end_time);
        $difference = $first_date->diff($second_date);
        $data = [
            'page_title' => $booking->title,
            'booking' => $booking,
            'duration' => $this->format_interval($difference),

        ];
        return view('booking/view', $data);
    }


    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        $lang = \App::getLocale();
        $name = 'name_' . $lang;
        $items = ProjectService::pluck($name, 'id');
        $items->transform(function ($item, $key) {
            return $item . '/ ' . ProjectService::find($key)->duration_in_days;
        });
        $items->all();
        $booking->start_time = $this->change_date_format_fullcalendar($booking->start_time);
        $booking->end_time = $this->change_date_format_fullcalendar($booking->end_time);
        $confirmed = $booking->confirmed;
        $data = [
            'page_title' => 'Edit ' . $booking->title,
            'booking' => $booking,
            'items' => $items,
            'confirmed' => $confirmed,
        ];

        return view('booking/edit', $data);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'text' => 'required|min:5|max:256',
            'project_services_id' => 'required|integer',
            'time' => 'required'
        ]);

        $time = explode(" - ", $request->input('time'));

        $booking = Booking::findOrFail($id);
        $booking->text = $request->input('text');
        $booking->project_services_id = $request->input('project_services_id');
        $project_duration = \DB::table('project_services')->where('id', $booking->project_services_id)->first();
        if ($request->input('confirmed') == true) {
            $booking->confirmed = 1;
            $user = \Auth::user();
            \Mail::later(5, 'emails.confirmed', ['user' => $user, 'booking' => $booking], function ($m) use ($user) {
                $m->from('manager@abstracto-projects.com', 'Abstracto Industrial Projects');
                $m->to($user->email, $user->name)->subject('Your Project Service Confirmed!');

            });
        }
        $td = $this->change_date_format($time[0]);
        $date = new DateTime($td);
        $date->add(new \DateInterval('PT' . $project_duration->duration . 'H'));
        $time_end = $date->format('Y-m-d H:i:s');
        $booking->start_time = $this->change_date_format($time[0]);
        $booking->end_time = $time_end;
        $booking->save();

        return redirect('bookings');
    }


    public function destroy($id)
    {
        $booking = Booking::find($id);
        $booking->delete();
        return redirect('bookings');
    }

    public function change_date_format($date)
    {
        /*tweak for date time*/
        $date = $date . ' 00:00:00';
        $time = DateTime::createFromFormat('d/m/Y H:i:s', $date);
        return $time->format('Y-m-d H:i:s');
    }

    public function change_date_format_fullcalendar($date)
    {
        $time = DateTime::createFromFormat('Y-m-d H:i:s', $date);
        return $time->format('d/m/Y H:i:s');
    }

    public function format_interval(\DateInterval $interval)
    {
        $result = "";
        if ($interval->y) {
            $result .= $interval->format("%y year(s) ");
        }
        if ($interval->m) {
            $result .= $interval->format("%m month(s) ");
        }
        if ($interval->d) {
            $result .= $interval->format("%d day(s) ");
        }
        if ($interval->h) {
            $result .= $interval->format("%h hour(s) ");
        }
        if ($interval->i) {
            $result .= $interval->format("%i minute(s) ");
        }
        if ($interval->s) {
            $result .= $interval->format("%s second(s) ");
        }

        return $result;
    }


    public function api()
    {
        $lang = \App::getLocale();
        $bookings = \DB::table('bookings')->join('project_services', 'bookings.project_services_id', '=', 'project_services.id')
            ->select('bookings.id', 'text', 'start_time as start', 'end_time as end', 'project_services.name_' . $lang . ' as name')->get();

        foreach ($bookings as $booking) {
            $booking->title = $booking->id . ' - ' . $booking->name;
            $booking->url = url('bookings/' . $booking->id);

        }
        return $bookings;
    }

    public function calendar()
    {
        $data = ['page_title' => 'Calendar' ];
        return view('booking/index', $data);
    }


}
