@extends('layouts.app-login')
@section('content')
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href=""><b>School</b>Application</a>
    </div>
    <!-- /.login-logo -->
    @include('includes.info-box')
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="{{url('/userLogin')}}" method="post">
            <div class="form-group has-feedback">
                <input type="text" name="username" value="{{old('username')}}" required class="form-control" placeholder="Username">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" required class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            {{csrf_field()}}
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" id="login" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
    </div>
    <!-- /.login-box-body -->
</div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            $('#login').click(function() {
                //e.preventDefault();
                $.fancybox.open("{{asset('/images/ajax-loader.gif')}}",
                {closeBtn:false,closeClick:false,
                    helpers   : {
                        overlay : {closeClick: false} // prevents closing when clicking OUTSIDE fancybox
                    }
                });
            });
        });
    </script>
@endsection

