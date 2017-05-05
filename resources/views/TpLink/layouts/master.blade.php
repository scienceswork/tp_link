<!DOCTYPE html>
<html>
<head>
    <title>TP Link - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400|Lato:300,400,700,900' rel='stylesheet'
          type='text/css'>

    <!-- CSS Libs -->
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/css/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/css/bootstrap-switch.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/css/checkbox3.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/css/dataTables.bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/css/toastr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/css/perfect-scrollbar.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-toggle.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('js/icheck/icheck.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('js/datetimepicker/bootstrap-datetimepicker.min.css') }}">
    <!-- CSS App -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/themes/flat-blue.css') }}">

    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,300italic">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/logo-icon.png') }}" type="image/x-icon">

    <!-- CSS Fonts -->
    <link rel="stylesheet" href="{{ asset('fonts/voyager/styles.css') }}">
    <script type="text/javascript" src="{{ asset('lib/js/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.0/themes/smoothness/jquery-ui.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js"></script>

    @yield('css')

<!-- Voyager CSS -->
    <link rel="stylesheet" href="{{ asset('css/voyager.css') }}">

    <!-- Few Dynamic Styles -->
    <style type="text/css">
        .flat-blue .side-menu .navbar-header, .widget .btn-primary, .widget .btn-primary:focus, .widget .btn-primary:hover, .widget .btn-primary:active, .widget .btn-primary.active, .widget .btn-primary:active:focus{
            background: #22A7F0;
            border-color: #22A7F0;
        }
        .breadcrumb a{
            color: #22A7F0;
        }
    </style>

    @yield('head')
</head>

<body class="flat-blue">

{{--<div id="voyager-loader">--}}
    {{--<img src="{{ asset('images/logo-icon.png') }}" alt="Voyager Loader">--}}
{{--</div>--}}

<?php
//$user_avatar = Voyager::image(Auth::user()->avatar);
$user_avatar = 'http://tp.app/storage/users/default.png'
//if ((substr(Auth::user()->avatar, 0, 7) == 'http://') || (substr(Auth::user()->avatar, 0, 8) == 'https://')) {
//    $user_avatar = Auth::user()->avatar;
//}
?>

<div class="app-container">
    <div class="fadetoblack visible-xs"></div>
    <div class="row content-container">
    @include('TpLink.dashboard.navbar')
    @include('TpLink.dashboard.sidebar')
    <!-- Main Content -->
        <div class="container-fluid">
            <div class="side-body padding-top">
                @yield('page_header')
                @yield('content')
            </div>
        </div>
    </div>
</div>
@include('TpLink.public.footer')
<script>
    (function(){
        var appContainer = document.querySelector('.app-container'),
            sidebar = appContainer.querySelector('.side-menu'),
            navbar = appContainer.querySelector('nav.navbar.navbar-top'),
            loader = document.getElementById('voyager-loader'),
            anchor = document.getElementById('sidebar-anchor'),
            hamburgerMenu = document.querySelector('.hamburger'),
            sidebarTransition = sidebar.style.transition,
            navbarTransition = navbar.style.transition,
            containerTransition = appContainer.style.transition;

        sidebar.style.WebkitTransition = sidebar.style.MozTransition = sidebar.style.transition =
            appContainer.style.WebkitTransition = appContainer.style.MozTransition = appContainer.style.transition =
                navbar.style.WebkitTransition = navbar.style.MozTransition = navbar.style.transition = 'none';

        if (window.localStorage && window.localStorage['voyager.stickySidebar'] == 'true') {
            appContainer.className += ' expanded';
            loader.style.left = (sidebar.clientWidth/2)+'px';
            anchor.className += ' active';
            anchor.dataset.sticky = anchor.title;
            anchor.title = anchor.dataset.unstick;
            hamburgerMenu.className += ' is-active';
        }

        navbar.style.WebkitTransition = navbar.style.MozTransition = navbar.style.transition = navbarTransition;
        sidebar.style.WebkitTransition = sidebar.style.MozTransition = sidebar.style.transition = sidebarTransition;
        appContainer.style.WebkitTransition = appContainer.style.MozTransition = appContainer.style.transition = containerTransition;
    })();
</script>
<!-- Javascript Libs -->
<script type="text/javascript" src="{{ asset('lib/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('lib/js/bootstrap-switch.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('lib/js/jquery.matchHeight-min.js') }}"></script>
<script type="text/javascript" src="{{ asset('lib/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('lib/js/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('lib/js/toastr.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('lib/js/perfect-scrollbar.jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/select2/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap-toggle.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.cookie.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/moment-with-locales.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
<!-- Javascript -->
<script type="text/javascript" src="{{ asset('js/readmore.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/helpers.js') }}"></script>
<script type="text/javascript" src="{{ asset('echarts/echarts.min.js') }}"></script>
<script>
            @if(Session::has('alerts'))
    let alerts = {!! json_encode(Session::get('alerts')) !!};

    displayAlerts(alerts, toastr);
    @endif

    @if(Session::has('message'))

    // TODO: change Controllers to use AlertsMessages trait... then remove this
    var alertType = {!! json_encode(Session::get('alert-type', 'info')) !!};
    var alertMessage = {!! json_encode(Session::get('message')) !!};
    var alerter = toastr[alertType];

    if (alerter) {
        alerter(alertMessage);
    } else {
        toastr.error("toastr alert-type " + alertType + " is unknown");
    }

    @endif
</script>
@yield('javascript')
</body>
</html>