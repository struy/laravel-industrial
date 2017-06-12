<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'project_categories';
    public $timestamps =false;
    protected $fillable = ['name_de', 'name_en'];


    public function categories()
    {
        return $this->hasMany('App\ProjectService','project_categories_id');
    }


}
