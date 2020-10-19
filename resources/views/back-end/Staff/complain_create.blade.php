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
<link rel="stylesheet" href="{{asset('public/css/custom.css')}}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

@endsection

@section('content')
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
            <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Complain</a>
        </div>
    </div>
    <!--End-breadcrumbs-->
    @if(Session::has('message'))
    <div class="alert alert-success text-center" role="alert">
        <strong></strong>{{Session::get('message')}}
    </div>
   @endif

    <div class="span6">

        <div class="my-5">

            <form action="{{ route('complain_upload') }}" method="post"  enctype="multipart/form-data">
                @csrf



                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text"
                    class="form-control w-100" name="title" id="" aria-describedby="helpId" placeholder="">

                </div>

                <div class="form-group">
                    <label for="">Content</label>
                    <textarea class="form-control editor1 w-100" name="details" id="" rows="3"></textarea>
                </div>

                  <button type="submit" class="btn btn-primary">Submit</button>

    </form>

        </div>


    </div>

    <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
              <h4 class="text-center"> Old Complains</h4>
        </div>
        <div class="widget-content nopadding">

    <table class="table table-bordered data-table">

        <thead>
            <tr>

                <th>ID</th>
                <th>State</th>
                <th>Date</th>
                <th>title</th>
                <th>Detail</th>
                <th>Response</th>
            </tr>
        </thead>
        <tbody>
            @if ($old_complains)
            <?php $i=0; ?>
            @foreach ($old_complains as $item)
            <?php $i++; ?>
            <tr>
            <td scope="row" > {{  $i }}</td>
            <td class="<?php echo  $item->dealt_with?'bg-success':'bg-warning'; ?>"> {{$item->dealt_with?'Read':'Waiting' }}</td>
            <td>{{
            date_format(new DateTime($item->created_at), 'Y-m-d H:i:s')
            }}</td>
            <td> <div class="text-center">
                   {{ $item->title}}
                </div>
            </td>
                <td> {{ $item->details }} </td>
                <td> {{ $item->response }} </td>
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
