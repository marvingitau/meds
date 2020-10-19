<?php

namespace App\Http\Controllers;

use App\User;
use App\UserExtraData;
use App\CustomOrder;
use App\Complain;
use App\Orders;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

use App\Http\Resources\UserDetail as UserResource;
use App\Http\Resources\OrderDetail as OrderResource;



class AdminController extends Controller
{
    public function index(){
         $menu_active=1;
        $pding_client =User::select('id','name_of_institution','name','email')->where('approved',0)->count();
        $pding_order =CustomOrder::where('approved', 0)->count();
        $compl= Complain::where('dealt_with',0)->orderBy('created_at','desc')->take(-3)->get();


        return view('back-end.index',compact('menu_active','pding_client','pding_order','compl'));
    }

    public function pending_clients()
    {
        $menu_active=4;
        $user_data = User::select('id','name_of_institution','name','email')->where('approved',0)->whereNull('role')->get();
        return view('back-end.p_client',compact(['menu_active','user_data']));
    }

    public function approved_clients()
    {
        $menu_active=5;
        $user_data = User::select('id','name_of_institution','name','email')->where('approved',1)->get();
        return view('back-end.ap_client',compact(['menu_active','user_data']));
    }

    public function approving_client(Request $request, $id)
    {

        // $client = new Client;
        // $request = $client->get('https://legibratest.com/demo/meds/medsAPI/api/v1/clients/updated', ['verify' => false]);
        // $response = $request->getBody();
        // dd($response->getContents());


        $data = $request->all();
        $app_usr = User::findOrFail($id);
        $app_usr->Terms = $data['Terms'];
        $app_usr->Branch =$data['Branch'];
        $app_usr->Salesperson = $data['Salesperson'];
        $app_usr->approved=1;
        $app_usr->save();

        $url = "https://legibratest.com/demo/meds/medsAPI/api/v1/test";


        $client = new Client;
        $response = $client->request('POST',  $url, [
            'form_params' => $app_usr->toArray(),'verify' => false
        ]);

        // dd($response);
        dd( json_encode(json_decode($response->getBody(), true)) );


        // $response = Http::post('http://41.207.79.81:89/sysproapi/v1/customer/create', $app_usr->toArray());
        // return back()->with('message','Client Approved');
        // dd($response->status());
    }

    public function view_client($id)
    {
        $menu_active=4;
        $client_data = User::findOrFail($id);
        $client_files = UserExtraData::where('user_id',$id)->get();
        // $client_files = UserExtraData::where('user_id',$id)->whereNotNull('filename')->get();
        // dd(($client_files) );
        return view('back-end.view_client',compact(['menu_active','client_data','client_files']));
    }

    public function view_ap_client($id)
    {
        $menu_active=5;
        $client_data = User::findOrFail($id);
        $client_files = UserExtraData::where('user_id',$id)->get();
        // $client_files = UserExtraData::where('user_id',$id)->whereNotNull('filename')->get();
        // dd(($client_files) );
        return view('back-end.view_ap_client',compact(['menu_active','client_data','client_files','id']));
    }

    public function pending_order()
    {
        $menu_active=6;
        // $pendingOrder = CustomOrder::where('approved', 0)->get();
        $pendingOrder = Orders::where('order_verify', 0)->get();
        return view('back-end.pending_order',compact(['menu_active','pendingOrder']));
        // $menu_active=6;
        // $pendingOrder = CustomOrder::where('approved', 0)->get();
        // return view('back-end.pending_order',compact(['menu_active','pendingOrder']));

    }
    public function aprovd_order()
    {
        $menu_active=7;
        $approvedOrder=Orders::where('order_verify', 1)->where('order_verify', 1)->get();


        return view('back-end.approved_order',compact(['menu_active','approvedOrder']));
    }

    public function viu_order($id)
    {
          $menu_active=60;
        $Order = Orders::findOrFail($id);
        $Order_items = Orders::findOrFail($id)->items;
        return view('back-end.view_order',compact(['menu_active','Order','Order_items','id']));
    }

      public function viu_app_order($id)
    {
        $menu_active=60;
        $Order = Orders::findOrFail($id);
        $Order_items = Orders::findOrFail($id)->items;
        return view('back-end.view_approv_order',compact(['menu_active','Order','Order_items','id']));

    }

    public function aproving_order($id)
    {

        $approvingItems = Orders::where('id', $id)->where('order_verify', 0)->get();

        foreach ( $approvingItems as $key => $value ) {
            if($value->items){
                //order array
                foreach ($value->items as $key => $val) {
                    $id = (int)$val->id;
                    $recOd=CustomOrder::where('id', $id)->where('approved', 0)->get();

                    foreach ($recOd as $key => $va) {
                       $va->approved = 1;
                       $va->save();
                    }
                }
            }


        }


        foreach ($approvingItems as $key => $value) {
           $value->order_verify= 1;
           $value->save();
        }
        return back()->with('message','Order Approved');

    }


