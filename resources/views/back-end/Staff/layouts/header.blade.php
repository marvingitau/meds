<div class="custom-user-header">
<!--Header-part-->
<div id="header">
    <h1 style="background: url('<?php echo wp_get_attachment_image_url('48','full'); ?>') no-repeat scroll 0 0 transparent;"><a href="dashboard.html">MEDS  Admin</a></h1>
</div>
<!--close-Header-part-->
<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">
        <li  class="dropdown0" id="profile-messages" ><a title="" href="#" data-toggle="dropdown0" data-target="#profile-messages" class="dropdown-toggle0"><i class="fa fa-home"></i>  <span class="text">Welcome User</span></b></a>
            <ul class="dropdown-menu">
            <li><a href="{{ route('client.profile')}}"><i class=""></i> My Profile</a></li>
              <li class="divider"></li>
              <li class="divider"></li>
            </ul>
          </li>

        <li><a href="{{ route('usr_logout')}}"><i class="fa fa-sign-out"></i> Log Out</a></li>

    </ul>
</div>
<div  id="user-nav2" class="navbar">
    <ul class="nav">
        <li class=""><a title="" href="{{route('view.cart')}}"><i class="fa fa-shopping-cart"></i> <span class="text">Cart</span><span class="label label-important">{{ Session::get('cart_val') }} </span></a></li>

    </ul>
</div>
</div>


