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
            $table->integer('user_id');
            $table->string('full_name');
            $table->string('address');
            $table->string('city');
            $table->integer('phone');
            $table->integer('zip');
            $table->integer('qty');
            $table->integer('tax');
            $table->integer('subtotal');
            $table->integer('total');
            $table->boolean('status');
            $table->string('title');
            $table->string('image');
            $table->string('size');
            $table->timestamps();
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
