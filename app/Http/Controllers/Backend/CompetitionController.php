<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Competition;
use Redirect;
use Validator;
use Session;
use View;

class CompetitionController extends Controller
{
    
    public function __construct(){

    	// $this->middleware('preventBackHistory');
    	// $this->middleware('checkAuth');
    }
	
    public function index(){
      // $this->handle();
        
        // $competitions = Competition::all();
        $competitions = Competition::with('compType')->get();
      // $competitions= Competition::find(1);
      // $competitions=$competitions->compType;
        //   pp($competitions);
        // pp($competitions[0]->compType->type);
        return View::make('backend.competition.index')->with('competitions', $competitions);

    	// return view('backend.team.index');
    }

    // public function handle(){
    //   echo date("Y");
    //   die();

    // }
    
    /**
     * Add new Competition
     * @param Request $request
     * @return BackUrl
     */
    
    public function addCompetition(Request $request){

      $rules = array(
                      'logo_competition' => 'image|mimes:jpeg,jpg,png,gif,svg|max:2048',
                      'name_competition' => 'required',
                      'competitionType'  => 'required',
                      'round_number'     => 'required',
                      'saison'           => 'required'
                      // 'email'           => 'required|email|unique:users'
                     );

       $validator = Validator::make($request->all(), $rules);
       
       if ($validator->fails()) {
              // echo "Error:  ";
            return Redirect::back()->withErrors($validator);

       }else{
            // echo "Goood n ";
            $competition= new Competition();
            $competition->name=$request->input('name_competition');
            $competition->type_id=$request->input('competitionType');
            $competition->round_number=$request->input('round_number');
            $competition->saison=$request->input('saison');
            if ($request->hasFile('logo_competition')) {
    
                    $image=$request->file('logo_competition');
                    $image_name=quickRandom()."-".$image->getClientOriginalName();
                    $competition->logo = $image_name;
                    $image->move(public_path('images/logo_competitons'),$image_name);
            }
            $competition->save();
       }

       return Redirect::back();
      // die();
         
      //    if ($request->hasFile('user_avatar')) {
      //         print_r($_POST);
      //         // print_r($request->file('user_avatar'));
      //         echo "<br>";
      //         $file=$request->file('user_avatar');
      //          //Display File Name
      // echo 'File Name: '.$file->getClientOriginalName();
      // echo '<br>';
   
      // //Display File Extension
      // echo 'File Extension: '.$file->getClientOriginalExtension();
      // echo '<br>';
   
      // //Display File Real Path
      // echo 'File Real Path: '.$file->getRealPath();
      // echo '<br>';
   
      // //Display File Size
      // echo 'File Size: '.$file->getSize();
      // echo '<br>';
   
      // //Display File Mime Type
      // echo 'File Mime Type: '.$file->getMimeType();
      //         die();
      //     }
       // $kaka=$request->input('username');
        // return Redirect::back();
    }

    public function deleteCompetition($id_competition){
       
       $competition=Competition::find($id_competition);

       $competition->delete();

       return Redirect::back();

    }

    public function addCompetitionddd(Request $request){

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


