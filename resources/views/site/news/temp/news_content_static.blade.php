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

/* news_content */

.decoration-none a:hover {
  text-decoration: none;
}

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

.article-container {
  padding: 0px 15px 10px 15px;
}

.article-pic {
  
}

.excerpt { padding: 15px; border: solid 2px #555555; margin-top: 10px; margin-bottom: 20px; }
.excerpt p { font-size: 1em; color: #777777; line-height: 1.4em; letter-spacing: 0.3px; } 


@media screen and (min-width: 1281px) {
  .article-pic img {
    max-height: 420px;
    width: 100%;
  }
}

@media screen and (max-width: 1280px) {
  .article-pic img {
    max-height: 350px;
    width: 100%;
  }
}

@media screen and (max-width: 1024px) {
  .article-pic img {
    max-height: 280px;
    width: 100%;
  }
}

@media screen and (max-width: 800px) {
  .article-pic img {
    max-height: 200px;
    width: 100%;
  }
}
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
        url: "http://192.168.10.10:8028/news_content",
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
        <div class="article-pic text-center" style="border : 0px solid black;"><img src="img/news_content/29906170001_3624585928001_Screen-Shot-2014-06-16-at-4-44-20-AM.jpg"></div>

        <div class="article-header-container" style="border : 0px solid blue;">
          <div class="text-left" style="border : 0px solid red;">
            <h3>刺魂不滅 Tim Duncan 刺魂不滅 Tim Duncan 刺魂不滅 Tim Duncan 刺魂不滅 Tim Duncan 刺魂不滅 Tim Duncan</h3>
            <div class="row">
              <div class="col-md-9 author">
                <h4><time datetime="2017/02/03/" class="">2017-02-03  18:34</time>&nbsp;<span>Author</span>&nbsp;<span class="label label-primary ">體育</span></h4>
              </div>
              <div class="col-md-3 text-right">
                瀏覽數：<strong>305</strong>&nbsp;&nbsp;
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
            <div class="fb-like" data-href="http://192.168.10.10:8028/news_content" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
          </li>
          </ul>
        </div>

        <header class="excerpt"><p class=""> 報告指出，有72個國家的自由程度是下降的，這一數字是過去10年來最高，只有43個國家有所成長。 </p> </header>


        <div class="article-body">
          <div class="article-content">
            <article>
                    <p>歷經了10餘個年頭，人們終於才發現，原來，定義一個球員的偉大並沒有想像中那麼困難&hellip;&hellip;。</p>

                    <p>
                    一生馬刺人</p>
                    
                    <p>1997年，帕波維奇（Gregg Popovich）前往了聖克洛伊島（St Croix）探訪即將加盟球隊的新成員。他的目的其實很單純。</p>
                    
                    <p>不 久之前，戰績跌落隊史谷底的馬刺隊才剛以絕佳運氣擊敗有著三分之一機率拿到狀元籤的塞爾蒂克。有別於前一年天才輩出、令人眼花撩亂的超級選秀大年，這一年 所有人的目光幾乎都只停留在一位來自威克森林大學的四年級生，他在大四球季這年平均每場可攻下20.9分、14.3籃板，成為NCAA史上唯一一位在單季 至少拿下1,500分、1,000個籃板、400次阻攻和200次助攻的球員，被公認是該屆選秀會上最佳球員，選擇他似乎不是一個太難抉擇的問題。</p>
                    
                    <p>在 聖克洛伊島接下來的幾天，帕波維奇與鄧肯（Tim Duncan）一起游泳、一起用餐、一起談論著彼此的家庭、生活等籃球之外的所有事情。眼前這位瘦高長人不是所有人眼中的救世主，反而更像是帕波維奇的一 位學生、一位老友，儘管兩人相差將近30歲，但這樣的心靈交流卻讓原本陌生的兩人更加貼近。對於高高在上的NBA總教練與一個甚至尚未打過一場正式職業賽 的菜鳥球員來說，這樣情誼和信賴的確相當罕見。</p>
                    
                    <p>三年之後，兩人又一次歷經了這樣的相處時光，在出走奧蘭多的謠言傳得沸沸揚揚的同時，鄧肯在帕波維奇家後院與教練把酒言歡，一切紛擾似乎也在這樣的交談中劃下休止符。鄧肯很清楚，這個完全以他為中心所打造的成功體系，才是他真正的歸屬，他自始至終深信不疑著。</p>
                    
                    <p>然 後12年又過去了，幾乎已經沒有太多人懷疑鄧肯之於馬刺隊是象徵著何種意義，這一次無須親自登門拜訪搏感情，鄧肯很快就與球團達成了續約協議。「我的談判 技巧爛透了！」從原本年薪超過2,000萬美元掉到未來三年平均1,200萬美元的鄧肯如此「發牢騷」著，而帕波維奇也笑著回應道：「他欺騙了我，還威脅 我，幸好（續約協商）事情最後圓滿落幕了。」這對師徒之間的黑色幽默也再次見證了這段難得的情誼，在勞資雙方各謀其利的現代NBA中，這樣的相知相惜就像 鄧肯宛若復古的球技，或許已經很難再一次重現在人們眼前。</p>
                    
                    <p>自從1997年以超級新人之姿震撼全聯盟以來，難以被賦予太多華麗詞藻的鄧肯年 復一年地將獨特的球場性格融入在整支球隊中，創造出近15年來職業運動中最穩定、常青的一支奪勝勁旅。扣除1999年受封館影響的縮水球季，馬刺隊年年都 拿下超過50勝，連續13年達50勝更是寫下聯盟最佳紀錄，期間同時還帶走了四座總冠軍。</p>
                    
                    <p>而在如此悠久的霸權盛世中，馬刺隊並非維持單一 陣容，期間他們歷經了至少三次球員陣容的巨大變動，鄧肯更是已經與超過110位隊友搭配過，但他仍在這樣的過程中面不改色地拿下兩座年度MVP、三座總冠 軍賽MVP、九度入選年度最佳第一隊、八度入選最佳防守第一隊、13次入選明星賽。</p>
                    
                    <p>即使近兩、三年，鄧肯的年齡與老化程度屢屢被外界放大 檢視，然而隨著馬刺隊以全新型態的球風頻頻登上西區龍頭寶座，上季更是寫下例行賽與季後賽連勝20場的新猷，鄧肯遊走王牌和非王牌的角色變化、與其場上巨 大影響力，以及進入季後賽的戰力升級等面貌，都不斷展現他歷經歲月與傷病妥協下去蕪存菁的精煉功力。</p>
                    
                    <p>這樣的過程甚至很多人都指向是帕波維奇所刻意「安排」的，目的是為了進一步延長鄧肯的職業生涯，透過鄧肯的影響力促成馬刺體系的完整，進而為不同時期的陣容組成提供戰術球風轉變的空間。</p>
                    
                    <p>
                    師徒之間的神鬼奇航</p>
                    
                    <p>從 表面上來看，鄧肯的平均上場時間、出手數乃至於主要的攻守成績，都呈現逐年下滑的態勢，從昔日「20分10籃板2阻攻」的球場公務員，逐漸變成為年輕隊友 開路、鞏固內線基礎的「頂級苦力」。然而，當我們再細看鄧肯這些年所繳出更精確的數據後，我們赫然發現，這很可能是NBA近代史上最詭譎神秘的「養生計 劃」！</p>
                    
                    <p>在鄧肯生涯前六個賽季中，一共只缺席了九場比賽，平均上場時間更超過39分鐘。不過從2003-04年球季之後，受到傷病困擾，馬 刺球團開始針對鄧肯的職業生涯進行長時間的控制計劃，近10年來他的上場時間大幅下降了將近10分鐘，連帶也影響他的攻守數據。然而就更細膩的數據來看， 鄧肯的「籃板獲得率（TRB%）」始終維持在生涯平均值18.5上下，最近11年每季的數據更是超越其生涯初期五年的表現，而另外在「防守籃板獲得率 （DRB%）」上的表現更為可觀，近幾年平均達到將近28%，即便是歐拉朱萬（Hakeem Olajuwon）、歐尼爾（Shaquille O&#39;Neal）、馬龍（Karl Malone）、賈奈特（Kevin Garnett）等籃板好手都很難維持這樣的高水平。</p>
                    
                    <p>如此一直維 持10%的「進攻籃板獲得率（ORB%）」和26%的「防守籃板獲得率」，在歷史上也是極為罕見，以單季來看，鄧肯已經有五次達成這樣的數據，而過去史上 自1974年至今，也只有羅德曼（Dennis Rodman）的八次和豪爾（Dwight Howard）的七次比他還多。此外，在助攻率、抄截率、阻攻率和失誤率等統計數字上，鄧肯這些年一直維持十分穩定的績效，即使上場時間大幅縮減，但鄧肯 所產生的嚇阻力甚至不比他早年遜色。</p>
                    
                    <p>至於進攻端，或許才是人們最大的質疑所在。進攻模式逐漸朝中距離發展的鄧肯，其「進攻效率值 （TS%）」呈現下滑的趨勢，平均得分更因為「使用球權率（USG%）」的下降而產生數據的退化。但從鄧肯的季後賽平均得分都比例行賽來得高的結果來看， 鄧肯的得分下探是「非不能為，實不願為」，這樣的結果很大一部份是來自帕波維奇的刻意「阻擋」。</p>
                    
                    <p>不只一次，我們都在不經意流出的影片中看 到帕波維奇「阻止」鄧肯上場比賽的有趣畫面，另一方面更搭配獨到的「輪休」戰術，這一切謹慎措施或許也可以說明馬刺球團以及總教練對於這位鎮隊之寶的高度 保護，讓鄧肯能夠將所有力量發揮在季後賽的關鍵時刻。這也是馬刺從防守型球隊因應陣容更替進而轉變成進攻型球隊所必須面對的調整策略，同時也是讓鄧肯能在 這樣的過渡下依然維持其高效率的攻守價值，讓球隊得以在主力核心年齡漸長的情況下，循序漸進實現「後鄧肯時期」的遞嬗，在沒有太多薪資籌碼與運作空間中， 持續散發出西區王者的不朽光芒。</p>
                    
                    <p>「只要我仍保持健康的狀態，在場上還能維持效率，我就會繼續打下去，關於退休的事就讓它自然而然發生 吧。」鄧肯在上季接受採訪時曾這麼說。「今年對我來說棒極了。上場時間減少了，但球隊成績很好。作為一個球員，我當然想多打一些比賽，但事實上你無法抵抗 年齡的侵襲，這就是帕波維奇減少我上場時間的原因。從長遠來看，這對我幫助甚大。」</p>
                    
                    <p>「和很多人不同的是，我十分幸運，」鄧肯接著說。「在我們的球隊裡，所有人都是為了勝利而聚集在一起的，我們形成一個體系，並且將它堅持下去。再沒有比這更好的方式了。」</p>
                    
                    <p>帶 領馬刺隊連續15年打進季後賽，並創造在這段期間內聯盟最佳的七成勝率，帕波維奇與鄧肯師徒兩人如生命共同體般存在，在前年成為灰熊隊寫下「老八傳奇」的 苦主後，竟在沒有太多人看好的情況下，上季又一次率領球隊直衝分區決賽，而本季至今也依然是西區的佼佼者，馬刺隊的百足之蟲姿態在聯盟勢力版圖大幅洗牌的 時代趨勢下，儼然已是球隊經營的絕佳典範。</p>
                    
                    <p>當然，對於這一切，帕波維奇還是將功勞給了鄧肯。</p>
                    
                    <p>「幾乎每個月都會有那麼一次，當我在我家附近散步時，我會對我的妻子說：『謝謝你，Tim（鄧肯名）。』我是非常認真的。」帕波維奇說。</p>
                    
                    <p>
                    灰影地帶</p>
                    
                    <p>很 多人說，馬刺隊那黑白相間的球衣配色，簡直就像是為了鄧肯量身訂造：樸實、無私、低調、沉默、不譁眾取寵、永遠追求最純粹的勝利；更多人則是認為鄧肯像是 職業運動中的一個「異類」，沒有華麗炫目的技術，沒有獨樹一格的招牌動作，不是媒體寵兒，不是聯盟想要形塑的明日之星，是商品代言的絕緣體，甚至是所謂的 票房毒藥，鄧肯就像一個籃球機器般，日復一日，年復一年，精準地重複著人們熟知的步驟，如同他長年在泳池旁所苦練的技巧一般，總是不斷重複簡單的步驟，以 求趨近於最後完美的境界。</p>
                    
                    <p>然而在鄧肯看似「憨厚」、「冰冷」的一號表情下，透過長年心理學磨練而來的性格其實是暗藏更多的幽默和狡獪。在 球場上，他總是和對手大玩心理遊戲，用沉默擊垮對手。「與對手進行最好的心智遊戲就是你不斷不斷地進攻他，直到他崩潰。不要有任何言語，不要透露任何情 緒，只需要不斷進攻即可。」鄧肯微笑著說，「最後，你就會惹怒他們。」</p>
                    
                    <p>長年擔任馬刺隊助理教練的巴登霍澤（Mike Budenholzer）也承認鄧肯是極為聰明的一位球員。「他知道戰術手冊從頭到尾的每一個細節，包括每一個球員應該怎麼做，從一號位到五號位。」巴登霍澤說。「如果他需要那樣做的話，鄧肯完全可以指揮一支球隊。」</p>
                    
                    <p>昔 日隊友M.羅斯（Malik Rose）認為鄧肯之所以能有這樣的成就，絕非只是苦練而已，而是懂得找出正確的方式去鍛鍊。「他總是想著要做到盡善盡美，然後就不停反覆練習。如果他覺 得自己哪些地方做得不對或是不夠好，他一定會想辦法修正，再按照正確的方式練習。當你看著他這樣做時，你就會明白什麼是精益求精。」</p>
                    
                    <p>R.梅森（Roger Mason）則讚嘆道：「他實在是太聰明了。他能維持這麼好的狀態，就是腦筋動得很快，他總是能在適當的時機出現在合適的位置。」</p>
                    
                    <p>在 鄧肯的世界裡，改變的永遠只會是對手，看似簡約卻不簡單的特質，讓鄧肯總能在需要他的時刻展現非凡的價值。本季開季之初，一個輕盈又充滿侵略性的鄧肯重現 在人們面前，平均攻下18.5分、10.9籃板、2.3阻攻，還有五場比賽演出「20分10籃板」，堪稱是他自2008-09年球季以來最好的表現，其上 場時間也未因此增加太多，由此可見鄧肯在比賽中輕鬆自如的狀態。這其中很重要的關鍵在於鄧肯十分有效地控制體重，調整體態以減輕膝蓋的負擔，包括早在上季 他就減去了超過20磅的重量。</p>
                    
                    <p>「他在過去三年內減掉了蠻多的體重，而且在這個夏天他做了很多柔軟度方面的訓練。他對於保持自己的身體真的很自律。」帕波維奇說。</p>
                    
                    <p>帕波維奇更進一步說明：「他一直都是一個合理運用紮實基本功的球員，但今年他增加了運球突破的次數，他讓自己的進攻手段更豐富，可以在擋拆後根據防守者的不同情況做最適當的處理。這有點像是喬丹（Michael Jordan）後來運用更多的投籃取代切入扣籃。」</p>
                    
                    <p>談到喬丹，他在35歲那一年完成個人第二次的三連霸，而更早之前的羅素（Bill Russell）也是在35歲這一年拿到他的第11枚冠軍戒，歷史上能在這個年齡以主力之姿率隊奪冠者屈指可數，36歲的鄧肯或許有機會再一次重現這樣的神蹟。</p>
                    
                    <p>「我們已經很幸運能贏得四座冠軍，這比多數球員的職業生涯都還要多。」在上季遭到雷霆隊逆轉後，鄧肯坦然面對這樣的結局。「大部份的球員在每季結束之後都是失望的，你所能做的就是重拾心情，做好準備再來挑戰。」</p>
                    
                    <p>話雖說得雲淡風輕，但在淡定的表情之下，又有誰敢低估鄧肯再一次衝擊冠軍的決心？</p>

            </article>
          </div><!-- article-content -->
        </div><!-- article-body -->



      </div>

      <!-- Right -->
      <div class="col-md-3 div-margin-top" id="" style="border: 0px solid red;">

        <div class="listbox-title text-left" data-desc=""><a href="new_news">最新文章</a></div>
        <div class="listbox text-left">

            <ul class="boxTitle" data-desc="最新文章">
                <li>
                    <a href="m/news/28562">Galaxy S8 將是三星集大成之作？5 大亮點等你敗！</a>
                </li>
                <li>
                    <a href="m/news/28572">小米 5C 可望本月發表，小米自製處理器也要登場？</a>
                </li>
                <li>
                    <a href="m/news/28571">iOS 10.2.1.讓問題更大？iPhone 用戶抱怨 Touch ID 被弄死！</a>
                </li>
                <li>
                    <a href="m/news/28564">LINE 也該學學了？WhatsApp 將加入「訊息收回」功能！</a>
                </li>
                <li>
                    <a href="m/news/28563">神似 HTC U Ultra 的機背？LG G6 清晰諜照曝光！</a>
                </li>
                <li>
                    <a href="m/news/28561">Pixel 專屬功能，Google 可望下放給這 2 款手機！</a>
                </li>
                <li>
                    <a href="m/news/28567">絕對不再重蹈覆轍！三星 Galaxy S8 電池將找「它」合作！</a>
                </li>
                <li>
                    <a href="m/news/28560">小容量 Android 機救星？Google 開始測試超輕量 App！</a>
                </li>
            </ul>
        </div>


      </div>

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
          <img class="ad-width" src="img/news_content/13619849_1131272576893958_6095304397828770119_n.jpg" alt="">
        </a>
      </div>
    </div>

    <div id="float-div-left-top" class="ad-width">
      <div class="pos-relative ">        
        <span class="close-item">
        <i class="fa fa-times-circle-o fa-lg fa-inverse" aria-hidden="true"></i>
        </span>
        <a href="http://www.xxlbasketball.com.tw/article/131" target="_blank">
          <img class="ad-width" src="img/news_content/13765754_1392517234097557_8456676202465229807_o.jpg" alt="">
        </a>
      </div>
    </div>

    <div id="float-div-right" class="ad-width">
      <div class="pos-relative ">
        <span class="close-item">
        <i class="fa fa-times fa-lg " aria-hidden="true"></i>
        </span>
        <a href="http://store.asus.com/tw/category/A21300" id="" target="_blank">
          <img class="ad-width" src="img/news_content/201603AM210000094_14585287246327160027544.jpg" alt="">
        </a>
      </div>
    </div>

    <div id="float-div-right-top" class="ad-width">
      <div class="pos-relative ">
        <span class="close-item">
        <i class="fa fa-times-circle-o fa-lg " aria-hidden="true"></i>
        </span>
        <a href="http://24h.pchome.com.tw/prod/DRAH60-A9007RQ86" id="" target="_blank">
          <img class="ad-width" src="img/news_content/DRAH60-A9007RQ86000_5881ee7371072.jpg" alt="">
        </a>
      </div>
    </div>

    <div class="container text-center">
      <a href="#pagebody" title="To Top">
      <span class="glyphicon glyphicon-chevron-up"></span>
      </a>
    </div>

@stop
