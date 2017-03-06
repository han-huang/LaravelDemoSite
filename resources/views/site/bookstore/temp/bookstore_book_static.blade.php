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

.li-book {
  width: 182px;
}

.li-book img {
  width: 100px;
}

.li-book p {
  margin-top: 10px;
  font-size: 14px;
}

.li-book a:hover {
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

#suggested-books ul li {
  border-right: 2px dotted #999999;
}
#suggested-books ul li:nth-last-of-type(1) {
  border-right: none;
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
    /*
    // reset display
    $('.close-btn').css('display', '');
    $('.open-btn').css('display', '');
    
    if($('.book-info-detail > div').height() <= $('.book-info-detail').height()) {
        $('.open-btn').hide();
        $('.close-btn').hide();
    } else {
        
        if($('.book-info-detail').height() > 400) {
            $('.open-btn').hide();
        } else {
            $('.close-btn').hide();
        }
        $('.open-btn').on('click', function() {
            $('.book-info-detail').removeClass('limitHeight');
            $('.open-btn').hide();
            $('.close-btn').show();
        });
        
        $('.close-btn').on('click', function() {
            $('.book-info-detail').addClass('limitHeight');
            $('.close-btn').hide();
            $('.open-btn').show();
        });
    }
    */

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
                    <li class=""><a href="#"><span class="glyphicon glyphicon-log-in"></span>&nbsp;登入</a></li>
                    <li class=""><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;加入會員</a></li>
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
                <img src="{{ asset('img/bookstore/BK7074.jpg') }}" alt="失控的歐元︰從經濟整合的美夢到制度失靈的惡夢" style="width: 250px;height: auto;">
                </a>
            </div>
            
            <div id="book_briefinfo" class="col-md-5" >
                <ul >
                    <div itemscope itemtype="http://schema.org/Book">
                    <li class="" ><h4><span class="" itemprop="name">失控的歐元︰從經濟整合的美夢到制度失靈的惡夢</span></h4></li>
                    <li class="" >作者&nbsp;&#58;&nbsp;<a href="#" itemprop="url"><span class="" itemprop="author">約瑟夫．尤金．史迪格里茲(Joseph Eugene Stiglitz)</span></a></li>
                    <li class="" >出版社&nbsp;&#58;&nbsp;<a href="#" itemprop="url"><span class="" itemprop="publisher">商周出版</span></a></li>
                    <li class="" >出版日期&nbsp;&#58;&nbsp;<span class="" itemprop="datePublished">2017-03-07</span></li>
                    <li class="" >頁數&nbsp;&#58;&nbsp;<span class="" itemprop="numberOfPages">432</span></li>
                    <li class="" >ISBN&nbsp;&#58;&nbsp;<span class="" itemprop="isbn">9789864771875</span></li>
                    </div>
                    <li class="" >定價&nbsp;&#58;&nbsp;<span class="" >480元</span></li>
                    <div itemscope itemtype="http://schema.org/Offer">
                    <li class=""  >優惠價&nbsp;&#58;&nbsp;<span class="deeporange-color" >79折&nbsp;</span><span class="deeporange-color" itemprop="price">480元</span></li>
                    </div>
                </ul>
            </div>
            
            <div class="col-md-2" >
                <div class="padding-2" style="border: 0px solid red;">
                    <div class="stock">
                        <span >庫存</span>
                        <span >&nbsp;&gt;&nbsp;</span>
                        <span class="deeporange-color" >10</span>
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
                        <div class="fb-like" data-href="{{ Request::url() }}" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
                    </li>
                    </ul>
                </div>

            </div>
        </div><!-- book_info_box -->
        
        <div id="suggested-books-box" class=" " style="border: 0px solid blue;">
            <h4 class="tangerine-color">推薦瀏覽</h4>
            <div id="suggested-books" class="col-md-12 text-center" >             
                <div class="row text-center">
                <ul class="list-inline text-center" style="border: 0px solid blue;">
                    <li class=" li-book" >
                        <a href="#">
                        <img class="img-thumbnail" src="{{ asset('img/bookstore/BW0614.jpg') }}" alt="VR" >
                        <p><span class=""></span>《虛擬實境狂潮：從購物、教育到醫療，V...》</p>
                        </a>
                    </li>
                    <li class=" li-book" >
                        <a href="#">
                        <img class="img-thumbnail" src="{{ asset('img/bookstore/BW0614.jpg') }}" alt="VR" >
                        <p><span class=""></span>《虛擬實境狂潮：從購物、教育到醫療，V...》</p>
                        </a>
                    </li>
                    <li class=" li-book" >
                        <a href="#">
                        <img class="img-thumbnail" src="{{ asset('img/bookstore/BW0614.jpg') }}" alt="VR" >
                        <p><span class=""></span>《虛擬實境狂潮：從購物、教育到醫療，V...》</p>
                        </a>
                    </li>
                    <li class=" li-book" >
                        <a href="#">
                        <img class="img-thumbnail" src="{{ asset('img/bookstore/BW0614.jpg') }}" alt="VR" >
                        <p><span class=""></span>《虛擬實境狂潮：從購物、教育到醫療，V...》</p>
                        </a>
                    </li>
                    <li class=" li-book" >
                        <a href="#">
                        <img class="img-thumbnail" src="{{ asset('img/bookstore/BW0614.jpg') }}" alt="VR" >
                        <p><span class=""></span>《虛擬實境狂潮：從購物、教育到醫療，V...》</p>
                        </a>
                    </li>
                    <li class=" li-book" >
                        <a href="#">
                        <img class="img-thumbnail" src="{{ asset('img/bookstore/BW0614.jpg') }}" alt="VR" >
                        <p><span class=""></span>《虛擬實境狂潮：從購物、教育到醫療，V...》</p>
                        </a>
                    </li>
                </ul>
                </div>
            </div><!-- suggested-book -->
        </div><!-- suggested-books-box -->
        
        <div id="book_info" class="col-md-10 underside-div" >
            <div class="box-title" >
                <a href="#briefcontent">內容簡介</a>&nbsp;&#124;&nbsp;
                <a href="#index">目錄</a>&nbsp;&#124;&nbsp;
                <a href="#promote">名家推薦</a>&nbsp;&#124;&nbsp;
                <a href="#probation">內文試閱</a>&nbsp;&#124;&nbsp;
                <a href="#author">作者資料</a>&nbsp;&#124;&nbsp;
                <a href="#basic">基本資料</a>
            </div>
            <div id="briefcontent" class="book-info-block" >
                <div class="book-info-detail limitHeight" >
                    <div class="detail">
                    <h4 class="tangerine-color">內容簡介</h4><hr>諾貝爾經濟學獎得主、經濟學大師史迪格里茲最新力作<br>
