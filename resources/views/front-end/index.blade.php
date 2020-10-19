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



                                {{-- <form action="{{ url('/search') }}" method="POST" role="search">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-4 offset-md-8">
                                            <div class="input-group ">
                                                <input type="text" class="form-control w-50" name="q"
                                                    placeholder="Search Products"> <span class="input-group-btn">
                                                    <button type="submit" class="btn btn-info">
                                                        search
                                                        <span class="glyphicon glyphicon-search"></span>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                </form> --}}
                                @if(Session::has('message'))
                                <div class="alert alert-danger text-center" role="alert">
                                    {{Session::get('message')}}
                                </div>
                            @endif


                        <h2 class="title text-center" style="padding-top:4rem;">Features Items</h2>
                        <div class="row">
                            @foreach($products as $product)
                                   <?php  //var_dump($product) ?>
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
