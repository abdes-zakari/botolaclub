<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Team;
use Redirect;
use Validator;
use Session;
use View;
use Illuminate\Support\Collection;

class UserController extends Controller
{
    
    public function __construct(){

    	// $this->middleware('preventBackHistory');
    	// $this->middleware('checkAuth');
    }
	
    public function index(){
        
        $users = \DB::table('users')->orderBy('created_at', 'desc')->paginate(8);
        // $users = \DB::table('users')->get();
        // $users = collect($users)->paginate(3);

        // echo "<pre>"; print_r($users); die();
        $users->links('pagination.custom');
        return View::make('backend.list_users')->with('users', $users);

    	// return view('backend.team.index');
    }
    
    /**
     * Add new Team
     * @param Request $request
     * @return BackUrl
     */

    public function addTeam(Request $request){

        $rules = array(
                      'name_team'  => 'required',
                      'shortened'  => 'required',
                      // 'flag'       => 'required'
                     );
   
        $validator = Validator::make($request->all(), $rules);
 
        if ($validator->fails()) {
 
            return Redirect::back();
            // return Redirect::back()->withErrors($validator);

        }else{
           
            $team= new team;
            $team->name  = $request->input('name_team');
            $team->shortened = $request->input('shortened');
            $team->flag = $request->input('flag');
            $team->save();
            // team::create($request->all());
            // Session::flash('MsgSavedteam', Messages::getSuccessMessage());
            return Redirect::back();
         }

    }

      
}


