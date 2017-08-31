@extends('layouts.frontEndMaster')
@section('title')
    About
@endsection

@section('stylesheets')
<style>
    ul{
        margin: 0;
        padding: 0;
        list-style: none;
        float: left;;
    }
    li{

    }
</style>
@endsection

@section('main_container')
    <!--<link rel="stylesheet" type="text/css" href="/assets/widgets/owlcarousel/owlcarousel.css">-->
    <script type="text/javascript" src="{{asset('/frontend/assets/widgets/owlcarousel/owlcarousel.js')}}"></script>
    <script type="text/javascript" src="{{asset('/frontend/assets/widgets/owlcarousel/owlcarousel-demo.js')}}"></script>
    <div class="hero-box hero-box-smaller full-bg-5 font-inverse" data-top-bottom="background-position: 50% 0px;" data-bottom-top="background-position: 50% -600px;">
        <div class="container">
            <h1 class="hero-heading wow fadeInDown" data-wow-duration="0.6s">About Us</h1>
            <p class="hero-text wow bounceInUp" data-wow-duration="0.9s" data-wow-delay="0.2s">Caring Heart is a Unit under the Ministry Arm of Daystar Christian Centre. 
We are committed to offering Christ centered hope while caring for both the physical and emotional needs of the elderly, indisposed, orphans, children with special needs and the less privileged within the society.
.</p>
        </div>
        <div class="hero-overlay bg-black"></div>
    </div>

    <div class="container">
        <h3 class="p-title">
            <span>Vision, Mission and Core Values</span>
        </h3>

        <div class="row">
            <div class="col-md-6">

                <div class="testimonial-box testimonial-box-alt">
                    <div class="testimonial-content bg-black">
                        <div class="testimonial-arrow border-black"></div>
                        <i class="glyph-icon icon-quote-left"></i>
                        <p>Vision: To Raise Men and Women Who Will Be Role Models In The Society.</p>
                    </div>
                    
                </div>

            </div>
            <div class="col-md-6">

                <div class="testimonial-box testimonial-box-alt">
                    <div class="testimonial-content radius-all-4 bg-green">
                        <div class="testimonial-arrow border-green arrow-rounded"></div>
                        <i class="glyph-icon icon-quote-left"></i>
                        <p>Mission: To Empower You and I To Discover, Develop, Release and Maximize Our Potentials In God.</p>
                    </div>
                    
                </div>

            </div>

            <div class="col-md-6">

                <div class="testimonial-box testimonial-box-alt">
                    <div class="testimonial-content radius-all-8 bg-blue">
                        <div class="testimonial-arrow border-blue arrow-rounded"></div>
                        <i class="glyph-icon icon-quote-left"></i>
                        <p>
Core Values: I.C.A.R.E :: I-Integrity, C-Care, A-Accountability, R-Righteousness, E-Excellence</p>
                    </div>
                   
                </div>

            </div>
            <div class="col-md-6">

                <div class="testimonial-box testimonial-box-alt">
                    <div class="testimonial-content radius-all-4 bg-purple">
                        <div class="testimonial-arrow"></div>
                        <i class="glyph-icon icon-quote-left"></i>
                        <p>Mission Statement:  
