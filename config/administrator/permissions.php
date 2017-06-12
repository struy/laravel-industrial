<?php


return [

    'title' => 'Permissions',
    'single' => 'permission',
    'model' => 'App\Permission',
    'columns' => [
        'id',
        'name',
        'display_name',
        'description',


        'role' => [
            'type' => 'relationship',
            'title' => 'knowledges',
            'name_field' => 'name',
            'select' => '(:table).name',
        ],


    ],
    'edit_fields' => [

        'name' => [
            'type' => 'text',
        ],

        'display_name' => [
            'type' => 'text',
        ],
        'description' => [
            'type' => 'text',
        ],



    ],


];