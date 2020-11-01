<!--sidebar-menu-->
<div id="sidebar"><a href="{{url('/admin')}}" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>



        <li {{$menu_active==6? ' class=active':''}}><a href="{{route('wmgr')}}"><i class="icon icon-home"></i> <span>Pending  Orders</span></a> </li>
        <li {{$menu_active==7? ' class=active':''}}><a href="{{route('whmgrApprovedStaffOrder')}}"><i class="icon icon-home"></i> <span>Approved Orders</span></a> </li>



    </ul>
</div>
<!--sidebar-menu-->
