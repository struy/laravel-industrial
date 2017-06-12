<?php

namespace App\Http\Controllers;

use App\Jobs\CreateJobPdf;
use  DateTime;
use App\Job;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\View;
use Storage;
use File;

class JobController extends Controller
{

    public $jobs_list = [
        'title_de',
        'title_en',
        'person',
        'email',
        'street',
        'street_num',
        'post_code',
        'country',
        'city',
        'loc_country_de',
        'loc_city_de',
        'loc_country_en',
        'loc_city_en',
        'time',
        'salary',
        'desc_company_de',
        'desc_company_en',
        'desc_job_de',
        'desc_job_en',
        'requirements_de',
        'requirements_en',
    ];
    public $jobs_labels = [
        'Title de',
        'Title en',
        'Person\'s name',
        'Email',
        'Street',
        'street num',
        'post code',
        'Country',
        'City',
        'Local country de',
        'local city_de',
        'local country_en',
        'loc city en',
        'Start date',
        'Salary',
        'Desc company de',
        'Desc company en',
        'Desc job de',
        'Desc job en',
        'Requirements de',
        'Requirements en',
    ];
    public $placeholder = [
        'title_de',
        'title_en',
        'Person\'s name',
        'email',
        'street',
        'street num',
        'post code',
        'country',
        'city',
        'Local country de',
        'local city_de',
        'local country en',
        'loc city en',
        'Start date',
        'salary',
        'description company de',
        'description company en',
        'description job de',
        'description job en',
        'requirements de',
        'requirements en',
    ];

    public function search(Request $request)
    {
        $search = $request->input('search');
        if ($request->input('exact_match')) {
            $jobs = Job::search($search, false)->where('deleted_at', '=', null)->get();
        } else {
            $jobs = Job::search($search)->where('deleted_at', '=', null)->get();
        };


// basic usage, fulltext search for '*jarek*' or '*sofa*' thru defined columns
        //User::search('jarek sofa')->get();

// exact search for 'jarek tkaczyk' thru defined columns
        //User::search('"jarek tkaczyk"', false)->first();


        $data = [
            'lang' => \App::getLocale(),
            'page_title' => 'Jobs',
            'jobs' => $jobs,
            'search' => $search,
            'search_result' => $jobs->count(),

        ];

        return view('job/list', $data);


    }

    public function index(Request $request)
    {


        /*
  This function returns an array with keys

  "name"     // the name of the found page
  "url"      // the url of the found page
  "snippet"  // a little piece of text found on the page
*/
        //      $searchResults = GoogleSearch::getResults('The meaning of life'); // is 42 Paginate(5);

        $jobs = Job::where('deleted_at', '=', null)->Paginate(5);

        $search = '';
        $data = [
            'lang' => \App::getLocale(),
            'page_title' => 'Jobs',
            'jobs' => $jobs,
            'search' => $search,
            'search_result' => $jobs->total(),
        ];
        return view('job/list', $data);
    }


    public function create()
    {
        $data = [
            'page_title' => 'Add new job',
            'list' => $this->jobs_list,
            'labels' => $this->jobs_labels,
            'placeholder' => $this->placeholder,
        ];

        return view('job/create', $data);
    }


    public function store(Request $request)
    {

        //  return dd($request);
        $this->validate($request, [
            'title_de' => 'required|min:5|max:256',
            'title_en' => 'required|min:5|max:256',
            'person' => 'required|min:5|max:256',
            'email' => 'required|email',
            'street' => 'required|min:5|max:256',
            'street_num' => 'required|integer',
            'post_code' => 'required|integer',
            'country' => 'required|min:2|max:256',
            'city' => 'required|min:3|max:256',
            'loc_country_de' => 'required|min:5|max:256',
            'loc_city_de' => 'required|min:5|max:256',
            'loc_country_en' => 'required|min:5|max:256',
            'loc_city_en' => 'required|min:5|max:256',
            'salary' => 'required|integer',
            'desc_company_de' => 'required|min:5|max:256',
            'desc_company_en' => 'required|min:5|max:256',
            'desc_job_de' => 'required|min:5|max:2560',
            'desc_job_en' => 'required|min:5|max:2560',
            'requirements_de' => 'required|min:5|max:2560',
            'requirements_en' => 'required|min:5|max:2560',
        ]);


        $job = new Job;
        foreach ($this->jobs_list as $item) {

            if ($item == 'time') {
                $time = explode(" - ", $request->input('time'));
                $job->start_date = $this->change_date_format($time[0]);
                continue;
            }
            $job->$item = $request->input($item);
        }

        $job->save();
        //   $this->job_pdf_create($job->id);
        $this->job_pdf_create_alone($job->id);
//        $joba = (new CreateJobPdf($job->id))->delay(5);
//        $this->dispatch($joba);


        $request->session()->flash('success', 'The job was successfully saved!');
        return redirect('jobs/create');
    }


