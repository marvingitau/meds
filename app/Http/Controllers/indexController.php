<?php

namespace App\Http\Controllers;

use App\Product_Category;
use App\ImageGallery;
use App\ProductAttrib;
use App\Products;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class IndexController extends Controller
{
    public function index(){

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
            $request = $client->get('http://41.207.79.81:89/sysproapi/v1/product/price/'.$id.'/', ['verify' => false]);
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



