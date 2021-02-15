<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use Redirect;
use Validator;
use Session;
use View;
use URL;
use Illuminate\Support\Facades\Hash;
use Mail;

class EmailController extends Controller
{
    
    public function __construct(){

    	// $this->middleware('preventBackHistory');
    	// $this->middleware('checkAuth');
    }

    /**
     * send Verification Email
     * @param String $token
     * @param String $to
     * @return void
     */
	
    public static function sendVerificationEmail($token,$to){
        
        // $title = 'hallo';
        // $content = 'das ist Email Larvael';

        $datas=['token' => $token];
        
        $send=Mail::send('emails.verification_email',$datas, function ($message) use ($to){

                     $message->subject("Botola Club : Activate Your Account");
         
                     $message->from('noreply@botolaclub.com', 'BotolaClub');
         
                     $message->to($to);

              });
        
        return $send;
        // return View::make('backend.game.index')->with('games', $games);
    }


    public static function sendResetPassword($token,$to){
        
        // $title = 'hallo';
        // $content = 'das ist Email Larvael';

        $datas=['token' => $token];
        
        $send=Mail::send('emails.reset_password',$datas, function ($message) use ($to){

                     $message->subject("Botola Club : Reset Your Password");
         
                     $message->from('noreply@botolaclub.com', 'BotolaClub');
         
                     $message->to($to);

              });
        
        return $send;
        // return View::make('backend.game.index')->with('games', $games);
    }

    
    /**
     * Add new user Account
     * @param Request $request
     * @return void
     */

    public function register(Request $request){

        $rules = array(
                      'username'          => 'required|unique:users',
                      'email'             => 'required|email|unique:users',
                      'password'          => 'required|confirmed|min:6',
                      'password_confirmation'  => 'required',
                     );
   
        $validator = Validator::make($request->all(), $rules);
 
        if ($validator->fails()) {
 
            // return Redirect::back();
          //return Redirect::back()->withErrors($validator);
             $request->session()->flash('username_redirect', $request->input('username'));
             $request->session()->flash('email_redirect', $request->input('email'));
             $url = URL::route('Home', '#register');
             return Redirect::to($url)->withErrors($validator);
            echo "<pre>"; print_r($validator->messages()); 
            die('Failure');

        }else{
            
            $token=$this->generateToken(60,$request->input('email'));
            $user= new User;
            $user->username  = $request->input('username');
            $user->email     = $request->input('email');
            $user->password  = Hash::make($request->input('password'));
            $user->verification_token  = $token;
            $status=$user->save();
             // echo "<pre>"; print_r($request->except('_token')); die();
             // User::create($request->except('password_confirmation'));
            echo $status;
             die('Succes');
            // Session::flash('MsgSavedteam', Messages::getSuccessMessage());
            return Redirect::back();
         }

    }

    public function pageGame(){
      
        return view('emails.send');
        $title = 'hallo';
        $content = 'das ist Email Larvael';

        Mail::send('emails.send', ['title' => $title, 'content' => $content], function ($message)
        {
            $message->subject("Hello from Botola Club");

            $message->from('me@gmail.com', 'Christian Nwamba');

            $message->to('chrisn@scotch.io');

        });

        return response()->json(['message' => 'Request completed Thanks for signing up! Please check your email.']);

        return view('frontend.game');
    }
    public function jsonValidation(Request $request){

       $key   = key($request->all());
       $value = $request->all()[$key];

       $rules = array(
                      $key => 'required|unique:users'
                     );
   
       $validator = Validator::make($request->all(), $rules);

       if ($validator->fails()) {
 
               $response = array('error'=>$validator->messages()->getMessages()[$key][0]);
               header('Content-Type: application/json');
               echo (json_encode($response));
               die();
        }else{
          // echo "no Problem";
        }

    }
    


    private function generateToken($length,$email){
          
          $pattern = "0123456789qwertzuiopasdfghjklyxcvbnmQWERTZUIOPASDFGHJKLMNBVCXY";

          $random  = str_shuffle(str_repeat($pattern, $length));
          
          $token   = substr($random, 0, $length). md5($email);

          return $token;

    }

      
}


