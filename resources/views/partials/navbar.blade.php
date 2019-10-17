<nav class="navbar mai-sub-header">
    <div class="container">
        <nav class="navbar navbar-toggleable-sm">
            <button type="button" data-toggle="collapse" data-target="#mai-navbar-collapse" aria-controls="#mai-navbar-collapse" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler hidden-md-up collapsed">
                <div class="icon-bar"><span></span><span></span><span></span></div>
            </button>
            <div id="mai-navbar-collapse" class="navbar-collapse collapse mai-nav-tabs">
                <ul class="nav navbar-nav">
                    <li class="nav-item parent {{ request()->is('projects/*') || request()->is('projects') ? 'open' : '' }}">
                        <a href="#" 
                        role="button" 
                        aria-expanded="false" 
                        class="nav-link">
                        <span class="icon s7-home"></span><span>Projects</span></a>
                        <ul class="mai-nav-tabs-sub mai-sub-nav nav">
                            <li class="nav-item">
                                <a href="{{ route('project.list') }}" 
                                class="nav-link {{ request()->is('projects/*') || request()->is('projects') ? 'active' : '' }}">
                                    <span class="icon s7-portfolio"></span>
                                    <span class="name">Project List</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item parent {{ request()->is('data_master/*') ? 'open' : '' }}">
                        <a href="#" role="button" 
                        aria-expanded="false" 
                        class="nav-link">
                        <span class="icon s7-albums"></span><span>Data Masters</span></a>
                        <ul class="mai-nav-tabs-sub mai-sub-nav nav">
                            <li class="nav-item">
                                <a href="{{ route('user.list') }}" 
                                class="nav-link {{ request()->is('data_master/users/*') || request()->is('data_master/users') ? 'active' : '' }}">
                                    <span class="icon s7-users"></span><span class="name">Users</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('company.list') }}" 
                                class="nav-link {{ request()->is('data_master/companies/*') || request()->is('data_master/companies') ? 'active': ''}}">
                                <span class="icon s7-culture"></span><span class="name">Companies</span></a>
                            </li>
                            <li class="nav-item dropdown parent {{ request()->is('data_master/items/*') ? 'show' : '' }}">
                                <a href="#" data-toggle="dropdown" class="nav-link">
                                    <span class="icon s7-diamond"></span><span class="name">Items</span>
                                </a>
                                <div role="menu" class="dropdown-menu mai-sub-nav">
                                    <a href="{{ route('item.list') }}" class="dropdown-item {{ request()->is('data_master/items/items/*') || request()->is('data_master/items/items') ? 'active': ''}}">Items</a>
                                    <a href="{{ route('detail.list') }}" class="dropdown-item {{ request()->is('data_master/items/details/*') || request()->is('data_master/items/details') ? 'active': ''}}">Details</a>
                                    <a href="{{ route('finishing.list') }}" class="dropdown-item {{ request()->is('data_master/items/finishings/*') || request()->is('data_master/items/finishings') ? 'active': ''}}">Descriptive Finishings</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('room.list') }}" 
                                class="nav-link {{ request()->is('data_master/rooms/*') || request()->is('data_master/rooms') ? 'active': ''}}">
                                    <span class="icon s7-crop"></span><span class="name">Rooms</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</nav>