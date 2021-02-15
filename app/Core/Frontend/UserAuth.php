<?php

namespace App\Core\Frontend;
use Session;
use DB;

class UserAuth
{   
    
    public static function CheckAuth(){

        $email=Session::get('user_email');
        $password=Session::get('user_password');
    
        if (!empty($email) && !empty($password) ) {
            
            $countUser=DB::table('users')->where('email', $email)->count();
            if ($countUser==1) {
                
                $user=DB::table('users')->where('email', $email)->first();

                if ($user->password && $password===$user->password ) {
                     
                     return true;
                }
                else{
                    return false;
                }
            }
            else{
                return false;
            }           
        }
        else{

            return false;
        }

    }

}



