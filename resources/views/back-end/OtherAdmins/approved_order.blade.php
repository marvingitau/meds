
@extends('back-end.OtherAdmins.layouts.master')
@section('title','Admin')
@section('content')
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{ route('wmgr') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{ route('whmgrApprovedStaffOrder')}}" class="current">View Approved Order</a></div>
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
      <h5>Approved Order</h5>
    </div>
    <div class="widget-content nopadding">
    <table class="table2">
        <div class="text-center"> </div>
        <thead>
            <tr>
                <th>ORDER_ID</th>
                <th>From</th>
                <th>Price</th>
                {{-- <th>Status</th> --}}
                <th>Action</th>
                <th>Extra Action</th>
            </tr>
        </thead>
        <tbody >
            @if ($approvedOrder)
            <?php $i=0; ?>
            @foreach ($approvedOrder as $item)
            <?php $i++; ?>
            <tr>
                <td scope="row"> <div class="text-center0">{{ $item->id }}</div> </td>
                <td scope="row"> <div class="text-center0">{{ $item->name }}</div> </td>
                <td> <div class="text-center0">{{ $item->grand_total }}</div> </td>
                {{-- <td class="<php echo $item->order_verify; ?>"> <div class="text-center ">Approved</div>  </td> --}}

                <td class="text-center">
                    <a class=" btn btn-info"
                    role="button" href="{{ route('otherAdminsViewApprovedOrder',$item->id)}}">
                            <span class="glyphicon glyphicon-edit"></span> view
                    </a>
                    <button rel="{{$item->id}}" rel1="warehouseManager/order/delete" class="btn btn-danger btn-mini deleteRecord">
                        <span class="glyphicon glyphicon-trash"></span> Delete
                    </button></td>
                </td>
                @if($item->order_type == 99 && $item->progress_status_dispatch == null )
                <td class="bg-warning text-center">
                    Packaging Required
                </td>
                @elseif($item->order_type == 99 && $item->progress_status_dispatch ==1  && $item->progress_status_packaged ==1)
                <td class="bg-success text-center">
                    Approved
                </td>
                @elseif($item->order_type != 99)
                <td class="bg-success text-center">
                    Approved
                </td>
                @endif
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

        // datatable

        // datatable
        // jQuery(document).ready(function($) {
        // $('.table').DataTable( {
        //     columnDefs: [ {
        //         targets: [ 0 ],
        //         orderData: [ 0, 1 ]
        //     }, {
        //         targets: [ 1 ],
        //         orderData: [ 1, 0 ]
        //     }, {
        //         targets: [ 4 ],
        //         orderData: [ 4, 0 ]
        //     } ]
        // } );


        $('.table2').DataTable({
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
		"sDom": '<""l>t<"F"fp>'
	    });

    // } );


    </script>
@endsection
