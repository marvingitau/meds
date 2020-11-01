@extends('front-end.layouts.master')
@section('title','Home Page')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    @include('front-end.layouts.category_menu')
                </div>

                <div class="col-sm-9 padding-right">
                  <div class="error-body">
                     <h4>{{ $hd}}</h4>
                     <p>{{ $issue}} </p>
                  </div>


                </div>
            </div>
        </div>
    </section>
@endsection
