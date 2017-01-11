<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;

class NewDataTypesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $dataType = DataType::firstOrNew([
            'slug'                  => 'index-menus',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'index_menus',
                'display_name_singular' => 'Index Menu',
                'display_name_plural'   => 'Index Menus',
                'icon'                  => 'voyager-params',
                'model_name'            => '\\App\\IndexMenu',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

        $dataType = DataType::firstOrNew([
            'slug'                  => 'menu-items',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'menu_items',
                'display_name_singular' => 'Menu Item',
                'display_name_plural'   => 'Menu Items',
                'icon'                  => 'voyager-leaf',
                'model_name'            => 'TCG\\Voyager\\Models\\MenuItem',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

        $dataType = DataType::firstOrNew([
            'slug'                  => 'index-carousels',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'index_carousels',
                'display_name_singular' => 'Index Carousel',
                'display_name_plural'   => 'Index Carousels',
                'icon'                  => 'voyager-photo',
                'model_name'            => '\\App\\IndexCarousel',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

    }
}
