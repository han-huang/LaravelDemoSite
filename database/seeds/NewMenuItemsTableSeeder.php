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

        $menuItem = MenuItem::firstOrNew([
            'menu_id'    => $menu->id,
            'title'      => 'News Categories',
            'url'        => '/admin/news-categories',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-categories',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 15,
            ])->save();
        }

        // $menuItem = MenuItem::firstOrNew([
            // 'menu_id'    => $menu->id,
            // 'title'      => 'News Articles',
            // 'url'        => '/admin/news-articles',
        // ]);
        // if (!$menuItem->exists) {
            // $menuItem->fill([
                // 'target'     => '_self',
                // 'icon_class' => 'voyager-world',
                // 'color'      => null,
                // 'parent_id'  => null,
                // 'order'      => 16,
            // ])->save();
        // }

        $menuItem = MenuItem::firstOrNew([
            'menu_id'    => $menu->id,
            'title'      => 'News Posts',
            'url'        => '/admin/news-posts',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-hammer',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 17,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id'    => $menu->id,
            'title'      => 'BookAuthors',
            'url'        => '/admin/bookauthors',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-person',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 18,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id'    => $menu->id,
            'title'      => 'BookTranslators',
            'url'        => '/admin/booktranslators',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-person',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 19,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id'    => $menu->id,
            'title'      => 'Books',
            'url'        => '/admin/books',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-book',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 20,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id'    => $menu->id,
            'title'      => 'Orders',
            'url'        => '/admin/orders',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-basket',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 21,
            ])->save();
        }
    }
}