 public function order_destroy($id)
 {

     $delete = Orders::findOrFail($id);
     $delete->delete();
     return back()->with('message','Delete Success!');
 }

        public function list_complains()
    {
        $menu_active=8;
        $all_complains = Complain::orderBy('created_at','desc')->get();
        return view('back-end.complain_list',compact(['menu_active','all_complains']));
    }

    public function view_complain($id)
    {
        $menu_active=8;
        $single_complains = Complain::findOrFail($id);
        return view('back-end.view_complain',compact(['menu_active','single_complains']));
    }

    public function approve_complain($id)
    {
        $single_complains2 = Complain::findOrFail($id);
        $single_complains2->dealt_with = 1;
        $single_complains2->save();
        return back()->with('message','Complain Viewed');
    }

    public function complain_response(Request $request, $id)
    {
        $response = $request->validate([
            'response'=>''
        ]);

        $single_complains3 = Complain::findOrFail($id);
        $single_complains3->dealt_with = 1;
        $single_complains3->response = $response['response'];
        $single_complains3->save();
        return back()->with('message','Complain Responded To.');


    }

 public function complain_destroy($id)
    {

        $delete = Complain::findOrFail($id);
        $delete->delete();
        return back()->with('message','Delete Success!');
    }

    public function edit_client($id)
    {

        $menu_active=66;
        $client_data = User::findOrFail($id);
        $client_files = UserExtraData::where('user_id',$id)->get();
        return view('back-end.edit_user_profile',compact(['menu_active','client_data','client_files','id']));
    }

    public function updte_client(Request $request,$id)
    {
        $user = User::findOrFail($id);
        $user->phone_no = $request->input('phone_no');
        $user->name_of_institution = $request->input('name_of_institution');
        $user->name = $request->input('name');
    $up_data = ['client'=>[
    'CustomerCode'=>$user->CustomerCode,
    'id'=>$id,
    'phone_no'=>$request->input('phone_no'),
    'Person_inCharge'=>$request->input('name'),
    'Client'=>$request->input('name_of_institution')
    ]

    ];

    $user->update_values =  serialize($up_data);
    $user->update_status =  1;
    $user->save();


        return back()->with('message','Update success');
    }

    public function show_client(Request $request)
    {

        $user = User::where('update_status',1)->get();
        $arr=[];
        foreach($user as $usr){
            array_push($arr,unserialize($usr->update_values)) ;
        }

        return $arr;



    }

    public function customerCreatedPayload()
    {
        $user = User::where('approved',0)->get();

        return UserResource::collection($user);

    }

    public function orderCreatedPayload()
    {
        $Order = Orders::where('order_verify',0)->get();
        return OrderResource::collection($Order);

    }


    // Subadmins Areas
    public function createsubdmins()
    {
        $menu_active=9;
        $users = User::whereNotNull('role')->get();
        $roles = Role::all();
        // dd($users);
        return view('back-end.createsubadmins',compact(['menu_active','users','roles']));
    }

    public function registeradmin(Request $request)
    {

        $this->validate($request,[
            'name'=>'required|string|max:191',
            'email'=>'required|string|email|unique:users,email',
            'password'=>'required|min:6|confirmed',
            'role'=>'required',
        ]);
        $data = $request->all();
        $data['password']=Hash::make($data['password']);
        $userID=User::create($data);
        return back()->with('message','Special Administrator created.');

    }

    public function registerrole(Request $request)
    {
        $result = $request->validate([
            'role'=>'required'
        ]);
        $response = Role::create( ['name'=>$result['role']] );
        return back()->with('message','Role Created');
    }


    // Priviledge User

    //''' HUMAN RESOURCE '''

    public function hrindex()
    {
        $menu_active=6;
        $pendingOrder = Orders::where('order_type',1)->whereNotNull('progress_status_whmgr')->whereNull('progress_status_hr')->get();
        return view('back-end.OtherAdmins.hrIndex',compact(['menu_active','pendingOrder']));
    }
    public function hrViewStafforder($id)
    {
        $menu_active=60;
        $Order = Orders::findOrFail($id);
        $Order_items = Orders::findOrFail($id)->items;
        return view('back-end.OtherAdmins.hr_view_order',compact(['menu_active','Order','Order_items','id']));
    }
    public function hrApprovingOrder($id)
    {

        $approvingItems = Orders::where('id', $id)->where('order_verify', 1)->get();

        foreach ( $approvingItems as $key => $value ) {
            if($value->items){
                //order array
                foreach ($value->items as $key => $val) {
                    $id = (int)$val->id;
                    $recOd=CustomOrder::where('id', $id)->where('approved', 1)->get();

                    foreach ($recOd as $key => $va) {
                       $va->approved = 1;
                       $va->save();
                    }
                }
            }


        }


        foreach ($approvingItems as $key => $value) {
           $value->order_verify= 1;
           $value->progress_status_hr= 2;
           $value->save();
        }
        return back()->with('message','Order Approved');

    }

