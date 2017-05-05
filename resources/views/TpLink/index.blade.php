@extends('TpLink.layouts.master')

@section('title', 'Dashboard')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/ga-embed.css') }}">
@stop

@section('content')
    <div class="page-content">
        @include('TpLink.public.alerts')
        @include('TpLink.public.dimmers')
        <div class="container-fluid">
            <div class="side-body">
                <div class="page-content">
                    <div class="clearfix container-fluid row">
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="panel widget center bgimage" style="margin-bottom:0;overflow:hidden;background-image:url('http://tp.old.app/vendor/tcg/voyager/assets/images/widget-backgrounds/02.png');">
                                <div class="dimmer"></div>
                                <div class="panel-content">
                                    <h4>Price change in MP</h4>
                                    <p>You have 1 user in your database. Click on button below to view all users.</p>
                                    <a href="http://tp.old.app/admin/users" class="btn btn-primary">View Details</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="panel widget center bgimage" style="margin-bottom:0;overflow:hidden;background-image:url('http://tp.old.app/vendor/tcg/voyager/assets/images/widget-backgrounds/03.png');">
                                <div class="dimmer"></div>
                                <div class="panel-content">
                                    <h4>Price change in Retail</h4>
                                    <p>You have 0 posts in your database. Click on button below to view all posts.</p>
                                    <a href="http://tp.old.app/admin/posts" class="btn btn-primary">View Details</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="panel widget center bgimage" style="margin-bottom:0;overflow:hidden;background-image:url('http://tp.old.app/vendor/tcg/voyager/assets/images/widget-backgrounds/03.png');">
                                <div class="dimmer"></div>
                                <div class="panel-content">
                                    <h4>Low price</h4>
                                    <p>You have 0 pages in your database. Click on button below to view all pages.</p>
                                    <a href="http://tp.old.app/admin/pages" class="btn btn-primary">View Details</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="panel widget center bgimage" style="margin-bottom:0;overflow:hidden;background-image:url('http://tp.old.app/vendor/tcg/voyager/assets/images/widget-backgrounds/03.png');">
                                <div class="dimmer"></div>
                                <div class="panel-content">
                                    <h4>HB Monitor</h4>
                                    <p>You have 0 pages in your database. Click on button below to view all pages.</p>
                                    <a href="http://tp.old.app/admin/pages" class="btn btn-primary">View Details</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="panel widget center bgimage" style="margin-bottom:0;overflow:hidden;background-image:url('http://tp.old.app/vendor/tcg/voyager/assets/images/widget-backgrounds/03.png');">
                                <div class="dimmer"></div>
                                <div class="panel-content">
                                    <h4>Summary</h4>
                                    <p>{{ $product_count }} products</p>
                                    <p style="margin: 0;">{{ $platform_count }} brands</p>
                                    <a href="{{ route('tp.products') }}" class="btn btn-primary">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="padding:15px;">
                        <p style="border-radius:4px; padding:20px; background:#fff; margin:0; color:#999; text-align:center;">
                            To view analytics you'll need to get a google analytics client id and add it to your settings for the key <code>google_analytics_client_id</code>. Get your key in your Google developer console:
                            <a href="https://console.developers.google.com" target="_blank">https://console.developers.google.com</a>
                        </p>

                        <div class="Dashboard Dashboard--full" id="analytics-dashboard">
                            <header class="Dashboard-header">
                                <ul class="FlexGrid">
                                    <li class="FlexGrid-item">
                                        <div class="Titles">
                                            <h1 class="Titles-main" id="view-name">Select a View</h1>
                                            <div class="Titles-sub">Various visualizations</div>
                                        </div>
                                    </li>
                                    <li class="FlexGrid-item FlexGrid-item--fixed">
                                        <div id="active-users-container"></div>
                                    </li>
                                </ul>
                                <div id="view-selector-container"></div>
                            </header>

                            <ul class="FlexGrid FlexGrid--halves">
                                <li class="FlexGrid-item">
                                    <div class="Chartjs">
                                        <header class="Titles">
                                            <h1 class="Titles-main">This Week vs Last Week</h1>
                                            <div class="Titles-sub">By users</div>
                                        </header>
                                        <figure class="Chartjs-figure" id="chart-1-container"></figure>
                                        <ol class="Chartjs-legend" id="legend-1-container"></ol>
                                    </div>
                                </li>
                                <li class="FlexGrid-item">
                                    <div class="Chartjs">
                                        <header class="Titles">
                                            <h1 class="Titles-main">This Year vs Last Year</h1>
                                            <div class="Titles-sub">By users</div>
                                        </header>
                                        <figure class="Chartjs-figure" id="chart-2-container"></figure>
                                        <ol class="Chartjs-legend" id="legend-2-container"></ol>
                                    </div>
                                </li>
                                <li class="FlexGrid-item">
                                    <div class="Chartjs">
                                        <header class="Titles">
                                            <h1 class="Titles-main">Top Browsers</h1>
                                            <div class="Titles-sub">By pageview</div>
                                        </header>
                                        <figure class="Chartjs-figure" id="chart-3-container"></figure>
                                        <ol class="Chartjs-legend" id="legend-3-container"></ol>
                                    </div>
                                </li>
                                <li class="FlexGrid-item">
                                    <div class="Chartjs">
                                        <header class="Titles">
                                            <h1 class="Titles-main">Top Countries</h1>
                                            <div class="Titles-sub">By sessions</div>
                                        </header>
                                        <figure class="Chartjs-figure" id="chart-4-container"></figure>
                                        <ol class="Chartjs-legend" id="legend-4-container"></ol>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

