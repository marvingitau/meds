<div class="custom-user-header">
<!--Header-part-->
<div id="header">
    <h1 style="background: url('<?php echo wp_get_attachment_image_url('48','full'); ?>') no-repeat scroll 0 0 transparent;"><a href="dashboard.html">MEDS  Admin</a></h1>
</div>
<!--close-Header-part-->
<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">

        <li class="">
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i>{{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

        </li>
    </ul>
</div>


</div>
