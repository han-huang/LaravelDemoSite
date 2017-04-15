<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyParentIdToNullableInTableIndexMenus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('index_menus', function (Blueprint $table) {
            // http://stackoverflow.com/questions/838354/mysql-removing-some-foreign-keys
            // ALTER TABLE your_table_with_fk
              // drop FOREIGN KEY name_of_your_fk_from_show_create_table_command_result,
              // drop KEY the_same_name_as_above
            DB::statement('ALTER TABLE `index_menus`
                           drop FOREIGN KEY `index_menus_parent_id_foreign`,
                           drop KEY `index_menus_parent_id_foreign`');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('index_menus', function (Blueprint $table) {
            $table->foreign('parent_id')->references('id')->on('index_menus')->onUpdate('cascade')->onDelete('set null');
        });
    }
}
