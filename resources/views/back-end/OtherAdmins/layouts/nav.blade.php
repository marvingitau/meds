<!--sidebar-menu-->
<div id="sidebar"><a href="{{url('/admin')}}" class="visible-phone"><i class=" 	fa fa-dashboard"></i> Dashboard</a>
    <ul>



        <li {{$menu_active==6? ' class=active':''}}><a href="{{route('wmgr')}}"><i class=" 	fa fa-circle-o"></i> <span>Pending  Orders</span></a> </li>
        <li {{$menu_active==7? ' class=active':''}}><a href="{{route('whmgrApprovedStaffOrder')}}"><i class="fa fa-check-circle"></i> <span>Approved Orders</span></a> </li>



    </ul>
</div>
<!--sidebar-menu-->
