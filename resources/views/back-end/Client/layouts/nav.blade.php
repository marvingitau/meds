<div class="client-custom-nav">
<!--sidebar-menu-->
<div id="sidebar"><a href="{{route('client.dashboard')}}" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
        <li {{$menu_active==11? ' class=active':''}}><a href="{{route('client.dashboard')}}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
        <li {{$menu_active==12? ' class=active':''}}><a href="{{route('product.list')}}"><i class="icon icon-home"></i> <span>Products</span></a> </li>
        <li {{$menu_active==16? ' class=active':''}}><a href="{{ url('/order_status') }}"><i class="icon icon-home"></i> <span>Order Status</span></a> </li>

        <li {{$menu_active==18? ' class=active':''}}><a href="{{url('/order_placed')}}"><i class="icon icon-home"></i> <span>Order placed</span></a> </li>
        <li {{$menu_active==19? ' class=active':''}}><a href="{{url('/order_in_warehouse')}}"><i class="icon icon-home"></i> <span>Order in warehouse</span></a> </li>
        <li {{$menu_active==20? ' class=active':''}}><a href="{{url('/order_packed')}}"><i class="icon icon-home"></i> <span>Order packed</span></a> </li>
        <li {{$menu_active==21? ' class=active':''}}><a href="{{url('/order_ready_for_dispatch')}}"><i class="icon icon-home"></i> <span>Order ready for dispatch</span></a> </li>

        <li {{$menu_active==15? ' class=active':''}}><a href="{{route('status.invoice')}}"><i class="icon icon-home"></i> <span>Invoice</span></a> </li>
        <li {{$menu_active==17? ' class=active':''}}><a href="{{route('complain')}}"><i class="icon icon-home"></i> <span>Lodge a complaint</span></a> </li>



    </ul>
</div>
<!--sidebar-menu-->

</div>
