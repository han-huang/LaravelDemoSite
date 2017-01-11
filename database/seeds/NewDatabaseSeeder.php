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
    }
}
