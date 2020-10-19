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
<link rel="stylesheet" href="{{asset('public/css/custom.css')}}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

@endsection

@section('content')
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
            <a href="index.html"> <i class="icon-dashboard"></i>  Statement Review </a>
        </div>
    </div>
    <!--End-breadcrumbs-->


    <table class="table">
        <div class="text-center"> My Statement</div>



        <thead>
            <tr>
                <th>Date</th>
                <th>Code</th>
                <th>Description</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @if ($statement_data)

            @foreach ($statement_data as $item)

            <tr>
                <td scope="row"><div class="text-center">{{ $item->created_at }}</div></td>
                <td><div class="text-center"> null </div></td>
                <td> <div class="text-center">uull </div></td>
            </tr>

            @endforeach

            @endif



        </tbody>
    </table>







@endsection
{{-- <script src="https://code.jquery.com/jquery-1.12.4.min.js" ></script> --}}
@section('jsblock')

<script src="https://code.jquery.com/jquery-1.12.4.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

<script>
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
