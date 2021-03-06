@extends('layouts.frontEndMaster')
@section('title')
    Gallery
@endsection

@section('main_container')
    <!--<link rel="stylesheet" type="text/css" href="/assets/widgets/owlcarousel/owlcarousel.css">-->
    <div class="hero-box hero-box-smaller full-bg-5 font-inverse" data-top-bottom="background-position: 50% 0px;" data-bottom-top="background-position: 50% -600px;">
        <div class="container">
            <h1 class="hero-heading wow fadeInDown" data-wow-duration="0.6s">Gallery</h1>
            <p class="hero-text wow bounceInUp" data-wow-duration="0.9s" data-wow-delay="0.2s">Our gallery and so and so</p>
        </div>
        <div class="hero-overlay bg-black"></div>
    </div>

    <!-- Mixitup -->

    <script type="text/javascript" src="{{asset('/frontend/assets/widgets/mixitup/mixitup.js')}}"></script>
    <script type="text/javascript" src="{{asset('/frontend/assets/widgets/mixitup/images-loaded.js')}}"></script>
    <script type="text/javascript" src="{{asset('/frontend/assets/widgets/mixitup/isotope.js')}}"></script>
    <script type="text/javascript" src="{{asset('/frontend/assets/widgets/mixitup/portfolio-demo.js')}}"></script>

    <div class="portfolio-controls portfolio-nav-alt bg-blue clearfix controls">
        <div class="container text-center">
            <ul class="float-none">
                <li class="filter" data-filter="all">View all</li>
                <li class="filter" data-filter="hover_1">Illustrations</li>
                <li class="filter" data-filter="hover_2">Food &amp; Drink</li>
                <li class="filter" data-filter="hover_3">Mobile applications</li>
                <li class="filter" data-filter="hover_4">Gadgets &amp; Effects</li>
            </ul>
        </div>
    </div>
    <div class="container">
        <ul id="portfolio-grid" class="reset-ul">

            <li class="col-md-4 col-sm-6 mix hover_1" data-cat="1">
                <div class="thumbnail-box">
                    <a class="thumb-link" href="#" title=""></a>
                    <div class="thumb-content">
                        <div class="center-vertical">
                            <div class="center-content">
                                <h3 class="thumb-heading animated bounceIn">
                                    Railroad bridge
                                    <small>12 March 2015</small>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="thumb-overlay bg-primary"></div>
                    <img src="{{asset('/frontend/assets/image-resources/stock-images/img-1.jpg')}}" alt="" />
                </div>
            </li>
            <li class="col-md-4 col-sm-6 mix hover_1" data-cat="1">
                <div class="thumbnail-box">
                    <a class="thumb-link" href="#" title=""></a>
                    <div class="thumb-content">
                        <div class="center-vertical">
                            <div class="center-content">
                                <h3 class="thumb-heading animated rollIn">
                                    Beautiful garden
                                    <small>12 March 2015</small>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="thumb-overlay bg-black"></div>
                    <img src="{{asset('/frontend/assets/image-resources/stock-images/img-2.jpg')}}" alt="" />
                </div>
            </li>
            <li class="col-md-4 col-sm-6 mix hover_1" data-cat="1">
                <div class="thumbnail-box">
                    <a class="thumb-link" href="#" title=""></a>
                    <div class="thumb-content">
                        <div class="center-vertical">
                            <div class="center-content">
                                <h3 class="thumb-heading animated fadeInDown">
                                    Sunrays flowers
                                    <small>12 March 2015</small>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="thumb-overlay bg-primary"></div>
                    <img src="{{asset('/frontend/assets/image-resources/stock-images/img-3.jpg')}}" alt="" />
                </div>
            </li>

            <li class="col-md-4 col-sm-6 mix hover_2" data-cat="2">
                <div class="thumbnail-box">
                    <div class="thumb-content">
                        <div class="center-vertical">
                            <div class="center-content">
                                <div class="thumb-btn animated rotateIn">
                                    <a href="#" class="btn btn-lg btn-round btn-primary" title=""><i class="glyph-icon icon-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="thumb-overlay bg-black"></div>
                    <img src="{{asset('/frontend/assets/image-resources/stock-images/img-4.jpg')}}" alt="" />
                </div>
            </li>
            <li class="col-md-4 col-sm-6 mix hover_2" data-cat="2">
                <div class="thumbnail-box">
                    <div class="thumb-content">
                        <div class="center-vertical">
                            <div class="center-content">
                                <div class="thumb-btn animated bounceIn">
                                    <a href="#" class="btn btn-xlg btn-round btn-primary" title=""><i class="glyph-icon icon-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="thumb-overlay bg-blue-alt"></div>
                    <img src="{{asset('/frontend/assets/image-resources/stock-images/img-5.jpg')}}" alt="" />
                </div>
            </li>
            <li class="col-md-4 col-sm-6 mix hover_2" data-cat="2">
                <div class="thumbnail-box">
                    <a class="thumb-link" href="#" title=""></a>
                    <div class="thumb-content">
                        <div class="center-vertical">
                            <div class="center-content">
                                <i class="icon-helper icon-center animated zoomInUp font-white glyph-icon icon-linecons-music"></i>
                            </div>
                        </div>
                        <i class="icon-helper icon-br animated bounceInDown bg-danger glyph-icon icon-plus"></i>
                    </div>
                    <div class="thumb-overlay bg-primary"></div>
                    <img src="{{asset('/frontend/assets/image-resources/stock-images/img-6.jpg')}}" alt="" />
                </div>
            </li>

            <li class="col-md-4 col-sm-6 mix hover_3" data-cat="3">
                <div class="thumbnail-box thumbnail-box-inverse">
                    <a class="thumb-link" href="#" title=""></a>
                    <div class="thumb-content">
                        <div class="center-vertical">
                            <div class="center-content">
                                <h3 class="thumb-heading animated bounceIn">
                                    Cookie monsters
                                    <small>12 March 2015</small>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="thumb-overlay bg-black"></div>
                    <img src="{{asset('/frontend/assets/image-resources/stock-images/img-7.jpg')}}" alt="" />
                </div>
            </li>
            <li class="col-md-4 col-sm-6 mix hover_3" data-cat="3">
                <div class="thumbnail-box thumbnail-box-inverse">
                    <a class="thumb-link" href="#" title=""></a>
                    <div class="thumb-content">
                        <div class="center-vertical">
                            <div class="center-content">
                                <i class="icon-helper icon-center animated zoomInUp font-white glyph-icon icon-linecons-music"></i>
                            </div>
                        </div>
                    </div>
                    <div class="thumb-overlay bg-primary"></div>
                    <img src="{{asset('/frontend/assets/image-resources/stock-images/img-8.jpg')}}" alt="" />
                </div>
            </li>
            <li class="col-md-4 col-sm-6 mix hover_3" data-cat="3">
                <div class="thumbnail-box thumbnail-box-inverse">
                    <a class="thumb-link" href="#" title=""></a>
                    <div class="thumb-content">
                        <div class="center-vertical">
                            <div class="center-content">
                                <h3 class="thumb-heading animated rollIn">
                                    Tables at work
                                    <small>12 March 2015</small>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="thumb-overlay bg-orange"></div>
                    <img src="{{asset('/frontend/assets/image-resources/stock-images/img-9.jpg')}}" alt="" />
                </div>
            </li>
            <li class="col-md-4 col-sm-6 mix hover_4" data-cat="4">
                <div class="thumbnail-box-wrapper">
                    <div class="thumbnail-box">
                        <a class="thumb-link" href="#" title=""></a>
                        <div class="thumb-content">
                            <div class="center-vertical">
                                <div class="center-content">
                                    <i class="icon-helper icon-center animated zoomInUp font-white glyph-icon icon-linecons-camera"></i>
                                </div>
                            </div>
                        </div>
                        <div class="thumb-overlay bg-black"></div>
                        <img src="{{asset('/frontend/assets/image-resources/stock-images/img-10.jpg')}}" alt="" />
                    </div>
                    <div class="thumb-pane">
                        <h3 class="thumb-heading animated rollIn">
                            <a href="#" title="">
                                Working in the morning
                            </a>
                            <small>12 March 2015</small>
                        </h3>
                    </div>
                </div>
            </li>
            <li class="col-md-4 col-sm-6 mix hover_4" data-cat="4">
                <div class="thumbnail-box-wrapper">
                    <div class="thumbnail-box">
                        <a class="thumb-link" href="#" title=""></a>
                        <div class="thumb-content">
                            <div class="center-vertical">
                                <div class="center-content">
                                    <i class="icon-helper icon-center animated zoomInUp font-white glyph-icon icon-linecons-camera"></i>
                                </div>
                            </div>
                        </div>
                        <div class="thumb-overlay bg-black"></div>
                        <img src="{{asset('/frontend/assets/image-resources/stock-images/img-11.jpg')}}" alt="" />
                    </div>
                    <div class="thumb-pane">
                        <h3 class="thumb-heading animated rollIn">
                            <a href="#" title="">
                                Working in the morning
                            </a>
                            <small>12 March 2015</small>
                        </h3>
                    </div>
                </div>
            </li>
            <li class="col-md-4 col-sm-6 mix hover_4" data-cat="4">
                <div class="thumbnail-box-wrapper">
                    <div class="thumbnail-box">
                        <a class="thumb-link" href="#" title=""></a>
                        <div class="thumb-content">
                            <div class="center-vertical">
                                <div class="center-content">
                                    <i class="icon-helper icon-center animated zoomInUp font-white glyph-icon icon-linecons-camera"></i>
                                </div>
                            </div>
                        </div>
                        <div class="thumb-overlay bg-black"></div>
                        <img src="{{asset('/frontend/assets/image-resources/stock-images/img-12.jpg')}}" alt="" />
                    </div>
                    <div class="thumb-pane">
                        <h3 class="thumb-heading animated rollIn">
                            <a href="#" title="">
                                Working in the morning
                            </a>
                            <small>12 March 2015</small>
                        </h3>
                    </div>
                </div>
            </li>
        </ul>
    </div>

    <div class="divider"></div>

    <div class="text-center">
        <ul class="pagination pagination-lg">
            <li><a href="#">«</a></li>
            <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">»</a></li>
        </ul>
    </div>


@endsection