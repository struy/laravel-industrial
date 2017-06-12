<?php


return [

    'title' => 'Categories',
    'single' => 'category',
    'model' => 'App\Category',
    'columns' => [
        'id',
        'name_de',
        'name_en'
    ],
    'edit_fields' => [
        'name_de' => [
            'type' => 'text',
        ],
        'name_en' => [
            'type' => 'text',
        ]

    ],


];