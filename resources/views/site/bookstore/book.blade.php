@extends('site.layouts.master')

@section('meta')
<meta name="description" content="">
<meta name="author" content="Han Huang">
<!-- Open Graph Protocol  -->
<meta property="og:url"         content="{{ Request::url() }}" />
<meta property="og:type"        content="website" />
<meta property="og:title"       content="{{ $book->title }}" />
<?php $briefcontent = html_entity_decode(strip_tags($book->briefcontent)); ?>
<meta property="og:description" content="{{ Presenter::truncate($briefcontent, 200) }}" />
<meta property="og:image"       content="{{ Voyager::image($book->image) }}" />
<meta property="og:site_name"   content="LaravelDemoSite 書店" />
@stop

@section('pageTitle')
<title>LaravelDemoSite</title>
@stop

@section('javascript')
<!-- script type="text/javascript" src="{{ asset('js/bootstrap-hover-tabs.js') }}"></script> -->
<!-- jssocials -->
<script src="{{ asset('js/jssocials.min.js') }}"></script>
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

.like-table{
  display:table-cell;
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

/* book */
#position_bar li a:hover {
  color: #FF6347;
}

#book_briefinfo ul, #book_briefinfo li {
  list-style:none;
}

#book_briefinfo ul {
  padding-left:10px;
}

#book_briefinfo li {
  margin:5px 0px;
}

.deeporange-color {
  color: #d93800;
}

.tangerine-color {
  color: #f28500;
}

.padding-2 {
  padding:10px 5px;
}

.share-div ul, .share-div li {
  list-style:none;

}
.share-div ul {
  padding-left:0px;
}

.jssocials {
  /* font-size: 1em; */
  font-size: 8px;;
}

.stock {
  margin-bottom:10px;   
}

.text-left {
  text-align:left;
}

#suggested-books-box {
  margin-top:50px;
  padding-top:10px;
}

#suggested-books {
  border: 1px solid #999999;
  padding: 20px 0px 10px 0px;
}

.single-book:nth-last-of-type(1) {
  border-right: none;
}

.single-book {
  display: inline-block;
  border-right: 2px dotted #999999;
  vertical-align: middle;
  width: 182px;
  height: 210px;
  text-align: center;
  padding-right: 5px;
}

.single-book img {
  width: 100px;
  height: 145px;
}

.single-book p {
  margin-top: 10px;
  font-size: 14px;
  height: 36px;
}

.single-book a:hover {
  color: #FF6347;
  opacity: 0.6;
}

