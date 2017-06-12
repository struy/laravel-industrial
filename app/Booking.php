<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';
    public $timestamps = true;


    protected $fillable = ['text', 'start_time', 'end_time', 'confirmed'];

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function services()
    {
        return $this->belongsTo('App\ProjectService', 'project_services_id', 'id');
    }


}
