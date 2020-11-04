
@extends('back-end.Staff.layouts.master')
@section('cssblock')

    {{-- <link rel="stylesheet" href="css/bootstrap.min.css" /> --}}
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
    <div class="biilig-cont-div">
        <div class="container">
            @if(Session::has('message'))
                <div class="alert alert-success text-center" role="alert">
                    {{Session::get('message')}}
                </div>
            @endif
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

            <div class="row">
                <div class="col-md-7">
                    <form action="{{route('checkout.submit')}}" method="post" class="form-horizontal">
                        <div class="col-sm- col-sm-offset-1">


                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <legend class="ttl-bl">Billing To</legend>
                                {{-- <div class="form-group {{$errors->has('billing_name_of_institution')?'has-error':''}}">
                                    <input type="text" class="form-control" name="billing_name_of_institution" id="billing_name_of_institution" value="{{$user_login->name_of_institution}}" placeholder="Billing Name">
                                    <span class="text-danger">{{$errors->first('billing_name_of_institution')}}</span>
                                </div> --}}
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

                                {{-- <div class="form-group {{$errors->has('billing_address')?'has-error':''}}">
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
                                </div> --}}

                                {{-- <div class="form-group">
                                    <select name="billing_country" id="billing_country" class="form-control">
                                        @foreach($countries as $country)
                                            <option value="{{$country->country_name}}" {{$user_login->country==$country->country_name?' selected':''}}>{{$country->country_name}}</option>
                                        @endforeach
                                    </select>
                                </div> --}}





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




</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>




@endsection
