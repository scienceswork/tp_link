<div class="side-menu sidebar-inverse">
    <nav class="navbar navbar-default" role="navigation">
        <div class="side-menu-container">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('tp.dashboard') }}">
                    <div class="logo-icon-container">
                        <img src="{{ asset('images/logo-icon-light.png') }}" alt="Logo Icon">
                    </div>
                    <div class="title">Tp Link</div>
                </a>
            </div><!-- .navbar-header -->

            <div class="panel widget center bgimage"
                 style="background-image:url('/images/bg.jpg');">
                <div class="dimmer"></div>
                <div class="panel-content">
                    <img src="{{ $user_avatar }}" class="avatar" alt="{{ Auth::user()->name }} avatar">
                    <h4>{{ ucwords(Auth::user()->name) }}</h4>
                    <p>{{ Auth::user()->email }}</p>

                    <a href="/" class="btn btn-primary">Profile</a>
                    <div style="clear:both"></div>
                </div>
            </div>

        </div>
        @include('TpLink.public.menu')
{{--        {!! menu('admin', 'admin_menu') !!}--}}
    </nav>
</div>
