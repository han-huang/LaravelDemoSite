<?php

use Illuminate\Database\Seeder;
use App\IndexCarousel;

class IndexCarouselsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $dataType = IndexCarousel::firstOrNew([
            'title' => '書店',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'description' => '輕鬆打造質感生活，提供齊全中外文書籍',
                'image'       => 'index-carousels/January2017/5o7nTc5dBtOGTGWy1JE9.jpg',
                'url'         => '/bookstore',
                'order'       => 1,
                'active'      => 1,
            ])->save();
        }

        $dataType = IndexCarousel::firstOrNew([
            'title' => '新聞',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'description' => '頭條新聞及即時新聞，讓你隨時隨地掌握最新消息和熱門話題',
                'image'       => 'index-carousels/January2017/ztP8tEkdJeaOtiBhMh18.jpg',
                'url'         => '/news',
                'order'       => 2,
                'active'      => 1,
            ])->save();
        }
        
        $dataType = IndexCarousel::firstOrNew([
            'title' => '運動',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'description' => '所有體育賽事相關報導',
                'image'       => 'index-carousels/January2017/x0boUEd8Om1PSSzeGpHo.jpg',
                'url'         => '/sport',
                'order'       => 3,
                'active'      => 1,
            ])->save();
        }
        
        $dataType = IndexCarousel::firstOrNew([
            'title' => '電影',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'description' => '電影介紹,電影時刻表,電影預告,最新電影',
                'image'       => 'index-carousels/January2017/HHk1ReHXaMe9RYEwgjDw.jpg',
                'url'         => '/movie',
                'order'       => 4,
                'active'      => 1,
            ])->save();
        }
        
        $dataType = IndexCarousel::firstOrNew([
            'title' => '音樂',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'description' => '所有音樂類型的相關資訊',
                'image'       => 'index-carousels/January2017/eH0jY1dQ3lEyoh6Xq3hD.jpg',
                'url'         => '/music',
                'order'       => 5,
                'active'      => 1,
            ])->save();
        }
    }
    
}