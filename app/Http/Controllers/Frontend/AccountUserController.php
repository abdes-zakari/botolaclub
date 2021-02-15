<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserGames;
use Redirect;
use Validator;
use Session;
use View;
use URL;
use Illuminate\Support\Facades\Hash;
use App\Models\Competition;
use DB;
use Illuminate\Support\Collection;

class AccountUserController extends Controller
{
    
    public function __construct(){

      $this->middleware(function ($request, $next) {

               $this->user_id=Session::get('user_id');
               $user=User::find($this->user_id);
               View::share('user', $user);

               return $next($request);
        });

    }
	  
    /**
     * Render Profile User page
     * @param int $id
     * @return view
     */

    public function getProfile($id){
        
        $profile = User::find($id);
        $games   = UserGames::gamesPlayedByUser($id);

        $template=(currentLang()=='ar' ? 'frontend.account.profile_ar' : 'frontend.account.profile');

        return view($template,compact('profile','games'));
    }
    
    /**
     * Render Profile Edit page
     * @param -
     * @return view
     */

    public function editProfile(){
        
        // $ipo=request()->ip();

       $template=(currentLang()=='ar' ? 'frontend.account.profile_edit_ar' : 'frontend.account.profile_edit');
       
        return view($template);
    }
    
    /**
     * save  Profile DATA 
     * @param -
     * @return view 
     */

    public function saveProfile(Request $request){

      $rules = array(
                      'user_avatar' => 'image|mimes:jpeg,jpg,png,gif,svg|max:2048'
                      // 'username'    => 'required|min:4|unique:users',
                      // 'email'       => 'required|email|unique:users'
                     );

       $validator = Validator::make($request->all(), $rules);
       
       if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);

       }else{
            if (Session::get('user_id')==$request->input('id_user')) { //check Permisson to update
                $user= User::find($request->input('id_user'));
                $user->firstname   = $request->input('firstname');
                $user->lastname    = $request->input('lastname');
                $user->country     = $request->input('country');
                if ($request->hasFile('user_avatar')) {
    
                    $image=$request->file('user_avatar');
                    $image_name=quickRandom()."-".$image->getClientOriginalName();
                    $user->user_avatar = $image_name;
                    $image->move(public_path('frontend/img/avatars'),$image_name);
                }
            $user->save();
            }
       }
       return Redirect::back();
    }

    
    public function homeCompetition(){

       $competitions=Competition::all();
       
       $template=(currentLang()=='ar' ? 'frontend.account.home_ar' : 'frontend.account.home');

       return view($template,compact('competitions'));

    }

    public function homeCompetitionInFuture(){

       $competitions=Competition::all();
       // ppp($competitions);
       $user_id=Session::get('user_id');
       $user_competitions=DB::table('user_competitions')->where('user_id',$user_id)->get();
       // ppp($user_competitions);
       $competitions = $competitions->map(function ($competitions) use ($user_competitions) {

              $competitions['join']=$user_competitions->contains('competition_id', $competitions['id']);
             
              return $competitions;
    
       });
      
       return view('frontend.account.home',compact('competitions'));

    }

    public function joinCompetition(Request $request){

       if ($request->has('competition_id')) {
           // Session::get('user_id')
           $competition_id=$request->input('competition_id');
           $user_id=Session::get('user_id');
           $check=DB::table('user_competitions')
                    ->where([['competition_id',$competition_id],['user_id',$user_id]])
                    ->first();
            // pp($check);
           if (!$check) {
                DB::table('user_competitions')->insert(['competition_id' => $competition_id, 'user_id' => $user_id]);
                $response = array('status'=>'join', 'msg'=>'Success');
        
           }else{
                DB::table('user_competitions')->where([['competition_id',$competition_id],['user_id',$user_id]])->delete();
                $response = array('status'=>'unjoin', 'msg'=>'Success');
           }


            header('Content-Type: application/json');
            die(json_encode($response));
       }

       // return Redirect::back();

    }

      
}


