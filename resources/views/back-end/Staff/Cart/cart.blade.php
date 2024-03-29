@extends('back-end.Staff.layouts.master')

@section('cssblock')

    {{-- <link rel="stylesheet" href="css/bootstrap.min.css" /> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('public/css/bootstrap-responsive.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/css/colorpicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/css/datepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/css/custom-staffprescrip.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/css/uniform.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('public/css/matrix-style.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/css/matrix-media.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/css/bootstrap-wysihtml5.css') }}" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <link href="{{ asset('font-awesome/css/font-awesome.css" rel="stylesheet') }}" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

@endsection
@section('content')
    <div id="content-header">
    <div id="breadcrumb"> <a href="{{ route('staff.home')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
            <a href="{{ route('view.cart')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Cart</a>
        </div>
    </div>
    {{-- <div class="widget-content" >
        <div class="row-fluid"> --}}
    <section id="cart_items ">
        <div class="container">
            <div class="" style="">
            @if(Session::has('message'))
                <div class="alert alert-success text-center" role="alert" >
                    {{Session::get('message')}}
                </div>
            @endif
            <div class="table-responsive cart_info">
                <table class="table table-bordered table-condensed custom_carts ">
                    <thead>
                    <tr class="cart_menu">
                        <td class="no">No</td>
                        <td class="description">Name</td>
                        <td>From</td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; ?>
                        @foreach($cart_datas as $cart_data)

                            <tr>
                                <td class="no"><?php echo $i++; ?></td>
                                <td class="cart_description">
                                    <h6><a href="">{{$cart_data->product_name}}</a></h6>

                                </td>
                                <td>
                                    @if ($cart_data->item_from == 1)
                                     General Purchase
                                    @else
                                     Prescription Purchase
                                    @endif
                                </td>
                                <td class="cart_price">
                                    <p>Ksh{{$cart_data->price}}</p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <a class="cart_quantity_up" href="{{route('update',[$cart_data->id,'1'])}}" style="font-size:1rem;"> <i class="fa fa-plus"></i> </a>
                                        <input class="cart_quantity_input" type="text" name="quantity" value="{{$cart_data->quantity}}"  disabled autocomplete="off" size="2">
                                        @if($cart_data->quantity>1)
                                            <a class="cart_quantity_down" href="{{route('update',[$cart_data->id,'-1'])}}" style="font-size:1rem;"> <i class="fa fa-minus"></i> </a>
                                        @endif
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">Ksh {{$cart_data->price*$cart_data->quantity}}</p>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" href="{{route('delete',$cart_data->id)}}"><i class="fa fa-times text-danger"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </section> <!--/#cart_items-->
    <div class="container" class="text-left">
    <section id="do_action">


            <h4 class="text-right">TOTAL</h4>

            <table class="table table-bordered table-condensed custom_carts ">



                    <tr>

                            <tr>
                                <td> <b>Sub-Total</b></td>
                                <td>Ksh <b> {{$total_price}}</b></td>
                            </tr>

                            <tr>
                                <td><b>VAT</b> </td>
                                <td>16%</td>
                            </tr>


                            <tr>
                                <td><b>Total</b></td>
                                <td>Ksh <b>{{$plus_vat}}</b>  </td>
                            </tr>


                    </tr>




            </table>




                <div style="margin-left: 15rem;"><a class="btn btn-default check_out" href="{{route('checkout.view')}}">Check Out</a></div>


    </section><!--/#do_action-->
</div>
        {{-- </div>
    </div> --}}

@endsection



@section('jsblock')

<script src="https://code.jquery.com/jquery-1.12.4.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
{{-- <script src="js/jquery.min.js"></script> --}}
<script src="{{ asset('public/js/jquery.ui.custom.js') }}"></script>
<script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/js/bootstrap-colorpicker.js') }}"></script>
<script src="{{ asset('public/s/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('public/js/jquery.toggle.buttons.js') }}"></script>
<script src="{{ asset('public/js/masked.js') }}"></script>
<script src="{{ asset('public/js/jquery.uniform.js') }}"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
{{-- <script src="{{asset('js/jquery.dataTables.min.js')}}"></script> --}}
{{-- <script src="js/select2.min.js"></script> --}}
<script src="{{ asset('public/js/matrix.js') }}"></script>
<script src="{{ asset('public/js/matrix.form_common.js') }}"></script>
<script src="{{ asset('public/js/wysihtml5-0.3.0.js') }}"></script>
<script src="{{ asset('public/js/jquery.peity.min.js') }}"></script>
<script src="{{ asset('public/js/bootstrap-wysihtml5.js') }}"></script>
<script>
	$('.textarea_editor').wysihtml5();
    $('#d').select2();
            // datatable
    // jQuery(document).ready(function($) {
        $('#data-table').DataTable({
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
		"sDom": '<""l>t<"F"fp>'
	})
    // })

    // $('#data-table').DataTable({
    //         columnDefs: [ {
    //             targets: [ 0 ],
    //             orderData: [ 0, 1 ]
    //         }, {
    //             targets: [ 1 ],
    //             orderData: [ 1, 0 ]
    //         }, {
    //             targets: [ 4 ],
    //             orderData: [ 4, 0 ]
    //         } ]
    //     });



</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>




@endsection
