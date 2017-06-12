<?php


return [
    'title' => 'Users',
    'single' => 'user',
    'model' => 'App\User',
    'columns' => [
        'id',
        'name',
        'email',
        'phone',
        'company',
        'my_roles'=>[
            'title'=>'roles'
        ],
//        'roles' => [
//            'title' => 'Number of Roles',
//            'relationship' => 'roles',
//            //   'select' => '(:table).display_name',
//
//          'select' => "COUNT((:table).id)",
//        ],


    ],
    'edit_fields' => [
        'name' => [
            'type' => 'text',
        ],
        'email' => [
            'type' => 'text',
        ],
        'phone' => [
            'type' => 'number',
        ],
        'company' => [
            'type' => 'text',
        ],
        'password' => array(
            'type' => 'password',
            'title' => 'Password',
        ),
        'roles' => [
            'type' => 'relationship',
            'title' => 'roles',
            'name_field' => 'display_name',
            'select' => '(:table).display_name',
        ],


    ],


];