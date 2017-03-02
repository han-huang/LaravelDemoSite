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
<!-- script type="text/javascript" src="{{ asset('js/bootstrap-hover-tabs.js') }}"></script> -->

@stop

@section('css')
<!-- font-awesome -->
<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
<!-- textslider -->
<link href="{{ asset('css/textslider.css') }}" rel="stylesheet" type="text/css">
<!-- jssocials -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/jssocials.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/jssocials-theme-classic.css') }}" />

<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{ asset('css/w3.css') }}">
<link rel="stylesheet" href="{{ asset('css/hover-min.css') }}">
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

.salebox-title{ background-color:#06b8ea;border: 1px solid #06b8ea; color:#fff; padding:6px 8px; margin:0px; clear:both; border-radius: 2px 2px 0px 0px;}
.salebox-title a{color:#FFFFFF;}
.salebox-title a:hover{color:#000000;}

.salebox ul{padding:0px;border: 1px solid #22272b;}
.salebox li{ list-style:none; border-bottom:0px dotted #c3c3c3; padding:2px 2px ; overflow:hidden;font-size:15px;}
.salebox li:nth-last-of-type(1){border-bottom:none;}
/*
.salebox li span{ display:block; padding:0px; color:#777; font-size:0.95em;}
.salebox li a{display:block; color:#000; font-size:1em; line-height:1.6em; }
.salebox li a:hover{color:#06a4d1;}
.salebox li a img{ margin-left:20px;}
*/
.salebox li .tab{display:inline-block; background-color:#06b8ea; padding:1px 10px 2px; margin:0px 0px 3px; color:#fff; font-size:0.9em;}

.salebox a:hover, .salebox img:hover  {
  color: #FF6347;
  opacity: 0.6;
}

.img-padding {
  padding:10px 0px !important;
}

.w3-ul img {
  margin-bottom:10px;
  display: none;
}

.w3-ul li:first-child img {
  display: block;
}

ul.w3-ul li {
  border-left: 1px solid #ddd;
  border-right: 1px solid #ddd;
}

ul.w3-ul {
  border-top: 1px solid #ddd;
  border-bottom: 1px solid #ddd;
}

ul.w3-ul li {
  padding: 6px 2px 2px 10px;
  border-bottom: 0px solid #ddd;
}

#billboard {
  font-size: 15px;
}
#billboard .nav-tabs a{
  font-size: 15px;
  padding: 5px;
}

#billboard .nav-tabs a { background-color:#8c8c8c !important; color:#fff !important;border: 0px solid #8c8c8c;}
#billboard .nav-tabs .active a{ background-color:#06b8ea !important;color:#fff !important;}

#billboard .nav>li>a:focus {
  background-color: #ffffff;
}

#billboard .nav>li>a {
  /*padding: 5px 5px;*/
}

#billboard img {
  width: auto;
  height: 80px;
  /*center*/
  margin-left: auto;
  margin-right: auto;
}

#billboard li span {
  font-weight: bold;
  color: #FF4500;
}

.w3-ul li a:hover {
  color: #FF6347;
  opacity: 0.6;
}

li.theme-color{text-indent:16px;font-weight:bold;color:orange;font-size:1em;}

.tab-hover .nav-tabs a { background-color:#8c8c8c !important; color:#fff !important;border: 1px solid #8c8c8c !important;}
.tab-hover .nav-tabs .active a{ background-color:#06b8ea !important;color:#fff !important;border: 1px solid #06b8ea !important;}
.tab-hover .nav>li>a:focus {
  background-color: #ffffff;
}

.tab-li {
  width: 182px;
}

.tab-li img {
  width: 100px;
}

.tab-li p {
  margin-top: 10px;
  font-size: 14px;
}

.tab-li a:hover {
  color: #FF6347;
  opacity: 0.6;
}

.tab-ul {
  margin-left:10px;
  margin-top:10px;
}

#book_categories {
  font-size:14px;
  margin:15px 5px 10px 5px;
}

#book_categories .list-group.panel > .list-group-item {
  border-bottom-right-radius: 4px;
  border-bottom-left-radius: 4px
}

#book_categories .list-group-submenu a {
  /*margin-left:20px;*/
  padding-left:30px;
}

#book_categories .list-group-submenu-1 a {
  /*margin-left:20px;*/
  padding-left:40px;
}

.book-categories-box {
  border: 1px solid #22272b;
}