    public function hrStaffApprovedOrder()
    {
        $menu_active=7;
        $approvedOrder=Orders::where('progress_status_hr', 2)->where('order_verify', 1)->get();


        return view('back-end.OtherAdmins.hrapproved_order',compact(['menu_active','approvedOrder']));
    }
    public function hrViewApprovedOrder($id)
    {
        $menu_active=60;
        $Order = Orders::findOrFail($id);
        $Order_items = Orders::findOrFail($id)->items;
        return view('back-end.OtherAdmins.view_approv_order',compact(['menu_active','Order','Order_items','id']));

    }

        //''' ACCOUNTS '''

    public function acindex()
    {
        $menu_active=6;
        $pendingOrder = Orders::whereNull('progress_status_ac')->whereNotNull('progress_status_whmgr')->get();
        return view('back-end.OtherAdmins.Accounts.Index',compact(['menu_active','pendingOrder']));
    }
    public function acViewStafforder($id)
    {
        $menu_active=60;
        $Order = Orders::findOrFail($id);
        $Order_items = Orders::findOrFail($id)->items;
        return view('back-end.OtherAdmins.Accounts.view_order',compact(['menu_active','Order','Order_items','id']));
    }
    public function acApprovingOrder($id)
    {

        $approvingItems = Orders::where('id', $id)->where('order_verify', 1)->whereNotNull('progress_status_whmgr')->orWhereNotNull('progress_status_hr')->get();

        foreach ( $approvingItems as $key => $value ) {
            if($value->items){
                //order array
                foreach ($value->items as $key => $val) {
                    $id = (int)$val->id;
                    $recOd=CustomOrder::where('id', $id)->where('approved', 1)->get();

                    foreach ($recOd as $key => $va) {
                        $va->approved = 1;
                        $va->save();
                    }
                }
            }


        }


        foreach ($approvingItems as $key => $value) {
            $value->order_verify= 1;
            $value->progress_status_ac= 4;
            $value->save();
        }
        return back()->with('message','Order Approved');

    }

    public function acStaffApprovedOrder()
    {
        $menu_active=7;
        $approvedOrder=Orders::where('progress_status_ac', 4)->where('order_verify', 1)->get();


        return view('back-end.OtherAdmins.Accounts.approved_order',compact(['menu_active','approvedOrder']));
    }
        // public function hrViewApprovedOrder($id)
        // {
        //     $menu_active=60;
        //     $Order = Orders::findOrFail($id);
        //     $Order_items = Orders::findOrFail($id)->items;
        //     return view('back-end.OtherAdmins.view_approv_order',compact(['menu_active','Order','Order_items','id']));

        // }



    // '''' WAREHOUSE MANGER '''
    public function whmgrindex()
    {

        $menu_active=6;
        // $pendingOrder = CustomOrder::where('approved', 0)->get();
        $pendingOrder = Orders::whereNotNull('order_type')->whereNull('progress_status_whmgr')->get();
        return view('back-end.OtherAdmins.whmgrIndex',compact(['menu_active','pendingOrder']));
    }

    public function whmgrViewStafforder($id)
    {
        $menu_active=60;
        $Order = Orders::findOrFail($id);
        $Order_items = Orders::findOrFail($id)->items;
        return view('back-end.OtherAdmins.wh_view_order',compact(['menu_active','Order','Order_items','id']));
    }

    public function previledgeUserDeleteOrder(Request $request,$id)
    {
        $Order = Orders::findOrFail($id);
        $Order -> delete();
        return back()->with('message','Order Deleted');
    }
    public function whmgrApprovingOrder($id)
    {

        $approvingItems = Orders::where('id', $id)->where('order_verify', 0)->get();

        foreach ( $approvingItems as $key => $value ) {
            if($value->items){
                //order array
                foreach ($value->items as $key => $val) {
                    $id = (int)$val->id;
                    $recOd=CustomOrder::where('id', $id)->where('approved', 0)->get();

                    foreach ($recOd as $key => $va) {
                       $va->approved = 1;
                       $va->save();
                    }
                }
            }


        }


        foreach ($approvingItems as $key => $value) {
           $value->order_verify= 1;
           $value->progress_status_whmgr= 5;
           $value->save();
        }
        return back()->with('message','Order Approved');

    }

    public function whmgrStaffApprovedOrder()
    {
        $menu_active=7;
        $approvedOrder=Orders::where('progress_status_whmgr', 5)->where('order_verify', 1)->get();


        return view('back-end.OtherAdmins.approved_order',compact(['menu_active','approvedOrder']));
    }


    public function otherAdminsViewApprovedOrder($id)
    {
        $menu_active=60;
        $Order = Orders::findOrFail($id);
        $Order_items = Orders::findOrFail($id)->items;
        return view('back-end.OtherAdmins.view_approv_order',compact(['menu_active','Order','Order_items','id']));

    }


}
?>
