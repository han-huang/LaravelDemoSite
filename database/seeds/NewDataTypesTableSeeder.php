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
                'server_side'           => 1,
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

        $dataType = DataType::firstOrNew([
            'slug'                  => 'news-categories',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'news_categories',
                'display_name_singular' => 'News Category',
                'display_name_plural'   => 'News Categories',
                'icon'                  => 'voyager-categories',
                'model_name'            => '\\App\\NewsCategory',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

        $dataType = DataType::firstOrNew([
            'slug'                  => 'news-articles',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'news_articles',
                'display_name_singular' => 'News Article',
                'display_name_plural'   => 'News Articles',
                'icon'                  => 'voyager-world',
                'model_name'            => '\\App\\NewsArticle',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

        $dataType = DataType::firstOrNew([
            'slug'                  => 'news-posts',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'news_posts',
                'display_name_singular' => 'News Post',
                'display_name_plural'   => 'News Posts',
                'icon'                  => 'voyager-hammer',
                'model_name'            => '\\App\\NewsPost',
                'generate_permissions'  => 1,
                'server_side'           => 1,
                'description'           => '',
            ])->save();
        }

        $dataType = DataType::firstOrNew([
            'slug'                  => 'bookauthors',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'bookauthors',
                'display_name_singular' => 'BookAuthor',
                'display_name_plural'   => 'BookAuthors',
                'icon'                  => 'voyager-person',
                'model_name'            => '\\App\\BookAuthor',
                'generate_permissions'  => 1,
                'server_side'           => 1,
                'description'           => '',
            ])->save();
        }

        $dataType = DataType::firstOrNew([
            'slug'                  => 'booktranslators',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'booktranslators',
                'display_name_singular' => 'BookTranslator',
                'display_name_plural'   => 'BookTranslators',
                'icon'                  => 'voyager-person',
                'model_name'            => '\\App\\BookTranslator',
                'generate_permissions'  => 1,
                'server_side'           => 1,
                'description'           => '',
            ])->save();
        }

        $dataType = DataType::firstOrNew([
            'slug'                  => 'books',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'books',
                'display_name_singular' => 'Book',
                'display_name_plural'   => 'Books',
                'icon'                  => 'voyager-book',
                'model_name'            => '\\App\\Book',
                'generate_permissions'  => 1,
                'server_side'           => 1,
                'description'           => '',
            ])->save();
        }
    }
}
