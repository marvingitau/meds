
@extends('back-end.Client.layouts.master')
@section('cssblock')

    {{-- <link rel="stylesheet" href="css/bootstrap.min.css" /> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('public/css/bootstrap-responsive.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/css/colorpicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/css/datepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/css/custom.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/css/uniform.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('public/css/matrix-style.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/css/matrix-media.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/css/bootstrap-wysihtml5.css') }}" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

@endsection
@section('content')
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb">
            <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
            <a href="index.html" title="Here" class="tip-bottom"><i class="icon-home"></i> Profile</a>
        </div>


    </div>

    <!--End-breadcrumbs-->



   <form action="{{route('update_client',$client_data->id) }}" method="post">
        @csrf
        <div class="container-fluid">
        <button type="submit" class="btn btn-primary w-100 my-2"  role="button" style="background-color:#f77b01; border-color: #0062cc00;
            box-shadow: 0 0 0 .2rem rgba(38, 143, 255, 0); ">Update Data</button>

        <div class="user-data">

            {{-- {{ $client_data }} --}}

            <table class="table table-bordered">
                <tr>
                    <td><span style="padding-right:3px;">Name: </span>

                        <div class="form-group">

                            <input type="text"
                              class="form-control" name=""  value=" {{ $client_data->name }}" id="" aria-describedby="helpId" placeholder="" disabled>

                        </div>


                    </td>
                    <td><span style="padding-right:3px;">Email: </span>


                        <div class="form-group">

                            <input type="text"
                              class="form-control" name="email"  value="{{ $client_data->email }}" id="" aria-describedby="helpId" placeholder="" disabled>

                        </div>

                    </td>
                    <td><span style="padding-right:3px;">Tel: </span>

                        <div class="form-group">

                            <input type="text"
                              class="form-control" name="phone_no"  value="{{ $client_data->phone_no }}" id="" aria-describedby="helpId" placeholder="">

                        </div>
                    </td>
                    <td><span style="padding-right:3px;">Institution Name: </span>
                        <div class="form-group">

                            <input type="text"
                              class="form-control" name="name_of_institution"  value="{{ $client_data->name_of_institution }}" id="" aria-describedby="helpId" placeholder="">

                        </div>
                    </td>
                    {{-- <td><span style="padding-right:3px;">Client Type: </span>{{ $client_data->form_title }}</td> --}}
                </tr>
                <tr>
                    <td><span style="padding-right:3px;">P.O. Box: </span>

                        <div class="form-group">

                            <input type="text"
                              class="form-control" name="postal_address"  value="{{ $client_data->postal_address }}" id="" aria-describedby="helpId" placeholder="">

                        </div>
                    </td>
                    <td><span style="padding-right:3px;">Building Name: </span>
                        <div class="form-group">

                            <input type="text"
                              class="form-control" name="buildingname"  value="{{ $client_data->buildingname }}" id="" aria-describedby="helpId" placeholder="">

                        </div>
                    </td>
                    <td><span style="padding-right:3px;">Street Name:  </span>

                        <div class="form-group">

                            <input type="text"
                              class="form-control" name="streetname"  value=" {{ $client_data->streetname }}" id="" aria-describedby="helpId" placeholder="">

                        </div>
                    </td>
                    <td><span style="padding-right:3px;">Town:  </span>
                        <div class="form-group">

                            <input type="text"
                              class="form-control" name="town"  value="{{ $client_data->town }}" id="" aria-describedby="helpId" placeholder="">

                        </div>
                    </td>
                    <td><span style="padding-right:3px;">Country:  </span>
                        {{ $client_data->country }}
                        <div class="form-group">

                            <input type="text"
                              class="form-control" name="country"  value="{{ $client_data->country }}" id="" aria-describedby="helpId" placeholder="" disabled>

                        </div>
                    </td>

                </tr>

            </table>


        </div>

            <div class="alert alert-primary w-100 text-center text-white my-3" role="alert" style="background-color:#017fff;">
                Persons Incharge
            </div>


            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="bg-white">
                        <span style="color:black;">Medical Person in charge of the Institution:</span>
                        <div class="my-1 ">
                            <div class="form-group">

                                <input type="text"
                                  class="form-control" name="name"  value=" {{ $client_data->name }}" id="" aria-describedby="helpId" placeholder="">

                            </div>

                        </div>
                    </div>

                </div>

                <div class="col-md-4 text-center">
                    <div class="bg-white">
                        <span style="color:black;">Qualification:</span>
                        <div class="my-1 ">

                            <div class="form-group">

                                <input type="text"
                                  class="form-control" name="qualification"  value=" {{ $client_data->qualification }}" id="" aria-describedby="helpId" placeholder="">

                            </div>

                        </div>
                    </div>

                </div>

                <div class="col-md-4 text-center">
                    <div class="bg-white">
                        <span style="color:black;">Professional Registration/Licence No:</span>
                        <div class="my-1 ">



                        <div class="form-group">

                            <input type="text"
                              class="form-control" name="licence_no"  value=" {{ $client_data->licence_no }}" id="" aria-describedby="helpId" placeholder="">

                        </div>

                        </div>
                    </div>

                </div>


            </div>

              <hr class="bg-dark my-2">

                <div class="row ">

                    <div class="col-md-4 text-center ">
                        <div class="border bg-white">
                        <span style="color:black;">Name of Medical Officer responsible:</span>
                        <div class="my-1 ">

                            <div class="form-group">

                                <input type="text"
                                class="form-control" name="doctors_name"  value=" {{ $client_data->doctors_name }}" id="" aria-describedby="helpId" placeholder="">

                            </div>

                        </div>
                        </div>
                    </div>

                    <div class="col-md-4 text-center ">
                        <div class="border bg-white">
                        <span style="color:black;">Licence/Registration No</span>
                        <div class="my-1 ">


                            <div class="form-group">

                                <input type="text"
                                class="form-control" name="doctors_licence_no"  value="{{ $client_data->doctors_licence_no }}" id="" aria-describedby="helpId" placeholder="">

                            </div>

                        </div>
                    </div>
                    </div>
                    <div class="col-md-4 text-center ">
                        <div class="border bg-white">
                            <span style="color:black;">Medical Officer Availabilty:</span>
                            <div class="my-1 ">

                            <div class="form-group">
                                {{-- <label class="control-labelk">Select Category</label> --}}
                                <div class="controlsk">
                                    <?php
                                    $slectded=  (!empty($client_data->resident)?"She/He is a Resident" : !empty($client_data->fulltime))? "Fulltime":"Available for perodic supervision";
                                    ?>
                                <select multiple id="dd" class="form-control" name="">
                                    <option <?php echo $slectded==="She/He is a Resident"?"selected":''; ?>  >She/He is a Resident</option>
                                    <option <?php echo $slectded==="Fulltime"?"selected":''; ?>>Fulltime</option>
                                    <option <?php echo $slectded==="Available for perodic supervision"?"selected":''; ?> >Available for perodic supervision</option>

                                </select>
                                </div>
                            </div>


                            </div>
                        </div>

                    </div>

                    </div>



                </div>


            </div>
    </form>










@endsection
@section('jsblock')

<script src="https://code.jquery.com/jquery-1.12.4.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
{{-- <script src="js/jquery.min.js"></script> --}}
<script src="{{ asset('public/js/jquery.ui.custom.js') }}"></script>
<script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/js/bootstrap-colorpicker.js') }}"></script>
<script src="{{ asset('public/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('public/js/jquery.toggle.buttons.js') }}"></script>
<script src="{{ asset('public/js/masked.js') }}"></script>
<script src="{{ asset('public/js/jquery.uniform.js') }}"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
{{-- <script src="{{asset('jpublic/s/jquery.dataTables.min.js')}}"></script> --}}
{{-- <script src="js/select2.min.js"></script> --}}
<script src="{{ asset('public/js/matrix.js') }}"></script>
<script src="{{ asset('public/js/matrix.form_common.js') }}"></script>
<script src="{{ asset('public/js/wysihtml5-0.3.0.js') }}"></script>
<script src="{{ asset('public/js/jquery.peity.min.js') }}"></script>
<script src="{{ asset('public/js/bootstrap-wysihtml5.js') }}"></script>
<script>

	$('.textarea_editor').wysihtml5();
    $('#d').select2();
    $('#dd').select2();
            // datatable
    // jQuery(document).ready(function($) {
        $('#data-table').DataTable({
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
		"sDom": '<""l>t<"F"fp>'
	})
    // })


                // jQuery(document).ready(function($) {
                    var ounter=0;
                    var ounter2=0;
                    $("#btn-s").click(function(){
                        if(ounter < 2){
                            ounter++;
                            var html = $("#clone").html();
                            $(".increment").after(html);
                        }else{

                        }

                    });

                    $("body").on("click","#btn-d",function(){
                        ounter--;
                        $(this).parents(".control-group").remove();
                    });


                    $(".btn-ss").click(function(){
                        if(ounter2 < 2){
                            ounter2++;
                            var html = $(".clonee").html();
                            $(".incrementt").after(html);
                        }else{

                        }

                    });

                    $("body").on("click",".btn-dd",function(){
                        ounter2--;
                        $(this).parents(".control-group").remove();
                    });

                // });




    // $('#data-table').DataTable({
    //         columnDefs: [ {
    //             targets: [ 0 ],
    //             orderData: [ 0, 1 ]
    //         }, {
    //             targets: [ 1 ],
    //             orderData: [ 1, 0 ]
    //         }, {
    //             targets: [ 4 ],
    //             orderData: [ 4, 0 ]
    //         } ]
    //     });



</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>




@endsection