.text-darkred {
  color: #900 !important;
}
</style>
<script type="text/javascript">
$(document).ready(function(){
    //$(".nav-tabs a").click(function(){
    $(".tab-hover .nav-tabs a").mouseover(function() {
        $(this).tab('show');
        //id = $(this).attr('href');
        //$(id).siblings().removeClass('in').removeClass('active');
    });

    /*
    $(".tab-hover .nav-tabs a").mouseleave(function(){
        id = $(this).attr('href');
        //fix tab display sometimes
        if($(id).siblings().hasClass('in')) {
            $(id).removeClass('in').removeClass('active');
            //console.log($(this).attr('href') + " mouseleave");
        }
    });
    */

    /* img display */
    $('#billboard .w3-ul li').mouseover(function(event) {
        $(this).find("img").css("display", "block");
        $(this).siblings().find("img").css("display", "none");
    });

    $("#book_categories div").on("hide.bs.collapse", function(event) {
        if ($(this).is(event.target)) {
            $(this).prev("a").find("i").removeClass('fa-caret-up').addClass('fa-caret-down');
            //console.log(this.id);
        }
    });

    $("#book_categories div").on("show.bs.collapse", function(event) {
        if ($(this).is(event.target)) {
            $(this).prev("a").find("i").removeClass('fa-caret-down').addClass('fa-caret-up');
            //console.log(this.id);
        }
    });

});
</script>
    <!-- facebook-jssdk -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v2.8";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

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

                    <li class=""><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;結帳</a></li>
                    <li class=""><a href="#"><span class="glyphicon glyphicon-log-in"></span>&nbsp;登入</a></li>
                    <li class=""><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;加入會員</a></li>
                    <li class=""><a href="#"><span class="glyphicon glyphicon-question-sign"></span>&nbsp;FAQ</a></li>
                    <li class=""><a href="#"><i class="fa fa-users" aria-hidden="true"></i>&nbsp;會員專區</a></li>
                </ul>
            </div>
        </div><!-- bookstore-bar -->
        <!-- left -->
        <div class="col-md-2 div-margin-top" style="">
            <div id="today_discount">
                <div class="salebox-title text-left" data-desc=""><a href="#">今日66折</a></div>
                <div class="salebox" data-desc="">
                    <ul class="">
                        <a href="http://www.cite.com.tw/76a4e?#book">
                        <li class="text-center img-padding" style="">
                            <img src="{{ asset('img/bookstore/BW0614.jpg') }}" alt="2016" style="" alt="虛擬實境狂潮：從購物、教育到醫療，VR/AR商機即將顛覆未來的十大產業！" title="虛擬實境狂潮：從購物、教育到醫療，VR/AR商機即將顛覆未來的十大產業！">
                        </li>
                        <li class="text-center">《虛擬實境狂潮：從購物、教育到醫療，V...》</li>
                        <li class="text-center"><span class="" style="color:red">66折價 $ 251 元</span></li>
                        </a>
                        <li class="text-center"><a class="w3-button w3-dark-grey w3-round-large" href="http://www.cite.com.tw/shopping_cart?action=add_cart&amp;products_id=69936">放入購物車</a></li>
                    </ul>
                </div>
            </div>

            <div>
                <div class="salebox-title text-left" data-desc=""><a href="#">書目分類</a></div>
                <div class="book-categories-box" data-desc="" style="border: 1px solid #22272b;">

                    <div id="book_categories" class="list-group panel">
                      <a href="#" class="list-group-item text-darkred" data-parent="#MainMenu">商管理財</a>
                      <a href="#" class="list-group-item text-darkred" data-parent="#MainMenu">文學小說</a>
                      <a href="#demo3" class="list-group-item text-darkred" data-toggle="collapse" data-parent="#MainMenu">心靈健康&nbsp;<i class="fa fa-caret-down"></i></a>
                      <div class="collapse" id="demo3">
                        <a href="#SubMenu1" class="list-group-item" data-toggle="collapse" data-parent="#SubMenu1">心理勵志 <i class="fa fa-caret-down"></i></a>
                        <div class="collapse list-group-submenu" id="SubMenu1">
                          <a href="#" class="list-group-item" data-parent="#SubMenu1">心靈成長</a>
                          <a href="#" class="list-group-item" data-parent="#SubMenu1">人際關係</a>
                          <a href="#SubSubMenu1" class="list-group-item" data-toggle="collapse" data-parent="#SubSubMenu1">心理學&nbsp;<i class="fa fa-caret-down"></i></a>
                          <div class="collapse list-group-submenu list-group-submenu-1" id="SubSubMenu1">
                            <a href="#" class="list-group-item" data-parent="#SubSubMenu1">心理學理論</a>
                            <a href="#" class="list-group-item" data-parent="#SubSubMenu1">心理學案例</a>
                          </div>
                          <a href="#" class="list-group-item" data-parent="#SubMenu1">勵志故事</a>
                        </div>
                        <a href="javascript:;" class="list-group-item">潛能開發</a>
                        <a href="javascript:;" class="list-group-item">兩性關係</a>
                      </div>
                      <a href="#demo4" class="list-group-item text-darkred" data-toggle="collapse" data-parent="#MainMenu">生活休閒&nbsp;<i class="fa fa-caret-down"></i></a>
                      <div class="collapse" id="demo4">
                        <a href="" class="list-group-item">旅遊</a>
                        <a href="" class="list-group-item">居家嗜好</a>
                        <a href="" class="list-group-item">美食休閒</a>
                      </div>
                    </div><!-- book_categories -->
                </div><!-- book-categories-box -->
            </div>
        </div><!-- left -->

        <!-- middle -->
        <div class="col-md-8 div-margin-top" style="border: 0px solid red;">
            <a href="#">
            <img src="{{ asset('img/bookstore/20161.jpg') }}" alt="2016" style="width: 100%;height: auto;">
            </a>
            <div id="new_coming " class="div-margin-top tab-hover " style="border: 0px solid green;">
                <div style="border: 0px solid Purple;">
                    <ul class="nav nav-tabs nav-justified">
                        <li class="theme-color" class="hvr-box-shadow-inset">近期新品</li>
                        <li class="active"><a data-toggle="tab" href="#suggest-new" class="hvr-box-shadow-inset">新書推薦</a></li>
                        <!-- <li><a data-toggle="tab" href="#menu1">Chandler</a></li> -->
                        <li><a data-toggle="tab" href="#suggest-hits" class="hvr-box-shadow-inset">熱門推薦</a></li>
                        <li><a data-toggle="tab" href="#editor" class="hvr-box-shadow-inset">編輯精選</a></li>
                        <li><a data-toggle="tab" href="#activity" class="hvr-box-shadow-inset">活動套書</a></li>
                    </ul>
                </div>
                <div class="tab-content" style="border: 1px solid #ddd;">
                    <div id="suggest-new" class="tab-pane fade in active"  style="border: 0px solid Magenta;">
                        <div class="row text-center">
                        <ul class="list-inline text-center tab-ul" style="border: 0px solid blue;">
                            <li class="col-md-2 tab-li" style="">
                                <a href="#">
                                <img class="img-thumbnail" src="{{ asset('img/bookstore/BW0614.jpg') }}" alt="VR" style="">
                                <p><span class=""></span>《虛擬實境狂潮：從購物、教育到醫療，V...》</p>
                                </a>
                            </li>
                            <li class="col-md-2 tab-li" style="">
                                <a href="#">
                                <img class="img-thumbnail" src="{{ asset('img/bookstore/BW0614.jpg') }}" alt="VR" style="">
                                <p><span class=""></span>《虛擬實境狂潮：從購物、教育到醫療，V...》</p>
                                </a>
                            </li>
                            <li class="col-md-2 tab-li" style="">
                                <a href="#">
                                <img class="img-thumbnail" src="{{ asset('img/bookstore/BW0614.jpg') }}" alt="VR" style="">
                                <p><span class=""></span>《虛擬實境狂潮：從購物、教育到醫療，V...》</p>
                                </a>
                            </li>
                            <li class="col-md-2 tab-li" style="">
                                <a href="#">
                                <img class="img-thumbnail" src="{{ asset('img/bookstore/BW0614.jpg') }}" alt="VR" style="">
                                <p><span class=""></span>《虛擬實境狂潮：從購物、教育到醫療，V...》</p>
                                </a>
                            </li>
                        </ul>
                        </div>
                        <div class="row text-center">
                        <ul class="list-inline text-center tab-ul" style="border: 0px solid red;">
                            <li class="col-md-2 tab-li" style="">
                                <a href="#">
                                <img class="img-thumbnail" src="{{ asset('img/bookstore/1HB093.jpg') }}" alt="VR" style="">
                                <p><span class=""></span>軍團：布蘭登．山德森精選集II</p>
                                </a>
                            </li>
                            <li class="col-md-2 tab-li" style="">
                                <a href="#">
                                <img class="img-thumbnail" src="{{ asset('img/bookstore/1HB093.jpg') }}" alt="VR" style="">
                                <p><span class=""></span>軍團：布蘭登．山德森精選集II</p>
                                </a>
                            </li>
                            <li class="col-md-2 tab-li" style="">
                                <a href="#">
                                <img class="img-thumbnail" src="{{ asset('img/bookstore/1HB093.jpg') }}" alt="VR" style="">
                                <p><span class=""></span>軍團：布蘭登．山德森精選集II</p>
                                </a>
                            </li>
                            <li class="col-md-2 tab-li" style="">
                                <a href="#">
                                <img class="img-thumbnail" src="{{ asset('img/bookstore/1HB093.jpg') }}" alt="VR" style="">
                                <p><span class=""></span>軍團：布蘭登．山德森精選集II</p>
                                </a>
                            </li>
                        </ul>
                        </div>
                    </div><!-- suggest-new -->

                    <div id="suggest-hits" class="tab-pane fade">
                        <div class="row text-center">
                        <ul class="list-inline text-center tab-ul" style="margin-left:10px">
                            <li class="col-md-2 tab-li" style="">
                                <a href="#">
                                <img class="img-thumbnail" src="{{ asset('img/bookstore/QB1134.jpg') }}" alt="VR" >
                                <p><span class=""></span>低谷到重生，轉型為全球企業的秘密</p>
                                </a>
                            </li>
                            <li class="col-md-2 tab-li" style="">
                                <a href="#">
                                <img class="img-thumbnail" src="{{ asset('img/bookstore/QB1134.jpg') }}" alt="VR" style="">
                                <p><span class=""></span>低谷到重生，轉型為全球企業的秘密</p>
                                </a>
                            </li>
                            <li class="col-md-2 tab-li" style="">
                                <a href="#">
                                <img class="img-thumbnail" src="{{ asset('img/bookstore/QB1134.jpg') }}" alt="VR" style="">
                                <p><span class=""></span>低谷到重生，轉型為全球企業的秘密</p>
                                </a>
                            </li>
                            <li class="col-md-2 tab-li" style="">
                                <a href="#">
                                <img class="img-thumbnail" src="{{ asset('img/bookstore/QB1134.jpg') }}" alt="VR" style="">
                                <p><span class=""></span>低谷到重生，轉型為全球企業的秘密</p>
                                </a>
                            </li>
                        </ul>
                        </div>
                        <div class="row text-center">
                        <ul class="list-inline text-center tab-ul" style="margin-left:10px">
                            <li class="col-md-2 tab-li" style="">
                                <a href="#">
                                <img class="img-thumbnail" src="{{ asset('img/bookstore/QB1134.jpg') }}" alt="VR" >
                                <p><span class=""></span>低谷到重生，轉型為全球企業的秘密</p>
                                </a>
                            </li>
                            <li class="col-md-2 tab-li" style="">
                                <a href="#">
                                <img class="img-thumbnail" src="{{ asset('img/bookstore/QB1134.jpg') }}" alt="VR" style="">
                                <p><span class=""></span>低谷到重生，轉型為全球企業的秘密</p>
                                </a>
                            </li>
                            <li class="col-md-2 tab-li" style="">
                                <a href="#">
                                <img class="img-thumbnail" src="{{ asset('img/bookstore/QB1134.jpg') }}" alt="VR" style="">
                                <p><span class=""></span>低谷到重生，轉型為全球企業的秘密</p>
                                </a>
                            </li>
                            <li class="col-md-2 tab-li" style="">
                                <a href="#">
                                <img class="img-thumbnail" src="{{ asset('img/bookstore/QB1134.jpg') }}" alt="VR" style="">
                                <p><span class=""></span>低谷到重生，轉型為全球企業的秘密</p>
                                </a>
                            </li>
                        </ul>
                        </div>
                    </div><!-- suggest-hits -->

                    <div id="editor" class="tab-pane fade">
                        <div class="row text-center">
                        <ul class="list-inline text-center tab-ul" style="margin-left:10px">
                            <li class="col-md-2 tab-li" style="">
                                <a href="#">
                                <img class="img-thumbnail" src="{{ asset('img/bookstore/210067513000101.jpg') }}" alt="VR" style="">
                                <p><span class=""></span>自古英雄多魯蛇！呂捷教你歷史和人性</p>
                                </a>
                            </li>
                            <li class="col-md-2 tab-li" style="">
                                <a href="#">
                                <img class="img-thumbnail" src="{{ asset('img/bookstore/210067513000101.jpg') }}" alt="VR" style="">
                                <p><span class=""></span>自古英雄多魯蛇！呂捷教你歷史和人性</p>
                                </a>
                            </li>
                            <li class="col-md-2 tab-li" style="">
                                <a href="#">
                                <img class="img-thumbnail" src="{{ asset('img/bookstore/210067513000101.jpg') }}" alt="VR" style="">
                                <p><span class=""></span>自古英雄多魯蛇！呂捷教你歷史和人性</p>
                                </a>
                            </li>
                            <li class="col-md-2 tab-li" style="">
                                <a href="#">
                                <img class="img-thumbnail" src="{{ asset('img/bookstore/210067513000101.jpg') }}" alt="VR" style="">
                                <p><span class=""></span>自古英雄多魯蛇！呂捷教你歷史和人性</p>
                                </a>
                            </li>
                        </ul>
                        </div>
                        <div class="row text-center">
                        <ul class="list-inline text-center tab-ul" style="margin-left:10px">
                            <li class="col-md-2 tab-li" style="">
                                <a href="#">
                                <img class="img-thumbnail" src="{{ asset('img/bookstore/210067513000101.jpg') }}" alt="VR" >
                                <p><span class=""></span>自古英雄多魯蛇！呂捷教你歷史和人性</p>
                                </a>
                            </li>
                            <li class="col-md-2 tab-li" style="">
                                <a href="#">
                                <img class="img-thumbnail" src="{{ asset('img/bookstore/210067513000101.jpg') }}" alt="VR" style="">
                                <p><span class=""></span>自古英雄多魯蛇！呂捷教你歷史和人性</p>
                                </a>
                            </li>
                            <li class="col-md-2 tab-li" style="">
                                <a href="#">
                                <img class="img-thumbnail" src="{{ asset('img/bookstore/210067513000101.jpg') }}" alt="VR" style="">
                                <p><span class=""></span>自古英雄多魯蛇！呂捷教你歷史和人性</p>
                                </a>
                            </li>
                            <li class="col-md-2 tab-li" style="">
                                <a href="#">
                                <img class="img-thumbnail" src="{{ asset('img/bookstore/210067513000101.jpg') }}" alt="VR" style="">
                                <p><span class=""></span>自古英雄多魯蛇！呂捷教你歷史和人性</p>
                                </a>
                            </li>
                        </ul>
                        </div>
                    </div><!-- editor -->

                    <div id="activity" class="tab-pane fade">
                        <div class="row text-center">
                        <ul class="list-inline text-center tab-ul" style="margin-left:10px">
                            <li class="col-md-2 tab-li" style="">
                                <a href="#">
                                <img class="img-thumbnail" src="{{ asset('img/bookstore/1HB093.jpg') }}" alt="VR" style="">
                                <p><span class=""></span>軍團：布蘭登．山德森精選集II</p>
                                </a>
                            </li>
                            <li class="col-md-2 tab-li" style="">
                                <a href="#">
                                <img class="img-thumbnail" src="{{ asset('img/bookstore/1HB093.jpg') }}" alt="VR" style="">
                                <p><span class=""></span>軍團：布蘭登．山德森精選集II</p>
                                </a>
                            </li>
                            <li class="col-md-2 tab-li" style="">
                                <a href="#">
                                <img class="img-thumbnail" src="{{ asset('img/bookstore/1HB093.jpg') }}" alt="VR" style="">
                                <p><span class=""></span>軍團：布蘭登．山德森精選集II</p>
                                </a>
                            </li>
                            <li class="col-md-2 tab-li" style="">
                                <a href="#">
                                <img class="img-thumbnail" src="{{ asset('img/bookstore/1HB093.jpg') }}" alt="VR" style="">
                                <p><span class=""></span>軍團：布蘭登．山德森精選集II</p>
                                </a>
                            </li>
                        </ul>
                        </div>
                        <div class="row text-center">
                        <ul class="list-inline text-center tab-ul" style="margin-left:10px">
                            <li class="col-md-2 tab-li" style="">
                                <a href="#">
                                <img class="img-thumbnail" src="{{ asset('img/bookstore/1HB093.jpg') }}" alt="VR" >
                                <p><span class=""></span>軍團：布蘭登．山德森精選集II</p>
                                </a>
                            </li>
                            <li class="col-md-2 tab-li" style="">
                                <a href="#">
                                <img class="img-thumbnail" src="{{ asset('img/bookstore/1HB093.jpg') }}" alt="VR" style="">
                                <p><span class=""></span>軍團：布蘭登．山德森精選集II</p>
                                </a>
                            </li>
                            <li class="col-md-2 tab-li" style="">
                                <a href="#">
                                <img class="img-thumbnail" src="{{ asset('img/bookstore/1HB093.jpg') }}" alt="VR" style="">
                                <p><span class=""></span>軍團：布蘭登．山德森精選集II</p>
                                </a>
                            </li>
                            <li class="col-md-2 tab-li" style="">
                                <a href="#">
                                <img class="img-thumbnail" src="{{ asset('img/bookstore/1HB093.jpg') }}" alt="VR" style="">
                                <p><span class=""></span>軍團：布蘭登．山德森精選集II</p>
                                </a>
                            </li>
                        </ul>
                        </div>
                    </div><!-- activity -->
                </div><!-- tab-content -->
            </div><!-- new_coming -->
        </div><!-- middle -->

        <!-- right -->
        <div id="" class="col-md-2 div-margin-top">
            <div id="billboard" class="tab-hover">
                <ul class="nav nav-tabs nav-justified">
                    <li class="active"><a data-toggle="tab" href="#newbooks" class="hvr-box-shadow-inset">新書排行</a></li>
                    <!-- <li><a data-toggle="tab" href="#menu1">Chandler</a></li> -->
                    <li><a data-toggle="tab" href="#hits" class="hvr-box-shadow-inset">熱銷排行</a></li>
                </ul>

                <div class="tab-content">
                    <div id="newbooks" class="tab-pane fade in active">
                        <ul class="w3-ul ">
                            <li class="">
                                <a href="#">
                                <p><span class="">1.</span>《虛擬實境狂潮：從購物、教育到醫療，V...》</p>
                                <img class="img-thumbnail" src="{{ asset('img/bookstore/BW0614.jpg') }}" alt="VR"  style="">
                                </a>
                            </li>
                            <li class="">
                                <a href="#">
                                <p><span class="">2.</span>《虛擬實境狂潮：從購物、教育到醫療，V...》</p>
                                <img class="img-thumbnail" src="{{ asset('img/bookstore/BW0614.jpg') }}" alt="VR"  style="">
                                </a>
                            </li>
                            <li class="">
                                <a href="#">
                                <p><span class="">3.</span>《虛擬實境狂潮：從購物、教育到醫療，V...》</p>
                                <img class="img-thumbnail" src="{{ asset('img/bookstore/BW0614.jpg') }}" alt="VR"  style="">
                                </a>
                            </li>
                        </ul>
                    </div><!-- newbooks -->
                    <div id="hits" class="tab-pane fade">
                        <ul class="w3-ul ">
                            <li class="">
                                    <a href="#">
                                    <p><span class="">1.</span>《虛擬實境狂潮：從購物、教育到醫療，V...》</p>
                                    <img class="img-thumbnail" src="{{ asset('img/bookstore/BW0614.jpg') }}" alt="VR"  style="">
                                    </a>
                            </li>
                            <li class="">
                                    <a href="#">
                                    <p><span class="">2.</span>《虛擬實境狂潮：從購物、教育到醫療，V...》</p>
                                    <img class="img-thumbnail" src="{{ asset('img/bookstore/BW0614.jpg') }}" alt="VR"  style="">
                                    </a>
                            </li>
                            <li class="">
                                    <a href="#">
                                    <p><span class="">3.</span>《虛擬實境狂潮：從購物、教育到醫療，V...》</p>
                                    <img class="img-thumbnail" src="{{ asset('img/bookstore/BW0614.jpg') }}" alt="VR"  style="">
                                    </a>
                            </li>
                        </ul>
                    </div><!-- hits -->
                </div><!-- tab-content -->
            </div><!-- billboard -->
        </div><!-- right -->

    </div>
@stop
