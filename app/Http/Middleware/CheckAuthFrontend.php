<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App\Core\Frontend\UserAuth;

class CheckAuthFrontend
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        if (!UserAuth::CheckAuth()) {

              $lastUrl=$request->fullUrl();
              Session::put('lastUrlFrontend', $lastUrl);
              Session::save();
              return redirect()->route('login_frontend');
              exit();
        }
      
        return $next($request);
    }
}
