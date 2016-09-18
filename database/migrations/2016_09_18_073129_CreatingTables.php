<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatingTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('code');
            $table->float('amount');
            $table->timestamps();
        });
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('food_id');
            $table->integer('amount');
            $table->float('total');
            $table->timestamps();
        });
        Schema::create('food', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->float('price');
            $table->timestamps();
        });
        Schema::create('user_payment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id', false, true);
            $table->integer('payment_id', false, true);
            $table->timestamps();
        });
        Schema::table('user_payment', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('payment_id')->references('id')->on('payments')->onDelete('cascade');
        });
        Schema::create('user_order', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id', false, true);
            $table->integer('order_id', false, true);
            $table->timestamps();
        });
        Schema::table('user_order', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('payments');
        Schema::drop('orders');
        Schema::drop('food');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
