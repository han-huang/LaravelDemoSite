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
        $num = 16; //no-repeat records
        $id = 0;
        $round = 48;
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
                    'body'             => '<figure class="image"><img title="馬刺今天擊敗七六人，讓七六人苦吞五連敗。" src="/storage/news-posts/February2017/Df2RcQoYN7cHj65FCLQE.jpg" alt="" />
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
