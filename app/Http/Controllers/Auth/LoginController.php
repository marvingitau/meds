<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
// use App\Http\Requests\Auth\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use GuzzleHttp\Client;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
// use Guzzle\Http\Client as GuzzleClient;
use Guzzle\Plugin\Cookie\Cookie;
use Guzzle\Plugin\Cookie\CookiePlugin;
use Guzzle\Plugin\Cookie\CookieJar\ArrayCookieJar;

use Redirect;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Input;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }





    /**
     * Handle a login request to the application
     *
     * @param  \App\Http\Requests\LoginRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {

        $this->validateLogin($request);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }
        // dd($request->all());

        if($request->id == '2'){
            // dd($request);
            $client = new Client();
             $cookieJar = new \GuzzleHttp\Cookie\CookieJar();
            $response = $client->post('https://mansoftonline.com/adminrs/core/auth/essui', [
                'form_params' => [
                    'upn' =>$request->email, // use your actual username
                    'pwd' =>$request->password, // use your actual password
                    'action' => 'login'
                ],
                'cookies' =>  $cookieJar
            ]
            );

            $json_data=(json_decode($response->getBody()->getContents()));
            // dd($json_data->response->data->userId);

        // checked if the response is successfull
        if($json_data->response->status == '88'){
          // check for already has account
          $user = User::where('userId', $json_data->response->data->userId)->first();

          // if user already found
          if( $user ) {
              // update the avatar and provider that might have changed
              $user->update([

                  'staff'=>2,
                  'upn' => $json_data->response->upn,

              ]);
          } else {
              // create a new user
              $hashed_pw=Hash::make($request->password);
              $user = User::create([
                  'userId'=> $json_data->response->data->userId,
                  'name' => $json_data->response->data->userProp->userDisplayName,
                  'email' => $json_data->response->data->userPrincipalName,
              'password'=>$hashed_pw,
              'staff'=>2,
              'upn' => $json_data->response->upn,

              ]);

          }

          // login the user

          if(Auth::login($user, true)){
              return redirect()->intended('staff');
          }else{
            //
          }

        }else{
            // dd(Auth::login($user, true));
            $errors = new MessageBag(['password' => ['Email/password invalid.']]);
            return Redirect::back()->withErrors($errors)->withInput(Input::except('password'));
        }



        }
        if($this->guard()->validate($this->credentials($request))) {

            if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'admin' => $request->id])) {

                return redirect()->to('admin');
            }elseif(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'admin' => 2 ])){
                switch(Auth::user()->role){

                    case 2:
                        //     $this->redirectTo = '/humanResource';
                        // return $this->redirectTo;
                        return redirect()->to('humanResource');
                        break;
                    // case 3:
                    //     $this->redirectTo = '/player';
                    //     return $this->redirectTo;
                    //     break;
                    case 4:
                        return redirect()->to('accounts');
                        break;
                    case 5:
                            // $this->redirectTo = '/admin/warehousemanager';
                            return redirect()->to('warehouseManager');
                            break;
                    default:
                        // $this->redirectTo = '/login';
                        return redirect()->intended('login');
                    break;
                }
            }elseif(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'staff' => $request->id])){
                return redirect()->intended('staff');
            }else {
                $this->incrementLoginAttempts($request);
                $errors = new MessageBag(['password' => ['Email/password invalid.']]);
                return Redirect::back()->withErrors($errors)->withInput(Input::except('password'));
            }
        } else {
            // dd('ok');
            $this->incrementLoginAttempts($request);
            $errors = new MessageBag(['password' => ['Account Dont Exist']]);
            return Redirect::back()->withErrors($errors)->withInput(Input::except('password'));

            // return back()->with('errors','Wrong Credentials');
            // return response()->json([
            //     'error' => 'Credentials do not match our database.'
            // ], 401);
        }

        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);
    }
}
