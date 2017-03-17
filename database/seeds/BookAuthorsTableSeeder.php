<?php

use Illuminate\Database\Seeder;
use App\BookAuthor;

class BookAuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataType = BookAuthor::firstOrNew([
            'name' => '約瑟夫．尤金．史迪格里茲(Joseph Eugene Stiglitz)',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'information' => '二○○一年諾貝爾經濟學獎得主，美國哥倫比亞大學經濟學教授，哥倫比亞大學政策對話倡議組織（Initiative for Policy Dialogue）主席。\r\n在資訊經濟學上貢獻卓著，是新興凱因斯經濟學派的重要成員。目前亦擔任《紐約時報》與全球評論網站Project Syndicate 專欄作家。\r\n\r\n一九六七年於麻省理工學院取得博士學位，一九七○年以二十六歲之齡獲聘為耶魯大學經濟學教授。一九七九年獲得由美國經濟學會所頒發且素有小諾貝爾經濟學獎之稱的「約翰．貝茨．克拉克獎」（John Bates Clark Medal）。一九九三至九七年，擔任美國總統經濟顧問委員會成員及主席。一九九七至九九年，任世界銀行資深副行長兼首席經濟學家。二○一一至一四年，擔任國際經濟學協會主席。\r\n\r\n史迪格里茲在國際間擁有高度影響力，美國《新聞週刊》稱他是「對金融危機始終抱持正確主張的專家」，世界銀行首席經濟學家史登（Nicholas Stern）譽為「當代最重要的經濟學家」，英國《衛報》指出︰「我們需要更多像史迪格里茲這樣的經濟學家。」',
            ])->save();
        }

        $dataType = BookAuthor::firstOrNew([
            'name' => '羅傑．克勞利(Roger Crowley)',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'information' => '英國著名歷史學家，其父親是海軍軍官，曾駐防於地中海各地，故作者在年輕時就跟隨父親在地中海各處度過很長的歲月，因而對地中海世界的歷史文化產生濃厚興趣。\r\n\r\n作者在劍橋完成學業後，曾赴伊斯坦堡任教，花了很多時間考察該座城市，也曾徒步遊覽土耳其西部。上述經歷使得作者擁有淵博的地中海歷史與地理知識。',
            ])->save();
        }

        $dataType = BookAuthor::firstOrNew([
            'name' => '米澤穗信(Honobu YONEZAWA)',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'information' => '1978年出生於岐阜縣。男性。\r\n大學時代受到北村薰《六之宮公主》的啟發，決定走上推理作家一途。\r\n\r\n2001年，以《冰菓》獲得第五屆角川校園小說大獎「青春推理&恐怖部門」獎勵獎出道。2005年，長篇小說《再見，妖精》入選「這本推理小說了不起！」年度TOP 20，之後作品幾乎年年上榜。米澤穗信的前期創作以解開日常之謎的「青春推理」風格著稱，包括「古籍研究社（原文為『古典部』）系列」、「小市民系列」、私家偵探「S&R系列」等。其帶有輕小說元素的敘事魅力，揉合本格推理的解謎樂趣，細膩描繪青春期男女內心的動盪，深獲年輕世代的共鳴。\r\n\r\n近年寫作風格丕變，青春推理的氣息幾乎不復見，多部獨立於系列之外的作品充滿濃厚黑暗驚悚色彩，像是2006年的《瓶頸》、2007年的《算計》，後者的殺人遊戲重口味內容更於2010年改編登上大銀幕。米澤穗信可輕可重的雙重寫作風格，堪稱目前日本推理文壇備受矚目的新生代作家。',
            ])->save();
        }

    }
}
