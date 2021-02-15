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

class TeamController extends Controller
{
    
    public function __construct(){

    	// $this->middleware('preventBackHistory');
    	// $this->middleware('checkAuth');
    }
	
    public function index(){
        
        $teams = team::all();
        return View::make('backend.team.index')->with('teams', $teams);

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
                      'flag'       => 'image|mimes:jpeg,jpg,png,gif,svg|max:2048'
                      // 'flag'       => 'required'
                     );
   
        $validator = Validator::make($request->all(), $rules);
 
        if ($validator->fails()) {
 
            return Redirect::back();
            // return Redirect::back()->withErrors($validator);

        }else{
           
            $team= new team;
            $team->name  = $request->input('name_team');
            $team->arabic_name=$request->input('arabic_name');
            $team->shortened = $request->input('shortened');
            // $team->flag = $request->input('flag');
            if ($request->hasFile('flag')) {
    
                    $image=$request->file('flag');
                    $image_name=quickRandom()."-".$image->getClientOriginalName();
                    $team->flag = $image_name;
                    $image->move(public_path('images/flags2'),$image_name);
            }
            $team->save();
            // team::create($request->all());
            // Session::flash('MsgSavedteam', Messages::getSuccessMessage());
            return Redirect::back();
         }

    }

      
}


