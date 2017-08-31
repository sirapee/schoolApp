<div id="page-wrapper"><div class="top-bar bg-topbar">
        <div class="container">
            <div class="float-left">
                <a href="#" class="btn btn-sm bg-facebook tooltip-button" data-placement="bottom" title="Follow us on Facebook">
                    <i class="glyph-icon icon-facebook"></i>
                </a>
                <a href="#" class="btn btn-sm bg-google tooltip-button" data-placement="bottom" title="Follow us on Google+">
                    <i class="glyph-icon icon-google-plus"></i>
                </a>
                <a href="#" class="btn btn-sm bg-twitter tooltip-button" data-placement="bottom" title="Follow us on Twitter">
                    <i class="glyph-icon icon-twitter"></i>
                </a>

                <a href="#" class="btn btn-top btn-sm" title="Give us a call">
                    <i class="glyph-icon icon-phone"></i>
                    +1-541-754-3010
                </a>
            </div>
            <div class="float-right user-account-btn dropdown">
                @if (Sentinel::check())
                <a href="#" title="My Account" class="user-profile clearfix" data-toggle="dropdown" aria-expanded="false">
                    <img width="28" src="{{asset('uploads/'.Sentinel::getUser()->profile_image)}}" alt="Profile image">
                    <span>{{Sentinel::getUser()->first_name}}</span>
                    <i class="glyph-icon icon-angle-down"></i>
                </a>
                <div class="dropdown-menu pad0B float-right">
                    <div class="box-sm">
                        <div class="login-box clearfix">
                            <div class="user-img">
                                <a href="#" title="" class="change-img">Change photo</a>
                                <img src="{{asset('uploads/'.Sentinel::getUser()->profile_image)}}"  alt="">
                            </div>
                            <div class="user-info">
                        <span>
                            {{Sentinel::getUser()->first_name.' '.  Sentinel::getUser()->last_name}}
                            <i>{{Sentinel::getUser()->designation}}</i>
                        </span>
                                <a href="{{route('member.edit',['id' => Sentinel::getUser()->id])}}" title="">Update profile</a>
                            </div>
                        </div>
                        <div class="divider"></div>
                        @if(Sentinel::getUser()->roles()->first()->slug == 'admin')
                            <ul class="reset-ul mrg5B">
                                <li>
                                    <a href="{{route('admin.index')}}">
                                        Admin View
                                        <i class="glyph-icon float-right icon-caret-right"></i>
                                    </a>
                                </li>
                            </ul>
                            @else
                            <ul class="reset-ul mrg5B">
                                <li>
                                    <a href="{{route('minutes.index')}}">
                                        Minute of Meetings
                                        <i class="glyph-icon float-right icon-caret-right"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('budget.index')}}">
                                        Budget & Expense
                                        <i class="glyph-icon float-right icon-caret-right"></i>
                                    </a>
                                </li>
                            </ul>
                        @endif


                        <div class="pad5A button-pane button-pane-alt text-center">
                            <form method="post" action="{{ url('/userLogout') }}" id="logout-form">
                                {{csrf_field()}}
                                <a href="#" onclick="document.getElementById('logout-form').submit()"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                            </form>
                        </div>
                    </div>
                </div>
                @else
                    <a href="{{url('/userLogin')}}" title="Members Login" class="btn btn-sm float-left btn-alt btn-hover mrg10R btn-default">
                        <span>Login</span>
                        <i class="glyph-icon icon-arrow-right"></i>
                    </a>
                @endif
            </div>
        </div><!-- .container -->
    </div><!-- .top-bar -->
</div>
