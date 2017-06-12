<?php


return [

    'title' => 'AKnowledges',
    'single' => 'knowledge',
    'model' => 'App\Knowledge',
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