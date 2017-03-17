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
    }
}
