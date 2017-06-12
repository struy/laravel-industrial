<?php

namespace App\Http\Middleware;

use Closure;

class devmode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if( \Auth::id()== 1 ){
//            \Config::set('app.debug' , true);

            \Debugbar::enable();

        }
        else \Debugbar::disable();







        return $next($request);
    }
}
