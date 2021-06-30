<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class Lang
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $lang = $request->session()->get('Lang');//get session lang
        $lang = $lang?? "en"; //if lang == null lang = en
        App::setLocale($lang); //set page language

        return $next($request); //pass 
    }
}
