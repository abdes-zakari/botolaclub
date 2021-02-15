<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Stage;
use Redirect;
use Validator;
use Session;
use View;

class stageController extends Controller
{
    
    public function __construct(){

    	// $this->middleware('preventBackHistory');
    	// $this->middleware('checkAuth');
    }
	
    public function index(){
        
        $stages = Stage::all();

        return View::make('backend.stage.index')->with('stages', $stages);

    	// return view('backend.team.index');
    }
    
    /**
     * Add new Team
     * @param Request $request
     * @return BackUrl
     */

    public function addstage(Request $request){

        $rules = array(
                      'name_stage'  => 'required'
                     );
   
        $validator = Validator::make($request->all(), $rules);
 
        if ($validator->fails()) {
 
            return Redirect::back();
            // return Redirect::back()->withErrors($validator);

        }else{
           
            $stage= new Stage;
            $stage->name  = $request->input('name_stage');
            $stage->save();
            // stage::create($request->all());
            // Session::flash('MsgSavedteam', Messages::getSuccessMessage());
            return Redirect::back();
         }

    }

      
}


