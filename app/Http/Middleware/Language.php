<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;


class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(session()->has("lang_code")){
            App::setLocale(session()->get("lang_code"));
        }
        return $next($request);
        // if (Session::get('lang_code') != null) {
        //     App::setLocale(Session::get('lang_code'));
        // }else{
        //     Session::put('lang_code', "en");
        //     App::setLocale(Session::get('lang_code'));
        // }
        // return $next($request);
    }


}
