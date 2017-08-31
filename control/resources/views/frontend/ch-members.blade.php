@extends('layouts.frontEndMaster')
@section('title')
    About
@endsection

@section('stylesheets')

@endsection

@section('main_container')
    <!--<link rel="stylesheet" type="text/css" href="/assets/widgets/owlcarousel/owlcarousel.css">-->
    <script type="text/javascript" src="{{asset('/frontend/assets/widgets/owlcarousel/owlcarousel.js')}}"></script>
    <script type="text/javascript" src="{{asset('/frontend/assets/widgets/owlcarousel/owlcarousel-demo.js')}}"></script>
    <div class="hero-box hero-box-smaller full-bg-5 font-inverse" data-top-bottom="background-position: 50% 0px;" data-bottom-top="background-position: 50% -600px;">
        <div class="container">
            <h1 class="hero-heading wow fadeInDown" data-wow-duration="0.6s">Our Members</h1>
            <p class="hero-text wow bounceInUp" data-wow-duration="0.9s" data-wow-delay="0.2s">We seek to provide for the less privileged.</p>
        </div>
        <div class="hero-overlay bg-black"></div>
    </div>

    <div class="container">
        <h3 class="p-title">
            <span>Ch Members</span>
        </h3>

        <div class="row">
            @foreach($members as $member)
            <div class="col-md-6">
                <div class="testimonial-box testimonial-box-alt">
                    @if($member->id % 6 == 1)
                    <div class="testimonial-content bg-black">
                        <div class="testimonial-arrow border-black"></div>
                        @elseif($member->id % 6 == 2)
                            <div class="testimonial-content radius-all-4 bg-purple">
                                <div class="testimonial-arrow"></div>
                         @elseif($member->id % 6 == 3)
                                <div class="testimonial-content radius-all-2 bg-orange">
                                    <div class="testimonial-arrow border-orange arrow-rounded"></div>
                          @elseif($member->id % 6 == 4)
                                        <div class="testimonial-content bg-primary">
                                            <div class="testimonial-arrow border-primary"></div>
                           @elseif($member->id % 6 == 5)
                                            <div class="testimonial-content radius-all-4 bg-green">
                                                <div class="testimonial-arrow border-green arrow-rounded"></div>
                            @elseif($member->id % 6 == 0)
                                                <div class="testimonial-content radius-all-8 bg-blue">
                                                    <div class="testimonial-arrow border-blue arrow-rounded"></div>
                            @endif

                        <i class="glyph-icon icon-quote-left"></i>
                        <p>{{$member->about}}</p>
                    </div>
                    <div class="testimonial-author-wrapper">
                        <img class="img-circle" src="{{asset('uploads/'.$member->profile_image)}}" alt="" />
                        <div class="testimonial-author">
                            <b>{{$member->first_name .' '.$member->last_name}}</b>
                            <span>{{$member->designation .'  '.$member->department}}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        {{ $members->links() }}

    </div>
@endsection