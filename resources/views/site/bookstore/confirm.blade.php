@extends('site.layouts.master')

@section('meta')
<meta name="description" content="">
<meta name="author" content="Han Huang">
<!-- Open Graph Protocol  -->
<meta property="og:url"         content="{{ Request::url() }}" />
<meta property="og:type"        content="website" />
<meta property="og:title"       content="LaravelDemoSite" />
<meta property="og:description" content="LaravelDemoSite" />
<meta property="og:image"       content="" />
<meta property="og:site_name"   content="LaravelDemoSite" />
@stop

@section('pageTitle')
<title>LaravelDemoSite</title>
@stop

@section('javascript')

@stop

@section('css')
<!-- progress-bar -->
<link href="{{ asset('css/progress-bar.css') }}" rel="stylesheet" type="text/css">
<!-- font-awesome -->
<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
<!-- jssocials -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/jssocials.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/jssocials-theme-classic.css') }}" />

<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
@stop

@section('content')
<style>
.bookstore-bar {
  border:1px solid #c3c3c3;
  border-radius:4px;
  padding:10px 5px 0px 5px;
  margin-top: 10px;
  font-size: 16px;
}

.bookstore-bar li a:hover {
  color: #FFA500;
}

.deeporange-color {
  color: #d93800;
}

.span-price {
  display: inline-block;
  width:60px
}
</style>
<script type="text/javascript">
$(document).ready(function(){


});
</script>
    <div class="container div-top decoration-none" style="border: 0px solid red;">
        <!-- bookstore-bar -->
        <div class="col-md-12" style="">
            <div class="text-center bookstore-bar" style="">
                <ul class="list-inline">
                    <li class=""><a href="#"><span class=""></span>中文書</a></li>
                    <li class=""><a href="#"><span class=""></span>英文書</a></li>
                    <li class=""><a href="#"><span class=""></span>簡體書</a></li>
                    <li class=""><a href="#"><span class=""></span>門市資訊</a></li>

                    <li class="">
                        <form id="search-form" class="form-inline">
                        <div class="form-group">
                            <select class="form-control" id="">
                              <option value="all">全部</option>
                              <option value="book">書名</option>
                              <option value="author">作者</option>
                              <option value="publisher">出版社</option>
                              <option value="isbn">ISBN</option>
                            </select>
                            <input type="text" class="form-control" placeholder="關鍵字搜尋">
                            <button type="submit" form="search-form" class="btn btn-default">搜尋</button>
                        </div>
                        </form>
                    </li>

                    <li class=""><a href="{{ url('/bookstore/shoppingcart') }}"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;購物車</a></li>
                    @if (Auth::guard('client')->guest())
                        <li class=""><a href="{{ url('/login') }}"><span class="glyphicon glyphicon-log-in"></span>&nbsp;登入</a></li>
                        <li class=""><a href="{{ url('/register') }}"><span class="glyphicon glyphicon-user"></span>&nbsp;加入會員</a></li>
                    @else
                        <li class=""><a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><span class="glyphicon glyphicon-log-out"></span>&nbsp;登出</a></li>
                    @endif
                    <li class=""><a href="#"><span class="glyphicon glyphicon-question-sign"></span>&nbsp;FAQ</a></li>
                    <li class=""><a href="#"><i class="fa fa-users" aria-hidden="true"></i>&nbsp;會員專區</a></li>
                </ul>
            </div>
        </div><!-- bookstore-bar -->

        <!-- progressbar -->
        <div class="col-md-12" style="">
            <div class="progressbar-container text-center">
                <ul class="progressbar">
                    <li class="progressbar-done">檢視購物車</li>
                    <li class="progressbar-done">付款方式及寄送資訊</li>
                    <li class="progressbar-active">確認訂單資料</li>
                    <li>訂單成立</li>
                </ul>
            </div>
        </div><!-- progressbar -->

        <div class="col-md-12" style="margin-top:30px">
            <div class=" panel panel-primary">
                <div class="panel-heading">確認購物清單</div>
                <div class="panel-body">
                    <table class="table table-hover ">
                        <thead>
                            <tr class="info">
                                <th>商品名稱</th>
                                <th style="width:120px">定價(NT$)</th>
                                <th style="width:120px">售價(NT$)</th>
                                <th style="width:100px">數量</th>
                                <th style="width:120px">小計(NT$)</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if($count)
                            @foreach(Cart::instance('shopping')->content() as $row)
                            <tr>
                                <td><a href="{{ url('bookstore/book/'.$row->id) }}" target="_blank">{{ $row->name }}</a></td>
                                <td>{{ $row->options->list_price }}元</td>
                                <td><span class="deeporange-color">{{ $row->options->discount }}折</span><br>{{ $row->price }}元</td>
                                <td style="width:100px">{{ $row->qty }}</td>
                                <td>{{ $row->price * $row->qty }}元</td>
                            </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                    <div class="text-right" style="margin:20px">
                        <p>共&nbsp;<span class="deeporange-color" id="count">{{ $count }}</span>&nbsp;項商品&#xFF0C;累計&#xFF1A;NT$&nbsp;<span class="deeporange-color span-price" >{{ $total }}</span>&nbsp;元</p>
                        <p>處理費&#xFF1A;NT$&nbsp;<span class="deeporange-color span-price" >{{ $shipping_fee }}</span>&nbsp;元</p>
                        <p>訂單金額&#xFF1A;NT$&nbsp;<span class="deeporange-color span-price" >{{ $sum }}</span>&nbsp;元</p>
                    </div>
                </div><!-- panel-body -->
            </div><!-- panel -->

            <div class=" panel panel-primary"><!-- 付款方式及寄送資訊 -->
                <div class="panel-heading">付款方式及寄送資訊</div>
                <div class="panel-body">

                    <div class=" col-md-12">
                        <label class="col-lg-2 col-md-2 text-right" for="" style="">[付款&#x3001;發票]</label>
                        <div class="col-lg-10 col-md-10">
                        </div>
                    </div>

                    <div class=" ">
                        <label class="col-lg-2 col-md-6 col-sm-6 text-right" for="deliver" style="">配送方式</label>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                        <p class="">{{ Presenter::deliver_str(Presenter::showSession('deliver')) }}</p>
                        </div>
                    </div>

                    <div class=" ">
                        <label class="col-lg-2 col-md-6 col-sm-6 text-right" for="payment_methond" style="">付款方式</label>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                        <p class="">{{ Presenter::payment_methond_str(Presenter::showSession('payment_methond')) }}</p>
                        </div>
                    </div>

                    <div class=" ">
                        <label class="col-lg-2 col-md-6 col-sm-6 text-right" for="invoice_type" style="">發票資訊</label>
                        <div class="col-lg-10 col-md-6 col-sm-6">
                        <p class="">{{ Presenter::invoice_type_str(Presenter::showSession('invoice_type')) }}</p>
                        </div>
                    </div>

                    <div class=" col-md-12" style="margin:10px">
                    </div>

                    <div class=" col-md-12">
                        <label class="col-md-2 text-right" for="" style="">[訂購人資訊]</label>
                        <div class="col-md-10">
                        </div>
                    </div>
                    
                    <div class=" ">
                        <label class="col-lg-2 col-md-6 col-sm-6 text-right" for="buyer-name" style="">訂購人</label>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                        <p class="">{{ $client->name }}</p>
                        </div>
                    </div>

                    <div class=" " style="">
                        <label class="col-lg-2 col-md-6 col-sm-6 text-right" for="buyer-email" style="">訂購人&nbsp;Email</label>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                        <p class="">{{ $client->email }}</p>
                        </div>
                    </div>

                    <div class="col-md-12" style="margin:10px">
                    </div>

                    <div class=" col-md-12">
                        <label class="col-lg-2 col-md-2 text-right" for="" style="">[收件人資訊]</label>
                        <div class="col-md-10">
                        </div>
                    </div>

                    <div class=" ">
                        <label class="col-lg-2 col-md-6 col-sm-6 text-right" for="receiver-name" style="">收件人</label>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                        <p class="">{{ Presenter::showSession('name') }}</p>
                        </div>
                    </div>

                    <div class=" ">
                        <label class="col-lg-2 col-md-6 col-sm-6 text-right" for="receiver-phone" style="">收件人聯絡電話</label>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                        <p class="">{{ Presenter::showSession('phone') }}</p>
                        </div>
                    </div>

                    <div class=" ">
                        <label class="col-lg-2 col-md-6 col-sm-6 text-right" for="receiver-email" style="">收件人&nbsp;Email</label>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                        <p class="">{{ Presenter::showSession('email') }}</p>
                        </div>
                    </div>

                    <div class=" ">
                        <label class="col-lg-2 col-md-6 col-sm-6 text-right" for="receiver-zipcode" style="">收件人郵遞區號</label>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                        <p class="">{{ Presenter::showSession('zipcode') }}</p>
                        </div>
                    </div>

                    <div class=" ">
                        <label class="col-lg-2 col-md-6 col-sm-6 text-right" for="receiver-address" style="">收件人地址</label>
                        <div class="col-lg-10 col-md-6 col-sm-6">
                        <p class="">{{ Presenter::showSession('addr_city', 'addr_area', 'addr_street') }}</p>
                        </div>
                    </div>
                </div>
            </div><!-- panel 付款方式及寄送資訊 -->

            <div class="text-right" style="margin:20px">
                <button type="button" class="btn btn-primary btn-lg" onclick="location.href='/bookstore/deliver'"><i class="fa fa-hand-o-left" aria-hidden="true"></i>&nbsp;上一步</button>
                <button type="submit" form="deliver-form" class="btn btn-primary btn-lg" >確認送出&nbsp;<i class="fa fa-hand-o-right" aria-hidden="true"></i></button>
            </div>

        </div>

    </div>
@stop
