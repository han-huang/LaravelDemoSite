<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;

class NewMenuItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// update column "order" from old data
		$menuItem = MenuItem::findOrFail(2);
		$menuItem->order = 4;
		$menuItem->save();
		
		$menuItem = MenuItem::findOrFail(3);
		$menuItem->order = 5;
		$menuItem->save();
		
		$menuItem = MenuItem::findOrFail(6);
		$menuItem->order = 6;
		$menuItem->save();
		
		$menuItem = MenuItem::findOrFail(5);
		$menuItem->order = 7;
		$menuItem->save();
		
		$menuItem = MenuItem::findOrFail(8);
		$menuItem->order = 8;
		$menuItem->save();
		
		$menuItem = MenuItem::findOrFail(9);
		$menuItem->order = 9;
		$menuItem->save();
		
		$menuItem = MenuItem::findOrFail(10);
		$menuItem->order = 10;
		$menuItem->save();
		
		$menuItem = MenuItem::findOrFail(11);
		$menuItem->order = 11;
		$menuItem->save();

		// new data
        $menu = Menu::where('name', 'admin')->firstOrFail();

        $menuItem = MenuItem::firstOrNew([
            'menu_id'    => $menu->id,
            'title'      => 'Menu Items',
            'url'        => '/admin/menu-items',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-leaf',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 12,
            ])->save();
        }       

        $menuItem = MenuItem::firstOrNew([
            'menu_id'    => $menu->id,
            'title'      => 'Index Menus',
            'url'        => '/admin/index-menus',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-params',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 13,
            ])->save();
        }
        
        $menuItem = MenuItem::firstOrNew([
            'menu_id'    => $menu->id,
            'title'      => 'Index Carousels',
            'url'        => '/admin/index-carousels',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-photo',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 14,
            ])->save();
        }
    }
}
