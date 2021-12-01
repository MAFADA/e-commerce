<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProductIdToOrderDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_detail', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->after('id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->unsignedBigInteger('order_id')->after('product_id');
            $table->foreign('order_id')->references('id')->on('orders');
            $table->integer('total_product')->after('order_id');
            $table->integer('total_price_product')->after('total_product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_detail', function (Blueprint $table) {
            $table->dropColumn('product_id');
            $table->dropColumn('order_id');
            $table->dropColumn('total_product');
            $table->dropColumn('total_price_product');
        });
    }
}
