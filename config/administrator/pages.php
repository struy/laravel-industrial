<?php

/**
 * Actors model config
 */

return array(

    'title' => 'Pages',

    'single' => 'page',

    'model' => 'App\Page',

    /**
     * The display columns
     */
    'columns' => array(

        'slug' => array(
            'title' => 'slug',
        ),
        'title_de' => array(
            'title' => 'title-de',
        ),
       /* 'content_de' => array(
            'title' => 'Content-de',
        ),*/

        'title_en' => array(
            'title' => 'title-en',
        ),
       /* 'content_en' => array(
            'title' => 'Content-en',
        ),*/




    ),
    /**
     * The filter set
     */
    /* 'filters' => array(
         'id',
         'first_name' => array(
             'title' => 'First Name',
         ),
         'last_name' => array(
             'title' => 'Last Name',
         ),
         'films' => array(
             'title' => 'Films',
             'type' => 'relationship',
             'name_field' => 'name',
         ),
         'birth_date' => array(
             'title' => 'Birth Date',
             'type' => 'date'
         ),
     ),*/

    /**
     * The editable fields
     */
    'edit_fields' => array(
        'slug' => array(
            'title' => 'slug',
            'type' => 'text',
        ),
        'title_de' => array(
            'title' => 'title-de',
            'type' => 'text',
        ),
        'content_de' => array(
            'title' => 'content-de',
            'type' => 'wysiwyg',
        ),

        'title_en' => array(
            'title' => 'title-en',
            'type' => 'text',
        ),
        'content_en' => array(
            'title' => 'content-en',
            'type' => 'wysiwyg',
        ),


    ),

);