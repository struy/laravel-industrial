<?php

namespace App\Http\Controllers;

use App\Offer;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Storage;
use App\Job;
use App\Http\Requests;


class OfferController extends Controller
{

    public function index()
    {
        $offers = Offer::orderBy('id')->get();
        $data = [
            'page_title' => 'Offers',
            'offers' => $offers,
        ];
        return view('offer/list', $data);
    }

    public function create($id)
    {
        $job = Job::findOrFail($id);
        $data = [
            'job' => $job,
        ];
        return view('offer/create', $data);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:5|max:256',
            'address' => 'required|min:5|max:256',
            'email' => 'required|email',
            'phone' => 'required',
            'job_id' => 'required|integer',
//            'attachment' => 'required|max:20000',
        ]);


        $file = Input::file('attachment');
        $destinationPath = '/uploads/offers/';
        $extension = $file->getClientOriginalExtension();
        $fileName = md5($file) . '.' . $extension;
        $upload_success = Storage::disk('uploads')->put($fileName, file_get_contents($file->getRealPath()));

        if (!$upload_success) {
            $request->session()->flash('success', 'Doesn\'t  save file!');
            return redirect('offers/create');
        }
        $offer = new Offer;
        $offer->name = $request->input('name');
        $offer->email = $request->input('email');
        $offer->address = $request->input('address');
        $offer->phone = $request->input('phone');
        $offer->job_id = $request->input('job_id');
        $offer->attachment = $fileName;
        $offer->save();

        \Mail::later(5, 'emails.apply', ['offer' => $offer], function ($m) use ($offer) {
            $m->from('manager@abstracto-projects.com', 'Abstracto Industrial Projects');
            $m->to($offer->email, $offer->name)->subject('Your Reminder!');

        });

        $request->session()->flash('success', 'The applying was successfully saved!');
        return redirect('offers/create/' . $offer->job_id);
    }


    public function show($id)
    {
        $offer = Offer::findOrFail($id);
        $data = [
            'page_title' => $offer->job->title,
            'offer' => $offer,
        ];
        return view('offer/view', $data);
    }


    public function edit($id)
    {
//        $offer = Offer::findOrFail($id);
//
//        $data = [
//            'page_title' => 'Edit ' . $offer->title,
//            'offer' => $offer,
//
//
//        ];

//        return view('offer/edit', $data);
        return back();
    }


    public function update(Request $request, $id)
    {
        return back();
    }


    public function destroy($id)
    {
        $offer = Offer::find($id);
        $offer->delete();
        return redirect('offers');
    }
}
