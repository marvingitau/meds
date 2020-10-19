<div class="custom-user-header">
<!--Header-part-->
<div id="header">
    <h1 style="background: url('<?php echo wp_get_attachment_image_url('48','full'); ?>') no-repeat scroll 0 0 transparent;"><a href="dashboard.html">MEDS  Admin</a></h1>
</div>
<!--close-Header-part-->
<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">
    <li  class="dropdown0" id="profile-messages" ><a title="" href="#" data-toggle="dropdown0" data-target="#profile-messages" class="dropdown-toggle0"><i class="fa fa-home"></i>  <span class="text">Welcome {{ auth()->user()->name }}</span></b></a>
            <ul class="dropdown-menu">
            <li><a href="{{ route('client.profile')}}"><i class=""></i> My Profile</a></li>
              <li class="divider"></li>
              <!--<li><a href="#"><i class="icon-check"></i> My Tasks</a></li>-->
              <li class="divider"></li>
              <!--<li><a href="{{ route('usr_logout')}}"><i class="icon-key"></i> Log Out</a></li>-->
            </ul>
          </li>
          {{-- <li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Messages</span> <span class="label label-important">5</span> </b></a>
            <ul class="dropdown-menu">
              <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i> new message</a></li>
              <li class="divider"></li>
              <li><a class="sInbox" title="" href="#"><i class="icon-envelope"></i> inbox</a></li>
              <li class="divider"></li>
              <li><a class="sOutbox" title="" href="#"><i class="icon-arrow-up"></i> outbox</a></li>
              <li class="divider"></li>
              <li><a class="sTrash" title="" href="#"><i class="icon-trash"></i> trash</a></li>
            </ul>
          </li> --}}
        {{-- <li class=""><a title="" href=""><i class="fa fa-cog"></i> <span class="text">Settings</span></a></li> --}}
        <li class="" ><a title="" href="{{url('/viewcart')}}"><i class="fa fa-shopping-cart"></i> <span class="text">Cart</span><span class="label label-important">{{ Session::get('cart_val') }} </span></a></li>
          <li><a href="{{ route('client.profile')}}"><i class="fa fa-user-circle"></i> My Profile</a></li>
                      <li><a href="{{ route('usr_logout')}}"><i class="fa fa-sign-out"></i> Log Out</a></li>

    </ul>
</div>
</div>


