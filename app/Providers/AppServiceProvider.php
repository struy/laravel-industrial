<?php

namespace App\Providers;

use App\Menu;
use App\Job;
use Illuminate\Support\ServiceProvider;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
 /*       Menu and language in all view*/
        $lang = \App::getLocale();
        $menus = Menu::all();
        $collection = Job::where('deleted_at', '=', null)->get();
        $chunk = $collection->sortByDesc('created_at')->take(5);
        $chunk->all();
        View::share(['menus' => $menus, 'jobs_list' => $chunk,'lang' => $lang]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
