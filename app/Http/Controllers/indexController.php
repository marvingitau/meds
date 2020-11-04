<?php

namespace App\Http\Controllers;

use App\Product_Category;
use App\ImageGallery;
use App\ProductAttrib;
use App\Products;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    public function index(){

        if(!auth()->check()){
            $input = array(1.1, 10, 17.7, 5.1);
            $rand_keys=array_rand($input,1);
            $id =$input[$rand_keys];
            try {
                $client = new Client;
                $request = $client->get('http://41.207.79.81:89/sysproapi/v1/product/list/'.$id.'/', ['verify' => false]);
                $response = $request->getBody();

            } catch (\GuzzleHttp\Exception\ConnectException $th) {

                $hd ="The connection has timed out";

                $issue="The server at 41.207.79.81 is taking too long to respond.";

                return view('front-end.error',compact(['hd','issue']));
            }
            $products=json_decode($response->getContents());
            return view('front-end.index',compact('products'));

        }else{
            $user = auth()->user()->form_title;

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
            $input = array(1.1, 10, 17.7, 5.1);
            $rand_keys=array_rand($input,1);

            $id =$input[$rand_keys];

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
            $products=$products_price;
            return view('front-end.index',compact(['menu_active','products','i','product_cat']));
        }

    }

    public function logged_index()// products for loggedin users
    {
        // dd('here');
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
        $input = array(1.1, 10, 17.7, 5.1);
        $rand_keys=array_rand($input,1);

        $id =$input[$rand_keys];

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
        $products=$products_price;
        return view('front-end.index',compact(['menu_active','products','i','product_cat']));
    }

    public function logged_listByCat($id)// products for loggedin users including user selected category
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
        // $input = array(1.1, 10, 17.7, 5.1);
        // $rand_keys=array_rand($input,1);

        // $id = $request->input('catd');

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
        $products=$products_price;
        return view('front-end.index',compact(['menu_active','products','i','product_cat']));
    }

    public function search(Request $request)
    {
        $search =  $request->input('q');
        if($search!=""){
            $products = Products::where(function ($query) use ($search){
                $query->where('p_name', 'like', '%'.$search.'%');
            })
            ->paginate(6);
            $products->appends(['q' => $search]);
        }
        else{
            $products =  Products::paginate(6);
        }
        return view('front-end.index' ,compact('products'));
    }


    public function shop(){
        $products=Products::all();
        $byCate="";
        return view('front-end.products',compact('products','byCate'));
    }
    public function listByCat($id){
        // dd('ds');
        // $list_product=Products::where('categories_id',$id)->get();
        $client = new Client;
        $request = $client->get('http://41.207.79.81:89/sysproapi/v1/product/list/'.$id.'/', ['verify' => false]);
        $response = $request->getBody();
        // dd($response->getContents());

        $products=json_decode($response->getContents());

        $byCate=Product_Category::select('name')->where('id',$id)->first();
        return view('front-end.products',compact('products','byCate'));
    }
    public function detialpro($id){
        // $detail_product=Products::findOrFail($id);
        // $imagesGalleries=ImageGallery::where('products_id',$id)->get();
        // $totalStock=ProductAttrib::where('products_id',$id)->sum('stock');
        // $relateProducts=Products::where([['id','!=',$id],['categories_id',$detail_product->categories_id]])->get();

        try {
            $client = new Client;
            $request = $client->get('http://41.207.79.81:89/sysproapi/v1/product/price/'.$id.'/', ['verify' => false]); //product
            $response = $request->getBody();
            // dd($response->getContents());

            $products=json_decode($response->getContents());
        } catch (\Throwable $th) {
            $products = null;
        }
        // $client = new Client;
        // $request = $client->get('http://41.207.79.81:89/sysproapi/v1/product/price/'.$id.'/', ['verify' => false]);
        // $response = $request->getBody();
        // // dd($response->getContents());

        // $products=json_decode($response->getContents());



        $detail_product= $products;
        $imagesGalleries=null;
        $totalStock=null;
        // $totalStock=ProductAttrib::where('products_id',$id)->sum('stock');
        $relateProducts=null;

        // dd($detail_product);

        return view('front-end.product_details',compact('detail_product','imagesGalleries','totalStock','relateProducts'));
    }
    public function getAttrs(Request $request){
        $all_attrs=$request->all();
        //print_r($all_attrs);die();
        $attr=explode('-',$all_attrs['size']);
        //echo $attr[0].' <=> '. $attr[1];
        $result_select=ProductAttrib::where(['products_id'=>$attr[0],'size'=>$attr[1]])->first();
        echo $result_select->price."#".$result_select->stock;
    }
}
?>



