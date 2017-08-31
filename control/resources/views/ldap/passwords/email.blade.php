@extends('layouts.credentials')
@section('title')
    IFRS
    @endsection
@push('stylesheets')
<!-- Example -->
<!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->
@endpush

@section('main_container')

    <!-- page content -->
    @include('includes.info-box')
    <div class="right_col" role="main">
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    {!! BootForm::open(['url' => url('/resetEmail'), 'method' => 'post']) !!}
                    <h1>Reset Password</h1>

                    {!! BootForm::email('email', 'Email', old('email'), ['placeholder' => 'Email']) !!}

                    {!! BootForm::submit('Send Password Reset Link', ['class' => 'btn btn-default col-md-9']) !!}

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">You have a password ?
                            <a href="{{ url('/userLogin') }}" class="to_register"> Log in </a>
                        </p>

                        <div class="clearfix"></div>
                        <br />
                        <div>
                            <h1><i class="fa fa-paw"></i> Heritage Bank!</h1>
                            <p>©2017 All Rights Reserved.  Privacy and Terms</p>
                        </div>
                    </div>

                    {!! BootForm::close() !!}
                </section>
            </div>
        </div>
    </div>
    <!-- /page content -->


@endsection