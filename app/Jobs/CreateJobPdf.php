<?php

namespace App\Jobs;

use  DateTime;
use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Job as Joba;

class CreateJobPdf extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        //
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $job = Joba::findOrFail($this->id);
         $langs = ['en', 'de'];
          foreach ($langs as $lang) {
            \App::setLocale($lang);
            $lang = \App::getLocale();
            $data = [
                'job' => $job,
                'lang' => $lang,
            ];
            $html = \View::make('pdf/view', $data)->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($html);
            $destinationPath = public_path() . '/uploads/pdfs/';
            $pdf_name = md5($this->id . $job->title_de);
            $pdf->save($destinationPath . $pdf_name . '_' . $lang . '.pdf');
        }
    }

    public function change_date_format_fullcalendar($date)
    {
        $time = DateTime::createFromFormat('Y-m-d', $date);
        return $time->format('d/m/Y');
    }


}
