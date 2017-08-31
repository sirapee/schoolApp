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
            <img src="{{ asset("/uploads/".$user->profilePix) }}" class="img-circle" alt="User Image">
        </div>

        <!-- lockscreen credentials (contains the form) -->
        <form class="lockscreen-credentials" action="{{route('two-factor')}}" method="post">
            <div class="input-group">
                <input type="hidden" name="emp_id" value="{{$user->emp_id}}">
                <input type="password" required name="token" class="form-control" placeholder="Token">

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
        Enter Token to complete Login
    </div>
    <div class="text-center">
        <a href="{{url('/userLogin')}}">Or sign in as a different user</a>
    </div>
    <!-- /.login-box-body -->
</div>
@endsection


