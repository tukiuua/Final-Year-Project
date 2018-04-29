<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;


class checkUserIsAdmin
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
       // returns the request of current user
        // $user = $request->User();
        
        // if ($user){
        //     if ($user->isAdmin){

        //         return $next($request);
        //     }
          
        // } 

        //return redirect('/home');

        if(Auth::user() &&  Auth::user()->isAdmin == 1){

            return $next($request);

        }

       return redirect('/home');
       
    }
    
}
