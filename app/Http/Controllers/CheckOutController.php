<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CheckOutController extends Controller
{
    // public function index(){
    //     $countries=DB::table('countries')->get();
    //     $user_login=User::where('id',Auth::id())->first();
    //     return view('checkout.index',compact('countries','user_login'));
    // }
    
    
    public function index(){
        $menu_active=31;
            $countries=DB::table('countries')->get();
            $user_login=User::where('id',Auth::id())->first();
            return view('back-end.Client.checkout.index',compact('countries','user_login','menu_active'));
        }
        
    public function submitcheckout(Request $request){
       $this->validate($request,[
           'billing_name_of_institution'=>'required',
           'billing_name'=>'required',
           'billing_email'=>'required',
           'billing_address'=>'required',
           'billing_town'=>'required',
           'billing_country'=>'required',
           'billing_buildingname'=>'required',
           'billing_mobile'=>'required',

       ]);
        $input_data=$request->all();
       $count_shippingaddress=DB::table('delivery_address')->where('users_id',Auth::id())->count();
       if($count_shippingaddress==1){
           DB::table('delivery_address')->where('users_id',Auth::id())->update(
               ['name'=>$input_data['billing_name'],
               'email'=>$input_data['billing_email'],
               'postal_address'=>$input_data['billing_address'],
               'city'=>$input_data['billing_town'],
               'country'=>$input_data['billing_country'],
               'buildingname'=>$input_data['billing_buildingname'],
               'phone_no'=>$input_data['billing_mobile']]);
       }else{
            DB::table('delivery_address')->insert(
                ['users_id'=>Auth::id(),
                'users_email'=>Session::get('frontSession'),
                'name'=>$input_data['billing_name'],
                'email'=>$input_data['billing_email'],
                'postal_address'=>$input_data['billing_address'],
                'city'=>$input_data['billing_town'],
                'country'=>$input_data['billing_country'],
                'buildingname'=>$input_data['billing_buildingname'],
                'phone_no'=>$input_data['billing_mobile'],]);
       }
        DB::table('users')->where('id',Auth::id())->update(['name'=>$input_data['billing_name'],
            'email'=>$input_data['billing_email'],
            'postal_address'=>$input_data['billing_address'],
            'town'=>$input_data['billing_town'],
            'country'=>$input_data['billing_country'],
            'buildingname'=>$input_data['billing_buildingname'],
            'phone_no'=>$input_data['billing_mobile']]);
       return redirect('/order-review');

    }
}
