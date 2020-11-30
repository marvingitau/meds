<div class="client-custom-nav">
<!--sidebar-menu-->
<div id="sidebar">
    <ul>
        <li {{$menu_active==11? ' class=active':''}}><a href="{{route('staff.home')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a> </li>
        {{-- <li {{$menu_active==12? ' class=active':''}}><a href="{{route('staff.product.list')}}"><i class="icon icon-home"></i> <span>Products</span></a> </li> --}}
        <li class="submenu  open {{$menu_active==12? ' active open':''}}"> <a href="#"><i class="fa fa-product-hunt"></i> <span>Products</span></a>
            <ul>
            <li  {{$menu_active==14? ' class=active':''}}><a href="{{ route('prescription.product.list') }}"> <i class="fa fa-plus"></i> Prescription Products</a></li>
            <li  {{$menu_active==15? ' class=active':''}}><a href="{{ route('general.product.list') }}">  <i class="fa fa-plus"></i> General Products </a></li>
            </ul>
        </li>
        <li {{$menu_active==16? ' class=active':''}}><a href="{{route('staff.document.list')}}"><i class=" 	fa fa-files-o"></i> <span>Documents</span></a> </li>




    </ul>
</div>
<!--sidebar-menu-->

</div>
