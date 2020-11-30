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
        <a href="{{route('client.dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
        <a href=""> <i class="icon-dashboard"></i>  Order View </a>
    </div>
</div>
<!--End-breadcrumbs-->



   <div class="widget-content" >
    <div class="row-fluid">
    <table class="table">
        <div class="text-center"> Order</div>



        <thead>

        </thead>
        <tbody >

          {{-- <tr> --}}
          <thead>
          <tr>Order ID: {{ $Order->id }}</tr>
              <tr>
                  <td>Item ID</td>
                  <td>Name</td>
                  {{-- <td>Currency</td> --}}
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
                {{-- <td> {{ $item->baseCurrency }}</td> --}}
                <td> {{ $item->price }} </td>
                <td> {{ $item->quantity }} </td>

                <td>{{ $item->price* $item->quantity }} </td>
            </tr>
                @endforeach

          @endif


        </tbody>
    </table>
    </div>
   </div>

@endsection

@section('jsblock')

<script src="https://code.jquery.com/jquery-1.12.4.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>



@endsection
