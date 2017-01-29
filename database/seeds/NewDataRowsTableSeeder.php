<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;

class NewDataRowsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $indexMenusDataType = DataType::where('slug', 'index-menus')->firstOrFail();
        $menuItemsDataType = DataType::where('slug', 'menu-items')->firstOrFail();
        $indexCarouselsDataType = DataType::where('slug', 'index-carousels')->firstOrFail();
        $newsCategoriesDataType = DataType::where('slug', 'news-categories')->firstOrFail();
        $newsArticlesDataType = DataType::where('slug', 'news-articles')->firstOrFail();
        $newsPostsDataType = DataType::where('slug', 'news-articles')->firstOrFail();

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $indexMenusDataType->id,
            'field'        => 'id',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'PRI',
                'display_name' => 'ID',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => '',
            ])->save();
        }

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $indexMenusDataType->id,
            'field'        => 'parent_id',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Parent Id',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
            ])->save();
        }
        
        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $indexMenusDataType->id,
            'field'        => 'title',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Title',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
            ])->save();
        }

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $indexMenusDataType->id,
            'field'        => 'url',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Url',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
            ])->save();
        }

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $indexMenusDataType->id,
            'field'        => 'order',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Order',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
            ])->save();
        }

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $indexMenusDataType->id,
            'field'        => 'active',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'checkbox',
                'display_name' => 'Active',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
            ])->save();
        }

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $indexMenusDataType->id,
            'field'        => 'created_at',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => 'Created At',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 0,
                'delete'       => 1,
                'details'      => '',
            ])->save();
        }

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $indexMenusDataType->id,
            'field'        => 'updated_at',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => 'Updated At',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => '',
            ])->save();
        }

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $menuItemsDataType->id,
            'field'        => 'id',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'PRI',
                'display_name' => 'Id',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => '',
            ])->save();
        }

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $menuItemsDataType->id,
            'field'        => 'menu_id',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Menu Id',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
            ])->save();
        }

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $menuItemsDataType->id,
            'field'        => 'title',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Title',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
            ])->save();
        }

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $menuItemsDataType->id,
            'field'        => 'url',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Url',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
            ])->save();
        }

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $menuItemsDataType->id,
            'field'        => 'target',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Target',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
            ])->save();
        }
        
        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $menuItemsDataType->id,
            'field'        => 'icon_class',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Icon Class',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
            ])->save();
        }   
        
        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $menuItemsDataType->id,
            'field'        => 'color',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Color',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
            ])->save();
        }
        
        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $menuItemsDataType->id,
            'field'        => 'parent_id',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Parent Id',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
            ])->save();
        }
        
        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $menuItemsDataType->id,
            'field'        => 'order',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Order',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
            ])->save();
        }
        
        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $menuItemsDataType->id,
            'field'        => 'created_at',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => 'Created At',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 0,
                'delete'       => 0,
                'details'      => '',
            ])->save();
        }
        
        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $menuItemsDataType->id,
            'field'        => 'updated_at',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => 'Updated At',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => '',
            ])->save();
        }
        
        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $indexCarouselsDataType->id,
            'field'        => 'id',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'PRI',
                'display_name' => 'Id',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => '',
            ])->save();
        }

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $indexCarouselsDataType->id,
            'field'        => 'title',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Title',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
            ])->save();
        }

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $indexCarouselsDataType->id,
            'field'        => 'description',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Description',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
            ])->save();
        }

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $indexCarouselsDataType->id,
            'field'        => 'image',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'image',
                'display_name' => 'Image',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
            ])->save();
        }

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $indexCarouselsDataType->id,
            'field'        => 'url',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Url',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
            ])->save();
        }

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $indexCarouselsDataType->id,
            'field'        => 'order',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Order',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
            ])->save();
        }
        
        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $indexCarouselsDataType->id,
            'field'        => 'active',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'checkbox',
                'display_name' => 'Active',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
            ])->save();
        }
        
        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $indexCarouselsDataType->id,
            'field'        => 'created_at',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => 'Created At',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 0,
                'delete'       => 1,
                'details'      => '',
            ])->save();
        }       
        
        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $indexCarouselsDataType->id,
            'field'        => 'updated_at',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => 'Updated At',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => '',
            ])->save();
        }

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $newsCategoriesDataType->id,
            'field'        => 'id',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'PRI',
                'display_name' => 'Id',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => '',
            ])->save();
        }

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $newsCategoriesDataType->id,
            'field'        => 'str',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Str',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
            ])->save();
        }

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $newsCategoriesDataType->id,
            'field'        => 'title',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Title',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
            ])->save();
        }

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $newsCategoriesDataType->id,
            'field'        => 'label_class',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Label Class',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
            ])->save();
        }

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $newsCategoriesDataType->id,
            'field'        => 'color',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Color',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
            ])->save();
        }

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $newsCategoriesDataType->id,
            'field'        => 'created_at',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => 'Created At',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 0,
                'delete'       => 1,
                'details'      => '',
            ])->save();
        }

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $newsCategoriesDataType->id,
            'field'        => 'updated_at',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => 'Updated At',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => '',
            ])->save();
        }

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $newsArticlesDataType->id,
            'field'        => 'id',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'PRI',
                'display_name' => 'ID',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => '',
            ])->save();
        }

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $newsArticlesDataType->id,
            'field'        => 'author',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Author',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
            ])->save();
        }

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $newsArticlesDataType->id,
            'field'        => 'news_category_id',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'select_dropdown',
                'display_name' => 'News Category Id',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
            ])->save();
        }

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $newsArticlesDataType->id,
            'field'        => 'tag',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Tag',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
            ])->save();
        }

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $newsArticlesDataType->id,
            'field'        => 'title',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Title',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
            ])->save();
        }

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $newsArticlesDataType->id,
            'field'        => 'active',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'checkbox',
                'display_name' => 'Active',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
            ])->save();
        }

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $newsArticlesDataType->id,
            'field'        => 'created_at',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => 'Created At',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 0,
                'delete'       => 1,
                'details'      => '',
            ])->save();
        }

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $newsArticlesDataType->id,
            'field'        => 'updated_at',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => 'Updated At',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => '',
            ])->save();
        }

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $newsPostsDataType->id,
            'field'        => 'id',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'PRI',
                'display_name' => 'ID',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => '',
            ])->save();
        }

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $newsPostsDataType->id,
            'field'        => 'author_id',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Author Id',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
            ])->save();
        }

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $newsPostsDataType->id,
            'field'        => 'author',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Author',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
            ])->save();
        }

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $newsPostsDataType->id,
            'field'        => 'news_category_id',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'select_dropdown',
                'display_name' => 'News Category Id',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
            ])->save();
        }

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $newsPostsDataType->id,
            'field'        => 'tag',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Tag',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
            ])->save();
        }

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $newsPostsDataType->id,
            'field'        => 'title',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Title',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
            ])->save();
        }

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $newsPostsDataType->id,
            'field'        => 'seo_title',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Seo Title',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
            ])->save();
        }

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $newsPostsDataType->id,
            'field'        => 'excerpt',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text_area',
                'display_name' => 'Excerpt',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
            ])->save();
        }

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $newsPostsDataType->id,
            'field'        => 'body',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'rich_text_box',
                'display_name' => 'Body',
                'required'     => 1,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
            ])->save();
        }

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $newsPostsDataType->id,
            'field'        => 'image',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'image',
                'display_name' => 'Image',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '{
