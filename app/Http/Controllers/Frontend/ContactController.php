<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Contact;
use Redirect;
use Validator;
use Session;
use View;

class ContactController extends Controller
{
    // public $lang;

    public function __construct(){

      // $this->middleware(function ($request, $next) {

      //          $this->user_id=Session::get('user_id');
      //          $user=User::find($this->user_id);
      //          View::share('user', $user);

      //          return $next($request);
      //   });
       // $this->lang=\App::getLocale();
    }
	  
    /**
     * Render Profile User page
     * @return Illuminate\View\View 
     */

    public function index(){
        
        $template=(currentLang()=='ar' ? 'frontend.contact_ar' : 'frontend.contact');

        return view($template);
    }
    
    
    /**
     * Send Email from Contact Page (now store it just in Database)
     * @param -
     * @return void
     */

    public function send(Request $request){

      $rules = array( 
                      'email'       => 'required|email',
                      'message'     => 'required'
                      // 'username'    => 'required|min:4|unique:users',
                      // 'email'       => 'required|email|unique:users'
                     );

       $validator = Validator::make($request->all(), $rules);
       
       if ($validator->fails()) {
              // echo "Error:  ";
            return Redirect::back()->withErrors($validator);

       }else{

                $contact= new Contact();
                $contact->email   = $request->input('email');
                $contact->message = $request->input('message');
                $contact->from_ip = request()->ip();
                $contact->save();
                Session::flash('messageSent',getSentMessage());
            
       }
       return Redirect::back();
    
    }    

    public function homeCompetition(){
      
       return view('frontend.account.home');

    }


      
}


