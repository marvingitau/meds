<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package meds
 */

get_header();
?>


	<main id="primary" class="site-main">
        <!-- move this css to its file -->
        <div class="registration-form-page" style="
        background-image: url('<?php echo wp_get_attachment_image_url('214','full');?>');
        width: 100%;
        background-repeat: no-repeat;
        background-position: center center;
        background-size: cover;
        ">
        <div class="form-container" style="">
        <div class="container">
            <?php
            $url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $tax_shorcode = basename($url);
            $formttl=str_replace("-"," ", $tax_shorcode);
            // print_r($tax_shorcode);
            ?>
            <h4 class="text-center text-capitalize fomr-reg-title" style="">prequalification</h4>

            <div class="fomr-container" style="">


                {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> --}}
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.js" ></script>

                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
            <script>
                jQuery(document).ready(function($){
                    $("#wizard").steps({
                        headerTag: "h3",
                        bodyTag: "section",
                        transitionEffect: "slideLeft",
                        autoFocus: true,
                        enableAllSteps:false,
                        showFinishButtonAlways: false,
                        onStepChanging: function(event, currentIndex, newIndex) {
                            // Always allow going backward even if the current step contains invalid fields!
                            if (currentIndex > newIndex) {
                                return true;
                            }

                            // Forbid suppressing "Warning" step if the user is to young
                            //if (newIndex === 3 && Number($("#age").val()) < 18) {
                            //    return false;
                            //}

                            var form = $(this);

                            // Clean up if user went backward before
                            if (currentIndex < newIndex) {
                                // To remove error styles
                                $(".body:eq(" + newIndex + ") label.error", form).remove();
                                $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                            }

                            // Disable validation on fields that are disabled or hidden.
                            form.validate().settings.ignore = ":disabled,:hidden";

                            // Start validation; Prevent going forward if false
                            return form.valid();
                        },
                        onStepChanged: function(event, currentIndex, priorIndex) {
                            // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                            if (currentIndex === 2 && priorIndex === 3) {
                                $(this).steps("previous");
                                return;
                            }

                            // Suppress (skip) "Warning" step if the user is old enough.
                            if (currentIndex === 2 && Number($("#age").val()) >= 18) {
                                $(this).steps("next");
                            }
                        },
                        onFinishing: function(event, currentIndex) {
                            var form = $(this);

                            // Disable validation on fields that are disabled.
                            // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                            form.validate().settings.ignore = ":disabled";

                            // Start validation; Prevent form submission if false
                            return form.valid();
                        },
                        onFinished: function(event, currentIndex) {
                            var form = $(this);

                            // Submit form input
                            form.submit();
                        }
                    }).validate({
                        errorPlacement: function(error, element) {
                            element.before(error);
                        },
                        rules: {
                            confirm: {
                                equalTo: "#password"
                            }
                        }
                    });

                    var vounter=0;
                    var vounter2=0;
                    $(".btn-s").click(function(){
                        if(vounter < 2){
                            vounter++;
                            var html = $(".clone").html();
                            $(".increment").after(html);
                        }else{

                        }

                    });

                    $("body").on("click",".btn-d",function(){
                        vounter--;
                        $(this).parents(".control-group").remove();
                    });


                    $(".btn-ss").click(function(){
                        if(vounter2 < 2){
                            vounter2++;
                            var html = $(".clonee").html();
                            $(".incrementt").after(html);
                        }else{

                        }

                    });

                    $("body").on("click",".btn-dd",function(){
                        vounter2--;
                        $(this).parents(".control-group").remove();
                    });
                });
            </script>
              @if (count($errors) > 0)
              <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
              @endif

              @if(Session::has('message'))
              <div class="alert alert-success text-center" role="alert">
                  <strong>Well done! &nbsp;</strong>{{Session::get('message')}}
              </div>
             @endif

                <form action="{{route('user.register')}}" method="post" id="wizard" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="form_title" value="<?php echo $formttl?>">
                    {{-- <div id="wizard0"> --}}
                        <!-- demacator -->

                        <h3 class="font-weight-bold">Address</h3>
                        <section style="display: block;
                        left: 0px;">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="institutionname">Name of Organization <span class="frm-reg-ast">*</span></label>
                                        <input type="text"
                                            class="form-control required" name="name_of_institution" id="institutionname" aria-describedby="helpId" placeholder="" required>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="pobox">Postal Address </label>
                                    <input type="text" class="form-control " name="postal_address" id="pobox" aria-describedby="helpId" placeholder="">

                                    </div>
                                </div>


                            </div>

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="phne">Telephone <span class="frm-reg-ast">*</span></label>
                                    <input type="text" class="form-control " name="phone_no" id="phne" aria-describedby="helpId" placeholder="" require>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="usermail">E-mail address <span class="frm-reg-ast">*</span> </label>
                                    <input type="email" class="form-control " name="email" id="usermail" aria-describedby="helpId" placeholder="">

                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="phne">Password <span class="frm-reg-ast">*</span></label>
                                    <input type="password" class="form-control " name="password" id="phne" aria-describedby="helpId" placeholder=""  value="{{old('password')}}" required>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="phne">Password(confirm) <span class="frm-reg-ast">*</span></label>

                                    <input type="password" class="form-control " name="password_confirmation" id="phne" aria-describedby="helpId" value="{{old('password_confirmation')}}" placeholder="" require>

                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="phne">Title:  <span class="frm-reg-ast">*</span></label>

                                    <input type="text" class="form-control " name="password_confirmation" id="phne" aria-describedby="helpId" value="{{old('password_confirmation')}}" placeholder="" require>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="phne">Company Profile: (upload button). Pdf, docx(max-size:1028kb) <span class="frm-reg-ast">*</span> </label>
                                    {{-- <input type="file" class="form-control " name="recognition-documents" id="phne" aria-describedby="helpId" placeholder="" require> --}}

                                    <div class="input-group control-group increment" >
                                        <input type="file" name="filename[]" class="form-control">
                                        <div class="input-group-btn">
                                          <button class="btn btn-success btn-s" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                                        </div>
                                      </div>
                                      <div class="clone hide d-none">
                                        <div class="control-group input-group" style="margin-top:10px">
                                          <input type="file" name="filename[]" class="form-control">
                                          <div class="input-group-btn">
                                            <button class="btn btn-danger btn-d" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                          </div>
                                        </div>
                                      </div>

                                    </div>
                                </div>
                            </div>


                        </section>


                        <h3 class="font-weight-bold">Physical Address</h3>
                        <section style="display: block;
                        left: 0px;">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="phne">Registered address  </label>
                                    <input type="text" class="form-control " name="buildingname" id="phne" aria-describedby="helpId" placeholder="" require>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="phne">Street name / Building </label>
                                    <input type="text" class="form-control " name="streetname" id="phne" aria-describedby="helpId" placeholder="" require>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="phne">County <span class="frm-reg-ast">*</span></label>
                                    <input type="text" class="form-control required" name="town" id="phne" aria-describedby="helpId" placeholder="" require>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="phne">Country of registration <span class="frm-reg-ast">*</span></label>
                                    <input type="text" class="form-control required" name="country" id="phne" aria-describedby="helpId" placeholder="">

                                    </div>
                                </div>
                            </div>

                        </section>

                        <h3 class="font-weight-bold">Person In charge </h3>
                        <section style="display: block;
                        left: 0px;">
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phne">Contact Person:  <span class="frm-reg-ast">*</span></label>
                                        <input type="text" class="form-control required" name="name" id="phne" aria-describedby="helpId" placeholder="" require>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phne">Title: </label>
                                        <input type="text" class="form-control " name="name" id="phne" aria-describedby="helpId" placeholder="" require>

                                    </div>
                                </div>




                                    <div class="col-md-6">
                                            <div class="form-group">


                                                <label for="phne">List products and services offered – Uploading fields.pdf, .docx (max-size:1028kb) </label>

                                                <div class="input-group control-group incrementt" >
                                                    <input type="file" name="personinchargefile[]" class="form-control">
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-success btn-ss" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                                                        </div>
                                                </div>

                                                <div class="clonee hide d-none">
                                                        <div class="control-group input-group" style="margin-top:10px">
                                                        <input type="file" name="personinchargefile[]" class="form-control">
                                                            <div class="input-group-btn">
                                                                <button class="btn btn-danger btn-dd" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                                            </div>
                                                        </div>
                                                </div>

                                            </div>
                                        </div>

                            </div>
                        </section>



                    {{-- </div> --}}




                </form>


            </div>
        </div>

        </div>

        </div>





	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
