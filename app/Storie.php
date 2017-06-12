<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Storie extends Model
{

    private $lang;

    protected $table='stories';
    protected $fillable =  ['title_en','content_en','content_de','title_de','link'];

    public function __construct()
    {
        $this->lang = \App::getLocale();
    }

    public function getTitleAttribute()
    {
        return $this->attributes['title_' . $this->lang];
    }

    public function getContentAttribute()
    {
        return $this->attributes['content_' . $this->lang];
    }



}
