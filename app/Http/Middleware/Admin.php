<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class Admin
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
        if(Auth::check() && Auth::user()->isAdmin()){
            return $next($request);
        }
        // try {

        //     Session::forget('session_id');
        //     Session::forget('cart_val');
        //     Session::forget('user_access');
        //     Session::forget('frontSession');
        //       Session::forget('product_category_session_id');
        //       session::forget('loggedin_user_category_session_id');
        // } catch (\Throwable $th) {
        //     //throw $th;
        // }


        // Auth::logout();
        return redirect('login');
    }
}
