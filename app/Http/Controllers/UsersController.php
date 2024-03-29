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
use PDF;

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
        $customer_code= auth()->user()->CustomerCode;

        // Fetch User Data


        try {
            $client = new Client;
        $request = $client->get('http://41.207.79.81:89/sysproapi/v1/customer/statement/'.$customer_code.'/', ['verify' => false]);
        $response = $request->getBody();
        $user_summary=json_decode($response->getContents());

        // dd($user_summary);

        // HighestBalance
        // CurrentBalance

        $CreditBalance = $user_summary->ARStatement->TotalSection->CreditBalance;
        $creditlimit = $user_summary->ARStatement->Header->CreditLimit;

        $current= $user_summary->ARStatement->TotalSection->Current;
        $thirty=$user_summary->ARStatement->TotalSection->Days30;
        $sixty=$user_summary->ARStatement->TotalSection->Days60;
        $ninety=$user_summary->ARStatement->TotalSection->Days90;
        $onetwenty=$user_summary->ARStatement->TotalSection->Days120;

        // sales history
        $period1 = $user_summary->ARStatement->SalesHistory->Period01;
        $period2 = $user_summary->ARStatement->SalesHistory->Period02;
        $period3 = $user_summary->ARStatement->SalesHistory->Period03;
        $period4 = $user_summary->ARStatement->SalesHistory->Period04;
        $period5 = $user_summary->ARStatement->SalesHistory->Period05;
        $period6 = $user_summary->ARStatement->SalesHistory->Period06;
        $period7 = $user_summary->ARStatement->SalesHistory->Period07;
        $period8 = $user_summary->ARStatement->SalesHistory->Period08;
        $period9 = $user_summary->ARStatement->SalesHistory->Period09;
        $period10 = $user_summary->ARStatement->SalesHistory->Period10;
        $period11 = $user_summary->ARStatement->SalesHistory->Period11;
        $period12 = $user_summary->ARStatement->SalesHistory->Period12;


        $session_id=Session::get('session_id');
        $cart_count =Cart::where('session_id',$session_id)->get()->count();

        Session::put('cart_val',$cart_count);


        $id= auth()->user()->id;
        $invoice_data= CustomOrder::where('users_id',$id)->where('approved',0)->take(-10)->get();
        $statement_data= CustomOrder::where('users_id',$id)->where('approved',1)->take(-10)->get();
        return view('back-end.Client.index',compact(['menu_active','CreditBalance','creditlimit','current','thirty',
        'sixty','ninety','onetwenty',
        'invoice_data','statement_data',
        'period1',
        'period2',
        'period3',
        'period4',
        'period5',
        'period6',
        'period7',
        'period8',
        'period9',
        'period10',
        'period11',
        'period12',


        ]));
        } catch (\Throwable $th) {

            $CreditBalance = null;
            $creditlimit =null;

            $current= null;
            $thirty=null;
            $sixty=null;
            $ninety=null;
            $onetwenty=null;
            // sales history
            $period1 = null;
            $period2 = null;
            $period3 = null;
            $period4 = null;
            $period5 = null;
            $period6 = null;
            $period7 = null;
            $period8 = null;
            $period9 = null;
            $period10 = null;
            $period11 = null;
            $period12 = null;


            $session_id=Session::get('session_id');
            $cart_count =Cart::where('session_id',$session_id)->get()->count();

            Session::put('cart_val',$cart_count);


            $id= auth()->user()->id;
            $invoice_data= CustomOrder::where('users_id',$id)->where('approved',0)->take(-10)->get();
            $statement_data= CustomOrder::where('users_id',$id)->where('approved',1)->take(-10)->get();
            return view('back-end.Client.index',compact(['menu_active','CreditBalance','creditlimit','current','thirty',
            'sixty','ninety','onetwenty',
            'invoice_data','statement_data',
            'period1',
            'period2',
            'period3',
            'period4',
            'period5',
            'period6',
            'period7',
            'period8',
            'period9',
            'period10',
            'period11',
            'period12',


            ]));
        }


    }

    public function order_sttus()
    {

        $menu_active=16;
        $id= auth()->user()->id;

        $allOrders= Orders::where('users_id',$id)->get();


        return view('back-end.Client.checkout.ord_review',compact(['menu_active','allOrders']));

        // $menu_active=16;
        // $id= auth()->user()->id;
        // $invoice_pending= CustomOrder::where('users_id',$id)->where('approved',0)->get();
        // $invoice_approved= CustomOrder::where('users_id',$id)->where('approved',1)->get();

        // return view('back-end.Client.checkout.ord_review',compact(['menu_active','invoice_pending','invoice_approved']));
    }

    public function order_progrss()
    {
        $menu_active=16;
        $id= auth()->user()->id;
        $currentClientOrders = Orders::where('users_id',$id)->paginate(5); //get all current client order
        return view('back-end.Client.orderStatus',compact(['menu_active','currentClientOrders']));
    }

    public function view_order($id)
    {
          $menu_active=60;
        $Order = Orders::findOrFail($id);
        $Order_items = Orders::findOrFail($id)->items;
        return view('back-end.Client.view_order',compact(['menu_active','Order','Order_items','id']));
    }
    public function order_placed()
    {
        $menu_active=18;
        $id= auth()->user()->id;

        $allOrders= Orders::where('users_id',$id)->where('order_verify',0)->get();


        return view('back-end.Client.checkout.ord_review',compact(['menu_active','allOrders']));
    }

    public function order_in_warehouse()
    {
        $menu_active=19;
        $id= auth()->user()->id;

        $allOrders= Orders::where('users_id',$id)->where('order_verify',1)->where('order_type',99)->get();


        return view('back-end.Client.checkout.ord_review',compact(['menu_active','allOrders']));
    }

    public function order_packed()
    {
        $menu_active=20;
        $id= auth()->user()->id;

        $allOrders= Orders::where('users_id',$id)->where('order_verify',1)->where('progress_status_packaged',1)->get();


        return view('back-end.Client.checkout.ord_review',compact(['menu_active','allOrders']));
    }

    public function order_readyFor_dispatch()
    {
        $menu_active=21;
        $id= auth()->user()->id;

        $allOrders= Orders::where('users_id',$id)->where('order_verify',1)->where('progress_status_dispatch',1)->get();


        return view('back-end.Client.checkout.ord_review',compact(['menu_active','allOrders']));
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

                    fputcsv($file, [$res->order_id,$res->products_id,$res->product_name,$res->price,$res->quantity,(($res->price*$res->quantity)*(116/100))
                    ]);
                }
                fclose($file);
            };

            return response()->stream($callback, 200, $headers);
    }

    public function invoicedownloadpdf()
    {
        $id= auth()->user()->id;
        $menu_active=15;
        $name = auth()->user()->name;
        $invoice_data= CustomOrder::where('users_id',$id)->where('approved',0)->get();

        $pdf = PDF::loadView('back-end.Client.invoicepdf', compact(['menu_active','invoice_data']));



        return $pdf->download( $name.'.pdf');
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
        // if($user == "private institution"){
        //     $u_id = "PR";
        // }elseif($user == "faithbased institution"){
        //     $u_id = "OH";
        // }elseif($user =="government institution"){
        //     $u_id = "OH";
        // }elseif($user =="ngo"){
        //     $u_id = "NG";
        // }elseif($user =="learning institutions"){
        //     $u_id = "LN";
        // }
        if($user == "private institution"){
            $u_id = "N"; //N is price code
        }elseif($user == "faithbased institution"){
            $u_id = "N";
        }elseif($user =="government institution"){
            $u_id = "N";
        }elseif($user =="ngo"){
            $u_id = "N";
        }elseif($user =="learning institutions"){
            $u_id = "N";
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
            'filename.*' => 'max:1048',

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
        // generate customer code

        // get which cat they belong

        $from= $input_data['form_title'];
        if($from == "private institution"){
            $code_prefix = "P"; //N is price code

            // get businnes name first 3 the letter
            $org_name =  strtoupper(substr($input_data['name_of_institution'],0,3));

            $code_numeric = sprintf("%03d",mt_rand(000,999));

            $final_code = $code_prefix.''. $org_name.''. $code_numeric;
            $customer_class = "PR";

        }elseif($from == "faithbased institution"){
            $code_prefix = "F";
            // get businnes name first 3 the letter
            $org_name =  strtoupper(substr($input_data['name_of_institution'],0,3));

            $code_numeric = sprintf("%03d",mt_rand(000,999));

            $final_code = $code_prefix.''. $org_name.''. $code_numeric;
            $customer_class = "OT";

        }elseif($from =="government institution"){
            $code_prefix = "G";
            // get businnes name first 3 the letter
            $org_name =  strtoupper(substr($input_data['name_of_institution'],0,3));

            $code_numeric = sprintf("%03d",mt_rand(000,999));

            $final_code = $code_prefix.''. $org_name.''. $code_numeric;

            $customer_class = "OT";
        }elseif($from =="ngo"){
            $code_prefix = "N";

            // get businnes name first 3 the letter
            $org_name =  strtoupper(substr($input_data['name_of_institution'],0,3));

            $code_numeric = sprintf("%03d",mt_rand(000,999));

            $final_code = $code_prefix.''. $org_name.''. $code_numeric;
            $customer_class = "NG";

        }elseif($from =="learning institutions"){
            $code_prefix = "L";
            // get businnes name first 3 the letter
            $org_name =  strtoupper(substr($input_data['name_of_institution'],0,3));

            $code_numeric = sprintf("%03d",mt_rand(000,999));

            $final_code = $code_prefix.''. $org_name.''. $code_numeric;
            $customer_class = "LN";

        }else{
            $code_prefix = "A"; //staff

            // get businnes name first 3 the letter
            $org_name =  strtoupper(substr($input_data['name_of_institution'],0,3));

            $code_numeric = sprintf("%03d",mt_rand(000,999));

            $final_code = $code_prefix.''. $org_name.''. $code_numeric;
            $customer_class = "OT";
        }



        $input_data['password']=Hash::make($input_data['password']);
        $userID=User::create($input_data+['CustomerCode'=>$final_code,'customerclass'=> $customer_class ]);



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
        if(Auth::attempt(['email'=>$input_data['email'],'password'=>$input_data['password'],'verified'=>1],$request->get('remember'))){
            Session::put('frontSession',$input_data['email']);
            Session::put('user_access','in');
             Session::put('cart_val',0);
            return redirect('/');
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
