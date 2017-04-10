<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddActiveAndChangeStatusToEnum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->boolean('active')->default(1)->after('details');
            // not currently supported https://laravel.com/docs/5.3/migrations
            // $table->enum('status', [
                        // 'pending',
                        // 'processing',
                        // 'shipped',
                        // 'returned',
                        // 'canceled'
                    // ])->default('pending')->change();
            DB::statement("ALTER TABLE `orders` CHANGE `status` `status` 
                           ENUM('pending', 'processing', 'shipped', 'returned', 'canceled') 
                           NOT NULL DEFAULT 'pending';");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('active');
            // $table->string('status')->nullable()->change();
            DB::statement("ALTER TABLE `orders` CHANGE `status` `status` varchar(255) NULL DEFAULT NULL;");
        });
    }
}