    public function show($id)
    {
        $job = Job::findOrFail($id);
        $pdf_name = md5($id . $job->title_de);
        $data = [
            'page_title' => $job->title,
            'job' => $job,
            'pdf_name' => $pdf_name,
        ];
        return view('job/view', $data);
    }


    public function edit($id)
    {
        $job = Job::findOrFail($id);
        $job->start_date = $this->change_date_format_fullcalendar($job->start_date);
        $data = [
            'page_title' => 'Edit ' . $job->title,
            'job' => $job,
            'list' => $this->jobs_list,
            'labels' => $this->jobs_labels,
            'placeholder' => $this->placeholder,
        ];

        return view('job/edit', $data);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title_de' => 'required|min:5|max:256',
            'title_en' => 'required|min:5|max:256',
            'person' => 'required|min:5|max:256',
            'email' => 'required|email',
            'street' => 'required|min:5|max:256',
            'street_num' => 'required|integer',
            'post_code' => 'required|integer',
            'country' => 'required|min:2|max:256',
            'city' => 'required|min:3|max:256',
            'loc_country_de' => 'required|min:5|max:256',
            'loc_city_de' => 'required|min:5|max:256',
            'loc_country_en' => 'required|min:5|max:256',
            'loc_city_en' => 'required|min:5|max:256',
            'salary' => 'required|integer',
            'desc_company_de' => 'required|min:5|max:256',
            'desc_company_en' => 'required|min:5|max:256',
            'desc_job_de' => 'required|min:5|max:2560',
            'desc_job_en' => 'required|min:5|max:2560',
            'requirements_de' => 'required|min:5|max:2560',
            'requirements_en' => 'required|min:5|max:2560',
        ]);
        $time = explode(" - ", $request->input('time'));
        $job = Job::findOrFail($id);
        $job->update($request->all());
        $this->job_pdf_create_alone($id);
        return redirect('jobs');
    }


    public function destroy($id)
    {
        $job = Job::find($id);
        $pdf_name = public_path() . '/uploads/pdfs/' . md5($id . $job->title_de) . '.pdf';
        $job->delete();
        Storage::delete($pdf_name);
        return redirect('jobs');
    }


    public function change_date_format($date)
    {
        $time = DateTime::createFromFormat('d/m/Y', $date);
        return $time->format('Y-m-d ');
    }

    public function change_date_format_fullcalendar($date)
    {
        $time = DateTime::createFromFormat('Y-m-d', $date);
        return $time->format('d/m/Y');
    }

    public function job_pdf($id)
    {
        $lang = \App::getLocale();
        $job = Job::findOrFail($id);
        $pdf_name = public_path() . '/uploads/pdfs/' . md5($id . $job->title_de) . '_' . $lang . '.pdf';
        if (File::exists($pdf_name)) {
            return response()->download($pdf_name);
        };
        $this->job_pdf_create_alone($id);
        return response()->download($pdf_name);
    }

    public function job_pdf_create($id)
    {
        $job = Job::findOrFail($id);

//        $job->start_date = $this->change_date_format_fullcalendar($job->start_date);
//        $lang = \App::getLocale();
//
//        $data = [
//            'job' => $job,
//            'lang' => $lang,
//        ];
//        $html = \View::make('pdf/view', $data)->render();
//        $pdf = \App::make('dompdf.wrapper');
//        $pdf->loadHTML($html);
//        $destinationPath =  public_path().'/uploads/pdfs/';
//        $pdf_name = md5($id . $job->title_de);
//        $pdf->save($destinationPath . $pdf_name . '.pdf');
//        return $pdf->stream();


        $joba = (new CreateJobPdf($job->id))->delay(5);
        $this->dispatch($joba);
    }

    public function job_pdf_create_alone($id)
    {
        $job = Job::findOrFail($id);
        $langs = ['en', 'de'];
        foreach ($langs as $lang) {
            \App::setLocale($lang);
            $data = [
                'job' => $job,
                'lang' => $lang,
            ];
            $view = 'pdf/view' . '_' . $lang;
            $html = \View::make($view, $data)->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($html);
            $destinationPath = public_path() . '/uploads/pdfs/';
            $pdf_name = md5($id . $job->title_de);
            $pdf->save($destinationPath . $pdf_name . '_' . $lang . '.pdf');
        };


    }
}
