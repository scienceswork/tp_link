<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('zui/css/zui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/base.css') }}">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
<div class="wrap">
    <!-- 导航栏 -->
    <nav class="navbar " role="navigation" style="margin: 0;">
        <div class="container">
            <!-- 导航头部 -->
            <div class="navbar-header">
                <!-- 移动设备上的导航切换按钮 -->
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target=".navbar-collapse-example">
                    <span class="sr-only">切换导航</span>
                    <span class="icon-bar" style="background: #145ccd;"></span>
                    <span class="icon-bar" style="background: #145ccd;"></span>
                    <span class="icon-bar" style="background: #145ccd;"></span>
                </button>
                <!-- 品牌名称或logo -->
                <a class="navbar-brand" href="your/nice/url">Tp Link</a>
            </div>
            <!-- 导航项目 -->
            <div class="collapse navbar-collapse navbar-collapse-example">
                <!-- 一般导航项目 -->
            {{--<ul class="nav navbar-nav">--}}
            {{--<li class="active"><a href="your/nice/url">项目</a></li>--}}
            {{--<li><a href="your/nice/url">需求</a></li>--}}
            {{--<!-- 导航中的下拉菜单 -->--}}
            {{--<li class="dropdown">--}}
            {{--<a href="your/nice/url" class="dropdown-toggle" data-toggle="dropdown">管理 <b class="caret"></b></a>--}}
            {{--<ul class="dropdown-menu" role="menu">--}}
            {{--<li><a href="your/nice/url">任务</a></li>--}}
            {{--</ul>--}}
            {{--</li>--}}
            {{--</ul>--}}
            <!-- Login && Register -->
                <ul class="nav navbar-nav navbar-right">
                    @if(!Auth::check())
                        <li>
                            <a href="{{ route('register') }}">Register</a>
                        </li>
                        <li>
                            <a href="{{ route('login') }}">Sign up</a>
                        </li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                {{ Auth::user()->name }}
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route('tp.dashboard') }}">Dashboard</a></li>
                                <li><a href="{{ route('tp.profile') }}">Edit Profile</a></li>
                                <li>
                                    <a href="#"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div><!-- END .navbar-collapse -->
        </div>
    </nav>
    <!-- 滑动轮播图 -->
    <div id="myNiceCarousel" class="carousel slide container" data-ride="carousel">
        <!-- 圆点指示器 -->
        <ol class="carousel-indicators">
            <li data-target="#myNiceCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myNiceCarousel" data-slide-to="1"></li>
            <li data-target="#myNiceCarousel" data-slide-to="2"></li>
        </ol>

        <!-- 轮播项目 -->
        <div class="carousel-inner">
            <div class="item active">
                <img alt="First slide" src="http://zui.sexy/docs/img/slide1.jpg">
                <div class="carousel-caption">
                    <h3>Price Comparison</h3>
                    <p class="hidden-xs">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta error inventore
                        ipsa laborum minima molestias numquam odit, placeat rerum ullam?</p>
                </div>
            </div>
            <div class="item">
                <img alt="Second slide" src="http://zui.sexy/docs/img/slide2.jpg">
                <div class="carousel-caption">
                    <h3>Price Change Alerts</h3>
                    <p class="hidden-xs">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi culpa dolores,
                        minus mollitia perferendis quasi sed! </p>
                </div>
            </div>
            <div class="item">
                <img alt="Third slide" src="http://zui.sexy/docs/img/slide3.jpg">
                <div class="carousel-caption">
                    <h3>Price Analytics</h3>
                    <p class="hidden-xs">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi atque
                        dignissimos enim, hic numquam placeat praesentium rem sit unde veritatis. </p>
                </div>
            </div>
        </div>

        <!-- 项目切换按钮 -->
        <a class="left carousel-control" href="#myNiceCarousel" data-slide="prev">
            <span class="icon icon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#myNiceCarousel" data-slide="next">
            <span class="icon icon-chevron-right"></span>
        </a>
    </div>
    <!-- 中间内容 -->
    <div class="container">
        <div class="text-center">
            <h3 class="text-center promo-text">
                Main Features
            </h3>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-12 col-lg-4">
                <div class="know-item">
                    <div class="img">
                        <img src="http://www.bazhuayu.com/image/home/know_1.jpg" alt="">
                    </div>
                    <h4>Price Comparison</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At error laudantium maiores minima
                        numquam possimus quam similique? Eum laborum quaerat suscipit tempore. Amet culpa dignissimos
                        eveniet iste magnam mollitia temporibus.</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-lg-4">
                <div class="know-item">
                    <div class="img">
                        <img src="http://www.bazhuayu.com/image/home/know_3.jpg" alt="">
                    </div>
                    <h4>Price Change Alerts</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid blanditiis consequatur debitis
                        ea eveniet fugiat fugit ipsa magni, nobis, quae repudiandae rerum totam veniam! Fuga magni nisi
                        odio officiis voluptas?</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-lg-4">
                <div class="know-item">
                    <div class="img">
                        <img src="http://www.bazhuayu.com/image/home/know_2.jpg" alt="">
                    </div>
                    <h4>Price Analytics</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, alias atque, delectus deleniti
                        doloribus, ea earum eius eveniet excepturi iure laudantium necessitatibus nulla optio placeat
                        provident quibusdam ratione tenetur velit!</p>
                </div>
            </div>
        </div>
    </div>
    <!-- 底部 -->
    <footer style="background: #f9f9f9; padding-top: 55px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-xs-12">
                            <h5 class="footer-category">
                                About Our
                            </h5>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="#">Company About</a>
                                </li>
                                <li>
                                    <a href="#">Join In</a>
                                </li>
                                <li>
                                    <a href="#">Contact Out</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-3 col-xs-12">
                            <h5 class="footer-category">
                                Products
                            </h5>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="#">Product introduction</a>
                                </li>
                                <li>
                                    <a href="#">Business cooperation</a>
                                </li>
                                <li>
                                    <a href="#">Partner Program</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-3 col-xs-12">
                            <h5 class="footer-category">
                                Help center
                            </h5>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="#">Common problem</a>
                                </li>
                                <li>
                                    <a href="#">Latest information</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-3 col-xs-12">
                            <h5 class="footer-category">
                                Quality resources
                            </h5>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="#">Software download</a>
                                </li>
                                <li>
                                    <a href="#">Video tutorial</a>
                                </li>
                                <li>
                                    <a href="#">Use manual</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6"></div>
            </div>
        </div>
        <div class="copyright">
            <p style="text-align: center;color:#999;font-size:12px;margin-bottom:6px;">© 2017-2017 . All rights
                reserved. <a href="#" style="color: #a8a9ac;">Service agreement</a></p>
            <p style="text-align: center;color:#999;font-size:12px;margin-bottom:30px;">
                公司地址：深圳市南山区科技园中区深南大道9966号威盛科技大厦318&nbsp;&nbsp;电话：0755-26646350</p>
        </div>
    </footer>
</div>

<!-- Scripts -->
<script src="{{ asset('zui/lib/jquery/jquery.js') }}"></script>
<script src="{{ asset('zui/js/zui.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
