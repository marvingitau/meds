
@extends('back-end.OtherAdmins.layouts.hrmaster')
@section('title','Admin')
@section('content')
    <!--breadcrumbs-->
    <div id="content-header">
    <div id="breadcrumb"> <a href="{{ route('hr')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a>View Order</a> </div>
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

            <div class="col-md-10">
                <table class="table">
                    <div class="text-center"> Pending Order</div>



                    <thead>

                    </thead>
                    <tbody >
                    <tr>
                            <a name="" id="" class="btn btn-primary w-100 my-2" href="{{route('hrApprovingOrder',$id) }}" role="button" style="background-color:#f77b01; border-color: #0062cc00;
                                box-shadow: 0 0 0 .2rem rgba(38, 143, 255, 0); ">Approve This Order</a>
                        </tr>
                    {{-- <tr> --}}
                    <thead>

                    <tr class="text-center"> <b> Order ID: {{ $Order->id }} </b></tr>
                        <tr>
                            <td>Item ID</td>
                            <td>Name</td>
                            <td>Type</td>
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
                            <td>
                            <?php
                            if($item->item_from == 1){
                                echo "General";
                            }elseif($item->item_from == 2){
                                echo 'Prescription';
                            }else{
                                echo '';
                            }
                            ?></td>
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

            <div class="col-md-2">

                <div class="card text-left">
                  {{-- <img class="card-img-top" src="holder.js/100px180/" alt=""> --}}
                <i class="fa fa-files-o text-center" style="
                padding-top: 1rem;
                color: black;
                font-size: 3rem;
                "></i>
                  <div class="card-body">
                    <div class="text-left" style="
                    font-size: 19px;
                    margin-bottom: 2px;
                    color: black;
                    "> <b> Documents</b></div>


                    <ol class="p-0 m-0 ">
                        @if($supporting_files)
                        @foreach ($supporting_files as $fle)
                        @if ($fle->supporting_documents)
                            <li>
                                <h4>
                                    <a href="{{ asset(''.$fle->supporting_documents) }}" target="_blank" rel="noopener noreferrer"> <?php echo ($fle->supporting_name)?></a>
                                </h4>

                            </li>
                        @endif
                        @endforeach
                        @endif
                    </ol>


                    </div>
                  </div>
                </div>

        </div>

    </div>
   </div>
@endsection