歐元區第一手分析，為脫歐風暴指路<br>

極端右翼崛起壯大、青年失業率居高不下、勞工退休金不保、經濟危機成常態、英國脫歐成真&hellip;&hellip;事情不太對勁，歐元出現以前不是這樣的！<br>

<p><strong>一部歐元興衰與成敗的簡史。一探大歐洲夢的美麗與哀愁
歐元實驗誠然迷人，卻是充滿瑕疵的經濟和意識形態的混合體
史迪格里茲帶我們了解歐元區的美好構想，以及它如何偏離軌道，
並提出重新架構歐元的可能，以及必要的話，和平解散歐元區的進路！</strong></p>

<p>人們對於歐元傾注了很多情感，為了保存它做了很多承諾，但歸根究柢它只是人為造出來的東西，一種由靠不住的人類建立的靠不住的機制。<br>
&mdash;&mdash;史迪格里茲</p>

<p>歐元的故事就是一齣政治道德劇，上演著遠離選民的領導者如何設計出無法善待民眾的制度，以及金錢利益在經濟整合的進路上總是占上風，政客們看重短期政治利益，導致廣大公民深陷危境。經濟學大師史迪格里茲從經濟整合的概念如何形塑出共同貨幣的使用，帶我們了解歐元區的美好構想，並透過理論、政策、數字來探討歐元失靈背後的經濟學，提出重新架構歐元的可能，以及必要的話，和平解散歐元區的進路。</p>

<p>歐元原本是要團結歐洲且創造繁榮的；事實卻剛好相反。二○○八年的金融風暴使歐元左支右絀，到了二○一○年，金融危機轉變成「歐元危機」，十九個共同發行歐元的國家，即所謂歐元區，受到經濟停滯和信貸危機的衝擊，有些國家已經淪陷在經濟蕭條好幾年，歐元區的調控權力岌岌可危，尤其是在希臘。歐洲的經濟停滯和慘淡的遠景是歐盟計畫的內在缺陷的直接結果，政治的整合完全跟不上經濟整合的腳步，其結構是趨異的。問題是：歐元還有救嗎？</p>

