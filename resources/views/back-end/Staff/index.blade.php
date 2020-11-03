@extends('back-end.Staff.layouts.master')

@section('cssblock')

<link rel="stylesheet" href="{{asset('public/css/bootstrap.min.css')}}" />
{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> --}}
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

        {{-- <div class="hex-grid__list">

                    <div class="hex-grid__item item1">
                        <a href="{{ route('viewOrderInWhMgr') }}" style="color:unset; text-decoration:none;">
                        <h4 class="text-center">Orders in Warehouse Manager</h4>

                        <span class="text-center staff-cust-label"><h6>{{ $whmgrCount }}</h6> </span>
                    </a>
                    </div>




                <div class="hex-grid__item item2">


                </div>
                <div class="hex-grid__item item3">

                    <a href="{{ route('viewOrderInHR') }}" style="color:unset; text-decoration:none;">
                    <h4 class="text-center">Orders in Human Resource</h4>

                    <span class="text-center staff-cust-label"><h6>{{ $hrCount }}</h6> </span>
                </a>
                </div>
                <div class="hex-grid__item item4">


                </div>

                <div class="hex-grid__item item5">
                    <a href="{{ route('viewOrderInAc') }}" style="color:unset; text-decoration:none;">
                    <h4 class="text-center">Orders in Accounts</h4>
                    <span class="text-center staff-cust-label"><h6>{{ $acCount }}</h6> </span>
                    </a>
                </div>
                <div class="hex-grid__item item6">


                </div>
                <div class="hex-grid__item item7">
                    <a href="{{ route('viewOrderInDispatch') }}" style="color:unset; text-decoration:none;">
                    <h4 class="text-center">Orders in Dispatch</h4>
                    <span class="text-center staff-cust-label"><h6>{{ $dispatchedCount }}</h6> </span>
                    </a>


                </div>
                <div class="hex-grid__item item8">

                    8
                </div>

                  <div class="hex-grid__item item9">

                    <h4 class="text-center">Thank You.</h4>
                </div>


        </div> --}}

        <div class="progressnar-container">
            <h4 class="order-no">Order: 23</h4>
            <ul class="progressbar">
                <li class="active">
                    <a href="{{ route('viewOrderInWhMgr') }}" style="color:unset; text-decoration:none;">
                     Order in Warehouse Manager <br>
                     <i class="fa fa-building icon"></i>
                    </a>

                </li>
                <li class="active">
                    <a href="{{ route('viewOrderInHR') }}" style="color:unset; text-decoration:none;">
                     Orders in Human Resource <br>
                     <i class="fa fa-users icon"></i>
                    </a>
                </li>
                <li>
                    <a href="{{ route('viewOrderInAc') }}" style="color:unset; text-decoration:none;">
                      Orders in Accounts <br>
                      <i class="fa fa-table icon"></i>

                </li>
                <li>
                    <a href="{{ route('viewOrderInDispatch') }}" style="color:unset; text-decoration:none;">
                       Orders in Dispatch<br>
                       <i class="fa fa-truck icon"></i>


                    </a>

                </li>
            </ul>
        </div>



        </div>
    </div>












@endsection
{{-- <script src="https://code.jquery.com/jquery-1.12.4.min.js" ></script> --}}
@section('jsblock')

<script src="https://code.jquery.com/jquery-1.12.4.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

<script>


jQuery(document).ready(function(){

    var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Credit', 'Debit'],
        datasets: [{
            label: 'Credit limit & Debt level (Ksh)',
            data: [
            <?php echo $credit; ?>,
            <?php echo $debit; ?>
            ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)'
                // 'rgba(255, 206, 86, 0.2)',
                // 'rgba(75, 192, 192, 0.2)',
                // 'rgba(153, 102, 255, 0.2)',
                // 'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)'
                // 'rgba(255, 206, 86, 1)',
                // 'rgba(75, 192, 192, 1)',
                // 'rgba(153, 102, 255, 1)',
                // 'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
    });


    var ct = document.getElementById('debtAgeing');
    var myChar = new Chart(ct, {
    type: 'bar',
    data: {
        labels: ['current', '30 days','60 days','90 days','120 days'],
        datasets: [{
            label: 'Invoice Ageing for Ageing: CCHOG01',
            data: [
            <?php echo $current; ?>,
            <?php echo $thirty; ?>,
            <?php echo $sixty; ?>,
            <?php echo $ninety; ?>,
            <?php echo $onetwenty; ?>

            ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)'
                // 'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)'
                // 'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
    });

    var ct = document.getElementById('myChartOrderValue');
    var myChar = new Chart(ct, {
    type: 'bar',
    data: {
        labels: ['Jan', 'Feb','Mar','May','Apr','Jun', 'Jul','Aug','Sep','Oct','Nov','Dec'],
        datasets: [{
            label: 'Invoice Ageing for Ageing: CCHOG01',
            data: [

            223,232,590,700,800,754,235,865,345,876,234,623

            ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
    });



});


</script>

@endsection
