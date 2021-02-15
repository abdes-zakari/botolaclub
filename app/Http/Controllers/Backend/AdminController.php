<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    
    public function __construct(){

    	// $this->middleware('preventBackHistory');
    	// $this->middleware('checkAuth');
    }
	
	
	 /**
     * Render index
     * @param -
     * @return Illuminate\View\View 
     */
    public function index(){
        
       //echo "index";
    	$countUser = \App\Models\User::count();
    	$countGame = \App\Models\Game::count();
    	
    	return view('backend.index',compact('countUser','countGame'));
    }

      
}


