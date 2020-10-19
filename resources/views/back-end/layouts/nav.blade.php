<!--sidebar-menu-->
<div id="sidebar"><a href="{{url('/admin')}}" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
        <li {{$menu_active==1? ' class=active':''}}><a href="{{url('/admin')}}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
        <li class="submenu open {{$menu_active==2? ' active open':''}}"> <a href="#"><i class="icon icon-th-list"></i> <span>Categories</span></a>
            <ul>
                <li><a href="{{url('/admin/category/create')}}">Add New Category</a></li>
                <li><a href="{{route('category.index')}}">List Categories</a></li>
            </ul>
        </li>
        <li class="submenu  open {{$menu_active==3? ' active open':''}}"> <a href="#"><i class="icon icon-th-list"></i> <span>Products</span></a>
            <ul>
            <li><a href="{{ url('/admin/product/create') }}">Add New Products</a></li>
            <li><a href="{{ route('product.index') }}">List Products</a></li>
            </ul>
        </li>

        <li {{$menu_active==4? ' class=active':''}}><a href="{{route('pending_clients')}}"><i class="icon icon-home"></i> <span>Pending Clients</span>  </a> </li>
        <li {{$menu_active==5? ' class=active':''}}><a href="{{route('approved_clients')}}"><i class="icon icon-home"></i> <span>Approved Clients</span></a> </li>
        <li {{$menu_active==6? ' class=active':''}}><a href="{{route('pending_order')}}"><i class="icon icon-home"></i> <span>Pending Orders</span></a> </li>
        <li {{$menu_active==7? ' class=active':''}}><a href="{{route('approved_order')}}"><i class="icon icon-home"></i> <span>Approved Orders</span></a> </li>
        <li {{$menu_active==8? ' class=active':''}}><a href="{{route('complain_list')}}"><i class="icon icon-home"></i> <span>Complains</span></a> </li>
        <li {{$menu_active==9? ' class=active':''}}><a href="{{route('create.subadmin')}}"><i class="icon icon-home"></i> <span>Create SubAdmins</span></a> </li>


    </ul>
</div>
<!--sidebar-menu-->
