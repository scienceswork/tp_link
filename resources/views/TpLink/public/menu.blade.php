<ul class="nav navbar-nav">
    <!-- Dashboard -->
    <li class="{{ Route::currentRouteName() == 'tp.dashboard' ? 'active' : '' }}">
        <a href="{{ route('tp.dashboard') }}" target="_self">
            <span class="icon voyager-boat"></span>
            <span class="title">Dashboard</span>
        </a>
    </li>
    <!-- Competition -->
    <li class="{{ Request::is('*competition*') ? 'active' : '' }} dropdown">
        <a href="#tools-dropdown-competition"
           data-toggle="collapse"
           aria-expanded="{{ Request::is('*competition*') ? 'true' : 'false' }}"
           target="_self"
           class="{{ Request::is('*competition*') ? '' : 'collapsed' }}">
            <span class="icon voyager-settings"></span>
            <span class="title">Competition</span>
        </a>
        <div id="tools-dropdown-competition"
             class="panel-collapse collapse {{ Request::is('*competition*') ? 'in' : '' }}"
             aria-expanded="{{ Request::is('*competition*') ? 'true' : 'false' }}" style="height: 0px;">
            <div class="panel-body">
                <ul class="nav navbar-nav">
                    <!-- platform -->
                    <li class="{{ Route::currentRouteName() == 'tp.platforms' ? 'active' : '' }}">
                        <a href="{{ route('tp.platforms') }}" target="_self">
                            <span class="icon voyager-person"></span>
                            <span class="title">Platform</span>
                        </a>
                    </li>
                    <!-- Products -->
                    <li class="{{ Route::currentRouteName() == 'tp.products' ? 'active' : '' }}">
                        <a href="{{ route('tp.products') }}" target="_self">
                            <span class="icon voyager-list"></span>
                            <span class="title">Products</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </li>
    <!-- Profile -->
    <li class="{{ Request::is('*profile*') ? 'active' : '' }}">
        <a href="{{ route('tp.profile') }}" target="_self">
            <span class="icon voyager-tools"></span>
            <span class="title">Profile</span>
        </a>
    </li>
@if(Auth::user()->hasRole("admin"))
    <!-- Admin -->
        <li class="{{ Request::is('*admin*') ? 'active' : '' }} dropdown">
            <a href="#tools-dropdown-admin"
               data-toggle="collapse"
               aria-expanded="{{ Request::is('*admin*') ? 'true' : 'false' }}"
               target="_self"
               class="{{ Request::is('*admin*') ? '' : 'collapsed' }}">
                <span class="icon voyager-settings"></span>
                <span class="title">Admin</span>
            </a>
            <div id="tools-dropdown-admin" class="panel-collapse collapse {{ Request::is('*admin*') ? 'in' : '' }}"
                 aria-expanded="{{ Request::is('*admin*') ? 'true' : 'false' }}" style="height: 0px;">
                <div class="panel-body">
                    <ul class="nav navbar-nav">
                        <!-- Users -->
                        <li class="{{ Route::currentRouteName() == 'tp.users' ? 'active' : '' }}">
                            <a href="{{ route('tp.users') }}" target="_self">
                                <span class="icon voyager-person"></span>
                                <span class="title">Users</span>
                            </a>
                        </li>
                        <li class="{{ Route::currentRouteName() == 'tp.showKeyword' ? 'active' : '' }}">
                            <a href="{{ route('tp.showKeyword') }}" target="_self">
                                <span class="icon voyager-tree"></span>
                                <span class="title">Keyword</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </li>
    @endif
</ul>