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

        Route::get('/pages/{page}', function (App\Page $page) {
            return view('pages/view', compact('page'));
        });

        Route::get('/calendar', function () {
            $data = ['page_title' => 'Calendar' ];
            return view('booking/index', $data);
        });

        Route::post('contact',
            ['as' => 'contact_store', 'uses' => 'ContactController@store']);
        Route::post('search_job', 'JobController@search');

        Route::get('/', 'WelcomeController@index');
        Route::group(['middleware' => 'web'], function () {
            Route::get('/home', 'HomeController@index');
        });
        Route::auth();

        Route::resource('projectservices', 'ProjectServiceController');

        Route::resource('bookings', 'BookingController');

        Route::resource('jobs', 'JobController');

        Route::get('jobs/pdf/{id}', 'JobController@job_pdf');

        Route::resource('offers', 'OfferController');

        Route::get('/offers/create/{id}', 'OfferController@create');

        Route::get('/api', 'BookingController@api');

    });

/** OTHER PAGES THAT SHOULD NOT BE LOCALIZED **/

Route::group(['middleware' => ['devmode']], function () {
    Route::auth();
});
Route::resource('jobs', 'JobController');
Route::get('/offers/create/{id}', 'OfferController@create');
Route::post('ajaximage', 'AjaxImageController@index');
Route::auth();