.box-title{ background-color:#06b8ea;border: 1px solid #06b8ea; color:#fff; padding:6px 8px; margin:0px; clear:both; border-radius: 2px 2px 0px 0px;}
.box-title a{color:#FFFFFF;}
.box-title a:hover{color:#000000;}

.box-title-fixed {
  position: fixed;
  top: 50px;
  width: 950px;
}

.underside-div {
  padding: 0px;
  margin-bottom: 20px;
  margin-top: 40px;
}

.book-info-block {
  clear: right;
  padding:0;
}

.book-info-detail {
  padding:6px 8px;
  overflow:hidden;
}

.limitHeight {
  max-height: 400px;
}

.book-info-detail h4 {
  margin-top: 10px;
  margin-bottom: 0px;
}

.book-info-detail hr {
  margin-top: 5px;
  margin-bottom: 10px;
  color: #ddd;
}

.open-close-div {
  clear:both;
  float:right;
  margin-top:10px;
  padding-right:20px;
}

.open-close-div i {
  margin-left:2px;  
}

.listed-box {
  padding: 6px 8px;
  margin-bottom: 50px;
}

.listed-box h4 {
  margin-top: 0px;
  margin-bottom: 0px;
}

.listed-box hr {
  margin-top: 5px;
  margin-bottom: 10px;
  color: #ddd;
}

.listed-box ul {
  padding-left: 0px;
}

.listed-box ul, .listed-box li {
  list-style: none;
  font-size: 15px;
  text-align: center;
}

.listed-box img {
  width: auto;
  height: 80px;
  margin-bottom: 10px;
  display: none;
  /*center for display: block;*/
  margin-left: auto;
  margin-right: auto;
}

.listed-box li:first-child img {
  display: block;
}

.listed-box li span {
  font-weight: bold;
  color: #FF4500;
}

.listed-box li a:hover {
  color: #FF6347;
  opacity: 0.6;
}

.modal-body p:nth-child(1) {
  color: blue;
  font-size: 18px;
  font-weight: bold;
}
</style>
<script type="text/javascript">

function displayable() {
    $('.book-info-block').each(function(index, obj) {
        var inner = $(obj).find('.book-info-detail');
        var text = $(obj).find('.book-info-detail > div');
        var open = $(obj).find('.open-btn');
        var close = $(obj).find('.close-btn');
        var innerHeight = inner.height();
        var textHeight = text.height();
        
        // reset display
        close.css('display', '');
        open.css('display', '');

        if(textHeight <= innerHeight) {
            open.hide();
            close.hide();
        } else {
            if(innerHeight > 400) {
                open.hide();
            } else {
                close.hide();
            }

            open.on('click', function() {
                inner.removeClass('limitHeight');
                open.hide();
                close.show();
            });

            close.on('click', function() {
                inner.addClass('limitHeight');
                close.hide();
                open.show();
            });
        }
    });
};

$(document).ready(function(){
    //$(".nav-tabs a").click(function(){
    $(".tab-hover .nav-tabs a").mouseover(function() {
        $(this).tab('show');
        //id = $(this).attr('href');
        //$(id).siblings().removeClass('in').removeClass('active');
    });

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

    //jsSocials
    $("#share").jsSocials({
        showLabel: false,
        showCount: true,
        shareIn: "popup",
        url: "{{ Request::url() }}",
        text: "text to share",
        //shares: ["email", "twitter", "facebook", "googleplus", "linkedin", "pinterest", "stumbleupon", "whatsapp"]
        shares: ["twitter", "googleplus", "linkedin", "pinterest", "whatsapp"]
    }); 
    
    displayable();

    // Add smooth scrolling to all links
    $(".box-title a").on('click', function(event) {
        // Prevent default anchor click behavior
        event.preventDefault();
        // Store hash
        var hash = this.hash;
        //console.log("this.hash " + this.hash);
        
        if(($(hash).offset().top - 50 - 40) > ($('#book_info').offset().top - 30)) {
            if(!$('.box-title').hasClass('box-title-fixed'))
                $('.box-title').addClass('box-title-fixed');
        } else {
            if($('.box-title').hasClass('box-title-fixed'))
                $('.box-title').removeClass('box-title-fixed');
        }
        
        // Using jQuery's animate() method to add smooth page scroll
        // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
        $('html, body').animate({
            scrollTop: ($(hash).offset().top - 50 - 40)
        }, 900, function() {
            // Add hash (#) to URL when done scrolling (default click behavior)
            window.location.hash = hash;
            //console.log('$(hash).offset().top - 50 - 40 ' + ($(hash).offset().top - 50 - 40));
        });
    });

    //fixed box-title
    document.onscroll = function() {
        //console.log('$("#book_info").offset().top - 30 ' + ($('#book_info').offset().top - 30));
        //console.log('$(window).scrollTop() ' + $(window).scrollTop());
        if( $(window).scrollTop() > ($('#book_info').offset().top - 30)) {
            $('.box-title').addClass('box-title-fixed');
            //console.log('addClass box-title-fixed ');
        }
        else {
            if($('.box-title').hasClass('box-title-fixed')) {
                $('.box-title').removeClass('box-title-fixed');
                //console.log('removeClass box-title-fixed ');
            }
        }
    };

    /* img display */
    $('.listed-box li').mouseover(function(event) {
        $(this).find("img").css("display", "block");
        $(this).siblings().find("img").css("display", "none");
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
        <div class="col-md-12" >
            <div class="text-center bookstore-bar" >
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
        
        <div class="col-md-12" >
            <a href="#">
            <img src="{{ asset('img/bookstore/citeBN_20170301.jpg') }}" alt="2016" style="width: 100%;height: auto;">
            </a>
        </div>
        
        <div id="position_bar" itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="col-md-12 div-margin-top decoration-none" >
            <ul class="list-inline">
            <li class=""><span class=""></span>目前位置&nbsp;&#58;</li>
            <li class=""><a href="#" itemprop="url"><span class="" itemprop="title">首頁</span></a>&nbsp;&gt;</li>
            <li class=""><a href="#" itemprop="url"><span class="" itemprop="title">商管理財</span></a>&nbsp;&gt;</li>
            <li class=""><a href="#" itemprop="url"><span class="" itemprop="title">商業投資</span></a>&nbsp;&gt;</li>
            <li class=""><a href="#" itemprop="url"><span class="" itemprop="title">財經企管</span></a></li>
            </ul>
        </div>
        
        <div id="book_info_box" class="row">
            <div class="col-md-4 text-center div-margin-top">
                <a href="#">
                <img src="{{ Voyager::image($book->image) }}" alt="{{ $book->title }}" style="width: 250px;height: auto;">
                </a>
            </div>
            
            <div id="book_briefinfo" class="col-md-5" >
                <ul >
                    <div itemscope itemtype="http://schema.org/Book">
                        <li class="" ><h4><span class="" itemprop="name" style="line-height:140%">{{ $book->title }}</span></h4></li>
                        <li class="" >作者&nbsp;&#58;&nbsp;@foreach ($authors as $key => $author)<a style="cursor:pointer" data-toggle="modal" data-target="#author{{ $author->id }}" itemprop="url"><span class="" itemprop="author">{{ $author->name }}</span></a><?php if($key < (count($authors) - 1)) echo '&#x3001;'; ?>@endforeach</li>
                        <li class="" >出版社&nbsp;&#58;&nbsp;<a href="#" itemprop="url"><span class="" itemprop="publisher">{{ $book->pulbisher_name }}</span></a></li>
                        <li class="" >出版日期&nbsp;&#58;&nbsp;<span class="" itemprop="datePublished">{{ $book->publishing_date }}</span></li>
                        <li class="" >頁數&nbsp;&#58;&nbsp;<span class="" itemprop="numberOfPages">{{ $book->page_numbers }}</span></li>
                        <li class="" >ISBN&nbsp;&#58;&nbsp;<span class="" itemprop="isbn">@if($book->{'isbn-13'}){{ $book->{'isbn-13'} }}@else{{ $book->{'isbn-10'} }}@endif</span></li>
                    </div>
                    <li class="" >定價&nbsp;&#58;&nbsp;<span class="" >{{ $book->list_price }}元</span></li>
                    <div itemscope itemtype="http://schema.org/Offer">
                        <li class=""  >優惠價&nbsp;&#58;&nbsp;<span class="deeporange-color" >@if(($book->discount % 10) == 0){{ $book->discount/10 }}@else{{ $book->discount }}@endif折&nbsp;</span><span class="deeporange-color" itemprop="price">{{ round($book->discount * $book->list_price / 100) }}元</span></li>
                    </div>
                </ul>
            </div>
            
            <div class="col-md-2" >
                <div class="padding-2" style="border: 0px solid red;">
                    <div class="stock">
                        <span >庫存</span>
                        @if($book->stocks > 10)
                            <span >&nbsp;&gt;&nbsp;</span>
                            <span class="deeporange-color" >10</span>
                        @elseif($book->stocks <= 10)
                            <span >&nbsp;&equals;&nbsp;</span>
                            <span class="deeporange-color" >{{ $book->stocks }}</span>
                        @endif
                    </div>
                    <a href="#" class="btn btn-info btn-block text-left" role="button" ><span class="glyphicon glyphicon-shopping-cart"></span><span >&nbsp;放入購物車</span></a>
                    <a href="#" class="btn btn-warning btn-block text-left" role="button" ><i class="fa fa-usd" aria-hidden="true"></i><span class="" >&nbsp;結帳</span></a>
                    <a href="#" class="btn btn-success btn-block text-left" role="button"  ><i class="fa fa-heart" aria-hidden="true"></i><span >&nbsp;加入下次購買清單</span></a>
                </div>

                <div class="share-div decoration-none padding-2" style="border: 0px solid blue;">
                    <ul class="" >
                    <li class="" style="border: 0px solid red;">
                        <!-- jsSocials -->
                        <div id="share" class="" ></div>
                    </li>

                    <li class="" style="border: 0px solid green;">
                        <!-- fb-like -->
                        <div class="fb-like" data-href="{{ Request::url() }}" data-layout="standard" data-action="like" data-show-faces="false" data-share="true"></div>
                    </li>
                    </ul>
                </div>

            </div>
        </div><!-- book_info_box -->
        
        <div id="suggested-books-box" class=" " style="border: 0px solid blue;">
            <h4 class="tangerine-color">推薦瀏覽</h4>
            <div id="suggested-books" class="col-md-12 text-center row">
                    @foreach($randoms as $key => $random)
                    <div class="single-book" >
                        <a href="{{ url('bookstore/book/'.$random->id) }}">
                        <img class="img-thumbnail" src="{{ Presenter::smallimg(Voyager::image($random->image)) }}" alt="{{ $random->title }}" >
                        <p><span class=""></span>{{ Presenter::truncate($random->title, 20) }}</p>
                        </a>
                    </div>
                    @endforeach
            </div><!-- suggested-book -->
        </div><!-- suggested-books-box -->

        <div id="book_info" class="col-md-10 underside-div" >
            <div class="box-title" >
                @if(!empty($book->briefcontent))<a href="#briefcontent">內容簡介</a>&nbsp;&#124;@endif
                @if(!empty($book->index))<a href="#index">目錄</a>&nbsp;&#124;@endif
                @if(!empty($book->preface))<a href="#preface">序跋</a>&nbsp;&#124;@endif
                @if(!empty($book->promote))<a href="#promote">名家推薦</a>&nbsp;&#124;@endif
                @if(!empty($book->probation))<a href="#probation">內文試閱</a>&nbsp;&#124;@endif
                <a href="#author">作者資料</a>&nbsp;&#124;
                <a href="#basic">基本資料</a>
            </div>
            @if(!empty($book->briefcontent))
            <div id="briefcontent" class="book-info-block" >
                <div class="book-info-detail limitHeight" >
                    <div class="detail">
                    <h4 class="tangerine-color">內容簡介</h4><hr>
                    <p><?= $book->briefcontent ?></p>
                    </div>
                </div>
                <div id="" class="open-btn open-close-div" ><a class="btn btn-info">展開<i class="fa fa-arrow-circle-down" aria-hidden="true"></i></a>
                </div>
                <div id="" class="close-btn open-close-div" ><a class="btn btn-info">收合<i class="fa fa-arrow-circle-up" aria-hidden="true"></i></a>
                </div>
            </div>
            @endif
            
            @if(!empty($book->index))
            <div id="index" class="book-info-block" style="border: 0px solid green;">
                <div class="book-info-detail limitHeight" style="border: 0px solid green;">
                    <div class="detail">
                    <h4 class="tangerine-color">目錄</h4><hr>
                    <p>{!! nl2br(e($book->index)) !!}</p>
                    </div>
                </div>
                <div id="" class="open-btn open-close-div" style="border: 0px solid orange;"><a class="btn btn-info">展開<i class="fa fa-arrow-circle-down" aria-hidden="true"></i></a>
                </div>
                <div id="" class="close-btn open-close-div" style="border: 0px solid red;"><a class="btn btn-info">收合<i class="fa fa-arrow-circle-up" aria-hidden="true"></i></a>
                </div>
            </div>
            @endif
            
            @if(!empty($book->preface))
            <div id="preface" class="book-info-block" >
                <div class="book-info-detail limitHeight" >
                    <div class="detail">
                    <h4 class="tangerine-color">序跋</h4><hr>
                    <p><?= $book->preface ?></p>
                    </div>
                </div>
                <div id="" class="open-btn open-close-div" ><a class="btn btn-info">展開<i class="fa fa-arrow-circle-down" aria-hidden="true"></i></a>
                </div>
                <div id="" class="close-btn open-close-div" ><a class="btn btn-info">收合<i class="fa fa-arrow-circle-up" aria-hidden="true"></i></a>
                </div>
            </div>          
            @endif
            
            @if(!empty($book->promote))
            <div id="promote" class="book-info-block" >
                <div class="book-info-detail limitHeight" >
                    <div class="detail">
                    <h4 class="tangerine-color">名家推薦</h4><hr>
                    <p><?= $book->promote ?></p>
                    </div>
                </div>
                <div id="" class="open-btn open-close-div" style="border: 0px solid orange;"><a class="btn btn-info">展開<i class="fa fa-arrow-circle-down" aria-hidden="true"></i></a>
                </div>
                <div id="" class="close-btn open-close-div" style="border: 0px solid red;"><a class="btn btn-info">收合<i class="fa fa-arrow-circle-up" aria-hidden="true"></i></a>
                </div>
            </div>
            @endif
            
            @if(!empty($book->probation))
            <div id="probation" class="book-info-block" >
                <div class="book-info-detail limitHeight" >
                    <div class="detail">
                    <h4 class="tangerine-color">內文試閱</h4><hr>
                    <p><?= $book->probation ?></p>
                    </div>
                </div>
                <div id="" class="open-btn open-close-div" style="border: 0px solid orange;"><a class="btn btn-info">展開<i class="fa fa-arrow-circle-down" aria-hidden="true"></i></a>
                </div>
                <div id="" class="close-btn open-close-div" style="border: 0px solid red;"><a class="btn btn-info">收合<i class="fa fa-arrow-circle-up" aria-hidden="true"></i></a>
                </div>
            </div>
            @endif

            <div id="author" class="book-info-block" >
                <div class="book-info-detail limitHeight" >
                    <div class="detail">
                    <h4 class="tangerine-color">作者資料</h4><hr>
                    @foreach ($authors as $key => $author)
                    <p><?= $author->name; ?></p>
                    <p>{!! nl2br(e($author->information)) !!}</p><br>
                    @endforeach
                    </div>
                </div>
                <div id="" class="open-btn open-close-div" style="border: 0px solid orange;"><a class="btn btn-info">展開<i class="fa fa-arrow-circle-down" aria-hidden="true"></i></a>
                </div>
                <div id="" class="close-btn open-close-div" style="border: 0px solid red;"><a class="btn btn-info">收合<i class="fa fa-arrow-circle-up" aria-hidden="true"></i></a>
                </div>
            </div>

            <div id="basic" class="book-info-block" >
                <div class="book-info-detail limitHeight" >
                    <div class="detail">
                    <h4 class="tangerine-color">基本資料</h4><hr>
作者：@foreach ($authors as $key => $author)<a style="cursor:pointer" data-toggle="modal" data-target="#author{{ $author->id }}"><span class="" >{{ $author->name }}</span></a><?php if($key < (count($authors) - 1)) echo '&#x3001;'; ?>@endforeach<br>
@if(count($translators))
譯者：@foreach ($translators as $key => $translator)<a style="cursor:pointer" data-toggle="modal" data-target="#translator{{ $translator->id }}" ><span class="" >{{ $translator->name }}</span></a><?php if($key < (count($translators) - 1)) echo '&#x3001;'; ?>@endforeach<br>
@endif
出版社：{{ $book->pulbisher_name }}<br>
@if(!empty($book->series))書系：{{ $book->series }}<br>@endif
出版日期：{{ $book->publishing_date }}<br>
ISBN：@if($book->{'isbn-13'}){{ $book->{'isbn-13'} }}@else{{ $book->{'isbn-10'} }}@endif<br>
頁數：{{ $book->page_numbers }}頁<br>
                    </div>
                </div>
                <div id="" class="open-btn open-close-div" style="border: 0px solid orange;"><a class="btn btn-info">展開<i class="fa fa-arrow-circle-down" aria-hidden="true"></i></a>
                </div>
                <div id="" class="close-btn open-close-div" style="border: 0px solid red;"><a class="btn btn-info">收合<i class="fa fa-arrow-circle-up" aria-hidden="true"></i></a>
                </div>
            </div><!-- basic -->

        </div><!-- book_info -->
        
        <div id="" class="col-md-2 underside-div" style="border: 0px solid red;">
            <div id="" class="listed-box">
                <h4 class="tangerine-color">分類排行</h4><hr>
                <ul class=" ">
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
            </div><!-- listed-box -->
            <?php $browsedrecords = Cookie::get($name); ?>
            @if (!empty($browsedrecords))
            <div id="" class="listed-box">
                <h4 class="tangerine-color">最近瀏覽</h4><hr>
                <ul class=" ">
                    @foreach($browsedrecords as $key => $browsed)
                    <li class="">
                        <a href="{{ url('bookstore/book/'.$browsed['id']) }}">
                        <p class="text-left"><span>{{ $key + 1 }}&period;&nbsp;</span>{{ Presenter::truncate($browsed["title"], 22) }}</p>
                        <img class="img-thumbnail" src="{{ Presenter::smallimg(Voyager::image($browsed['image'])) }}" alt="{{ $browsed['title'] }}"  style="">
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div><!-- listed-box -->
            @endif
        </div>

        @foreach ($authors as $author)
        <!-- Author Modal -->
        <div class="modal fade" id="author{{ $author->id }}" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title text-center">作者</h4>
                    </div>
                    <div class="modal-body">
                        <p>{{ $author->name }}</p>
                        <p>{!! nl2br(e($author->information)) !!}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary btn-lg" data-dismiss="modal">關閉</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        @foreach ($translators as $translator)
        <!-- Translator Modal -->
        <div class="modal fade" id="translator{{ $translator->id }}" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title text-center">譯者</h4>
                    </div>
                    <div class="modal-body">
                        <p>{{ $translator->name }}</p>
                        <p>{!! nl2br(e($translator->information)) !!}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary btn-lg" data-dismiss="modal">關閉</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
@stop
