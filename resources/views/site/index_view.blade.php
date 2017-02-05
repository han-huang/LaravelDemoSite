@extends('site.layouts.master')

@section('pageTitle')
<title>LaravelDemoSite</title>
@stop

@section('javascript')
<script type="text/javascript" src="{{ asset('js/index_view.js') }}"></script>
@stop

@section('css')
<link href="{{ asset('css/index_view.css') }}" rel="stylesheet" type="text/css">
@stop

@section('content')
    <!-- carousel -->
    <div class="container" id="divCarousel" >

        <div id="indexCarousel" class="carousel slide carousel-fade" data-ride="carousel"  data-interval="2000" >
            <!-- Indicators -->
            <ol class="carousel-indicators">
            @for ($i = 0; $i < $carouselActiveItems->count(); $i++)
                @if ($i)
                    <li data-target="#indexCarousel" data-slide-to="{{ $i }}"></li>
                @else
                    <li data-target="#indexCarousel" data-slide-to="{{ $i }}" class="active"></li>
                @endif
            @endfor
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox" >
            @foreach ($carouselActiveItems as $key => $item)
                @if($key)
                    <div class="item">
                @else
                    <div class="item active">
                @endif
                        <a href="{{ $item->url }}">
                            <img src="{{ Voyager::image($item->image) }}" alt="{{ $item->title }}">
                            <div class="carousel-caption">
                                <h3>{{ $item->title }}</h3>
                                <p>{{ $item->description }}</p>
                            </div>
                        </a>
                    </div>
            @endforeach
            </div>

            <!-- Left and right controls -->
            <div id="control_panel">
                <a class="left carousel-control" href="#indexCarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#indexCarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Container -->
    <div id="pricing" class="container">
        <div class="text-center">
            <h2>廣告刊登</h2>
            <h4>選擇最佳方案</h4>
        </div>
        <div class="row slideanim">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="panel panel-default text-center panel-min-height">
                    <div class="panel-heading">
                        <h1>基本方案</h1>
                    </div>
                    <div class="panel-body panel-body-height">
                        <p>支援文字、影音、圖像等多元格式</p>
                        <p>多元化的數位廣告成效解決方案</p>
                        <p>精彩圖文完整呈現</p>
                        <p>3個內容廣告單元</p>
                        <p>1個連結單元</p>
                    </div>
                    <div class="panel-footer">
                        <h3>NT$5,000</h3>
                        <h4>每周</h4>
                        <button class="btn btn-lg btn-primary">馬上瞭解</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="panel panel-default text-center panel-min-height">
                    <div class="panel-heading">
                        <h1>進階方案</h1>
                    </div>
                    <div class="panel-body panel-body-height">
                        <p>支援文字、影音、圖像等多元格式</p>
                        <p>多元化的數位廣告成效解決方案</p>
                        <p>精彩圖文完整呈現</p>
                        <p>5個內容廣告單元</p>
                        <p>5個連結單元</p>
                    </div>
                    <div class="panel-footer">
                        <h3>NT$15,000</h3>
                        <h4>每月</h4>
                        <button class="btn btn-lg btn-primary">聯絡我們</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="panel panel-default text-center panel-min-height">
                    <div class="panel-heading">
                        <h1>高級方案</h1>
                    </div>
                    <div class="panel-body panel-body-height">
                        <p>支援文字、影音、圖像等多元格式</p>
                        <p>多元化的數位廣告成效解決方案</p>
                        <p>精彩圖文完整呈現</p>
                        <p>20個內容廣告單元</p>
                        <p>15個連結單元</p>
                    </div>
                    <div class="panel-footer">
                        <h3>NT$60,000</h3>
                        <h4>半年</h4>
                        <button class="btn btn-lg btn-primary">馬上瞭解</button>
                    </div>
                </div>
            </div>

            <div class="col-md-offset-4 col-md-4 col-sm-6 col-xs-12 ">
                <div class="panel panel-default text-center panel-min-height">
                    <div class="panel-heading">
                        <h1>優惠試用方案</h1>
                    </div>
                    <div class="panel-body panel-body-height">
                        <p>支援文字、影音、圖像等多元格式</p>
                        <p>多元化的數位廣告成效解決方案</p>
                        <p>精彩圖文完整呈現</p>
                        <p>1個內容廣告單元</p>
                    </div>
                    <div class="panel-footer">
                        <h3>NT$100</h3>
                        <h4>1天</h4>
                        <button class="btn btn-lg btn-primary">馬上瞭解</button>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Information Tabs -->
    <div id="info_tabs" class="container slideanim">
    <!-- <h3 class="text-center">From The Blog</h3> --> 
        <ul class="nav nav-tabs">
            <li><a data-toggle="tab" href="#home">成立</a></li>
            <li><a data-toggle="tab" href="#menu1">關於我們</a></li>
            <li class="active"><a data-toggle="tab" href="#menu2">聯絡資訊</a></li>
        </ul>

        <div class="tab-content">
            <div id="home" class="tab-pane fade">
                <h3>成立</h3>
                <p>於2016年12月成立。</p>
            </div>
            <div id="menu1" class="tab-pane fade">
                <h3>關於我們</h3>
                <p>我們的願景是打造一個開放創新的資訊平台。</p>
            </div>
            <div id="menu2" class="tab-pane fade in active">
                <h3>聯絡資訊</h3>
                <p>704台南市北區文賢路720號</p>
                <p>mail@mail.com</p>
            </div>
        </div>
    </div>

    <!-- GoogleMap -->
    <div id="gmap" class="container slideanim">
        <iframe class="col-md-12 " src="https://maps.google.com/?q=台南市北區文賢路720號&output=embed&t=d" width="100%" height="400px" frameborder="0" style="border:none;"></iframe>
    </div>
@stop
