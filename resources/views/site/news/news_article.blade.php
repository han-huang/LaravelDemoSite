@extends('site.layouts.master')

@section('pageTitle')
<title>Laravel News Content</title>
@stop

@section('javascript')
<!-- textslider -->
<script type="text/javascript" src="{{ asset('js/jquery.textslider.min.js') }}"></script>
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
@stop

@section('content')
<style>
.div-top {
  padding-top: 50px;
}

#div_left {
  margin-top: 10px;
  padding-top: 0px;
  padding-left: 0px;
}

.div-margin-top {
  margin-top: 10px;
}

#float-div-left {
  position: fixed;
  bottom: 100px;
  left: 0;
}

#float-div-left-top {
  position: fixed;
  top: 50px;
  left: 0;
}

#float-div-left-top-2 {
  position: fixed;
  top: 50px;
  left: 150px;
}

#float-div-left-top-3 {
  position: fixed;
  top: 50px;
  left: 300px;
}  

.ad-width {
  width: 150px;
}

#float-div-right {
  position: fixed;
  bottom: 100px;
  right: 0;
}

#float-div-right-top {
  position: fixed;
  top: 50px;
  right: 0;
}

.pos-relative {
  position: relative;
}

.close-item {
  position: absolute;
  top: 0px;
  right: 0px;
  cursor: pointer;
  display: none;
}

.jssocials {
  /* font-size: 1em; */
  font-size: 10px;;
}

.jssocials-share-link {
  border-radius: 50%;
  /*font-size: 10px;*/
}

/* inline for sharing buttons */
.sharing-btn * {
  display: inline;
  /*margin-bottom: 20px;*/
  border: 0px;
}

.sharing-btn a:hover {
  text-decoration: none;
}

.decoration-none a:hover {
  text-decoration: none;
}

