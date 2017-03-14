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
    }
}