"resize": {
"width": "1000",
"height": "null"
},
"quality": "70%",
"upsize": true,
"thumbnails": [
{
"name": "medium",
"scale": "50%"
},
{
"name": "small",
"scale": "25%"
},
{
"name": "cropped",
"crop": {
"width": "300",
"height": "250"
}
}
]
}',
            ])->save();
        }

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $newsPostsDataType->id,
            'field'        => 'slug',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Slug',
                'required'     => 1,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
            ])->save();
        }

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $newsPostsDataType->id,
            'field'        => 'meta_description',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text_area',
                'display_name' => 'Meta Description',
                'required'     => 1,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
            ])->save();
        }

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $newsPostsDataType->id,
            'field'        => 'meta_keywords',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text_area',
                'display_name' => 'Meta Keywords',
                'required'     => 1,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
            ])->save();
        }

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $newsPostsDataType->id,
            'field'        => 'status',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'select_dropdown',
                'display_name' => 'Status',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '{
"default": "DRAFT",
"options": {
"PUBLISHED": "published",
"DRAFT": "draft",
"PENDING": "pending"
}
}',
            ])->save();
        }

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $newsPostsDataType->id,
            'field'        => 'active',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'checkbox',
                'display_name' => 'Active',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
            ])->save();
        }

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $newsPostsDataType->id,
            'field'        => 'featured',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'checkbox',
                'display_name' => 'Featured',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
            ])->save();
        }

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $newsPostsDataType->id,
            'field'        => 'created_at',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => 'Created At',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 0,
                'delete'       => 1,
                'details'      => '',
            ])->save();
        }

        $dataRow = DataRow::firstOrNew([
            'data_type_id' => $newsPostsDataType->id,
            'field'        => 'updated_at',
        ]);
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => 'Updated At',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => '',
            ])->save();
        }
    }
}
