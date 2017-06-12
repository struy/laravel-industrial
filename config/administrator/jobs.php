<?php


return [

    'title' => 'Jobs',
    'single' => 'job',
    'model' => 'App\Job',
    'columns' => [
        'id',
//        'title_de',
        'title_en' =>[
            'title' => 'title'
        ],
        'person' =>[
            'title' => 'name'
        ],
        'email',
        'street',
        'street_num' =>[
            'title' => 'num'
        ],
        'post_code',
        'country',
        'city',
     //   'loc_country_de',
     //   'loc_city_de',
        'loc_country_en' =>[
            'title' => 'loc_country'
        ],
        'loc_city_en' =>[
            'title' => 'loc_city'
        ],
        'start_date',
        'salary',
  //      'desc_company_de',
        'desc_company_en' =>[
            'title' => 'desc_company'
        ],
    //    'desc_job_de',
        'desc_job_en',
 //       'requirements_de',
        'requirements_en'  =>[
            'title' => 'requirements'
        ],

    ],
    'edit_fields' => [

        'title_de' => [
            'type' => 'text',
        ],
        'title_en'=> [
            'type' => 'text',
        ],
        'person'=> [
            'type' => 'text',
            'title' => 'Person name'
        ],
        'email'=> [
            'type' => 'text',
        ],
        'street'=> [
            'type' => 'text',
        ],
        'street_num'=> [
            'type' => 'text',
            'title' => 'street number'
        ],
        'post_code' => [
            'type' => 'number',
        ],
        'country'=> [
            'type' => 'text',
        ],
        'city'=> [
            'type' => 'text',
        ],
        'loc_country_de'=> [
            'title' => 'Local country de',
            'type' => 'text',
        ],
        'loc_city_de'=> [
            'type' => 'text',
            'title' => 'Local city de',
        ],
        'loc_country_en'=> [
            'type' => 'text',
            'title' => 'Local country en',
        ],
        'loc_city_en'=> [
            'type' => 'text',
            'title' => 'Local city en',
        ],
        'start_date'=> [
            'type' => 'date',
        ],
        'salary'=>[
        'type' => 'number'
    ],
        'desc_company_de' => [
            'title' => 'Description company  de',
            'type' => 'textarea',
        ],
        'desc_company_en' => [
            'title' => 'Description company  en',
            'type' => 'textarea',
        ],
        'desc_job_de' => [
            'title' => 'Description job en',
            'type' => 'textarea',
        ],
        'desc_job_en' => [
            'title' => 'Description job de',
            'type' => 'textarea',
        ],
        'requirements_de' => [
            'type' => 'textarea',
        ],
        'requirements_en' => [
            'type' => 'textarea',
        ],

    ],


];