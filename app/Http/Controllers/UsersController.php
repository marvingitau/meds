<?php

namespace App\Http\Controllers;


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
use GuzzleHttp\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use Illuminate\Foundation\Auth\AuthenticatesUsers;



class UsersController extends Controller
{

    // from here user dashboard
    public function u_dashboard()
    {
        $menu_active=11;

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
        $invoice_data= CustomOrder::where('users_id',$id)->where('approved',0)->take(-10)->get();
        $statement_data= CustomOrder::where('users_id',$id)->where('approved',1)->take(-10)->get();
        return view('back-end.Client.index',compact(['menu_active','debit','credit','current','thirty',
        'sixty','ninety','onetwenty',
        'invoice_data','statement_data']));
    }

    public function order_sttus()
    {

        $menu_active=16;
        $id= auth()->user()->id;

        $allOrders= Orders::all();


        return view('back-end.Client.checkout.ord_review',compact(['menu_active','allOrders']));

        // $menu_active=16;
        // $id= auth()->user()->id;
        // $invoice_pending= CustomOrder::where('users_id',$id)->where('approved',0)->get();
        // $invoice_approved= CustomOrder::where('users_id',$id)->where('approved',1)->get();

        // return view('back-end.Client.checkout.ord_review',compact(['menu_active','invoice_pending','invoice_approved']));
    }

    public function client_delete_order(Request $request ,$id)
    {
        $u_id= auth()->user()->id;

        $rem= Orders::findOrFail($id);
        $rem->delete();
        return back()->with('message','Order Deleted');
    }

    public function invoice_sttus()
    {
        $menu_active=15;
        $id= auth()->user()->id;
        $invoice_data= CustomOrder::where('users_id',$id)->where('approved',0)->get();
        return view('back-end.Client.checkout.inv_review',compact(['menu_active','invoice_data']));
    }

    public function invoicedownloadcsv()
    {
        $id= auth()->user()->id;
        $name = auth()->user()->name;
        $result= CustomOrder::where('users_id',$id)->where('approved',0)->get();

        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename= $name _invoice.csv", // <- name of file
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0",
            ];
            $columns  = ['Order id','Product id','Product name','Price','Quantity','Total'
            ];
            $callback = function () use ($result, $columns) {
                $file = fopen('php://output', 'w'); //<-here. name of file is written in headers
                fputcsv($file, $columns);
                foreach ($result as $res) {

                    fputcsv($file, [$res->order_id,$res->products_id,$res->product_name,$res->price,$res->quantity,($res->price*$res->quantity)
                    ]);
                }
                fclose($file);
            };

