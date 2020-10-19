<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title><meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('public/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('public/css/bootstrap-responsive.min.css')}}" />
    <link rel="stylesheet" href="{{asset('public/css/matrix-login.css')}}" />
    <link href="{{asset('public/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

</head>
<body>
<div id="loginbox">
    <form id="loginform" class="form-vertical" method="POST" action="{{ route('login') }}">

        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="control-group normal_text"> <img src="{{asset('public/img/logo.png')}}" alt="Logo" /></div>

        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    {{-- <span class="add-on bg_lg"><i class="icon-user"> </i></span> --}}
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="email" required autofocus>
                    <br>
                    @if ($errors->has('email'))
                        <br><span class="invalid-feedback" style="color: white;">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    {{-- <span class="add-on bg_ly"><i class="icon-lock"></i></span> --}}
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="password" required>
                    <br>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-actions0">

            <span class="pull-left"> <div class="form-checke" style="float: left;
                margin-left: 4rem;
                color: white;
                font-size: 1rem;
                border: 1px solid gray;
                padding: .4rem;">
                {{-- <div for="" style=" margin-right: .5rem;"> --}}
                    <input type="radio"  name="id" id="" value="2" checked>
                    <span style=" margin-right: .5rem;">Staff</span>
                {{-- </div> --}}

                {{-- <div for=""> --}}
                    <input type="radio"  name="id" id="" value="1">
                    Admin
                {{-- </div> --}}


            </div></span>
            {{-- <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Lost password?</a></span> --}}
            <span class="pull-right">  <div class="" style=" margin-right: 4rem;"><button type="submit" class="btn btn-success">Login</button></div> </span>
        </div>
    </form>
    <form id="recoverform" action="#" class="form-vertical">
        <p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>

        <div class="controls">
            <div class="main_input_box">
                <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="text" placeholder="E-mail address" />
            </div>
        </div>

        <div class="form-actions">
            <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a></span>
            <span class="pull-right"><a class="btn btn-info">Recover</a></span>
        </div>
    </form>
</div>

<script src="{{asset('public/js/jquery.min.js')}}"></script>
<script src="{{asset('public/js/matrix.login.js')}}"></script>
</body>

</html>
