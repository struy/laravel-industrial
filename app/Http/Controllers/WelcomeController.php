<?php

namespace App\Http\Controllers;


use App\Storie;
use Illuminate\Database\Eloquent\Model;
use App\Job;
use Illuminate\Http\Request;

use App\Http\Requests;


class WelcomeController extends Controller
{
    public function index()
    {
        $collection =  Job::where('deleted_at','=', null)->get();
        $chunk = $collection->sortByDesc('created_at')->take(9);
        $chunk->all();
        $stories=Storie::all();

        $data = [
            'page_title' => 'Welcome',
            'jobs' => $chunk,
//            'jobs_list' =>$jobs_list,
          'stories' => $stories,
        ];
        return view('welcome', $data);
    }
}
