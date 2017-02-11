@extends('site.layouts.master')

@section('pageTitle')
<title>Laravel News Index</title>
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

/* news_index */
.info-categories {
  text-decoration: none;
  color: #e7eaec;
}

.info-categories::before, .info-categories::after {
  content: "\25cf";
  color: #e7eaec;
}

.div-fixed-height {
  min-height: 350px;
  /*width: auto;
  height: auto;*/
}

.panel-carousel {
  padding: 1px 1px 1px 1px ;
}

/* textslider */
.slideText {
    position: relative;
    overflow: hidden;
    width: 100%;
    /*height: 3em;*/
    height: 1.5em;
}

.slideText ul, .slideText li {
    margin: 0;
    padding: 0;
    list-style: none;
    width: 100%;
}

.slideText ul {
    position: absolute;
}

.slideText li {
    /* text-align: center; */
}

.slideText li a {
  display: block;
  overflow: hidden;
  font-size: 1em;
  height: 1.5em;
  line-height: 1.5em;
  text-decoration: none;
}

.slideText li a:hover {
    text-decoration: underline;
}

#breakingnews {
  text-align: left;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;

  opacity: 1;
  /* height: 45px; */
  /* padding-top: 10px; */
}

#breakingnews span {
  color: black;
}

#breakingnews i {
  color: #ffff4d;
}

#newslist ul {
  padding-left: 0px;
}

#newslist li {
  padding-left: 40px;
}  

#newslist time, #newslist span {
  /* padding: 0px 10px 0px 0px; */
  margin: 0px 10px 0px 0px;
}

#newslist li a {
  text-decoration: none;
}

#newslist ul, #newslist li {
  list-style: none;
  text-align: left;
}

#newslist li:nth-child(odd) {
  /* background-color: #bce8f1; */
  background-color: #e7eaec;
}

#newslist_panel-body {
  padding-bottom: 0px;
}

.pagination-panel-footer {
  text-align: center; 
  padding: 0px 0px 0px 0px;
  background-color: #ffffff;
  border-top: 0px solid #ddd;
}

.pagination-panel-footer ul {
  margin: 0px;
}

#control_panel {
  display: none;
}

.sp-margin {
  margin: 70px 120px 50px 120px;
  padding: 0px ;
  border-bottom: 1px solid #e7eaec;
}

.info-box a:hover {
  text-decoration: none;
}

.article-title {
  color: black;
}

.article-title:hover {
  opacity: 0.6;
}

.categories-label {
  font-size: 1em;
}

/* label color */

@foreach($newscategories as $newscategory)
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
        url: "http://192.168.10.10:8028/news_index",
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
                                <li><a href="#"><i class="fa fa-bolt fa-fw" aria-hidden="true"></i><span> 1【創新拿鐵】辦公室變社群網站！</span></a></li>                            
                                <li><a href="#"><i class="fa fa-bolt fa-fw" aria-hidden="true"></i><span> 2【創新拿鐵】辦公室變社群網站！</span></a></li>                            
                                <li><a href="#"><i class="fa fa-bolt fa-fw" aria-hidden="true"></i><span> 3【創新拿鐵】辦公室變社群網站！</span></a></li>                            
                            </ul>
                        </div>
                    </div>
                </div> <!-- panel-heading -->

                <div class="panel-body panel-carousel">
                    <!-- carousel -->
                    <div id="myCarousel" class="carousel slide" data-ride="carousel"  data-interval="2000" style="border : 0px solid blue;">

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox" style="border : 0px solid black;">
                    
                            <div class="item active">
                                <a href="#">
                                    <img src="{{ Voyager::image('index-carousels/January2017/5o7nTc5dBtOGTGWy1JE9.jpg') }}" alt="bookstore" style="height: 400px;width: 743.4px;">
                                    <div class="carousel-caption">
                                        <h3>書店</h3>
                                        <p>輕鬆打造質感生活，提供齊全中外文書籍</p>
                                    </div>
                                </a>
                            </div>
                    
                            <div class="item">
                                <a href="#">
                                    <img src="{{ Voyager::image('index-carousels/January2017/ztP8tEkdJeaOtiBhMh18.jpg') }}" alt="news" style="height: 400px;width: 743.4px;">
                                    <div class="carousel-caption">
                                        <h3>新聞</h3>
                                        <p>頭條新聞及即時新聞，讓你隨時隨地掌握最新消息和熱門話題</p>
                                    </div>
                                </a>
                            </div>
                    
                            <div class="item">
                                <a href="#">
                                    <img src="{{ Voyager::image('index-carousels/January2017/x0boUEd8Om1PSSzeGpHo.jpg') }}" alt="sports" style="height: 400px;width: 743.4px;">
                                    <div class="carousel-caption">
                                        <h3>運動</h3>
                                        <p>所有體育賽事相關報導</p>
                                    </div>
                                </a>
                            </div>
                    
                            <div class="item">
                                <a href="#">
                                    <img src="{{ Voyager::image('index-carousels/January2017/HHk1ReHXaMe9RYEwgjDw.jpg') }}" alt="movie" style="height: 400px;width: 743.4px;">
                                    <div class="carousel-caption">
                                        <h3>電影</h3>
                                        <p>電影介紹,電影時刻表,電影預告,最新電影</p>
                                    </div>
                                </a>
                            </div>
                    
                            <div class="item">
                                <a href="#">
                                    <img src="{{ Voyager::image('index-carousels/January2017/eH0jY1dQ3lEyoh6Xq3hD.jpg') }}" alt="music" style="height: 400px;width: 743.4px;">
                                    <div class="carousel-caption">
                                        <h3>音樂</h3>
                                        <p>所有音樂類型的相關資訊</p>
                                    </div>
                                </a>
                            </div>
                        
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

                </div> <!-- panel-body -->

            </div> <!-- panel -->

            <div class="sharing-btn" style="">
                <ul class="list-group list-inline">
                    <li class="list-group-item">
                    <!-- jsSocials -->
                    <div id="share"  style=""></div>
                </li>
                <li class="list-group-item">
                    <!-- fb-like -->
                    <div class="fb-like" data-href="http://192.168.10.10:8028/news_index" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
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
                                @if(!strcmp($criterionDate, substr($post->updated_at, 0, 10)))
                                    <li class="list-group-item"><a href="{{ url("news/article/".$post->id) }}" target="_blank"><time>{{ substr($post->updated_at, 11, 5) }}</time><span class="label {{ $post->label_class }} categories-label">{{ $post->cate_title }}</span><span class="color_black">{{ $post->id }} {{ $post->title }}</span></a></li>                                                                                              
                                @else
                                    <?php $criterionDate = substr($post->updated_at, 0, 10);$date = explode("-", $criterionDate);//echo $date[0]." ".$date[1]." ".$date[2]; ?>
                                    </ul>
                                    <h4><time>{{ $date[0] }} / {{ $date[1] }} / {{ $date[2] }}</time></h4>
                                    <ul class="list-group">
                                    <li class="list-group-item"><a href="{{ url("news/article/".$post->id) }}" target="_blank"><time>{{ substr($post->updated_at, 11, 5) }}</time><span class="label {{ $post->label_class }} categories-label">{{ $post->cate_title }}</span><span class="color_black">{{ $post->id }} {{ $post->title }}</span></a></li>                                                                           
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
            <div class="fb-comments" data-href="http://192.168.10.10:8028/news_index" data-numposts="5"></div>

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
