<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Session;

class ContactController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'mobile' => 'required',
        ]);

        $name = $request->get('name');
        $mobile = $request->get('mobile');
        $email = $request->get('email');
        $user_message = $request->get('message');

        \Mail::send('emails.contact',
            array(
                'name' => $name,
                'mobile' => $mobile,
                'email' => $email,
                'user_message' => $user_message
            ), function ($message) {
                $message->from('test@test.com');
                $message->to(getenv('MAIL_USERNAME_ADMIN'), 'Admin')->subject('Abstracto Projects');
            });


        \Mail::send('emails.enquiry', ['name' => $name], function ($m) use ($email, $name) {
            $m->from(getenv('MAIL_USERNAME'), 'Admin');
            $m->to($email, $name)->subject('Automatic reply - Your enquiry to Abstracto Industrial Projects');
        });

        Session::flash('message', 'success2');
        return \Redirect::back()
            ->with('message', 'Thanks for contacting us!');

    }


}