<p>史迪格里茲分析歐洲央行的盲點，說明為什麼撙節措施造成歐洲無止境的經濟停滯，並且提出三條可能的出路：一、澈底改革歐元區的結構，以及對於會員國傷害最深的種種政策；二、循序漸進地終結歐盟；三、或者大膽嘗試「彈性歐元」系統。</p>

<p>史迪格里茲也打破一個迷思，那就是歐洲政治的團結並不一定要在貨幣上統一。歐洲在許多價值和人權上其實已經表現出他們的團結，例如難民的問題、全球暖化的問題。比起貨幣統一，有其他更好的方式可以促進經濟、政治和社會的整合。 若是如此，我們應該如何替換或放棄歐元？最好的方式，是讓德國和北歐國家先脫離歐元，而不是希臘或南歐國家。</p>

<p>還有第三條路，那就是彈性歐元，歐元區的不同國家或集團可以擁有他們自己可調整的平價的「歐元」。本書說明彈性歐元系統是一種動態的穩定，而不同於現行的發散性。而且它也不意味著永遠放棄共同貨幣。歐元的問題是它太早熟了，整個政治環境使它揠苗助長。</p>

<p>這本書的分析不僅對於歐元的實驗很重要，它也提供了更全面的省思。過去四十年來，新自由主義的意識型態左右了全世界的經濟計畫。它主導了「華盛頓共識」而使拉丁美洲失去了幾十年的發展；它也主導了政策的結構性調整，使得非洲失去了四分之一個世紀。他們在美國做實驗，使得成長趨緩，而所有成長的果實只是造成貧富差距的擴大。歐元區的設計也是在這個框架下的產物，它的經濟停滯只是整個世界的縮影。</p>

<strong>【媒體好評】</strong> 

<p>★這不只是一本關於歐元崩壞的書。內容充滿具建設性的提案&mdash;&mdash;讓我們一瞥倘若歐盟三巨頭死了心，真的願意接受他們的批評者史迪格里茲的建議，那樣的「拯救方案」會是什麼模樣。<br>
&mdash;&mdash;馬丁．桑德布Martin Sandbu，金融時報Financial Times</p>
<p>★毫無疑問，史迪格里茲是對的。若未徹底檢驗歐元區的運作，它注定要步向失敗。 <br>
&mdash;&mdash;經濟學人The Economist<br></p>
<p>★一語破的，了不起的作品。<br>
&mdash;&mdash;彼得．古曼Peter Goodman，紐約時報The New York Times<br></p>
<p>★史迪格里茲許多最犀利的觀察皆切中要旨。 <br>
&mdash;&mdash;華爾街日報Wall Street Journal<br></p>
<p>★歐元可謂現代版的悲劇&hellip;&hellip;它已陷入窘境，它的支持者充滿政治浪漫主義與親歐人士。史迪格里茲給這些人的訊息是，他們在不經意間已經摧毀了他們最為珍惜的東西。<br>
&mdash;&mdash;保羅．高力Paul Collier，泰晤士報文學增刊Times Literary Supplement<br></p>
<p>★對經濟學者及政策制定者來說，這是一份讓人信服且攸關迫切利益的主張。<br>
&mdash;&mdash;科克斯書評Kirkus Reviews</p>
                    </div>
                </div>
                <div id="" class="open-btn open-close-div" ><a class="btn btn-info">展開<i class="fa fa-arrow-circle-down" aria-hidden="true"></i></a>
                </div>
                <div id="" class="close-btn open-close-div" ><a class="btn btn-info">收合<i class="fa fa-arrow-circle-up" aria-hidden="true"></i></a>
                </div>
            </div>
            
            <div id="index" class="book-info-block" style="border: 0px solid green;">
                <div class="book-info-detail limitHeight" style="border: 0px solid green;">
                    <div class="detail">
                    <h4 class="tangerine-color">目錄</h4><hr>
