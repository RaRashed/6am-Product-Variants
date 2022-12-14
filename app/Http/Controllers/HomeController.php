<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function adminHome()

    {

        return view('admin.mindex');

    }
    function changeLang($langcode){
        //dd($langcode);

        App::setLocale($langcode);
        session()->put("lang_code",$langcode);
        return redirect()->back();

    }


}
