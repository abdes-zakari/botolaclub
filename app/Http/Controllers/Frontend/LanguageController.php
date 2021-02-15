<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;
use Session;
use URL;
use APP;

class LanguageController extends Controller
{
    
    public function __construct(){

    	// $this->middleware('preventBackHistory');
    	// $this->middleware('checkAuth');
    }
	
  
    /**
     * Change language USER 
     * @return void
     */

    public function toEN(){

        $lang=\App::getLocale();
        print_r($lang);
        // \App::setLocale("en");

        app()->setLocale("en");
        // return Redirect::back();

    }

    public function toFR(){
        
         \App::setLocale("fr");
        app()->setLocale("fr");
        $lang=\App::getLocale();print_r($lang);
        // return Redirect::back();

    }
      
}


