@extends('front-end.layouts.master')
@section('title','Home Page')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    @include('front-end.layouts.category_menu')
                </div>

                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->




                            @if(Session::has('message'))
                                <div class="alert alert-danger text-center" role="alert">
                                    {{Session::get('message')}}
                                </div>
                            @endif

                            <div class="jumbotron">
                                <div class="row">
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6">
                                        <div class="text-right">
                                            <ul class="cart-section ">
                                                <li class="site-setting-client-cart" ><a href="http://legibratest.com/demo/meds/medsAPI/viewcart" style="color:unset;text-decoration:none;" class=""><i class="fa fa-shopping-cart mr-md-3 icon-cl"></i> <span class="label label-important">{{ Session::get('cart_val') }} </span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>




                        <h2 class="title text-center" style="padding-top:4rem;">Products</h2>
                        <div class="row">
                            @foreach($products as $product)

                            {{-- @if($product->category->status==1) --}}
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    {{-- <a href="{{url('/product-detail',$product->id)}}"><img src="{{url('public/products/small/',$product->image)}}" alt="" /></a> --}}
                                                    <p class="my-3">{{$product->Description}}</p>
                                                    @if(auth()->check())
                                                    <?php
                                                    foreach ($product->Pricing as $key => $value) {
                                                        ?>
                                                         <h2>Ksh {{$value->SellingPrice}}</h2>
                                                        <?php


                                                    } ?>
                                                    @endif


                                                    <a href="{{url('/product-detail',$product->ProductCode)}}" class="btn btn-default add-to-cart">View Product</a>
                                                </div>
                                            </div>
                                        <div class="choose d-none">
                                            <ul class="nav nav-pills nav-justified">
                                                <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                                <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            {{-- @endif --}}


                        @endforeach

                        </div>
                    </div><!--features_items-->

                {{-- Pagination --}}
                <div class="d-flex justify-content-center c_pagination">
                    {{-- {!! $products->links() !!} --}}
                </div>
                </div>
            </div>
        </div>
    </section>
@endsection
