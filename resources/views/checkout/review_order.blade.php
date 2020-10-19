@extends('front-end.layouts.master')

@section('content')
    <div class="container">
        <div class="step-one">
            <h2 class="heading">billing To</h2>
        </div>
        <div class="row">
            <form action="{{url('/submit-order')}}" method="post" class="form-horizontal">
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
                @if(Session::has('discount_amount_price'))
                    <input type="hidden" name="coupon_code" value="{{Session::get('coupon_code')}}">
                    <input type="hidden" name="coupon_amount" value="{{Session::get('discount_amount_price')}}">
                    <input type="hidden" name="grand_total" value="{{$total_price-Session::get('discount_amount_price')}}">
                @else
                    <input type="hidden" name="coupon_code" value="NO Coupon">
                    <input type="hidden" name="coupon_amount" value="0">
                    <input type="hidden" name="grand_total" value="{{$total_price}}">
                @endif

                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Address</th>
                                <th>Building Name</th>
                                <th>City/Town</th>
                                <th>Country</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{$billing_address->name}}</td>
                                <td>{{$billing_address->email}}</td>
                                <td>{{$billing_address->phone_no}}</td>
                                <td>{{$billing_address->postal_address}}</td>
                                <td>{{$billing_address->buildingname}}</td>
                                <td>{{$billing_address->city}}</td>
                                <td>{{$billing_address->country}}</td>

                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <section id="cart_items">
                        <div class="review-payment">
                            <h2>Review & Payment</h2>
                        </div>
                        <div class="table-responsive cart_info">
                            <table class="table table-condensed">
                                <thead>
                                <tr class="cart_menu">
                                    <td class="image">Item</td>
                                    <td class="description"></td>
                                    <td class="price">Price</td>
                                    <td class="quantity">Quantity</td>
                                    <td class="total">Total</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cart_datas as $cart_data)
                                    <?php
                                    $image_products=DB::table('products')->select('image')->where('id',$cart_data->products_id)->get();
                                    ?>
                                    <tr>
                                    <td class="cart_product">
                                        @foreach($image_products as $image_product)
                                            <a href=""><img src="{{url('products/small',$image_product->image)}}" alt="" style="width: 100px;"></a>
                                        @endforeach
                                    </td>
                                    <td class="cart_description">
                                        <h4><a href="">{{$cart_data->product_name}}</a></h4>
                                        <p>{{$cart_data->product_code}} | {{$cart_data->size}}</p>
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
                                            <tr>
                                                <td>Cart Sub Total</td>
                                                <td>$ {{$total_price}}</td>
                                            </tr>
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
                                                <tr>
                                                    <td>Total</td>
                                                    <td><span>$ {{$total_price}}</span></td>
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
                            <button type="submit" class="btn btn-primary" style="float: right;">Order Now</button>
                        </div>
                    </section>

                </div>
            </form>
        </div>
    </div>
    <div style="margin-bottom: 20px;"></div>
@endsection