前言<br>
第一部　身陷危機的歐洲<br>
第一章 歐元危機<br>
　核心論旨<br>
　比失落的十年更慘？<br>
　創設趨異的歐元區<br>
　指責受害國<br>
　胡佛又一次失敗了<br>
　團結一致與對經濟的共同認知<br>
　另一種世界是可能的<br>
<br>
第二章 歐元：希望與現實<br>
　歐元的狀況<br>
　經濟整合<br>
　共用共同貨幣是否增進福祉、促進進一步整合？<br>
　經濟整合超越政治整合<br>
　民主赤字<br>
<br>
第三章 歐洲的糟糕表現<br>
　歐元區及歐元危機<br>
　歐元、歐元危機，以及長期表現<br>
　歐元及個別國家的表現<br>
　未來前景<br>
　德國<br>
　結語<br>
<br>
第二部　生來即有缺陷<br>
第四章 單一通貨究竟何時能發揮效用？<br>
　美國作為一個通貨區<br>
　為何在不同國家間採用共同貨幣是個問題，歐元區又如何沒有做到必要的事<br>
　維持充分就業<br>
　內部貶值與外部失衡<br>
　為何通貨區容易產生危機<br>
　為何連貿易盈餘都是問題所在<br>
　結語<br>
<br>
第五章 歐元：一個趨異的體系<br>
　資本與金融市場的趨異，以及單一市場原則<br>
　資本外逃<br>
　趨異及勞力的自由移動<br>
　其他趨異來源<br>
　危機政策使趨異加劇<br>
　結語<br>
<br>
第六章 貨幣政策以及歐洲央行<br>
　通膨使命<br>
　執迷通膨的後果<br>
　約束貨幣當局<br>
　貨幣政策的政治本質<br>
　增加的不平等<br>
　分配、政治與危機<br>
　治理<br>
　結語：經濟模型、利益及意識形態<br>
<br>
第三部　制定不周的政策<br>
第七章 危機政策：三巨頭政策如何使歐元區的問題加劇<br>
歐盟危機方案的總體經濟架構<br>
撙節：施瓦本家庭主婦的迷思<br>
撙節方案的設計
增加收入<br>
削減支出<br>
拯救銀行<br>
紓困與債務重整：到底誰受益？<br>
重新開始：除了造成蕭條的撙節，還有其他辦法<br>
總結意見<br>
題外話：學術界如何看待撙節<br>
<br>
第八章 使失靈加劇的架構改革<br>
怪罪供給面<br>
三巨頭的架構改革：從瑣碎無用到適得其反<br>
重要的改革<br>
總結意見<br>
<br>
第四部　前進的道路？<br>
第九章 創設能夠順利運作的歐元區<br>
改革歐元區的架構<br>
架構改革一：銀行聯盟<br>
架構改革二：債務互助<br>
架構改革三：共同穩定架構<br>
架構改革四：真正的趨同政策——朝向架構重組<br>
架構改革五：促進全歐充分就業及成長的歐元區架構<br>
架構改革六：確保全歐充分就業及成長的歐元區架構改革<br>
架構改革七：共享繁榮的承諾<br>
「危機政策」的改革<br>
危機政策改革一：從撙節到成長<br>
危機政策改革二：朝向債務重整<br>
總結意見<br>
<br>
第十章 協議離婚有可能嗎？<br>
如何脫離歐元，創造繁榮<br>
創設二十一世紀的金融交易體系<br>
貸款：創設為社會服務的銀行體系<br>
在協議離婚下管理經常帳赤字<br>
透過貿易憑單管理經常帳赤字<br>
管控財政赤字<br>
管理債務重整<br>
德國離開的好處<br>
總結意見<br>
<br>
第十一章 彈性歐元<br>
基本概念<br>
穩定相對匯率<br>
經濟原理<br>
歐元區合作的必要<br>
<br>
第十二章 前進之路<br>
歐元區正在萎縮？<br>
到底是怎麼了？政治與經濟的相互影響<br>
歐洲計畫為何如此重要？<br>
政治及經濟整合：歐元區的教訓<br>
拯救歐洲計畫<br>
<br>
後記 英國脫歐及其後續影響<br>
                    </div>
                </div>
                <div id="" class="open-btn open-close-div" style="border: 0px solid orange;"><a class="btn btn-info">展開<i class="fa fa-arrow-circle-down" aria-hidden="true"></i></a>
                </div>
                <div id="" class="close-btn open-close-div" style="border: 0px solid red;"><a class="btn btn-info">收合<i class="fa fa-arrow-circle-up" aria-hidden="true"></i></a>
                </div>
            </div>
            
            <div id="promote" class="book-info-block" >
                <div class="book-info-detail limitHeight" >
                    <div class="detail">
                    <h4 class="tangerine-color">名家推薦</h4><hr>
「更歐洲」，或者「更不歐洲」

