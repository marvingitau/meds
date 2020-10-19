
@extends('back-end.Client.layouts.master')
@section('cssblock')

    {{-- <link rel="stylesheet" href="css/bootstrap.min.css" /> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="public/css/colorpicker.css" />
    <link rel="stylesheet" href="public/css/datepicker.css" />
    <link rel="stylesheet" href="public/css/custom.css" />
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
<div class="" style="margin-top: 4rem;"></div>
    <div class="container">
        <h3 class="text-center">YOUR ORDER HAS BEEN PLACED</h3>
        <p class="text-center">Thanks for your Order that use Options on Cash On Delivery</p>
        <p class="text-center">We will contact you by Your Email (<b>{{$user_order->users_email}}</b>) or Your Phone Number (<b>{{$user_order->phone_no}}</b>)</p>
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

