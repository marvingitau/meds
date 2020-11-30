<?php

namespace App\Http\Controllers;

use App\Staff;
use Illuminate\Http\Request;
use App\Http\Helper\MimeCheckRules;
use Illuminate\Support\Facades\File;

use App\User;
use App\Products;
use App\Product_Category;
use App\UserExtraData;
use App\VerifyUser;
use App\Mail\VerifyMail;
use App\CustomOrder;
use App\Complain;
use App\Cart;
use App\Orders;
use App\CurrencyList;
use GuzzleHttp\Client;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu_active=11;
        // Session::put('order_type','');

        $debit = 34;
        $credit =70;

        $current=7000000;
        $thirty=70000000;
        $sixty=2030000;
        $ninety=2345548;
        $onetwenty=9876543;

        $session_id=Session::get('session_id');
        $cart_count =Cart::where('session_id',$session_id)->get()->count();

        Session::put('cart_val',$cart_count);


        $id= auth()->user()->id;

        $currentStaffOrders = Orders::where('users_id',$id)->paginate(5); //get all current staff order
        // dd($currentStaffOrders);

        $whmgrCount= Orders::where('users_id',$id)->whereNotNull('order_type')->whereNull('progress_status_whmgr')->whereNull('progress_status_hr')->whereNull('progress_status_ac')->count();

        $hrCount  = Orders::where('users_id',$id)->where('order_type',1)->whereNotNull('progress_status_whmgr')->whereNull('progress_status_ac')->count();
        $acCount  = Orders::where('users_id',$id)->where('order_verify',1)->whereNotNull('order_type')->whereNotNull('progress_status_whmgr')->whereNull('progress_status_ac')->count();
        $dispatchedCount  = Orders::where('users_id',$id)->where('progress_status_ac',4)->count();

        $invoice_data= CustomOrder::where('users_id',$id)->where('approved',0)->take(-10)->get();
        $statement_data= CustomOrder::where('users_id',$id)->where('approved',1)->take(-10)->get();
        return view('back-end.Staff.index',compact(['menu_active','debit','credit','current','thirty',
        'sixty','ninety','onetwenty',
        'invoice_data','statement_data','whmgrCount','hrCount','acCount','dispatchedCount','currentStaffOrders']));
    }


    public function general_products()
    {
        Session::forget('links');
        $links = session()->has('links') ? session('links') : [];
        $currentLink = request()->path(); // Getting current URI like 'category/books/'
        array_unshift($links, $currentLink); // Putting it in the beginning of links array
        session(['links' => $links]); // Saving links array to the session
        // dd(session('links'));
        // $input = array(1.1, 10, 17.7, 5.1);
        // $rand_keys=array_rand($input,1);

        // $id =$input[$rand_keys];
        // $client = new Client;
        // $request = $client->get('http://41.207.79.81:89/sysproapi/v1/product/list/'.$id.'/', ['verify' => false]);
        // $response = $request->getBody();
        // // dd($response->getContents());

        // $products=json_decode($response->getContents());
        // $product_cat = DB::table('list_of_product_class_descriptions_Sheet')->get()->toArray();
        if(session::get('loggedin_user_category_session_id')){
            $u_id = session::get('loggedin_user_category_session_id');
        }
        if(session::get('product_category_session_id')){
            $id = session::get('product_category_session_id');
        }


        try {
            $client = new Client;
            //products and price per client type
            $request = $client->get('http://41.207.79.81:89/sysproapi/v1/product/list/'.$id.'/'.$u_id.'/', ['verify' => false]);
            $response = $request->getBody();
            $products_price=json_decode($response->getContents());
        } catch (\Throwable $th) {
            $products_price = null;
        }



        $product_cat = DB::table('list_of_product_class_descriptions_Sheet')->get()->toArray();



        Session::put('order_type',1);
        $menu_active=15;
        $i=0;
        $product_type = 'general';

        // $list_product=Products::all();
        $list_product=$products_price ;
        // dd(Session::get('order_type'));
        return view('back-end.Staff.products.view_products_general',compact(['menu_active','list_product','i','product_type','product_cat']));
    }
    public function generalproductcat(Request $request)
    {
        // $user = auth()->user()->form_title;
        // if($user == "private institution"){
            $u_id = "A";
        // }elseif($user == "faithbased institution"){
        //     $u_id = "A";
        // }else{

        // }

        // product category  id
        $id = $request->input('catd');
        // category session
        session::put('product_category_session_id',$id);
        // loggedin user category
        session::put('loggedin_user_category_session_id',$u_id);

        if(session::get('loggedin_user_category_session_id')){
            $u_id = session::get('loggedin_user_category_session_id');
        }
        if(session::get('product_category_session_id')){
            $id = session::get('product_category_session_id');
        }


        try {
            $client = new Client;
            //products and price per client type
            $request = $client->get('http://41.207.79.81:89/sysproapi/v1/product/list/'.$id.'/'.$u_id.'/', ['verify' => false]);
            $response = $request->getBody();
            $products_price=json_decode($response->getContents());
        } catch (\Throwable $th) {
            $products_price = null;
        }

        Session::put('order_type',1);
        $product_cat = DB::table('list_of_product_class_descriptions_Sheet')->get()->toArray();
        $menu_active=15;
        $i=0;
        $product_type = 'general';

        $list_product=$products_price;
        return view('back-end.Staff.products.view_products_general',compact(['menu_active','list_product','product_type','i','product_cat']));

    }


    public function prescription_products()
    {
        Session::forget('links');
        $links = session()->has('links') ? session('links') : [];
        $currentLink = request()->path(); // Getting current URI like 'category/books/'
        array_unshift($links, $currentLink); // Putting it in the beginning of links array
        session(['links' => $links]); // Saving links array to the session
        // dd(session('links'));

        if(session::get('loggedin_user_category_session_id')){
            $u_id = session::get('loggedin_user_category_session_id');
        }
        if(session::get('product_category_session_id')){
            $id = session::get('product_category_session_id');
        }


        try {
            $client = new Client;
            //products and price per client type
            $request = $client->get('http://41.207.79.81:89/sysproapi/v1/product/list/'.$id.'/'.$u_id.'/', ['verify' => false]);
            $response = $request->getBody();
            $products_price=json_decode($response->getContents());
        } catch (\Throwable $th) {
            $products_price = null;
        }



        $product_cat = DB::table('list_of_product_class_descriptions_Sheet')->get()->toArray();


        Session::put('order_type',2);
        $menu_active=14;
        $i=0;
        $product_type = 'prescription';
        $list_product= $products_price;
        // $list_product=Products::all();
        // return view('back-end.Staff.products.view_products_prescription',compact(['menu_active','list_product','i','product_type']));

        return view('back-end.Staff.products.view_products_prescription',compact(['menu_active','list_product','i','product_type','product_cat']));

    }
    public function prescriptionproductcat(Request $request)
    {


            $u_id = "A"; //price Code


        // product category  id
        $id = $request->input('catd');
        // category session
        session::put('product_category_session_id',$id);
        // loggedin user category
        session::put('loggedin_user_category_session_id',$u_id);

        if(session::get('loggedin_user_category_session_id')){
            $u_id = session::get('loggedin_user_category_session_id');
        }
        if(session::get('product_category_session_id')){
            $id = session::get('product_category_session_id');
        }


        try {
            $client = new Client;
            //products and price per client type
            $request = $client->get('http://41.207.79.81:89/sysproapi/v1/product/list/'.$id.'/'.$u_id.'/', ['verify' => false]);

             //products and price list (some items list have multiple prices)
             // $request = $client->get('http://41.207.79.81:89/sysproapi/v1/product/list/'.$id.'/', ['verify' => false]);
            $response = $request->getBody();
            $products_price=json_decode($response->getContents());
        } catch (\Throwable $th) {
            $products_price = null;
        }

        $product_cat = DB::table('list_of_product_class_descriptions_Sheet')->get()->toArray();
        $menu_active=14;
        $i=0;
        $list_product=$products_price;
        return view('back-end.Staff.products.view_products_prescription',compact(['menu_active','list_product','i','product_cat']));

    }

    public function addToCart(Request $request){
        $inputToCart=$request->all();
        // dd($inputToCart);
        $rate = 1;

        if($inputToCart['currency'] != 'KSH'){
            $data  = CurrencyList::where('currency',$inputToCart['currency'])->first();
            $rate =$data->rate;

        }
        Session::forget('discount_amount_price');
        Session::forget('coupon_code');
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
                $inputToCart['item_from']=Session::get('order_type');
                $inputToCart['product_code']=null;
                $inputToCart['price']*=$rate;


                $count_duplicateItems=Cart::where(['products_id'=>$inputToCart['products_id'],
                    'product_color'=>$inputToCart['product_color'],
                    'size'=>$inputToCart['size'],
                    'session_id'=>$inputToCart['session_id'],
                    'itemCode'=>$inputToCart['itemCode']
                    ])->count();
                if($count_duplicateItems>0){



                    return redirect()->to(session('links')[0])->with('message','Item Exist already');
                }else{

                    // get the latest order ID then increamnet it, for the current order itemNumber
                    $latest_id = ((Cart::latest()->first()->id)+1);
                    $kiwango = $inputToCart['quantity'];
                    $staffPONumber = auth()->user()->PONumber;


                    $cart_resp = Cart::create($inputToCart+['itemNumber'=>$latest_id, 'Qty'=>$kiwango,'PONumber' =>  $staffPONumber ]);
                    // dd( $cart_resp);

                    $session_id=Session::get('session_id');
                    $cart_count =Cart::where('session_id',$session_id)->get()->count();
                    Session::put('cart_val',$cart_count);

                    // return back()->with('message','Add To Cart Already');
                    return redirect()->to(session('links')[0])->with('message','Added To Cart ');
                }
            }else{
                return redirect()->to(session('links')[0])->with('message','Stock is not Available!');
            }
        }
    }

    public function viewcart()
    {
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
        $plus_vat = $total_price + $total_price*(16/100);
        return view('back-end.Staff.Cart.cart',compact('cart_datas','total_price','plus_vat','menu_active'));
    }

    public function viewcheckout(){
        $menu_active=31;
            $countries=DB::table('countries')->get();
            $user_login=User::where('id',Auth::id())->first();
            return view('back-end.Staff.checkout.index',compact('countries','user_login','menu_active'));
    }

    public function submitcheckout(Request $request){
        $this->validate($request,[
            'billing_name_of_institution'=>'',
            'billing_name'=>'',
            'billing_email'=>'',
            'billing_address'=>'',
            'billing_town'=>'',
            'billing_country'=>'',
            'billing_buildingname'=>'',
            'billing_mobile'=>'',

        ]);
         $input_data=$request->all();
        $count_shippingaddress=DB::table('delivery_address')->where('users_id',Auth::id())->count();
        if($count_shippingaddress==1){
            DB::table('delivery_address')->where('users_id',Auth::id())->update(
                ['name'=>$input_data['billing_name'],
                'email'=> $input_data['billing_email'],
                'postal_address'=> isset($input_data['billing_address'])?'NA':'NA',
                'city'=> isset($input_data['billing_town'])?'NA':'NA',
                'country'=>isset($input_data['billing_country'])?'NA':'NA',
                'buildingname'=>isset($input_data['billing_buildingname'])?'NA':'NA',
                'phone_no'=> isset($input_data['billing_mobile'])?'NA':'NA'
                ]);
        }else{
             DB::table('delivery_address')->insert(
                 ['users_id'=>Auth::id(),
                 'users_email'=> $input_data['billing_email'],
                 'name'=>$input_data['billing_name'],
                 'email'=> isset($input_data['billing_email'])?$input_data['billing_email']:'NA',
                 'postal_address'=> isset($input_data['billing_address'])?'NA':'NA',
                 'city'=> isset($input_data['billing_town'])?'NA':'NA',
                 'country'=>isset($input_data['billing_country'])?'NA':'NA',
                 'buildingname'=>isset($input_data['billing_buildingname'])?'NA':'NA',
                 'phone_no'=> isset($input_data['billing_mobile'])?'NA':'NA' ,
                 ]);
        }
         DB::table('users')->where('id',Auth::id())->update(['name'=>$input_data['billing_name'],
             'email'=>$input_data['billing_email'],
             'postal_address'=> isset($input_data['billing_address'])?'NA':'NA',
             'town'=> isset($input_data['billing_town'])?'NA':'NA',
             'country'=>isset($input_data['billing_country'])?'NA':'NA',
             'buildingname'=>isset($input_data['billing_buildingname'])?'NA':'NA',
             'phone_no'=>$input_data['billing_mobile']]);
        return redirect('/staff/order/review');

     }

     public function orderreview()
     {

     $menu_active=41;
     $session_id=Session::get('session_id');
     $cart_datas=Cart::where('session_id',$session_id)->get();
     $total_price=0;
     $require_supporting_docs=0; //requires doctors permission for prescription default(no)

     foreach ($cart_datas as $cart_data){
         // dd(gettype($cart_data->price));
         $x =$cart_data->price;
         $y = $cart_data->quantity;
         $total_price += ($x* $y);

         if($cart_data->item_from == 2){
            $require_supporting_docs=1;
        }
     }
     $billing_address=DB::table('delivery_address')->where('users_id',Auth::id())->first();
     $total_price = $total_price + $total_price*(16/100);




     return view('back-end.Staff.checkout.review_order',compact('billing_address','cart_datas','total_price','require_supporting_docs','menu_active'));
    }

    public function order(Request $request){
        $require_hr= 0;
        // supporting document default pathway
        $pathway = 'NA';

        // $this->validate($request,[
        //     'supporting_documents'=>'mimes:pdf,png,jpg,jpeg|max:1000'
        // ]);
        request()->validate([
            'supporting_documents'  =>['max:1048'],
        ]);

        // dd($request->all()['supporting_documents'][0]);
        // dd($request->file('supporting_documents')[0]);


        $input_data=$request->all();

         $uid=$input_data['users_id'];
         $recOd=CustomOrder::where('users_id', $uid)->where('approved', 0)->get();
         foreach ($recOd as $key => $value) {
            $value->approved = 0;
            $value->save();
         }
        //  ordertype


        if( in_array('2',array_values($input_data['ordertype']),true) ){
            $require_hr=1;
        }
         // store it in the extra data table get the numbrt of documents

        if($request->hasFile('supporting_documents') ){
            $doc_number = count($request -> all()['supporting_documents']);
            for($i=0;$i<$doc_number;$i++){
                $path = 'public/assets/docs';
                // renamming the file
                // $name = 'supporting_documents_'.$i.'_'.auth()->user()->id.'.'.$request->file('supporting_documents')[$i]->getClientOriginalExtension();
                // appending to the file name
                $filename = pathinfo($request->file('supporting_documents')[$i]->getClientOriginalName(), PATHINFO_FILENAME);
                $name = 'supporting_documents_'.$i.'_'.auth()->user()->id.'_'.$request->file('supporting_documents')[$i]->getClientOriginalName();
                @unlink($path.'/'.$name);
                $resp = $request->file('supporting_documents')[$i]->move($path,$name);
                $fileUploaded = 1;
                $pathway = $path.'/' . $name;

                $obj = new UserExtraData();
                $obj->supporting_documents =  $pathway;
                $obj->supporting_name =  $filename;
                $obj->user_id = auth()->user()->id;
                $obj->save();

            }
        }



        $payment_method=$input_data['payment_method'];
        $order_id=Orders::create($input_data+['order_type'=>$require_hr,]);

        // dd($order_id);


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
            // unset( $value['item_from']);
            $id=CustomOrder::create($value);

        }

        // Staff Order push API endpoint

        // dd($input_data);

        $Order = Orders::findOrFail($order_id->id);
        $aux_order_type =  $Order->order_type == '1'?'Prescription':'General';

        $approv_order_data = [

            'OrderNo' => $Order->id,
            'OrderID' => $Order->id,
            'baseCurrency' => 'KSH',
            'OrderType' =>  $aux_order_type,
            'StockLine' =>'NA',
            'discountPercent'=>0,
            'totalAmount'=> $Order->grand_total,
            'discountTotal'=>0,
            'customerCode'=>'XMEDS01',
            'taxPlan' => 'VAT',
            'ExchangeRate'=>0,


            'OrderItems'=>$Order->items->toArray(),

        ];



        $url = "http://41.207.79.81:89/sysproapi/v1/order/create";  //check on this with victor
        // dd(($approv_order_data) );

        $client = new Client;
        $response = $client->request('POST',  $url, [
            'headers' => [ 'Content-Type' => 'application/json' ],
            'body' => json_encode($approv_order_data),'verify' => false
        ]);


        return back()->with('message',(json_decode($response->getBody(), true)));

        // if($payment_method=="COD"){
        //     return redirect('/staff/cod');
        // }elseif($payment_method=="Paypal"){
        //     return redirect('/staff/paypal');
        // }else{
        //     return redirect('/staff/visa');
        // }
    }

    public function cod(){
        $menu_active=42;
        $user_order=Orders::where('users_id',Auth::id())->latest()->first();
        return view('back-end.Staff.payment.cod',compact('user_order','menu_active'));
    }
    public function visa(){
        // $menu_active=42;
        // $user_order=Orders::where('users_id',Auth::id())->latest()->first();
        // return view('back-end.Staff.payment.cod',compact('user_order','menu_active'));
        return back();
    }


    public function documents()
    {
        $menu_active=16;
        $supporting_files = UserExtraData::where('user_id',auth()->user()->id)->get();

        return view('back-end.Staff.documents',compact(['menu_active','supporting_files']));
    }

    public function docdelete($id)
    {
        $document_name = UserExtraData::where('supporting_name',$id)->first();
        $document_path = $document_name->supporting_documents;
        $filedelete_resp = File::delete(($document_path) );
        $document_name->delete();

        return back()->with('message','Document Deleted');

    }
    public function viewWrMgrOrder()
    {
        // $menu_active=42;
        // $user_order=Orders::where('users_id',Auth::id())->latest()->first();
        // return view('back-end.Staff.payment.cod',compact('user_order','menu_active'));

        $menu_active=16;
        $id= auth()->user()->id;

        $allOrders= Orders::where('users_id',$id)->whereNull('progress_status_whmgr')->get();



        return view('back-end.Staff.checkout.ord_review',compact(['menu_active','allOrders']));


    }


    public function viewHROrder()
    {
        // $menu_active=42;
        // $user_order=Orders::where('users_id',Auth::id())->latest()->first();
        // return view('back-end.Staff.payment.cod',compact('user_order','menu_active'));

        $menu_active=16;
        $id= auth()->user()->id;

        $allOrders= Orders::where('users_id',$id)->where('order_type',1)->where('order_verify',0)->whereNotNull('progress_status_whmgr')->get();



        return view('back-end.Staff.checkout.ord_review',compact(['menu_active','allOrders']));


    }

    public function viewAcOrder()
    {
        // $menu_active=42;
        // $user_order=Orders::where('users_id',Auth::id())->latest()->first();
        // return view('back-end.Staff.payment.cod',compact('user_order','menu_active'));

        $menu_active=169;
        $id= auth()->user()->id;

        $allOrders= Orders::where('users_id',$id)->where('order_verify',1)->whereNotNull('order_type')->whereNotNull('progress_status_whmgr')->whereNull('progress_status_ac')->get();



        return view('back-end.Staff.checkout.ord_review',compact(['menu_active','allOrders']));


    }

    public function dispatchedOrder(Request $request)
    {
        $menu_active=16;
        $id= auth()->user()->id;

        $allOrders= Orders::where('users_id',$id)->where('progress_status_ac',4)->get();



        return view('back-end.Staff.checkout.ord_review',compact(['menu_active','allOrders']));

    }



    public function products(Request $request)
    {

        if(session::get('loggedin_user_category_session_id')){
            $u_id = session::get('loggedin_user_category_session_id');
        }
        if(session::get('product_category_session_id')){
            $id = session::get('product_category_session_id');
        }


        try {
            $client = new Client;
            //products and price per client type
            $request = $client->get('http://41.207.79.81:89/sysproapi/v1/product/list/'.$id.'/'.$u_id.'/', ['verify' => false]);
            $response = $request->getBody();
            $products_price=json_decode($response->getContents());
        } catch (\Throwable $th) {
            $products_price = null;
        }



        $product_cat = DB::table('list_of_product_class_descriptions_Sheet')->get()->toArray();

        $menu_active=12;
        $i=0;
        $list_product=$products_price;
        return view('back-end.Client.products.view_products',compact(['menu_active','list_product','i','product_cat']));
    }


}
