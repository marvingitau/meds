<?php

namespace App\Http\Controllers;

use App\Orders;
use App\CustomOrder;
use Illuminate\Http\Request;
use App\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrdersController extends Controller
{

    // public function index(){
    //     $session_id=Session::get('session_id');
    //     $cart_datas=Cart::where('session_id',$session_id)->get();
    //     $total_price=0;
    //     foreach ($cart_datas as $cart_data){
    //         $total_price+=$cart_data->price*$cart_data->quantity;
    //     }
    //     $billing_address=DB::table('delivery_address')->where('users_id',Auth::id())->first();
    //     return view('checkout.review_order',compact('billing_address','cart_datas','total_price'));
    // }

    public function index(){
        $menu_active=41;
        $session_id=Session::get('session_id');
        $cart_datas=Cart::where('session_id',$session_id)->get();
        $total_price=0;
        foreach ($cart_datas as $cart_data){
            // dd(gettype($cart_data->price));
            $x =$cart_data->price;
            $y = $cart_data->quantity;
            $total_price += ($x* $y);
        }
        $billing_address=DB::table('delivery_address')->where('users_id',Auth::id())->first();



        return view('back-end.Client.checkout.review_order',compact('billing_address','cart_datas','total_price','menu_active'));
    }




    public function order(Request $request){
        $input_data=$request->all();
         $uid=$input_data['users_id'];
         $recOd=CustomOrder::where('users_id', $uid)->where('approved', 0)->get();
         foreach ($recOd as $key => $value) {
            $value->approved = 0;
            $value->save();
         }

        $payment_method=$input_data['payment_method'];
        $order_id=Orders::create($input_data);


        $session_id=Session::get('session_id');
        $cart_datas=Cart::where('session_id',$session_id)->get();
        $billing_address=DB::table('delivery_address')->where('users_id',Auth::id())->first();
        $customorder_data = ['order_id'=>$order_id->id,'users_id'=>$billing_address->users_id, 'users_email'=>$billing_address->users_email, 'name'=>$billing_address->name,
        'phone_no'=>$billing_address->phone_no
        ];
        $col1=[];
        foreach ($cart_datas as $key => $value) {
            array_push($col1,array_merge($value->toArray(),$customorder_data));
        }



        foreach ($col1 as $key => $value) {
            unset( $value['item_from']);
            $id=CustomOrder::create($value);

        }


        if($payment_method=="COD"){
            return redirect('/cod');
        }else{
            return redirect('/paypal');
        }
    }
    public function cod(){
        $menu_active=42;
        $user_order=Orders::where('users_id',Auth::id())->latest()->first();
        return view('back-end.Client.payment.cod',compact('user_order','menu_active'));
    }
    public function paypal(Request $request){
        $menu_active=43;
        $who_buying=Orders::where('users_id',Auth::id())->latest()->first();
        return view('back-end.Client.payment.paypal',compact('who_buying','menu_active'));
    }

}
