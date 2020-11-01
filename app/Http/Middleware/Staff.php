<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use Closure;

class Staff
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
        if(Auth::check() && Auth::user()->isStaff()){
            return $next($request);
        }
        try {

            Session::forget('session_id');
            Session::forget('cart_val');
            Session::forget('user_access');
            Session::forget('frontSession');
              Session::forget('product_category_session_id');
              session::forget('loggedin_user_category_session_id');
        } catch (\Throwable $th) {
            //throw $th;
        }
        Auth::logout();
        return redirect('staff');
    }
}
