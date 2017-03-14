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
    }
}
