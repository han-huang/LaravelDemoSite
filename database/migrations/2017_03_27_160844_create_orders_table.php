<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('client_id');
            $table->unsignedInteger('receiver_id');
            $table->string('deliver');
            $table->string('payment_methond');
            $table->unsignedInteger('company_tax_id')->nullable()->default(0);
            $table->string('invoice_type')->nullable();
            $table->string('invoice_number')->nullable();
            $table->unsignedInteger('amount');
            $table->string('status')->nullable();
            $table->text('details')->nullable();
            $table->timestamps();
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('receiver_id')->references('id')->on('receivers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
