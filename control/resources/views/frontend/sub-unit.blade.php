@extends('layouts.frontEndMaster')
@section('title')
    Sub Units
@endsection

@section('stylesheets')

@endsection

@section('main_container')
    <!--<link rel="stylesheet" type="text/css" href="/assets/widgets/owlcarousel/owlcarousel.css">-->
    <script type="text/javascript" src="{{asset('/frontend/assets/widgets/owlcarousel/owlcarousel.js')}}"></script>
    <script type="text/javascript" src="{{asset('/frontend/assets/widgets/owlcarousel/owlcarousel-demo.js')}}"></script>
    <div class="hero-box hero-box-smaller full-bg-5 font-inverse" data-top-bottom="background-position: 50% 0px;" data-bottom-top="background-position: 50% -600px;">
        <div class="container">
            <h1 class="hero-heading wow fadeInDown" data-wow-duration="0.6s">CH SubUnits</h1>
            <p class="hero-text wow bounceInUp" data-wow-duration="0.9s" data-wow-delay="0.2s">We seek to provide for the less privileged.</p>
        </div>
        <div class="hero-overlay bg-black"></div>
    </div>

    <div class="container">
        <h3 class="p-title">
            <span>Our Sub-Units</span>
        </h3>
        <div class="row">
            @foreach($sub_units as $sub_unit)
            <div class="col-md-6">
                <div class="testimonial-author-wrapper">
                    <div class="testimonial-author text-right">
                        <b>{{$sub_unit->name}}</b>
                        <br>
                    </div>
                </div>
                <div class="testimonial-box">
                    <div class="popover top">
                        <div class="arrow float-right"></div>
                        <div class="popover-content">
                            <i class="glyph-icon icon-quote-left"></i>
                            <p>{{$sub_unit->about}}</p>
                        </div>
                    </div>
                    <div class="testimonial-author-wrapper">
                        <img class="img-circle float-right" src="{{asset('uploads/'.$sub_unit->user->profile_image)}}" alt="" />
                        <div class="testimonial-author text-right">
                            <b>{{$sub_unit->unit_head}}</b>
                            <span>{{$sub_unit->user->designation}}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection