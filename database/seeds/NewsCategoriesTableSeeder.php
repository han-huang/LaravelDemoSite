<?php

use Illuminate\Database\Seeder;
use App\NewsCategory;

class NewsCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataType = NewsCategory::firstOrNew([
            'str' => 'sports',
            'title'   => '體育',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'label_class' => 'label-defaul',
                'color'     => '#777',
            ])->save();
        }
        
        $dataType = NewsCategory::firstOrNew([
            'str' => 'life',
            'title'   => '生活',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'label_class' => 'label-primary',
                'color'     => '#337ab7',
            ])->save();
        }

        $dataType = NewsCategory::firstOrNew([
            'str' => 'social',
            'title'   => '社會',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'label_class' => 'label-success',
                'color'     => '#5cb85c',
            ])->save();
        }

        $dataType = NewsCategory::firstOrNew([
            'str' => 'regional',
            'title'   => '地方',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'label_class' => 'label-lightcoral',
                'color'     => '#F08080',
            ])->save();
        }

        $dataType = NewsCategory::firstOrNew([
            'str' => 'entertainment',
            'title'   => '娛樂',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'label_class' => 'label-info',
                'color'     => '#5bc0de',
            ])->save();
        }

        $dataType = NewsCategory::firstOrNew([
            'str' => 'international',
            'title'   => '國際',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'label_class' => 'label-warning',
                'color'     => '#f0ad4e',
            ])->save();
        }

        $dataType = NewsCategory::firstOrNew([
            'str' => 'fin_econ',
            'title'   => '財經',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'label_class' => 'label-danger',
                'color'     => '#777',
            ])->save();
        }

        $dataType = NewsCategory::firstOrNew([
            'str' => 'politics',
            'title'   => '政治',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'label_class' => 'label-green',
                'color'     => '#008000',
            ])->save();
        }

        $dataType = NewsCategory::firstOrNew([
            'str' => 'tech',
            'title'   => '科技',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'label_class' => 'label-orange',
                'color'     => '#ffa500',
            ])->save();
        }

        $dataType = NewsCategory::firstOrNew([
            'str' => 'health',
            'title'   => '健康',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'label_class' => 'label-cyan',
                'color'     => '#00ffff',
            ])->save();
        }

        $dataType = NewsCategory::firstOrNew([
            'str' => 'fashion',
            'title'   => '時尚',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'label_class' => 'label-darkviolet',
                'color'     => '#9400D3',
            ])->save();
        }

        $dataType = NewsCategory::firstOrNew([
            'str' => 'culture',
            'title'   => '文化',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'label_class' => 'label-cadetblue',
                'color'     => '#5F9EA0',
            ])->save();
        }

        $dataType = NewsCategory::firstOrNew([
            'str' => 'people',
            'title'   => '人物',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'label_class' => 'label-darkolivegreen',
                'color'     => '#556B2F',
            ])->save();
        }

        $dataType = NewsCategory::firstOrNew([
            'str' => 'columns',
            'title'   => '專欄',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'label_class' => 'label-greenyellow',
                'color'     => '#ADFF2F',
            ])->save();
        }
    }
}
