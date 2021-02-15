<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App\Core\Frontend\UserAuth;

class GetSessionData
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
        $request->attributes->set('tata', 'value');
      
        return $next($request);
    }
}
