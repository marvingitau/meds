<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            // dd(Auth::guard($guard)->user()->isAdmin());
            // return redirect('/home');
            if ( Auth::guard($guard)->user()->isAdmin()) {
                switch(Auth::user()->role){

                    case 2:
                            $this->redirectTo = '/hr';
                        return $this->redirectTo;
                        break;
                    // case 3:
                    //     $this->redirectTo = '/player';
                    //     return $this->redirectTo;
                    //     break;
                    // case 4:
                    //         $this->redirectTo = '/jobseeker';
                    //     return $this->redirectTo;
                    //     break;
                    // case 5:
                    //         $this->redirectTo = '/superAdmin';
                    //         return $this->redirectTo;
                    //             break;
                    default:

                        return redirect('/admin');
                    break;
                }
                // return redirect('/admin');
            }elseif(Auth::guard($guard)->user()->isStaff()){
                return redirect('/staff');
            }else {
                return redirect('/client_account');
            }
        }

        return $next($request);

        // if ($this->auth->check()&& Auth::user()->isAdmin()) {
        //     return redirect('/admin');
        // }  elseif ($this->auth->check()&& Auth::user()->isStaff()) {
        //     return redirect('/admin');
        // }else {
        //     return redirect('/client_account');
        // }

        // return $next($request);
    }
}
