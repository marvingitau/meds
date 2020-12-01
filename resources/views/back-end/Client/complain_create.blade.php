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
<link rel="stylesheet" href="{{asset('public/css/custom-staffgen.css')}}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">

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
                    <label for="" class="ml-2"><b>Title</b> </label>
                    <input type="text"
                    class="form-control w-100" name="title" id="" aria-describedby="helpId" placeholder="">

                </div>

                <div class="form-group">
                    <label for="" class="ml-2"> <b> Content</b></label>
                    <textarea class="form-control editor1 w-100" name="details" id="" rows="3"></textarea>
                </div>

                  <button type="submit" class="btn btn-primary">Submit</button>

            </form>

        </div>


    </div>

    <div class="widget-content" >
        <div class="row-fluid">

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
                <th>Remove</th>
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
                <td>  <div class="text-center">  <button rel="{{$item->id}}" rel1="complain_data_delete" class="btn btn-danger btn-mini deleteRecord">
                    <span class="glyphicon glyphicon-trash"></span> X
                </button> </div> </td>
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


{{-- <script src="https://code.jquery.com/jquery-1.12.4.min.js" ></script> --}}
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

{{-- <script src="{{asset('public/js/jquery.dataTables.min.js')}}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>

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
            var getUrl = window.location;
            var baseUrl = getUrl.pathname;
            // console.log("/"+deleteFunction+"/"+id);
            window.location.href=baseUrl+ "/"+deleteFunction+"/"+id;
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
