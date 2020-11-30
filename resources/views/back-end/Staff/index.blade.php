@extends('back-end.Staff.layouts.master')

@section('cssblock')

{{-- <link rel="stylesheet" href="{{asset('public/css/bootstrap.min.css')}}" /> --}}
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('public/css/bootstrap-responsive.min.css')}}" />
<link rel="stylesheet" href="{{asset('public/css/colorpicker.css')}}" />
<link rel="stylesheet" href="{{ asset('public/css/uniform.css') }}" />
<link rel="stylesheet" href="{{ asset('public/css/select2.css') }}" />
<link rel="stylesheet" href="{{asset('public/css/fullcalendar.css')}}" />
<link rel="stylesheet" href="{{asset('public/css/matrix-style.css')}}" />
<link rel="stylesheet" href="{{asset('public/css/matrix-media.css')}}" />
<link rel="stylesheet" href="{{asset('public/css/bootstrap-wysihtml5.css')}}" />
<link rel="stylesheet" href="{{asset('public/css/custom-staffdb.css')}}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


@endsection

@section('content')
    <!--breadcrumbs-->
    <div id="content-header text-center">
    <div id="breadcrumb"> <a href="{{ route('staff.home')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Staff</a></div>
    </div>
    <!--End-breadcrumbs-->



    <div class="widget-content" >
        <div class="row-fluid">
            <h4 class="text-center">Order Progress</h4>



        @if($currentStaffOrders)
            @foreach ($currentStaffOrders as $currentStaffOrder)
            <div class="progressnar-container">
            <h4 class="order-no">Order: {{ $currentStaffOrder->id }}</h4>
                <ul class="progressbar">
                    <li class="<?php echo $currentStaffOrder->progress_status_whmgr == 5?'active':''; ?>">
                        <a href="{{ route('viewOrderInWhMgr') }}" style="color:unset; text-decoration:none;" title="Orders in Warehouse Manager" class="tip-bottom">
                         Order in Warehouse Manager <br>
                         <i class="fa fa-building icon"></i>
                        </a>

                    </li>
                    <li class="<?php echo ($currentStaffOrder->progress_status_hr == 2 || ($currentStaffOrder->order_type == 0 && $currentStaffOrder->progress_status_whmgr == 5) )?'active':''; ?>">
                        <a href="{{ route('viewOrderInHR') }}" style="color:unset; text-decoration:none;" title="Orders in HR" class="tip-bottom">
                         Orders in Human Resource <br>
                         <i class="fa fa-users icon"></i>
                        </a>
                    </li>
                    <li  class="<?php echo $currentStaffOrder->progress_status_ac == 4?'active':''; ?>">
                        <a href="{{ route('viewOrderInAc') }}" style="color:unset; text-decoration:none;" title="Orders in Accounts" class="tip-bottom">
                          Orders in Accounts <br>
                          <i class="fa fa-table icon"></i>
                        </a>
                    </li>
                    <li  class="<?php echo ($currentStaffOrder->progress_status_ac == 4 )?'active':''; ?>">
                        <a href="{{ route('viewOrderInDispatch') }}" style="color:unset; text-decoration:none;" title="Dispatched Orders" class="tip-bottom">
                           Orders in Dispatch<br>
                           <i class="fa fa-truck icon"></i>


                        </a>

                    </li>
                </ul>
            </div>
            @endforeach
        @endif


        <div class="d-flex justify-content-center c_pagination">
            {!! $currentStaffOrders->links() !!}
        </div>
        </div>
    </div>












@endsection
{{-- <script src="https://code.jquery.com/jquery-1.12.4.min.js" ></script> --}}
@section('jsblock')

<script src="https://code.jquery.com/jquery-1.12.4.min.js" ></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script> --}}

<script>


jQuery(document).ready(function(){




});


</script>

@endsection
