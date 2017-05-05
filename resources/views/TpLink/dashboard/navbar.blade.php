<nav class="navbar navbar-default navbar-fixed-top navbar-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button class="hamburger btn-link">
                <span class="hamburger-inner"></span>
            </button>
            <a id="sidebar-anchor" class="voyager-anchor btn-link navbar-link hidden-xs" 
                title="Yarr! Drop the anchors! (and keep the sidebar open)" 
                data-unstick="Unstick the sidebar" 
            data-toggle="tooltip" data-placement="bottom"></a>

            <ol class="breadcrumb hidden-xs">
                @if(count(Request::segments()) == 1)
                    <li class="active"><i class="voyager-boat"></i> Dashboard</li>
                @else
                    <li class="active">
                        <a href="{{ route('tp.dashboard')}}"><i class="voyager-boat"></i> Dashboard</a>
                    </li>
                @endif
                <?php $breadcrumb_url = ''; ?>
                @for($i = 1; $i <= count(Request::segments()); $i++)
                    <?php $breadcrumb_url .= '/' . Request::segment($i); ?>
                    @if(Request::segment($i) != ltrim(route('tp.dashboard', [], false), '/') && !is_numeric(Request::segment($i)))

                        @if($i < count(Request::segments()) & $i > 0)
                            <li class="active"><a
                                        href="{{ $breadcrumb_url }}">{{ ucwords(str_replace('-', ' ', str_replace('_', ' ', Request::segment($i)))) }}</a>
                            </li>
                        @else
                            <li>{{ ucwords(str_replace('-', ' ', str_replace('_', ' ', Request::segment($i)))) }}</li>
                        @endif

                    @endif
                @endfor
            </ol>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown profile">
                <a href="#" class="dropdown-toggle text-right" data-toggle="dropdown" role="button"
                   aria-expanded="false"><img src="{{ $user_avatar }}" class="profile-img"> <span
                            class="caret"></span></a>
                <ul class="dropdown-menu dropdown-menu-animated">
                    <li class="profile-img">
                        <img src="{{ $user_avatar }}" class="profile-img">
                        <div class="profile-body">
                            <h5>{{ Auth::user()->name }}</h5>
                            <h6>{{ Auth::user()->email }}</h6>
                        </div>
                    </li>
                    <li class="divider"></li>
                    <!-- Profile -->
                    <li class="class-full-of-rum">
                        <a href="{{ route('tp.profile') }}">
                            <i class="voyager-person"></i>
                            Profile
                        </a>
                    </li>
                    <!-- Home -->
                    <li>
                        <a href="/" target="_blank">
                            <i class="voyager-home"></i>
                            Home
                        </a>
                    </li>
                    <!-- Logout -->
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-block">
                                <i class="voyager-power"></i>
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>