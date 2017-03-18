<?php

use Illuminate\Database\Seeder;
use App\BookTranslator;

class BookTranslatorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataType = BookTranslator::firstOrNew([
            'name' => '葉咨佑',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'information' => '政治大學英語系、企管系雙主修畢業，曾任出版社編輯。',
            ])->save();
        }

        $dataType = BookTranslator::firstOrNew([
            'name' => '陸大鵬',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'information' => '南京大學英美文學碩士，精通英、德、法三種外語，熱中西方文學和歷史。',
            ])->save();
        }

        $dataType = BookTranslator::firstOrNew([
            'name' => '張騁',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'information' => '中國傳媒大學德語系畢業，精通德語、英語，現為出版社編輯。',
            ])->save();
        }

        $dataType = BookTranslator::firstOrNew([
            'name' => '黃涓芳',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'information' => '畢業於台灣大學外文系及語言所，曾任創意編輯、英語研究員等職。目前從事英日文自由譯者。',
            ])->save();
        }

        $dataType = BookTranslator::firstOrNew([
            'name' => '段宗忱',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'information' => '巴黎美國大學比較文學／企業傳播系畢業，加州柏克萊大學資訊管理與系統碩士。熱愛文學、旅行與舞蹈，現為美國Red Lotus舞團舞者，資深翻譯工作者，目前任職於矽谷高科技公司。\r\n\r\n譯作：「地海」六部曲之《地海孤雛》、《地海故事集》、《地海奇風》、「迷霧之子」系列、「颶光典籍」系列《王者之路》及《燦軍箴言》、《皇帝魂》、《北方大道》。\r\n\r\n審訂：《諸神之城：伊嵐翠》',
            ])->save();
        }

        $dataType = BookTranslator::firstOrNew([
            'name' => '蔡孟汝',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'information' => '東吳大學日文系畢業，曾於京都同志社大學交換留學一年。\r\n\r\n因意外而開始接觸日語，也因意外而展開翻譯生涯，現為專職翻譯之小菜鳥一枚。\r\n\r\n興趣五花八門，認為生活也是旅行的一部分。',
            ])->save();
        }

        $dataType = BookTranslator::firstOrNew([
            'name' => '林書嫻',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'information' => '臺灣大學城鄉所、早稻田大學創造理工學研究科建築專攻碩士。專長為都市計畫與社區營造，研究所時期因緣際會下開始翻譯工作，就此一隻腳踏入譯界，兼職口、筆譯，涉獵範圍以藝術、建築、都市計畫為主。興趣為在陌生城市漫步及品嚐美食。',
            ])->save();
        }

        $dataType = BookTranslator::firstOrNew([
            'name' => '廖月娟',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'information' => '1966年生，美國西雅圖華盛頓大學比較文學碩士。曾獲誠品好讀報告2006年度最佳翻譯人、2007年金鼎獎最佳翻譯人獎、2008年吳大猷科普翻譯銀籤獎。譯作繁多，包括《釣愚》、《旁觀者：管理大師杜拉克回憶錄》、《賈伯斯傳》、《成為賈伯斯》、《你要如何衡量你的人生？》、《文明的代價》、《凝視死亡》、《我的焦慮歲月》等數十冊。',
            ])->save();
        }

        $dataType = BookTranslator::firstOrNew([
            'name' => '李芳齡',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'information' => '譯作超過百本，包括近期作品《TED TALKS說話的力量》、《每天最重要的2小時》、《勝利，並非事事順利》、《平台經濟模式》、《被科技威脅的未來》、《八角哲學》、《Google模式》等。',
            ])->save();
        }

        $dataType = BookTranslator::firstOrNew([
            'name' => '王蘊潔',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'information' => '在翻譯領域打滾十幾年，曾經譯介山崎豐子、小川洋子、白石一文等多位文壇重量級作家的著作，用心對待經手的每一部作品。譯有《不毛地帶》、《博士熱愛的算式》、《洗錢》等，翻譯的文學作品數量已超越體重。\r\n臉書交流頁：綿羊的譯心譯意\r\nhttps://www.facebook.com/sheepheart',
            ])->save();
        }

        $dataType = BookTranslator::firstOrNew([
            'name' => '李玉蘭',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'information' => '台大外文系，現為自由譯者。對世界充滿好奇心，喜愛大自然、文學藝術和自助旅行。翻譯作品：《聖骨拼圖》、《黑色密令》、《猶大病毒》、《最終神論》、《不安的靈魂》、《靈感來了：50部經典文學的幕後故事》、《巫行者1～3》、《長夜盡頭(01)：擴散》等作品。',
            ])->save();
        }

        $dataType = BookTranslator::firstOrNew([
            'name' => '李鐳',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'information' => '北京人，一九七八年生，畢業於北京大學化學系。撰寫並出版小說《復秦記》。至今為止出版的翻譯作品已有千餘萬字。代表譯作：「時光之輪」系列、《魔戒武器聖戰》、《幻想生物事典》、「血歌」系列、「審判者傳奇」系列《熾焰》及《禍星》等。\r\n\r\n翻譯遊戲「魔法門：英雄無敵4」等，主持大陸版「戰錘Online」的翻譯工作。\r\n\r\n聯絡信箱：l_i_l_ei@hotmail.com',
            ])->save();
        }

        $dataType = BookTranslator::firstOrNew([
            'name' => '周翰廷',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'information' => '國立暨南國際大學資訊管理系畢。曾在溫哥華太陽報與紐約時報等海外報社負責中文版編譯、翻譯事務多年，後參與《Fallout 4》、《DOOM》等遊戲翻譯。',
            ])->save();
        }

        $dataType = BookTranslator::firstOrNew([
            'name' => '陳錦慧',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'information' => '加拿大Simon Fraser University教育碩士。曾任平面媒體記者十餘年，現為自由譯者。譯作：《山之魔》、《骨時鐘》、《製造音樂》等二十餘冊。\r\n\r\n賜教信箱：c.jinhui@hotmail.com',
            ])->save();
        }

        $dataType = BookTranslator::firstOrNew([
            'name' => '聞若婷',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'information' => '師大國文系畢業，曾任職出版社編輯，現為自由譯者。',
            ])->save();
        }

        // $dataType = BookTranslator::firstOrNew([
            // 'name' => '',
        // ]);
        // if (!$dataType->exists) {
            // $dataType->fill([
                // 'information' => '',
            // ])->save();
        // }
    }
}
