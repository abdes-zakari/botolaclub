<?php

    /**
     * Get page Url 
     * @param Int $page
     * @return String 
     */

    function getPageUrl($page){

       return url()->current()."?page=".$page;
    }

    /**
     * decrement current page to left side number
     * @param Int $currentPage
     * @return int  
     */

    function leftPages($currentPage){
        
        $min=1;

        if ($currentPage>4) {

            $min=$currentPage-4;
        }

        return $min;
    }

    /**
     * Increment current page to right side number
     * @param Int $currentPage
     * @return int  
     */

    function rightPages($currentPage){
       
        return $currentPage+4;
    }


    /**
     * Initializ start time
     * @return int  
     */

    function startExecute(){
       
        $time = microtime();
        $time = explode(' ', $time);
        $time = $time[1] + $time[0];
        $start = $time;
        return $start;
    }


    /**
     * Initializ end time
     * @return int  
     */

    function finishExecute($start){
       
        $time = microtime();
        $time = explode(' ', $time);
        $time = $time[1] + $time[0];
        $finish = $time;
        $total_time = round(($finish - $start), 4);
        echo 'Page generated in '.$total_time.' seconds.';die();
    }



    function pp($arg){

        echo "<pre>"; print_r($arg);die();
    }

    function ppp($arg){

        echo "<pre>"; print_r($arg);echo "<br><br>";
    }


    function ipInfos($ip){

        try {
             $url="https://ipapi.co/{$ip}/json";
             $ip_details = json_decode(file_get_contents($url));
             if(isset($ip_details->city)){
                return $ip_details;
             }
             return false;
        } catch (\Throwable   $t) {
           
             return false;
        }

        return false;
    }


    function ipInfos2($ip){

        $ip_details="";
        $url="https://ipapi.co/{$ip}/json";
        if ($ip) {
            $ip_details = json_decode(file_get_contents($url));
            if(isset($ip_details->city)){
                return $ip_details;
            }
        }
        return false;
    }

    function urlExist($url){

        $file_headers = @get_headers($url);

        if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {

            return false;//die('false');
        }
        else {
            return true;//die('treee');
        }
    }
    
    /**
    * Generate a "random" alpha-numeric string.
    *
    * Should not be considered sufficient for cryptography, etc.
    *
    * @param  int  $length
    * @return string
    */

    function quickRandom($length = 20)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    
        return substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
    }


    /**
    * get Current Language of the Application.
    *
    *
    * @return string
    */

    function currentLang(){

        return \App::getLocale();
    }

    function getLoginErrorMessage(){

        $message='The email or password is incorrect.';

        if (\App::getLocale()=='ar') {

            $message=" البريد الإلكتروني أو كلمة السر غير صالحة ";
        }

        return $message;

    }

    function getSentMessage(){

        $message='Message was sent successfully.';

        if (\App::getLocale()=='ar') {

            $message="  تم إرسال الرسالة بنجاح   ";
        }

        return $message;

    }

    function getInvalidTokenMessage(){

        $message='Error: Invalid Token.';

        if (\App::getLocale()=='ar') {

            $message=" رابط استعادة الكلمة السرية غير صالح ";
        }

        return $message;

    }


    function getSuccessRecovery($email){

        $message='A recovery link has ben successfully sent to '.$email.' to reset the password.';

        if (\App::getLocale()=='ar') {

            $message="  تم إرسال رابط استعادة كلمة المرور بنجاح لهذا البريد الإلكتروني  $email ";
        }

        return $message;

    }


    function getErrorRecovery(){

        $message='We could not find that email address in our database.';

        if (\App::getLocale()=='ar') {

            $message="  هذا البريد الالكتروني غير مسجل عندنا     ";
        }

        return $message;

    }
    