<ul class="nav navbar-nav float-lg-right mai-user-nav">
    <li class="dropdown nav-item">
        <a href="#" data-toggle="dropdown" role="button" aria-expanded="true" class="dropdown-toggle nav-link">
            <img src="">
            <span class="user-name">USER NAME</span>
            <span class="angle-down s7-angle-down"></span>
        </a>
        <div role="menu" class="dropdown-menu">
            <a href="#" class="dropdown-item">
                <span class="icon s7-home"></span>
                My Account
            </a>
            <a href="{{ route('logout') }}" class="dropdown-item"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

                <span class="icon s7-power"> </span>
                Log Out
            </a>

            <form id="logout-form" action="#" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
    </li>
</ul>