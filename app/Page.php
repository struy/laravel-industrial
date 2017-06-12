<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;


class Page extends Model
{
    use Sluggable;
    private $lang;

    protected $table='pages';
    protected $fillable =  [
        'slug','title_en','content_en','content_de','title_de'];

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


    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'slug'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }




}
