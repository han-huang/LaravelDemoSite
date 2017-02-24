@extends('site.layouts.master')

@section('pageTitle')
<title>Laravel News Content</title>
@stop

@section('javascript')
<!-- textslider -->
<script type="text/javascript" src="{{ asset('js/jquery.textslider.min.js') }}"></script>
<!-- jssocials -->
<script src="{{ asset('js/jssocials.min.js') }}"></script>
<script src="{{ asset('js/common.js') }}"></script>
@stop

@section('css')
<!-- font-awesome -->
<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
<!-- textslider -->
<link href="{{ asset('css/textslider.css') }}" rel="stylesheet" type="text/css">
<!-- jssocials -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/jssocials.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/jssocials-theme-classic.css') }}" />

<link href="{{ asset('css/news_article.css') }}" rel="stylesheet" type="text/css">
@stop

@section('content')
<style>
/* label color */

@foreach ($newscategories as $newscategory)
.{{ $newscategory->label_class }} {
  background-color: {{ $newscategory->color }}
}
@endforeach
</style>

<script type="text/javascript">
$(document).ready(function() {
    /* control_panel */
    $('#myCarousel').mouseover(function() {
      $('#control_panel').css("display", "block");
    }).mouseout(function() {
      $("#control_panel").css("display", "none");
    });

    close_div("#float-div-left",".close-item");
    close_div("#float-div-left-top",".close-item");
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
        }, 900, function() {
            // Add hash (#) to URL when done scrolling (default click behavior)
            window.location.hash = hash;
        });
    });
});

var url = "{{ url('api/article/') }}";
var shareurl = "{{ url('news/article/') }}";
var previous = {{ ($previous) ? $previous->id : 0 }};
var next = {{ ($next) ? $next->id : 0 }};
var loading = false;
var divideid = "divide" + {{ $newspost->id }} ;
if (!next) {
    target = previous;
    direction = 0;
} else {
    target = next;
    direction = 1;
}

