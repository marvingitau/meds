@extends('back-end.layouts.master')

@section('content')
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">
        <div class="quick-actions_homepage">
            <ul class="quick-actions">
            <li class="bg_lb"> <a href="{{ url('/admin') }}"> <i class="icon-dashboard"></i>  My Dashboard </a> </li>
            <li class="bg_ly"> <a href="{{ route('approved_order') }}"> <i class="icon-inbox"></i>  Approved Order </a> </li>
            <li class="bg_lo"> <a href="{{ route('pending_order') }}"> <i class="icon-th"></i><span class="label label-important">{{ $pding_order }}</span> Pending Orders</a> </li>
            <li class="bg_ls"> <a href="{{ route('pending_clients') }}"> <i class="icon-fullscreen"></i> <span class="label label-important">{{$pding_client }}</span> Pending Client</a> </li>
            <li class="bg_lo span3"> <a href="{{ route('approved_clients') }}"> <i class="icon-th-list"></i> Approved Client</a> </li>
            </ul>
        </div>
    </div>

    <!--Chart-box-->
    <div class="row-fluid">
        <div class="widget-box">
          <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
            <h5>Sales Analytics</h5>
          </div>
          <div class="widget-content" >
            <div class="row-fluid">
              <div class="span99">
                <canvas id="myChart" width="400" height="400"></canvas>
              </div>
              <div class="span6">
                <div class="widget-box">
                    <div class="widget-title bg_ly" data-toggle="collapse0" href="#collapseG20"><span class="icon"><i class="icon-chevron-down"></i></span>
                      <h5>Latest Complains</h5>
                    </div>
                    <div class="widget-content nopadding collapse0 in0" id="collapseG20">
                      <ul class="recent-posts">
                         @if ($compl)
                            @foreach ($compl as $item)
                            <li>
                                <div class="user-thumb"> <img width="40" height="40" alt="User" src="{{ asset('public\products\small\av1.jpg') }}"> </div>
                                <div class="article-post"> <span class="user-info"> By:{{ $item->users->name_of_institution }} / Date:{{
                                    date_format(new DateTime($item->created_at), 'Y-m-d H:i:s')
                                    }} </span>
                                  <p>{{ $item->details }}</p>
                                </div>
                              </li>
                            @endforeach
                          @endif
                      
                          <a  class="btn btn-warning btn-mini" href="{{ route('complain_list')}}" role="button">View All</a>

                        </li>
                      </ul>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection

@section('jsblock')

<script src="https://code.jquery.com/jquery-1.12.4.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

<script>
jQuery(document).ready(function(){
    var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Wen', 'Apr', 'May', 'June'],
            datasets: [{
                label: 'Sales',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)'
                    // 'rgba(54, 162, 235, 0.2)',
                    // 'rgba(255, 206, 86, 0.2)',
                    // 'rgba(75, 192, 192, 0.2)',
                    // 'rgba(153, 102, 255, 0.2)',
                    // 'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)'
                    // 'rgba(54, 162, 235, 1)',
                    // 'rgba(255, 206, 86, 1)',
                    // 'rgba(75, 192, 192, 1)',
                    // 'rgba(153, 102, 255, 1)',
                    // 'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
});
</script>

@endsection


