
@extends('back-end.Client.layouts.master')
@section('cssblock')

    {{-- <link rel="stylesheet" href="css/bootstrap.min.css" /> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="public/css/colorpicker.css" />
    <link rel="stylesheet" href="public/css/datepicker.css" />
    <link rel="stylesheet" href="public/css/custom-staffprescrip.css" />
    <link rel="stylesheet" href="public/css/uniform.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="public/css/matrix-style.css" />
    <link rel="stylesheet" href="public/css/matrix-media.css" />
    <link rel="stylesheet" href="public/css/bootstrap-wysihtml5.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

@endsection
@section('content')
<div class="widget-content" >
    <div class="row-fluid">
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


                                <div class="form-group {{$errors->has('soldToAddr1')?'has-error':''}}">
                                    <input type="text" class="form-control" name="soldToAddr1" value="{{$addr_data->soldToAddr1}}" id="soldToAddr1" placeholder="Sold To Address1">
                                    <span class="text-danger">{{$errors->first('soldToAddr1')}}</span>
                                </div>
                                <div class="form-group {{$errors->has('soldToAddr2')?'has-error':''}}">
                                    <input type="text" class="form-control" name="soldToAddr2" value="{{$addr_data->soldToAddr2}}" id="soldToAddr2" placeholder="Sold To Address2">
                                    <span class="text-danger">{{$errors->first('soldToAddr2')}}</span>
                                </div>
                                <div class="form-group {{$errors->has('soldToAddr3')?'has-error':''}}">
                                    <input type="text" class="form-control" name="soldToAddr3" value="{{$addr_data->soldToAddr3}}" id="soldToAddr3" placeholder="Sold To Address3">
                                    <span class="text-danger">{{$errors->first('soldToAddr3')}}</span>
                                </div>
                                <div class="form-group {{$errors->has('ShipToAddr1')?'has-error':''}}">
                                    <input type="text" class="form-control" name="ShipToAddr1" value="{{$addr_data->ShipToAddr1}}" id="ShipToAddr1" placeholder="Ship To Address1">
                                    <span class="text-danger">{{$errors->first('ShipToAddr1')}}</span>
                                </div>
                                <div class="form-group {{$errors->has('ShipToAddr2')?'has-error':''}}">
                                    <input type="text" class="form-control" name="ShipToAddr2" value="{{$addr_data->ShipToAddr2}}" id="ShipToAddr2" placeholder="Ship To Address2">
                                    <span class="text-danger">{{$errors->first('ShipToAddr2')}}</span>
                                </div>
                                <div class="form-group {{$errors->has('ShipToAddr3')?'has-error':''}}">
                                    <input type="text" class="form-control" name="ShipToAddr3" value="{{$addr_data->ShipToAddr3}}" id="ShipToAddr3" placeholder="Ship To Address3">
                                    <span class="text-danger">{{$errors->first('ShipToAddr3')}}</span>
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
    </div>
</div>

    <div style="margin-bottom: 20px;"></div>
@endsection

@section('jsblock')

<script src="https://code.jquery.com/jquery-1.12.4.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
{{-- <script src="js/jquery.min.js"></script> --}}
<script src="public/js/jquery.ui.custom.js"></script>
<script src="public/js/bootstrap.min.js"></script>
<script src="public/js/bootstrap-colorpicker.js"></script>
<script src="public/js/bootstrap-datepicker.js"></script>
<script src="public/js/jquery.toggle.buttons.js"></script>
<script src="public/js/masked.js"></script>
<script src="public/js/jquery.uniform.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
{{-- <script src="{{asset('js/jquery.dataTables.min.js')}}"></script> --}}
{{-- <script src="js/select2.min.js"></script> --}}
<script src="public/js/matrix.js"></script>
<script src="public/js/matrix.form_common.js"></script>
<script src="public/js/wysihtml5-0.3.0.js"></script>
<script src="public/js/jquery.peity.min.js"></script>
<script src="public/js/bootstrap-wysihtml5.js"></script>
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




</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>




@endsection
