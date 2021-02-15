<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App\Core\Backend\Admin;

class CheckAuthBackend
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
        if (!Admin::CheckAuth()) {

              $lastUrl=$request->fullUrl();
              Session::put('lastUrl', $lastUrl);
              Session::save();
              return redirect()->route('loginAdmin');
              exit();
        }
      
        return $next($request);
    }
}
