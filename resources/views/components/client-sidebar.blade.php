<div class="zima-event-content-left">
    <aside class="zima-event-content-left-navigation-header-wrapper">
        <div class="zima-event-content-left-navigation-header">
            <div class="zima-event-content-left-navigation-profile">
                <h1>
                    {{ Auth::user()->first_name[0].''.Auth::user()->last_name[0]}}
                </h1>
            </div>
            <div class="zima-event-content-left-desktop-profile-name-wrapper">
                <div class="zima-event-content-left-desktop-profile-name">
                    <span>Hi,</span>
                    <h1> {{ Auth::guard('web')->user()->first_name.' '.Auth::guard('web')->user()->last_name }}</h1>
                </div>
            </div>

        </div>
    </aside>
    <nav>
        <ul class="zima-event-content-left-navigation-wrapper">
            <li class="zima-event-content-left-navigation-list">

                <a href="{{ route('user.dashboard') }}"
                   class="{{ request()->routeIs('user.dashboard') ? 'active' : '' }}">
                    <div class="zima-event-content-left-navigation-list-link">
                        <i class="fe fe-user"></i>
                        <span>Account overview</span>
                    </div>
                </a>
            </li>
        </ul>

        <ul class="zima-event-content-left-navigation-wrapper">
            <li class="zima-event-content-left-navigation-list">
                <a href="{{ route('user.event.list') }}"
                   class="{{ request()->routeIs('user.event.list') ? 'active' : '' }}">
                    <div class="zima-event-content-left-navigation-list-link">
                        <i class="fe fe-calendar"></i>
                        <span>My Events</span>
                    </div>
                </a>
            </li>
        </ul>

        <ul class="zima-event-content-left-navigation-wrapper">
            <li class="zima-event-content-left-navigation-list">
                <a href="">
                    <div class="zima-event-content-left-navigation-list-link">
                        <i class="fe fe-shopping-bag"></i>
                        <span>My Tickets</span>
                    </div>
                </a>
            </li>
        </ul>

        <ul class="zima-event-content-left-navigation-wrapper">
            <li class="zima-event-content-left-navigation-list">
                <a href="{{ route('user.transactions') }}"
                   class="{{ request()->routeIs('user.transactions') ? 'active' : '' }}">
                    <div class="zima-event-content-left-navigation-list-link">
                        <i class="fe fe-trending-up"></i>
                        <span>Sales Transactions</span>
                    </div>
                </a>
            </li>
        </ul>

        <ul class="zima-event-content-left-navigation-wrapper">
            <li class="zima-event-content-left-navigation-list">
                <a href="{{ route('user.profile.details') }}"
                   class="{{ request()->routeIs('user.profile.details') ? 'active' : '' }}">
                    <div class="zima-event-content-left-navigation-list-link">
                        <i class="fe fe-user-check"></i>
                        <span>Profile Details</span>
                    </div>
                </a>
            </li>
        </ul>


        <ul class="zima-event-content-left-navigation-wrapper">
            <li class="zima-event-content-left-navigation-list">

                <a href="{{ route('user.social.media') }}"
                   class="{{ request()->routeIs('user.social.media') ? 'active' : '' }}">
                    <div class="zima-event-content-left-navigation-list-link">
                        <i class="fe fe-users"></i>
                        <span>Social Accounts</span>
                    </div>
                </a>
            </li>
        </ul>

        <ul class="zima-event-content-left-navigation-wrapper">
            <li class="zima-event-content-left-navigation-list">
                <a href="{{ route('user.setting') }}" class="{{ request()->routeIs('user.setting') ? 'active' : '' }}">
                    <div class="zima-event-content-left-navigation-list-link">
                        <i class="fe fe-settings"></i>
                        <span>Account Settings</span>
                    </div>
                </a>
            </li>
        </ul>

        <ul class="zima-event-content-left-navigation-wrapper">
            <li class="zima-event-content-left-navigation-list">
                <a href="">
                    <div class="zima-event-content-left-navigation-list-link">
                        <i class="fe fe-alert-circle"></i>
                        <span>Need Help?</span>
                    </div>
                </a>
            </li>
        </ul>

        <ul class="zima-event-content-left-navigation-wrapper">
            <li class="zima-event-content-left-navigation-list">
                <a onclick="event.preventDefault(); document.querySelector('#logout-form').submit();"
                   href="{{ route('logout') }}">
                    <div class="zima-event-content-left-navigation-list-link">
                        <i class="fe fe-log-out"></i>
                        <span>Sign Out</span>
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">
                        @csrf
                    </form>
                </a>
            </li>
        </ul>

    </nav>

</div>
