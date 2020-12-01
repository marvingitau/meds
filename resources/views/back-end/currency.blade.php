@extends('back-end.layouts.master')

@section('content')
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb">
            <a href="{{ route('admin_home') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
            <a href="{{ route('currency') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Currency Conversion</a>
        </div>
    </div>
    <!--End-breadcrumbs-->

    <div class="conversion-section">
        <div class="row-fluid">
            <div class="widget-box">
                <h4 class="text-center">Currecy Conversion</h4>

                <div class="row-fluid" style="display: flex;">
                    <div class="col-md-6">
                        <h4><b>* Base currency is Kenyan Shilling</b></h4><br>
                        {{-- currency type --}}
                        <form action="{{route('currency_rate')}}" method="post">
                            @csrf
                            <div class="form-group">
                            <label for="">Choose  Curreny</label>
                                <select class="form-control currency-list" name="currency" id="currency-list">
                                    <option value="US$">USD</option>
                                    <option value="EUR">EUR</option>
                                    <option value="GBP">GBP</option>
                                    <option value="ZAR">ZAR</option>
                                    <option value="JPY">JPY</option>
                                </select>
                            </div>

                            {{-- rate --}}

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Rate</label>
                                        <input type="text"
                                          class="form-control" name="rate" id="rate" aria-describedby="helpId"  placeholder="">

                                      </div>
                                </div>

                            <button type="submit" class="btn btn-primary rounded-0">Publish</button>

                        </form>
                    </div>

                    <div class="col-md-6">
                        <h4 class="text-center">Conversion History</h4>
                        <div class="row-fluid " >
                            <div class="widget-content nopadding">
                                <table class="table table-bordered " id="data-table">
                                  <thead>
                                    <tr>
                                      <th>ID</th>
                                      <th>Foreign</th>
                                      <th>Base</th>
                                      <th>Actions</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                    $DBdata = DB::table('currency_lists')->get();
                                    $iter=1;
                                    ?>

                                      @foreach($DBdata as $value)
                                      <tr class="item{{$value->id}}">
                                          <td>{{$iter++}}</td>
                                          <td>1 {{ $value->currency}}</td>
                                          <td> Ksh {{ $value->rate}}</td>
                                          <td class="text-center">



                                              <button rel="{{$value->id}}" rel1="currency_rate_delete" class="btn btn-danger btn-mini deleteRecord">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                  </svg>
                                                <span class="glyphicon glyphicon-trash"></span> Delete
                                              </button></td>
                                      </tr>
                                      @endforeach






                                  </tbody>
                                </table>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" integrity="sha512-F5QTlBqZlvuBEs9LQPqc1iZv2UMxcVXezbHzomzS6Df4MZMClge/8+gXrKw2fl5ysdk4rWjR0vKS7NNkfymaBQ==" crossorigin="anonymous"></script>


<script>
jQuery(document).ready(function($){
    $('#currency-list').select2();
    $(".deleteRecord").click(function () {
        var id=$(this).attr('rel');
        var deleteFunction=$(this).attr('rel1');
        swal({
            title:'Are you sure?',
            text:"You won't be able to revert this!",
            type:'warning',
            showCancelButton:true,
            confirmButtonColor:'#3085d6',
            cancelButtonColor:'#d33',
            confirmButtonText:'Yes, delete it!',
            cancelButtonText:'No, cancel!',
            confirmButtonClass:'btn btn-success',
            cancelButtonClass:'btn btn-danger',
            buttonsStyling:false,
            reverseButtons:true
        },function () {
            var getUrl = window.location;
            var baseUrl = getUrl.pathname;
            window.location.href= baseUrl+"/"+deleteFunction+"/"+id;
        });
    });
});
</script>

@endsection
