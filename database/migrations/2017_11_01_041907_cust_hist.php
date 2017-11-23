<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CustHist extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cust_hist', function(Blueprint $table){
            $table->integer('customer_id')->unsigned();
            $table->integer('order_id')->unsigned();
            $table->integer('prod_id')->unsigned();

            $table->foreign('customer_id')->references('customer_id')->on('customers');
            $table->foreign('order_id')->references('order_id')->on('orders');
            $table->foreign('prod_id')->references('prod_id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cust_hist');
    }
}
