<?php


return [

    'title' => 'Menu',
    'single' => 'item',
    'model' => 'App\Menu',
    'columns' => [
        'id',
        'parent',
        'url',
        'name_en',
        'name_de',

//        'my_roles'=>[
//            'title'=>'roles'
//        ],



    ],
    'edit_fields' => [
        'parent' => [
            'type' => 'number',
        ],

        'url' => [
            'type' => 'text',
        ],

        'name_en' => [
            'type' => 'text',
        ],

        'name_de' => [
            'type' => 'text',
        ],





    ],


];