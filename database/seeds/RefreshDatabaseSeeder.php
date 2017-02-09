<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Commands\InstallCommand;

class RefreshDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // VoyagerDatabaseSeeder >>>>
        $this->call(DataTypesTableSeeder::class);
        $this->call(DataRowsTableSeeder::class);
        $this->call(MenusTableSeeder::class);

        // $this->call(MenuItemsTableSeeder::class);
        Voyager::routes();
        $cmd = new InstallCommand();
        $cmd->seed('MenuItemsTableSeeder');

        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);
        // VoyagerDatabaseSeeder <<<<

        // VoyagerDummyDatabaseSeeder >>>>
        // $this->call(CategoriesTableSeeder::class);
        // $this->call(UsersTableSeeder::class);
        // $this->call(PostsTableSeeder::class);
        // $this->call(PagesTableSeeder::class);
        // $this->call(SettingsTableSeeder::class);
        $cmd->seed('VoyagerDummyDatabaseSeeder');
        // VoyagerDummyDatabaseSeeder <<<<

        //NewDatabaseSeeder
        $this->call(NewDatabaseSeeder::class);
    }
}
