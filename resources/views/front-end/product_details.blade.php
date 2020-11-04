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
                    <input type="hidden" name="product_code" value="NA">
                    <input type="hidden" name="product_color" value="NA">
                    <input type="hidden" name="size" value="0">

                    <div class="product-information"><!--/product-information-->

                        <h2><?php echo(isset($detail_product[0])?$detail_product[0]->Description:'NA');  ?></h2>

                        <?php
                        foreach ($detail_product[0]->Pricing as $key => $value) {
                            ?>
                            <input type="hidden" name="price" value="{{$value->SellingPrice}}" id="dynamicPriceInput">
                            <?php


                        } ?>
                        <br>
                        <span>
                            {{-- <!--<span id="dynamic_price">ksh {{!empty($detail_product->attributes[0])? $detail_product->attributes[0]->price:$detail_product->price }}</span>--> --}}
                            <label>Quantity:</label>
                            <input type="number" name="quantity" id="inputStock" min=0 required/>
                            @if(auth()->check())
                            <button type="submit" class="btn btn-fefault cart" id="buttonAddToCart">
                                <i class="fa fa-shopping-cart"></i>
                                Add to cart
                            </button>
                            @endif
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
{{-- <link rel="stylesheet" href="{{asset('easyzoom/css/easyzoom.css')}}" /> --}}
{{-- <script src="{{asset('frontend/js/jquery.prettyPhoto.js')}}"></script> --}}
{{-- <script src="{{asset('easyzoom/dist/easyzoom.js')}}"></script> --}}
<script>
    // Instantiate EasyZoom instances
    // var $easyzoom = $('.easyzoom').easyZoom();

    // // Setup thumbnails example
    // var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');

    // $('.thumbnails').on('click', 'a', function(e) {
    //     var $this = $(this);

    //     e.preventDefault();

    //     // Use EasyZoom's `swap` method
    //     api1.swap($this.data('standard'), $this.attr('href'));
    // });

    // // Setup toggles example
    // var api2 = $easyzoom.filter('.easyzoom--with-toggle').data('easyZoom');

    // $('.toggle').on('click', function() {
    //     var $this = $(this);

    //     if ($this.data("active") === true) {
    //         $this.text("Switch on").data("active", false);
    //         api2.teardown();
    //     } else {
    //         $this.text("Switch off").data("active", true);
    //         api2._init();
    //     }
    // });
</script>
