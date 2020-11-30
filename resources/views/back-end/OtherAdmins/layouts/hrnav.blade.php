<!--sidebar-menu-->
<div id="sidebar">
    <ul>



        <li {{$menu_active==6? ' class=active':''}}><a href="{{route('hr')}}"><i class="fa fa-circle-o"></i> <span>Pending Staff Orders</span></a> </li>
        <li {{$menu_active==7? ' class=active':''}}><a href="{{route('hrApprovedStaffOrder')}}"><i class="fa fa-check-circle"></i> <span>Approved Staff Orders</span></a> </li>


    </ul>
</div>
<!--sidebar-menu-->
