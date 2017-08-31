@extends('layouts.frontEndMaster')
@section('title')
    News
@endsection

@section('stylesheets')
    <link type="text/css" rel="stylesheet" href="{{asset('css/components.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('css/custom.css')}}"/>
    <!--End of global styles-->
    <!--Plugin style-->
    <link type="text/css" rel="stylesheet" href="{{asset('vendors/modal/css/component.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('vendors/bootstrap-tagsinput/css/bootstrap-tagsinput.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('vendors/animate/css/animate.min.css')}}"/>
@endsection

@section('main_container')
    <!--<link rel="stylesheet" type="text/css" href="/assets/widgets/owlcarousel/owlcarousel.css">-->
    <div class="hero-box hero-box-smaller full-bg-13 font-inverse" data-top-bottom="background-position: 50% 0px;" data-bottom-top="background-position: 50% -600px;">
        <div class="container">
            <h1 class="hero-heading wow fadeInDown" data-wow-duration="0.6s">News full width</h1>
            <p class="hero-text wow bounceInUp" data-wow-duration="0.9s" data-wow-delay="0.2s">Full width News posts without sidebars</p>
        </div>
        <div class="hero-overlay bg-black"></div>
    </div>

    <!-- Lazyload -->

    <script type="text/javascript" src="{{asset('/frontend/assets/widgets/lazyload/lazyload.js')}}"></script>
    <script type="text/javascript">
        /* Lazyload */
        jQuery.noConflict();
        var $j = jQuery;

        $j(function() {
            $j("img.lazy").lazyload({
                effect: "fadeIn",
                threshold: 100
            });
        });
    </script>

    <!-- PrettyPhoto modals -->

    <!--<link rel="stylesheet" type="text/css" href="../../assets/widgets/pretty-photo/prettyphoto.css">-->
    <script type="text/javascript" src="{{asset('/frontend/assets/widgets/pretty-photo/prettyphoto.js')}}"></script>
    <script type="text/javascript">
        /* PrettyPhoto */

        $(document).ready(function() {
            $(".prettyphoto").prettyPhoto();
        });
    </script>

    <div id="page-content" class="container mrg25T">
        @foreach($news as $new)
            <div class="blog-box row">
                <div class="post-image col-md-4">
                    <a href="{{asset('/frontend/assets/image-resources/stock-images/img-43.jpg')}}" class="prettyphoto" rel="prettyPhoto[pp_gal]" title="Blog post title">
                        <img class="img-responsive lazy img-rounded" src="#" data-original="{{asset('/frontend/assets/image-resources/stock-images/img-43.jpg')}}" alt="" />
                    </a>
                </div>

                <div class="post-content-wrapper col-md-8">
                    <a class="post-title" href="blog-single.html" title="">
                        <h3>{{$new->subject}}</h3>
                    </a>
                    <div class="post-meta">
                    <span>
                        <i class="glyph-icon icon-user"></i>
                        <a href="#" title="">{{$new->created_by}}</a>
                    </span>
                        <span>
                        <i class="glyph-icon icon-clock-o"></i>
                        {{$new->created_at}}
                    </span>
                    </div>
                    <div class="post-content">
                        {{str_limit($new->content, 150)}}
                    </div>
                    <button class="btn btn-sm btn-default adv_cust_mod_btn rotatein"
                            data-toggle="modal" data-target="#modal-rotatein">Read more
                    </button>
                </div>
            </div>
            <div class="modal" tabindex="-1" id="modal-rotatein" role="dialog"
                 aria-labelledby="modalLabelrotate" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-success">
                            <h4 class="modal-title text-white" id="modalLabelrotate">{{$new->subject}}</h4>
                        </div>
                        <div class="modal-body">
                            {{$new->content}}
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="text-center">
            <ul class="pagination pagination-lg">
                {{$news->links()}}
            </ul>
        </div>
    </div>

    <br />
@endsection
@section('scripts')
    <script type="text/javascript" src="{{asset('js/components.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/custom.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/pages/modals.js')}}"></script>
@endsection