<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    private $lang;
    protected $table = 'offers';
    protected $fillable = ['name', 'email', 'phone', 'address', 'attachment'];


    public function job()
    {
        return $this->belongsTo('App\Job', 'job_id');
    }


}
