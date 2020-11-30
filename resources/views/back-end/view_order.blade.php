
@extends('back-end.layouts.master')
@section('title','Admin')
@section('content')
    <!--breadcrumbs-->
    <div id="content-header">
    <div id="breadcrumb"> <a href="{{ route('admin_home') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{ route('pending_order') }}" title="Go to Pending Orders" >Pending Orders</a>
            <a href="#" title="Here">View Order</a> </div>
    </div>
    <!--End-breadcrumbs-->

    @if(Session::has('message'))
    <?php
    $xml=simplexml_load_string(Session::get('message')) or die("Error: Cannot create object");
    // print_r($xml);
    ?>

    <div class="alert alert-success text-center0" role="alert">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-7">
                <ul>
                    <li>
                        SalesOrder:
                        <?php

                        echo ($xml->Order->SalesOrder);
                       ?>
                    </li>
                    <li>
                        ItemsProcessed:
                        <?php

                        echo ($xml->StatusOfItems->ItemsProcessed);
                       ?>

                    </li>
                    <li>
                        ItemsRejected:
                        <?php

                        echo ($xml->StatusOfItems->ItemsRejectedWithWarnings);
                       ?>
                    </li>
                    <li>
                        Error Message:
                        <?php

                        echo ($xml->Orders->OrderDetails->StockLine->ErrorMessages->ErrorDescription);
                       ?>
                    </li>
                </ul>
            </div>
            <div class="col-md-1"></div>
        </div>



    </div>

   @endif


   <div class="widget-content" >
    <div class="row-fluid">
    <table class="table">
        <div class="text-center"> Pending Order</div>



        <thead>

        </thead>
        <tbody >
          <tr>
                <a name="" id="" class="btn btn-primary w-100 my-2" href="{{route('approving_order',$id) }}" role="button" style="background-color:#f77b01; border-color: #0062cc00;
                    box-shadow: 0 0 0 .2rem rgba(38, 143, 255, 0); ">Push Order To Warehouse</a>
            </tr>
          {{-- <tr> --}}
          <thead>
          <tr>Order ID: {{ $Order->id }}</tr>
              <tr>
                  <td>Item ID</td>
                  <td>Name</td>
                  <td>Currency</td>
                  <td>Price</td>
                  <td>Quantity</td>
                  <td>Amount</td>
              </tr>
          </thead>
          @if ($Order_items)


                @foreach ($Order_items as $item)
                <tr>
                <td>{{ $item->products_id }}</td>
                <td> {{ $item->product_name }}</td>
                <td> {{ $item->baseCurrency }}</td>
                <td> {{ $item->price }} </td>
                <td> {{ $item->quantity }} </td>

                <td>{{ $item->price* $item->quantity }} </td>
            </tr>
                @endforeach

          @endif
          {{-- <tr>
            <td> {{ $Order->product_name }}</td>
            <td> {{ $Order->price }} </td>
            <td> {{ $Order->quantity }} </td>

            <td>{{ $Order->price* $Order->quantity }} </td>
          </tr> --}}

          {{-- </tr> --}}

        </tbody>
    </table>
    </div>
   </div>

@endsection
