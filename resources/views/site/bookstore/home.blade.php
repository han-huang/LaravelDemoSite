@extends('site.layouts.master')

@section('meta')
<meta name="description" content="">
<meta name="author" content="Han Huang">
<!-- Open Graph Protocol  -->
<meta property="og:url"         content="{{ Request::url() }}" />
<meta property="og:type"        content="website" />
<meta property="og:title"       content="LaravelDemoSite 書店" />
<meta property="og:description" content="{{ $todaysale->title }}" />
<meta property="og:image"       content="{{ Voyager::image($todaysale->image) }}" />
<meta property="og:site_name"   content="LaravelDemoSite 書店" />
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

.box-title{ background-color:#06b8ea;border: 1px solid #06b8ea; color:#fff; padding:6px 8px; margin:0px; clear:both; border-radius: 2px 2px 0px 0px;}
.box-title a{color:#FFFFFF;}
.box-title a:hover{color:#000000;}

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

.salebox img {
  width: 130px;
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
  /*center for display: block;*/
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

.single-book {
  width: 182px;
}

.single-book img {
  width: 100px;
  height: 145px;
}

.single-book p {
  margin-top: 10px;
  font-size: 14px;
}

.single-book a:hover {
  color: #FF6347;
  opacity: 0.6;
}

.div-row {
  margin-left:0px;
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
    //Dynamic tab on mouseenter
    $(".tab-hover .nav-tabs a").mouseenter(function() {
        $(this).parent('li').siblings('.active').removeClass('active');
        $(this).parent('li').addClass('active');
        id = $(this).attr('href');
        $(id).siblings().removeClass('in').removeClass('active');
        $(id).addClass('active').addClass('in');
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
        <!-- left -->
        <div class="col-md-2 div-margin-top" style="">
            <div id="today_discount">
                <div class="box-title text-left" data-desc=""><a href="#">今日66折</a></div>
                <div class="salebox" data-desc="">
                    <ul class="">
                        <a href="{{ url('bookstore/book/'.$todaysale->id) }}">
                        <li class="text-center img-padding" style="">
                            <img src="{{ Voyager::image($todaysale->image) }}" alt="{{ $todaysale->title }}" title="{{ $todaysale->title }}">
                        </li>
                        <li class="text-center">{{ Presenter::truncate($todaysale->title, 20) }}</li>
                        <li class="text-center"><span class="" style="color:red">66折價 $ {{ round($todaysale->discount * $todaysale->list_price / 100) }} 元</span></li>
                        </a>
                        <li class="text-center"><a class="w3-button w3-dark-grey w3-round-large" href="#">放入購物車</a></li>
                    </ul>
                </div>
            </div>

            <div>
                <div class="box-title text-left" data-desc=""><a href="#">書目分類</a></div>
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
                        <li><a data-toggle="tab" href="#activity" class="hvr-box-shadow-inset">活動優惠</a></li>
                    </ul>
                </div>
                <div class="tab-content" style="border: 1px solid #ddd;">
                    <div id="suggest-new" class="tab-pane fade in active"  style="border: 0px solid Magenta;">
                        @foreach($newarrivals as $key => $newarrival)
                        @if(($key % 4) == 0)
                        <div class="row text-center div-row">
                        @endif
                            <div class="col-md-2 single-book" style="">
                                <a href="{{ url('bookstore/book/'.$newarrival->id) }}">
                                <img class="img-thumbnail" src="{{ Voyager::image($newarrival->image) }}" alt="{{ $newarrival->title }}" style="">
                                <p><span class=""></span>{{ Presenter::truncate($newarrival->title, 15) }}</p>
                                </a>
                            </div>
                        @if((($key + 1) % 4) == 0)
                        </div>
                        @endif
                        @endforeach
                    </div><!-- suggest-new -->

                    <div id="suggest-hits" class="tab-pane fade">
                        @foreach($hits as $key => $hit)
                        @if(($key % 4) == 0)
                        <div class="row text-center div-row">
                        @endif
                            <div class="col-md-2 single-book" style="">
                                <a href="{{ url('bookstore/book/'.$hit->id) }}">
                                <img class="img-thumbnail" src="{{ Voyager::image($hit->image) }}" alt="{{ $hit->title }}" style="">
                                <p><span class=""></span>{{ Presenter::truncate($hit->title, 15) }}</p>
                                </a>
                            </div>
                        @if((($key + 1) % 4) == 0)
                        </div>
                        @endif
                        @endforeach
                    </div><!-- suggest-hits -->

                    <div id="editor" class="tab-pane fade">
                        @foreach($editors as $key => $editor)
                        @if(($key % 4) == 0)
                        <div class="row text-center div-row">
                        @endif
                            <div class="col-md-2 single-book" style="">
                                <a href="{{ url('bookstore/book/'.$editor->id) }}">
                                <img class="img-thumbnail" src="{{ Voyager::image($editor->image) }}" alt="{{ $editor->title }}" style="">
                                <p><span class=""></span>{{ Presenter::truncate($editor->title, 15) }}</p>
                                </a>
                            </div>
                        @if((($key + 1) % 4) == 0)
                        </div>
                        @endif
                        @endforeach
                    </div><!-- editor -->

                    <div id="activity" class="tab-pane fade">
                        @foreach($marketings as $key => $marketing)
                        @if(($key % 4) == 0)
                        <div class="row text-center div-row">
                        @endif
                            <div class="col-md-2 single-book" style="">
                                <a href="{{ url('bookstore/book/'.$marketing->id) }}">
                                <img class="img-thumbnail" src="{{ Voyager::image($marketing->image) }}" alt="{{ $marketing->title }}" style="">
                                <p><span class=""></span>{{ Presenter::truncate($marketing->title, 15) }}</p>
                                </a>
                            </div>
                        @if((($key + 1) % 4) == 0)
                        </div>
                        @endif
                        @endforeach
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
                            @foreach($rankingnew as $key => $new)
                            <li class="">
                                <a href="{{ url('bookstore/book/'.$new->id) }}">
                                <p><span class="">{{ $key + 1 }}&period;&nbsp;</span>{{ Presenter::truncate($new->title) }}</p>
                                <img class="img-thumbnail" src="{{ Voyager::image($new->image) }}" alt="{{ $new->title }}"  style="">
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div><!-- newbooks -->
                    <div id="hits" class="tab-pane fade">
                        <ul class="w3-ul ">
                            @foreach($rankingsold as $key => $sold)
                            <li class="">
                                <a href="{{ url('bookstore/book/'.$sold->id) }}">
                                <p><span class="">{{ $key + 1 }}&period;&nbsp;</span>{{ Presenter::truncate($sold->title) }}</p>
                                <img class="img-thumbnail" src="{{ Voyager::image($sold->image) }}" alt="{{ $sold->title }}"  style="">
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div><!-- hits -->
                </div><!-- tab-content -->
            </div><!-- billboard -->
        </div><!-- right -->

    </div>
@stop
