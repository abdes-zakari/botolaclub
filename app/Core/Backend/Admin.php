<?php

namespace App\Core\Backend;
use Session;
use DB;

class Admin  
{   
    
    public static function CheckAuth(){

        $username=Session::get('username_admin');
        $password=Session::get('password_admin');
    
        if (!empty($username) && !empty($password) ) {
            
            $countUser=DB::table('admins')->where('username', $username)->count();
            if ($countUser==1) {
                
                $admins=DB::table('admins')->where('username', $username)->first();

                if ($admins->password && $password===$admins->password ) {
                     
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



