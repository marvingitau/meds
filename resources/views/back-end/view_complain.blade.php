@extends('back-end.layouts.master')

@section('content')
    <!--breadcrumbs-->
    <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('/admin') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
    <a href="{{ route('complain_list')}}" title="Back" class="tip-bottom"><i class="icon-home"></i> Complain List</a>
        </div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->

    @if(Session::has('message'))
    <div class="alert alert-success text-center" role="alert">
        <strong></strong>{{Session::get('message')}}
    </div>
   @endif

    <div class="span6">

        <div class="my-5">
            <a name="" id="" class="btn btn-warning w-100 my-3" href="{{ route('complain_approve', $single_complains->id) }}" role="button">Viewed</a>

            <div class="card">
                <div class="card-body">
                    <div class="card-title font-weight-bold text-center">
                        <h4>Complain Message</h4>
                    </div>
                    <div class="card-text">
                        {{ $single_complains->details }}
                    </div>
                </div>

            </div>
<hr>
            <form action="{{ route('complain_response', $single_complains->id) }}" method="post"  enctype="multipart/form-data">
                @csrf


                <div class="form-group mt-3">
                    <label for="">RESPONSE</label>
                    <textarea class="form-control editor1 w-100" name="response" id="" rows="3"></textarea>
                </div>

                  <button type="submit" class="btn btn-primary">Submit</button>

            </form>

        </div>


    </div>

@endsection

@section('jsblock')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="{{asset('public/js/excanvas.min.js')}}"></script>
    {{-- <script src="{{asset('js/jquery.min.js')}}"></script> --}}



@endsection