$(window).scroll(function() {
    if ((($(window).scrollTop() + $(window).height()) + 250) >= $(document).height()) {
        if (loading == false) {
            loading = true;

            $.get(url + "/" + target, function (data) {
                //success data
                loading = false;
                urlcount = (!data.urlcount) ? 0 : data.urlcount;
                date = data.newspost.updated_at.substr(0, 10);
                date = date.replace(/-/g, "/");

                var loaded = '\
    <div class="container " style="border: 0px solid red;">\
        <div id="" class="col-md-9  div-margin-top article-container" style="border : 0px solid blue;">\
            <div class="article-pic text-center" style="border : 0px solid black;"><img src=';

                if (data.newspost.image) {
                    loaded += '/storage/' + data.newspost.image;
                }

                loaded += '></div>\
            <div class="article-header-container" style="border : 0px solid blue;">\
                <div class="text-left" style="border : 0px solid red;">\
                    <h3>' + data.newspost.id + '&nbsp;' + data.newspost.title + '</h3>\
                    <div class="row">\
                        <div class="col-md-9 author">\
                            <h4><time datetime="' + date  + '" class="">' + data.newspost.updated_at.substr(0, 16) + '</time>&nbsp;<span>'+ data.newspost.author + '</span>&nbsp;<span class="label '+ data.newspost.label_class + '">' + data.newspost.cate_title + '</span></h4>\
                        </div>\
                        <div class="col-md-3 text-right">\
                            瀏覽數：<strong>'+ urlcount + '</strong>&nbsp;&nbsp;\
                        </div>\
                    </div>\
                </div>\
            </div>\
            <div class="sharing-btn text-left" style="border : 0px solid green;">\
                <ul class="list-group list-inline">\
                    <li class="list-group-item">\
                        <div id="';
                shareid = data.newspost.id;
                loaded += "share" + shareid;
                loaded += '"  style=""></div>\
                    </li>\
                    <li class="list-group-item">\
                        <div class="fb-like" data-href="' + shareurl + "/" + target + '" data-layout="standard" data-action="like" data-show-faces="false" data-share="true"></div>\
                    </li>\
                </ul>\
            </div>';

            if (data.newspost.excerpt) {
                loaded += '<header class="excerpt"><p class="">' + data.newspost.excerpt + '</p> </header>';
            }

            loaded += '\
            <div class="article-body">\
                <div class="article-content">\
                    <p>' + data.newspost.body + '</p>\
                </div>\
            </div>\
            <div class="fb-comments" data-href="' + shareurl + "/" + target + '" data-numposts="5" data-width="800"></div>\
        </div>\
    </div>';
                /* direction: previous or next, assign target id */
                if (data.previous) previous_record = data.previous.id;
                if (data.next) next_record = data.next.id;
                if (direction) {
                    if (!data.next) {
                        // next_record null
                        target = previous;
                        // change direction to previous (new news)
                        direction = 0;
                    } else {
                        // keep down (old news)
                        target = data.next.id;
                    }
                } else {
                    if (!data.previous) {
                        //previous_record null, No data, stop
                        loading = true;
                    } else {
                        target = data.previous.id;
                    }
                }

                loaded += '<div id="divide' + data.newspost.id + '" class="container-fluid"><hr></div>';
                $("#" + divideid).after(loaded);
                // next divideid
                divideid = "divide" + data.newspost.id;
                // facebook button refresh
                try{
                    FB.XFBML.parse();
                }catch(ex){};

                // jsSocials
                // console.log("#share" + shareid);
                $("#share" + shareid).jsSocials({
                    showLabel: false,
                    showCount: true,
                    shareIn: "popup",
                    url: shareurl + "/" + shareid,
                    text: "text to share",
                    //shares: ["email", "twitter", "facebook", "googleplus", "linkedin", "pinterest", "stumbleupon", "whatsapp"]
                    shares: ["twitter", "googleplus", "linkedin", "pinterest", "whatsapp"]
                });
            });
        }
    }

    if ($(this).scrollTop() > 600) {
        $('.scrollup').fadeIn();
    } else {
        $('.scrollup').fadeOut();
    }
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
                    <h3>{{ $newspost->id }}&nbsp;{{ $newspost->title }}</h3>
                    <div class="row">
                        <div class="col-md-9 author">
                            <?php //$updated_at = substr($newspost->updated_at, 0, 10);$date = explode("-", $updated_at);//echo $date[0]." ".$date[1]." ".$date[2];//echo $criterionDate;//echo " ".$newsposts[0]->id;?>
                            <h4><time datetime="{{ substr($newspost->updated_at, 0, 16) }}" class="">{{ substr($newspost->updated_at, 0, 16) }}</time>&nbsp;<span>{{ $newspost->author }}</span>&nbsp;<span class="label {{ $newspost->label_class }}">{{ $newspost->cate_title }}</span></h4>
                        </div>
                        <div class="col-md-3 text-right">
                            瀏覽數：<strong>@if (is_null($urlcount)){{ "0" }} @else {{ $urlcount }} @endif</strong>&nbsp;&nbsp;
                        </div>
                    </div>

                </div>
            </div>

            <div class="sharing-btn text-left" style="border : 0px solid green;">
                <ul class="list-group list-inline">
                    <li class="list-group-item">
                        <!-- jsSocials -->
                        <div id="share" style=""></div>
                    </li>
                    <li class="list-group-item">
                        <!-- fb-like -->
                        <div class="fb-like" data-href="{{ Request::url() }}" data-layout="standard" data-action="like" data-show-faces="false" data-share="true"></div>
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
                    @if (!empty($hotnews))
                    <li><a data-toggle="tab" href="#hot">熱門</a></li>
                    @endif
                    <?php $browsedrecords = Cookie::get('browsed'); ?>
                    @if (!empty($browsedrecords))
                    <li><a data-toggle="tab" href="#browsed">瀏覽紀錄</a></li>
                    @endif
                </ul>

                <div class="tab-content">
                    <div id="new" class="tab-pane fade in active listbox text-left decoration-none">
                        <ul class="" data-desc="最新報導">
                            @foreach($latestnews as $latest)
                            <li>
                                <a href="{{ url('news/article/'.$latest->id) }}">{{ $latest->id }} {{ mb_strlen($latest->title, 'UTF-8') > 22 ? mb_substr($latest->title, 0, 22, 'UTF-8')."&nbsp;..." : $latest->title }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    @if (!empty($hotnews))
                    <div id="hot" class="tab-pane fade listbox text-left decoration-none">
                        <ul class="" data-desc="熱門新聞">
                            @foreach($hotnews as $hot)
                            <li>
                                <a href="{{ url('news/article/'.$hot->id) }}">{{ $hot->id }} {{ mb_strlen($hot->title, 'UTF-8') > 22 ? mb_substr($hot->title, 0, 22, 'UTF-8')."&nbsp;..." : $hot->title }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if (!empty($browsedrecords))
                    <div id="browsed" class="tab-pane fade listbox text-left decoration-none">
                        <ul class="" data-desc="瀏覽紀錄">
                            @foreach($browsedrecords as $browsed)
                            <li>
                                <a href="{{ url('news/article/'.$browsed['id']) }}">{{ $browsed["id"] }} {{ mb_strlen($browsed["title"], 'UTF-8') > 22 ? mb_substr($browsed["title"], 0, 22, 'UTF-8')."&nbsp;..." : $browsed["title"] }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                </div><!-- tab-content -->
            </div>

        </div><!-- Right -->

    </div><!-- news -->

    <div id="divide{{ $newspost->id }}" class="container-fluid">
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

    <div class="scrollup">
        <a href="#pagebody" title="To Top">
        <span class="glyphicon glyphicon-circle-arrow-up"></span>
        </a>
    </div>

@stop