<p>◎文／朱雲鵬（臺北醫學大學經濟學講座教授、東吳大學巨量資料管理學院講座教授）</p>
　　<p>本文作者諾貝爾獎得主史迪格里茲，是一位公認的自由派（liberals），也就是偏凱恩斯學說派（Keynesian）的經濟學家。他近年來出版了很多著作，觸及不同議題，但道一以貫之——基本上不同意保守派（新自由主義，neoliberals）所鼓吹「全能市場經濟」的「自動調整機制」主張。</p>
　　<p>作者在書中明白提到，相信全能市場經濟的一位名人，是美國總統胡佛（Herbert Hoover）的財政部長梅隆（Andrew Mellon）。一九二九年美國股市崩盤，國民所得急遽下跌，稅收減少，政府赤字上升，梅隆為了平衡預算赤字，採取縮小政府支出的緊縮性財政政策，結果把美國股市崩盤轉化為全球歷史上著名的「大蕭條」（Great Depression）。</p>
　　<p>但主政者似乎沒有學到足夠的教訓，作者說，例如國際貨幣基金（IMF）對於無法償還債務國家進行救援時，不論是東亞金融風暴、拉丁美洲金融風暴，還是非洲，都主張處於風暴的國家要縮減預算赤字，其結果都是雪上加霜：把景氣修正轉化為衰退，把衰退轉化為蕭條。</p>
　　<p>在歐洲經濟整合尚未完成就推動單一貨幣，也是假設市場全能。他們假設，在單一貨幣，也就是匯率無法調整的情況下，任何會員國發生的任何經濟波動，都可以透過內部調整機制而回到均衡；財政政策的首要也是唯一任務，是維持預算平衡。例如，歐盟如有一國出口因為外部因素而減少，所得下降，失業增加，稅收減少，該國即應縮減政府預算支出，維持預算平衡；所得會進一步下降，但沒有關係：所得的下降會造成薪資和物價的降低，最後該國的出口品會因為物價降低而恢復其國際競爭力，所得再度增加，回到充分就業的原均衡。</p>
　　<p>這種理論和胡佛總統時代的理論一致，認為當時美國的高失業率會因為薪資的下降而消失，經濟會回到均衡。但一九三○年代美國經濟的事實發展與這種理論的預期相反。作者說，在發生危機的歐洲國家，事實的發展也與這種理論相反。主要因為，正如凱恩斯所說，薪資和物價都有僵固性，不會立即調整，所以失業會擴大，人民會受創。</p>
　　<p>作者不是反對預算平衡，但是認為要平衡的應當是「充分就業預算」，也就是當失業率很低時候的政府預算。只有如此，才可能發揮財政政策的自動穩定機能：當失業率升高，所得下降，稅收減少，政府支出不減少，預算產生赤字，於是有刺激景氣的效果，幫助經濟回到充分就業的均衡；相反的，如果景氣過熱，物價上升，稅收增加，政府支出不變，預算會產生盈餘，有冷卻景氣的效果。</p>
　　<p>但是在單一歐元的安排下，這種財政政策自動穩定機制不見了，反而演變成助長不穩定的機制。也就是經濟愈差，稅收愈少，失業愈高，歐盟就愈要求該會員國採取財政緊縮政策，造成景氣更加下滑。希臘如此，西班牙、葡萄牙、義大利都遭到同樣的命運。在這些國家發生危機時，年輕人失業率高達百分之三十，尋常的中產階級家庭必須到街上垃圾桶撿拾食物充飢，在冬天無錢使用暖氣。</p>
　　<p>這不是像史迪格里茲這種自由派經濟學者看得下去的景象。這些慘狀觸動了他的心，引發他寫本書的動機。</p>
　　<p>他不是反對歐元，也不是反對歐盟整合，只是認為目前做的方法不對，繼續下去的話，歐元真有可能崩解。他認為，歐洲化不能停留在現在的地步，歐洲要不然就是繼續歐洲化，愈來愈趨近單一國家；要不就逐漸退卻，歐元也應當退位。目前最大的問題是，歐洲化的程度沒有達到可以在單一貨幣的前提下，達到各會員國的高成長和低失業。</p>
　　<p>有鑑於此，他提出了解決方法，分為結構改革和危機處理改革兩個面向。在第一個面向方面，他建議要︰一、建立包含統一存款保險制度在內的銀行聯盟；二、國家間債務互助的機制；三、共同穩定架構，包含具有自動穩定因子的政府預算政策在內；四、架構重組，用政策工具減少盈餘國家的經常帳盈餘，逐漸管控各會員國貿易盈餘和赤字的分歧擴大；五、促進成長和就業的總體經濟學，歐洲央行不能再以控制物價為唯一任務，必須將促進成長和就業也列為重要任務；六、金融體系應當促進投資，成功完成仲介儲蓄和投資之間的本份功能；七、從租稅逐底競爭（像盧森堡），改變為租稅政策整合。</p>
　　<p>在危機管理方面，他建議要將節省支出的政策改為促進成長，尤其要讓財政政策能發揮其刺激景氣的功效。他也建議歐盟應當開始做債務重整，早日結束債務過高國家的魔咒，使其可以往成長的方向前進。</p>
　　<p>要往這些方向走，基本上表示歐洲化必須加深，更接近單一統一國家、不同地方政府的運作模式。如果這條路行不通，就必須考慮從現在強勢單一歐元的模式退卻，採「協議離婚」，或採行新的、更具彈性的歐元安排，例如貨幣還是稱為歐元，但會出現地區型的特別貨幣，例如「希臘歐元」、「西班牙歐元」等，其匯率有調整空間。</p>
　　<p>這是一本由具悲憫胸懷的史氏所寫，兼具專業與通俗意義的好書。令人長嘆的是，在二○一六年年中此書出版之際，世人尚不知川普將當選美國總統。美國其實是關鍵，當年推動歐盟成立，幕後的推手就是美國。最近讓歐盟各國極右派抬頭的難民問題，其根源在伊拉克、利比亞、敘利亞，都和美國的軍事行動脫不了關係。難民的總數已經超過二次大戰時代。</p>
　　<p>難民充斥、英國脫歐、其他歐洲國脫歐主張抬頭、川普當美國選總統奉行新孤立主義，凡此種種，均讓史氏此書中加強歐洲化主張的可行性大幅降低。既然如此，作者所建議其他較有彈性的「軟脫」模式，是否值得歐盟諸國列為重要教材？以目前為止歐洲評論者做出的多數回應來看，似乎不太領情。有歐洲作者指出，美國也是花了一百三十七年才建立聯邦的中央銀行，歐洲能在如此短期內達成單一貨幣已經很不容易，不必悲觀，而史氏「廢除歐元但維持歐盟」的主張則一廂情願，與歐洲實況不符。另外，我們也應當記得，當年德國的李斯特也是由推動關稅同盟和共同貨幣逐步達成徳意志的整合。</p>
　　<p>無論如何，本人相當推薦本書給所有關心全球經濟情勢的讀者朋友。這本書具有啟發性、知識性、可讀性，值得收藏。</p>
                    </div>
                </div>
                <div id="" class="open-btn open-close-div" style="border: 0px solid orange;"><a class="btn btn-info">展開<i class="fa fa-arrow-circle-down" aria-hidden="true"></i></a>
                </div>
                <div id="" class="close-btn open-close-div" style="border: 0px solid red;"><a class="btn btn-info">收合<i class="fa fa-arrow-circle-up" aria-hidden="true"></i></a>
                </div>
            </div>

            <div id="probation" class="book-info-block" >
                <div class="book-info-detail limitHeight" >
                    <div class="detail">
                    <h4 class="tangerine-color">內文試閱</h4><hr>
