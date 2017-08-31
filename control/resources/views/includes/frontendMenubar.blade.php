<div class="main-header bg-header wow fadeInDown">
    <div class="container">
        <a href="{{url('/')}}" class="header-logo" title="Caring Heart"></a><!-- .header-logo -->
        <div class="right-header-btn">
            <div id="mobile-navigation">
                <button id="nav-toggle" class="collapsed" data-toggle="collapse" data-target=".header-nav"><span></span></button>
            </div>
            <div class="search-btn">
                <a href="#" class="popover-button" title="Search" data-placement="bottom" data-id="#popover-search">
                    <i class="glyph-icon icon-search"></i>
                </a>
                <div class="hide" id="popover-search">
                    <div class="pad5A box-md">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search terms here ...">
                            <span class="input-group-btn">
                            <a class="btn btn-primary" href="#">Search</a>
                        </span>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .header-logo -->
        <ul class="header-nav collapse">
            <li><a href="{{url('/home')}}" title="Homepage"><span>Homepage</span></a></li>
            <li><a href="{{url('/about')}}" title="About us"><span>About Us</span></a></li>
        </ul><!-- .header-nav -->
    </div><!-- .container -->
</div><!-- .main-header -->