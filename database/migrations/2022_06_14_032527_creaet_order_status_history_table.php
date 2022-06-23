<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreaetOrderStatusHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_status_history', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->integer('status_id')->unsigned();

            $table->foreign('status_id')
                ->references('id')->on('order_statuses')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('order_id')
                ->references('id')->on('orders')
                ->onDelete('no action')
                ->onUpdate('no action');

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
