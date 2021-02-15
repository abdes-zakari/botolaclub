<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Team;
use App\Models\Game;
use Redirect;
use Validator;
use Session;
use View;
use URL;
use Illuminate\Support\Facades\Hash;
use Mail;
use App\Http\Controllers\Frontend\EmailController;
use App\Core\Frontend\UserAuth;
use DB;

class AccountController extends Controller
{

    public function __construct(){

    	// $this->middleware('preventBackHistory');
    	// $this->middleware('checkAuth');
      // app()->setLocale("ar");
       // $this->lang=\App::getLocale();
       // print_r($lang);
    }
	  
    /**
     * Render index(home)Page
     * @param -
     * @return Illuminate\View\View 
     */

    public function index(){
        
        if (UserAuth::CheckAuth()) {
             return redirect()->route('Homegame');
        }

        $teams=Team::all();
        $games=Game::gamesIndex();
        // pp($games);

        $template=(currentLang()=='ar' ? 'frontend.home_ar' : 'frontend.home');
        
        return view($template,compact('teams','games'));
        // return View::make('backend.game.index')->with('games', $games);
    }
    
    /**
     * Add new user Account
     * @param Request $request
     * @return void
     */

    public function register(Request $request){

        $rules = array(
                      'username'          => 'required|min:4|unique:users',
                      'email'             => 'required|email|unique:users',
                      'password'          => 'required|confirmed|min:6',
                      'password_confirmation'  => 'required',
                     );
   
        $validator = Validator::make($request->all(), $rules);
 
        if ($validator->fails()) {
 
             //return Redirect::back()->withErrors($validator);
             $request->session()->flash('username_redirect', $request->input('username'));
             $request->session()->flash('email_redirect', $request->input('email'));
             $url = URL::route('Home', '#register');
             return Redirect::to($url)->withErrors($validator);

        }else{
            $ip=request()->ip(); // \Request::ip(),$ip='57.43.71.39';
            $ip_infos=ipInfos($ip); // get infos by IP
            $email=$request->input('email');
            $token=$this->generateToken(60,$email);
            $user= new User;
            $user->username   = $request->input('username');
            $user->email      = $request->input('email');
            $user->password   = Hash::make($request->input('password'));
            $user->user_ip    = $ip;//request()->ip(); // \Request::ip(),
            if ($ip_infos) {
                $user->city_ip    = $ip_infos->city;
                $user->country_ip = $ip_infos->country_name;
            }
            $user->verification_token  = $token;
            $user->actived=1;
            $user->save();
            // EmailController::sendVerificationEmail($token,$email);
            // Session::flash('accountSuccessCreated',
            //                'Your account has been successfully created. Please check your email to activated your account.');
             $this->relogin($user->id,$user->email,$user->password);
            

            $url = URL::route('Home');
            return Redirect::to($url);
         }

    }
    
     /**
     * Confrim Email adresse 
     * @param Request $request [$token]
     * @return void
     */

    public function confirmEmail(Request $request){

        $token=$request->input('token');
        $user=User::where('verification_token', $token)->first();

        if ($user) {
            $user->actived=1;
            $user->verification_token='';
            $user->save();
            Session::flash('accountConfirmed','Your email address has been successfully verified');
        }

        $url = URL::route('Home');
        return Redirect::to($url);
    }  
    
    /**
     * Check User Authentification
     * @param Request $request [$email,$password]
     * @return void
     */

    public function CheckLogin(Request $request){

      if ($request->input('email') && $request->input('password')) {

        $email=$request->post('email');
        $password=$request->post('password');
        $countUser=DB::table('users')->where('email', $email)->count();

            if ($countUser==1) {
                $user=DB::table('users')->where('email', $email)->first();

                if ($user->actived==0 ) {

                    Session::flash('status','danger');
                    Session::flash('back_message','Your account is not actived please check your Email.');
                    return redirect()->route('login_frontend');
                }

                if ($user->password && Hash::check($password, $user->password) ) {
                     
                     Session::put('user_id', $user->id);
                     Session::put('user_email', $email);
                     Session::put('user_password', $user->password);
                     Session::save();

                     if ($request->session()->has('lastUrlFrontend')) {

                         $lastUrl=$request->session()->get('lastUrlFrontend');
                         $request->session()->forget('lastUrlFrontend');
                         Session::save(); 
                         return redirect($lastUrl);                    
                     }
                     else
                     {
                          return redirect()->route('Homegame');
                        
                     }
                
                }
                else{

                    Session::flash('status','danger');
                    Session::flash('back_message',getLoginErrorMessage());
                    return redirect()->route('login_frontend');
                }
            }
        else{
                    Session::flash('status','danger');
                    Session::flash('back_message',getLoginErrorMessage());
                    return redirect()->route('login_frontend');
        }
      }
        else
        { 
                    Session::flash('status','danger');
                    Session::flash('back_message',getLoginErrorMessage());
                    return redirect()->route('login_frontend');
        }

    }
    
