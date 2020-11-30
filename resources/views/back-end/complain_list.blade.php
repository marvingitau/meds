@extends('back-end.layouts.master')

@section('content')
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{ route('admin_home') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->

    <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
          <h5>Complain List</h5>
        </div>
        <div class="widget-content nopadding">
          <table class="table table-bordered data-table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Title</th>
                <th>From</th>
                <th>Actions</th>
                <th>Response</th>

              </tr>
            </thead>
            <tbody>



                @foreach($all_complains as $item)
                <tr class="item{{$item->id}}">
                    <td>{{$item->id}}</td>
                    <td>{{$item->title}}</td>

                    <td>{{ $item->users->name_of_institution }}</td>




                    <td>
                        <a class=" btn btn-info"
                    role="button" href="{{ route('complain_view',$item->id)}}">
                            <span class="glyphicon glyphicon-edit"></span> view
                        </a>
                        <button rel="{{$item->id}}" rel1="delete_approved_client" class="btn btn-danger btn-mini deleteRecord">
                            <span class="glyphicon glyphicon-trash"></span> Delete
                        </button></td>

                        <td class="<?php echo  $item->dealt_with?'bg-success':'bg-warning'; ?>"> {{$item->dealt_with?'Viewed':'Waiting' }}</td>
                </tr>
                @endforeach






            </tbody>
          </table>
        </div>
      </div>

@endsection

@section('jsblock')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="{{asset('public/js/excanvas.min.js')}}"></script>
    {{-- <script src="{{asset('js/jquery.min.js')}}"></script> --}}


 <script src="{{asset('public/js/jquery.ui.custom.js')}}"></script>
<script src="{{asset('public/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/public/js/jquery.flot.min.js')}}"></script>
<script src="{{asset('public/js/jquery.flot.resize.min.js')}}"></script>
<script src="{{asset('public/js/jquery.peity.min.js')}}"></script>
<script src="{{asset('public/js/fullcalendar.min.js')}}"></script>
<script src="{{asset('public/js/matrix.js')}}"></script>
<script src="{{asset('public/js/matrix.dashboard.js')}}"></script>
<script src="{{asset('js/jquery.gritter.min.js')}}"></script>
<script src="{{asset('js/matrix.interface.js')}}"></script>
<script src="{{asset('js/matrix.chat.js')}}"></script>
<script src="{{asset('js/jquery.validate.js')}}"></script>
<script src="{{asset('js/jquery.wizard.js')}}"></script>
<script src="{{asset('js/jquery.uniform.js')}}"></script>
<script src="{{asset('js/select2.min.js')}}"></script>
<script src="{{asset('js/matrix.popover.js')}}"></script>
<script src="{{asset('public/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/js/matrix.tables.js')}}"></script>
<script src="{{asset('js/matrix.form_validation.js')}}"></script>
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
                window.location.href="/admin/"+deleteFunction+"/"+id;
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
        // $('.data-table').DataTable( {
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




    // } );


    </script>
@endsection


