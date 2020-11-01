<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> --}}


    <style>
        /* .container, .container-fluid, .container-lg, .container-md, .container-sm, .container-xl {
	width: 100%;
	padding-right: 15px;
	padding-left: 15px;
	margin-right: auto;
	margin-left: auto;
}

.table-bordered {
	border: 1px solid #dee2e6;
}
.table {
	width: 100%;
	margin-bottom: 1rem;
	color: #212529;
}
table {
	border-collapse: collapse;
}

.table-bordered thead td, .table-bordered thead th {
	border-bottom-width: 2px;
}
.table-bordered td, .table-bordered th {
	border: 1px solid #dee2e6;
}
.table td, .table th {
	padding: .75rem;
	vertical-align: top;
	border-top: 1px solid #dee2e6;
} */

table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
.text-center {
	text-align: center !important;
}

    </style>
</head>
<body>

    <div class="container-fluid">
        <div class="widget-content" >
            <div class="row-fluid">
                {{-- <div class="text-center"> <img src="{{asset('public/img/logo.png')}}" style="height: 100px;
                    width: 100px;" alt="Logo" /></div> --}}
                <h4 class="text-center">{{ auth()->user()->name }} Invoice</h4>
            <table class="table table-bordered">

             <thead>
                 <tr>
                     <td><div class="">Number</div></td>
                     <th><div class="">ID</div></th>
                     <th><div class="">Item</div></th>
                     <th><div class="">Quantity</div></th>
                     <th><div class="">Price</th>
                     <th><div class="">Amount</div></div></th>
                 </tr>
                </thead>
                <tbody >
                 @if ($invoice_data)
                 <?php $i=0; ?>
                 @foreach ($invoice_data as $item)

                 <tr>
                     <td scope="row"> <div class=""><?php echo $i++; ?></div> </td>
                     <td > <div class="">{{ $item->products_id }}</div> </td>
                     <td > <div class="">{{ $item->product_name }}</div> </td>
                     <td> <div class="">{{ $item->quantity }}</div>  </td>
                     <td> <div class="">{{ $item->price }}</div>  </td>
                     <td> <div class="">{{ $item->price*$item->quantity }}</div>  </td>
                 </tr>

                 @endforeach

                 @endif

             </tbody>
            </table>
            </div>
        </div>
    </div>



</body>

</html>
















