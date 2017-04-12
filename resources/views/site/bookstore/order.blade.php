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

.box-title{ background-color:#06b8ea;border: 1px solid #06b8ea; color:#fff; padding:6px 8px; margin:0px; clear:both; border-radius: 2px 2px 0px 0px;}
.box-title a{color:#FFFFFF;}
.box-title a:hover{color:#000000;}

.img-padding {
  padding:10px 0px !important;
}

.panel-box li {
  padding:6px 8px 0px 8px;
}

.deeporange-color {
  color: #d93800;
}

.span-price {
  display: inline-block;
  width:60px
}

.deeporange-color {
  color: #d93800;
}
</style>
<script type="text/javascript">
$(document).ready(function(){
    $('#result_table').on('click', 'button', function (event) {
        var orderid = $(this).data("id");
        // console.log('orderid: ' + orderid);
        if($('#details-' + orderid).length) {
            $('#details-' + orderid).modal();
        } else {
            $.ajax({
                type: "GET",
                cache: true,
                url: "/ajax/order/details/" + orderid,
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
                // console.log(JSON.stringify(data, undefined, 2));
                // console.log(textStatus);
                if (data.status == "done" && data.modal != undefined) {
                    if (!document.getElementById('details-'+ orderid))
                        $('#order').append(data.modal);
                    $('#details-' + orderid).modal();
                }
            }).fail(function (jqXHR, textStatus, errorThrown) {
                console.log('jqXHR.responseText: ' + jqXHR.responseText);
                console.log('jqXHR.status: ' + jqXHR.status);
                // msg = JSON.parse(jqXHR.responseText);
                // jAlert(msg.error.message, '注意');
            }).always(function (jqXHR, textStatus) {
                $.unblockUI();
            });
        }
    });
});
</script>
    <div class="container div-top decoration-none" style="border: 0px solid red;">
        @include('site.bookstore.bar')

        <!-- left -->
        <div class="col-md-2 div-margin-top" style="">
            <div class="panel-box">
                <div class="box-title text-left" data-desc="">交易紀錄</div>
                <div class="" data-desc="" style="border:1px solid black;">
                    <ul class="" style='list-style-type: none;padding-left:10px;'>
                        <li class="text-left"><a href="">訂單查詢</a></li>
                        <li class="text-left"><a href="">發票查詢</a></li>
                    </ul>
                </div>
            </div>

            <div class="div-margin-top panel-box">
                <div class="box-title text-left" data-desc="">會員資料</div>
                <div class="" data-desc="" style="border:1px solid black;">
                    <ul class="" style='list-style-type: none;padding-left:10px;'>
                        <li class="text-left"><a href="">修改會員資料</a></li>
                        <li class="text-left"><a href="">修改密碼</a></li>
                    </ul>
                </div>
            </div>
        </div><!-- left -->

        <!-- right -->
        <div id="order" class="col-md-10 div-margin-top" style="border: 0px solid red;">
            <div class="">
                <form id="cart_form" role="form">
                {{ csrf_field() }}
                <table class="table table-hover " style="border: 1px solid #ddd;margin-bottom:10px">
                    <thead>
                        <tr>
                            <th colspan='5' class="box-title">訂單查詢</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <tr>
                            <td class="col-md-2" style=""><label>查詢條件</label></td>
                            <td class="col-md-2" style=""><input type="radio" id="one_month" name="condition" value="" {{ Presenter::radioCheck($condition, 'one') }}>&nbsp;<label for="">一個月內訂單</label></td>
                            <td class="col-md-2" style=""><input type="radio" id="six_month" name="condition" value="" {{ Presenter::radioCheck($condition, 'six') }}>&nbsp;<label for="">六個月內訂單</label></td>
                            <td class="col-md-2"></td>
                            <td class="col-md-2"></td>
                        </tr>
                        <tr>
                            <td class="col-md-2" style=""><label>訂單編號</label></td>
                            <td class="col-md-4" style=""><input type="radio" id="" name="condition" value="" {{ Presenter::radioCheck($condition, 'order_no') }}>&nbsp;<input type="text" id="" name="" value=""></td>
                            <td class="col-md-1"></td>
                            <td class="col-md-1"></td>
                            <td class="col-md-2"></td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-center" style="padding-bottom:10px"><button type="button" class="" id='' data-id="" >查詢</button></div>
                </form>
            </div>

            <div class="" style="border: 1px solid #ddd;margin-top:20px">
                <table id="result_table" class="table table-hover ">
                    <thead>
                        <tr>
                            <th colspan='7' class="box-title">查詢結果</th>
                        </tr>
                        <tr>
                            <td class="col-md-1" style=""><label>訂單編號</label></td>
                            <td class="col-md-1" style=""><label>訂單日期</label></td>
                            <td class="col-md-1" style=""><label>配送方式</label></td>
                            <td class="col-md-1" style=""><label>付款方式</label></td>
                            <td class="col-md-1" style=""><label>訂單金額</label></td>
                            <td class="col-md-1" style=""><label>處理狀態</label></td>
                            <td class="col-md-1" style=""><label>明細</label></td>
                        </tr>
                    </thead>
                    <tbody class="">
                        @if(count($lastMonthOrders))
                            @foreach($lastMonthOrders as $order)
                            <tr>
                                <td class="col-md-1" style="">{{ $order->order_no }}</td>
                                <td class="col-md-1" style="">{{ Presenter::getYMD($order->created_at) }}</td>
                                <td class="col-md-1" style="">{{ Presenter::deliver_str($order->deliver) }}</td>
                                <td class="col-md-1" style="">{{ Presenter::payment_methond_str($order->payment_methond) }}</td>
                                <td class="col-md-1" style="">{{ $order->amount }}</td>
                                <td class="col-md-1" style="">{{ Presenter::showOrderStatus($order->status) }}</td>
                                <td class="col-md-1" style=""><button type="button" id='' data-id="{{ $order->id }}">明細</button></td>
                            </tr>
                            @endforeach
                        @else
                        <tr>
                            <td colspan='7' class="col-md-7 text-center"><span class="deeporange-color">查無訂單資料</span></td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div><!-- right -->

    </div>
@stop