第七章　危機政策：三巨頭政策如何使歐元區的問題加劇
 
　　<p>歐洲內外都為深陷危機的歐盟國家所呈現的戲碼所震駭，尤其是希臘、西班牙、葡萄牙及賽普勒斯等國。觸目可見中產階級的人們突然落入險境︰勞工退休金遭大幅削減；大學畢業生始終無法找到工作，只能淪落收容所。這些故事顯示，有些事情不太對勁。青年失業率高逾三○％，也不對勁。歐元出現以前不是這樣的。</p>

　　<p>二○一三年，內人與我在一次私下聚會裡曾經禮貌地請教北歐某國的總理，他知道情況變得多糟糕嗎？那年秋冬的新聞報導，提及西班牙及希臘的沒落中產家庭為了生存沿街覓食，在冬日裡沒法負擔暖氣費用，甚至翻找垃圾桶裡的東西吃。（註1）</p>

　　<p>他給出一抹微笑，冷冷地說，他們早該改革經濟，不應該這樣恣意揮霍。然而，當然不是這些百姓在恣意揮霍，也不是他們不改革。無辜的民眾不得不承擔政客們的決策後果。諷刺的是，這些政客通常來自三巨頭頗為偏愛的右翼政黨。</p>

　　<p>那次餐宴上這種缺乏同理心、缺乏歐洲團結的話語不斷出現。糟糕的是，當經濟受創國家的無辜人民承受著真實的匱乏之苦時，那些人的態度竟如這位總理般，是如此輕率且隨意謾罵。不過最殘酷的表現不在政客們公開或私下的言論裡，而是三巨頭在這些國家陷入絕望之際，將這些政策強加於他們。這些政策使經濟情勢更為嚴峻，削弱辛苦建立的歐洲聯盟，凸顯了歐元架構固有的脆弱性與瑕疵。</p>

