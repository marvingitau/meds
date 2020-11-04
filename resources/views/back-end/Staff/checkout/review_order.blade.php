
@extends('back-end.Staff.layouts.master')
@section('cssblock')

    {{-- <link rel="stylesheet" href="public/css/bootstrap.min.css" /> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('public/css/bootstrap-responsive.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('public/css/colorpicker.css')}}" />
    <link rel="stylesheet" href="{{ asset('public/css/datepicker.css')}}" />
    <link rel="stylesheet" href="{{ asset('public/css/custom-staffprescrip.css')}}" />
    <link rel="stylesheet" href="{{ asset('public/css/uniform.css')}}" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('public/css/matrix-style.css')}}" />
    <link rel="stylesheet" href="{{ asset('public/css/matrix-media.css')}}" />
    <link rel="stylesheet" href="{{ asset('public/css/bootstrap-wysihtml5.css')}}" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

@endsection

@section('content')
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb">
            <a href="{{route('staff.home')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
            <a href="{{route('order.review') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Preview Order & Payment</a>
        </div>

    </div>
    <!--End-breadcrumbs-->
    <div class="container">
        <div class="step-one">
            {{-- <h4 class="heading my-3 text-info text-center text-capitalize">billing To</h4> --}}
        </div>
        <div class="row">
            <div class="col-sm-12">
            <form action="{{route('order.submit')}}" method="post" class="form-horizontal">
                <input type="hidden" name="_token" value="{{csrf_token()}}">

                <input type="hidden" name="users_id" value="{{$billing_address->users_id}}">
                <input type="hidden" name="users_email" value="{{$billing_address->users_email}}">
                <input type="hidden" name="name" value="{{$billing_address->name}}">
                {{-- <input type="hidden" name="email" value="{{$billing_address->email}}"> --}}
                <input type="hidden" name="postal_address" value="{{$billing_address->postal_address}}">
                <input type="hidden" name="city" value="{{$billing_address->city}}">
                <input type="hidden" name="buildingname" value="{{$billing_address->buildingname}}">
                <input type="hidden" name="country" value="{{$billing_address->country}}">
                <input type="hidden" name="phone_no" value="{{$billing_address->phone_no}}">
                <input type="hidden" name="shipping_charges" value="0">
                <input type="hidden" name="order_status" value="success">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                  <strong>Whoops!</strong> There were some problems with your input.<br><br>
                  <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
                @endif

                @if($require_supporting_docs == 1)
                <div class="form-group my-3 ml-5">
                  <label for="" class="ml-1 font-weight-bold" style="">Suppoting Document(required)</label>
                  <input type="file"
                    class="form-control w-50 rounded-0" name="supporting_documents" id="" aria-describedby="helpId" placeholder="" required>
                </div>
                @endif



                @foreach($cart_datas as $cartdata)
                    <input type="hidden" name="ordertype[]" value="{{ $cartdata->item_from }}">
                @endforeach

                @if(Session::has('discount_amount_price'))
                    <input type="hidden" name="coupon_code" value="{{Session::get('coupon_code')}}">
                    <input type="hidden" name="coupon_amount" value="{{Session::get('discount_amount_price')}}">
                    <input type="hidden" name="grand_total" value="{{$total_price-Session::get('discount_amount_price')}}">
                @else
                    <input type="hidden" name="coupon_code" value="NO Coupon">
                    <input type="hidden" name="coupon_amount" value="0">
                    <input type="hidden" name="grand_total" value="{{$total_price}}">
                @endif



    <div class="widget-content" >
        <div class="row-fluid">
                    <section id="cart_items">
                        <div class="review-payment my-3 text-info text-center text-capitalize">
                            <h4>Review & Payment</h4>
                        </div>
                        <div class="table-responsive cart_info">
                            <table class="table table-bordered table-condensed">
                                <thead style="background-color: #017fff;">
                                <tr class="cart_menu">
                                    <td class="no">No</td>
                                    <td class="description">Name</td>
                                    <td class="price">Price</td>
                                    <td class="quantity">Quantity</td>
                                    <td class="total">Total</td>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1;?>
                                @foreach($cart_datas as $cart_data)


                                    <tr>
                                    <td class="cart_id">
                                        <?php echo $i++; ?>
                                    </td>
                                    <td class="cart_description">
                                        <h4><a href="">{{$cart_data->product_name}}</a></h4>

                                    </td>
                                    <td class="cart_price">
                                        <p>Ksh {{$cart_data->price}}</p>
                                    </td>
                                    <td class="cart_quantity">

                                        <p>{{$cart_data->quantity}}</p>
                                    </td>
                                    <td class="cart_total">

                                        <p class="cart_total_price">Ksh {{$cart_data->price*$cart_data->quantity}}</p>
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4">&nbsp;</td>
                                    <td colspan="2">
                                        <table class="table table-condensed total-result">

                                            @if(Session::has('discount_amount_price'))
                                                <tr class="billing-cost">
                                                    <td>Coupon Discount</td>
                                                    <td>$ {{Session::get('discount_amount_price')}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Total</td>
                                                    <td><span>$ {{$total_price-Session::get('discount_amount_price')}}</span></td>
                                                </tr>
                                            @else
                                            <tr class="billing-cost">
                                                <td>VAT</td>
                                                <td>16% </td>
                                            </tr>
                                                <tr>
                                                    <td> <b>Total</b> </td>
                                                    <td><span>Ksh <b> {{$total_price}}</b></span></td>
                                                </tr>
                                            @endif
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="payment-options">
                            <span>Select Payment Method : </span>
                        <span>
                            <label><input type="radio" name="payment_method" value="COD" checked> Cash On Delivery</label>
                        </span>
                        <span>
                            <label><input type="radio" name="payment_method" value="Paypal"> Paypal</label>
                        </span>

                        {{-- <span>
                            <label><input type="radio" name="payment_method" value="Paypal"> VISA</label>
                        </span> --}}
                            <button type="submit" class="btn btn-primary mr-5" style="float: right;">Order Now</button>
                        </div>
                    </section>

        </div>
    </div>

            </form>
            </div>
        </div>
    </div>
    <div style="margin-bottom: 20px;"></div>
@endsection

@section('jsblock')

<script src="https://code.jquery.com/jquery-1.12.4.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
{{-- <script src="js/jquery.min.js"></script> --}}
<script src="{{ asset('public/js/jquery.ui.custom.js')}}"></script>
<script src="{{ asset('public/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('public/js/bootstrap-colorpicker.js')}}"></script>
<script src="{{ asset('public/js/bootstrap-datepicker.js')}}"></script>
<script src="{{ asset('public/js/jquery.toggle.buttons.js')}}"></script>
<script src="{{ asset('public/js/masked.js')}}"></script>
<script src="{{ asset('public/js/jquery.uniform.js')}}"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
{{-- <script src="{{asset('js/jquery.dataTables.min.js')}}"></script> --}}
{{-- <script src="js/select2.min.js"></script> --}}
<script src="{{ asset('public/js/matrix.js')}}"></script>
<script src="{{ asset('public/js/matrix.form_common.js')}}"></script>
<script src="{{ asset('public/js/wysihtml5-0.3.0.js')}}"></script>
<script src="{{ asset('public/js/jquery.peity.min.js')}}"></script>
<script src="{{ asset('public/js/bootstrap-wysihtml5.js')}}"></script>
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
