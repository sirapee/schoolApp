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
        <ul id="menu">
            <li>
                <a href="#">
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
                        <a href="{{route('member.show',['id' => Sentinel::getUser()->id])}}">
                            <i class="fa fa-money"></i>
                            <span class="link-title">&nbsp;View Budgets</span>
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
                </ul>
            </li>
            <li>
                <a href="{{route('member.image-index')}}">
                    <i class="fa fa-picture-o"></i>
                    <span class="link-title menu_hide"> Gallery</span>
                </a>
            </li>
        </ul>
        <!-- /#menu -->
    </div>
</div>