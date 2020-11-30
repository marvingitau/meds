
@extends('back-end.Staff.layouts.master')
@section('cssblock')

     {{-- <link rel="stylesheet" href="css/bootstrap.min.css" /> --}}
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
     <link rel="stylesheet" href="{{asset('public/css/bootstrap-responsive.min.css')}}" />
     <link rel="stylesheet" href="{{asset('public/css/colorpicker.css')}}" />
     <link rel="stylesheet" href="{{asset('public/css/datepicker.css')}}" />
     <link rel="stylesheet" href="{{ asset('public/css/custom-staffgen.css')}}" />
     <link rel="stylesheet" href="{{asset('public/css/uniform.css')}}" />
     <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
     <link rel="stylesheet" href="{{asset('public/css/matrix-style.css')}}" />
     <link rel="stylesheet" href="{{asset('public/css/matrix-media.css')}}" />
     <link rel="stylesheet" href="{{asset('public/css/bootstrap-wysihtml5.css')}}" />
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
     {{-- <link href="font-awesome/css/font-awesome.css" rel="stylesheet" /> --}}
     <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">



@endsection
@section('content')
    <!--breadcrumbs-->
    <div id="content-header">
    <div id="breadcrumb">
        <a href="{{ route('staff.home')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a href="{{ route('prescription.product.list')}}" title="Here" class="tip-bottom"><i class="icon-home"></i> Prescription List</a>

    </div>
    </div>
    <!--End-breadcrumbs-->

    <div class="widget-content" >
        <div class="row-fluid">


    <form action="{{ url("staff/product/prescription/cat") }}" method="post" class="form-horizontal">
        @csrf
            <div class="row d-flex align-items-center">
                <div class="col-md-3 offset-md-3">
                    <div class="form-group">
                        <label class="control-labelk">Select Category</label>
                        <div class="controlsk">


                          <select id="d" name="catd" class="form-control">

                            <option value="" >Choose Category</option>

                            @if ($product_cat)
                                @foreach ($product_cat as $item)
                                    <option value="{{ $item->Product_class }}" <?php if((Session::get('product_category_session_id') == $item->Product_class)){echo 'selected';}  ?> >{{ $item->Description }}</option>
                                @endforeach
                            @endif

                          </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <button type="submit" class="btn btn-default border-info" style="padding: 0rem;
                        margin-bottom: -1rem;
                        color:#27a9e3;">apply</button>
                    </div>
                </div>
            </div>


    </form>



    @if(Session::has('message'))
        <div class="alert alert-success text-center" role="alert">
            {{Session::get('message')}}
        </div>
    @endif
    {{-- <div class="widget-content" >
        <div class="row-fluid"> --}}
            <div class="custom-table">
                <div class="widget-content nopadding">
                    <table class="table table-bordered " id="data-table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Code</th>
                            <th>Product Name</th>
                            <th>Product Class</th>
                            <th>Currency</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if ($list_product)
                        @foreach($list_product as $product)
                        <?php $i++; ?>
                        <tr class="gradeC">
                            <td>{{$i}}</td>
                            <td style="vertical-align: middle;">{{$product->ProductCode}}</td>
                            <td style="vertical-align: middle;">{{$product->Description}}</td>
                            <td style="vertical-align: middle;">{{$product->ProductClass}}</td>
                            <td style="vertical-align: middle;">
                            <?php
                            // foreach ($product->Pricing as $key => $value) {
                                echo($product->Pricing[0]->Currency);

                            // }
                             ?>
                            </td>
                            <td style="vertical-align: middle;">
                                <?php
                                // foreach ($product->Pricing as $key => $value) {
                                    echo($product->Pricing[0]->SellingPrice);

                                // }
                                ?>
                            </td>

                            <td style="text-align: center; vertical-align: middle;">

                                <!-- Button trigger modal -->
                            <button type="button" class="btn btn-info btn-mini" data-toggle="modal" data-target="#modelId{{$product->ProductCode}}">

                                <i class=" 	fa fa-eye"></i>    View
                            </button>
                            {{-- <a href="{{route('addToCart')}}" class="btn btn-primary btn-mini add-cart-btn"><i class="fa fa-shopping-cart icon-cl"></i></a> --}}
                                {{-- <a href="{{route('product.edit',$product->id)}}" class="btn btn-primary btn-mini">Edit</a> --}}
                                {{-- <a href="javascript:" rel="{{$product->id}}" rel1="delete-product" class="btn btn-danger btn-mini deleteRecord">Delete</a> --}}
                            </td>
                        </tr>



                        <!-- Modal -->
                        <div class="modal hide" id="modelId{{$product->ProductCode}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content item-view-from-card">
                                    <div class="modal-header">
                                        <h3>{{$product->Description}}</h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="card">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="card-body">
                                                        <h3 class="card-title">{{$product->Description}}</h3>

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card-body">
                                                        <h6 class="card-title">Unit of Measurement: <?php echo $product->StockUom; ?></h6>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                    </div>

                                    <div class="modal-footer">
                                        <form action="{{route('addToCart')}}" method="post" role="form">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <input type="hidden" name="products_id" value="{{$product->ProductCode}}">
                                            <input type="hidden" name="product_name" value="{{$product->Description}}">
                                            <input type="hidden" name="product_code" value="NA">
                                            <input type="hidden" name="product_color" value="NA">
                                            <input type="hidden" name="size" value="0">
                                            {{-- <input type="hidden" name="price" value="{{$product->price}}" id="dynamicPriceInput"> --}}
                                            <?php
                                            foreach ($product->Pricing as $key => $value) {
                                                ?>
                                                <input type="hidden" name="baseCurrency" value="{{$value->Currency}}" id="baseCurrency">
                                                <?php
                                            } ?>
                                            <input type="hidden" name="itemDesc" value="{{$product->Description}}">
                                            <input type="hidden" name="itemCode" value="{{$product->ProductCode}}">
                                            <input type="hidden" name="itemUnits" value="{{ $product->StockUom }}">
                                            <input type="hidden" name="ProductClass" value="{{ $product->ProductClass }}">
                                             {{-- <input type="hidden" name="Qty" value="" id="Qty"> --}}
                                            <?php
                                            foreach ($product->Pricing as $key => $value) {
                                                ?>
                                                <input type="hidden" name="listPrice" value="{{$value->SellingPrice}}">
                                                <input type="hidden" name="price" value="{{$value->SellingPrice}}" id="dynamicPriceInput">
                                                <input type="hidden" name="currency" value="{{$value->Currency}}" id="dynamicCurrencyInput">
                                                <?php


                                            } ?>
                                            <label for=""></label>
                                            <input type="number"
                                            class="form-control w-25 mr-aut" name="quantity" id="quantity" aria-describedby="helpId" placeholder="Quantity" min="1">


                                            <button type="submit" class="btn btn-primary btn-mini add-cart-btn mr-auto">Add to Cart <i class="fa fa-shopping-cart icon-cl"></i></button>




                                        </form>
                                        <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>

                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                        @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>












