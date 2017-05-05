@extends('TpLink.layouts.master')

@section('title', 'Product Detail')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-tools"></i>
        Product Detail
        <a href="{{ Route('tp.products') }}" class="btn btn-success">
            Go Back
        </a>
        <a href="{{ Route('tp.exportProduct', $product->product_id) }}" class="btn btn-info" style="margin-left: 20px;margin-top: 2px;">
            Down
        </a>
    </h1>
@endsection

@section('content')
    <div class="page-content container-fluid">

        <div class="row">
            <div class="col-md-5">
                <div class="panel panel-bordered">
                    <!-- name -->
                    <div class="panel-heading" style="border-bottom: 0;">
                        <h3 class="panel-title">
                            Name
                        </h3>
                    </div>
                    <div class="panel-body" style="padding-top: 0;">
                        <p>{{ $product->product->name }}</p>
                    </div>
                    <hr style="margin: 0;">
                    <!-- Price -->
                    <div class="panel-heading" style="border-bottom: 0;">
                        <h3 class="panel-title">
                            Price
                        </h3>
                    </div>
                    <div class="panel-body" style="padding-top: 0;">
                        <p>{{ $product->price }}</p>
                    </div>
                    <hr style="margin: 0;">
                    <!-- Free shipping -->
                    <div class="panel-heading" style="border-bottom: 0;">
                        <h3 class="panel-title">
                            Free shipping
                        </h3>
                    </div>
                    <div class="panel-body" style="padding-top: 0;">
                        <p>{{ $product->free_shipping }}</p>
                    </div>
                    <hr style="margin: 0;">
                    <!-- Reseller -->
                    <div class="panel-heading" style="border-bottom: 0;">
                        <h3 class="panel-title">
                            Reseller
                        </h3>
                    </div>
                    <div class="panel-body" style="padding-top: 0;">
                        @foreach($resellers as $reseller)
                            <p>
                                <a href="{{ $reseller['url'] }}" target="_blank">
                                    <strong>{{ $reseller['seller'] }}</strong>
                                </a>
                                :
                                {{ $reseller['fast_delivery'] }}
                            </p>
                        @endforeach
                    </div>
                    <hr style="margin: 0;">
                    <!-- Times -->
                    <div class="panel-heading" style="border-bottom: 0;">
                        <h3 class="panel-title">
                            Times
                        </h3>
                    </div>
                    <div class="panel-body" style="padding-top: 0;">
                        <p>{{ $product->num }}</p>
                    </div>
                    <hr style="margin: 0;">
                    <!-- Created at -->
                    <div class="panel-heading" style="border-bottom: 0;">
                        <h3 class="panel-title">
                            Created At
                        </h3>
                    </div>
                    <div class="panel-body" style="padding-top: 0;">
                        <p>{{ $product->created_at }}</p>
                    </div>
                    <hr style="margin: 0;">
                    <!-- url -->
                    <div class="panel-heading" style="border-bottom: 0;">
                        <h3 class="panel-title">
                            Url
                        </h3>
                    </div>
                    <div class="panel-body" style="padding-top: 0;">
                        <p>
                            <a href="{{ $product->product->url }}" target="_blank">{{ $product->product->url }}</a>
                        </p>
                    </div>
                    <hr style="margin: 0;">
                </div>
            </div>
            <div class="col-md-7">
                <div class="panel panel-bordered">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="chart">
                                    <div id="week_price_chart" style="height:400px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-bordered">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="chart">
                                    <div id="month_price_chart" style="height:400px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection

        @section('javascript')
            <script type="text/javascript">
                // 价格图表
                var week_price_chart = echarts.init(document.getElementById('week_price_chart'));
                var month_price_chart = echarts.init(document.getElementById('month_price_chart'));

                // 指定图表的配置项和数据
                option = {
                    title: {
                        text: 'Weekly price trends'
                    },
                    tooltip : {
                        trigger: 'axis',
                        axisPointer: {
                            type: 'cross',
                            label: {
                                backgroundColor: '#4acbd6'
                            }
                        }
                    },
                    legend: {
                        data:['Price']
                    },
                    toolbox: {
                        feature: {
                            saveAsImage: {}
                        }
                    },
                    grid: {
                        left: '3%',
                        right: '4%',
                        bottom: '3%',
                        containLabel: true
                    },
                    xAxis : [
                        {
                            type : 'category',
                            boundaryGap : false,
                            data : [{!! implode(",",$weekCharData['labels']) !!}],
                            axisLabel:{
                                interval:1,
                                rotate:45,
//                                margin:2,
//                                textStyle:{
//                                    color:"#222"
//                                }
                            }
                        }
                    ],
                    yAxis : [
                        {
                            type : 'value'
                        }
                    ],
                    series : [
                        {
                            name:'Price',
                            type:'line',
                            stack: '总量',
                            areaStyle: {normal: {}},
                            data:[{{ implode(",",$weekCharData['prices']) }}]
                        }
                    ]
                };

                // 使用刚指定的配置项和数据显示图表。
                week_price_chart.setOption(option);

                // 指定图表的配置项和数据
                option = {
                    title: {
                        text: 'Month price trends'
                    },
                    tooltip : {
                        trigger: 'axis',
                        axisPointer: {
                            type: 'cross',
                            label: {
                                backgroundColor: '#4acbd6'
                            }
                        }
                    },
                    legend: {
                        data:['Price']
                    },
                    toolbox: {
                        feature: {
                            saveAsImage: {}
                        }
                    },
                    grid: {
                        left: '3%',
                        right: '4%',
                        bottom: '3%',
                        containLabel: true
                    },
                    xAxis : [
                        {
                            type : 'category',
                            boundaryGap : false,
                            data : [{!! implode(",",$monthCharData['labels']) !!}],
                            axisLabel:{
                                interval:2,
                                rotate:45,
                                margin:2,
                                textStyle:{
                                    color:"#222"
                                }
                            }
                        }
                    ],
                    yAxis : [
                        {
                            type : 'value'
                        }
                    ],
                    series : [
                        {
                            name:'Price',
                            type:'line',
                            stack: '总量',
                            areaStyle: {normal: {}},
                            data:[{{ implode(",",$monthCharData['prices']) }}]
                        }
                    ]
                };
                month_price_chart.setOption(option);
            </script>
@endsection
