<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use Illuminate\Support\Facades\Input;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'devmode']
    ],
    function () {
        /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/

        Route::get('/', 'WelcomeController@index');
        Route::get('/offers/create/{id}', 'OfferController@create');
        Route::get('/api', 'BookingController@api');
        Route::get('/calendar','BookingController@calendar');
        Route::get('jobs/pdf/{id}', 'JobController@job_pdf');
        Route::get('/pages/{page}', function (App\Page $page) {
            return view('pages/view', compact('page'));
        });
        Route::group(['middleware' => 'web'], function () {
            Route::get('/home', 'HomeController@index');
        });

        Route::post('contact',['as' => 'contact_store', 'uses' => 'ContactController@store']);
        Route::post('search_job', 'JobController@search');


        Route::resource('projectservices', 'ProjectServiceController');
        Route::resource('bookings', 'BookingController');
        Route::resource('offers', 'OfferController');
        Route::resource('jobs', 'JobController');
        Route::auth();

    });

/** OTHER PAGES THAT SHOULD NOT BE LOCALIZED **/

Route::group(['middleware' => ['devmode']], function () {
    Route::auth();
});

Route::get('/offers/create/{id}', 'OfferController@create');
Route::post('ajaximage', 'AjaxImageController@index');
Route::resource('jobs', 'JobController');
Route::auth();
