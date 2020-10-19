<?php

namespace App\Http\Controllers;

use App\Product_Category;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu_active=0;
        $categories=Product_Category::all();
        return view('back-end.category.index',compact('menu_active','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu_active=2;
        $plucked=Product_Category::where('parent_id',0)->pluck('name','id');
        $cate_levels=['0'=>'Main Category']+$plucked->all();
        return view('back-end.category.create',compact('menu_active','cate_levels'));
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
            'name'=>'required|max:255|unique:product__categories,name',
            'url'=>'required',
        ]);
        $data=$request->all();
        Product_Category::create($data);
        return redirect()->route('category.index')->with('message','Added Success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product_Category  $product_Category
     * @return \Illuminate\Http\Response
     */
    public function show(Product_Category $product_Category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product_Category  $product_Category
     * @return \Illuminate\Http\Response
     */
    public function edit(Product_Category $product_Category)
    {
        $menu_active=0;
        $plucked=Product_Category::where('parent_id',0)->pluck('name','id');
        $cate_levels=['0'=>'Main Category']+$plucked->all();
        $edit_category=Product_Category::findOrFail($id);
        return view('back-end.category.edit',compact('edit_category','menu_active','cate_levels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product_Category  $product_Category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product_Category $product_Category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product_Category  $product_Category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product_Category $product_Category)
    {
        //
    }
}
