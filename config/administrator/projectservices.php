<?php


return [

    'title' => 'PServices',
    'single' => 'service',
    'model' => 'App\ProjectService',
    'columns' => [
        'id',
        'name_de',
        'name_en',
        'my_knowledges'=> [
            'title'=> 'knowledges'
        ],
        'category' => [
            'title' => 'Category',
            'relationship' => 'category',
            'select' => '(:table).name_en',
        ],


//        'knowledges' => [
//            'title' => 'number of Knowledges',
//
//            'relationship' => 'knowledges',
//            'select' => "COUNT((:table).id)",
//            //   'select' => '(:table).name_en',
//
//
//        ],


        'duration' => [
            'title' => 'h'
        ],
        'duration_desc_de',
        'duration_desc_en',
        'result_de',
        'result_en',
        'cost' => [
            'title' => '€',
        ],
        'background_de',
        'background_en',
        'description_de',
        'description_en',


    ],


    /**
     * The filter set
     */
    'filters' => [

        'category' => [
            'title' => 'Categories',
            'type' => 'relationship',
            // 'name_field' => 'name_en',
            'select' => "CONCAT((:table).name_en, ' '",
        ],
    ],


    'edit_fields' => [
        'name_de' => [
            'type' => 'text',
        ],
        'name_en' => [
            'type' => 'text',
        ],

        'category' => [
            'type' => 'relationship',
            'title' => 'Category',
            'name_field' => 'name_en',
            'select' => '(:table).name_en',
        ],

        'knowledges' => [
            'type' => 'relationship',
            'title' => 'knowledges',
            'name_field' => 'name_en',
            'select' => '(:table).name_en',
        ],


        'duration' => [
            'type' => 'text',
        ],
        'duration_desc_de' => [
            'type' => 'textarea',
        ],
        'duration_desc_en' => [
            'type' => 'textarea',
        ],
        'result_de' => [
            'type' => 'textarea',
        ],
        'result_en' => [
            'type' => 'textarea',
        ],

        'cost' => [
            'type' => 'number',
            'title' => 'cost',
            'symbol' => '€',
        ],
        'background_de' => [
            'type' => 'textarea',
        ],
        'background_en' => [
            'type' => 'textarea',
        ],
        'description_de' => [
            'type' => 'textarea',
        ],
        'description_en' => [
            'type' => 'textarea',
        ],


    ],


];