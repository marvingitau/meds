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
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">

@endsection

@section('content')
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
            <a href="index.html"> <i class="icon-dashboard"></i>  Invoice Review </a>
        </div>
    </div>
    <!--End-breadcrumbs-->
    <div class="widget-content" >
        <div class="row-fluid">
        <a name="" id="" class="btn btn-primary" href="{{ route('client.invoice.download')}}" role="button">Download CSV</a>
        <a name="" id="" class="btn btn-primary" href="{{ route('client.pdf.invoice.download')}}" role="button">Download PDF</a>
        </div>
    </div>


    <div class="widget-content" >
        <div class="row-fluid">
        <table class="table">
        <div class="text-center">My Invoice</div>
         <thead>
             <tr>
                 <th>ID</th>
                 <th>Item</th>
                 <th>Quantity</th>
                 <th>Price</th>
                 <th>Amount</th>
             </tr>
            </thead>
            <tbody >
             @if ($invoice_data)
             <?php $i=0; ?>
             @foreach ($invoice_data as $item)

             <tr>
                 <td scope="row"> <div class="text-center"><?php echo $i++; ?></div> </td>
                 <td > <div class="text-center0">{{ $item->product_name }}</div> </td>
                 <td> <div class="text-center">{{ $item->quantity }}</div>  </td>
                 <td> <div class="text-center">{{ $item->price }}</div>  </td>
                 <td> <div class="text-center">{{ ($item->price*$item->quantity)*(116/100) }}</div>  </td>
             </tr>

             @endforeach

             @endif

         </tbody>
        </table>
        </div>
    </div>







     @endsection
{{-- <script src="https://code.jquery.com/jquery-1.12.4.min.js" ></script> --}}
@section('jsblock')

<script src="https://code.jquery.com/jquery-1.12.4.min.js" ></script>
{{-- <script src="{{asset('public/js/jquery.dataTables.min.js')}}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>

<script>

        $('.table').DataTable({
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
		"sDom": '<""l>t<"F"fp>'
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

                    // console.log(data);
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
