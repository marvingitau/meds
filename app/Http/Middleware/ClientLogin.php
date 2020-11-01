<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class ClientLogin
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
        if(empty(Session::has('frontSession'))){
            try {
                Session::forget('frontSession');
                Session::forget('session_id');
                Session::forget('cart_val');
                Session::forget('user_access');

                Session::forget('product_category_session_id');
                session::forget('loggedin_user_category_session_id');
            } catch (\Throwable $th) {
                //throw $th;
            }
            Auth::logout();

            return redirect('/login_page');
        }


        return $next($request);
    }
}
