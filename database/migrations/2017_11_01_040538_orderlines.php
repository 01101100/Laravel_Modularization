<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Orderlines extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderlines', function(Blueprint $table){
            $table->increments('orderline_id');
            $table->integer('order_id')->unsigned();
            $table->integer('prod_id')->unsigned();
            $table->smallInteger('quantity');

            $table->foreign('order_id')->references('order_id')->on('orders');
            $table->foreign('prod_id')->references('prod_id')->on('products');
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
        //
    }
}
