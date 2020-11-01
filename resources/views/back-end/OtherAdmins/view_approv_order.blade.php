
@extends('back-end.OtherAdmins.layouts.master')
@section('title','Admin')
@section('content')
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">View Approved Order</a> </div>
    </div>
    <!--End-breadcrumbs-->

    @if(Session::has('message'))
    <div class="alert alert-success text-center" role="alert">
        <strong></strong>{{Session::get('message')}}
    </div>
   @endif


   <div class="widget-content" >
    <div class="row-fluid">
        <div class="row">

            <div class="col-md-6">
                <a name="" id="" class="btn btn-primary w-100 my-2 bg-warning" href="{{route('packaging_fin',$id) }}" role="button" style=" border-color: #0062cc00;
                box-shadow: 0 0 0 .2rem rgba(38, 143, 255, 0); ">Packaging Finished</a>
              </div>
              <div class="col-md-6">
                <a name="" id="" class="btn btn-primary w-100 my-2 bg-warning" href="{{route('readyfor_dispatch',$id) }}" role="button" style=" border-color: #0062cc00;
                box-shadow: 0 0 0 .2rem rgba(38, 143, 255, 0); ">Order ready for dispatch</a>
              </div>
        </div>
    <table class="table">
        <div class="text-center"> Approved Order</div>



        <thead>

        </thead>
        <tbody >

          {{-- <tr> --}}
          <thead>
          <tr>Order ID: {{ $Order->id }}</tr>
              <tr>
                  <td>Item ID</td>
                  <td>Name</td>
                  <td>Price</td>
                  <td>Quantity</td>
                  <td>Amount</td>
              </tr>
          </thead>
          @if ($Order_items)


                @foreach ($Order_items as $item)
                <tr>
                <td>{{ $item->id }}</td>
                <td> {{ $item->product_name }}</td>
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
