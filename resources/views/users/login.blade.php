
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
<div class="container-div" style="background: linear-gradient(rgba(81, 106, 202, 0.76), rgba(217, 217, 217, 0.76)),url('<?php echo wp_get_attachment_image_url('86','full'); ?>');">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 cols-data">
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
                <div class="alert alert-danger text-center" role="alert">
                    <strong>Sorry! &nbsp;</strong>{{Session::get('message')}}
                </div>
               @endif

                <form action="{{url('/user_login')}}" method="post" class="form-horizontal">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email" name="email"/>

                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" name="password"/>
                    </div>




                    <div class="d-flex">
                        <span>
                            <input type="checkbox" name="remember" class="checkbox">
                            Keep me signed in
                        </span>
                        <button type="submit" class="btn btn-info ml-auto">Login</button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>



<?php

// get_sidebar();
get_footer();

