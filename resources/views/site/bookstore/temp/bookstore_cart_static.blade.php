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

.cart-header{ background-color:#b3b3b3;border: 0px solid #06b8ea; color:#fff; padding:6px 8px; margin:0px; clear:both; border-radius: 2px 2px 0px 0px;}
.cart-header a{color:#FFFFFF;}
.cart-header a:hover{color:#000000;}

.shopping-cart {
  padding: 0px 50px;
}

.tab-hover .nav-tabs a { background-color:#8c8c8c !important; color:#fff !important;border: 1px solid #8c8c8c !important;}
.tab-hover .nav-tabs .active a{ background-color:#06b8ea !important;color:#fff !important;border: 1px solid #06b8ea !important;}
.tab-hover .nav>li>a:focus {
  background-color: #ffffff;
}

.cart-table {
  padding: 20px;
}

.deeporange-color {
  color: #d93800;
}
</style>
<script type="text/javascript">
$(document).ready(function(){
    // checkbox - select/exclude all
    $('#cart_form').on('click', '.checkAll', function () {
        //console.log($(this).attr("id") + $(this).prop("checked"));
        if ($(this).prop("checked")) {
            // console.log($(this).attr("id") + " select");
            $('tbody input[type="checkbox"]').each(function () {
                $(this).prop("checked", true);
                // console.log($(this).attr("id") + " select");
            });
        } else {
            // console.log($(this).attr("id") + " exclude");
            $('tbody input[type="checkbox"]').each(function () {
                $(this).prop("checked", false);
                // console.log($(this).attr("id") + " exclude");
            });
        }
    });

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
                        <form class="form-inline">
                        <div class="form-group">
                            <select class="form-control" id="">
                              <option value="all">全部</option>
                              <option value="book">書名</option>
                              <option value="author">作者</option>
                              <option value="publisher">出版社</option>
                              <option value="isbn">ISBN</option>
                            </select>
                            <input type="text" class="form-control" placeholder="關鍵字搜尋">
                            <button type="submit" class="btn btn-default">搜尋</button>
                        </div>
                        </form>
                    </li>

                    <li class=""><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;購物車</a></li>
                    <li class=""><a href="#"><span class="glyphicon glyphicon-log-in"></span>&nbsp;登入</a></li>
                    <li class=""><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;加入會員</a></li>
                    <li class=""><a href="#"><span class="glyphicon glyphicon-question-sign"></span>&nbsp;FAQ</a></li>
                    <li class=""><a href="#"><i class="fa fa-users" aria-hidden="true"></i>&nbsp;會員專區</a></li>
                </ul>
            </div>
        </div><!-- bookstore-bar -->

        <!-- progressbar -->
        <div class="col-md-12" style="">
            <div class="progressbar-container text-center">
                <ul class="progressbar">
                    <li class="progressbar-active">檢視購物車</li>
                    <li>付款方式及寄送資訊</li>
                    <li>確認訂單資料</li>
                    <li>訂單成立</li>
                </ul>
            </div>
        </div><!-- progressbar -->

        <div class="col-md-12 shopping-cart" style="">
            <div class=" text-left tab-hover" data-desc="">
                <ul class="nav nav-tabs ">
                    <li class="active"><a data-toggle="tab" href="#" class="">購物明細</a></li>
                </ul>
            </div>
            <div class="tab-content cart-table" style="border: 1px solid #ddd;">
                <form id="cart_form" role="form" action="" method="POST">
                {{ csrf_field() }}
                <table class="table table-hover ">
                    <thead>
                        <tr class="info">
                            <th><input type="checkbox" value="" class="checkAll" id="checkAll" name="checkAll"></th>
                            <th style="width:120px">全選/取消</th>
                            <th>商品名稱</th>
                            <th style="width:120px">定價(NT$)</th>
                            <th style="width:120px">售價(NT$)</th>
                            <th style="width:50px">數量</th>
                            <th style="width:120px">小計(NT$)</th>
                            <th style="width:100px">變更明細</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <input type="hidden" name="id" value="1">
                            <td><div class="form-group"><input name="cartCheck[]" id="check1" type="checkbox" value="" ></div></td>
                            <td><a href=""><img class="img-thumbnail" src="/storage/books/March2017/RVSWmBp8TQkF74TecDZq-small.jpg" alt="失控的歐元︰從經濟整合的美夢到制度失靈的惡夢" style="width:100px"></a></td>
                            <td><a href="">失控的歐元︰從經濟整合的美夢到制度失靈的惡夢</a></td>
                            <td>480元</td>
                            <td><span class="deeporange-color">79折</span><br>379元</td>
                            <td><div class="form-group"><input onchange="" type="text" value="1" style="width:50px"></div></td>
                            <td>379元</td>
                            <td><button type="button" class="btn" onclick="">刪除</button></td>
                        </tr>

                        <tr>
                            <input type="hidden" name="id" value="1">
                            <td><div class="form-group"><input name="cartCheck[]" id="check2" type="checkbox" value="" ></div></td>
                            <td><a href=""><img class="img-thumbnail" src="/storage/books/March2017/RVSWmBp8TQkF74TecDZq-small.jpg" alt="失控的歐元︰從經濟整合的美夢到制度失靈的惡夢" style="width:100px"></a></td>
                            <td><a href="">失控的歐元︰從經濟整合的美夢到制度失靈的惡夢</a></td>
                            <td>480元</td>
                            <td><span class="deeporange-color">79折</span><br>379元</td>
                            <td><div class="form-group"><input onchange="" type="text" value="1" style="width:50px"></div></td>
                            <td>379元</td>
                            <td><button type="button" class="btn" onclick="">刪除</button></td>
                        </tr>

                        <tr>
                            <input type="hidden" name="id" value="1">
                            <td><div class="form-group"><input name="cartCheck[]" id="check3" type="checkbox" value="" ></div></td>
                            <td><a href=""><img class="img-thumbnail" src="/storage/books/March2017/RVSWmBp8TQkF74TecDZq-small.jpg" alt="失控的歐元︰從經濟整合的美夢到制度失靈的惡夢" style="width:100px"></a></td>
                            <td><a href="">失控的歐元︰從經濟整合的美夢到制度失靈的惡夢</a></td>
                            <td>480元</td>
                            <td><span class="deeporange-color">79折</span><br>379元</td>
                            <td><div class="form-group"><input onchange="" type="text" value="1" style="width:50px"></div></td>
                            <td>379元</td>
                            <td><button type="button" class="btn" onclick="">刪除</button></td>
                        </tr>
                    </tbody>
                </table>
                </form>

                <div>
                    <ul class="list-inline">
                        <li>
                        <div class="">
                            <button type="button" class="btn btn-md" onclick="">刪除勾選項目</button>
                        </div>
                        </li>

                        <li class="pull-right">
                        <div>
                            <p>共&nbsp;<span class="deeporange-color">3</span>&nbsp;項商品&#xFF0C;總金額&nbsp;NT$&nbsp;<span class="deeporange-color">1000</span>&nbsp;元</p>
                        </div>
                        </li>
                    </ul>
                </div>

            </div><!-- tab-content -->

            <div class="text-right" style="margin:20px">
            <button type="button" class="btn btn-primary btn-lg" onclick="location.href='/bookstore'">繼續購物</button>
            <button type="button" class="btn btn-primary btn-lg" onclick="location.href='#'">結帳</button>
            </div>
        </div><!-- shopping-cart -->
        
    </div>

@stop