Taking love beyond just giving, to offering Christ centered hope and care.
“By your acts you shall be known” Therefore, we the members of Caring Heart commit
ourselves to lend a hand to reach out with compassion to those in need; to show practical care
for short/long term needs and to meet the physical and emotional needs through acts of Service and Care giving    
</p>
                    </div>
                </div>

            </div>


        </div>


        <h3 class="p-title">
            <span>Our Rules And Regulation:</span>
        </h3>

        <div class="testimonial-box-big">
            <div class="testimonial-content">
                <i class="glyph-icon icon-quote-left"></i>
                <i class="glyph-icon icon-quote-right"></i>
                <p>Every member is </p>
                <ul style="list-style:none; text-align: left; font-size: 16px">
                    <li>encouraged to be involved in spiritual growth.,</li>
                    <li>expected to attend ALL meeting, including vigils and other activities as
                        announced by unit leadership,</li>
                    <li>expected to pay monthly dues on time and regularly, and also
                        contributions for outreaches.</li>
                    <li>Every Member should be actively engaged in personal, corporate and spiritual exercises to
                        ensure constant improvement and excellent delivery of services /assignments.</li>
                </ul>

            </div>
        </div>

        <h3 class="p-title">
            <span>TIME KEEPING AND ATTENDANCE:</span>
        </h3>

        <div class="testimonial-box-big">
            <div class="testimonial-content">
                <i class="glyph-icon icon-quote-left"></i>
                <i class="glyph-icon icon-quote-right"></i>
                <p>All members </p>
                <ul style="list-style:none; text-align: left; font-size: 16px">
                    <li> are expected to be PUNCTUAL at all meetings,</li>
                    <li>should sign the attendance register. Failure to do so will result in being
                        marked absent for the day.</li>
                    <li>It is mandatory for the unit to pray before and after each meeting and outreach.</li>
                    <li>It is the responsibility of every member to inform the leadership whenever they would
                        be late or absent. If you are running late, please endeavour to call and inform the leader
                        latest 2 days before scheduled meeting time.</li>
                </ul>

            </div>
        </div>

        <h3 class="p-title">
            <span>LATENESS AND ABSENTEEISM:</span>
        </h3>

        <div class="testimonial-box-big">
            <div class="testimonial-content">
                <i class="glyph-icon icon-quote-left"></i>
                <i class="glyph-icon icon-quote-right"></i>
                <p>Lateness is NOT tolerated. Consistent lateness would be seriously looked into by
                    leadership and appropriate disciplinary measures taken. Lateness attracts a fee
                    (#500.00)</p>
                <ul style="list-style:none; text-align: left; font-size: 16px">
                    <li> Any member planning to be away for 2 weeks or more should inform the leadership well
                        in advance and report back at the agreed time after return.</li>
                    <li>Absence of two (2) months or more without notice requires re-application to re-join the
                        unit. Re-application would not be automatic but under strict scrutiny.</li>
                    <li>Perpetual lateness, absenteeism or irregular membership without sound reason and
                        appropriate permission is NOT tolerated.</li>
                </ul>

            </div>
        </div>

        <h3 class="p-title">
            <span>OPERATIONS (COMMUNICATION AND CONDUCT)</span>
        </h3>

        <div class="testimonial-box-big">
            <div class="testimonial-content">
                <i class="glyph-icon icon-quote-left"></i>
                <i class="glyph-icon icon-quote-right"></i>
                <p>Mutual respect is encouraged among members irrespective of age and status.</p>
                <ul style="list-style:none; text-align: left; font-size: 16px">
                    <li> All complaints or suggestions should be flagged to the leadership in an appropriate
                        manner (i.e. written or verbal).</li>
                    <li>All mobile phones must be turned off or on silent/vibration mode during meetings,
                        except on permission to do otherwise. Side talking and movements should be kept at
                        barest minimum. Any member who needs to leave meetings early, except in an
                        emergency, requires permission prior to the start of the meeting.</li>
                    <li>Members should maintain a high moral standard and conduct themselves in a manner
                        worthy of the Gospel of Christ.</li>
                </ul>

            </div>
        </div>

        <h3 class="p-title">
            <span>NEW MEMBERS</span>
        </h3>

        <div class="testimonial-box-big">
            <div class="testimonial-content">
                <i class="glyph-icon icon-quote-left"></i>
                <i class="glyph-icon icon-quote-right"></i>
                <p>New members should be graduate of 200 level Daystar Academy or should complete
                    classes and training within 3 months of joining the unit.</p>
                <ul style="list-style:none; text-align: left; font-size: 16px">
                    <li>Membership is subject to satisfactory completion of a two-month probation period (four
                        meetings).</li>
                </ul>

            </div>
        </div>



    </div>

    <h3 class="p-title">
        <span>Our Excos</span>
    </h3>
    <div class="owl-carousel-1 col-md-11 center-margin slider-wrapper carousel-wrapper carousel-wrapper-alt carousel-container">

        <div>
            <div class="testimonial-box">
                <div class="popover top mrg10A">
                    <div class="arrow float-right"></div>
                    <div class="popover-content">
                        <i class="glyph-icon icon-quote-left"></i>
                        <p>If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages. The regular than the existing European languages.</p>
                    </div>
                </div>
                <div class="testimonial-author-wrapper">
                    <img class="img-circle float-right" src="../../assets/image-resources/people/testimonial1.jpg" alt="" />
                    <div class="testimonial-author text-right">
                        <b>John Wayne</b>
                        <span>Manager, ACME Inc.</span>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="testimonial-box">
                <div class="popover top mrg10A">
                    <div class="arrow float-right"></div>
                    <div class="popover-content">
                        <i class="glyph-icon icon-quote-left"></i>
                        <p>If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages. The regular than the existing European languages.</p>
                    </div>
                </div>
                <div class="testimonial-author-wrapper">
                    <img class="img-circle float-right" src="../../assets/image-resources/people/testimonial2.jpg" alt="" />
                    <div class="testimonial-author text-right">
                        <b>John Wayne</b>
                        <span>Manager, ACME Inc.</span>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="testimonial-box">
                <div class="popover top mrg10A">
                    <div class="arrow float-right"></div>
                    <div class="popover-content">
                        <i class="glyph-icon icon-quote-left"></i>
                        <p>If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages. The regular than the existing European languages.</p>
                    </div>
                </div>
                <div class="testimonial-author-wrapper">
                    <img class="img-rounded float-right" src="../../assets/image-resources/people/testimonial3.jpg" alt="" />
                    <div class="testimonial-author text-right">
                        <b>John Wayne</b>
                        <span>Manager, ACME Inc.</span>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="testimonial-box">
                <div class="popover top mrg10A">
                    <div class="arrow float-right"></div>
                    <div class="popover-content">
                        <i class="glyph-icon icon-quote-left"></i>
                        <p>If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages. The regular than the existing European languages.</p>
                    </div>
                </div>
                <div class="testimonial-author-wrapper">
                    <img class="img-rounded float-right" src="../../assets/image-resources/people/testimonial4.jpg" alt="" />
                    <div class="testimonial-author text-right">
                        <b>John Wayne</b>
                        <span>Manager, ACME Inc.</span>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="testimonial-box">
                <div class="popover top mrg10A">
                    <div class="arrow float-right"></div>
                    <div class="popover-content">
                        <i class="glyph-icon icon-quote-left"></i>
                        <p>If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages. The regular than the existing European languages.</p>
                    </div>
                </div>
                <div class="testimonial-author-wrapper">
                    <img class="img-rounded float-right" src="../../assets/image-resources/people/testimonial5.jpg" alt="" />
                    <div class="testimonial-author text-right">
                        <b>John Wayne</b>
                        <span>Manager, ACME Inc.</span>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="testimonial-box">
                <div class="popover top mrg10A">
                    <div class="arrow float-right"></div>
                    <div class="popover-content">
                        <i class="glyph-icon icon-quote-left"></i>
                        <p>If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages. The regular than the existing European languages.</p>
                    </div>
                </div>
                <div class="testimonial-author-wrapper">
                    <img class="img-rounded float-right" src="../../assets/image-resources/people/testimonial6.jpg" alt="" />
                    <div class="testimonial-author text-right">
                        <b>John Wayne</b>
                        <span>Manager, ACME Inc.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection