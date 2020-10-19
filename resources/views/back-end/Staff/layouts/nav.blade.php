<div class="client-custom-nav">
<!--sidebar-menu-->
<div id="sidebar"><a href="{{route('client.dashboard')}}" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
        <li {{$menu_active==11? ' class=active':''}}><a href="{{route('staff.home')}}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
        {{-- <li {{$menu_active==12? ' class=active':''}}><a href="{{route('staff.product.list')}}"><i class="icon icon-home"></i> <span>Products</span></a> </li> --}}
        <li class="submenu  open {{$menu_active==12? ' active open':''}}"> <a href="#"><i class="icon icon-th-list"></i> <span>Products</span></a>
            <ul>
            <li  {{$menu_active==14? ' class=active':''}}><a href="{{ route('prescription.product.list') }}"> Prescription Products</a></li>
            <li  {{$menu_active==15? ' class=active':''}}><a href="{{ route('general.product.list') }}">General Products </a></li>
            </ul>
        </li>



    </ul>
</div>
<!--sidebar-menu-->

</div>
