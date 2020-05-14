<header class="menu-container">
    <div class="header-menu container">
        <div class="logo">
            <a href="{{ route('welcome.page') }}"><img
                        src="{{ asset('static/assets/img/zima-logo-event-default_white.png') }}" alt="Zima Logo"/></a>
        </div>
        <ul class="menu m-auto">
            <li><a href="{{ route('welcome.page') }}">Home</a></li>
            <li><a href="">Discover Events</a></li>

            <li class="contains-sub-menu">
                <a href="">Help <i class="fa fa-angle-down"></i></a>
                <ul class="menu-dropdown">
                    <li><a href="">How it works</a></li>

                    <li><a href="">FAQs</a></li>

                    <li><a href="">Contact Us</a></li>
                </ul>
            </li>
        </ul>
        <ul class="menu text-right">
            @if (Auth::check())
                <li class="hlbt"><a href="{{ route('user.create.event') }}">Create Event</a></li>
                <li class="contains-sub-menu"><a href="#">My Account <i class="fa fa-angle-down"></i></a>
                    <ul>
                        <li><a href="{{ route('user.dashboard') }}"><i class="fe fe-grid"></i>
                                Dashboard </a></li>
                        <li><a href="{{ route('user.setting') }}"> <i class="fe fe-settings"></i> Account Settings</a>
                        </li>
                        <li><a onclick="event.preventDefault(); document.querySelector('#logout-form').submit();"
                               href="{{ route('logout') }}"><i class="fe fe-log-out"></i> Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">
                                @csrf
                            </form>
                        </li>
                        @else
                            <li class="hlbt"><a href="{{ route('login') }}">Sign In</a></li>
                        @endif
                    </ul>
                </li>
        </ul>

        {{-- <ul class="menu text-right">

            <li class="dropdown zima-profile-user-avatar contains-sub-menu">
                <a href="">
                    <span class="zima-user-avatar-initial text-white rounded-circle">OY</span>
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul>
                    <li><a href="category-products.html#">
                            English</a></li>
                    <li><a href="category-products.html#"> Română</a></li>
                </ul>
            </li>
        </ul> --}}

        <div class="mob-menu">
            <a href="">
                <div class="lines"><span></span><span></span><span></span></div>
            </a>
        </div>
    </div>

    {{-- <div class="mobile-overlay">
        <div class="mobile-menu">
            <div>
                <ul class="menu">
                    <li><a href="">Home</a></li>

                    <li><a href="">Discover Events</a></li>

                    <li class="contains-sub-menu">
                        <a href="">Help <i class="fa fa-angle-down"></i></a>
                        <ul>
                            <li><a href="">How it works</a></li>
                            <li><a href="">FAQs</a></li>
                            <li><a href="">Contact Us</a></li>
                        </ul>
                    </li>

                </ul>
                <ul class="user-links">
                    <li><a href="">Sign In</a></li>
                    <li class="hlbt"><a href="">Create Event</a></li>
                    <li>
                        <a href="" class="show-search">
                            <i class="fas fa-search"></i>
                        </a>
                    </li>

                </ul>
                </li>
                </ul>
            </div>



            <div>
                <div class="container">
                    <div class="hero-search clearfix">
                        <div class="search-form-container">
                            <div class="search-input">
                                <input type="text" placeholder="" />
                                <ul class="options">
                                    <li class="contains-sub-menu">
                                        <a href="">All <i class="fa fa-angle-down"></i></a>
                                        <ul>
                                            <li><a href="">Comedy Shows</a></li>
                                            <li><a href="">Community Events</a></li>
                                            <li><a href="">Classes</a></li>
                                            <li><a href="">Concerts</a></li>
                                            <li><a href="">Theater Events</a></li>
                                            <li><a href="">Parties</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <button>Search</button>
                        </div>
                    </div>
                    <a href="" class="mt-30 d-block close-search"><i class="fa fa-angle-left"></i> Back to
                        menu</a>
                </div>
            </div>
        </div>
    </div> --}}
</header>
