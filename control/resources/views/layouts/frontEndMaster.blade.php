<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <style>
            /* Loading Spinner */
            .spinner{margin:0;width:70px;height:18px;margin:-35px 0 0 -9px;position:absolute;top:50%;left:50%;text-align:center}.spinner > div{width:18px;height:18px;background-color:#333;border-radius:100%;display:inline-block;-webkit-animation:bouncedelay 1.4s infinite ease-in-out;animation:bouncedelay 1.4s infinite ease-in-out;-webkit-animation-fill-mode:both;animation-fill-mode:both}.spinner .bounce1{-webkit-animation-delay:-.32s;animation-delay:-.32s}.spinner .bounce2{-webkit-animation-delay:-.16s;animation-delay:-.16s}@-webkit-keyframes bouncedelay{0%,80%,100%{-webkit-transform:scale(0.0)}40%{-webkit-transform:scale(1.0)}}@keyframes bouncedelay{0%,80%,100%{transform:scale(0.0);-webkit-transform:scale(0.0)}40%{transform:scale(1.0);-webkit-transform:scale(1.0)}}
        </style>
        <meta charset="UTF-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <title>@yield('title')</title>

        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('/frontend/assets/images/icons/apple-touch-icon-144-precomposed.png')}}">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('/frontend/assets/images/icons/apple-touch-icon-144-precomposed.png')}}">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('/frontend/assets/images/icons/apple-touch-icon-72-precomposed.png')}}">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('/frontend/assets/images/icons/apple-touch-icon-57-precomposed.png')}}">
        <link rel="shortcut icon" sizes="144x144" href="{{asset('/frontend/assets/images/icons/favicon.png')}}">



        <link rel="stylesheet" type="text/css" href="{{asset('/frontend/assets-minified/frontend-all-demo.css')}}">

        <!-- JS Core -->

        <script type="text/javascript" src="{{asset('/frontend/assets-minified/js-core.js')}}"></script>

        <script type="text/javascript">
            $(window).load(function(){
                setTimeout(function() {
                    $('#loading').fadeOut( 400, "linear" );
                }, 300);
            });
        </script>

        @yield('styles')

    <body>

        <div id="loading">
            <div class="spinner">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>

        @include('includes.frontendTopbar')

        @include('includes.frontendMenubar')

        @yield('main_container')


        <!-- JS Demo -->
        <script src="{{ asset("/frontend/assets-minified/frontend-all-demo.js") }}"></script>


        @yield('scripts')
        @include('includes.frontendFooter')
    </body>
</html>