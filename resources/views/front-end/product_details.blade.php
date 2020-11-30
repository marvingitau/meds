@extends('front-end.layouts.master')
@section('title','Detail Page')
{{-- @section('slider')
@endsection --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                @include('front-end.layouts.category_menu')
            </div>
        <div class="col-sm-9 padding-right product-detsil">
            @if(auth()->check())
            <div class="jumbotron">
                <div class="row">
                    <div class="col-md-6">

                        <?php
                            if(!is_null(auth()->user()->form_title )){
                                ?>
                        <a href="{{ route('client.dashboard') }}" class="p-5 text-center bg-info rounded-1 text-white my-auto"> <i class=" 	fa fa-dashboard"></i> Dashboard</a>

                                <?php
                            }else{
                                ?>
                        <a href="{{ route('staff.home') }}" class="p-5 text-center bg-info rounded-1 text-white my-auto"><i class=" 	fa fa-dashboard"></i> Dashboard</a>

                                <?php
                            }
                        ?>
                    </div>
                    <div class="col-md-6">
                        <div class="text-right">
                            <ul class="cart-section ">
                                <li class="site-setting-client-cart" ><a href="http://legibratest.com/demo/meds/medsAPI/viewcart" style="color:unset;text-decoration:none;" class=""><i class="fa fa-shopping-cart mr-md-3 icon-cl"></i> <span class="label label-important">{{ Session::get('cart_val') }} </span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endif

                @if(Session::has('message'))
                    <div class="alert alert-success text-center" role="alert">
                        {{Session::get('message')}}
                    </div>
                @endif
    @if(auth()->check())
        <div class="product-details"><!--product-details-->

            <div class="row">

            <div class="col-sm-10 ">
                <form action="{{route('clientAddToCart')}}" method="post" role="form">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="products_id" value="{{$detail_product[0]->ProductCode}}">
                    <input type="hidden" name="product_name" value="{{$detail_product[0]->Description}}">
                    {{-- <input type="hidden" name="itemUnits" value="{{$detail_product[0]->StockUom}}"> StockUom --}}
                    <input type="hidden" name="itemDesc" value="{{$detail_product[0]->Description}}"> {{-- itemCode--}}
                    <input type="hidden" name="itemCode" value="{{$detail_product[0]->ProductCode}}"> {{-- ProductClass--}}
                    <input type="hidden" name="ProductClass" value="{{$detail_product[0]->ProductClass}}"> {{-- ProductClass--}}
                    <input type="hidden" name="product_code" value="NA">
                    <input type="hidden" name="product_color" value="NA">
                    <input type="hidden" name="size" value="0">

                    <div class="product-information"><!--/product-information-->

                        <h2><?php echo(isset($detail_product[0])?$detail_product[0]->Description:'NA');  ?> <span class="text-info">|</span> Unit Of Measurement:  <?php echo(isset($detail_product[0])?$detail_product[0]->StockUom:'NA');  ?> </h2>

                        <?php
                        foreach ($detail_product[0]->Pricing as $key => $value) {
                            ?>
                            <input type="hidden" name="price" value="{{$value->SellingPrice}}" id="dynamicPriceInput">
                            <input type="hidden" name="baseCurrency" value="{{$value->Currency}}" id="baseCurrency">
                            <input type="hidden" name="itemUnits" value="{{$value->UnitOfMeasure}}" id="itemUnits">
                            <?php


                        } ?>
                        <br>
                        <span>

                            <?php
                                if(auth()->check() && !is_null(auth()->user()->form_title )){
                            ?>
                            {{-- <!--<span id="dynamic_price">ksh {{!empty($detail_product->attributes[0])? $detail_product->attributes[0]->price:$detail_product->price }}</span>--> --}}
                            <label>Quantity:</label>
                            <input type="number" name="quantity" id="inputStock" min=0 required style="width:66px;"/>
                            <div class="form-group">
                                <label for=""></label>
                                <input type="text" class="form-control  rounded-0" style="width:58%" name="PONumber" id="PONumber" aria-describedby="helpId" placeholder="PONumber" required>
                            </div>

                            <button type="submit" class="btn btn-fefault  cart " style="width:58%" id="buttonAddToCart" style="margin-left: 0px;">
                                <i class="fa fa-shopping-cart"></i>
                                Add to cart
                            </button>
                           <?php
                            }
                           ?>
                        </span>
                        <p><b>Availability:</b>
                            @if(1)
                                <span id="availableStock">In Stock</span>
                            @else
                                <span id="availableStock">Out of Stock</span>
                            @endif
                        </p>
                        <!--<p><b>Condition:</b> New</p>-->
                        {{-- <a href=""><img src="{{asset('public/front-end/images/product-details/share.png')}}" class="share img-responsive"  alt="" /></a> --}}
                    </div><!--/product-information-->
                </form>

            </div>
            </div>

        </div><!--/product-details-->
        @else
        <div class="product-details"><!--product-details-->
            <div class="row">

            <div class="col-sm-10 ">
                <form action="{{route('addToCart')}}" method="post" role="form">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    {{-- <input type="hidden" name="products_id" value="{{$detail_product[0]->ProductCode}}">
                    <input type="hidden" name="product_name" value="{{$detail_product[0]->Description}}"> --}}
                    <input type="hidden" name="product_code" value="NA">
                    <input type="hidden" name="product_color" value="NA">
                    <input type="hidden" name="size" value="0">

                    <div class="product-information"><!--/product-information-->

                        <h2><?php echo(isset($detail_product[0])?$detail_product[0]->Description:'NA');  ?></h2>

                        <p><b>Availability:</b>
                            @if(1)
                                <span id="availableStock">In Stock</span>
                            @else
                                <span id="availableStock">Out of Stock</span>
                            @endif
                        </p>
                        <!--<p><b>Condition:</b> New</p>-->
                        {{-- <a href=""><img src="{{asset('public/front-end/images/product-details/share.png')}}" class="share img-responsive"  alt="" /></a> --}}
                    </div><!--/product-information-->
                </form>

            </div>
            </div>

        </div><!--/product-details-->
        @endif



        <div class="recommended_items d-none"><!--recommended_items-->
             <h2 class="title text-center">Description</h2>

            <div class="description">
                <?php echo(isset($detail_product[0])?$detail_product[0]->LongDesc:'NA');  ?>
                {{-- {{$detail_product->LongDesc}} --}}
            </div>


        </div><!--/recommended_items-->

    </div>
        </div>
    </div>
@endsection
