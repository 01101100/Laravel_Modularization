<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeOrderCustomerNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->float('net_amount')->nullable()->change();
            $table->float('tax')->nullable()->change();
        });

        Schema::table('customers', function (Blueprint $table) {
            $table->string('address')->nullable()->change();
            $table->integer('zip')->nullable()->change();
            $table->string('country')->nullable()->change();
            $table->string('phone')->nullable()->change();
            $table->string('credit_card')->nullable()->change();
            $table->string('credit_card_expiration')->nullable()->change();
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
            $table->float('net_amount')->nullable(false)->change();
            $table->float('tax')->nullable(false)->change();
        });

        Schema::table('customers', function (Blueprint $table) {
            $table->string('address')->nullable(false)->change();
            $table->integer('zip')->nullable(false)->change();
            $table->string('country')->nullable(false)->change();
            $table->string('phone')->nullable(false)->change();
            $table->string('credit_card')->nullable(false)->change();
            $table->string('credit_card_expiration')->nullable(false)->change();
        });
    }
}
