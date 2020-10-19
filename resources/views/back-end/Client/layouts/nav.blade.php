<div class="client-custom-nav">
<!--sidebar-menu-->
<div id="sidebar"><a href="{{route('client.dashboard')}}" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
        <li {{$menu_active==11? ' class=active':''}}><a href="{{route('client.dashboard')}}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
        <li {{$menu_active==12? ' class=active':''}}><a href="{{route('product.list')}}"><i class="icon icon-home"></i> <span>Products</span></a> </li>
        <li {{$menu_active==16? ' class=active':''}}><a href="{{route('order.status')}}"><i class="icon icon-home"></i> <span>Order Status</span></a> </li>
        <!--{!--<li {{$menu_active==14? ' class=active':''}}><a href="{{route('status.statement')}}"><i class="icon icon-home"></i> <span>Statement</span></a> </li>--}-->
        <li {{$menu_active==15? ' class=active':''}}><a href="{{route('status.invoice')}}"><i class="icon icon-home"></i> <span>Invoice</span></a> </li>
        <li {{$menu_active==17? ' class=active':''}}><a href="{{route('complain')}}"><i class="icon icon-home"></i> <span>Lodge a complaint</span></a> </li>
        {{-- <li class="submenu  open {{$menu_active==3? ' active open':''}}">
        <ul>
            <li>
        <form action="{{ route('product.cat') }}" method="post" class="form-horizontal">
            @csrf
                            <div class="row d-flex align-items-center">
                                <div class="col-md-12 offset-md-3">
                                    <div class="form-group">
                                        <label class="control-labelk">Select Category</label>
                                        <div class="controlsk">


                                          <select id="d" name="catd" class="form-control">

                                            <option value="" selected >Choose Category</option>

                                            @if ($product_cat)
                                                @foreach ($product_cat as $item)
                                                    <option value="{{ $item->Product_class }}">{{ $item->Description }}</option>
                                                @endforeach
                                            @endif

                                          </select>
                                        </div>
                                    </div>
                                </div>

                            </div>


        </form>
            </li>
        </ul>
        </li> --}}


    </ul>
</div>
<!--sidebar-menu-->

</div>
