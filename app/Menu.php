<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{

    private $lang;
    protected $table='menus';
    protected $fillable =  ['parent','name_de','name_en','url'];

    public function __construct()
    {
        $this->lang = \App::getLocale();
    }

    public function getNameAttribute()
    {
        return $this->attributes['name_' . $this->lang];
    }

}


