@extends('site.layouts.master')

@section('meta')
<meta name="description" content="{{ $newsposts[0]->title }}">
<meta name="author" content="Han Huang">
<!-- Open Graph Protocol  -->
<meta property="og:url"         content="{{ Request::url() }}" />
<meta property="og:type"        content="website" />
<meta property="og:title"       content="{{ $newsposts[0]->title }}" />
<meta property="og:description" content="{{ $newsposts[0]->title }}" />
<meta property="og:image"       content="" />
<meta property="og:site_name"   content="LaravelDemoSite" />
@stop

@section('pageTitle')
<title>Laravel News Index</title>
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
<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/news_index.css') }}" rel="stylesheet" type="text/css">
@stop

@section('content')
<style>
/* label color */

@foreach($newscategories as $newscategory)
.{{ $newscategory->label_class }} {
  background-color: {{ $newscategory->color }}
}
@endforeach
</style>

<script type="text/javascript">
$(document).ready(function() {

    $('.slideText').textslider({
        direction : 'scrollUp', // 捲動方向: scrollUp向上, scrollDown向下
        //direction : 'scrollDown', // 捲動方向: scrollUp向上, scrollDown向下
        scrollNum : 1, // 一次捲動幾個元素
        scrollSpeed : 500, // 捲動速度(ms)
        pause : 2000 // 停頓時間(ms)
    });
    //$('#newslist li:nth-child(odd)').addClass('alert-info');

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
        <div class="col-md-8 " id="div_left" style="border: 0px solid red;">

            <div class="panel panel-info">  
                <div class="panel-heading">
                    <div class="" id="breakingnews" style="border: 0px solid green;">          
                        <div class="slideText">
                            <ul>
                                @if($breakingnews)
                                    @foreach($breakingnews as $breaking)
                                    <li><a href="{{ url('news/article/'.$breaking->id) }}" target="_blank"><i class="fa fa-bolt fa-fw" aria-hidden="true"></i><span>{{ $breaking->id }}&nbsp;{{ Presenter::truncate($breaking->title, 24) }}</span></a></li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div> <!-- panel-heading -->

                <div class="panel-body panel-carousel">
                    @if ($carousel)
                    <!-- carousel -->
                    <div id="myCarousel" class="carousel slide" data-ride="carousel"  data-interval="2000" style="border : 0px solid blue;">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox" style="border : 0px solid black;">
                            @foreach ($carousel as $key => $item)
                                @if ($key)
                                    <div class="item">
                                @else
                                    <div class="item active">
                                @endif
                                    <a href="{{ url("news/article/".$item->id) }}" target="_blank">
                                        <img src="{{ Voyager::image($item->image) }}" alt="{{ $item->title }}" style="height: 400px;width: 743.4px;">
                                        <div class="carousel-caption">
                                            <!-- <h3>{{ $item->id }}</h3> -->
                                            <h3><p>{{ $item->id }}&nbsp;{{ $item->title }}</p></h3>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>

                        <!-- Left and right controls -->
                        <div id="control_panel">
                            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    <!-- carousel -->
                    @endif
                </div> <!-- panel-body -->

            </div> <!-- panel -->

            <div class="sharing-btn" style="">
                <ul class="list-group list-inline">
                    <li class="list-group-item">
                    <!-- jsSocials -->
                    <div id="share" style=""></div>
                </li>
                <li class="list-group-item">
                    <!-- fb-like -->
                    <div class="fb-like" data-href="{{ Request::url() }}" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
                </li>
                </ul>
            </div>

            <!-- newslist panel -->
            <div class="panel panel-default">
                <div class="panel-body" id="newslist_panel-body">
                    <div id="newslist" class="" style="border : 0px solid red;">
                        <?php $criterionDate = substr($newsposts[0]->updated_at, 0, 10);$date = explode("-", $criterionDate);//echo $date[0]." ".$date[1]." ".$date[2];//echo $criterionDate;//echo " ".$newsposts[0]->id;?>
                        <h4><time>{{ $date[0] }} / {{ $date[1] }} / {{ $date[2] }}</time></h4>
                        <ul class="list-group">
                            @foreach($newsposts as $post)
                                @if (!strcmp($criterionDate, substr($post->updated_at, 0, 10)))
                                    <li class="list-group-item">
                                        <a href="{{ url("news/article/".$post->id) }}" target="_blank"><time>{{ substr($post->updated_at, 11, 5) }}</time>
                                        <span class="label {{ $post->label_class }} categories-label">{{ $post->cate_title }}</span>
                                        <span class="color_black">{{ $post->id }} {{ Presenter::truncate($post->title, 22) }}</span>
                                        </a>
                                    </li>
                                @else
                                    <?php $criterionDate = substr($post->updated_at, 0, 10);$date = explode("-", $criterionDate);//echo $date[0]." ".$date[1]." ".$date[2]; ?>
                                    </ul>
                                    <h4><time>{{ $date[0] }} / {{ $date[1] }} / {{ $date[2] }}</time></h4>
                                    <ul class="list-group">
                                    <li class="list-group-item">
                                        <a href="{{ url("news/article/".$post->id) }}" target="_blank"><time>{{ substr($post->updated_at, 11, 5) }}</time>
                                        <span class="label {{ $post->label_class }} categories-label">{{ $post->cate_title }}</span>
                                        <span class="color_black">{{ $post->id }} {{ Presenter::truncate($post->title, 22) }}</span>
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div> <!-- newslist -->
                </div> <!-- panel-body -->

                <!-- Pagination -->
                <div class="pagination-panel-footer " style="">      
       
                    <ul class="pagination pagination-lg">
                        @if ($start > 10)
                        <li><a href="@if(isset($str)){{ url("news/$str/".($start - 1)) }}@else{{ url('news/page/'.($start - 1)) }}@endif"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
                        @endif

                        @for ($i = $start; $i <= $end; $i++)
                        <li @if($i == $page){{ 'class=active' }}@endif><a href="@if(isset($str)){{ url("news/$str/$i") }}@else{{ url("news/page/$i") }}@endif">{{ $i }}</a></li>
                        @endfor

                        @if ($pages > $end)
                        <li><a href="@if(isset($str)){{ url("news/$str/".($end + 1)) }}@else{{ url('news/page/'.($end + 1)) }}@endif" ><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                        @endif
                    </ul>
                </div> <!-- Pagination -->

            </div> <!-- panel -->

            <!-- fb-comments -->
            <div class="fb-comments" data-href="{{ Request::url() }}" data-numposts="5" data-width="700"></div>

        </div> <!-- Left -->

        <!-- Right -->
        <div id="" class="col-md-4 text-center div-margin-top" style="border : 0px solid blue;">
            <a href="#1"><img src="{{ asset('img/news/16644333451973492016.gif') }}" alt="" style="width: 348px;"></a>
            <a href="#2"><img src="{{ asset('img/news/9650076553428386429.gif') }}" alt="" style="width: 348px;"></a>
            <a href="#3"><img src="{{ asset('img/news/pic_1041292_632735.gif') }}" alt="" style="width: 348px;"></a>
            <a href="#4"><img src="{{ asset('img/news/pic_1045198_633050.jpg') }}" alt="" style="width: 348px;"></a>
            <a href="#5"><img src="{{ asset('img/news/1484789650_201609AP0600000026.jpg') }}" alt="" style="width: 348px;"></a>
            <a href="#6"><img src="{{ asset('img/news/01fcc0a9cc39b629ce34efb7289717b2.jpg') }}" alt="" style="width: 348px;"></a>
            <a href="#7"><img src="{{ asset('img/news/15326572_1038955002917034_2794691513724737193_n.jpg') }}" alt="" style="width: 348px;"></a>
        </div>

    </div><!-- news -->

    <div id="divide" class="container-fluid">
        <hr>
    </div>

    <!-- title of special report -->
    <div class="container ">
        <div class="col-md-4">
        </div>
        <div class="col-md-4 " > 
            <div class="text-center sp-margin" style=" ">
            <h3 class="">特別報導</h3>
            </div>
        </div>
        <div class="col-md-4">
        </div>
    </div>

    <!-- special report -->
    <div class="container" >  
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="panel panel-default div-fixed-height" style="">  

                <div class="panel-body text-center">
                    <a href="https://www.thenewslens.com/article/59514">
                    <img src="{{ asset('img/news/0l62xmhlrmmsrp5rlr233whmlqry1w.jpg') }}" alt="" style="width: 318.4px;max-width: 100%;max-height: 100%;">
                    </a>
                </div>

                <div class="decoration-none">
                    <article>
                        <div class="pagination-panel-footer footer-margin-bottom">
                            <h5>
                            <span class="time"> 2017/01/19 </span> 
                            <span class="info-categories"><a href="https://www.thenewslens.com/category/world">  國際 </a></span> 
                            <span class="author">
                            <a href="https://www.thenewslens.com/author/ymsts2012"> STS多重奏 </a>  
                            </span> 
                            </h5>
                            <h4> 
                            <a href="https://www.thenewslens.com/article/59514"><header class="article-title">【騙局大剖析】物理學家艾倫索卡如何愚弄一群人文學者，以及為什麼20年後這件事依然重要？</header></a> 
                            </h4> 
                        </div>
                    </article>
                </div> <!-- info-box -->
              
            </div> <!-- panel panel-default -->
        </div> <!-- col-sm-4 -->

        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="panel panel-default div-fixed-height" style="">  
            
                <div class="panel-body text-center">
                    <a href="https://www.thenewslens.com/article/59691">
                    <img src="{{ asset('img/news/5j12eff0zr6sxw7gqpcj7z84a5e3x9.jpg') }}" alt="" style="width: 318.4px;max-width: 100%;max-height: 100%;">
                    </a>
                </div>

                <div class="decoration-none">
                    <article>
                        <div class="pagination-panel-footer footer-margin-bottom">
                            <h5>
                            <span class="time"> 2017/01/19 </span> 
                            <span class="info-categories"><a href="https://www.thenewslens.com/category/world">  國際 </a></span> 
                            <span class="author">  
                            <a href="https://www.thenewslens.com/author/louis_lo"> Lo </a> 
                            </span> 
                            </h5>
                            <h4> 
                            <a href="https://www.thenewslens.com/article/59691"><header class="article-title">12,451公里、歷時18天的遠征，「中歐列車」終於抵達倫敦了！</header></a> 
                            </h4> 
                        </div>
                    </article>
                </div> <!-- info-box -->
            </div> <!-- panel panel-default -->
        </div> <!-- col-sm-4 -->

        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="panel panel-default div-fixed-height">  

                <div class="panel-body text-center">
                    <a href="https://www.thenewslens.com/article/59756">
                    <img src="{{ asset('img/news/r38dwpqotvxq2vp573uhj5bikd2qdq.jpg') }}" alt="" style="width: 318.4px;max-width: 100%;max-height: 100%;">
                    </a>
                </div>

                <div class="decoration-none">
                    <article>
                        <div class="pagination-panel-footer footer-margin-bottom">
                            <h5>
                            <span class="time"> 2017/01/19 </span> 
                            <span class="info-categories"><a href="https://www.thenewslens.com/category/culture">  藝文 </a></span> 
                            <span class="author">  
                            <a href="https://www.thenewslens.com/author/honlam"> 許瀚林 </a> 
                            </span> 
                            </h5>
                            <h4> 
                            <a href="https://www.thenewslens.com/article/59756"><header class="article-title">《鋼鐵人》的世界觀就是以暴制暴？</header></a> 
                            </h4> 
                        </div>
                    </article>
                </div> <!-- info-box -->
            </div> <!-- panel panel-default -->
        </div> <!-- col-sm-4 -->

        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="panel panel-default div-fixed-height">  

                <div class="panel-body text-center">
                  <a href="https://www.thenewslens.com/article/59697">
                  <img src="{{ asset('img/news/j6zmmywclfq0awl0u94ki4spz3r5bh.jpg') }}" alt="" style="width: 318.4px;max-width: 100%;max-height: 100%;">
                  </a>
                </div>

                <div class="decoration-none">
                    <article>
                        <div class="pagination-panel-footer footer-margin-bottom">
                            <h5>
                            <span class="time"> 2017/01/19 </span> 
                            <span class="info-categories"><a href="https://www.thenewslens.com/category/society"> 社會 </a></span> 
                            <span class="author">  
                            <a href="https://www.thenewslens.com/author/yang"> Yang </a> 
                            </span> 
                            </h5>
                            <h4> 
                            <a href="https://www.thenewslens.com/article/59697"><header class="article-title">副總統又談年金：黨職併公職的退休金，找國民黨要</header></a> 
                            </h4> 
                        </div>
                    </article>
                </div> <!-- info-box -->
            </div> <!-- panel panel-default -->
        </div> <!-- col-sm-4 -->

        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="panel panel-default div-fixed-height">  

                <div class="panel-body text-center">
                    <a href="https://www.thenewslens.com/article/59748">
                    <img src="{{ asset('img/news/9aa5fslauhrny56gteu0xnmzt7f6gb.jpg') }}" alt="" style="width: 318.4px;max-width: 100%;max-height: 100%;">
                    </a>
                </div>

                <div class="decoration-none">
                    <article>
                        <div class="pagination-panel-footer footer-margin-bottom">
                            <h5>
                            <span class="time"> 2017/01/19 </span> 
                            <span class="info-categories"><a href="https://www.thenewslens.com/category/world"> 國際 </a></span> 
                            <span class="author">  
                            <a href="https://www.thenewslens.com/author/mymedicaldiary"> 蔡國淦醫生 </a> 
                            </span> 
                            </h5>
                            <h4> 
                            <a href="https://www.thenewslens.com/article/59748"><header class="article-title">燃燒自己讓孩子重展笑容　「僕人」醫生血癌病逝</header></a> 
                            </h4> 
                        </div>
                    </article>
                </div> <!-- info-box -->
            </div> <!-- panel panel-default -->
        </div> <!-- col-sm-4 -->

    </div> <!-- special report -->

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
