<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->integer('user_id')->unsigned();
            $table->integer('status_id')->unsigned();
            $table->integer('shipping_address_id')->unsigned()->nullable()->default(null)->comment('code pegiry');
            $table->string('shipping_no', 50)->nullable()->default(null)->comment('shomare peigiry');
            $table->mediumText('comment')->nullable()->default(null);
            $table->string('invoice_no', 50)->nullable()->default(null)->comment('number of factor');
            $table->dateTime('invoice_date')->nullable()->default(null);
            $table->dateTime('delivery_date')->nullable()->default(null);
            $table->decimal('total_discount', 13,2)->nullable()->default(null);
            $table->decimal('total_shipping', 13,2)->nullable()->default(null)->comment('price of post');
            $table->decimal('total',13,2)->nullable()->default(null)->comment('total price');

            $table->foreign('status_id')
                ->references('id')->on('order_statuses')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

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
