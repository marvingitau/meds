@extends('back-end.Client.layouts.master')

@section('cssblock')

{{-- <link rel="stylesheet" href="{{asset('public/css/bootstrap.min.css')}}" />--}}
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
        <div id="breadcrumb">
            <a href="{{ url('/')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
            <a href="" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
            <a href=""> <i class="icon-dashboard"></i>  Order Review </a>
        </div>
    </div>
    <!--End-breadcrumbs-->


    <div class="widget-content" >
        <div class="row-fluid">
    <div class="contaner ">
        <div class="nav flex-column nav-pills w-50 float-left ord_review_menu order-view-parent" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            @if ( $allOrders)
            <?php $jounter=-1; ?>
                @foreach ($allOrders as $order)
                <?php $jounter++; ?>
            <a class="nav-link <?php echo $jounter===0 ? 'active':''; ?>  ord_review_menu" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home-<?php echo $jounter; ?>" role="tab" aria-controls="v-pills-home" aria-selected="true">
                <table class="table">

                    <tbody>


                            <tr>
                                <td scope="row"> <b>ID:</b> {{  $order->id}} </td>
                                <td><b>Price:</b> {{  $order->grand_total}}  </td>
                            <td  class="<?php echo $order->order_verify ==1 ?'bg-success text-center':'bg-warning text-center'; ?>"><b>Status:</b>
                                <?php
                                if($order->order_verify == 1) {
                                    if($order->order_type == 99){
                                        echo 'Processed';

                                    }else{
                                        echo 'Approved';
                                    }

                                }else{
                                    echo 'Pending...';
                                }
                                 ?></td>
                            </tr>


                    </tbody>
                </table>
            </a>

            @endforeach
            @endif


          </div>

          <div class="tab-content w-50 float-left pl-2" id="v-pills-tabContent">

            @if ( $allOrders)
            <?php $counter=-1; ?>

                            @foreach ($allOrders as $item)
                            <?php $counter++; ?>
                            <div class="tab-pane fade <?php echo $counter===0 ? 'show active':''; ?>  ord_review_content" id="v-pills-home-<?php echo $counter; ?>" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <table class="table">
                                <thead>
        <button  rel="{{$item->id}}" rel1="client_order_delete" class="btn btn-danger float-right m-1 deleteThisOrder" role="button">X</button>
        <tr> <b>Order ID: {{ $allOrders[$counter]->id }}</b>   </tr>
                                    <tr>
                                        <td>Item ID</td>
                                        <td>Name</td>
                                        <td>Price</td>
                                        <td>Quantity</td>
                                        <td>Amount</td>
                                    </tr>
                                </thead>
                                <tbody>
                                @if ($item->items)


                                      @foreach ($item->items as $itm)
                                      <tr>

                                      <td> {{ $itm->id }}</td>
                                      <td> {{ $itm->product_name }}</td>
                                      <td> {{ $itm->price }} </td>
                                      <td> {{ $itm->quantity }} </td>

                                      <td>{{ $itm->price* $itm->quantity }} </td>
                                  </tr>
                                      @endforeach

                                @endif


                              </tbody>
                                </table>
                            </div>


                            @endforeach
            @endif

          </div>
    </div>
        </div>
    </div>










@endsection
{{-- <script src="https://code.jquery.com/jquery-1.12.4.min.js" ></script> --}}
@section('jsblock')

<script src="https://code.jquery.com/jquery-1.12.4.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

<script>

$(".deleteThisOrder").click(function () {
        var id=$(this).attr('rel');
        var deleteFunction=$(this).attr('rel1');
        swal({
            title:'Are you sure?',
            text:"You won't be able to revert this!",
            type:'warning',
            showCancelButton:true,
            confirmButtonColor:'#3085d6',
            cancelButtonColor:'#d33',
            confirmButtonText:'Yes, delete it!',
            cancelButtonText:'No, cancel!',
            confirmButtonClass:'btn btn-success',
            cancelButtonClass:'btn btn-danger',
            buttonsStyling:false,
            reverseButtons:true
        },function () {
            window.location.href="/"+deleteFunction+"/"+id;
        });
    });

        jQuery(document).ready(function(){

            $.ajax({
                url: '/admin/reports/getChart',
                type: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                success: function (data) {

                // console.log(data);
                    var data = [];
                    var labels = [];



                    for (var i in data) {
                        data.push(data[i].orders_by_user);
                        labels.push(data[i].name);

                    }

                    renderChart(data, labels);
                },
                error: function (data) {

                    console.log(data);
                }
            });

         })
        function renderChartOne(params) {

            var ctx = document.getElementById('myChart');
            var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
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
        }



</script>

@endsection