　　<p>令人訝異的是，儘管三巨頭提出的方案陷本該拯救的國家人民於不義已是鐵證如山，那些領頭者卻大言不慚宣稱撙節有效。把西班牙、葡萄牙及愛爾蘭都視作成功案例，不啻睜眼說瞎話，無視各種可見的經濟指標。的確，二○一○到一三年間，三巨頭為愛爾蘭制定的經濟調整方案，挽救該國的金融部門及政府免於經濟崩盤。（註2）但是他們強行施加的撙節措施，使愛爾蘭的失業率惡化，長達五年之久維持兩位數的情況，直到二○一五年初；除了造成愛爾蘭人民痛苦不堪，整個世界也錯失許多發展機會而難以復返。（相較之下，二○○九年經濟大衰退時，美國失業率高峰到達一○％僅持續一個月。）</p>

　　<p>愛爾蘭只是例證之一。二○一一年，由於全球金融危機，葡萄牙政府面臨借貸成本飆升，ＩＭＦ提供了七八○億歐元為其紓困，當然附有嚴格條件。ＩＭＦ要求葡國政府必須降低財政赤字，從二○一○年占ＧＤＰ近一○％，到二○一三年時降至三％。（註3）除非有強勢的經濟成長，否則要達到這個降幅的唯一辦法就是撙節，減少政府支出，像是公僕減薪、增加賦稅。（倘若沒有紓困協助，葡萄牙勢必得採取更激烈的刪減措施，因為它已經被資本市場給排除。）ＩＭＦ宣稱葡國方案很成功。的確，如果只看政府放款利率的話，紓困確實達成目的。二○一一年底葡國的十年期公債利率為一三％，到了二○一四年底（撙節方案終止時）利率降至低於三％。（註4）此外，還有財政狀況及貸款能力的改善。（註5）然而，撙節讓經濟基本面持續孱弱。截至二○一五年，人均ＧＤＰ比危機前還要低了四．三％左右。（註6）二○一六年初，失業率依然高逾一二％。成長預測持續低迷︰ＩＭＦ估計接下來幾年的ＧＤＰ都不會超過每年一．四％的增幅。政府借錢或許變容易了，但葡國人民從未經歷到真正的復甦。</p>

　　<p>二○一二年西班牙的銀行紓困案並未附帶條件，要求政府必須降低支出或提高賦稅，但其實直到二○○八年後，該國仍在消化這種盛行於歐陸的撙節萬靈丹。只要用常識去看看那些資料，以及二○一一年數十萬走上街頭的憤怒者們（indignados） ，便可以看出這些政策帶來了驅逐效應、工資刪減及失業，根本不算是成功。然而，二○一五年中，在將近四分之一的西班牙勞動力失業的情況下，德國經濟專家委員會（Council of Economic Experts）以及其他許多撙節提倡者卻宣稱，西班牙是展現撙節美德的典範。（註7）</p>

　　<p>正是這種對於經濟成功的定義的基本曲解，三巨頭在希臘犯下了迄今最嚴重的過錯。他們的政策具有毀滅性的錯誤，令人難以置信的心胸偏狹，而且不近情理。甚且，二○一五年時，他們又讓自己造成的災難更形惡化。</p>

　　<p>舉例而言，隨著希臘在二○一五年進入第三階段的「方案」，歐盟要求希臘中止對那些欠錢不還的房貸背負者採取「寬容」政策；這項政策原本是為了讓大量人口免於流離失所與陷入赤貧，於是希臘政府在發生債務危機後，實施暫時性的法拍屋禁令。（註8）到了二○一五年，這項禁令依然生效，不過有了許多修改，減少涵蓋的貸款範圍。（三巨頭時常把「命令」偽裝成「提議」，要危機國家慎重考慮。但那不只是提議，希臘必須屈服。當然有「協商」空間，不過一如上述事件所印證的，最後「同意」的與最初提議的一般說來少有不同。縱使會有些許更動，也只是為了保住危機國家的面子，方便政府吞下苦藥。）</p>

　　<p>三巨頭的領導者似乎相信，繳不出房貸的人就是遊手好閒的人，他們濫用禁令而不付錢，只要政府硬起來，這些好吃懶做者就會乖乖繳錢。然而，事實恰好相反。隨著經濟蕭條，數十萬人失去工作，還有數十萬人得承受四成以上的巨幅減薪。那些沒有付錢的人，是根本付不出錢來。歐盟以為這樣的鐵腕能夠給銀行帶來好運，如此一來他們就可以減少提供資本重整的資金給銀行。然而，更有可能的是數千名貧窮的希臘人會成為街友，銀行手上則握著賣不出去的房子。（註9）</p>

