
@extends('back-end.OtherAdmins.layouts.master')
@section('title','Admin')
@section('content')
    <!--breadcrumbs-->
    <div id="content-header">
    <div id="breadcrumb"> <a href="{{ route('wmgr') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{ route('wmgr') }}">Pending Order</a> </div>
    </div>
    <!--End-breadcrumbs-->

    @if(Session::has('message'))
    <div class="alert alert-success text-center" role="alert">
        <strong></strong>{{Session::get('message')}}
    </div>
   @endif

   <div class="widget-content" >
    <div class="row-fluid">

   <div class="widget-box">
    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
      <h5>Pending Order</h5>
    </div>

    <div class="widget-content nopadding">
    <table class="table">
        <div class="text-center"> </div>



        <thead>
            <tr>
                <th>ORDER_ID</th>
                <th>From</th>
                <th>Price</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody >
            @if ($pendingOrder)
            <?php $i=0; ?>
            @foreach ($pendingOrder as $item)
            <?php $i++; ?>
            <tr>
                <td scope="row"> <div class="text-center">{{ $item->id }}</div> </td>
                <td scope="row"> <div class="text-center">{{ $item->name }}</div> </td>
                <td> <div class="text-center0">{{ $item->grand_total }}</div> </td>
                <td class="<?php echo $item->order_verify; ?>"> <div class="text-center ">Pending</div>  </td>

                <td>
                    <a class=" btn btn-info"
                    role="button" href="{{ route('wrviewStafforder',$item->id)}}">
                            <span class=" 	fa fa-eye"></span> view
                    </a>
                    <button rel="{{$item->id}}" rel1="warehouseManager/order/delete" class="btn btn-danger btn-mini deleteRecord">
                        <span class="fa fa-trash-o"></span> Delete
                    </button></td>
                </td>
            </tr>

            @endforeach

            @endif

        </tbody>
    </table>
    </div>
    </div>
</div>
</div>
@endsection

@section('jsblock')

<script src="https://code.jquery.com/jquery-1.12.4.min.js" ></script>
{{-- <script src="{{ asset('public/js/jquery.ui.custom.js')}}"></script> --}}
<script src="{{ asset('public/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('public/js/wysihtml5-0.3.0.js')}}"></script>
<script src="{{ asset('public/js/jquery.peity.min.js')}}"></script>
<script src="{{ asset('public/js/bootstrap-wysihtml5.js')}}"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

    <script type="text/javascript">

        $(".deleteRecord").click(function () {
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


        // This function is called from the pop-up menus to transfer to
        // a different page. Ignore if the value returned is a null string:
        function goPage (newURL) {

            // if url is empty, skip the menu dividers and reset the menu selection to default
            if (newURL != "") {

                // if url is "-", it is this page -- reset the menu:
                if (newURL == "-" ) {
                    resetMenu();
                }
                // else, send page to designated URL
                else {
                    document.location.href = newURL;
                }
            }
        }

        // resets the menu selection upon entry to this page:
        function resetMenu() {
            document.gomenu.selector.selectedIndex = 2;
        }

        $('.table').DataTable({
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
		"sDom": '<""l>t<"F"fp>'
	    });
        // datatable

        // datatable
        // jQuery(document).ready(function($) {

        // $('.table').DataTable({
		// "bJQueryUI": true,
		// "sPaginationType": "full_numbers",
		// "sDom": '<""l>t<"F"fp>'
	    // });



    // } );


    </script>
@endsection

