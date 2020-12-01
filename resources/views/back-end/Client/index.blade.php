@extends('back-end.Client.layouts.master')

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
<link rel="stylesheet" href="{{asset('public/css/custom-staffgen.css')}}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


@endsection

@section('content')
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">
        <div class="quick-actions_homepage">
            <ul class="quick-actions">
                <li class="bg_lb"> <a href="#"> <i class="icon-dashboard"></i>  User  Dashboard </a> </li>



            </ul>
        </div>
    </div>

    <table class="table">

        <tbody>
            <tr>
                <td scope="row">

                    <div class="widget-box-400" style="float:left">
                        <div class="widget-title"> <span class="icon"> <i class="icon-signal"></i> </span>
                          <h5>Debt Ageing.</h5>
                        </div>
                        <div class="widget-content " style="width: 400px; height: 400px;">
                            <canvas id="debtAgeing" width="400" height="400"></canvas>
                        </div>
                      </div>

                </td>
                <td>


                  <div class="widget-box-400" style="float:left">
                    <div class="widget-title"> <span class="icon"> <i class="icon-signal"></i> </span>
                      <h5>Credit limit</h5>
                    </div>
                    <div class="widget-content" style="width: 400px; height: 400px;">
                        <canvas id="myChart" width="400" height="400"></canvas>
                    </div>
                </div>
                </td>


            </tr>


        </tbody>
    </table>

    <table class="table">

        <tbody>
            <tr>
                <td>
                    <div class="widget-box-4000" style="">
                        <div class="widget-title"> <span class="icon"> <i class="icon-signal"></i> </span>
                          <h5>Total order </h5>
                        </div>
                        <div class="widget-content">
                            <canvas id="myChartOrderValue"></canvas>
                        </div>
                    </div>
                </td>

            </tr>

        </tbody>
    </table>



    <div class="widget-content" >
        <div class="row-fluid">
    <table class="table">

        <tbody>
            <tr>

                <td>

                    <table class="table">
                        <div class="text-center"> My Statement</div>



                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>PONumber</th>
                                <th>Description</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @if ($statement_data)

                            @foreach ($statement_data as $item)

                            <tr>
                                <td scope="row"><div class="text-center">{{ $item->created_at }}</div></td>
                                <td><div class="text-center">{{ $item->PONumber }}</div></td>
                                <td> <div class="text-center0">{{ $item->product_name }}</div></td>
                                <td> <div class="text-center0">{{ ($item->price * $item->quantity)*(116/100)}}</div></td>
                            </tr>

                            @endforeach

                            @endif



                        </tbody>
                    </table>

                </td>
                <td>

                    <table class="table">
                       <div class="text-center">My Invoice</div>
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Quntity</th>
                                <th>Price</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody >
                            @if ($invoice_data)

                            @foreach ($invoice_data as $item)

                            <tr>
                                <td scope="row"> <div class="text-center">{{ $item->product_name }}</div> </td>
                                <td> <div class="text-center">{{ $item->size }}</div>  </td>
                                <td> <div class="text-center">{{ $item->price }}</div>  </td>
                                <td> <div class="text-center">{{ ($item->price * $item->quantity)*(116/100) }}</div>  </td>
                            </tr>

                            @endforeach

                            @endif

                        </tbody>
                    </table>

                </td>
            </tr>

        </tbody>
    </table>
        </div>
    </div>














@endsection

@section('jsblock')
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>


<script>


jQuery(document).ready(function(){

    var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Credit lim','Credit bal'],
            datasets: [{
                label: 'Credit limit Vs Credit Balance (Ksh)',
                data: [
                <?php echo $creditlimit; ?>,
                <?php echo $CreditBalance; ?>,
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
                label: 'Debt  Ageing',
                data: [
                <?php echo $current; ?>,
                <?php echo $thirty; ?>,
                <?php echo $sixty; ?>,
                <?php echo $ninety; ?>,
                <?php echo $onetwenty; ?>,

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



    var ct = document.getElementById('myChartOrderValue')
    var myChar = new Chart(ct, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb','Mar','May','Apr','Jun', 'Jul','Aug','Sep','Oct','Nov','Dec'],
            datasets: [{
                label: 'Invoice Ageing for Ageing: CCHOG01',
                data: [



                    <?php echo $period1; ?>,
                    <?php echo $period2; ?>,
                    <?php echo $period3; ?>,
                    <?php echo $period4; ?>,
                    <?php echo $period5; ?>,
                    <?php echo $period6; ?>,
                    <?php echo $period7; ?>,
                    <?php echo $period8; ?>,
                    <?php echo $period9; ?>,
                    <?php echo $period10; ?>,
                    <?php echo $period11; ?>,
                    <?php echo $period12; ?>,

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