　　<p>希臘請求三巨頭放寬苛刻的要求，但他們不為所動，嚴命縮減保護措施︰只有那些年收入低於兩萬三千歐元者，才能受到完整保障。（註10）當然，收入這麼低的家庭一般並沒有房子，所以讓他們豁免沒什麼意義。希臘官員被迫讓步，無奈宣稱大多數希臘人都有資格獲得某些保障。唯一清楚的是，許多原本處於赤貧邊緣的人又往這個邊緣前進了好幾步。</p>

　　<p>歐元區的技術官僚們並沒有留意這些顯示痛苦生活的統計數字。他們也沒有看到冰冷數字背後是真實的人民，他們的生活已經被毀了。就像射擊五萬英呎高空的客機一樣，成功只看命中目標與否，而非傷亡人數。</p>

　　<p>這些官僚們對於各種統計數字感到興趣，包括利率及債券利差（危機國家為了貸款而必須支付的額外利息）、預算及經常帳赤字。對他們而言，失業率有時似乎只是在衡量某種次要的傷害，或者更正面地把它看成美好日子的預兆。高失業率會拉低工資，讓國家更具競爭力，因此調整了經常帳赤字。</p>

　　<p>三巨頭搬演的希臘悲劇，一項好處或許在於提供了一個經典案例，呈現歐元區政策在回應全球金融危機及後續影響時出了什麼問題。我在本章及下一章將詳細討論希臘的案例。要記住的是，三巨頭在希臘政府有求於人時強迫推行的錯誤政策，只是其他危機國家的加強版——同樣都是透過施壓、哄騙及貸款條件來進行。</p>
                    </div>
                </div>
                <div id="" class="open-btn open-close-div" style="border: 0px solid orange;"><a class="btn btn-info">展開<i class="fa fa-arrow-circle-down" aria-hidden="true"></i></a>
                </div>
                <div id="" class="close-btn open-close-div" style="border: 0px solid red;"><a class="btn btn-info">收合<i class="fa fa-arrow-circle-up" aria-hidden="true"></i></a>
                </div>
            </div>

            <div id="author" class="book-info-block" >
                <div class="book-info-detail limitHeight" >
                    <div class="detail">
                    <h4 class="tangerine-color">作者資料</h4><hr>
約瑟夫．尤金．史迪格里茲(Joseph Eugene Stiglitz)

<p>二○○一年諾貝爾經濟學獎得主，美國哥倫比亞大學經濟學教授，哥倫比亞大學政策對話倡議組織（Initiative for Policy Dialogue）主席。</p>
<p>在資訊經濟學上貢獻卓著，是新興凱因斯經濟學派的重要成員。目前亦擔任《紐約時報》與全球評論網站Project Syndicate 專欄作家。</p>

<p>一九六七年於麻省理工學院取得博士學位，一九七○年以二十六歲之齡獲聘為耶魯大學經濟學教授。一九七九年獲得由美國經濟學會所頒發且素有小諾貝爾經濟學獎之稱的「約翰．貝茨．克拉克獎」（John Bates Clark Medal）。一九九三至九七年，擔任美國總統經濟顧問委員會成員及主席。一九九七至九九年，任世界銀行資深副行長兼首席經濟學家。二○一一至一四年，擔任國際經濟學協會主席。</p>

<p>史迪格里茲在國際間擁有高度影響力，美國《新聞週刊》稱他是「對金融危機始終抱持正確主張的專家」，世界銀行首席經濟學家史登（Nicholas Stern）譽為「當代最重要的經濟學家」，英國《衛報》指出︰「我們需要更多像史迪格里茲這樣的經濟學家。」</p>
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
作者：約瑟夫．尤金．史迪格里茲(Joseph Eugene Stiglitz)<br>
譯者：葉咨佑<br>
出版社：商周出版<br>
書系：Discourse<br>
出版日期：2017-03-07<br>
ISBN：9789864771875<br>
城邦書號：BK7074<br>
規格：平裝 / 單色 / 432頁 / 15cm×21cm<br>
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
			
            <div id="" class="listed-box">
                <h4 class="tangerine-color">最近瀏覽</h4><hr>
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
			
        </div>
    </div>
@stop
