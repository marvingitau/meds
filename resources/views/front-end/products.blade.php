@extends('front-end.layouts.master')
@section('title','List Products')
{{-- @section('slider')
@endsection --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                @include('front-end.layouts.category_menu')
            </div>
            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <?php
                            // if($byCate!=""){
                            //     $products=$list_product;
                            //     echo '<h2 class="title text-center">Category '.$byCate->name.'</h2>';
                            // }else{
                            //     echo '<h2 class="title text-center">List Products</h2>';
                            // }
                    ?>
                    <div class="row">
                    @foreach($products as $product)
                        {{-- @if($product->category->status==1) --}}
                            <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        {{-- <a href="{{url('/product-detail',$product->id)}}"><img src="{{url('public/products/small/',$product->image)}}" alt="" /></a> --}}
                                        {{-- <!--<h2>Ksh {{$product->price}}</h2>--> --}}
                                        <p>{{$product->Description}}</p>
                                        <a href="{{url('/product-detail',$product->ProductCode)}}" class="btn btn-default add-to-cart">View Product</a>
                                    </div>
                                </div>
                                <div class="choose d-none">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                        <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        {{-- @endif --}}
                    @endforeach
                    </div>
                    {{--<ul class="pagination">
                        <li class="active"><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">&raquo;</a></li>
                    </ul>--}}
                </div><!--features_items-->
            </div>
        </div>
    </div>
@endsection
