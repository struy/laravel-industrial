<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectService extends Model
{
    private $lang;

    protected $table = 'project_services';
    public $timestamps = false;

    protected $fillable = ['name_de', 'name_en', 'duration', 'duration_desc_de', 'duration_desc_en',
        'result_de', 'result_en', 'description_de', 'description_en', 'background_de', 'background_en',
        'cost', 'project_categories_id', 'project_categories_id'];

    public function __construct()
    {
        $this->lang = \App::getLocale();
    }

    public function getNameAttribute()

    {
        return $this->attributes['name_' . $this->lang];
    }


    public function getBackgroundAttribute()

    {

        return $this->attributes['background_' . $this->lang];
    }


    public function getResultAttribute()

    {

        return $this->attributes['result_' . $this->lang];
    }


    public function getDurationDescriptionAttribute()

    {

        return $this->attributes['duration_desc_' . $this->lang];
    }


    public function getDurationInDaysAttribute()

    {

        $val = $this->attributes['duration'];
        if ($this->lang == 'en') {
            $named = ['hours', 'day', 'days'];
        } else $named = [' Stunden ', ' Tag ', ' Tag '];

        if($val ==0){
            return 'TBD';
        }

        if ($val < 24) {
            return $val . '&nbsp;' . $named[0];

        };
        if ($val / 24 == 1) {
            return '1 &nbsp; ' . $named[1];
        };
        return round($val / 24, 1, PHP_ROUND_HALF_DOWN) . '&nbsp;' . $named[2];
    }


    public function getDescriptionAttribute()

    {

        return $this->attributes['description_' . $this->lang];
    }


    public function getMyKnowledgesAttribute()

    {
        $id = $this->id;
        $service = ProjectService::find($id);
        $data = [];
        foreach ($service->knowledges as $knowledge) {
            array_push($data, $knowledge->name_en);
        }
        $result = implode(', ', $data);
        return $result;
    }


    public function category()
    {
        return $this->belongsTo('App\Category', 'project_categories_id');
    }

    public function booking()
    {
        return $this->hasMany('App\Booking', 'project_services_id', 'id');
    }


    public function knowledges()
    {
        return $this->belongsToMany('App\Knowledge', 'services_has_knowledges',
            'project_services_id', 'project_knowledges_id');
    }
}
