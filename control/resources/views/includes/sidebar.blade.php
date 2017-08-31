<div id="left">
    <div class="menu_scroll">
        <div class="left_media">
            <div class="media user-media">
                <div class="user-media-toggleHover">
                    <span class="fa fa-user"></span>
                </div>
                <div class="user-wrapper">
                    <a class="user-link" href="#">
                        <img class="media-object img-thumbnail user-img rounded-circle admin_img3" alt="User Picture"
                             src="{{asset('uploads/'.Sentinel::getUser()->profile_image)}}">
                        <p class="user-info menu_hide">Welcome {{Sentinel::getUser()->first_name}}</p>
                    </a>
                </div>
            </div>
            <hr/>
        </div>

        @if(Sentinel::getUser()->roles()->first()->slug  == 'admin')
        <ul id="menu">
            <li>
                <a href="{{route('admin.index')}}">
                    <i class="fa fa-home"></i>
                    <span class="link-title menu_hide">&nbsp;Dashboard</span>
                </a>
            </li>
            <li class="dropdown_menu">
                <a href="javascript:;">
                    <i class="fa fa-user-plus"></i>
                    <span class="link-title menu_hide">&nbsp; Member Management</span>
                    <span class="fa arrow menu_hide"></span>
                </a>
                <ul>
                    <li>
                        <a href="{{route('members.index')}}">
                            <i class="fa fa-user-md"></i>
                            &nbsp; All Members
                        </a>
                    </li>
                    <li>
                        <a href="{{route('members.deleted')}}">
                            <i class="fa fa-user"></i>
                            <span class="link-title">&nbsp;Deleted Members</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="dropdown_menu">
                <a href="javascript:;">
                    <i class="fa fa-newspaper-o"></i>
                    <span class="link-title menu_hide">&nbsp; Group Activities</span>
                    <span class="fa arrow menu_hide"></span>
                </a>
                <ul>
                    <li class="dropdown_menu">
                        <a href="javascript:;">
                            <i class="fa fa-pencil-square-o"></i>
                            <span class="link-title menu_hide">&nbsp; Sub Units Management</span>
                            <span class="fa arrow menu_hide"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{route('sub-units.index')}}">
                                    <i class="fa fa-address-book"></i>
                                    &nbsp; All Sub Units
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown_menu">
                        <a href="javascript:;">
                            <i class="fa fa-newspaper-o"></i>
                            <span class="link-title menu_hide">&nbsp; News Management</span>
                            <span class="fa arrow menu_hide"></span>
                        </a>
                         <ul>
                        <li>
                            <a href="{{route('news.index')}}">
                                <i class="fa fa-hacker-news"></i>
                                &nbsp; All News
                            </a>
                        </li>
                        <li>
                            <a href="{{route('news.deleted')}}">
                                <i class="fa fa-hacker-news"></i>
                                <span class="link-title">&nbsp;Deleted News</span>
                            </a>
                        </li>
                         </ul>
                    </li>
                    <li class="dropdown_menu">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span class="link-title menu_hide">&nbsp; Minutes Management</span>
                            <span class="fa arrow menu_hide"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{route('minutes.index')}}">
                                    <i class="fa fa-address-book"></i>
                                    &nbsp; All Minutes
                                </a>
                            </li>
                            <li>
                                <a href="{{route('minutes.deleted')}}">
                                    <i class="fa fa-address-book"></i>
                                    <span class="link-title">&nbsp;Deleted Minutes</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown_menu">
                        <a href="javascript:;">
                            <i class="fa fa-pagelines"></i>
                            <span class="link-title menu_hide">&nbsp; Other Document</span>
                            <span class="fa arrow menu_hide"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{route('other.index')}}">
                                    <i class="fa fa-address-book"></i>
                                    &nbsp; All Other Documents
                                </a>
                            </li>
                            <li>
                                <a href="{{route('other.deleted')}}">
                                    <i class="fa fa-address-book"></i>
                                    <span class="link-title">&nbsp;Deleted Other Documents</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </li>
            <li class="dropdown_menu">
                <a href="javascript:;">
                    <i class="fa fa-newspaper-o"></i>
                    <span class="link-title menu_hide">&nbsp; Finance </span>
                    <span class="fa arrow fa-money"></span>
                </a>
                <ul>
                    <li class="dropdown_menu">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span class="link-title menu_hide">&nbsp; Budget Management</span>
                            <span class="fa arrow icon-linecons-money"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{route('budget.index')}}">
                                    <i class="fa fa-address-book"></i>
                                    &nbsp; All Budgets
                                </a>
                            </li>
                            <li>
                                <a href="{{route('budget.deleted')}}">
                                    <i class="fa fa-address-book"></i>
                                    <span class="link-title">&nbsp;Deleted Budget</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown_menu">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span class="link-title menu_hide">&nbsp; Dues Management</span>
                            <span class="fa arrow icon-linecons-money"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{route('dues.index')}}">
                                    <i class="fa fa-address-book"></i>
                                    &nbsp; All Paid Dues
                                </a>
                            </li>
                            <li>
                                <a href="{{route('dues.outstanding')}}">
                                    <i class="fa fa-address-book"></i>
                                    <span class="link-title">&nbsp;Outstanding Payments</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                     <li>
                        <a href="{{route('pledges.index')}}">
                            <i class="fa fa-address-book"></i>
                            &nbsp; All Pledges/Payments
                        </a>
                    </li>

                </ul>
            </li>
            <li class="dropdown_menu">
                <a href="javascript:;">
                    <i class="fa fa-bell"></i>
                    <span class="link-title menu_hide">&nbsp; Notifications </span>
                    <span class="fa arrow menu_hide "></span>
                </a>
                <ul>
                    <li class="dropdown_menu">
                        <a href="javascript:;">
                            <i class="fa fa-mail-forward"></i>
                            <span class="link-title menu_hide">&nbsp; Email Notifications</span>
                            <span class="fa arrow menu_hide"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{route('notifications.index')}}">
                                    <i class=" fa fa-reply-all"></i>
                                    &nbsp; All Notifications
                                </a>
                            </li>
                            <li>
                                <a href="{{route('notifications.create')}}">
                                    <i class=" fa fa-share"></i>
                                    <span class="link-title">&nbsp;Invites/Info</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('budget.deleted')}}">
                                    <i class="fa fa-mail-reply-all"></i>
                                    <span class="link-title">&nbsp;Payment Notice</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('budget.deleted')}}">
                                    <i class="fa fa-mail-reply-all"></i>
                                    <span class="link-title">&nbsp;Birthdays/Anniversaries</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="dropdown_menu">
                <a href="javascript:;">
                    <i class="fa fa-picture-o"></i>
                    <span class="link-title menu_hide">&nbsp;Gallery Management</span>
                    <span class="fa arrow menu_hide"></span>
                </a>
                <ul>
                    <li>
                        <a href="{{route('images.index')}}">
                            <i class="fa fa-picture-o"></i>
                            &nbsp; All Images
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="fa fa-image"></i>
                            <span class="link-title">&nbsp;Deleted Images</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        @elseif(Sentinel::getUser()->roles()->first()->slug  == 'member')
            <ul id="menu">
                <li>
                    <a href="{{route('member.index')}}">
                        <i class="fa fa-home"></i>
                        <span class="link-title menu_hide">&nbsp;Dashboard</span>
                    </a>
                </li>
                <li class="dropdown_menu">
                    <a href="javascript:;">
                        <i class="fa fa-user"></i>
                        <span class="link-title menu_hide">Profile Management</span>
                        <span class="fa arrow menu_hide"></span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('member.show',['id' => Sentinel::getUser()->id])}}">
                                <i class="fa fa-user-o"></i>
                                <span class="link-title">&nbsp;View Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('member.edit',['id' => Sentinel::getUser()->id])}}">
                                <i class="fa fa-user-circle"></i>
                                <span class="link-title">&nbsp;Edit Profile</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown_menu">
                    <a href="javascript:;">
                        <i class="fa fa-th-large"></i>
                        <span class="link-title menu_hide">Group Info</span>
                        <span class="fa arrow menu_hide"></span>
                    </a>
                    <ul>
                        <li>
                            <a href="">
                                <i class="fa fa-money"></i>
                                <span class="link-title">View Outstanding Dues</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('minutes.index')}}">
                                <i class="fa fa-meetup"></i>
                                <span class="link-title">&nbsp;View MOM</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('news.index')}}">
                                <i class="fa fa-meetup"></i>
                                <span class="link-title">&nbsp;View News</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('budget.index')}}">
                                <i class="fa fa-meetup"></i>
                                <span class="link-title">&nbsp;View Budget/Expense</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('other.index')}}">
                                <i class="fa fa-meetup"></i>
                                <span class="link-title">&nbsp;View Other Documents</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('sub-units.index')}}">
                                <i class="fa fa-meetup"></i>
                                <span class="link-title">&nbsp;View Sub Units</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('images.index')}}">
                        <i class="fa fa-picture-o"></i>
                        <span class="link-title menu_hide"> Gallery</span>
                    </a>
                </li>
            </ul>
        @endif<!-- /#menu -->
    </div>
</div>