<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use App\ProductAttrib;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index(){
        $menu_active=21;
        $session_id=Session::get('session_id');
        $cart_datas=Cart::where('session_id',$session_id)->get();
        $total_price=0;
        foreach ($cart_datas as $cart_data){
            // dd(gettype($cart_data->price));
            $x =$cart_data->price;
            $y = $cart_data->quantity;
            $total_price += ($x* $y);
        }
        return view('back-end.Client.Cart.cart',compact('cart_datas','total_price','menu_active'));
    }


       public function addToCart(Request $request){
        $inputToCart=$request->all();
        Session::forget('discount_amount_price');
        Session::forget('coupon_code');

        $user_id = auth()->user()->id;
        $user_id = auth()->user()->id;
        $tblValue = DB::table('delivery_address')->where('users_id',$user_id)
        ->whereNotNull('soldToAddr1')->whereNotNull('soldToAddr2')->whereNotNull('soldToAddr3')
        ->whereNotNull('ShipToAddr1')->whereNotNull('ShipToAddr2')->whereNotNull('ShipToAddr3')
        ->count();
         if($tblValue == 0){
            return back()->with('message','wait your account is being verified');
        }else{
            if($inputToCart['size']==""){
            return back()->with('message','Please select Quantity');
        }else{

            if(true){
                $inputToCart['user_email']=auth()->user()->email;
                $session_id=Session::get('session_id');
                if(empty($session_id)){
                    $session_id=str_random(40);
                    Session::put('session_id',$session_id);
                }
                $inputToCart['session_id']=$session_id;
                $sizeAtrr=explode("-",$inputToCart['size']);
                $inputToCart['size']=$inputToCart['size'];
                $inputToCart['product_code']=null;

                $count_duplicateItems=Cart::where(['products_id'=>$inputToCart['products_id'],
                    'product_color'=>$inputToCart['product_color'],
                    'size'=>$inputToCart['size'],
                    'session_id'=>$inputToCart['session_id']
                    ])->count();
                if($count_duplicateItems>0){
                    return redirect()->to('client_products_list')->with('message','This Item exist already');
                }else{

                    Cart::create($inputToCart);
                    $session_id=Session::get('session_id');
                    $cart_count =Cart::where('session_id',$session_id)->get()->count();

                    Session::put('cart_val',$cart_count);
                    return redirect()->to('client_products_list')->with('message','Added To Cart ');
                }
            }else{
                return redirect()->to('client_products_list')->with('message','Stock is not Available!');
            }
        }
        }
    }
    public function deleteItem($id=null){
        $delete_item=Cart::findOrFail($id);
        Session::forget('discount_amount_price');
        Session::forget('coupon_code');
        $delete_item->delete();
        return back()->with('message','Deleted Success!');
    }
    // public function updateQuantity($id,$quantity){
    //     Session::forget('discount_amount_price');
    //     Session::forget('coupon_code');
    //     $sku_size=DB::table('carts')->select('product_code','size','quantity')->where('id',$id)->first();
    //     $stockAvailable=DB::table('product_attribs')->select('stock')->where(['sku'=>$sku_size->product_code,
    //         'size'=>$sku_size->size])->first();
    //     $updated_quantity=$sku_size->quantity+$quantity;
    //     if($stockAvailable->stock>=$updated_quantity){
    //         DB::table('carts')->where('id',$id)->increment('quantity',$quantity);
    //         return back()->with('message','Update Quantity already');
    //     }else{
    //         return back()->with('message','Stock is not Available!');
    //     }


    // }
 public function updateQuantity($id,$quantity){
        Session::forget('discount_amount_price');
        Session::forget('coupon_code');
        $sku_size=DB::table('carts')->select('product_code','size','quantity')->where('id',$id)->first();
        $stockAvailable=DB::table('product_attribs')->select('stock')->where(['sku'=>$sku_size->product_code,
            'size'=>$sku_size->size])->first();
        $updated_quantity=$sku_size->quantity+$quantity;
        if(true){
            DB::table('carts')->where('id',$id)->increment('quantity',$quantity);
            return back()->with('message','Update Quantity already');
        }else{
            return back()->with('message','Stock is not Available!');
        }


    }
}