@endsection
@section('jsblock')

<script src="https://code.jquery.com/jquery-1.12.4.min.js" ></script>

{{-- <script src="{{ asset('public/js/jquery.min.js') }}"></script> --}}
<script src="{{ asset('public/js/jquery.ui.custom.js')}}"></script>
<script src="{{ asset('public/js/bootstrap.min.js')}}"></script>
{{-- <script src="{{ asset('public/js/jquery.uniform.js')}}"></script> --}}
{{-- <script src="{{ asset('public/js/matrix.js')}}"></script> --}}
<script src="{{ asset('public/js/wysihtml5-0.3.0.js')}}"></script>
<script src="{{ asset('public/js/jquery.peity.min.js')}}"></script>
<script src="{{ asset('public/js/bootstrap-wysihtml5.js')}}"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>


<script>
    // document.getElementById("quantity").oninput = () => {
    // const quantity = document.getElementById('quantity');
    // const qty = document.getElementById('Qty');

    // // Trying to insert val into qty.
    // qty.value = quantity.value;
    // };
    $('.textarea_editor').wysihtml5();
    $('#d').select2();

            // datatable
    // jQuery(document).ready(function($) {
        $('#data-table').DataTable({
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
		"sDom": '<""l>t<"F"fp>'
	    });


    // });




</script>




@endsection