    /**
     * Reset Password View
     * @param Request $request
     * @return Illuminate\View\View 
     */

    public function resetPassword(Request $request){
       
       //request token 
       if ($request->input('token')) {

        $token=$request->input('token');
        $reset=DB::table('password_resets')->where('token', $token)->first();

        if ($reset) {
          return view('frontend.change_password',compact('token'));
        }
        else
        {
          Session::flash('status','danger');
          Session::flash('resetPasswordMessage',getInvalidTokenMessage());

        }
       }
       
       $template=(currentLang()=='ar' ? 'frontend.reset_password_ar' : 'frontend.reset_password');

       return view($template);
    }
    
     /**
     * Reset Password Post Method
     * @param Request $request
     * @return void
     */

    public function resetPasswordPush(Request $request){
      
      //save Token to user and send Email

      if ($request->input('email')) {
         $email=$request->input('email');
         $user=User::where('email', $email)->first();
         if ($user) {
            $token=$this->generateToken(60,$email);
            $data = array(
                         'user_id' => $user->id,
                         'token'   => $token
                          );
            DB::table('password_resets')->insert($data);
            EmailController::sendResetPassword($token,$email);

            Session::flash('status','success');
            Session::flash('resetPasswordMessage',getSuccessRecovery($email));
         }else{
          
            Session::flash('status','danger');
            Session::flash('resetPasswordMessage',getErrorRecovery());

         }

         return redirect()->route('reset_password');
       }


       //handle change Password if posted / if button change_password clicked

       if ($request->input('change_password')) {

           $rules = array(
                          'password'          => 'required|min:6|confirmed',
                          'password_confirmation'  => 'required',
                          );
   
           $validator = Validator::make($request->all(), $rules);
           if ($validator->fails()) {
               return Redirect::back()->withErrors($validator);
           }else{
               $token=$request->input('token_reset');
               $reset=DB::table('password_resets')->where('token', $token)->first();

               if ($reset) {

                   $user= User::find($reset->user_id);
                   $user->password  = Hash::make($request->input('password'));
                   $user->save();
                   DB::table('password_resets')->where('id',$reset->id)->delete();
                   Session::flash('status','success');
                   Session::flash('back_message','Your password has ben successfully changed.');
                   return view('frontend.login');
               }
           } 
        }

        return Redirect::back();
    }

    /**
     * Render login view
     * @param -
     * @return Illuminate\View\View 
     */

    public function login(){
      
       if (UserAuth::CheckAuth()) {
             return redirect()->route('Homegame');
        }

        $template=(currentLang()=='ar' ? 'frontend.login_ar' : 'frontend.login');

        return view($template);

    }

     /**
     * Logout User and Destroy the session
     * @param Request $request 
     * @return void
     */

    public function logout(Request $request){

      $request->session()->forget('user_email');
      $request->session()->forget('user_password');
      $request->session()->flush();
      $request->session()->regenerate();
      return redirect()->route('Home');

    }
    
    // Diese Function just for Reconnect user after Inscription später wiederstellen 
    public function relogin($user_id,$email,$password){
      
      Session::put('user_id', $user_id);
      Session::put('user_email', $email);
      Session::put('user_password', $password);
      Session::save();

    }


    /**
     * Generate a token
     * @param int $lenght
     * @param string $email
     * @return string 
     */

    private function generateToken($length,$email){
          
          $pattern = "0123456789qwertzuiopasdfghjklyxcvbnmQWERTZUIOPASDFGHJKLMNBVCXY";
          $random  = str_shuffle(str_repeat($pattern, $length));
          $token   = substr($random, 0, $length). md5($email);
          return $token;

    }

    public function pageGame(Request $request){
      

         return view('frontend.account.game');

    }

      
}


