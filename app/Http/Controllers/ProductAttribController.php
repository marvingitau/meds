<?php

namespace App\Http\Controllers;

use App\ProductAttrib;
use Illuminate\Http\Request;
use App\Products;

class ProductAttribController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'sku'=>'required',
            'size'=>'required',
            'price'=>'required',
            'stock'=>'required|numeric'
        ]);
        ProductAttrib::create($request->all());
        return back()->with('message','Add Attribute Successed');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductAttrib  $productAttrib
     * @return \Illuminate\Http\Response
     */
    public function show(ProductAttrib $productAttrib,$id)
    {
        $menu_active =3;
        $attributes=ProductAttrib::where('products_id',$id)->get();
        $product=Products::findOrFail($id);
        return view('back-end.products.add_pro_atrr',compact('menu_active','product','attributes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductAttrib  $productAttrib
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductAttrib $productAttrib)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductAttrib  $productAttrib
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductAttrib $productAttrib)
    {
        $request_data=$request->all();
        foreach ($request_data['id'] as $key=>$attr){
            $update_attr=ProductAttrib::where([['products_id',$id],['id',$request_data['id'][$key]]])
                ->update(['sku'=>$request_data['sku'][$key],'size'=>$request_data['size'][$key],'price'=>$request_data['price'][$key],
                    'stock'=>$request_data['stock'][$key]]);
        }
        return back()->with('message','Update Attribute Successed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductAttrib  $productAttrib
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductAttrib $productAttrib,$id)
    {
        $deleteAttr=ProductAttrib::findOrFail($id);
        $deleteAttr->delete();
        return back()->with('message','Deleted Success!');
    }
}
