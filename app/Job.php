<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTime;
use Illuminate\Database\Eloquent\SoftDeletes;
use Sofa\Eloquence\Eloquence;

class Job extends Model
{
    use SoftDeletes;
    use Eloquence;

    protected $searchableColumns = [
        'title_de',
        'title_en',
      //  'person',
      //  'email',
      //  'street',
      //  'street_num',
      //  'post_code',
       // 'country',
      //  'city',
        'loc_country_de',
        'loc_city_de',
        'loc_country_en',
        'loc_city_en',
        'start_date',
        'salary',
        'desc_company_de',
        'desc_company_en',
        'desc_job_de',
        'desc_job_en',
        'requirements_de',
        'requirements_en',

    ];

    protected $dates = ['deleted_at'];
    private $lang;
    protected $table = 'jobs';
    protected $fillable = [
        'id',
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
        'start_date',
        'salary',
        'desc_company_de',
        'desc_company_en',
        'desc_job_de',
        'desc_job_en',
        'requirements_de',
        'requirements_en',
    ];

    public function __construct()
    {
        $this->lang = \App::getLocale();
    }

    public function getTitleAttribute()
    {
        return $this->attributes['title_' . $this->lang];
    }

    public function getLocCountryAttribute()
    {
        return $this->attributes['loc_country_' . $this->lang];
    }

    public function getLocCityAttribute()
    {
        return $this->attributes['loc_city_' . $this->lang];
    }

    public function getDescCompanyAttribute()
    {
        return $this->attributes['desc_company_' . $this->lang];
    }

    public function getDescJobAttribute()
    {
        return $this->attributes['desc_job_' . $this->lang];
    }

    public function getRequirementsAttribute()
    {
        return $this->attributes['requirements_' . $this->lang];
    }

    public function getDateAttribute()
    { $date = $this->attributes['start_date'];
        $time = DateTime::createFromFormat('Y-m-d', $date);
        return $time->format('d/m/Y');
    }

    public function getSalaryEuroAttribute()
    {    if($this->attributes['salary']==0){
        return 'TBD';
    }
        return $this->attributes['salary'].' '.'&#8364;';
    }
    public function getSalaryCleanAttribute()
    {    if($this->attributes['salary']==0){
        return 'TBD';
    }
        return $this->attributes['salary'];
    }

    public function offers()
    {
        return $this->hasMany('App\Offer', 'job_id');
    }




}
