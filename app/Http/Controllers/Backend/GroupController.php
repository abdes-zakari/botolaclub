<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Group;
use Redirect;
use Validator;
use Session;
use View;

class GroupController extends Controller
{
    
    public function __construct(){

    	// $this->middleware('preventBackHistory');
    	// $this->middleware('checkAuth');
    }
	
    public function index(){
        
        $groups = Group::all();
        return View::make('backend.group.index')->with('groups', $groups);

    	// return view('backend.team.index');
    }
    
    /**
     * Add new Team
     * @param Request $request
     * @return BackUrl
     */

    public function addGroup(Request $request){

        $rules = array(
                      'name_group'  => 'required'
                     );
   
        $validator = Validator::make($request->all(), $rules);
 
        if ($validator->fails()) {
 
            return Redirect::back();
            // return Redirect::back()->withErrors($validator);

        }else{
           
            $group= new Group;
            $group->name  = $request->input('name_group');
            $group->save();
            // group::create($request->all());
            // Session::flash('MsgSavedteam', Messages::getSuccessMessage());
            return Redirect::back();
         }

    }

      
}


