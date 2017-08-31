@extends('layouts.app-login')
@section('content')
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href=""><b>Règlement</b>Facile</a>
    </div>
    <!-- /.login-logo -->
    @include('includes.info-box')
    <div class="lockscreen-item">
        <!-- lockscreen image -->
        <div class="lockscreen-image">
            <img src="{{ asset("/uploads/".Sentinel::getUser()->profilePix) }}" class="img-circle" alt="User Image">
        </div>

        <!-- lockscreen credentials (contains the form) -->
        <form class="lockscreen-credentials" action="{{route('unlock')}}" method="post">
            <div class="input-group">
                <input type="hidden" name="username" value="{{Sentinel::getUser()->username}}">
                <input type="password" required name="password" class="form-control" placeholder="password">

                <div class="input-group-btn">
                    {{csrf_field()}}
                    <button type="submit" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
                </div>
            </div>
        </form>
        <!-- /.lockscreen credentials -->
    </div>
    <!-- /.lockscreen-item -->
    <div class="help-block text-center">
        Enter your password to retrieve your session
    </div>
    <div class="text-center">
        <a href="{{url('/userLogin')}}">Or sign in as a different user</a>
    </div>
    <!-- /.login-box-body -->
</div>
@endsection


