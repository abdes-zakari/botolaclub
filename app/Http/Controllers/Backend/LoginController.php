<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function index(){
        
    	return view('backend.login');
    }

    public function CheckLogin(Request $request){//sleep(4);

        //$request->session()->regenerate();
        
        if ($request->input('username') && $request->input('password')) {

    		$username=$request->post('username');
    		$password=$request->post('password');

    		//$results = DB::select("select password from users where username='".$username."' and password='".$password."' ");

            $countUser=DB::table('admins')->where('username', $username)->count();
            //print_r($countUser);die();

            if ($countUser==1) {
                
                $admin=DB::table('admins')->where('username', $username)->first();

                if ($admin->password && Hash::check($password, $admin->password) ) {
                     
                     Session::put('id_admin', $admin->id);
                     Session::put('username_admin', $username);
                     Session::put('password_admin', $admin->password);
                     Session::save();

                     if ($request->session()->has('lastUrl')) {

                         $lastUrl=$request->session()->get('lastUrl');
                         $request->session()->forget('lastUrl');
                         Session::save(); 
                         return redirect($lastUrl);                    
                     }
                     else
                     {
                          //return redirect()->route('abdes');

                          $response = array('status'=>true, 'redirectTo'=>url('/'));
                          return redirect(url('/admin'));  
                          // echo json_encode($response);
                     }
                
                }
                else{
                    $response = array('status'=>false, 'msg'=>'Passwort ist ungültig !!');
                    // echo json_encode($response);

                }
            }
    		else{
    			//return redirect()->route('login');
                $response = array('status'=>false, 'msg'=>'Benutzername ist ungültig !!');
                // echo json_encode($response);
    		}
    	}
        else
        {  //return redirect()->route('login');
           $response = array('status'=>false, 'msg'=>'Bitte ein  gültige Benutzername und Passwort  eingeben !!');
           // echo json_encode($response);  
        }

        Session::flash('message',$response['msg']);
        return redirect(url('/admin/login'));  

    }
    
    public function logout(Request $request){

      $request->session()->forget('username_admin');
      $request->session()->forget('password_admin');
      $request->session()->flush();
     // Cache::flush();
      $request->session()->regenerate();
      return redirect()->route('loginAdmin');

    }
    public function hashStringOrPassword(){

    	echo "1234 is hashed: ".Hash::make("1234");die();
    }

      
}


