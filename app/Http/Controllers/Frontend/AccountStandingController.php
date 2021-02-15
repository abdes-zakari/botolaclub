<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Game;
use App\Models\UserGames;
use Session;
use View;
use DB;

class AccountStandingController extends Controller
{

    public function __construct(){

    	// $this->middleware('preventBackHistory');
    	// $this->middleware('checkAuth');
      $this->middleware(function ($request, $next) {

               $this->user_id=Session::get('user_id');
               $user=User::find($this->user_id);
               View::share('user', $user);

                return $next($request);
        });
    }
	  
    /**
     * Render indexGame Page
     * @param - Request $request
     * @return view 
     */

    public function index(Request $request){

        $standing=UserGames::getStanding();
        $standing->links('pagination.bootstrap');
        $perPage     = $standing->perPage();
        $currentPage = $standing->currentPage();

        $template=(currentLang()=='ar' ? 'frontend.account.standing_ar' : 'frontend.account.standing');

        return view($template,compact('standing','perPage','currentPage'));

    }


}


