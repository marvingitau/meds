{{-- @section('title','Login Register Page') --}}

<?php get_header();?>




<main id="primary" class="site-main">
    <!-- move this css to its file -->
    <div class="registration-form-page" style="
    background-image: url('<?php echo wp_get_attachment_image_url('214','full');?>');
    width: 100%;
    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;
    ">
    <div class="form-container" style="
        width: 100%;
        min-height: 100vh;
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        padding: 15px;
        background: rgba(255,255,255,0.8);
    ">
    <div class="container">
        <?php
        $url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $tax_shorcode = basename($url);
        // print_r($tax_shorcode);
        ?>
        <h4 class="text-center text-capitalize" style="margin-top:5rem;margin-bottom:3rem;">learning institution</h4>

        <div class="fomr-container" style="
        /* max-width: 700px; */
        margin: 0 auto;
        padding: 2rem;
        border: 1px solid #c6b6b6;
        background: #7997dfbf;
        border-radius: .3rem;
        box-shadow: 0px 0px 3px black;

        ">
            <form action="" method="post">
                <div class="">
                    <!-- demacator -->
                    <div class="ttle-sec">
                        <h4 class="font-weight-bold">Address</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fname">Name of Institution</label>
                                <input type="text"
                                    class="form-control " name="" id="fname" aria-describedby="helpId" placeholder="">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="opractice">Country</label>
                            <input type="text" class="form-control " name="" id="opractice" aria-describedby="helpId" placeholder="">

                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="pprofession">Postal Address</label>
                            <input type="text" class="form-control " name="" id="pprofession" aria-describedby="helpId" placeholder="">

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="omail">E-mail address </label>
                            <input type="email" class="form-control " name="" id="omail" aria-describedby="helpId" placeholder="">

                            </div>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="phne">Telephone </label>
                            <input type="text" class="form-control " name="" id="phne" aria-describedby="helpId" placeholder="" require>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="phne">Is the Institution recognized by the Government Authority that oversees provision of Health or Medical Services in your County/Area? (Attach supporting documents)- Uploading field. Pdf, jpeg </label>
                            <input type="file" class="form-control " name="" id="phne" aria-describedby="helpId" placeholder="" require>

                            </div>
                        </div>
                    </div>

                    <div class="ttle-sec">
                        <h4 class="font-weight-bold my-md-5">Physical Address</h4>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="phne">Name of Building/Nearest Shopping Centre </label>
                            <input type="text" class="form-control " name="" id="phne" aria-describedby="helpId" placeholder="" require>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="phne">Street name / Road Name </label>
                            <input type="text" class="form-control " name="" id="phne" aria-describedby="helpId" placeholder="" require>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="phne">Town/City</label>
                            <input type="text" class="form-control " name="" id="phne" aria-describedby="helpId" placeholder="" require>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="phne">Country</label>
                            <input type="text" class="form-control " name="" id="phne" aria-describedby="helpId" placeholder="" require>

                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <em class="font-weight-bold my-md-5">Please keep MEDS updated on any changes in authorized people at the Institution, failure to which the signatories below shall be deemed responsible for ordering and settling outstanding payments of the transactions made by your Institution </em>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phne">Name of the Medical Person in charge of the Institution</label>
                                <input type="text" class="form-control " name="" id="phne" aria-describedby="helpId" placeholder="" require>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label for="phne">Qualification</label>
                                    <input type="text" class="form-control " name="" id="phne" aria-describedby="helpId" placeholder="" require>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                    <label for="phne">Professional Registration/Licence No</label>
                                    <input type="text" class="form-control " name="" id="phne" aria-describedby="helpId" placeholder="" require>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                    <label for="phne">Attach supporting documents) – Uploading fields.pdf, .jpeg </label>
                                    <input type="file" class="form-control " name="" id="phne" aria-describedby="helpId" placeholder="" require>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                    <label for="phne">Name of Medical Officer (Doctor) responsible, if any</label>
                                    <input type="text" class="form-control " name="" id="phne" aria-describedby="helpId" placeholder="" require>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                    <label for="phne">Licence/Registration No</label>
                                    <input type="text" class="form-control " name="" id="phne" aria-describedby="helpId" placeholder="" require>

                            </div>
                        </div>

                        <div class="col-md-12">

                            <label class="btn btn-primary " style="background-color:#017fff">
                            Is he/she resident
                            <input type="checkbox" name="" id="" autocomplete="off">
                            </label>
                            <label class="btn btn-primary" style="background-color:#017fff">
                            full time
                            <input type="checkbox" name="" id="" autocomplete="off">
                            </label>
                            <label class="btn btn-primary" style="background-color:#017fff">
                            only available for periodic supervision
                            <input type="checkbox" name="" id="" autocomplete="off">
                            </label>





                        </div>


                    </div>

                    <div class="row">
                        <div class="col-md-12 font-weight-bold mt-5">
                        The following persons are duly authorized to order medical supplies from MEDS.
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="phne"> Name:   </label>
                                <input type="text" class="form-control " name="" id="phne" aria-describedby="helpId" placeholder="" require>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                    <label for="phne">Qualifications:   </label>
                                    <input type="text" class="form-control " name="" id="phne" aria-describedby="helpId" placeholder="" require>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                    <label for="phne"> Licence No: </label>
                                    <input type="text" class="form-control " name="" id="phne" aria-describedby="helpId" placeholder="" require>

                            </div>
                        </div>
                        <!-- 2nd designated -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="phne"> Name:   </label>
                                <input type="text" class="form-control " name="" id="phne" aria-describedby="helpId" placeholder="" require>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                    <label for="phne">Qualifications:   </label>
                                    <input type="text" class="form-control " name="" id="phne" aria-describedby="helpId" placeholder="" require>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                    <label for="phne"> Licence No: </label>
                                    <input type="text" class="form-control " name="" id="phne" aria-describedby="helpId" placeholder="" require>

                            </div>
                        </div>

                        <!-- 3rd designated -->

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="phne"> Name:   </label>
                                <input type="text" class="form-control " name="" id="phne" aria-describedby="helpId" placeholder="" require>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                    <label for="phne">Qualifications:   </label>
                                    <input type="text" class="form-control " name="" id="phne" aria-describedby="helpId" placeholder="" require>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                    <label for="phne"> Licence No: </label>
                                    <input type="text" class="form-control " name="" id="phne" aria-describedby="helpId" placeholder="" require>

                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-12 font-weight-bold mt-5">
                        The following persons are duly authorized to approve payment for the orders.
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="phne"> Name:   </label>
                                <input type="text" class="form-control " name="" id="phne" aria-describedby="helpId" placeholder="" require>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                    <label for="phne">Signature: (png/jpg) </label>
                                    <input type="file" class="form-control " name="" id="phne" aria-describedby="helpId" placeholder="" require>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                    <label for="phne">Designation/Position:  </label>
                                    <input type="text" class="form-control " name="" id="phne" aria-describedby="helpId" placeholder="" require>

                            </div>
                        </div>
                        <!-- 2nd designted -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="phne"> Name:   </label>
                                <input type="text" class="form-control " name="" id="phne" aria-describedby="helpId" placeholder="" require>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                    <label for="phne">Signature: (png/jpg) </label>
                                    <input type="file" class="form-control " name="" id="phne" aria-describedby="helpId" placeholder="" require>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                    <label for="phne">Designation/Position:  </label>
                                    <input type="text" class="form-control " name="" id="phne" aria-describedby="helpId" placeholder="" require>

                            </div>
                        </div>
                        <!-- 3rd designated -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="phne"> Name:   </label>
                                <input type="text" class="form-control " name="" id="phne" aria-describedby="helpId" placeholder="" require>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                    <label for="phne">Signature: (png/jpg) </label>
                                    <input type="file" class="form-control " name="" id="phne" aria-describedby="helpId" placeholder="" require>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                    <label for="phne">Designation/Position:  </label>
                                    <input type="text" class="form-control " name="" id="phne" aria-describedby="helpId" placeholder="" require>

                            </div>
                        </div>

                        <em class="font-weight-bold">
                        All signatories above individually undertake to be responsible for the transactions and payments upon receipt of orders.
                        </em>

                    </div>
                    <div class="row">
                        <div class="col-md-12  font-weight-bold mt-5">
                        Guarantors: The following persons are individually and severally responsible for any outstanding bills should the Institution fail to meet its official obligations.
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="phne"> *Name:   </label>
                                <input type="text" class="form-control " name="" id="phne" aria-describedby="helpId" placeholder="" require>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="phne"> *Signature: (.png/jpg)     </label>
                                <input type="file" class="form-control " name="" id="phne" aria-describedby="helpId" placeholder="" require>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="phne"> *Designation:    </label>
                                <input type="text" class="form-control " name="" id="phne" aria-describedby="helpId" placeholder="" require>

                            </div>
                        </div>
                        <!-- 2nd row -->

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="phne"> Name:   </label>
                                <input type="text" class="form-control " name="" id="phne" aria-describedby="helpId" placeholder="" require>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="phne"> Signature: (.png/jpg)     </label>
                                <input type="file" class="form-control " name="" id="phne" aria-describedby="helpId" placeholder="" require>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="phne"> Designation:    </label>
                                <input type="text" class="form-control " name="" id="phne" aria-describedby="helpId" placeholder="" require>

                            </div>
                        </div>
                        <!-- 3rd designation -->

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="phne"> Name:   </label>
                                <input type="text" class="form-control " name="" id="phne" aria-describedby="helpId" placeholder="" require>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="phne"> Signature: (.png/jpg)     </label>
                                <input type="file" class="form-control " name="" id="phne" aria-describedby="helpId" placeholder="" require>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="phne"> Designation:    </label>
                                <input type="text" class="form-control " name="" id="phne" aria-describedby="helpId" placeholder="" require>

                            </div>
                        </div>


                    </div>

                    <!-- CHECKLIST -->

                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="font-weight-bold my-md-5">CHECKLISTS. </h4>
                        </div>
                        <div class="col-md-4">
                            <label class="btn btn-primary " style="background-color:#017fff">
                            Duly completed application forms with all the relevant parts fully filled.
                            <input type="checkbox" name="" id="" autocomplete="off">
                        </label>
                        </div>
                        <div class="col-md-4">
                            <label class="btn btn-primary " style="background-color:#017fff">
                            Certification of registration/incorporation of the institution with the relevant Government body
                                <input type="checkbox" name="" id="" autocomplete="off">
                            </label>
                        </div>

                        <div class="col-md-4">
                            <label class="btn btn-primary " style="background-color:#017fff">
                            Certificate of registration of the medical person (s) in-charge
                                <input type="checkbox" name="" id="" autocomplete="off">
                            </label>
                        </div>

                        <div class="col-md-4">
                            <label class="btn btn-primary " style="background-color:#017fff">
                            Attach copies of the I.D. or Passport for persons authorized to order and to pay
                                <input type="checkbox" name="" id="" autocomplete="off">
                            </label>
                        </div>

                        <div class="col-md-4">
                            <label class="btn btn-primary " style="background-color:#017fff">
                            Memorandum & Articles of Association for Limited Companies
                                <input type="checkbox" name="" id="" autocomplete="off">
                            </label>
                        </div>

                        <div class="col-md-4">
                            <label class="btn btn-primary " style="background-color:#017fff">
                            Latest CR12 of the Company
                                <input type="checkbox" name="" id="" autocomplete="off">
                            </label>
                        </div>

                        <div class="col-md-4">
                            <label class="btn btn-primary " style="background-color:#017fff">
                            Copy of PIN Certificate for the organization
                                <input type="checkbox" name="" id="" autocomplete="off">
                            </label>
                        </div>


                    </div>


                    <div class="row">
                        <div class="col-md-12 d-none0">
                            <label for="" class="font-weight-bold my-md-3"> Payment method </label><br>

                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link rounded-0 border-0 active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                                   <div class="img-div" style="width:8rem; height:4rem;">
                                       <img src="<?php echo wp_get_attachment_image_url('281','full');?>" alt="" style="width:100%; height:100%;
                                       object-fit:contain;
                                       ">

                                   </div>

                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link rounded-0 border-0" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                                <div class="img-div" style="width:8rem; height:4rem;">
                                    <img src="<?php echo wp_get_attachment_image_url('215','full');?>" alt="" style="width:100%; height:100%;
                                       object-fit:contain;">
                                </div>
                                </a>
                            </li>

                            </ul>
                            <div class="tab-content" id="myTabContent">

                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                    <label for="phne">Card Number * </label>
                                    <input type="text" class="form-control " name="" id="phne" aria-describedby="helpId" placeholder="" require>

                                    <label for="phne">Security Code * </label>
                                    <div class="d-flex">
                                        <input type="text" class="form-control w-25" name="" id="phne" aria-describedby="helpId" placeholder="" require>
                                        <select class="form-control w-25" name="" id="">
                                                        <option>visa</option>
                                                        <option>01</option>
                                        </select>
                                    </div>


                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <label for="">Expiry Date *</label>
                                                <div class="d-flex">
                                                    <select class="form-control w-25" name="" id="">
                                                    <option>01</option>
                                                    <option>02</option>
                                                    <option>03</option>
                                                    <option>04</option>
                                                    <option>05</option>
                                                    <option>07</option>
                                                    <option>08</option>
                                                    <option>09</option>
                                                    <option>10</option>
                                                    <option>11</option>
                                                    <option>12</option>

                                                </select>

                                                <select class="form-control ml-1 w-50" name="" id="">
                                                    <option>2020</option>
                                                    <option>2021</option>
                                                    <option>202</option>
                                                </select>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phne"><b>Type your M-pesa Number </b></label>
                                            <input type="text" class="form-control " name="" id="phne" aria-describedby="helpId" placeholder="XXXXXXXXXX" required>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phne"><b>Type Ref ID </b></label>
                                        <input type="text" class="form-control " name="" id="phne" aria-describedby="helpId" placeholder="01234567" required>

                                    </div>
                                    </div>
                                </div>
                            </div>

                            </div>

                        </div>

                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary border-0" style="background-color:#f77b01">Register</button>
                        </div>
                    </div>



                </div>

            </form>
        </div>
    </div>

    </div>

    </div>





    <?php
    // while ( have_posts() ) :
    // 	the_post();

    // 	get_template_part( 'template-parts/content', 'page' );

    // 	// If comments are open or we have at least one comment, load up the comment template.
    // 	if ( comments_open() || get_comments_number() ) :
    // 		comments_template();
    // 	endif;

    // endwhile; // End of the loop.
    ?>

</main><!-- #main -->

<?php get_footer()?>
