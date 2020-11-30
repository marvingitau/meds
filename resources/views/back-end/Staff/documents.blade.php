@extends('back-end.Staff.layouts.master')

@section('cssblock')
   {{-- <link rel="stylesheet" href="css/bootstrap.min.css" /> --}}
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
   {{-- <link rel="stylesheet" href="{{asset('public/css/bootstrap-responsive.min.css')}}" /> --}}
   {{-- <link rel="stylesheet" href="{{asset('public/css/colorpicker.css')}}" /> --}}
   {{-- <link rel="stylesheet" href="{{asset('public/css/datepicker.css')}}" /> --}}
   <link rel="stylesheet" href="{{ asset('public/css/custom-staffdb.css')}}" />
   {{-- <link rel="stylesheet" href="{{asset('public/css/uniform.css')}}" /> --}}
   {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> --}}
   <link rel="stylesheet" href="{{asset('public/css/matrix-style.css')}}" />
   <link rel="stylesheet" href="{{asset('public/css/matrix-media.css')}}" />
   <link rel="stylesheet" href="{{asset('public/css/bootstrap-wysihtml5.css')}}" />
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
   {{-- <link href="font-awesome/css/font-awesome.css" rel="stylesheet" /> --}}
   <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">


@endsection

@section('content')
    <!--breadcrumbs-->
    <div id="content-header text-center">
    <div id="breadcrumb">
        <a href="{{ route('staff.home')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a  title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Documents</a>
    </div>
    </div>
    <!--End-breadcrumbs-->

    @if(Session::has('message'))
    <div class="alert alert-success text-center" role="alert">
        <strong></strong>{{Session::get('message')}}
    </div>
   @endif

    <div class="widget-content" >
        <div class="row-fluid">
            <div class="custom-table">
                <div class="widget-content nopadding">
                    <h4 class="text-uppercase">Supporting Documents</h4>

                    <table class="table table-bordered " id="data-table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                            <?php $i=1;?>
                            @if($supporting_files)
                            @foreach ($supporting_files as $fle)
                            @if ($fle->supporting_documents)

                                <tr>
                                <td class="cart_id">
                                    <?php echo $i++; ?>
                                </td>
                                <td class="cart_description">
                                    <h4>
                                        <a href="{{ asset(''.$fle->supporting_documents) }}" target="_blank" rel="noopener noreferrer"> <?php echo ($fle->supporting_name)?></a>
                                    </h4>

                                </td>
                                <td class=" text-center">
                                    <a rel="{{$fle->supporting_name }}" rel1="document/delete" class="btn btn-danger btn-mini deleteRecord" > <i class="fa fa-trash"></i> Remove Document</a>
                                </td>

                                @endif
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

{{-- <script src="{{ asset('public/js/jquery.min.js') }}"></script> --}}
<script src="{{ asset('public/js/jquery.ui.custom.js')}}"></script>
<script src="{{ asset('public/js/bootstrap.min.js')}}"></script>
{{-- <script src="{{ asset('public/js/jquery.uniform.js')}}"></script> --}}
{{-- <script src="{{ asset('public/js/matrix.js')}}"></script> --}}
<script src="{{ asset('public/js/wysihtml5-0.3.0.js')}}"></script>
<script src="{{ asset('public/js/jquery.peity.min.js')}}"></script>
<script src="{{ asset('public/js/bootstrap-wysihtml5.js')}}"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>


<script>
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
                window.location.href="/staff/"+deleteFunction+"/"+id;
            });
        });


    $('.textarea_editor').wysihtml5();
    $('#d').select2();

            // datatable
    // jQuery(document).ready(function($) {
        $('#data-table').DataTable({
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
		"sDom": '<""l>t<"F"fp>'
	    });


    // });




</script>




@endsection
