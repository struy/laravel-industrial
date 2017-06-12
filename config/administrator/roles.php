<?php


return [

    'title' => 'Roles',
    'single' => 'role',
    'model' => 'App\Role',
    'columns' => [
        'id',
        'name',
        'display_name',
        'description',

    ],
    'edit_fields' => [

        'name' => [
            'type' => 'text',
        ],

        'display_name' => [
            'type' => 'text',
        ],
        'description' => [
            'type' => 'number',
        ],



    ],


];