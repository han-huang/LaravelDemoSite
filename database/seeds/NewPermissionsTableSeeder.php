<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Permission;

class NewPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::generateFor('index_menus');
        Permission::generateFor('menu_items');
        Permission::generateFor('index_carousels');
        Permission::generateFor('news_categories');
        // Permission::generateFor('news_articles');
        Permission::generateFor('news_posts');
        Permission::generateFor('bookauthors');
        Permission::generateFor('booktranslators');
        Permission::generateFor('books');
        Permission::generateFor('orders');
    }
}
