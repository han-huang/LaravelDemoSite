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
<script src="{{ asset('js/jquery.alerts.js') }}"></script>
<script src="{{ asset('js/jquery.blockUI.js') }}"></script>

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
<link href="{{ asset('css/jquery.alerts.css') }}" rel="stylesheet" type="text/css">
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
    $('#order').on('click', function (event) {
        $.ajax({
            type: "GET",
            cache: true,
            url: "/ajax/shopping/establishOrder/",
            data: {},
            dataType: 'json',
            beforeSend: function (xhr) {
                $.blockUI({ message: '<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span><h3>處理中</h3>',
                            css: {
                                border: 'none',
                                padding: '15px',
                                backgroundColor: '#000',
                                '-webkit-border-radius': '10px',
                                '-moz-border-radius': '10px',
                                opacity: .5,
                                color: '#fff'
                            }
                });
                return xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
            }
        }).done(function (data, textStatus) {
            console.log(JSON.stringify(data, undefined, 2));
            console.log(textStatus);
            if (data.status == "done") {
                jAlert(data.message, data.title, function () {
                    location.href = data.redirectTo;
                });
            }
        }).fail(function (jqXHR, textStatus, errorThrown) {
            console.log('jqXHR.responseText: ' + jqXHR.responseText);
            console.log('jqXHR.status: ' + jqXHR.status);
            msg = JSON.parse(jqXHR.responseText);
            console.log('msg.error.message: ' + msg.error.message);
            console.log('Array.isArray(msg.error.message): ' + Array.isArray(msg.error.message));
            if (Array.isArray(msg.error.message)) {

                // for(var errormsg in msg.error.message) {
                    // jAlert(msg.error.message[errormsg], '注意', function (){
                        // jAlert(msg.error.message[errormsg], '注意',
                    // });
                    // console.log(msg.error.message[errormsg]);
                // }

                // var length = msg.error.message.length;
                // var index = 0 ;
                // jAlert(msg.error.message[index], '注意', function (){
                    // index ++;
                    // if (index < length) {
                        // jAlert(msg.error.message[index], '注意', function (){
                            // index += 1;
                            // if (index < length) {
                                    // jAlert(msg.error.message[index], '注意');
                            // }
                        // });
                    // }
                // });

                // refer to http://stackoverflow.com/questions/36456109/jalert-is-not-working-properly-in-a-loop
                // jAlert must have a handler on close to show the next one
                // Therefor generate jAlert string the use eval to execute
                length = msg.error.message.length;
                index = 0 ;
                var str = "";
                str = "jAlert(msg.error.message[index], '注意', function (){";
                for (i = 1 ; i < msg.error.message.length ; i++) {
                    str += "index++;";
                    if (i < msg.error.message.length -1)
                        str += "jAlert(msg.error.message[index], '注意', function (){";
                    else
                        str += "jAlert(msg.error.message[index], '注意');";
                }
                for (i = 1 ; i < msg.error.message.length - 1 ; i++) {
                    str += "});";
                }
                //for the first jAlert
                str += "});";
                console.log(str);
                eval(str);
            } else {
                // '購物車內尚無商品，無法繼續進行!'
                jAlert(msg.error.message, '注意', function (){
                    location.href = '/bookstore/shoppingcart';
                });
                // $(document).on("click","#popup_ok",function() {
                    // location.href = '/bookstore/shoppingcart';
                // });
            }
        }).always(function (jqXHR, textStatus) {
            $.unblockUI();
        });
    });

});
</script>
    <div class="container div-top decoration-none" style="border: 0px solid red;">
        @include('site.bookstore.bar')

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
                        <p>訂單金額&#xFF1A;NT$&nbsp;<span class="deeporange-color span-price" >{{ $amount }}</span>&nbsp;元</p>
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
                <button id="order" type="button" class="btn btn-primary btn-lg" >確認送出&nbsp;<i class="fa fa-hand-o-right" aria-hidden="true"></i></button>
            </div>

        </div>

    </div>
@stop
