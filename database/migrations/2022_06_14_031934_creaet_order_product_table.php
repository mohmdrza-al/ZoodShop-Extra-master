<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreaetOrderProductTable extends Migration
{
    /**
     * Run the migrations.
     * @table order_product
     *
     * @return void
     */
    public function up()
    {

        Schema::create('order_product', function (Blueprint $table) {
            $table->integer('product_id')->unsigned();
            $table->integer('order_id')->unsigned();
            $table->string('name', 255)->nullable()->default(null);
            $table->string('sku', 100)->comment('barcode');
            $table->decimal('price', 13,2)->nullable()->default(null);
            $table->integer('quantity');
            $table->tinyInteger('status')->default(1)->comment('1=>enable , 0=>disable');

            $table->foreign('order_id')
                ->references('id')->on('orders')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('product_id')
                ->references('id')->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
