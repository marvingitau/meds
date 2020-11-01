
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
    <div class="alert alert-success text-center" role="alert">
        {{-- <strong></strong>{{Session::get('message')}} --}}

        <?php
        $xml=simplexml_load_string(Session::get('message')) or die("Error: Cannot create object");
        print_r($xml);
// try {
//     echo " <br> Error: ".$xml->item[0]->customer[0]->ErrorDescription."<br>";
// echo " customerCode:".$xml->item[0]->key[0]->customer."<br>";
// echo "RecordsRead: ".$xml->StatusOfItems[0]->RecordsRead."<br>";
// echo "RecordsInvalid: ".$xml->StatusOfItems[0]->RecordsInvalid."<br>";
// } catch (\Throwable $th) {
//     echo " <br>  customerCode:".$xml->item[0]->key[0]->customer."<br>";
// echo "RecordsRead: ".$xml->StatusOfItems[0]->RecordsRead."<br>";
// echo "RecordsInvalid: ".$xml->StatusOfItems[0]->RecordsInvalid."<br>";
// }

        ?>
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
                    box-shadow: 0 0 0 .2rem rgba(38, 143, 255, 0); ">Approve This Order</a>
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