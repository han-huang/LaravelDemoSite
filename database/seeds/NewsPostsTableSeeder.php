<?php

use Illuminate\Database\Seeder;
use App\NewsPost;
use Carbon\Carbon;

class NewsPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //clear data of table news_posts
        DB::table('news_posts')->truncate();

        $now = Carbon::now('Asia/Taipei');
        $num = 26; //no-repeat records
        $id = 0;
        $round = 30;
        $input_time = $now->subHours($num * $round); //first record is the oldest

        for ($i = 0; $i < $round; $i++) {

            $id++;
            $dataType = NewsPost::firstOrNew([
                'id'     => $id,
                'author' => '林書凱',
                'title'  => 'NBA》馬刺客場踢館　七六人吞5連敗',
            ]);
            if (!$dataType->exists) {
                $dataType->fill([
                    'author_id'        => 1,
                    'news_category_id' => 1,
                    'seo_title'        => '聖安東尼奧馬刺',
                    'excerpt'          => '',
                    'body'             => '<figure class="image"><img title="馬刺今天擊敗七六人，讓七六人苦吞五連敗。" src="/storage/news-posts/February2017/Df2RcQoYN7cHj65FCLQE.jpg" alt="馬刺今天擊敗七六人" width="800" />
<figcaption><span style="color: #666666; font-family: Roboto, sans-serif; font-size: 15px; text-align: start; background-color: #fefefe;">馬刺今天擊敗七六人，讓七六人苦吞五連敗。圖/翻攝自馬刺隊推特</span></figcaption>
</figure>
<p style="box-sizing: border-box; border: 0px; margin: 0px 0px 21px; outline: 0px; padding: 0px; vertical-align: baseline; line-height: 27px; color: #333333; font-family: 微軟正黑體; font-size: 18px;">&nbsp;</p>
<p style="box-sizing: border-box; border: 0px; margin: 0px 0px 21px; outline: 0px; padding: 0px; vertical-align: baseline; line-height: 27px; color: #333333; font-family: 微軟正黑體; font-size: 18px;">聖安東尼奧馬刺今天靠著雷納德（Kawhi Leonard）單場32分，以及派克（Tony Parker）18分力挺，以111比103擊敗費城七六人。</p>
<p style="box-sizing: border-box; border: 0px; margin: 0px 0px 21px; outline: 0px; padding: 0px; vertical-align: baseline; line-height: 27px; color: #333333; font-family: 微軟正黑體; font-size: 18px;">七六人隊少了明星中鋒安彼得（Joel Embiid），他因左膝傷勢連續缺賽6場了，歐卡佛（Jahlil Okafor）攻下20分、8籃板，薩里奇（Dario Saric）同樣進帳20分，可惜無法阻止球隊吞下5連敗。</p>
<p style="box-sizing: border-box; border: 0px; margin: 0px 0px 21px; outline: 0px; padding: 0px; vertical-align: baseline; line-height: 27px; color: #333333; font-family: 微軟正黑體; font-size: 18px;">整場比賽落後的七六人隊，在第4節歐卡佛兩罰得手後，把落後追到85比87只剩2分，不過馬刺隊利用一波16比5攻勢，再度放大雙方差距，馬刺隊葛林（Danny Green）在比賽剩2分14秒的三分球，讓馬刺隊103比92領先達11分。</p>
<p style="box-sizing: border-box; border: 0px; margin: 0px 0px 21px; outline: 0px; padding: 0px; vertical-align: baseline; line-height: 27px; color: #333333; font-family: 微軟正黑體; font-size: 18px;">七六人隊在安彼得出賽時，戰績13勝18負，當他缺陣時，戰績跌到5勝16負。</p>
<p style="box-sizing: border-box; border: 0px; margin: 0px 0px 21px; outline: 0px; padding: 0px; vertical-align: baseline; line-height: 27px; color: #333333; font-family: 微軟正黑體; font-size: 18px;">馬刺隊阿德雷奇（LaMarcus Aldridge）贊助15分、10籃板，戴德蒙（Dewayne Dedmon）10分、11籃板。</p>
<p style="box-sizing: border-box; border: 0px; margin: 0px 0px 21px; outline: 0px; padding: 0px; vertical-align: baseline; line-height: 27px; color: #333333; font-family: 微軟正黑體; font-size: 18px;">馬刺主場AT&amp;T中心因要舉辦一年一度的牛仔競技大會，再兩場比賽他們就要展開第15度的牛仔客場長征（Rodeo Road Trip），20天中馬刺隊要在7個城市進行8場比賽，旅行里程達7378英哩（約11874公里），他們在牛仔客場之旅的戰績，為83勝36負。</p>',
                    'image'            => '',
                    'meta_description' => '聖安東尼奧馬刺今天靠著雷納德（Kawhi Leonard）單場32分，以及派克（Tony Parker）18分力挺，以111比103擊敗費城七六人。七六人隊少了明星中鋒安彼得（Joel Embiid），他因左膝傷勢連續缺賽6場了，歐卡佛（Jahlil Okafor）攻下20分、8籃板，薩里奇（Dario Saric）同樣進帳20分，可惜無法阻止球隊吞下5連敗。',
                    'meta_keywords'    => 'NBA》馬刺客場踢館　七六人吞5連敗 - 麗台運動報',
                    'status'           => 'PUBLISHED',
                    'active'           => 1,
                    'breaking_news'    => 1,
                    'created_at'       => $input_time,
                    'updated_at'       => $input_time,
                ])->save();
            }

            $id++;
            $input_time = $now->addHour(); //one record per hour
            $dataType = NewsPost::firstOrNew([
                'id'     => $id,
                'author' => '林書凱',
                'title'  => 'NBA》騎士單節轟40分　柯佛三分射垮溜馬',
            ]);
            if (!$dataType->exists) {
                $dataType->fill([
                    'author_id'        => 1,
                    'news_category_id' => 1,
                    'seo_title'        => 'NBA》騎士單節轟40分　柯佛三分射垮溜馬 - 麗台運動報',
                    'excerpt'          => '',
                    'body'             => '<figure class="image"><img title="Kyle Korver今天攻下個人本季單場新高29分" src="/storage/news-posts/February2017/9lwCHcYlKkNDf469MRdK.jpg" alt="Kyle Korver今天攻下個人本季單場新高29分。圖/翻攝自騎士隊推特" />
<figcaption>柯佛三分射垮溜馬</figcaption>
</figure>
<p style="box-sizing: border-box; border: 0px; margin: 0px 0px 21px; outline: 0px; padding: 0px; vertical-align: baseline; line-height: 27px; color: #333333; font-family: 微軟正黑體; font-size: 18px;">&nbsp;</p>
<p style="box-sizing: border-box; border: 0px; margin: 0px 0px 21px; outline: 0px; padding: 0px; vertical-align: baseline; line-height: 27px; color: #333333; font-family: 微軟正黑體; font-size: 18px;">克利夫蘭騎士射手柯佛（Kyle Korver）今天攻下個人本季單場新高29分，加上當家球星詹姆斯（LeBron James）下半場為球隊提升活力，騎士隊132比117擊敗印第安那溜馬。</p>
<p style="box-sizing: border-box; border: 0px; margin: 0px 0px 21px; outline: 0px; padding: 0px; vertical-align: baseline; line-height: 27px; color: #333333; font-family: 微軟正黑體; font-size: 18px;">騎士隊在這波客場4連戰前3場收下勝利，也贏得最近7場比賽的6場勝利，詹姆斯本戰貢獻25分、9助攻、6籃板，柯佛則是三分球9投8中，後衛厄文（Kyrie Irving）挹注29分。</p>
<p style="box-sizing: border-box; border: 0px; margin: 0px 0px 21px; outline: 0px; padding: 0px; vertical-align: baseline; line-height: 27px; color: #333333; font-family: 微軟正黑體; font-size: 18px;">溜馬隊邁爾斯（C.J. Miles）23分為全隊最高，提格（Jeff Teague）獲得22分、14助攻，喬治（Paul George）22分、8籃板、6助攻，可惜球隊仍結束了本季最佳的7連勝，主場4連勝也喊停。</p>
<p style="box-sizing: border-box; border: 0px; margin: 0px 0px 21px; outline: 0px; padding: 0px; vertical-align: baseline; line-height: 27px; color: #333333; font-family: 微軟正黑體; font-size: 18px;">騎士隊上半場狀況較差，但下半場投籃命中率高達61.9％，第3節狂轟40分，單節得分創球隊本季新高，且該節讓溜馬只得18分，因此扭轉了上半場57比63的落後劣勢。</p>
<p style="box-sizing: border-box; border: 0px; margin: 0px 0px 21px; outline: 0px; padding: 0px; vertical-align: baseline; line-height: 27px; color: #333333; font-family: 微軟正黑體; font-size: 18px;">柯佛生涯已經投進1992記三分球，超越奇德（Jason Kidd）的1988顆，排NBA史上第7。</p>',
                    'image'            => '',
                    'meta_description' => '克利夫蘭騎士射手柯佛（Kyle Korver）今天攻下個人本季單場新高29分，加上當家球星詹姆斯（LeBron James）下半場為球隊提升活力，騎士隊132比117擊敗印第安那溜馬。 騎士隊在這波客場4連戰前3場收下勝利，也贏得最近7場比賽的6場勝利，詹姆斯本戰貢獻25分、9助攻、6籃板',
                    'meta_keywords'    => 'NBA》騎士單節轟40分　柯佛三分射垮溜馬',
                    'status'           => 'PUBLISHED',
                    'active'           => 1,
                    'created_at'       => $input_time,
                    'updated_at'       => $input_time,
                ])->save();
            }

            $id++;
            $input_time = $now->addHour(); //one record per hour
            $dataType = NewsPost::firstOrNew([
                'id'     => $id,
                'author' => '自由時報',
                'title'  => 'NBA》一度被籃球榨乾 溜馬喬治振作擺脫季初陰霾',
            ]);
            if (!$dataType->exists) {
                $dataType->fill([
                    'author_id'        => 1,
                    'news_category_id' => 1,
                    'seo_title'        => 'NBA》一度被籃球榨乾 溜馬喬治振作擺脫季初陰霾 - 自由體育',
                    'excerpt'          => '',
                    'body'             => '<figure class="image"><img title="溜馬隊球星喬治" src="/storage/news-posts/February2017/Diva64nIBBtCqBeUBvcy.jpg" alt="溜馬隊球星喬治（Paul George）" />
<figcaption><span style="color: #000000; font-family: monospace; font-size: medium; text-align: start; white-space: pre-wrap;">喬治。（美聯社）</span></figcaption>
</figure>
<p>&nbsp;</p>
<p style="margin: 0px; padding: 0px 0px 20px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 16px; line-height: 1.7rem; font-family: 微軟正黑體, 新細明體, Calibri, Arial, sans-serif; vertical-align: baseline; text-align: justify; color: #000000; letter-spacing: 1px;">〔體育中心／綜合報導〕溜馬隊球星喬治（Paul George）在球季前兩個月活在恐懼中，「我那時正經歷一段黑暗的低潮。」喬治表示，「除了忙著應付腳傷，隊上的化學反應不佳，尤其是我和提格（Jeff Teague）間，我感到無能為力。」</p>
<p style="margin: 0px; padding: 0px 0px 20px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 16px; line-height: 1.7rem; font-family: 微軟正黑體, 新細明體, Calibri, Arial, sans-serif; vertical-align: baseline; text-align: justify; color: #000000; letter-spacing: 1px;">喬治在2014年參加美國隊訓練時，右腳嚴重骨折，這兩年花了很多心力重回球場，期間也不時遇上其他傷病。喬治說：「我的身心都被籃球榨乾了，季初時我並不在100%狀態，我花了些時間才調整好。」</p>
<p style="margin: 0px; padding: 0px 0px 20px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 16px; line-height: 1.7rem; font-family: 微軟正黑體, 新細明體, Calibri, Arial, sans-serif; vertical-align: baseline; text-align: justify; color: #000000; letter-spacing: 1px;">喬治說明關鍵在1月倫敦賽的一晚，他花了整夜的時間祈禱和冥想，「我發覺我所做的一切正是我最熱愛的，我該好好享受當下，這就是改變一切的關鍵。」</p>
<p style="margin: 0px; padding: 0px 0px 20px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 16px; line-height: 1.7rem; font-family: 微軟正黑體, 新細明體, Calibri, Arial, sans-serif; vertical-align: baseline; text-align: justify; color: #000000; letter-spacing: 1px;">「現在我的身心狀態都已經調適良好。」喬治的覺醒也給溜馬帶來了正面能量，1月份拿下9勝4敗的佳績，更一度拉出7連勝，目前29勝23敗排名東區第六。</p>
<p>&nbsp;</p>',
                    'image'            => '',
                    'meta_description' => '溜馬隊球星喬治（Paul George）在球季前兩個月活在恐懼中，「我那時正經歷一段黑暗的低潮。」喬治表示，「除了忙著應付腳傷，隊上的化學反應不佳，尤其是我和提格（Jeff Teague）間，我感到無能為力。」喬治在2014年參加美國隊訓練時，右腳嚴重骨折',
                    'meta_keywords'    => '溜馬喬治振作擺脫季初陰霾',
                    'status'           => 'PUBLISHED',
                    'active'           => 1,
                    'created_at'       => $input_time,
                    'updated_at'       => $input_time,
                ])->save();
            }

            $id++;
            $input_time = $now->addHour(); //one record per hour
            $dataType = NewsPost::firstOrNew([
                'id'     => $id,
                'author' => '自由時報',
                'title'  => '經典賽》台灣隊公布28人名單 旅外6人史上最少',
            ]);
            if (!$dataType->exists) {
                $dataType->fill([
                    'author_id'        => 1,
                    'news_category_id' => 1,
                    'seo_title'        => '經典賽》台灣隊公布28人名單 旅外6人史上最少 - 自由體育',
                    'excerpt'          => '',
                    'body'             => '<figure class="image"><img title="陽岱鋼" src="/storage/news-posts/February2017/8RgzcLTDzvV9XwpmtMOp.jpg" alt="陽岱鋼" />
<figcaption><span style="color: #000000; font-family: monospace; font-size: medium; text-align: start; white-space: pre-wrap;">陽岱鋼雖還沒回覆是否參賽，仍列入28人名單。（資料照，記者陳志曲攝）</span></figcaption>
</figure>
<p>&nbsp;</p>
<p style="margin: 0px; padding: 0px 0px 20px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 16px; line-height: 1.7rem; font-family: 微軟正黑體, 新細明體, Calibri, Arial, sans-serif; vertical-align: baseline; text-align: justify; color: #000000; letter-spacing: 1px;">〔記者徐正揚／台北報導〕中華棒協今天下午召開選訓會議，決定經典賽台灣隊28人名單、2月赴澳洲移訓練32人名單，雖然陽岱鋼尚未回覆是否參加，選訓委員與教練團仍決定把他放進28人名單。</p>
<p style="margin: 0px; padding: 0px 0px 20px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 16px; line-height: 1.7rem; font-family: 微軟正黑體, 新細明體, Calibri, Arial, sans-serif; vertical-align: baseline; text-align: justify; color: #000000; letter-spacing: 1px;">連同還不確定的陽岱鋼、準備去打日本獨立聯盟的羅國華，28人名單中只有6名旅外球員，是台灣歷次參加經典賽最少的1次，過去3屆最少都有9人，以第2屆11人最多。本屆是首次沒有業餘球員入選。</p>
<p style="margin: 0px; padding: 0px 0px 20px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 16px; line-height: 1.7rem; font-family: 微軟正黑體, 新細明體, Calibri, Arial, sans-serif; vertical-align: baseline; text-align: justify; color: #000000; letter-spacing: 1px;"><iframe title="郭泰源談將陽岱鋼放入28人名單" src="https://www.youtube.com/embed/GrG9y5dkeis?wmode=opaque&amp;theme=dark" width="560" height="315" frameborder="0" allowfullscreen=""></iframe></p>
<p style="margin: 0px; padding: 0px 0px 20px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 16px; line-height: 1.7rem; font-family: 微軟正黑體, 新細明體, Calibri, Arial, sans-serif; vertical-align: baseline; text-align: justify; color: #000000; letter-spacing: 1px;">經典賽台灣隊28人名單如下：</p>
<p style="margin: 0px; padding: 0px 0px 20px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 16px; line-height: 1.7rem; font-family: 微軟正黑體, 新細明體, Calibri, Arial, sans-serif; vertical-align: baseline; text-align: justify; color: #000000; letter-spacing: 1px;">投手（13人）</p>
<p style="margin: 0px; padding: 0px 0px 20px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 16px; line-height: 1.7rem; font-family: 微軟正黑體, 新細明體, Calibri, Arial, sans-serif; vertical-align: baseline; text-align: justify; color: #000000; letter-spacing: 1px;">郭俊麟、陳冠宇、宋家豪、江少慶（旅外）、潘威倫、王鏡銘、陳韻文（統一）、倪福德、黃勝雄、蔡明晉、林晨樺（富邦）、陳鴻文（中信）、羅國華（高知）。</p>
<p style="margin: 0px; padding: 0px 0px 20px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 16px; line-height: 1.7rem; font-family: 微軟正黑體, 新細明體, Calibri, Arial, sans-serif; vertical-align: baseline; text-align: justify; color: #000000; letter-spacing: 1px;">捕手（2人）</p>
<p style="margin: 0px; padding: 0px 0px 20px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 16px; line-height: 1.7rem; font-family: 微軟正黑體, 新細明體, Calibri, Arial, sans-serif; vertical-align: baseline; text-align: justify; color: #000000; letter-spacing: 1px;">林琨笙（富邦）、鄭達鴻（中信）。</p>
<p style="margin: 0px; padding: 0px 0px 20px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 16px; line-height: 1.7rem; font-family: 微軟正黑體, 新細明體, Calibri, Arial, sans-serif; vertical-align: baseline; text-align: justify; color: #000000; letter-spacing: 1px;">內野手（7人）</p>
<p style="margin: 0px; padding: 0px 0px 20px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 16px; line-height: 1.7rem; font-family: 微軟正黑體, 新細明體, Calibri, Arial, sans-serif; vertical-align: baseline; text-align: justify; color: #000000; letter-spacing: 1px;">林智勝、王勝偉、蔣智賢、許基宏（中信）、林志祥、陳鏞基（統一）、林益全（富邦）。</p>
<p style="margin: 0px; padding: 0px 0px 20px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 16px; line-height: 1.7rem; font-family: 微軟正黑體, 新細明體, Calibri, Arial, sans-serif; vertical-align: baseline; text-align: justify; color: #000000; letter-spacing: 1px;">外野手（6人）</p>
<p style="margin: 0px; padding: 0px 0px 20px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 16px; line-height: 1.7rem; font-family: 微軟正黑體, 新細明體, Calibri, Arial, sans-serif; vertical-align: baseline; text-align: justify; color: #000000; letter-spacing: 1px;">陽岱鋼（旅外）、林哲瑄、胡金龍、高國輝（富邦）、張正偉、張志豪（中信）。</p>
<p style="margin: 0px; padding: 0px 0px 20px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 16px; line-height: 1.7rem; font-family: 微軟正黑體, 新細明體, Calibri, Arial, sans-serif; vertical-align: baseline; text-align: justify; color: #000000; letter-spacing: 1px;">至於澳洲移訓32人名單，由於28人名單內的球員無法全部前往，加入曾隨隊在台中集訓並列入觀察名單的球員，若28人名單需要替換，以澳洲移訓球員優先，澳洲移訓32人名單如下：</p>
<p style="margin: 0px; padding: 0px 0px 20px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 16px; line-height: 1.7rem; font-family: 微軟正黑體, 新細明體, Calibri, Arial, sans-serif; vertical-align: baseline; text-align: justify; color: #000000; letter-spacing: 1px;">投手（15人）</p>
<p style="margin: 0px; padding: 0px 0px 20px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 16px; line-height: 1.7rem; font-family: 微軟正黑體, 新細明體, Calibri, Arial, sans-serif; vertical-align: baseline; text-align: justify; color: #000000; letter-spacing: 1px;">郭俊麟、陳冠宇（旅外）、潘威倫、王鏡銘、陳韻文（統一）、倪福德、黃勝雄、蔡明晉、林晨樺（富邦）、陳鴻文（中信）、羅國華（高知）、呂彥青、許凱翔、吳俊杰、王政浩（業餘）。</p>
<p style="margin: 0px; padding: 0px 0px 20px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 16px; line-height: 1.7rem; font-family: 微軟正黑體, 新細明體, Calibri, Arial, sans-serif; vertical-align: baseline; text-align: justify; color: #000000; letter-spacing: 1px;">捕手（3人）</p>
<p style="margin: 0px; padding: 0px 0px 20px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 16px; line-height: 1.7rem; font-family: 微軟正黑體, 新細明體, Calibri, Arial, sans-serif; vertical-align: baseline; text-align: justify; color: #000000; letter-spacing: 1px;">林琨笙、方克偉（富邦）、鄭達鴻（中信）。</p>
<p style="margin: 0px; padding: 0px 0px 20px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 16px; line-height: 1.7rem; font-family: 微軟正黑體, 新細明體, Calibri, Arial, sans-serif; vertical-align: baseline; text-align: justify; color: #000000; letter-spacing: 1px;">內野手（8人）</p>
<p style="margin: 0px; padding: 0px 0px 20px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 16px; line-height: 1.7rem; font-family: 微軟正黑體, 新細明體, Calibri, Arial, sans-serif; vertical-align: baseline; text-align: justify; color: #000000; letter-spacing: 1px;">林智勝、王勝偉、蔣智賢、許基宏（中信）、林志祥、陳鏞基（統一）、林益全（富邦）、岳東華（業餘）。</p>
<p style="margin: 0px; padding: 0px 0px 20px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 16px; line-height: 1.7rem; font-family: 微軟正黑體, 新細明體, Calibri, Arial, sans-serif; vertical-align: baseline; text-align: justify; color: #000000; letter-spacing: 1px;">外野手（6人）</p>
<p style="margin: 0px; padding: 0px 0px 20px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 16px; line-height: 1.7rem; font-family: 微軟正黑體, 新細明體, Calibri, Arial, sans-serif; vertical-align: baseline; text-align: justify; color: #000000; letter-spacing: 1px;">林哲瑄、胡金龍、高國輝（富邦）、張正偉、張志豪（中信）、羅國龍（統一）。</p>
<figure class="image"><img title="台灣隊投手郭俊麟" src="/storage/news-posts/February2017/Xi3WtSS3unyPvgpJuIFp.jpg" alt="台灣隊投手郭俊麟" />
<figcaption><span style="color: #000000; font-family: monospace; font-size: medium; text-align: start; white-space: pre-wrap;">台灣隊投手郭俊麟。（資料照，記者陳志曲攝）</span></figcaption>
</figure>
<p style="margin: 0px; padding: 0px 0px 20px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 16px; line-height: 1.7rem; font-family: 微軟正黑體, 新細明體, Calibri, Arial, sans-serif; vertical-align: baseline; text-align: justify; color: #000000; letter-spacing: 1px;">&nbsp;</p>',
                    'image'            => '',
                    'meta_description' => '中華棒協今天下午召開選訓會議，決定經典賽台灣隊28人名單、2月赴澳洲移訓練32人名單，雖然陽岱鋼尚未回覆是否參加，選訓委員與教練團仍決定把他放進28人名單。連同還不確定的陽岱鋼、準備去打日本獨立聯盟的羅國華',
                    'meta_keywords'    => '經典賽》台灣隊公布28人名單 旅外6人史上最少',
                    'status'           => 'PUBLISHED',
                    'active'           => 1,
                    'created_at'       => $input_time,
                    'updated_at'       => $input_time,
                ])->save();
            }

            $id++;
            $input_time = $now->addHour(); //one record per hour
            $dataType = NewsPost::firstOrNew([
                'id'     => $id,
                'author' => '自由體育',
                'title'  => '經典賽》官方公布台灣隊陣容 王建民、王維中入列',
            ]);
            if (!$dataType->exists) {
                $dataType->fill([
                    'author_id'        => 1,
                    'news_category_id' => 1,
                    'seo_title'        => '經典賽》官方公布台灣隊陣容 王建民、王維中入列 - 自由體育',
                    'excerpt'          => '',
                    'body'             => '<figure class="image"><img title="王建民" src="/storage/news-posts/February2017/xLOaKknsykdTIevdPFJb.jpeg" alt="王建民" />
<figcaption><span style="color: #000000; font-family: 微軟正黑體, 新細明體, Calibri, Arial, sans-serif; font-size: 16px; letter-spacing: 1px; text-align: justify; background-color: #ffffff;">王建民在台灣隊名單中。（資料照，記者林正堃攝）</span></figcaption>
</figure>
<p>&nbsp;</p>
<p style="margin: 0px; padding: 0px 0px 20px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 16px; line-height: 1.7rem; font-family: 微軟正黑體, 新細明體, Calibri, Arial, sans-serif; vertical-align: baseline; text-align: justify; color: #000000; letter-spacing: 1px;">〔體育中心／綜合報導〕大聯盟官網今天公布各國經典賽28人名單，台灣隊除了先前已公布的正選名單外，新規則中的特別投手名單也出爐，王建民、賴鴻誠與王維中等人都入列。</p>
<p style="margin: 0px; padding: 0px 0px 20px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 16px; line-height: 1.7rem; font-family: 微軟正黑體, 新細明體, Calibri, Arial, sans-serif; vertical-align: baseline; text-align: justify; color: #000000; letter-spacing: 1px;">本屆經典賽增設特別投手名單，每輪之間可從當中替換2名投手，名單最多可放10人，台灣的這份名單是賴鴻誠、呂彥青、王建民、陽建福、王政浩、王維中、吳俊杰、<span style="margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">陳品學</span>。</p>
<p style="margin: 0px; padding: 0px 0px 20px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 16px; line-height: 1.7rem; font-family: 微軟正黑體, 新細明體, Calibri, Arial, sans-serif; vertical-align: baseline; text-align: justify; color: #000000; letter-spacing: 1px;">王建民、王維中先前都已宣布不打經典賽，不過依然出現在投特別名單，假如晉級次輪還有望出賽；去年勇奪中繼王的富邦投手賴鴻誠，先前對於未能入選經典賽感到失望，如今進入特別名單，仍有望出征。</p>
<div id="story_body_content" style="margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 16px; line-height: inherit; font-family: 微軟正黑體, 新細明體, Calibri, Arial, sans-serif; vertical-align: baseline; color: #000000; letter-spacing: 1px;">
<p style="margin: 0px; padding: 0px 0px 20px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: 1.7rem; font-family: inherit; vertical-align: baseline; text-align: justify;">台灣隊預賽分在A組，將前往南韓首爾與南韓、荷蘭、以色列爭取2張8強門票，3月7日首戰以色列，8日對荷蘭，9日對南韓。</p>
</div>
<p>&nbsp;</p>',
                    'image'            => '',
                    'meta_description' => '大聯盟官網今天公布各國經典賽28人名單，台灣隊除了先前已公布的正選名單外，新規則中的特別投手名單也出爐，王建民、賴鴻誠與王維中等人都入列。本屆經典賽增設特別投手名單，每輪之間可從當中替換2名投手，名單最多可放10人',
                    'meta_keywords'    => '大聯盟官網今天公布各國經典賽28人名單',
                    'status'           => 'PUBLISHED',
                    'active'           => 1,
                    'created_at'       => $input_time,
                    'updated_at'       => $input_time,
                ])->save();
            }

            $id++;
            $input_time = $now->addHour(); //one record per hour
            $dataType = NewsPost::firstOrNew([
                'id'     => $id,
                'author' => '自由體育',
                'title'  => '中職》未來中職賽事 機捷將計畫加開末班車',
            ]);
            if (!$dataType->exists) {
                $dataType->fill([
                    'author_id'        => 1,
                    'news_category_id' => 1,
                    'seo_title'        => '中職》未來中職賽事 機捷將計畫加開末班車 - 自由體育',
                    'excerpt'          => '',
                    'body'             => '<figure class="image"><img title="機場捷運" src="/storage/news-posts/February2017/dulpmBrDD623AkzZQnB3.jpg" alt="機場捷運" />
<figcaption><span style="color: #000000; font-family: 微軟正黑體, 新細明體, Calibri, Arial, sans-serif; font-size: 16px; letter-spacing: 1px; text-align: justify; background-color: #ffffff;">機場捷運未來將加開末班車，疏運看球民眾。（記者陳志曲攝）</span></figcaption>
</figure>
<p>&nbsp;</p>
<p style="margin: 0px; padding: 0px 0px 20px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 16px; line-height: 1.7rem; font-family: 微軟正黑體, 新細明體, Calibri, Arial, sans-serif; vertical-align: baseline; text-align: justify; color: #000000; letter-spacing: 1px;">〔記者林宥辰／桃園報導〕為了因應中職賽事，機捷未來將在中職比賽結束前，將加開加班車疏運球迷人潮，球迷可望多一項便利選擇平安返家。</p>
<p style="margin: 0px; padding: 0px 0px 20px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 16px; line-height: 1.7rem; font-family: 微軟正黑體, 新細明體, Calibri, Arial, sans-serif; vertical-align: baseline; text-align: justify; color: #000000; letter-spacing: 1px;">機捷桃園體育園區站緊鄰桃園國際球場，該站末班車為23:16分，目前正常班距為15分鐘一班，但桃捷公司董事長劉坤億說，中職賽事開打後，桃捷計畫做出彈性調整、加開班次，讓班次更加密集，外地球迷可選擇搭到高鐵站轉乘高鐵，北部地區球迷也能一路搭回台北。</p>
<figure class="image"><img title="機場捷運" src="/storage/news-posts/February2017/ijsL640Nw1nx5QpSUaMv.jpg" alt="機場捷運" />
<figcaption><span style="color: #000000; font-family: 微軟正黑體, 新細明體, Calibri, Arial, sans-serif; font-size: 16px; letter-spacing: 1px; text-align: justify; background-color: #ffffff;">機場捷運未來將加開末班車，疏運看球民眾。（記者陳志曲攝）</span></figcaption>
</figure>
<p style="margin: 0px; padding: 0px 0px 20px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 16px; line-height: 1.7rem; font-family: 微軟正黑體, 新細明體, Calibri, Arial, sans-serif; vertical-align: baseline; text-align: justify; color: #000000; letter-spacing: 1px;">&nbsp;</p>',
                    'image'            => '',
                    'meta_description' => '為了因應中職賽事，機捷未來將在中職比賽結束前，將加開加班車疏運球迷人潮，球迷可望多一項便利選擇平安返家。機捷桃園體育園區站緊鄰桃園國際球場，該站末班車為23:16分，目前正常班距為15分鐘一班',
                    'meta_keywords'    => '未來中職賽事 機捷將計畫加開末班車',
                    'status'           => 'PUBLISHED',
                    'active'           => 1,
                    'created_at'       => $input_time,
                    'updated_at'       => $input_time,
                ])->save();
            }

            $id++;
            $input_time = $now->addHour(); //one record per hour
            $dataType = NewsPost::firstOrNew([
                'id'     => $id,
                'author' => '林暐凱',
                'title'  => 'HBL／甲級籃球聯賽男子組準決賽　10日觀戰重點',
            ]);
            if (!$dataType->exists) {
                $dataType->fill([
                    'author_id'        => 1,
                    'news_category_id' => 1,
                    'seo_title'        => 'HBL／甲級籃球聯賽男子組準決賽　10日觀戰重點',
                    'excerpt'          => '',
                    'body'             => '<figure class="image"><img title="高國豪" src="/storage/news-posts/February2017/rnP2rKDi3FvuAtbaLyl5.jpg" alt="高國豪" />
<figcaption><span style="color: rgba(0, 0, 0, 0.541176); font-family: Helvetica, Arial, sans-serif; font-size: 12px; letter-spacing: 2px; text-align: start; background-color: #ffffff;">▲高國豪打出本季至今最佳表現。（圖／記者林志儒攝）</span></figcaption>
</figure>
<p>&nbsp;</p>
<p style="box-sizing: border-box; font-family: Helvetica, Arial, sans-serif; margin: 0px 0px 10px; max-width: 100%; color: rgba(0, 0, 0, 0.870588); font-size: 16px; letter-spacing: 2px;">105學年度HBL高中籃球甲級聯賽男子組八強準決賽於今（9）日休兵一天，10日將重新點燃戰火，接下來三天的賽程將是場場關鍵，每隊必定會卯足全力，爭取前往小巨蛋的四強門票。</p>
<p style="box-sizing: border-box; font-family: Helvetica, Arial, sans-serif; margin: 0px 0px 10px; max-width: 100%; color: rgba(0, 0, 0, 0.870588); font-size: 16px; letter-spacing: 2px;">準決賽前四天賽程打完，能夠分成兩個集團，領先的集團分別是都拿下四連勝的南山高中、松山高中及高苑工商，也能排在領先集團的是「爆冷」輸給東山高中的能仁家商，能仁戰績為3勝1敗。</p>
<p style="box-sizing: border-box; font-family: Helvetica, Arial, sans-serif; margin: 0px 0px 10px; max-width: 100%; color: rgba(0, 0, 0, 0.870588); font-size: 16px; letter-spacing: 2px;">較為不利的集團分別是1勝3敗的東山高中，以及三隻都吞下四連敗的泰山高中、南湖高中及東泰高中。</p>
<p style="box-sizing: border-box; font-family: Helvetica, Arial, sans-serif; margin: 0px 0px 10px; max-width: 100%; color: rgba(0, 0, 0, 0.870588); font-size: 16px; letter-spacing: 2px;">男子組的比賽於兩地開打，分別在新莊體育館以及板橋體育館。新莊首戰是15：40泰山對決東泰，第二場是17：20高苑對上松山，第三場則是19：00能仁對決南山。板橋只有一場男子組的比賽，16：20由南湖對上東山。</p>
<p style="box-sizing: border-box; font-family: Helvetica, Arial, sans-serif; margin: 0px 0px 10px; max-width: 100%; color: rgba(0, 0, 0, 0.870588); font-size: 16px; letter-spacing: 2px;">八強賽開打之前大家相當看好的泰山，但由於受到傷兵困擾，少了韓杰諭這名長人助陣，本屆賽事能走多遠，就看之後對上東泰、東山、南湖能否都拿下勝利，不然可能要到8強止步，全隊也希望能力拼八強首勝。</p>
<p style="box-sizing: border-box; font-family: Helvetica, Arial, sans-serif; margin: 0px 0px 10px; max-width: 100%; color: rgba(0, 0, 0, 0.870588); font-size: 16px; letter-spacing: 2px;">東泰則是隊史首次晉級八強，當然也希望能夠力拼首勝，因此泰山對決東泰，兩隊勢必會上演一場惡戰，精彩可期。</p>
<p style="box-sizing: border-box; font-family: Helvetica, Arial, sans-serif; margin: 0px 0px 10px; max-width: 100%; color: rgba(0, 0, 0, 0.870588); font-size: 16px; letter-spacing: 2px;">高苑對上松山則是面子之爭，兩隊在前四天都拿下四連勝，本場觀戰重點也在兩位高中「頂級」後衛的對決，高苑田浩對決松山高國豪，一直是大家的焦點，尤其在八強賽場場都有輸不得的壓力下，更能突顯其球星特質。</p>
<p style="box-sizing: border-box; font-family: Helvetica, Arial, sans-serif; margin: 0px 0px 10px; max-width: 100%; color: rgba(0, 0, 0, 0.870588); font-size: 16px; letter-spacing: 2px;">能仁對決南山則是能仁有輸不得的壓力，前四天賽程「爆冷」輸給東山高中，晉級四強路上有了變數，畢竟最後三天的賽程分別對上南山、松山及高苑，能否晉級四強真的要全力以赴。</p>
<p style="box-sizing: border-box; font-family: Helvetica, Arial, sans-serif; margin: 0px 0px 10px; max-width: 100%; color: rgba(0, 0, 0, 0.870588); font-size: 16px; letter-spacing: 2px;">南湖對決東山則是南湖要力拼首勝，東山因為贏能仁之後，保有晉級四強的一線生機，南湖則在三年級「雙槍」林仕軒、林梓峰火力不如預期，八強賽打得格外辛苦，「雙槍」能否及時回穩，攸關南湖的路能走多遠。</p>
<p>&nbsp;</p>',
                    'image'            => '',
                    'meta_description' => '105學年度HBL高中籃球甲級聯賽男子組八強準決賽於今（9）日休兵一天，10日將重新點燃戰火，接下來三天的賽程將是場場關鍵，每隊必定會卯足全力，爭取前往小巨蛋的四強門票。',
                    'meta_keywords'    => '體育周報,運動,籃球,HBL,男子組,八強準決賽',
                    'status'           => 'PUBLISHED',
                    'active'           => 1,
                    'created_at'       => $input_time,
                    'updated_at'       => $input_time,
                ])->save();
            }

            $id++;
            $input_time = $now->addHour(); //one record per hour
            $dataType = NewsPost::firstOrNew([
                'id'     => $id,
                'author' => '顏真真',
                'title'  => '終止連2貶！　新台幣收31.046、升值8.2分',
            ]);
            if (!$dataType->exists) {
                $dataType->fill([
                    'author_id'        => 1,
                    'news_category_id' => 7,
                    'seo_title'        => '終止連2貶！　新台幣收31.046、升值8.2分',
                    'excerpt'          => '',
                    'body'             => '<figure class="image"><img title="新台幣匯率" src="/storage/news-posts/February2017/znbCG8Qe69FkBTfOQhDz.jpg" alt="新台幣匯率" />
<figcaption><span style="color: rgba(0, 0, 0, 0.541176); font-family: Helvetica, Arial, sans-serif; font-size: 12px; letter-spacing: 2px; text-align: start; background-color: #ffffff;">▲亞洲貨幣兌美元表現牽動新台幣匯率走勢。（圖／NOWnews資料照）</span></figcaption>
</figure>
<p>&nbsp;</p>
<p style="box-sizing: border-box; font-family: Helvetica, Arial, sans-serif; margin: 0px 0px 10px; max-width: 100%; color: rgba(0, 0, 0, 0.870588); font-size: 16px; letter-spacing: 2px;">台北股、匯市9日同步走揚，新台幣兌美元9日終場收在31.046元、升值8.2分，也終止連續兩個交易日貶值走勢，台北外匯經紀公司成交量為6.05億美元。</p>
<p style="box-sizing: border-box; font-family: Helvetica, Arial, sans-serif; margin: 0px 0px 10px; max-width: 100%; color: rgba(0, 0, 0, 0.870588); font-size: 16px; letter-spacing: 2px;">台股9日開高走高，終場上漲46.93點，收在9590.18點，成交量新台幣1034.46億元，3大法人合計在台股買超新台幣50.31億元，其中外資買超41.76億元。</p>
<p style="box-sizing: border-box; font-family: Helvetica, Arial, sans-serif; margin: 0px 0px 10px; max-width: 100%; color: rgba(0, 0, 0, 0.870588); font-size: 16px; letter-spacing: 2px;">國際匯市部分，日圓一度升值至111.69日圓兌1美元，之後拉回至112.3價位，韓元則在1141.59至1147.4韓元兌1美元盤整，而人民幣兌美元中間價來到6.8710元兌1美元，較前一交易日（8日）中間價6.8849元升值139基點。</p>
<p style="box-sizing: border-box; font-family: Helvetica, Arial, sans-serif; margin: 0px 0px 10px; max-width: 100%; color: rgba(0, 0, 0, 0.870588); font-size: 16px; letter-spacing: 2px;">至於新台幣，匯銀人士指出，新台幣兌美元以31.12元、升值0.8分開出後，在台股走揚及亞洲主要貨幣兌美元偏升下，一度觸及31.032元、升值9.6分，不過，隨後亞幣拉回，新台幣兌美元轉趨盤整，終場收在31.046元、升值8.2分，也終止連續兩個交易日升值走勢。</p>',
                    'image'            => '',
                    'meta_description' => '台北股、匯市9日同步走揚，新台幣兌美元9日終場收在31.046元、升值8.2分，也終止連續兩個交易日貶值走勢，台北外匯經紀公司成交量為6.05億美元。',
                    'meta_keywords'    => '財經,新台幣,台股,理財,美元,日圓',
                    'status'           => 'PUBLISHED',
                    'active'           => 1,
                    'breaking_news'    => 1,
                    'created_at'       => $input_time,
                    'updated_at'       => $input_time,
                ])->save();
            }

            $id++;
            $input_time = $now->addHour(); //one record per hour
            $dataType = NewsPost::firstOrNew([
                'id'     => $id,
                'author' => '彭夢竺',
                'title'  => 'ApplePay將啟用　台灣行動支付大戰準備好了？',
            ]);
            if (!$dataType->exists) {
                $dataType->fill([
                    'author_id'        => 1,
                    'news_category_id' => 7,
                    'seo_title'        => 'ApplePay將啟用　台灣行動支付大戰準備好了？',
                    'excerpt'          => '',
                    'body'             => '<figure class="image"><img title="台灣行動支付" src="/storage/news-posts/February2017/GZVsKlJhvU37sSNiIMgs.jpg" alt="台灣行動支付" />
<figcaption><span style="color: rgba(0, 0, 0, 0.541176); font-family: Helvetica, Arial, sans-serif; font-size: 12px; letter-spacing: 2px; text-align: start; background-color: #ffffff;">▲Apple Pay即將登台，台灣再度掀起一波行動支付大戰，GO survey調查發現，台灣行動支付發展依舊受到安全性牽制，使用現金及信用卡消費的民眾仍超過8成。（圖／HAPPY GO提供）</span></figcaption>
</figure>
<p>&nbsp;</p>
<p style="box-sizing: border-box; font-family: Helvetica, Arial, sans-serif; margin: 0px 0px 10px; max-width: 100%; color: rgba(0, 0, 0, 0.870588); font-size: 16px; letter-spacing: 2px;">隨著蘋果公司宣布Apple Pay即將登台，無論是電信業、通訊軟體或是手機品牌也先後大舉推出行動支付服務，台灣再度掀起一波行動支付大戰；不過，五花八門、琳琅滿目的支付工具，是否符合消費者的使用習慣與期待？HAPPY GO旗下的線上市調中心GO survey調查發現，台灣行動支付發展受到安全性牽制，便利是促動民眾使用的主因，且女性對行動支付觀念較開放，大多以超商、帳單繳交、餐飲娛樂及交通等日常生活場域為主。</p>
<p style="box-sizing: border-box; font-family: Helvetica, Arial, sans-serif; margin: 0px 0px 10px; max-width: 100%; color: rgba(0, 0, 0, 0.870588); font-size: 16px; letter-spacing: 2px;">不管是FriDay Wallet、Line Pay、Samsung Pay，台灣行動支付浪潮正式展開，根據台灣金管會的觀察，預估在2020年全台行動支付的占比將達5成，但目前台灣使用現金及信用卡消費的仍超過8成，說明現行台灣行動支付仍有很大的成長空間。</p>
<p style="box-sizing: border-box; font-family: Helvetica, Arial, sans-serif; margin: 0px 0px 10px; max-width: 100%; color: rgba(0, 0, 0, 0.870588); font-size: 16px; letter-spacing: 2px;">GO survey針對4千名消費者，透過線上問卷進行行動支付使用行為調查，根據調查結果，從消費者的角度分析歸納5大重點，窺探消費者期望未來行動支付的發展方向，以符合使用者的需求。</p>
<p style="box-sizing: border-box; font-family: Helvetica, Arial, sans-serif; margin: 0px 0px 10px; max-width: 100%; color: rgba(0, 0, 0, 0.870588); font-size: 16px; letter-spacing: 2px;">調查結果顯示，隨著智能型商品的普及化，擁有智慧型手表、平板電腦、筆記型電腦的消費者，對於行動支付的接受度較高，未來橘色世代、女性對行動支付觀念較開放，20歲到29歲女性使用率高於男性。</p>
<p style="box-sizing: border-box; font-family: Helvetica, Arial, sans-serif; margin: 0px 0px 10px; max-width: 100%; color: rgba(0, 0, 0, 0.870588); font-size: 16px; letter-spacing: 2px;">台灣行動支付發展受到許多限制，調查結果也發現，消費者習慣透過信用卡、現金的支付方式，並有近7成的消費者認為行動支付在安全性、個資洩漏上仍有很大的風險，只有像是Line Pay、歐付寶等因為使用方便、布點廣，加上知名度高，較為受到歡迎。<br style="box-sizing: border-box;" />&nbsp;<br style="box-sizing: border-box;" />此外，GO survey指出，民眾使用行動支付的情境以超商、帳單繳交、餐飲娛樂及交通等日常生活場域為主，且希望行動支付可以結合更多元的功能與優惠訊息，並持續簡化使用程序與優化介面，才能有助提升使用意願，成功延伸行動支付的普及與應用。</p>',
                    'image'            => '',
                    'meta_description' => '隨著蘋果公司宣布Apple Pay即將登台，無論是電信業、通訊軟體或是手機品牌也先後大舉推出行動支付服務，台灣再度掀起一波行動支付大戰；不過，五花八門、琳琅滿目的支付工具，是否符合消費者的使用習慣與期待？HAPPY GO旗下的線上市調中心GO survey調查發現，台灣行動支付發展受到安全性牽制，便利是促動民眾使用的主因，且女性對行動支付觀念較開放，大多以超商、帳單繳交、餐飲娛樂及交通等日常生活場域為主。 ',
                    'meta_keywords'    => '財經,行動支付,Apple Pay,GO survey',
                    'status'           => 'PUBLISHED',
                    'active'           => 1,
                    'created_at'       => $input_time,
                    'updated_at'       => $input_time,
                ])->save();
            }

            $id++;
            $input_time = $now->addHour(); //one record per hour
            $dataType = NewsPost::firstOrNew([
                'id'     => $id,
                'author' => '顏真真',
                'title'  => '違憲修法　薪扣額可能採雙軌制　最晚2020年報稅適用',
            ]);
            if (!$dataType->exists) {
                $dataType->fill([
                    'author_id'        => 1,
                    'news_category_id' => 7,
                    'seo_title'        => '違憲修法　薪扣額可能採雙軌制　最晚2020年報稅適用',
                    'excerpt'          => '',
                    'body'             => '<figure class="image"><img title="財政部賦稅署副署長宋秀玲" src="/storage/news-posts/February2017/vXHERyTJ9tcrxUo4Xvxo.jpg" alt="財政部賦稅署副署長宋秀玲" />
<figcaption><span style="color: rgba(0, 0, 0, 0.541176); font-family: Helvetica, Arial, sans-serif; font-size: 12px; letter-spacing: 2px; text-align: start; background-color: #ffffff;">▲財政部賦稅署副署長宋秀玲。（圖／記者顏真真攝，2017.2.9）</span></figcaption>
</figure>
<p style="box-sizing: border-box; font-family: Helvetica, Arial, sans-serif; margin: 0px 0px 10px; max-width: 100%; color: rgba(0, 0, 0, 0.870588); font-size: 16px; letter-spacing: 2px;">&nbsp;</p>
<p style="box-sizing: border-box; font-family: Helvetica, Arial, sans-serif; margin: 0px 0px 10px; max-width: 100%; color: rgba(0, 0, 0, 0.870588); font-size: 16px; letter-spacing: 2px;">針對林若亞聲請釋憲案，大法官會議做出745號解釋，綜所稅薪資特別扣除額明定法定上限12.8萬元，違反平等原則違憲。對此，財政部9日召開記者會表示，未來將參考各國薪資所得課稅制度，在兼顧量能課稅與簡政便民原則下，尋求合理計算所得方式，訂定相關配套措施，一定會在兩年內檢討修正所得稅法相關規定，也就是說，最晚在2019年2月完成修法、2020年5月申報綜所稅時適用，薪資所得扣除額可能新增「實額扣除」選項。</p>
<p style="box-sizing: border-box; font-family: Helvetica, Arial, sans-serif; margin: 0px 0px 10px; max-width: 100%; color: rgba(0, 0, 0, 0.870588); font-size: 16px; letter-spacing: 2px;">財政部賦稅署副署長宋秀玲9日指出，其實，目前各國做法不同，有採核實扣除，也有定額扣除、定率扣除，不過，由於薪資所得課稅人數在各國比例都很大，因此，還是要看當地稅法慣例，像是美國個人所得稅採列舉扣除、日本則採定率扣除、韓國採稅額扣除、中國大陸與台灣一樣，都是採定額扣除的方式。</p>
<p style="box-sizing: border-box; font-family: Helvetica, Arial, sans-serif; margin: 0px 0px 10px; max-width: 100%; color: rgba(0, 0, 0, 0.870588); font-size: 16px; letter-spacing: 2px;">宋秀玲表示，過去我國考量薪資所得者多屬中低收入者，成本費用減除舉證有其困難度，加上這幾年用稅額試算也有共識，定額扣除對稅額計算是有其必要性，根據2015年綜合所得稅總申報戶共613萬戶，其中申報薪資所得戶數約540萬戶，估計薪資所得者適用稅額試算服務比例高達9成以上，該服務對薪資所得者確有簡化申報及大幅節省成本與時間效益。</p>
<p style="box-sizing: border-box; font-family: Helvetica, Arial, sans-serif; margin: 0px 0px 10px; max-width: 100%; color: rgba(0, 0, 0, 0.870588); font-size: 16px; letter-spacing: 2px;">宋秀玲也強調，大法官釋憲中也表明，薪資所得定額扣除有其必要性與合理性，基於簡便、考量稽徵成本及納稅人舉證困難，採定額扣除方式對納稅人是較有利。至於未來薪資所得扣除的稅法設計是否會採多軌制？她說，依照大法官解釋，除現行「定額扣除」，還要多一個「實額扣除」，而且最晚要在2019年2月完成修法，也就是說，最晚2020年5月申報綜所稅時適用。</p>
<p style="box-sizing: border-box; font-family: Helvetica, Arial, sans-serif; margin: 0px 0px 10px; max-width: 100%; color: rgba(0, 0, 0, 0.870588); font-size: 16px; letter-spacing: 2px;">至於外界擔心修法後一般納稅人較難受惠，反有利高所得者，宋秀玲說，從大法官解釋意旨來看，主要是認為所得計算要符合真實所得，若未來稅法准許減除賺取薪資的直接必要成本費用，計算出的還是實質所得，而且納稅人要負相當舉證責任，「我想不至於有這樣的顧慮」，只是稅制會變複雜。</p>
<p>&nbsp;</p>',
                    'image'            => '',
                    'meta_description' => '針對林若亞聲請釋憲案，大法官會議做出745號解釋，綜所稅薪資特別扣除額明定法定上限12.8萬元，違反平等原則違憲。對此，財政部9日召開記者會表示，未來將參考各國薪資所得課稅制度，在兼顧量能課稅與簡政便民原則下，尋求合理計算所得方式，訂定相關配套措施，一定會在兩年內檢討修正所得稅法相關規定，也就是說，最晚在2019年2月完成修法、2020年5月申報綜所稅時適用，薪資所得扣除額可能新增「實額扣除」選項。',
                    'meta_keywords'    => '財經,財政部,所得稅,薪資所得',
                    'status'           => 'PUBLISHED',
                    'active'           => 1,
                    'created_at'       => $input_time,
                    'updated_at'       => $input_time,
                ])->save();
            }

            $id++;
            $input_time = $now->addHour(); //one record per hour
            $dataType = NewsPost::firstOrNew([
                'id'     => $id,
                'author' => '財經中心',
                'title'  => '券商遭勒索駭客來自境外　證交所建置24小時監控服務',
            ]);
            if (!$dataType->exists) {
                $dataType->fill([
                    'author_id'        => 1,
                    'news_category_id' => 7,
                    'seo_title'        => '券商遭勒索駭客來自境外　證交所建置24小時監控服務',
                    'excerpt'          => '',
                    'body'             => '<figure class="image"><img title="證交所董事長施俊吉" src="/storage/news-posts/February2017/v3WjUstnkB62l28FApS7.jpg" alt="證交所董事長施俊吉" />
<figcaption><span style="color: #333333; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 16px; text-align: left; background-color: #bfbfbf;">▲近期有部份證券、期貨商遭分散式阻斷服務攻擊勒索事件(簡稱DDOS)，證交所指出，經過初步調查都是境外攻擊。圖為證交所董事長施俊吉。（圖／記者許家禎攝，2016.11.30）</span></figcaption>
</figure>
<p>&nbsp;</p>
<p style="box-sizing: border-box; margin: 0px 0px 1em; color: #333333; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 16px; text-align: justify;">近期有部份證券、期貨商遭分散式阻斷服務攻擊事件(簡稱DDOS)，導致部分業者對外網頁頻寬滿載，以至於網路相關服務受到影響。金管會指示證交所利用「證券期貨市場資安通報平台」進行資安事件通報，並建置24小時監控服務。證交所今（9）日指出，此次駭客攻擊事件，經過初步調查都是境外攻擊，其中有由越南的網站攻擊。</p>
<p style="box-sizing: border-box; margin: 0px 0px 1em; color: #333333; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 16px; text-align: justify;">證交所指出，這次DDOS攻擊影響業者眾多，政府相關單位均密切關注，金管會於第一時間啟動資安事件緊急應變機制，向行政院通報證券、期貨商遭受DDoS攻擊情形，同時協調所有金融業者加強資訊安全防護等五大措施，並指示證交所利用「證券期貨市場資安通報平台」進行資安事件通報，於「證券期貨產業資安資訊分享與分析中心」將相關資安資訊提供業者，及建置24小時網站監控服務，適時提醒業者注意並採取防護措施。</p>
<p style="box-sizing: border-box; margin: 0px 0px 1em; color: #333333; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 16px; text-align: justify;">證交所表示，此次駭客攻擊事件，經過初步調查都是境外攻擊，其中有由越南的網站發動攻擊，但證交所也說，駭客可能隱藏位置或控制電腦，因此不代表就是越南方攻擊，至於券商遭勒索比特幣金額不等，跟券商大小無關，只是隨機的數字而已。</p>
<p style="box-sizing: border-box; margin: 0px 0px 1em; color: #333333; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 16px; text-align: justify;">證交所於今（9）日上午請證券期貨周邊單位、三大電信公司、證券商及期貨商公會代表開會，行政院資安處、金管會資訊處及證期局等政府督導單位均列席指導，共同討論本次事件的預警、通報、資訊分享及電信業者所提供相關流量阻絕及清洗服務等機制，並就加強資訊安全防護措施、證券期貨市場現行應變機制、如何改善通報等議題進行檢討，同時請電信業者強化流量異常偵測功能，以及早發現並協助業者加速排除問題。</p>
<p style="box-sizing: border-box; margin: 0px 0px 1em; color: #333333; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 16px; text-align: justify;">證交所董事長施俊吉會中作成3項指示，1、通報機制須更明確。2、由單一窗口新聞發布以避免訊息混亂。3、針對DDoS攻擊防護提供技術支援。因應後續業者可能遭受的DDoS攻擊，將由證交所、相關業者公會及電信業者不定期召開緊急應變會議以處理相關問題。</p>
<p>&nbsp;</p>',
                    'image'            => '',
                    'meta_description' => '近期有部份證券、期貨商遭分散式阻斷服務攻擊事件(簡稱DDOS)，導致部分業者對外網頁頻寬滿載，以至於網路相關服務受到影響。金管會指示證交所利用「證券期貨市場資安通報平台」進行資安事件通報，並建置24小 | NOWnews 今日新聞',
                    'meta_keywords'    => '券商遭駭,駭客勒索,DDoS攻擊,證交所,財經',
                    'status'           => 'PUBLISHED',
                    'active'           => 1,
                    'created_at'       => $input_time,
                    'updated_at'       => $input_time,
                ])->save();
            }

            $id++;
            $input_time = $now->addHour(); //one record per hour
            $dataType = NewsPost::firstOrNew([
                'id'     => $id,
                'author' => '盧冠誠',
                'title'  => '央行：物價2月應明顯下滑 若續破2％會有行動',
            ]);
            if (!$dataType->exists) {
                $dataType->fill([
                    'author_id'        => 1,
                    'news_category_id' => 7,
                    'seo_title'        => '央行：物價2月應明顯下滑 若續破2％會有行動 - 財經 - 自由時報電子報',
                    'excerpt'          => '',
                    'body'             => '<p><span style="color: #333333; font-family: Arial, 新細明體, Helvetica, sans-serif; font-size: 15.2px; letter-spacing: 1px;">主計總處昨公布1月CPI（消費者物價指數）年增率達2.25%，創近11個月新高，外界擔憂國內通貨膨脹是否過高，對此，中央銀行今天表示，這主要是受到農曆年的季節性因素影響，2月物價就會明顯下滑。</span></p>
<figure class="image"><img title="央行總裁彭淮南" src="/storage/news-posts/February2017/0LOKmObkTZ9F5thc7PHW.jpg" alt="央行總裁彭淮南" />
<figcaption><span style="color: #333333; font-family: Arial, 新細明體, Helvetica, sans-serif; font-size: 12.35px; letter-spacing: 1px; text-align: left; background-color: #dddddd;">1月CPI（消費者物價指數）年增率達2.25％，中央銀行今天表示，主要是受到農曆年的季節性因素影響，2月物價就會明顯下滑。圖為央行總裁彭淮南。（資料照，記者王藝菘攝）</span></figcaption>
</figure>
<p style="margin: 0px; padding: 10px 5px; border: 0px; font-size: 0.95em; font-family: Arial, 新細明體, Helvetica, sans-serif; line-height: 25px; color: #333333; letter-spacing: 1px;">&nbsp;</p>
<p style="margin: 0px; padding: 10px 5px; border: 0px; font-size: 0.95em; font-family: Arial, 新細明體, Helvetica, sans-serif; line-height: 25px; color: #333333; letter-spacing: 1px;">央行官員指出，1月CPI年增率升為2.25%，主因今年春節落在1月（去年在2月），部分服務費（如保母費、計程車資等）循例加價；若扣除春節循例加價的服務費，則1月CPI年增率降為1.61%，低於去年12月的1.7%。</p>
<p style="margin: 0px; padding: 10px 5px; border: 0px; font-size: 0.95em; font-family: Arial, 新細明體, Helvetica, sans-serif; line-height: 25px; color: #333333; letter-spacing: 1px;">央行官員表示，由於國內需求和緩，實際產出低於潛在產出，通膨預期溫和，主要機構預測今年CPI年增率平均值為1.18%。</p>
<p style="margin: 0px; padding: 10px 5px; border: 0px; font-size: 0.95em; font-family: Arial, 新細明體, Helvetica, sans-serif; line-height: 25px; color: #333333; letter-spacing: 1px;">至於一例一休對物價造成的衝擊，央行官員說，主計總處即將公布最新預測，屆時會把該因素考慮進去。</p>
<p>&nbsp;</p>
<p style="margin: 0px; padding: 10px 5px; border: 0px; font-size: 0.95em; font-family: Arial, 新細明體, Helvetica, sans-serif; line-height: 25px; color: #333333; letter-spacing: 1px;">央行官員強調，若未來CPI年增率持續高過國發計畫的2%目標，央行必要時將採行妥適因應措施，例如透過調整準備貨幣，以及公開市場操作等。</p>',
                    'image'            => '',
                    'meta_description' => '主計總處昨公布1月CPI（消費者物價指數）年增率達2.25%，創近11個月新高，外界擔憂國內通貨膨脹是否過高，對此，中央銀行今天表示，這主要是受到農曆年的季節性因素影響，2月物價就會明顯下滑。央行官員指出，1月CPI年增率升為2.25%，主因今年春節落在1月（去年在2月），部分服務費（如保母費、計程車資等）循例加價；若扣除春節循例加價的服務費，則1月CPI年增率降為1.61%，低於去年12月的1.7%。',
                    'meta_keywords'    => '自由時報, 自由電子報, 自由時報電子報, Liberty Times Net, LTN',
                    'status'           => 'PUBLISHED',
                    'active'           => 1,
                    'created_at'       => $input_time,
                    'updated_at'       => $input_time,
                ])->save();
            }

            $id++;
            $input_time = $now->addHour(); //one record per hour
            $dataType = NewsPost::firstOrNew([
                'id'     => $id,
                'author' => 'ETtoday國際新聞',
                'title'  => '英特爾用70億美元討川普歡心　7奈米工廠創3千職缺',
            ]);
            if (!$dataType->exists) {
                $dataType->fill([
                    'author_id'        => 1,
                    'news_category_id' => 6,
                    'seo_title'        => '英特爾用70億美元討川普歡心　7奈米工廠創3千職缺 | ETtoday 東森新聞雲',
                    'excerpt'          => '',
                    'body'             => '<figure class="image"><img title="英特爾公司（Intel）執行長科再奇（Brian Krzanich）" src="/storage/news-posts/February2017/1ZDnlYJdv4pMbTlMBADV.jpg" alt="英特爾公司（Intel）執行長科再奇（Brian Krzanich）" />
<figcaption>▲半導體業巨擘英特爾公司（Intel）執行長科再奇（Brian Krzanich）與川普。(圖／達志影像)</figcaption>
</figure>
<p>&nbsp;</p>
<p>美國總統川普上任不到一個月，不少美國企業已經撤回海外資金回本土。半導體業巨擘英特爾公司（Intel）執行長科再奇（Brian Krzanich）今天在白宮橢圓辦公室宣布，將投資70億美元建造一家晶圓工廠，地點位在亞利桑納州。Fab 42 是全球最先進晶圓廠，生產 7 奈米晶片，可用於智慧型手機和資料中心領域。</p>
<p>英特爾公司與美國總統川普一直在倡導新政策，以提高國內製造業。英特爾公司執行長科再奇（Brian Krzanich）表示，「我們支持政府的政策，通過新的標準和投資政策，使美國製造業在全球的競爭。」</p>
<p>科再奇也說，英特爾已籌備這個工廠多年，希望在白宮與大家宣布這個消息，英特爾公司支持稅收和法規政策。而這間半導體工廠會在3至4年內建造完成，可創造 3 千個高科技、高收入就業機會。</p>
<figure class="image"><img title="半導體業巨擘英特爾公司（Intel）執行長科再奇（Brian Krzanich）" src="/storage/news-posts/February2017/vt8JrkLuLBHC1pSEhd2x.jpg" alt="半導體業巨擘英特爾公司（Intel）執行長科再奇（Brian Krzanich）" />
<figcaption>▲半導體業巨擘英特爾公司（Intel）執行長科再奇（Brian Krzanich）。（圖 ／翻攝自 Brian Krzanich 推特）</figcaption>
</figure>
<p>&nbsp;</p>
<p style="margin: 0px; padding: 0px; border: 0px; outline: 0px; font-family: Verdana, Geneva, sans-serif, 新細明體; color: #000000; font-size: 13px;">&nbsp;</p>',
                    'image'            => '',
                    'meta_description' => '美國總統川普上任不到一個月，不少美國企業已經撤回海外資金回本土。半導體業巨擘英特爾公司（Intel）執行長科再奇（Brian Krzanich）今天在白宮橢圓辦公室宣布，將投資70億美元建造一家晶圓工廠，地點位在亞利桑納州。Fab 42 是全球最先進晶圓廠，生產7 奈米晶片，可應於智慧型手機與資料中心領域。(Brian Krzanich,英特爾,Intel)',
                    'meta_keywords'    => 'Brian Krzanich,英特爾,Intel',
                    'status'           => 'PUBLISHED',
                    'active'           => 1,
                    'created_at'       => $input_time,
                    'updated_at'       => $input_time,
                ])->save();
            }

            $id++;
            $input_time = $now->addHour(); //one record per hour
            $dataType = NewsPost::firstOrNew([
                'id'     => $id,
                'author' => '許凱涵',
                'title'  => '元宵佳節吃湯圓　衛生局為民眾健康把關',
            ]);
            if (!$dataType->exists) {
                $dataType->fill([
                    'author_id'        => 1,
                    'news_category_id' => 10,
                    'seo_title'        => '元宵佳節吃湯圓　衛生局為民眾健康把關',
                    'excerpt'          => '',
                    'body'             => '<p><img src="/storage/news-posts/February2017/sqD6t5mwEYj7akF6HfHL.jpg" alt="" width="300" height="401" /></p>
<p class="middle" style="margin: 0px 0px 1.4em; padding: 0px; border: 0px; outline: 0px; font-size: 16px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: Arial, Helvetica, sans-serif; line-height: 1.8em; color: #242424; letter-spacing: 1px;">元宵節即將到來，在闔家同慶賞花燈、猜燈謎的同時，民眾少不了吃元宵湯圓應景，高雄市政府衛生局為保障市民食的安全並強化食品安全衛生管理，前往市場攤商、冷熱飲店及超市、大賣場等販售場所抽驗包裝及散裝湯圓、芋圓、豆餡（紅豆、薏仁）等，共計21件，檢驗項目包括防腐劑己二烯酸、苯甲酸、去水醋酸及規定內色素（8項）、規定外色素（鹽基性桃紅精等35項），檢驗結果均符合規定。</p>
<p class="middle" style="margin: 0px 0px 1.4em; padding: 0px; border: 0px; outline: 0px; font-size: 16px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: Arial, Helvetica, sans-serif; line-height: 1.8em; color: #242424; letter-spacing: 1px;">依「食品添加物使用範圍及限量暨規格標準」，防腐劑去水醋酸僅能使用於乾酪、乳酪、奶油及人造奶油等食品中，不得使用於湯圓產品；苯甲酸、己二烯酸可使用於湯圓產品，惟使用限量為1.0g/kg以下，違者將依違反食品安全衛生管理法第18條規定，依同法第47條第8款處新臺幣3-300萬元罰鍰；目前國內准用之著色劑分別是紅色6號、7號、40號，黃色4號、5號，綠色3號以及藍色1號、2號等，至於工業染料（如Rhodamine B 鹽基性桃紅精）不得添加於食品，違者依同法第15條第1項第10款，依同法第49條第1項處7年以下有期徒刑，得併科新臺幣8千萬以下罰金。</p>
<p class="middle" style="margin: 0px 0px 1.4em; padding: 0px; border: 0px; outline: 0px; font-size: 16px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: Arial, Helvetica, sans-serif; line-height: 1.8em; color: #242424; letter-spacing: 1px;">衛生局呼籲業者應落實自主管理，搓湯圓時要注意手部及製程環境衛生並遵守食品添加物使用相關規定，販賣業者需注意產品儲藏條件（冷藏溫度攝氏0-7℃，冷凍溫度攝氏負18℃以下）等。另提醒消費者湯圓為高熱量食品，以包餡元宵湯圓為例，4顆湯圓熱量相當於吃進一碗白飯，民眾可依產品外包裝營養標示依自己需求選購，進食時請小口食用並細嚼慢嚥，避免造成消化道或食道哽塞之風險。</p>
<p class="middle" style="margin: 0px 0px 1.4em; padding: 0px; border: 0px; outline: 0px; font-size: 16px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: Arial, Helvetica, sans-serif; line-height: 1.8em; color: #242424; letter-spacing: 1px;">衛生局重視消費者飲食安全，除了節慶前密集抽驗監測之外,接近節慶時仍會突擊稽查，以上稽查結果，可逕上高雄市政府衛生局網站（http://khd.kcg.gov.tw/）食品衛生專區查詢。若有任何食品衛生問題，歡迎逕洽衛生局食品衛生科（洽詢專線7134000轉食品衛生科）。</p>',
                    'image'            => '',
                    'meta_description' => '元宵節即將到來，在闔家同慶賞花燈、猜燈謎的同時，民眾少不了吃元宵湯圓應景，高雄市政府衛生局為保障市民...',
                    'meta_keywords'    => '元宵佳節,湯圓',
                    'status'           => 'PUBLISHED',
                    'active'           => 1,
                    'created_at'       => $input_time,
                    'updated_at'       => $input_time,
                ])->save();
            }

            $id++;
            $input_time = $now->addHour(); //one record per hour
            $dataType = NewsPost::firstOrNew([
                'id'     => $id,
                'author' => '蔡佳霖',
                'title'  => '鄧肯球衣退休 馬刺隊史第8人',
            ]);
            if (!$dataType->exists) {
                $dataType->fill([
                    'author_id'        => 1,
                    'news_category_id' => 1,
                    'seo_title'        => '鄧肯球衣退休 馬刺隊史第8人 | NBA戰況 | NBA 台灣',
                    'excerpt'          => '',
                    'body'             => '<p>馬刺將在明天（19日）主場迎戰鵜鶘，這場比賽的賽後將會舉辦鄧肯（Tim Duncan）21號球衣退休儀式，格林（Danny Green）接受採訪時表示，他期盼球隊可以拿下這場勝利，留下一個最完美的結局。</p>
<p>「這很像大四之夜，你可不希望學長們輸掉他們最後一場主場比賽。」格林說。「我們想為他贏得這場比賽，所以我們必須一開始就全力投入，展現能量，打出一場好的比賽。」</p>
<p>鄧肯將是馬刺隊史第8位享受球衣退休榮耀的球員，前7位分別是羅賓森（David Robinson）、葛文（George Gervin）、艾略特（Sean Elliot）、強森（Avery Johnson）、包恩（Bruce Bowen）、西拉斯（James Silas）、摩爾（Johnny Moore）。</p>
<p><iframe title="Tim Duncan Jersey Retirement Intro Video | Dec 18, 2016 | 2016-17 NBA Season" src="https://www.youtube.com/embed/kYio4NoAE18?wmode=opaque&amp;theme=dark" width="560" height="315" frameborder="0" allowfullscreen=""></iframe></p>
<p>&nbsp;</p>
<p>根據先前的消息，這場比賽進場的球迷將會得到一件特製的鄧肯紀念T恤。</p>
<p>40歲的鄧肯在今年夏天宣佈退休，結束19年的征戰。這19年期間，鄧肯打造了一個恐怖的馬刺盛世，球隊例行賽勝率從未低於6成，每一年都打進季後賽，還創下連續17年至少50勝的空前成就，幾乎成了難以擊破的超級障礙。</p>
<p>鄧肯個人5度奪下總冠軍，15次入選明星賽，2度獲得年度MVP，3次決賽MVP，10次入選年度第一隊(3次年度第二隊和2次年度第三隊)，8次入選年度防守第一隊(7次年度防守第二隊)。在生涯總得分、總籃板數、阻攻數、出賽場數、進球數均高居馬刺隊史第一位。</p>
<p><img src="/storage/news-posts/February2017/IHqa7zo0CbTM5YpdxYTf.png" alt="" width="655" height="435" /></p>',
                    'image'            => 'news-posts/February2017/yTCwJDejkjGou82AzkPb.jpg',
                    'meta_description' => '馬刺將在明天（19日）主場迎戰鵜鶘，這場比賽的賽後將會舉辦鄧肯（Tim Duncan）21號球衣退休儀式，格林（Danny Green）接受採訪時表示，他期盼球隊可以拿下這場勝利，留下一個最完美的結局。',
                    'meta_keywords'    => '鄧肯,馬刺,格林,鵜鶘',
                    'status'           => 'PUBLISHED',
                    'active'           => 1,
                    'created_at'       => $input_time,
                    'updated_at'       => $input_time,
                ])->save();
            }

            $id++;
            $input_time = $now->addHour(); //one record per hour
            $dataType = NewsPost::firstOrNew([
                'id'     => $id,
                'author' => '劉家維',
                'title'  => 'NBA／再見永遠的21號！馬刺退休鄧肯球衣',
            ]);
            if (!$dataType->exists) {
                $dataType->fill([
                    'author_id'        => 1,
                    'news_category_id' => 1,
                    'seo_title'        => 'NBA／再見永遠的21號！馬刺退休鄧肯球衣 | 運動 | 三立新聞網  SETN.COM',
                    'excerpt'          => '馬刺主場AT&T Center在此役賽後為傳奇球星Tim Duncan舉辦了溫馨而隆重的球衣退休儀式，向這位陪伴馬刺走過19個球季的巨星致敬。',
                    'body'             => '<p><span style="color: #333333; font-family: 微軟正黑體; font-size: 16px; text-align: justify;">今（19）日聖安東尼奧馬刺在主場以113：100擊敗了紐奧良鵜鶘，不過在這特殊的夜晚，比賽勝負早已不是重點，馬刺主場AT&amp;T Center在此役賽後為傳奇球星Tim Duncan舉辦了溫馨而隆重的球衣退休儀式，向這位陪伴馬刺走過19個球季的巨星致敬。</span></p>
<p><span style="color: #333333; font-family: 微軟正黑體; font-size: 16px; text-align: justify;"><img title="tim duncan retirement jersey" src="/storage/news-posts/February2017/QPHeMDhmf4mEP2F2Wty7.jpg" alt="tim duncan retirement jersey" width="523" height="345" /></span></p>
<p>&nbsp;</p>
<p style="margin: 0px 0px 1em; padding: 0px; color: #333333; font-family: 微軟正黑體; font-size: 16px; text-align: justify;">今天包括Tim Duncan的家人們，以及他的大學恩師Dave Odom、傳奇球星「海軍上將」David Robinson、總教練Gregg Popovich，以及「GDP」隊友Tony Parker和Manu Ginobili等人都盛裝出席，並輪流為他致詞。</p>
<p style="margin: 0px 0px 1em; padding: 0px; color: #333333; font-family: 微軟正黑體; font-size: 16px; text-align: justify;">隨後馬刺主場大螢幕播放起精心準備的一段回顧影片，Duncan進入聯盟第二年就和David Robinson一同幫助馬刺奪下隊史首冠，包括2003、2005、2007、2014球季馬刺隊史五座總冠軍Duncan都功不可沒，有他在的19個球季馬刺每年都進入季後賽，他場上的身影早已是馬刺球迷難以忘懷的回憶。</p>
<p style="margin: 0px 0px 1em; padding: 0px; color: #333333; font-family: 微軟正黑體; font-size: 16px; text-align: justify;">最後輪到Duncan進行演說，他才剛接過麥克風就語帶哽咽，再次感謝了所有聖安東尼奧球迷，感謝整座城市對他的愛與支持。「每個人都在講我帶給他們什麼，但對我來說，你們對我的意義才更重大。」Duncan說：「是你們讓一切變成可能，尤其是Popovich，對我而言你不僅是一名教練，更是一位父親。」</p>
<p style="margin: 0px 0px 1em; padding: 0px; color: #333333; font-family: 微軟正黑體; font-size: 16px; text-align: justify;">最後Duncan也不忘笑中含淚地自嘲，儘管是這麼隆重的場合他還是沒有打領帶，而且難得的是，自己演講超過了30秒。隨著他向台下嘉賓一一致敬，馬刺主場上空Duncan的21號球衣也緩緩揭幕，並永遠高掛在此。</p>
<p style="margin: 0px 0px 1em; padding: 0px; color: #333333; font-family: 微軟正黑體; font-size: 16px; text-align: justify;"><iframe title="Tim Duncan Full Speech | Jersey Retirement Ceremony | December 18, 2016" src="https://www.youtube.com/embed/Ln16us_-sbA?wmode=opaque&amp;theme=dark" width="560" height="315" frameborder="0" allowfullscreen=""></iframe></p>
<p style="margin: 0px 0px 1em; padding: 0px; color: #333333; font-family: 微軟正黑體; font-size: 16px; text-align: justify;">&nbsp;</p>',
                    'image'            => 'news-posts/February2017/NMvXObaO5UAUyUPiRlj3.jpg',
                    'meta_description' => '今（19）日聖安東尼奧馬刺在主場以113：100擊敗了紐奧良鵜鶘，不過在這特殊的夜晚，比賽勝負早已不是重點，馬刺主場AT&amp;T Center在此役賽後為傳奇球星Tim Duncan舉辦了溫馨而隆重的球衣退休儀式，向這位陪伴馬刺走過19個球季的巨星致敬。',
                    'meta_keywords'    => '退休,NBA,馬刺,Tim Duncan,Gregg Popovich,三立,三立新聞,三立新聞台,三立財經台,新聞台,財經台',
                    'status'           => 'PUBLISHED',
                    'active'           => 1,
                    'created_at'       => $input_time,
                    'updated_at'       => $input_time,
                ])->save();
            }

            $id++;
            $input_time = $now->addHour(); //one record per hour
            $dataType = NewsPost::firstOrNew([
                'id'     => $id,
                'author' => '林國賢',
                'title'  => '台灣燈會湧人潮、車潮 交通大打結',
            ]);
            if (!$dataType->exists) {
                $dataType->fill([
                    'author_id'        => 1,
                    'news_category_id' => 2,
                    'seo_title'        => '台灣燈會湧人潮、車潮 交通大打結 - 生活 - 自由時報電子報',
                    'excerpt'          => '',
                    'body'             => '<p>台灣燈會開燈湧入190萬人參觀，散場時人潮、車潮塞爆，直到今天凌晨1時許才紓解；主辦單位預估今天入場人數與昨天相當，呼籲民眾多搭乘大眾運輸工具轉搭接駁車，紓解交通壓力。</p>
<figure class="image"><img title="台灣燈會開幕夜，現場人山人海。（圖由縣府提供）" src="/storage/news-posts/February2017/CmmsqqAYoFaaxGdIqAZP.jpg" alt="台灣燈會開幕夜，現場人山人海。（圖由縣府提供）" />
<figcaption>台灣燈會開幕夜，現場人山人海。（圖由縣府提供）</figcaption>
</figure>
<p>&nbsp;</p>
<p>台灣燈會昨晚由總統蔡英文與民眾一起倒數開燈，賞燈民眾將燈區擠得水洩不通，晚上8時30分以後民眾陸續離場，但人潮眾多疏散不易，燈會周邊交通更是大打結，包括清雲路、145線道吳厝段、145乙往國道一號虎尾交流道段，一度定點動彈不得，直到凌晨0時過後才逐漸恢復正常。</p>
<figure class="image"><img title="台灣燈會首日人車爆滿，散場時周邊道路大塞車，直到今天凌晨才紓解。（記者林國賢攝）" src="/storage/news-posts/February2017/g8nJVngS73epMx69xcBB.jpg" alt="台灣燈會首日人車爆滿，散場時周邊道路大塞車，直到今天凌晨才紓解。（記者林國賢攝）" />
<figcaption>台灣燈會首日人車爆滿，散場時周邊道路大塞車，直到今天凌晨才紓解。（記者林國賢攝）</figcaption>
</figure>
<p>&nbsp;</p>
<p>雲林縣政府文化處長林孟儀表示，今天入場賞燈民眾預估與昨天相當，但因明天是上班日，遊客應會提早離場，人潮最多時間應是晚間8、9點，希望民眾多使用大眾運輸系統，方便又安全。</p>
<p>林孟儀指出，縣府在燈區周邊道路規劃接駁車專用道，主要提供接駁車及發生緊急事故供救護車、警車等救護車輛行駛，請一般車輛不要誤入，影響接駁與救護。</p>
<p>&nbsp;</p>',
                    'image'            => 'news-posts/February2017/4D7GCKUDHm11hkvZ2opC.jpg',
                    'meta_description' => '台灣燈會開燈湧入190萬人參觀，散場時人潮、車潮塞爆，直到今天凌晨1時許才紓解；主辦單位預估今天入場人數與昨天相當，呼籲民眾多搭乘大眾運輸工具轉搭接駁車，紓解交通壓力。台灣燈會昨晚由總統蔡英文與民眾一起倒數開燈，賞燈民眾將燈區擠得水洩不通，晚上8時30分以後民眾陸續離場，但人潮眾多疏散不易，燈會周邊交通更是大打結，包括清雲路、145線道吳厝段、145乙往國道一號虎尾交流道段，一度定點動彈不得，直到凌晨0時過後才逐漸恢復正常。',
                    'meta_keywords'    => '台灣燈會,自由時報, 自由電子報',
                    'status'           => 'PUBLISHED',
                    'active'           => 1,
                    'created_at'       => $input_time,
                    'updated_at'       => $input_time,
                ])->save();
            }

            $id++;
            $input_time = $now->addHour(); //one record per hour
            $dataType = NewsPost::firstOrNew([
                'id'     => $id,
                'author' => 'TVBS',
                'title'  => '禍從天降！路跑遭10Kg重馬達砸傷 險沒命',
            ]);
            if (!$dataType->exists) {
                $dataType->fill([
                    'author_id'        => 1,
                    'news_category_id' => 3,
                    'seo_title'        => '禍從天降！路跑遭10Kg重馬達砸傷 險沒命',
                    'excerpt'          => '',
                    'body'             => '<p>民眾參加路跑，卻被從天而降的馬達砸傷！12日上午，有銀行業者舉辦路跑活動，但一名陳姓男子經過麥帥二橋橋下時，橋墩維護平台上的馬達疑似老舊鬆脫，居然直接掉落打傷人，跑者當場倒地，送醫救治後頭縫了12針、下巴4針，門牙還斷裂。無辜的陳姓跑者受訪時說，他醒來時已經在救護車，要是馬達掉落時間再晚點，恐怕傷的人更多。</p>
<p>記者吳欣倫：「當時陳姓跑者就是行經麥帥二橋下面，不過他頭頂上的維修平台當時有個馬達疑似老舊鬆脫，掉落後直接砸到他，讓他血流如柱。」</p>
<p>參加路跑怎麼會被砸傷？惹禍的就是這台重達10公斤的馬達，外層都是明顯的生鏽痕跡，砸中路過的陳姓跑者，救護人員到場後趕緊將他送醫，由於頭部前額充當其衝，除了腦震盪之外，頭部縫了12針，下巴4針，門牙斷4根，回想起事發經過，陳姓跑者心有餘悸。</p>
<p>受傷陳姓跑者：「那個時間只會覺得，我怎麼躺在救護車，我快嚇死了，我真的不知道為什麼會倒地耶。」</p>
<p>真的嚇都嚇死了，或許是因為受傷的關係，陳姓跑者還是有些聲音微弱，熱愛路跑的他，和老婆才在幾天前參加花博路跑，獲得團體賽第2名，在朋友邀約下想再次突破，沒想到禍從天降。</p>
<p>受傷陳姓跑者：「氣死我，我使出洪荒之力，然後我覺得喉嚨怪怪的，我摸頭都是血，我就跟他們講說，既然要弄就弄成都敏俊，害我以後不趕跑河邊了。」</p>
<p>當時，陳姓跑者的太太也目擊了所有過程，但怎麼也沒想過，受傷的居然是身邊的枕邊人。</p>
<p>遭砸傷跑者太太黃小姐：「我有看到一個人滿臉是血，我沒認出來他是我老公，之後才回想起來，原來血流如注的是我老公。」</p>
<p>台北新工處工務科科長郭俊昇：「那個馬達平台比較老舊，零件要去做更換。」</p>
<p>台北市新工處表示，本來在3月要維護的機具卻突然壞了，將會再了解惹禍原因，至於賠償部分，會以「工務險」處理，路跑主辦單位也有300萬的意外險；只是這回在熱愛的路跑出事，短時間他們行經河濱公園，恐怕心中都會有陰影揮之不去。</p>
<p><img title="路跑遭10Kg重馬達砸傷" src="/storage/news-posts/February2017/zz1kCB78vE1g0ArvLwwN.jpg" alt="路跑遭10Kg重馬達砸傷" width="870" height="489" /></p>',
                    'image'            => 'news-posts/February2017/dEAEmSbVaKf141dKP77i.jpg',
                    'meta_description' => '民眾參加路跑，卻被從天而降的馬達砸傷！12日上午，有銀行業者舉辦路跑活動，但一名陳姓男子經過麥帥二橋橋下時，橋墩維護平台上的馬達疑似老舊鬆脫，居然直接掉落打傷人，跑者當場倒地，送醫救治後頭縫了12針、...',
                    'meta_keywords'    => '路跑,馬達',
                    'status'           => 'PUBLISHED',
                    'active'           => 1,
                    'created_at'       => $input_time,
                    'updated_at'       => $input_time,
                ])->save();
            }

            $id++;
            $input_time = $now->addHour(); //one record per hour
            $dataType = NewsPost::firstOrNew([
                'id'     => $id,
                'author' => '黃村杉',
                'title'  => '平溪天燈節登場 20呎台日美景主燈升空',
            ]);
            if (!$dataType->exists) {
                $dataType->fill([
                    'author_id'        => 1,
                    'news_category_id' => 4,
                    'seo_title'        => '平溪天燈節登場 20呎台日美景主燈升空-大台北-HiNet新聞',
                    'excerpt'          => '',
                    'body'             => '<p style="margin: 0px 0px 20px; padding: 0px; border: none; text-align: justify; color: #555555; font-family: 微軟正黑體, Arial, Helvetica; font-size: 18px;">平溪天燈節11日於十分廣場隆重登場，吸引來自世界各地的朋友一早到場排隊，1200份天燈施放卷50分鐘內即發送完畢。今年天燈活動亮點是象徵臺日交流意象的20呎大型主燈，市長朱立倫、日本臺灣交流協會沼田幹夫代表及侯友宜、李四川、葉惠青等3位副市長一同施放，且也邀臺日小朋友攜手體驗放天燈的樂趣。</p>
<p style="margin: 0px 0px 20px; padding: 0px; border: none; text-align: justify; color: #555555; font-family: 微軟正黑體, Arial, Helvetica; font-size: 18px;">該象徵臺日交流意象的20呎大型主燈，囊括新北市的野柳、九份、淡水、烏來、金瓜石、鶯歌等地區，秀出獨特的山城、瀑布、博物館、原住民圖騰以及天燈飛升的美景，也同時呈現深受台灣人喜愛的日本人氣景點，像是富士山、大阪城、晴空塔、淺草寺等等，都是兩地10大必去、必遊的超熱門景點。</p>
<p style="margin: 0px 0px 20px; padding: 0px; border: none; text-align: justify; color: #555555; font-family: 微軟正黑體, Arial, Helvetica; font-size: 18px;">朱立倫表示，新北市平溪天燈節已邁入第19個年頭，每年吸引無數國內外遊客造訪，屢獲國際推崇與肯定。據交通部觀光局105年最新統計資料，平溪首度躍升為來臺自由行旅客最喜愛的前10大熱門景點之一，同年也獲得國家地理雜誌推薦為「全球10大最佳冬季旅遊」之一，證明平溪在國際上的熱門程度及獨特的觀光魅力，讓平溪地區從平靜純樸的小鎮化身為國際知名的觀光景點。</p>
<p style="margin: 0px 0px 20px; padding: 0px; border: none; text-align: justify; color: #555555; font-family: 微軟正黑體, Arial, Helvetica; font-size: 18px;">觀光旅遊局強調，隨著平溪天燈節的轉型，平溪在地商圈、社團與協會等也積極投入資源推廣在地觀光，像是敲鐘躲貓貓、天燈我材必有用等季節性活動。另2/19(日)、2/25(六)更邀請知名自然觀察家-劉克襄老師及平溪文史工作者-郭聰能老師，帶領大家一同淨山並體驗平溪自然與人文之美。</p>',
                    'image'            => 'news-posts/February2017/49qaoehTEry7A7DkGyBr.jpg',
                    'meta_description' => '記者黃村杉／新北報導 平溪天燈節11日於十分廣場隆重登場，吸引來自世界各地的朋友一早到場排隊，1200份天燈施放卷50分鐘內即發送完畢。今年天燈活動亮點是象徵臺日交流意象的20呎大型主燈，市長朱立倫、...',
                    'meta_keywords'    => '平溪天燈節登場',
                    'status'           => 'PUBLISHED',
                    'active'           => 1,
                    'created_at'       => $input_time,
                    'updated_at'       => $input_time,
                ])->save();
            }

            $id++;
            $input_time = $now->addHour(); //one record per hour
            $dataType = NewsPost::firstOrNew([
                'id'     => $id,
                'author' => '娛樂頻道',
                'title'  => '聽張學友唱到哭 盧廣仲台下竟幾乎全程比「這手勢」',
            ]);
            if (!$dataType->exists) {
                $dataType->fill([
                    'author_id'        => 1,
                    'news_category_id' => 5,
                    'seo_title'        => '聽張學友唱到哭  盧廣仲台下竟幾乎全程比「這手勢」 - 自由娛樂',
                    'excerpt'          => '',
                    'body'             => '<p>55歲的「歌神」張學友昨日晚間在台北小巨蛋華麗開唱，連唱6場、7.1萬張的門票全部受鑿，推估吸金超過2.3億台幣，人氣依舊不減。而和張同為「巨蟹座又屬牛」的創作歌手盧廣仲昨日也親臨現場一睹偶像風采，更興奮表示「超級害羞我臉超級紅」。</p>
<figure class="image"><img title="張學友昨日晚間在台北開唱。（資料照，記者趙世勳攝）" src="/storage/news-posts/February2017/icmizrtdNlJCUG4fOCj3.jpg" alt="張學友昨日晚間在台北開唱。（資料照，記者趙世勳攝）" />
<figcaption>張學友昨日晚間在台北開唱。（資料照，記者趙世勳攝）</figcaption>
</figure>
<p>&nbsp;</p>
<p>張學友昨日開始在台舉辦「A CLASSIC TOUR 學友&middot;經典世界巡迴演唱會」，歌手盧廣仲不僅親自現身，還在臉書發文以「條列式」透露感想。盧首先表示，他聽到張唱《吻別》和《每天愛你多一些》時忍不住落淚，還跟張說自己小學參加歌唱比賽時就是演唱《吻別》，不過慘在第一輪就被淘汰，沒想到張回應說「因為很不適合你唱唷」，反應超幽默。</p>
<figure class="image"><img title="張學友出道多年人氣依舊不減。（資料照，記者趙世勳攝）" src="/storage/news-posts/February2017/srFKlxoM9l2o9ZFRTFWp.jpeg" alt="張學友出道多年人氣依舊不減。（資料照，記者趙世勳攝）" />
<figcaption>張學友出道多年人氣依舊不減。（資料照，記者趙世勳攝）</figcaption>
</figure>
<p>&nbsp;</p>
<p>此外，盧還表示自己見到偶像「超級害羞我臉超級紅」，更搞笑列出「第3.5點」說張在舞台上唱歌時他幾乎全程都是「ROCK」手勢，笑翻眾人。不過，盧也感性說道，張跟他說，自己為了演唱會不僅健身2年、親自參與設計舞台，全場演唱會也沒用提詞機跟幾乎沒忘詞，讓他相當佩服又感動，直呼「謝謝歌神分享如此珍貴和巨大的意志力」。</p>
<figure class="image"><img title="盧廣仲臉書全文。（翻攝自盧廣仲臉書）" src="/storage/news-posts/February2017/vqAaswSwS7I1WujQJBp5.png" alt="盧廣仲臉書全文。（翻攝自盧廣仲臉書）" />
<figcaption>盧廣仲臉書全文。（翻攝自盧廣仲臉書）</figcaption>
</figure>
<p>&nbsp;</p>',
                    'image'            => 'news-posts/February2017/PLYD8kgj1rjL3OpjvJwY.jpg',
                    'meta_description' => '盧廣仲（左）昨去看偶像張學友（右）的演唱會。（翻攝自盧廣仲臉書）〔娛樂頻道／綜合報導〕55歲的「歌神」張學友昨日晚間在台北小巨蛋華麗開唱，連唱6場、7.1萬張的門票全部受鑿，推估吸金超過2.3億台幣，人氣依舊不減。而和張同為「巨蟹座又屬牛」的創作歌手盧廣仲昨日也親臨現場一睹偶像風采，',
                    'meta_keywords'    => '盧廣仲,張學友,演唱會',
                    'status'           => 'PUBLISHED',
                    'active'           => 1,
                    'created_at'       => $input_time,
                    'updated_at'       => $input_time,
                ])->save();
            }

            $id++;
            $input_time = $now->addHour(); //one record per hour
            $dataType = NewsPost::firstOrNew([
                'id'     => $id,
                'author' => '台灣好新聞報政治中心',
                'title'  => '自打臉？又主持萬大線動工 柯P：捷運局拜託的',
            ]);
            if (!$dataType->exists) {
                $dataType->fill([
                    'author_id'        => 1,
                    'news_category_id' => 8,
                    'seo_title'        => '自打臉？又主持萬大線動工 柯P：捷運局拜託的',
                    'excerpt'          => '',
                    'body'             => '<p>台北市長柯文哲12日上午出席捷運萬大線CQ840及850A區段標聯合動土典禮，宣示萬大線台北市段全線動工，工期8年，預計114年完工。由於捷運萬大線已多次動工，柯文哲前年參加第3次區段標動工時曾批評，「多次動工有必要嗎？」。但今日又出席動工典禮，媒體質疑柯是否「自打嘴巴」？柯文哲12日受訪表示，萬大線是大陸工程包的，高達100多億，也是台北境內最大的一標，所以捷運局特別拜託他去，他只好答應。</p>
<p>連接台北西區與中和及樹林的捷運萬大線分二期施作，第一期路線採地下興建，長9.5公里，其中北市段3.8公里、新北市段5.7公里，共設9座車站和1座機廠；第二期工程路線長13.3公里，全在新北市，設13座車站，包含地下2座、高架11座。未來完工通車後，將與中正紀念堂站銜接，可紓解萬華、中永和及土城等地交通。</p>
<figure class="image"><img title="台北捷運萬大線台北市段已進入全線動工階段，捷運工程局預計2025年萬大線就會完工。（圖／台北市政府捷運工程局）" src="/storage/news-posts/February2017/5quF5BnwMq2pJzDLbw35.jpg" alt="台北捷運萬大線台北市段已進入全線動工階段，捷運工程局預計2025年萬大線就會完工。（圖／台北市政府捷運工程局）" />
<figcaption>台北捷運萬大線台北市段已進入全線動工階段，捷運工程局預計2025年萬大線就會完工。（圖／台北市政府捷運工程局）</figcaption>
</figure>
<p>&nbsp;</p>
<p>柯文哲今天一早也參加 2017台北渣打馬拉松，會受接受訪問。媒體詢問，之前不是才批評說不用每一段都要再動工一次？柯文哲說，萬大線工程約有800多億元，分為好幾區段招標，這是在台北市境內最大的一標，所以他大概也只會去這場。至於萬大線完工之前還會有其他動土嗎？柯文哲表示，好像應該沒有了，大概就這個，因為捷運局也不會隨便叫他再去什麼動土，大概就這一次而已。</p>
<p>柯文哲說，萬大線行經的中正、萬華2區，是台北市發展比較早的地區，施工環境很艱困，但他對捷運局有信心，一定能夠克服所有困難，如期如質施工。他也特別提醒施工單位要以安全為重－注意工程安全，維持交通安全，確保民眾安全，有安全才有品質。</p>
<p>捷運局表示，萬大線北市段所面對的挑戰包括，路窄、住宅密集、管線多且大、穿越新店溪、小轉彎半徑、碰到古河道、大排水箱涵、考古與文化遺址搶救。 萬大線行經的南海路、西藏路、萬大路等路寬都在30公尺以下，在圍籬的佈設、交通維持計畫的擬定等造成很大的困擾。路窄加住宅密集，車站連續壁幾乎緊貼民房，如路寬僅16.36公尺的南海路段約在30公分左右，需加強施作建物保護措施。LG03至LG04站的西藏路轉萬大路，是僅約50公尺的小轉彎半徑，潛盾施工難度高。G02站就在「植物園遺址」的中心點，必需先進行44個月的「人工考古開挖」後，才能進行主體工程。這些因素均會讓完工時間拉長。</p>
<p>&nbsp;</p>',
                    'image'            => 'news-posts/February2017/dpAtZsNg7RmnAm28OEXF.jpg',
                    'meta_description' => '台北市長柯文哲12日上午出席捷運萬大線CQ840及850A區段標聯合動土典禮，宣示萬大線台北市段全線動工，工期8年，預計114年完工。由於捷運萬大線已多次動工，柯文哲前年參加第3次區段標動工時曾批評，「多次動工有必要嗎？」。但今日又出席動工典禮，媒體質疑柯是否「自打嘴巴」？柯文哲12日受訪表示，萬大線是大陸工程包的，高達100多億，也是台北境內最大的一標，所以捷運局特別拜託他去，他只好答應。',
                    'meta_keywords'    => '柯文哲,捷運萬大線',
                    'status'           => 'PUBLISHED',
                    'active'           => 1,
                    'created_at'       => $input_time,
                    'updated_at'       => $input_time,
                ])->save();
            }

            $id++;
            $input_time = $now->addHour(); //one record per hour
            $dataType = NewsPost::firstOrNew([
                'id'     => $id,
                'author' => '蘇文彬',
                'title'  => 'Android Wear 2.0正式問世，內建Google助手',
            ]);
            if (!$dataType->exists) {
                $dataType->fill([
                    'author_id'        => 1,
                    'news_category_id' => 9,
                    'seo_title'        => 'Android Wear 2.0正式問世，內建Google助手',
                    'excerpt'          => 'Android Wear 2.0強調更個人化訊息的錶面設計，讓使用者抬起手腕就能隨時檢示天氣、個人活動及行事曆等資訊，並首次內建Google Play，方便使用者尋找手錶專用的App，此外，Google Assistant也首次進入智慧手錶。',
                    'body'             => '<p>原本該在去年秋天問世的Google下一代穿戴裝置平台Android Wear 2.0在本周正式登場，這個新的平台可讓智慧手錶更個人化，而且內建了Google Assistant助手功能，可透過語音命令讓助手幫你處理各種事務。</p>
<p>Android Wear 2.0允許使用者個人化自己的錶面，用戶可隨時從錶面看到簡單的天氣資訊、股市表現、個人的活動紀錄或是約會提醒，或是透過手錶向Uber叫車，撥電話給重要的人等等。（下圖，來源：Google）</p>
<p><img src="/storage/news-posts/February2017/Ijle0xJfgW9XshnQgQOH.gif" alt="" width="300" height="300" /></p>
<p>在Android Wear平台上預載了Google Fit，這是一個運動健身專用App，可透過智慧手錶幫你紀錄外出散步、跑步或是其他運動時的心跳、步數、消耗的卡路里數等。如果使用的智慧手錶具備行動上網功能，運動時不需要攜帶手機，可以收發訊息、撥接電話。</p>
<p>呼應使用者的需求，新的穿戴平台也內建了Google Play，方便使用者下載各種智慧手錶專用App，例如Android Pay、AccuWeather等。</p>
<p>過去使用者在手錶上收到訊息，礙於智慧手錶在螢幕上先天較小的限制，回覆訊息可能比較困難，現在使用者可以在錶面上手寫文字或畫出表情符號回覆，也可以直接用說的回覆。</p>
<p>此外，Android Wear 2.0也加入了Google Assistant助手功能，Google Assistant先前只在智慧喇叭Google Home、通訊程式Allo及Google Pixel，現在則將登上Android智慧手錶，用戶按下手錶的電源鈕並說「Ok Google」，就能以語音要求Google Assistant查詢天氣、寫下購物清單等等。目前Google Assistant僅支援英語、德語，未來幾個月將支援更多語言。</p>
<p>Google也介紹了首款將採用Android Wear 2.0的智慧手錶LG Watch Style，該款智慧手錶可更換使用18mm錶帶。具備NFC以支援行動支付，並有GPS、心律感測等功能，協助使用者紀錄活動時的身體數據，手錶預計2月10日先在美國地區上市，後續幾週會在加拿大、台灣、俄羅斯推出。</p>
<p>至於市場上既有的Android智慧手錶，包含華碩ZenWatch 2及3、華為的Huawei Watch，還有LG的G Watch R、Urbane及LTE版本，以及第二代Moto 360等等，未來幾週將可升級至新版本。</p>
<p><iframe title="Android Wear: Make the most of every step" src="https://www.youtube.com/embed/qlTGwPIOz0Y?wmode=opaque&amp;theme=dark" width="560" height="315" frameborder="0" allowfullscreen=""></iframe></p>',
                    'image'            => 'news-posts/February2017/1XIzduvAYE2JNp7DxnkD.jpg',
                    'meta_description' => 'Android Wear 2.0強調更個人化訊息的錶面設計，讓使用者抬起手腕就能隨時檢示天氣、個人活動及行事曆等資訊，並首次內建Google Play，方便使用者尋找手錶專用的App，此外，Google Assistant也首次進入智慧手錶。',
                    'meta_keywords'    => 'Android Wear 2.0',
                    'status'           => 'PUBLISHED',
                    'active'           => 1,
                    'created_at'       => $input_time,
                    'updated_at'       => $input_time,
                ])->save();
            }

            $id++;
            $input_time = $now->addHour(); //one record per hour
            $dataType = NewsPost::firstOrNew([
                'id'     => $id,
                'author' => '張家玲',
                'title'  => '宋智孝就愛這墨鏡　機場look輕鬆添星味',
            ]);
            if (!$dataType->exists) {
                $dataType->fill([
                    'author_id'        => 1,
                    'news_category_id' => 11,
                    'seo_title'        => '宋智孝就愛這墨鏡機場look輕鬆添星味 | 即時新聞 | 20170211 | 蘋果日報',
                    'excerpt'          => '',
                    'body'             => '<p>韓國人氣綜藝節目《Running Man》昨晚在台舉辦見面會，唯一的女性成員宋智孝昨上午現身仁川機場搭乘專機時，身穿軍綠色外套搭配帥氣墨鏡，一路上親切和粉絲打招呼，而她用來增添明星味的墨鏡正是出自許多韓星追捧、她也曾多次在公眾場合配戴的眼鏡品牌Fakeme，此次她選搭的Lemming Merged款式外型雖簡單但充滿個性，共有4款不同顏色可選，每款售價8800元。（張家玲／台北報導）</p>
<figure class="image"><img title="宋智孝是Fakeme的粉絲，過去也曾選擇該牌墨鏡現身公眾場合。品牌提供" src="/storage/news-posts/February2017/igTt6ienuyGmgdaGokun.jpg" alt="宋智孝是Fakeme的粉絲，過去也曾選擇該牌墨鏡現身公眾場合。品牌提供" />
<figcaption>宋智孝是Fakeme的粉絲，過去也曾選擇該牌墨鏡現身公眾場合。品牌提供</figcaption>
</figure>
<p>&nbsp;</p>',
                    'image'            => 'news-posts/February2017/MJ5ZP63F3Slv176ROX4x.jpg',
                    'meta_description' => '韓國人氣綜藝節目《Running Man》昨晚在台舉辦見面會，唯一的女性成員宋智孝昨上午現身仁川機場搭乘專機時，身穿軍綠色外套搭配帥氣墨鏡，一路上親切和粉絲打招呼，而她用來增添明星味的墨鏡正是出自許多',
                    'meta_keywords'    => '宋智孝,墨鏡',
                    'status'           => 'PUBLISHED',
                    'active'           => 1,
                    'created_at'       => $input_time,
                    'updated_at'       => $input_time,
                ])->save();
            }

            $id++;
            $input_time = $now->addHour(); //one record per hour
            $dataType = NewsPost::firstOrNew([
                'id'     => $id,
                'author' => '許文貞',
                'title'  => '台北書展裡擺市集 創意「Zine」大玩小誌',
            ]);
            if (!$dataType->exists) {
                $dataType->fill([
                    'author_id'        => 1,
                    'news_category_id' => 12,
                    'seo_title'        => '台北書展裡擺市集 創意「Zine」大玩小誌 - 中時電子報',
                    'excerpt'          => '',
                    'body'             => '<p>書展裡也可以逛市集？今年台北國際書展世貿一館角落的「青年創意出版區」的，有一群年輕人帶著自己的「Zine」（小誌）在擺攤，販售個人出版創作品。現場也展示孔版印刷機、活版印刷機，也提供許多不同類型的Zine讓民眾翻閱。甚至還有一台專售Zine的自動販賣機，看到喜歡的小誌，投幾個銅板就能輕鬆買到。</p>
<figure class="image"><img title="角落有一台專售Zine的自動販賣機。（許文貞攝）" src="/storage/news-posts/February2017/hU4u8v4gRksObzzPOtc8.jpg" alt="角落有一台專售Zine的自動販賣機。（許文貞攝）" />
<figcaption>角落有一台專售Zine的自動販賣機。（許文貞攝）</figcaption>
</figure>
<p>&nbsp;</p>
<p>相較於內容面向廣泛的雜誌，Zine小誌的「小」，不只是因為主題偏向小眾，也因為採用與傳統出版印刷不同的方式，例如孔版印刷（Risograph）或活版印刷，可以小量出版作品，讓創作者能在短時間內實驗不同的創作方式，近年來十分受到歡迎。</p>
<p>策展人江家華和田田圈文創工作群成員龔維德，去年就曾合作舉辦Zine的市集活動。「這次公開徵選約45組攤位，分成三梯次在書展擺攤，鼓勵更多獨立創作者參與。另外也邀請15組藝術家創作Zine，放到自動販賣機販售。」</p>
<p>受邀為自動販賣機創作Zine的藝術家，有平面設計師、漫畫家、刺青藝術師等。「Zine專門販賣機光是書展頭兩天就賣出超過100本的Zine。」像是設計師蔡南昇和印刻主編丁名慶跨界合作的兩本Zine《一日》、《一刻》在第二天就銷售一空。金漫獎得主阮光民、米奇鰻，法國安古蘭漫畫節新秀獎入圍漫畫家覃偉的漫畫也都限量在販賣機販售。</p>
<p>「Zine最主要是降低出版門檻，讓創作者簡單印製作品，甚至能當名片用。」江家華表示，Zine源自歐美國家，最早在2001年瑞士就誕生了第一家專門出版Zine的獨立出版社「Nieves」。她2010年在歐洲唸書時，注意到有的書店開始會騰出角落來販售Zine，後來逐漸在歐美藝術圈流行。不只年輕創作者把作品做成Zine，藝術家也會用Zine來做實驗性高的作品。</p>
<p>Zine的內容也相當多元，有的以文字或攝影創作為主，有的是漫畫、插畫。源自日本的同人誌也可說是Zine的一種。如今Zine也不再只是實驗之作，像是參與擺攤的「小本書」、「三貓俱樂部」等創作者，都只以Zine的形式出版。</p>
<p>相較於傳統印刷，出版Zine常用的孔版印刷技術價格十分低廉，又能少量印製，還帶有特殊的手工質感。龔維德解釋，孔版印刷印製的方式類似傳統的影印機，但用的是油墨而非碳粉，同一張紙經過兩個顏色以上的油墨印刷，能產生特別的「疊色」效果。「紙張在重複印刷時，位置有時候會跑掉，反而形成一種特殊的手製粗糙感，十分受到創作者的喜愛。」</p>',
                    'image'            => 'news-posts/February2017/n5J091Ma6NGwmpqJQAVs.jpg',
                    'meta_description' => '書展裡也可以逛市集？今年台北國際書展世貿一館角落的「青年創意出版區」的，有一群年輕人帶著自己的「Zine」（小誌）在擺攤，販售個人出版創作品。現場也展示孔版印刷機、活版印刷機，也提供許多不同類型的Zine讓民眾翻閱。甚至還有一台專售Zine的自動販賣機，看到喜歡的小誌，投幾個銅板就能輕鬆買到。　相較於內容面向廣泛的雜誌，Zine小誌的「小」，不只是因為主題偏向小眾，也因為採用與傳統出版印刷不同的方式，例如孔版印…',
                    'meta_keywords'    => '台北書展',
                    'status'           => 'PUBLISHED',
                    'active'           => 1,
                    'created_at'       => $input_time,
                    'updated_at'       => $input_time,
                ])->save();
            }

            $id++;
            $input_time = $now->addHour(); //one record per hour
            $dataType = NewsPost::firstOrNew([
                'id'     => $id,
                'author' => '吳永佳',
                'title'  => '邰智源：小心，吃飯露本性！你一定要注意的３件事',
            ]);
            if (!$dataType->exists) {
                $dataType->fill([
                    'author_id'        => 1,
                    'news_category_id' => 13,
                    'seo_title'        => '邰智源：小心，吃飯露本性！你一定要注意的３件事 - 專訪集 - 人物 - Cheers快樂工作人雜誌',
                    'excerpt'          => '縱橫演藝圈數十年，從昔日的選秀新人，到今時成為綜藝界呼風喚雨的大哥級人物，邰智源談到他的交友哲學，沒有複雜的方法，倒是劈頭冒出一句：「我的朋友，都是吃飯吃來的！」',
                    'body'             => '<p><span style="color: #000000; font-family: Arial, 微軟正黑體, 繁黑體, \'Microsoft JhengHei\', \'Microsoft YaHei\', \'Heiti TC\', \'LiHei Pro\', sans-serif, 新細明體, PMingLiU; font-size: 15px;">餐桌，「物以類聚」的識人之處 </span></p>
<p><span style="color: #000000; font-family: Arial, 微軟正黑體, 繁黑體, \'Microsoft JhengHei\', \'Microsoft YaHei\', \'Heiti TC\', \'LiHei Pro\', sans-serif, 新細明體, PMingLiU; font-size: 15px;">怎麼說呢？從小一家人都愛吃的邰智源，家學淵源加上耳濡目染，自己也成了熱愛美食的饕客。就連要出書，談的不是表演生涯，都是介紹各地的美食。 </span></p>
<p><span style="color: #000000; font-family: Arial, 微軟正黑體, 繁黑體, \'Microsoft JhengHei\', \'Microsoft YaHei\', \'Heiti TC\', \'LiHei Pro\', sans-serif, 新細明體, PMingLiU; font-size: 15px;">雖自認朋友不特別多，但只要是好兄弟，邰智源絕對不忘常以美食相召。例如他多年的莫逆之交莫凡，每個月非得聚上一、兩次不可；圈內的「徒子徒孫」如小蝦等新秀，每月也一定要吃上一頓飯；包括與他交情深厚的幾位健身房教練，彼此一樣常相召「飯團」。 </span></p>
<p><span style="color: #000000; font-family: Arial, 微軟正黑體, 繁黑體, \'Microsoft JhengHei\', \'Microsoft YaHei\', \'Heiti TC\', \'LiHei Pro\', sans-serif, 新細明體, PMingLiU; font-size: 15px;">對邰智源來說，與老友、麻吉是靠吃飯維繫情感，結交新朋友，更要靠吃飯。因為，「吃飯是最容易『識人』的場所，」他指出。 </span></p>
<p><span style="color: #000000; font-family: Arial, 微軟正黑體, 繁黑體, \'Microsoft JhengHei\', \'Microsoft YaHei\', \'Heiti TC\', \'LiHei Pro\', sans-serif, 新細明體, PMingLiU; font-size: 15px;">所謂「識人」，有雙重涵義，一是指透過飯局認識、知道「朋友的朋友」；另一層則是藉由吃飯的場合了解、認清一個人。 雖然在螢光幕前或是老友相聚時，好笑、有趣的邰智源多半是眾人目光包圍的中心，但到了有新朋友的場子，他就會調整自己，變成低調、冷靜的旁觀者。 </span></p>
<p><span style="color: #000000; font-family: Arial, 微軟正黑體, 繁黑體, \'Microsoft JhengHei\', \'Microsoft YaHei\', \'Heiti TC\', \'LiHei Pro\', sans-serif, 新細明體, PMingLiU; font-size: 15px;">「只要用心，可以在飯桌上觀察到的事太多了！」邰智源說，一個人的家教、修養、對朋友的態度，常在一頓飯中表露無遺。舉凡是不是會為大家分筷子、遞餐巾，或是否謙讓別人先用菜等極微小的細節，都可一窺端倪。 </span></p>
<p><span style="color: #000000; font-family: Arial, 微軟正黑體, 繁黑體, \'Microsoft JhengHei\', \'Microsoft YaHei\', \'Heiti TC\', \'LiHei Pro\', sans-serif, 新細明體, PMingLiU; font-size: 15px;">此外，酒攤是另一個「識人」的重要場所，從一個人的「酒品」，往往可看出他真正的「人品」。自謂不很愛喝酒的邰智源，樂得在酒局中冷眼判讀人性。也就在這些細微的觀察中，讓他明瞭哪些人未來可能值得深交，哪些人可敬而遠之。</span></p>
<p><span><span style="color: #000000; font-family: Arial, 微軟正黑體, 繁黑體, \'Microsoft JhengHei\', \'Microsoft YaHei\', \'Heiti TC\', \'LiHei Pro\', sans-serif, 新細明體, PMingLiU;"><span style="font-size: 15px;">交朋友，要捨得花錢花心思</span></span></span></p>
<p><span><span style="color: #000000; font-family: Arial, 微軟正黑體, 繁黑體, \'Microsoft JhengHei\', \'Microsoft YaHei\', \'Heiti TC\', \'LiHei Pro\', sans-serif, 新細明體, PMingLiU;"><span style="font-size: 15px;">至於餐桌待客之道，邰智源認為好餐廳和好料理固然重要，但最重要的卻是4個字：「捨得、熱情」！</span></span></span></p>
<p><span><span style="color: #000000; font-family: Arial, 微軟正黑體, 繁黑體, \'Microsoft JhengHei\', \'Microsoft YaHei\', \'Heiti TC\', \'LiHei Pro\', sans-serif, 新細明體, PMingLiU;"><span style="font-size: 15px;">從小，作為軍人的父親就告誡邰智源：「交朋友是要花錢的！」送禮、請客、招待朋友，無一不必花錢。所以邰智源深信，交朋友要捨得花錢、花心思，該請客時，就絕不能手軟：「有些人一到買單時就藉故遁逃，這種愛佔他人便宜的人，絕對交不到長久的朋友，」他說。當然，也肯定會被邰智源列為「拒絕往來戶」。</span></span></span></p>
<p><span><span style="color: #000000; font-family: Arial, 微軟正黑體, 繁黑體, \'Microsoft JhengHei\', \'Microsoft YaHei\', \'Heiti TC\', \'LiHei Pro\', sans-serif, 新細明體, PMingLiU;"><span style="font-size: 15px;">讓邰智源印象最深刻的差勁主人，就是小氣的主人。他回憶，曾有一位上市公司老闆邀他代言商品，先請他吃飯。結果一到場，邰智源赫然看見這位老闆請的是──蛋炒飯！</span></span></span></p>
<p><span><span style="color: #000000; font-family: Arial, 微軟正黑體, 繁黑體, \'Microsoft JhengHei\', \'Microsoft YaHei\', \'Heiti TC\', \'LiHei Pro\', sans-serif, 新細明體, PMingLiU;"><span style="font-size: 15px;">一頓飯的花費再高，也比不上請邰智源代言的酬勞。但這位老闆「捨大錢，省小錢」的做法，不但反映了個人格局有限，也在當下令邰智源大為不悅，心想：「你這是在羞辱自己，還是在羞辱我？」果然，餐後雙方的合作關係，也因此泡湯。</span></span></span></p>
<p><span><span style="color: #000000; font-family: Arial, 微軟正黑體, 繁黑體, \'Microsoft JhengHei\', \'Microsoft YaHei\', \'Heiti TC\', \'LiHei Pro\', sans-serif, 新細明體, PMingLiU;"><span style="font-size: 15px;">邰智源引用《論語‧公冶長》的典故，孔子教學生們談談各自的志向時，子路回答：「願車馬，衣輕裘，與朋友共，敝之而無憾。」這段話所描述的慷慨待人心態，正好可為邰智源的待友之道做註解。</span></span></span></p>
<p><span><span style="color: #000000; font-family: Arial, 微軟正黑體, 繁黑體, \'Microsoft JhengHei\', \'Microsoft YaHei\', \'Heiti TC\', \'LiHei Pro\', sans-serif, 新細明體, PMingLiU;"><span style="font-size: 15px;">邰智源創造餐桌好人緣３心法</span></span></span></p>
<p><span><span style="color: #000000; font-family: Arial, 微軟正黑體, 繁黑體, \'Microsoft JhengHei\', \'Microsoft YaHei\', \'Heiti TC\', \'LiHei Pro\', sans-serif, 新細明體, PMingLiU;"><span style="font-size: 15px;">1. 老朋友勤聯絡，以美食會友。</span></span></span></p>
<p><span><span style="color: #000000; font-family: Arial, 微軟正黑體, 繁黑體, \'Microsoft JhengHei\', \'Microsoft YaHei\', \'Heiti TC\', \'LiHei Pro\', sans-serif, 新細明體, PMingLiU;"><span style="font-size: 15px;"> 新朋友多接觸，藉餐桌識人。</span></span></span></p>
<p><span><span style="color: #000000; font-family: Arial, 微軟正黑體, 繁黑體, \'Microsoft JhengHei\', \'Microsoft YaHei\', \'Heiti TC\', \'LiHei Pro\', sans-serif, 新細明體, PMingLiU;"><span style="font-size: 15px;">2. 交朋友要捨得花錢、投注心思。 </span></span></span></p>
<p><span><span style="color: #000000; font-family: Arial, 微軟正黑體, 繁黑體, \'Microsoft JhengHei\', \'Microsoft YaHei\', \'Heiti TC\', \'LiHei Pro\', sans-serif, 新細明體, PMingLiU;"><span style="font-size: 15px;">要用多大的手筆，可量力而為，但該請的客一定要請，更要透過各種細節，讓客人感受到你的真心、熱情。</span></span></span></p>
<p><span><span style="color: #000000; font-family: Arial, 微軟正黑體, 繁黑體, \'Microsoft JhengHei\', \'Microsoft YaHei\', \'Heiti TC\', \'LiHei Pro\', sans-serif, 新細明體, PMingLiU;"><span style="font-size: 15px;">&nbsp;3. 餐桌上有親疏遠近，但無富貴貧賤。 </span></span></span></p>
<p><span><span style="color: #000000; font-family: Arial, 微軟正黑體, 繁黑體, \'Microsoft JhengHei\', \'Microsoft YaHei\', \'Heiti TC\', \'LiHei Pro\', sans-serif, 新細明體, PMingLiU;"><span style="font-size: 15px;">先摒棄以大小眼衡量別人的心態，朋友自然會來。</span></span></span></p>
<p><span><span style="color: #000000; font-family: Arial, 微軟正黑體, 繁黑體, \'Microsoft JhengHei\', \'Microsoft YaHei\', \'Heiti TC\', \'LiHei Pro\', sans-serif, 新細明體, PMingLiU;"><span style="font-size: 15px;"><iframe title="【60秒, Cheers!】邰智源的飯友哲學：如何在飯桌上交朋友?" src="https://www.youtube.com/embed/abDy4ljx82s?wmode=opaque&amp;theme=dark" width="560" height="315" frameborder="0" allowfullscreen=""></iframe></span></span></span></p>
<p>&nbsp;</p>
<p>&nbsp;</p>',
                    'image'            => 'news-posts/February2017/2p8JV9khYhTibPS37tdg.jpg',
                    'meta_description' => '出過暢銷書《邰客好吃》，邰智源不只懂吃，更懂吃飯時的主客、做人、交友之道。且看他如何在餐桌上「不卑不亢，進退得宜」，識人、待人也帶人，飯友滿天下！',
                    'meta_keywords'    => '吃飯,社交,人際,識人,交朋友',
                    'status'           => 'PUBLISHED',
                    'active'           => 1,
                    'created_at'       => $input_time,
                    'updated_at'       => $input_time,
                ])->save();
            }

            $id++;
            $input_time = $now->addHour(); //one record per hour
            $dataType = NewsPost::firstOrNew([
                'id'     => $id,
                'author' => '關鍵評論網',
                'title'  => '再見歐盟！英國的脫歐之路',
            ]);
            if (!$dataType->exists) {
                $dataType->fill([
                    'author_id'        => 1,
                    'news_category_id' => 14,
                    'seo_title'        => '再見歐盟！英國的脫歐之路 - The News Lens 關鍵評論網',
                    'excerpt'          => '在台灣時間2016年6月24日下午一點，全球矚目的英國脫歐公投的結果出爐，「脫歐派」以52%的得票率，勝過48%的「留歐派」，英國民意已正式向世界宣告將與歐盟分手。一對曾經相愛的情侶如何走向分歧之路？在「再見歐盟」的宣告之後，英國又將何去何從？請看關鍵評論網為你準備的第一手精選分析。',
                    'body'             => '<h2 class="article-title" style="font-family: \'Microsoft JhengHei\', sans-serif; box-sizing: border-box; margin: 10px 0px 15px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; line-height: 1.4em; font-size: 24px; vertical-align: baseline; color: #000000; text-align: center;">「英國脫歐」公投開票達98%，脫歐得票率52%大局已定</h2>
<p><span style="color: #4d4d4d; font-family: \'Microsoft JhengHei\', sans-serif; font-size: 16px; letter-spacing: 0.5px;">台北時間23日下午2點展開的脫歐公投，根據</span><a style="font-family: \'Microsoft JhengHei\', sans-serif; box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; line-height: inherit; font-size: 16px; vertical-align: baseline; color: #009fdb; text-decoration: none; letter-spacing: 0.5px;" title="EURONEWS的即時報導" href="http://www.euronews.com/news/streaming-live/">EURONEWS的即時報導</a><span style="color: #4d4d4d; font-family: \'Microsoft JhengHei\', sans-serif; font-size: 16px; letter-spacing: 0.5px;">，剛剛在西敏寺宣布的最新結果，脫歐派得票率達到52%，留歐派以4個百分點的差距為48%，開票率達98.9%，即使剩下的票數投給留歐，依舊無法逆轉情勢，英國脫離歐盟結果確立。</span></p>
<p style="font-family: \'Microsoft JhengHei\', sans-serif; box-sizing: border-box; margin: 0px; padding: 0.825em 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; line-height: inherit; font-size: 16px; vertical-align: baseline; color: #4d4d4d; letter-spacing: 0.5px;">在這場公投展開前，<a style="font-family: inherit; box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; color: #009fdb; text-decoration: none;" title="「脫歐派」表示" href="http://www.thenewslens.com/article/42600" target="_blank"><span id="docs-internal-guid-7cb8dbd9-8035-cd74-4e6c-5b8b5f8b765f" style="font-family: inherit; box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: bold; font-stretch: inherit; line-height: inherit; vertical-align: baseline;">「</span>脫歐派<span style="font-family: inherit; box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: bold; font-stretch: inherit; line-height: inherit; vertical-align: baseline;">」</span>表示</a><span style="font-family: inherit; box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: bold; font-stretch: inherit; line-height: inherit; vertical-align: baseline;">，</span>歐盟已威脅到英國主權，尤其隨歐盟法規已逐漸覆蓋英國本國律法，除此之外，<span id="docs-internal-guid-7cb8dbd9-8035-cd74-4e6c-5b8b5f8b765f" style="font-family: inherit; box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: bold; font-stretch: inherit; line-height: inherit; vertical-align: baseline;">「</span>脫歐派<span style="font-family: inherit; box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: bold; font-stretch: inherit; line-height: inherit; vertical-align: baseline;">」</span>支持者認為，歐盟委員會無法對英國的選民負責，更別說歐元是一場災難。對於移民政策，<span id="docs-internal-guid-7cb8dbd9-8035-cd74-4e6c-5b8b5f8b765f" style="font-family: inherit; box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: bold; font-stretch: inherit; line-height: inherit; vertical-align: baseline;">「</span>脫歐派<span style="font-family: inherit; box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: bold; font-stretch: inherit; line-height: inherit; vertical-align: baseline;">」</span>認為歐盟允許太多移民，但英國若不隸屬歐盟，就能有更合理的移民制度。</p>
<p style="font-family: \'Microsoft JhengHei\', sans-serif; box-sizing: border-box; margin: 0px; padding: 0.825em 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; line-height: inherit; font-size: 16px; vertical-align: baseline; color: #4d4d4d; letter-spacing: 0.5px;">而「留歐派」則認為，英國離開歐盟將產生嚴重後果，例如英國在歐洲市場的影響力將不再，而公司也擔憂無法僱用好的人才，而假如英國當真「脫歐」，會影響歐洲議會內的權力平衡，進而對高科技公司產生影響，現任倫敦市長Khan同樣表示，英國脫歐會降低工業水準，此外也質疑英國脫歐後的移民政策，是否將不再友善？蘇格蘭保守黨領袖Ruth Davidson則在日前辯論時表示，離開歐盟會對英國人民的安全有所影響（恐怖攻擊）。</p>
<p style="font-family: \'Microsoft JhengHei\', sans-serif; box-sizing: border-box; margin: 0px; padding: 0.825em 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; line-height: inherit; font-size: 16px; vertical-align: baseline; color: #4d4d4d; letter-spacing: 0.5px;"><a style="font-family: inherit; box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; color: #009fdb; text-decoration: none;" title="蘋果報導" href="http://www.appledaily.com.tw/realtimenews/article/new/20160624/893010/" target="_blank">蘋果報導</a>，英國脫歐公投計票與開票作業，從台灣時間今日早上5時開始進行，這次公投，有效投票人數共有4650萬人，也是英國史上第3次全國性公投。這次公投選區共382個，包括英國本土以及海外領土直布羅陀（Gibraltar），初步投票率為70%。根據BBC報導，目前已開出195區，而英國ITV分析員指稱，英國脫歐派獲勝機率達80%。</p>
<p style="font-family: \'Microsoft JhengHei\', sans-serif; box-sizing: border-box; margin: 0px; padding: 0.825em 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; line-height: inherit; font-size: 16px; vertical-align: baseline; color: #4d4d4d; letter-spacing: 0.5px;"><a style="font-family: inherit; box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; color: #009fdb; text-decoration: none;" title="端傳媒報導" href="https://theinitium.com/article/20160623-dailynews-uk-referendum/" target="_blank">端傳媒報導</a>，據BBC報導，威爾斯地區顯示脫毆派暫居上風，蘇格蘭和北愛爾蘭則表現為留歐派票數更高。有分析認為，恰好於投票日在德國一家電影院發生的槍擊事件，可能會對英國公投造成向脫毆方向移動的影響。</p>
<p style="font-family: \'Microsoft JhengHei\', sans-serif; box-sizing: border-box; margin: 0px; padding: 0.825em 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; line-height: inherit; font-size: 16px; vertical-align: baseline; color: #4d4d4d; letter-spacing: 0.5px;">此外，不同選區的投票結果也大不相同。在直布羅陀，公投結果以1萬9322票對823票壓倒性支持留歐，而桑德蘭（Sunderland）的13萬多投票者中，61%的人支持脱歐。民調公司YouGov通過在網上調查5000名投票者得出數據顯示，支持留在歐盟的意見略佔上風，達52%，支持脱歐的投票者佔48%。另一家民調公司Ipsos Mori的調查也顯示，支持留歐者佔54%，支持脱歐佔46%。</p>',
                    'image'            => 'news-posts/February2017/s9HK8a8WMzKwmCKG2x1c.jpg',
                    'meta_description' => '台灣時間2016年6月24日下午一點，全球矚目的英國脫歐公投的結果出爐，「脫歐派」以52%的得票率，勝過48%的「留歐派」，英國民意已正式向世界宣告將與歐盟分手。一對曾經相愛的情侶如何走向分歧之路？在「再見歐盟」的宣告之後，英國又將何去何從？請看關鍵評論網為你準備的第一手精選分析。',
                    'meta_keywords'    => '英國,脫歐,公投',
                    'status'           => 'PUBLISHED',
                    'active'           => 1,
                    'created_at'       => $input_time,
                    'updated_at'       => $input_time,
                ])->save();
            }

            $input_time = $now->addHour(); //for first record of next loop

        } //for loop

            // $id++;
            // $input_time = $now->addHour(); //one record per hour
            // $dataType = NewsPost::firstOrNew([
                // 'id'     => $id,
                // 'author' => '',
                // 'title'  => '',
            // ]);
            // if (!$dataType->exists) {
                // $dataType->fill([
                    // 'author_id'        => 1,
                    // 'news_category_id' => 1,
                    // 'seo_title'        => '',
                    // 'excerpt'          => '',
                    // 'body'             => '',
                    // 'image'            => '',
                    // 'meta_description' => '',
                    // 'meta_keywords'    => '',
                    // 'status'           => 'PUBLISHED',
                    // 'active'           => 1,
                    // 'created_at'       => $input_time,
                    // 'updated_at'       => $input_time,
                // ])->save();
            // }
    }
}
