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
                @if(Session::has('message'))
                    <div class="alert alert-success text-center" role="alert">
                        {{Session::get('message')}}
                    </div>
                @endif
        <div class="product-details"><!--product-details-->
            <div class="row">
            {{-- <div class="col-sm-5 d-none"> --}}
                {{-- <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
                    <a href="{{url('products/large',$detail_product->image)}}">
                        <img src="{{url('public/products/small',$detail_product->image)}}" alt="" id="dynamicImage"/>
                    </a>
                </div> --}}

                {{-- <ul class="thumbnails" style="margin-left: -10px;">
                    <li>
                        @foreach($imagesGalleries as $imagesGallery)
                            <a href="{{url('products/large',$imagesGallery->image)}}" data-standard="{{url('products/small',$imagesGallery->image)}}">
                                <img src="{{url('products/small',$imagesGallery->image)}}" alt="" width="75" style="padding: 8px;">
                            </a>
                        @endforeach
                    </li>
                </ul> --}}
            {{-- </div> --}}
            <div class="col-sm-10 d-none0">
                <form action="{{route('addToCart')}}" method="post" role="form">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="products_id" value="<?php isset($detail_product[0])?$detail_product[0]->ProductCode:'0' ?>">
                    <input type="hidden" name="product_name" value="<?php isset($detail_product[0])?$detail_product[0]->ProductCode:'0' ?>">
                    {{-- <input type="hidden" name="product_code" value="{{$detail_product->p_code}}">
                    <input type="hidden" name="product_color" value="{{$detail_product->p_color}}"> --}}
                    {{-- <input type="hidden" name="price" value="{{$detail_product->price}}" id="dynamicPriceInput"> --}}
                    <div class="product-information"><!--/product-information-->
                        {{-- <img src="{{asset('front-end/images/product-details/new.jpg')}}" class="newarrival" alt="" /> --}}
                        <h2><?php echo(isset($detail_product[0])?$detail_product[0]->Description:'NA');  ?></h2>
                        {{-- <!--<p>Code ID: {{$detail_product->p_code}}</p>--> --}}
                        <span>
                         {{-- <!--   <select name="size" id="idSize" class="form-control">-->
                        	<!--<option value="">Select Size</option>-->
                         <!--   @foreach($detail_product->attributes as $attrs)-->
                         <!--       <option value="{{$detail_product->id}}-{{$attrs->size}}">{{$attrs->size}}</option>-->
                         <!--   @endforeach-->
                         <!--   </select>--> --}}
                                 <input type="hidden" value="0" name="size">
                        </span>
                        <br>
                        <span>
                            {{-- <!--<span id="dynamic_price">ksh {{!empty($detail_product->attributes[0])? $detail_product->attributes[0]->price:$detail_product->price }}</span>--> --}}
                            {{-- <label>Quantity:</label> --}}
                            {{-- <input type="text" name="quantity" id="inputStock" required/> --}}
                            @if(0)
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



        <div class="recommended_items"><!--recommended_items-->
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
