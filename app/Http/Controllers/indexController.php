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

$url = 'http://41.207.79.81:89/sysproapi/v1/product/list/1.1/';
//  $url = 'http://dummy.restapiexample.com/api/v1/employees';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_PORT, 89);
curl_setopt($ch, CURLOPT_TIMEOUT, 4000);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, True);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);
$report=curl_getinfo($ch);
// print_r($report);
$result = curl_exec($ch);
curl_close($ch);
// print_r($result);


//not working
        // $url = 'http://41.207.79.81:89/sysproapi/v1/product/list/1.1/';
        // $curl = curl_init();
        // curl_setopt($curl, CURLOPT_URL, $url);
        // curl_setopt($curl, CURLOPT_RETURNTRANSFER, 0);
        // curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        // curl_setopt($curl, CURLOPT_PORT, [89]);
        // curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.16) Gecko/20110319 Firefox/3.6.16");
        // $curlData = curl_exec($curl);
        // echo 'curl_getinfo: ';
        // echo "<pre>";
        // print_r(curl_getinfo($curl));
        // echo "</pre>";
        // if (curl_errno($curl)) {
        //     echo 'Error: ' . curl_error($curl);
        // }
        // curl_close($curl);
        // echo $curlData;


    //     // WORKED
    // $url = "http://41.207.79.81:89/sysproapi/v1/product/list/1.1/";
    // $ch = curl_init();
    // curl_setopt($ch, CURLOPT_URL, $url);
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
    // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    // curl_setopt($ch, CURLOPT_VERBOSE, true);
    // $verbose = fopen('php://temp', 'w+');
    // curl_setopt($ch, CURLOPT_STDERR, $verbose);

    // $result = curl_exec($ch);

    // curl_close($ch);

    // var_dump(json_decode($result));





        // $curl = curl_init();
        // $input = array(1.1, 10, 17.7, 5.1);
        // $rand_keys=array_rand($input,1);

        // $id =$input[$rand_keys];

        // curl_setopt_array($curl, array(
        //     CURLOPT_URL => "http://41.207.79.81:89/sysproapi/v1/product/list/1.1/",
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_ENCODING => "",
        //     CURLOPT_TIMEOUT => 30000,
        //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //     CURLOPT_CUSTOMREQUEST => "GET",
        //     CURLOPT_HTTPHEADER => array(
        //         'Content-Type: application/json',
        //     ),
        // ));
        // $response = curl_exec($curl);
        // $err = curl_error($curl);
        // curl_close($curl);

        // if ($err) {
        //     echo "cURL Error #:" . $err;
        // } else {
        //     $products = (json_decode($response));
        //     return view('front-end.index',compact('products'));
        // }







        $input = array(1.1, 10, 17.7, 5.1);
        $rand_keys=array_rand($input,1);

        $id =$input[$rand_keys];

        try {
            $client = new Client;
            $request = $client->get('http://41.207.79.81:89/sysproapi/v1/product/list/'.$id.'/', ['verify' => false]);
            $response = $request->getBody();

        } catch (\Throwable $th) {
            dd('err'.$th);
        }

        // dd($response->getContents());

        // $products=json_decode($result);
        $products=json_decode($response->getContents());
        // $products =Products::all();
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



