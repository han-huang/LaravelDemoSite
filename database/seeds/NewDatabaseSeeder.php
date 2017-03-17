<?php

use Illuminate\Database\Seeder;

class NewDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(NewDataTypesTableSeeder::class);
        $this->call(NewMenuItemsTableSeeder::class);
        $this->call(NewPermissionsTableSeeder::class);
        $this->call(NewDataRowsTableSeeder::class);
        $this->call(NewPermissionRoleTableSeeder::class);
        $this->call(IndexMenusTableSeeder::class);
        $this->call(IndexCarouselsTableSeeder::class);
        $this->call(NewsCategoriesTableSeeder::class);
        $this->call(NewsPostsTableSeeder::class);
        $this->call(BookAuthorsTableSeeder::class);
        $this->call(BookTranslatorsTableSeeder::class);
        $this->call(BooksTableSeeder::class);
        $this->call(Book_BookAuthorTableSeeder::class);
        $this->call(Book_BookTranslatorTableSeeder::class);
    }
}
