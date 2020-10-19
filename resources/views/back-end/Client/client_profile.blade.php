
@extends('back-end.Client.layouts.master')
@section('cssblock')

    {{-- <link rel="stylesheet" href="css/bootstrap.min.css" /> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="public/css/colorpicker.css" />
    <link rel="stylesheet" href="public/css/datepicker.css" />
    <link rel="stylesheet" href="public/css/custom.css" />
    <link rel="stylesheet" href="public/css/uniform.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="public/css/matrix-style.css" />
    <link rel="stylesheet" href="public/css/matrix-media.css" />
    <link rel="stylesheet" href="public/css/bootstrap-wysihtml5.css" />
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



    <div class="client-container">

    <div class="container-fluid">

        <div class="user-data">

            {{-- {{ $client_data }} --}}

            <table class="table table-bordered">
                <tr>
                    <td><span style="padding-right:3px;">Name: </span>

                       
                           {{ $client_data->name }}



                    </td>
                    <td><span style="padding-right:3px;">Email: </span>


                      {{ $client_data->email }}

                    </td>
                    <td><span style="padding-right:3px;">Tel: </span>

                       {{ $client_data->phone_no }}
                    </td>
                    <td><span style="padding-right:3px;">Institution Name: </span>
                        {{ $client_data->name_of_institution }}
                    </td>
                    {{-- <td><span style="padding-right:3px;">Client Type: </span>{{ $client_data->form_title }}</td> --}}
                </tr>
                <tr>
                    <td><span style="padding-right:3px;">P.O. Box: </span>

                        {{ $client_data->postal_address }}
                    </td>
                    <td><span style="padding-right:3px;">Building Name: </span>
                        {{ $client_data->buildingname }}
                    </td>
                    <td><span style="padding-right:3px;">Street Name:  </span>

                        {{ $client_data->streetname }}
                    </td>
                    <td><span style="padding-right:3px;">Town:  </span>
                      {{ $client_data->town }}
                    </td>
                    <td><span style="padding-right:3px;">Country:  </span>
                        {{$client_data->country }}
                    </td>

                </tr>

            </table>
            <div class="row">

                <div class="col-12 col-md-6">
                    <div class="alert alert-primary " role="alert">
                        Government Approval Documents
                    </div>



                      @if ($client_files)

                      <ol>
                        @foreach ($client_files as $fle)
                        @if ($fle->filename)

                        <li>
                            <a href="{{ asset(''.$fle->filename) }}" target="_blank" rel="noopener noreferrer"> <?php echo substr($fle->filename, 20)?></a>


                        </li>

                        @endif

                        @endforeach

                      </ol>

                      @endif


                     



                    

                    </div>



                </div>

            </div>

            <div class="alert alert-primary w-100 text-center text-white my-3" role="alert" style="background-color:#017fff;">
                Persons Incharge
            </div>
            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="bg-white">
                        <span style="color:black;">Medical Person in charge of the Institution:</span>
                        <div class="my-1 ">
                             {{ $client_data->name }}

                        </div>
                    </div>

                </div>

                <div class="col-md-4 text-center">
                    <div class="bg-white">
                        <span style="color:black;">Qualification:</span>
                        <div class="my-1 ">

                         {{ $client_data->qualification }}

                        </div>
                    </div>

                </div>

                <div class="col-md-4 text-center">
                    <div class="bg-white">
                        <span style="color:black;">Professional Registration/Licence No:</span>
                        <div class="my-1 ">



                       {{ $client_data->licence_no }}

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
 {{ $client_data->doctors_name }}
                        </div>
                        </div>
                    </div>

                    <div class="col-md-4 text-center ">
                        <div class="border bg-white">
                        <span style="color:black;">Licence/Registration No</span>
                        <div class="my-1 ">

{{ $client_data->doctors_licence_no }}

                        </div>
                    </div>
                    </div>

                    <div class="col-md-4  ">
                        <div class="border bg-white">
                            <div class="text-center">
                        <span style="color:black;" class="">supporting documents:</span>

                            </div>
                        <div class="my-1 ">
                            @if ($client_files)

                            <ol>
                            @foreach ($client_files as $fle)
                            @if ($fle->personinchargefile)

                            <li>
                                <a href="{{ asset(''.$fle->personinchargefile) }}" target="_blank" rel="noopener noreferrer"> <?php echo substr($fle->personinchargefile, 20)?></a>


                            </li>

                            @endif

                            @endforeach

                            </ol>

                            @endif


                        </div>

                            <!--<div class="input-group control-group incrementt" >-->
                            <!--    <input type="file" name="personinchargefile[]" class="form-control">-->
                            <!--    <div class="input-group-btn">-->
                            <!--    <button class="btn btn-success btn-ss" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <!--<div class="clonee hide d-none">-->
                            <!--    <div class="control-group input-group" style="margin-top:10px">-->
                            <!--    <input type="file" name="personinchargefile[]" class="form-control">-->
                            <!--    <div class="input-group-btn">-->
                            <!--        <button class="btn btn-danger btn-dd" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>-->
                            <!--    </div>-->
                            <!--    </div>-->
                            <!--</div>-->

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

              <div class="alert alert-primary w-100 text-center text-white my-3" role="alert" style="background-color:#017fff;">
                Authorised to Order Personnel
              </div>

              <table class="table">
                  <thead>
                      <tr>
                          <th>Name</th>
                          <th>Qualifications</th>
                          <th>Licence No</th>
                      </tr>
                  </thead>
                  <tbody>
                      @if ($client_files)
                          @foreach ($client_files as $authorizedToOrder)
                          <tr>
                            <td scope="row">{{ $authorizedToOrder->order_authorized_name }}

                            </td>
                            <td>{{ $authorizedToOrder->order_authorized_qualification }}
                            </td>
                            <td>
                               {{ $authorizedToOrder->order_authorized_licence_no }}
                            </td>
                        </tr>
                          @endforeach
                      @endif
                      <tr>
                          <td scope="row"></td>
                          <td></td>
                          <td></td>
                      </tr>

                  </tbody>
              </table>


              <div class="alert alert-primary w-100 text-center text-white my-3" role="alert" style="background-color:#017fff;">
                Authorised to Make Payment
              </div>

              <table class="table">
                  <thead>
                      <tr>
                          <th>Name</th>
                          <th>Signature</th>
                          <th>Designation/Position</th>
                      </tr>
                  </thead>
                  <tbody>
                      @if ($client_files)
                          @foreach ($client_files as $authorizedToOrder)
                          <tr>
                            <td scope="row">
                                {{ $authorizedToOrder->payment_authorizedpersonelname }}

                            </td>
                            <td>

                                <a href="{{ asset(''.$authorizedToOrder->payment_authorizedpersonelsign) }}" target="_blank" rel="noopener noreferrer"> <?php echo substr($authorizedToOrder->payment_authorizedpersonelsign, 20)?></a>

                               
                            </td>

                            <td>{{ $authorizedToOrder->payment_authorizedpersoneldesignation  }}



                            </td>
                        </tr>
                          @endforeach
                      @endif


                  </tbody>
              </table>


              <div class="alert alert-primary w-100 text-center text-white my-3" role="alert" style="background-color:#017fff;">
                Guarantors
              </div>

              <table class="table">
                  <thead>
                      <tr>
                          <th>Name</th>
                          <th>Signature</th>
                          <th>Designation/Position</th>
                      </tr>
                  </thead>
                  <tbody>
                      @if ($client_files)
                          @foreach ($client_files as $Guarantors)
                          <tr>
                            <td scope="row">{{ $Guarantors->guarantorname }}

                            </td>
                            <td>


                                <a href="{{ asset(''.$Guarantors->guarantorsignature) }}" target="_blank" rel="noopener noreferrer"> <?php echo substr($Guarantors->guarantorsignature, 20)?></a>

                                

                            </td>
                            <td> {{ $Guarantors->guarantordesignation  }}


                             </td>
                        </tr>
                          @endforeach
                      @endif


                  </tbody>
              </table>

            



        </div>
    </div>

    </div>











@endsection
@section('jsblock')

<script src="https://code.jquery.com/jquery-1.12.4.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
{{-- <script src="js/jquery.min.js"></script> --}}
<script src="public/js/jquery.ui.custom.js"></script>
<script src="public/js/bootstrap.min.js"></script>
<script src="public/js/bootstrap-colorpicker.js"></script>
<script src="public/js/bootstrap-datepicker.js"></script>
<script src="public/js/jquery.toggle.buttons.js"></script>
<script src="public/js/masked.js"></script>
<script src="public/js/jquery.uniform.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
{{-- <script src="{{asset('js/jquery.dataTables.min.js')}}"></script> --}}
{{-- <script src="js/select2.min.js"></script> --}}
<script src="public/js/matrix.js"></script>
<script src="public/js/matrix.form_common.js"></script>
<script src="public/js/wysihtml5-0.3.0.js"></script>
<script src="public/js/jquery.peity.min.js"></script>
<script src="public/js/bootstrap-wysihtml5.js"></script>
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