            return response()->stream($callback, 200, $headers);
    }


    public function statement_sttus()
    {
        $menu_active=14;
        $id= auth()->user()->id;
        $statement_data= CustomOrder::where('users_id',$id)->where('approved',1)->get();
        return view('back-end.Client.checkout.state_review',compact(['menu_active','statement_data']));
    }


    public function productcat(Request $request)
    {



        $user = auth()->user()->form_title;
        if($user == "private institution"){
            $u_id = "A";
        }elseif($user == "faithbased institution"){
            $u_id = "A";
        }else{

        }

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

        $product_cat = DB::table('list_of_product_class_descriptions_Sheet')->get()->toArray();
        $menu_active=12;
        $i=0;
        $list_product=$products_price;
        return view('back-end.Client.products.view_products',compact(['menu_active','list_product','i','product_cat']));

    }


    public function products(Request $request)
    {
        // $id = ($request->input('catd') !== null)?$request->input('catd'):'1';
        // $client = new Client;
        // $request = $client->get('http://41.207.79.81:89/sysproapi/v1/product/list/'.$id, ['verify' => false]);
        // $response = $request->getBody();
        // dd($response->getContents());
        // $user = auth()->user()->form_title;
        // dd($user);
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

    public function u_profile()
    {
        $menu_active=13;
        $id = Auth()->user()->id;
        $client_data = User::findOrFail($id);
        $client_files = UserExtraData::where('user_id',$id)->whereNotNull('order_authorized_name')->get();
        return view('back-end.Client.client_profile',compact(['menu_active','client_data','client_files']));
    }

       public function logde_complain()
    {
        $menu_active=17;
        $id = Auth()->user()->id;
        $old_complains = Complain::where('users_id',$id)->orderBy('created_at','desc')->get();
        return view('back-end.Client.complain_create',compact(['menu_active','old_complains']));
    }


    public function complain_data(Request $request)
    {
        $id = Auth()->user()->id;
        $complain_datum = $request->all();
        Complain::create($complain_datum+['users_id'=>$id]);
        return back()->with('message','complain submitted');

    }

    public function complain_data_delete(Request $request,$id)
    {
       $errase = Complain::findOrFail($id);
       $errase->delete();
       return back()->with('message','Complain deleted');
    }

    // to here

    public function index()
    {
        return view('users.login');
    }
    public function privateinstitute()
    {
    return view('users.private-institution');
    }

    public function ngoinstitute()
    {
    return view('users.ngo');
    }
    public function governmentinstitute()
    {
    return view('users.government-institution');
    }
    public function faithinstituion()
    {
    return view('users.faith-based-institution');
    }
    public function learninginstitute()
    {
    return view('users.learning-institution');
    }

    public function prequalification()
    {
    return view('users.prequalification');
    }


    public function register(Request $request){

        $this->validate($request,[
            'name'=>'required|string|max:191',
            'email'=>'required|string|email|unique:users,email',
            'password'=>'required|min:6|confirmed',
            'filename' => 'required',
            'filename.*' => 'mimes:pdf,jpg,png,jpeg|max:1048',

            'admin'=>'',
            'form_title'=>'',
            'name_of_institution'=>'',
            'postal_address'=>'',
            'phone_no'=>'',
            'buildingname'=>'',
            'streetname'=>'',
            'town'=>'',
            'country'=>'',
            'qualification'=>'',
            'licence_no'=>'',
            'doctors_name'=>'',
            'doctors_licence_no'=>'',
            'resident'=>'',
            'fulltime'=>'',
            'periodicsupervision'=>'',
            'order_authorized_name'=>'',
            'order_authorized_qualification'=>'',
            'order_authorized_licence_no'=>'',
            'payment_authorizedpersonelname'=>'',
            'payment_authorizedpersoneldesignation'=>'',
            'payment_authorizedpersonelsign'=>'required|max:1048',
            'guarantorname'=>'',
            'guarantordesignation'=>'',
            'guarantorsignature'=>'required|max:1048',

            'personinchargefile'=>'required|max:1048'

        ]);

        $input_data=$request->all();
        // dd($input_data);

        $input_data['password']=Hash::make($input_data['password']);
        $userID=User::create($input_data);



        // Try combining
        $orderAuthorizedName = $input_data['order_authorized_name'];
        $orderAuthorizeQualification = $input_data['order_authorized_qualification'];
        $orderAuthorizeLicenseId= $input_data['order_authorized_licence_no'];

        $paymentAuthPersonName= $input_data['payment_authorizedpersonelname'];
        $paymentAuthPersonDesignation= $input_data['payment_authorizedpersoneldesignation'];
        $paymentAuthPersonSignature= $input_data['payment_authorizedpersonelsign'];

        $fileName= $input_data['filename'];

        $personinchargeFile= $input_data['personinchargefile'];

        $guarantorDesignation= $input_data['guarantordesignation'];
        $guarantorName= $input_data['guarantorname'];
        $guarantorSignature= $input_data['guarantorsignature'];

        $cust_collection= collect(['auth_order_names'=>$orderAuthorizedName,'auth_order_quali'=>$orderAuthorizeQualification,'auth_order_lincense'=>$orderAuthorizeLicenseId,
        'pay_auth_name'=>$paymentAuthPersonName, 'pay_auth_desig'=>$paymentAuthPersonDesignation, 'pay_auth_sign'=>$paymentAuthPersonSignature,'gov_recog'=>$fileName, 'p_incharge_file'=>$personinchargeFile,
        'guarantorsignature'=>$guarantorSignature,'guarantorname'=>$guarantorName,'guarantordesignation'=>$guarantorDesignation
                                    ]);


        function payment_auth_signature($file,$data)
        {
            $filename = $file->getClientOriginalName();
            $file->move(public_path("products/documents/"), $filename);
            $path = '/products/documents/' . $filename;
            return  $path;
        }
        function guarantor_signature($file,$data)
        {
            $filename = $file->getClientOriginalName();
            $file->move(public_path("products/documents/"), $filename);
            $path = '/products/documents/' . $filename;
            return  $path;
        }

        function fileName($file,$data)
        {
            $filename = $file->getClientOriginalName();
            $file->move(public_path("products/documents/"), $filename);
            $path = '/products/documents/' . $filename;
            return  $path;
        }


        for ($i=0; $i < 3; $i++) {
            $data = new UserExtraData;
            $data->order_authorized_name = array_key_exists($i,$cust_collection['auth_order_names'])? $cust_collection['auth_order_names'][$i]:'';
            $data->order_authorized_qualification = array_key_exists($i,$cust_collection['auth_order_quali'])? $cust_collection['auth_order_quali'][$i]:'';
            $data->order_authorized_licence_no  = array_key_exists($i,$cust_collection['auth_order_lincense'])? $cust_collection['auth_order_lincense'][$i]:'';

            $data->payment_authorizedpersonelname  = array_key_exists($i,$cust_collection['pay_auth_name'])? $cust_collection['pay_auth_name'][$i]:'';
            $data->payment_authorizedpersoneldesignation  = array_key_exists($i,$cust_collection['pay_auth_desig'])? $cust_collection['pay_auth_desig'][$i]:'';
            $data->payment_authorizedpersonelsign  =  array_key_exists($i,$cust_collection['pay_auth_sign'])? payment_auth_signature($cust_collection['pay_auth_sign'][$i],$data):'';

            $data->guarantorname  = array_key_exists($i,$cust_collection['guarantorname'])? $cust_collection['guarantorname'][$i]:'';
            $data->guarantordesignation   = array_key_exists($i,$cust_collection['guarantordesignation'])? $cust_collection['guarantordesignation'][$i]:'';
            $data->guarantorsignature   = array_key_exists($i,$cust_collection['guarantorsignature'])? guarantor_signature($cust_collection['guarantorsignature'][$i],$data):'';

            $data->filename  = array_key_exists($i,$cust_collection['gov_recog'])? fileName($cust_collection['gov_recog'][$i],$data):'';

            $data->personinchargefile  = array_key_exists($i,$cust_collection['p_incharge_file'])? fileName($cust_collection['p_incharge_file'][$i],$data):'';



            $data->user_id = $userID->id;
            echo $i;
            $data->save();
        }








        // email confirmation
        $verifyUser = VerifyUser::create([
            'user_id' => $userID->id,
            'token' => sha1(time())
          ]);
          \Mail::to($userID->email)->send(new VerifyMail($userID));


        return back()->with('message','Infomation Uploaded');
    }

    public function login(Request $request){
        $input_data=$request->all();
        if(Auth::attempt(['email'=>$input_data['email'],'password'=>$input_data['password']])){
            Session::put('frontSession',$input_data['email']);
            Session::put('user_access','in');
             Session::put('cart_val',0);
            return redirect('/client_account');
        }else{
            return back()->with('message','Account is not Valid!');
        }
    }


    public function logout(){
        Auth::logout();
        Session::forget('frontSession');
        Session::forget('user_access');
          Session::forget('cart_val');
          Session::forget('session_id');
          Session::forget('product_category_session_id');
          session::forget('loggedin_user_category_session_id');
        return redirect('/login_page');
    }


    public function verifyUser($token)
    {
    $verifyUser = VerifyUser::where('token', $token)->first();
    if(isset($verifyUser) ){
        $user = $verifyUser->user;
        if(!$user->verified) {
        $verifyUser->user->verified = 1;
        $verifyUser->user->save();
        $status = "Your e-mail is verified. You can now login.";
        } else {
        $status = "Your e-mail is already verified. You can now login.";
        }
    } else {
        return redirect('/login_page')->with('warning', "Sorry your email cannot be identified.");
    }
    return redirect('/login_page')->with('status', $status);
    }


}
