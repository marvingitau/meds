@extends('front-end.layouts.master')
@section('title','checkOut Page')
{{-- @section('slider')
@endsection --}}
@section('content')
    <div class="biilig-cont-div">
        <div class="container">
            @if(Session::has('message'))
                <div class="alert alert-success text-center" role="alert">
                    {{Session::get('message')}}
                </div>
            @endif
            <div class="row">
                <div class="col-md-7">
                    <form action="{{url('/submit-checkout')}}" method="post" class="form-horizontal">
                        <div class="col-sm- col-sm-offset-1">


                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <legend class="ttl-bl">Billing To</legend>
                                <div class="form-group {{$errors->has('billing_name_of_institution')?'has-error':''}}">
                                    <input type="text" class="form-control" name="billing_name_of_institution" id="billing_name_of_institution" value="{{$user_login->name_of_institution}}" placeholder="Billing Name">
                                    <span class="text-danger">{{$errors->first('billing_name_of_institution')}}</span>
                                </div>
                                <div class="form-group {{$errors->has('billing_name')?'has-error':''}}">
                                    <input type="text" class="form-control" name="billing_name" value="{{$user_login->name}}" id="billing_name" placeholder=" Billing Name">
                                    <span class="text-danger">{{$errors->first('billing_name')}}</span>
                                </div>

                                <div class="form-group {{$errors->has('billing_mobile')?'has-error':''}}">
                                    <input type="text" class="form-control" name="billing_mobile" value="{{$user_login->phone_no}}" id="billing_mobile" placeholder="Billing Mobile">
                                    <span class="text-danger">{{$errors->first('billing_mobile')}}</span>
                                </div>

                                <div class="form-group {{$errors->has('billing_email')?'has-error':''}}">
                                    <input type="text" class="form-control" value="{{$user_login->email}}" name="billing_email" id="billing_email" placeholder="Billing Email">
                                    <span class="text-danger">{{$errors->first('billing_email')}}</span>
                                </div>

                                <div class="form-group {{$errors->has('billing_address')?'has-error':''}}">
                                    <input type="text" class="form-control" value="{{$user_login->postal_address}}" name="billing_address" id="billing_address" placeholder="Billing Addres">
                                    <span class="text-danger">{{$errors->first('billing_address')}}</span>
                                </div>

                                <div class="form-group {{$errors->has('billing_buildingname')?'has-error':''}}">
                                    <input type="text" class="form-control" name="billing_buildingname" value="{{$user_login->buildingname}}" id="billing_buildingname" placeholder=" Billing Building Name">
                                    <span class="text-danger">{{$errors->first('billing_buildingname')}}</span>
                                </div>

                                <div class="form-group {{$errors->has('billing_town')?'has-error':''}}">
                                    <input type="text" class="form-control" name="billing_town" value="{{$user_login->town}}" id="billing_town" placeholder="Billing Town/City">
                                    <span class="text-danger">{{$errors->first('billing_town')}}</span>
                                </div>

                                <div class="form-group">
                                    <select name="billing_country" id="billing_country" class="form-control">
                                        @foreach($countries as $country)
                                            <option value="{{$country->country_name}}" {{$user_login->country==$country->country_name?' selected':''}}>{{$country->country_name}}</option>
                                        @endforeach
                                    </select>
                                </div>





                                <button type="submit" class="btn btn-primary" style="float: right;">CheckOut</button>

                        </div>
                    </form>
                </div>
                <div class="col-md-5">
                    <img src="<?php echo wp_get_attachment_image_url('140','full'); ?>" class="w-100 h-100" alt="placeholder">
                </div>

            </div>
        </div>
    </div>

    <div style="margin-bottom: 20px;"></div>
@endsection
