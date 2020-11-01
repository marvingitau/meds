@extends('back-end.layouts.master')
@section('title','Admin')
@section('content')
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{route('product.index')}}">Pending Clients</a> <a href="#" class="current">View Clients Details</a></div>
    </div>
    <!--End-breadcrumbs-->

    @if(Session::has('message'))
    <div class="alert alert-success text-center" role="alert">

        <?php
        $xml=simplexml_load_string(Session::get('message')) or die("Error: Cannot create object");
try {
    echo " <br> Error: ".$xml->item[0]->customer[0]->ErrorDescription."<br>";
echo " customerCode:".$xml->item[0]->key[0]->customer."<br>";
echo "RecordsRead: ".$xml->StatusOfItems[0]->RecordsRead."<br>";
echo "RecordsInvalid: ".$xml->StatusOfItems[0]->RecordsInvalid."<br>";
} catch (\Throwable $th) {
    echo " <br>  customerCode:".$xml->item[0]->key[0]->customer."<br>";
echo "RecordsRead: ".$xml->StatusOfItems[0]->RecordsRead."<br>";
echo "RecordsInvalid: ".$xml->StatusOfItems[0]->RecordsInvalid."<br>";
}

        ?>
    </div>
   @endif

        <div class="client-container">

            <div class="container-fluid">
             <form action="{{route('approving_client',$client_data->id) }}" method="post">
                @csrf
                 <button type="submit" class="btn btn-primary w-100 my-2" style="background-color:#f77b01; border-color: #0062cc00;
                 box-shadow: 0 0 0 .2rem rgba(38, 143, 255, 0); ">Approve This Client</button>


                     <table class="table table-bordered">
                        <tr>
                            {{-- <td><span style="padding-right:3px;">Name: </span>{{ $client_data->name }}</td> --}}
                            <td><span style="padding-right:3px;"> </span>
                                <div class="form-group">
                                  <label for="">Salesperson:</label>
                                  <input type="text"
                                      class="form-control form-control-sm" name="Salesperson" id="Salesperson" aria-describedby="helpId" placeholder="" required>

                                </div>

                            </td>
                            <td><span style="padding-right:3px;"> </span>
                                <div class="form-group">
                                    <label for="">Branch:</label>
                                    <input type="text"
                                        class="form-control form-control-sm" name="Branch" id="Branch" aria-describedby="helpId" placeholder="" required>

                                  </div>
                            </td>
                            </tr>
                            <tr>
                                <td><span style="padding-right:3px;"> </span>

                                <div class="form-group">
                                <label for=""></label>
                                <textarea class="form-control" name="Terms" id="Terms" rows="3" placeholder="Invoice Terms" required></textarea>
                                </div>
                                </td>

                            </tr>

                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="">Sold To Address1:</label>
                                        <input type="text"
                                            class="form-control form-control-sm" name="soldToAddr1" id="soldToAddr1" aria-describedby="helpId" placeholder="" required>

                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="">Sold To Address2:</label>
                                        <input type="text"
                                            class="form-control form-control-sm" name="soldToAddr2" id="soldToAddr2" aria-describedby="helpId" placeholder="" required>

                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="">Sold To Address3:</label>
                                        <input type="text"
                                            class="form-control form-control-sm" name="soldToAddr3" id="soldToAddr3" aria-describedby="helpId" placeholder="" required>

                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="">Ship To Address1:</label>
                                        <input type="text"
                                            class="form-control form-control-sm" name="ShipToAddr1" id="ShipToAddr1" aria-describedby="helpId" placeholder="" required>

                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="">Ship To Address2:</label>
                                        <input type="text"
                                            class="form-control form-control-sm" name="ShipToAddr2" id="ShipToAddr2" aria-describedby="helpId" placeholder="" required>

                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="">Ship To Address3:</label>
                                        <input type="text"
                                            class="form-control form-control-sm" name="ShipToAddr3" id="ShipToAddr3" aria-describedby="helpId" placeholder="" required>

                                    </div>

                                </td>
                            </tr>
                            {{-- <td><span style="padding-right:3px;">Client Type: </span>{{ $client_data->form_title }}</td> --}}


                    </table>
             </form>


            <div class="user-data">

                {{-- {{ $client_data }} --}}

                <table class="table table-bordered">
                    <tr>
                        <td><span style="padding-right:3px;">Name: </span>{{ $client_data->name }}</td>
                        <td><span style="padding-right:3px;">Email: </span>{{ $client_data->email }}</td>
                        <td><span style="padding-right:3px;">Tel: </span>{{ $client_data->phone_no }}</td>
                        <td><span style="padding-right:3px;">Institution Name: </span>{{ $client_data->name_of_institution }}</td>
                        <td><span style="padding-right:3px;">Client Type: </span>{{ $client_data->form_title }}</td>
                    </tr>
                    <tr>
                        <td><span style="padding-right:3px;">P.O. Box: </span>{{ $client_data->postal_address }}</td>
                        <td><span style="padding-right:3px;">Building Name: </span>{{ $client_data->buildingname }}</td>
                        <td><span style="padding-right:3px;">Street Name:  </span>{{ $client_data->streetname }}</td>
                        <td><span style="padding-right:3px;">Town:  </span>{{ $client_data->town }}</td>
                        <td><span style="padding-right:3px;">Country:  </span>{{ $client_data->country }}</td>

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

                    <div class="col-md-3 text-center ">
                        <div class="border bg-white">
                        <span style="color:black;">Name of Medical Officer responsible:</span>
                        <div class="my-1 ">
                            {{ $client_data->licence_no }}

                        </div>
                        </div>
                    </div>

                    <div class="col-md-3 text-center ">
                        <div class="border bg-white">
                        <span style="color:black;">Licence/Registration No</span>
                        <div class="my-1 ">
                            {{ $client_data->licence_no }}

                        </div>
                    </div>
                    </div>

                    <div class="col-md-3  ">
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
                    </div>
                    </div>

                    <div class="col-md-3 text-center ">
                        <div class="border bg-white">
                            <span style="color:black;">Medical Officer Availabilty:</span>
                            <div class="my-1 ">

                                <?php
                                 echo  (!empty($client_data->resident)?"She/He is a Resident" : !empty($client_data->fulltime))? "Fulltime":"Available for perodic supervision";
                                ?>
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
                                <td scope="row"> {{ $authorizedToOrder->order_authorized_name }}</td>
                                <td> {{ $authorizedToOrder->order_authorized_qualification }} </td>
                                <td> {{ $authorizedToOrder->order_authorized_licence_no }} </td>
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
                                <td scope="row"> {{ $authorizedToOrder->payment_authorizedpersonelname }}</td>
                                <td>
                                    <a href="{{ asset(''.$authorizedToOrder->payment_authorizedpersonelsign) }}" target="_blank" rel="noopener noreferrer"> <?php echo substr($authorizedToOrder->payment_authorizedpersonelsign, 20)?></a>

                                    {{-- {{ $authorizedToOrder->payment_authorizedpersonelsign }} --}}
                                </td>
                                <td> {{ $authorizedToOrder->payment_authorizedpersoneldesignation  }} </td>
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
                                <td scope="row"> {{ $Guarantors->guarantorname }}</td>
                                <td>
                                    <a href="{{ asset(''.$Guarantors->guarantorsignature) }}" target="_blank" rel="noopener noreferrer"> <?php echo substr($Guarantors->guarantorsignature, 20)?></a>

                                </td>
                                <td> {{ $Guarantors->guarantordesignation  }} </td>
                            </tr>
                              @endforeach
                          @endif


                      </tbody>
                  </table>




            </div>
            </div>

        </div>


@endsection



