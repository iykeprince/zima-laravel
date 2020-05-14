@include('components.head')
<div id="homepage-banner" class="homepage-banner">
    <header class="menu-container">
        <div class="header-menu container">
            <div class="logo">
                <a href=""><img src="{{ asset('static/assets/img/zima-logo-event-default_white.png') }}"
                                alt="Zima Logo"/></a>
            </div>
            <ul class="menu m-auto">
                <li><a href="{{ route('welcome.page') }}">Home</a></li>
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
            <ul class="menu text-right">
                @if (Auth::check())
                    <li class="hlbt"><a href="{{ route('user.create.event') }}">Create Event</a></li>
                    <li class="contains-sub-menu"><a href="#">My Account <i class="fa fa-angle-down"></i></a>
                        <ul>
                            <li><a href="{{ route('user.dashboard') }}"><i class="fe fe-grid"></i>
                                    Dashboard </a></li>
                            <li><a href="{{ route('user.setting') }}"> <i class="fe fe-settings"></i> Account
                                    Settings</a>
                            </li>
                            <li><a onclick="event.preventDefault(); document.querySelector('#logout-form').submit();"
                                   href="{{ route('logout') }}"><i class="fe fe-log-out"></i> Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="post"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </li>
                            @else
                                <li class="hlbt"><a href="{{ route('login') }}">Sign In</a></li>
                            @endif
                        </ul>

                        <div class="mob-menu">
                            <a href="">
                                <div class="lines"><span></span><span></span><span></span></div>
                            </a>
                        </div>
        </div>


    </header>
    <div class="menu-spacer"></div>

@yield('content')
@include('components.footer')
<!-- Javascripts -->
    <script src="{{ asset('static/assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('static/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('static/assets/js/functions.js') }}"></script>
    <script src="{{ asset('static/assets/js/toastr.js') }}"></script>
    <script src="{{ asset('static/assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('static/assets/js/mcustomscrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    </body>
    @include('alert.alert')

    </html>
