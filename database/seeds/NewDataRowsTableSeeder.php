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
                'add'          => 1,
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

        
    }
}
