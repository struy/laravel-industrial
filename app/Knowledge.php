<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Knowledge extends Model
{
    protected $table = 'project_knowledges';
    protected $fillable = ['name'];
    public $timestamps =false;


    public function services()
    {
        return $this->belongsToMany('App\ProjectService','services_has_knowledges','project_knowledges_id','project_services_id');
    }



}