/* news_content */
.listbox-title{ background-color:#06b8ea; color:#fff; padding:6px 8px; margin:0px; clear:both; border-radius: 2px 2px 0px 0px;}/*大標*/
.listbox-title a{color:#FFFFFF;}
.listbox-title a:hover{color:#000000;}
.listbox{ padding:0px; border:1px solid #c3c3c3; border-top:none; margin-bottom:20px; overflow:hidden; border-radius: 0px 0px 2px 2px;}/*大標+框*/

.listbox ul{padding:0px;}/*文章列表、內文相關文章*/
.listbox li{ list-style:none; border-bottom:1px dotted #c3c3c3; padding:8px 10px; overflow:hidden;}
.listbox li:nth-last-of-type(1){border-bottom:none;}/*最後1個li沒border-bottom*/
.listbox li span{ display:block; padding:5px 0px; color:#777; font-size:0.95em;}
.listbox li a{display:block; color:#000; font-size:1em; line-height:1.6em; }
.listbox li a:hover{color:#06a4d1;}
.listbox li a img{ float:left; margin-right:10px;}
.listbox li .tab{display:inline-block; background-color:#06b8ea; padding:1px 10px 2px; margin:0px 0px 3px; color:#fff; font-size:0.9em;}/*分類標籤*/

/*
.nav-tabs a{ color:#06a4d1 !important;}
.nav-tabs .active a{ color:#8c8c8c !important;}
*/

.nav-tabs a{ background-color:#8c8c8c !important; color:#fff !important;}
.nav-tabs .active a{ background-color:#06b8ea !important;color:#fff !important;}

.article-container {
  padding: 0px 15px 10px 15px;
}

.article-pic {
  
}

.excerpt { padding: 15px; border: solid 2px #555555; margin-top: 10px; margin-bottom: 20px; }
.excerpt p { font-size: 1em; color: #777777; line-height: 1.4em; letter-spacing: 0.3px; } 

@media screen and (min-width: 1281px) {
  .article-pic img {
    max-width: 825px;
    max-height: 420px;
    /* width: 100%; */
    width: auto;
    height: auto;
  }
}

@media screen and (max-width: 1280px) {
  .article-pic img {
    max-width: 675px;
    max-height: 350px;
    /* width: 100%; */
    width: auto;
    height: auto;
  }
}

@media screen and (max-width: 1024px) {
  .article-pic img {
    max-height: 280px;
    /* width: 100%; */
    width: auto;
    height: auto;
  }
}

@media screen and (max-width: 800px) {
  .article-pic img {
    max-height: 200px;
    width: auto;
    height: auto;
  }
}

/* label color */

@foreach ($newscategories as $newscategory)
.{{ $newscategory->label_class }} {
  background-color: {{ $newscategory->color }}
}
@endforeach
</style>

<script type="text/javascript">
/**
 * display close icon and close div
 *
 * @param  string div - div #id selector (e.g. #float-div-left)
 * @param  string xitem - span .class selector (e.g. .close-item)
 * @return void
 */
function close_div(div, xitem)
{
    // display close icon or not
    $(div).mouseover(function() {
        $(div + " " + xitem).css("display", "block");
        //console.log("mouseover");
    }).mouseout(function() {
        $(div + " " + xitem).css("display", "none");
        //console.log("mouseout");
    });

    // close div
    $(div + " " + xitem).click(function() {
        $(div).css("display", "none");
    });
}

$(document).ready(function() {
    /*
    $('.slideText').textslider({
        direction : 'scrollUp', // 捲動方向: scrollUp向上, scrollDown向下
        //direction : 'scrollDown', // 捲動方向: scrollUp向上, scrollDown向下
        scrollNum : 1, // 一次捲動幾個元素
        scrollSpeed : 500, // 捲動速度(ms)
        pause : 500 // 停頓時間(ms)
    });
    */

    //$('#newslist li:nth-child(odd)').addClass('alert-info');

    /* control_panel */
    $('#myCarousel').mouseover(function() {
      $('#control_panel').css("display", "block");
    }).mouseout(function() {
      $("#control_panel").css("display", "none");
    });

    //$("#float-div-left").floatdiv({bottom: "200px", left: "0", width: "150px"});

    /* #float-div-left .close-item */
    /*
    $('#float-div-left').mouseover(function(){
      $('#float-div-left .close-item').css("display", "block");
      console.log("mouseover");
    }).mouseout(function(){    
      $("#float-div-left .close-item").css("display", "none");
      console.log("mouseout");
    });

    $("#float-div-left .close-item").click(function(){
      $('#float-div-left').css("display", "none");
    });
    */
    close_div("#float-div-left",".close-item");
    close_div("#float-div-left-top",".close-item");
    //close_div("#float-div-left-top-2",".close-item");
    //close_div("#float-div-left-top-3",".close-item");
    close_div("#float-div-right",".close-item");
    close_div("#float-div-right-top",".close-item");

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

    // Add smooth scrolling to all links in navbar + footer link
    $("a[href='#pagebody']").on('click', function(event) {

        // Prevent default anchor click behavior
        event.preventDefault();

        // Store hash
        var hash = this.hash;
        //console.log("this.hash " + this.hash);
        // Using jQuery's animate() method to add smooth page scroll
        // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
        $('html, body').animate({
          scrollTop: $(hash).offset().top
        }, 900, function(){

          // Add hash (#) to URL when done scrolling (default click behavior)
          window.location.hash = hash;
        });
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

    <!-- news -->
    <div class="container div-top decoration-none" style="border: 0px solid red;">

        <!-- Left -->
        <div id="" class="col-md-9  div-margin-top article-container" style="border : 0px solid blue;">
            <div class="article-pic text-center" style="border : 0px solid black;"><img src="{{ Voyager::image($newspost->image) }}"></div>

            <div class="article-header-container" style="border : 0px solid blue;">
                <div class="text-left" style="border : 0px solid red;">
                    <h3>{{ $newspost->title }}</h3>
                    <div class="row">
                        <div class="col-md-9 author">
                            <?php $updated_at = substr($newspost->updated_at, 0, 10);$date = explode("-", $updated_at);//echo $date[0]." ".$date[1]." ".$date[2];//echo $criterionDate;//echo " ".$newsposts[0]->id;?>
                            <h4><time datetime="{{ $date[0] }}/{{ $date[1] }}/{{ $date[2] }}/" class="">{{ substr($newspost->updated_at, 0, 16) }}</time>&nbsp;<span>{{ $newspost->author }}</span>&nbsp;<span class="label {{ $newspost->label_class }}">{{ $newspost->cate_title }}</span></h4>
                        </div>
                        <div class="col-md-3 text-right">
                            瀏覽數：<strong>{{ $urlcount }}</strong>&nbsp;&nbsp;
                        </div>
                    </div>

                </div>
            </div>

            <div class="sharing-btn text-left" style="border : 0px solid green;">
                <ul class="list-group list-inline">
                    <li class="list-group-item">
                    <!-- jsSocials -->
                    <div id="share"  style=""></div>
                </li>
                <li class="list-group-item">
                    <!-- fb-like -->
                    <div class="fb-like" data-href="{{ Request::url() }}" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
                </li>
                </ul>
            </div>
            @if (!empty($newspost->excerpt))
            <header class="excerpt"><p class="">{{ $newspost->excerpt }}</p> </header>
            @endif
            <div class="article-body">
                <div class="article-content">
                    <p><?= $newspost->body ?></p>
                </div><!-- article-content -->
            </div><!-- article-body -->
            <!-- fb-comments -->
            <div class="fb-comments" data-href="{{ Request::url() }}" data-numposts="5" data-width="800"></div>
        </div><!-- Left -->

        <!-- Right -->
        <div class="col-md-3 div-margin-top" id="" style="border: 0px solid red;">
            <div class="">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#new">最新</a></li>
                    <li><a data-toggle="tab" href="#hot">熱門</a></li>
                </ul>

                <div class="tab-content">
                    <div id="new" class="tab-pane fade in active listbox text-left">
                        <ul class="" data-desc="最新報導">
                            @foreach($latestnews as $latest)
                            <li>
                                <a href="{{ url('news/article/'.$latest->id) }}">{{ $latest->id }} {{ mb_strlen($latest->title, 'UTF-8') > 22 ? mb_substr($latest->title, 0, 22, 'UTF-8')."&nbsp;..." : $latest->title }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div id="hot" class="tab-pane fade listbox text-left">
                        <ul class="" data-desc="熱門新聞">
                            @foreach($hitnews as $hit)
                            <li>
                                <a href="{{ url('news/article/'.$hit->id) }}">{{ $hit->id }} {{ mb_strlen($hit->title, 'UTF-8') > 22 ? mb_substr($hit->title, 0, 22, 'UTF-8')."&nbsp;..." : $hit->title }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                </div><!-- tab-content -->
            </div>

        </div><!-- Right -->

    </div><!-- news -->

    <div id="divide" class="container-fluid">
    <hr>
    </div>

    <div id="float-div-left" class="ad-width">
        <div class="pos-relative ">
            <span class="close-item">
            <i class="fa fa-times-circle fa-lg " aria-hidden="true"></i>
            </span>
            <a href="http://www.gq.com.tw/life/health/content-28388.html" target="_blank">
                <img class="ad-width" src="{{ asset('img/news/13619849_1131272576893958_6095304397828770119_n.jpg') }}" alt="">
            </a>
        </div>
    </div>

    <div id="float-div-left-top" class="ad-width">
        <div class="pos-relative ">
            <span class="close-item">
            <i class="fa fa-times-circle-o fa-lg fa-inverse" aria-hidden="true"></i>
            </span>
            <a href="http://www.xxlbasketball.com.tw/article/131" target="_blank">
                <img class="ad-width" src="{{ asset('img/news/13765754_1392517234097557_8456676202465229807_o.jpg') }}" alt="">
            </a>
        </div>
    </div>

    <div id="float-div-right" class="ad-width">
        <div class="pos-relative ">
            <span class="close-item">
            <i class="fa fa-times fa-lg " aria-hidden="true"></i>
            </span>
            <a href="http://store.asus.com/tw/category/A21300" id="" target="_blank">
                <img class="ad-width" src="{{ asset('img/news/201603AM210000094_14585287246327160027544.jpg') }}" alt="">
            </a>
        </div>
    </div>

    <div id="float-div-right-top" class="ad-width">
        <div class="pos-relative ">
            <span class="close-item">
            <i class="fa fa-times-circle-o fa-lg " aria-hidden="true"></i>
            </span>
            <a href="http://24h.pchome.com.tw/prod/DRAH60-A9007RQ86" id="" target="_blank">
                <img class="ad-width" src="{{ asset('img/news/DRAH60-A9007RQ86000_5881ee7371072.jpg') }}" alt="">
            </a>
        </div>
    </div>

    <div class="container text-center">
        <a href="#pagebody" title="To Top">
        <span class="glyphicon glyphicon-chevron-up"></span>
        </a>
    </div>

@stop
