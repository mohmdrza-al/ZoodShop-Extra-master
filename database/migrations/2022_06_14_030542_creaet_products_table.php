<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreaetProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable()->default(null);
            $table->longText('description')->nullable()->default(null);
            $table->decimal('price', 13,2)->nullable()->default(null);
            $table->decimal('discount_price', 13,2)->nullable()->default(null);
            $table->string('sku', 100)->unique();
            $table->json('picture');
            $table->integer('stock')->nullable()->default('0');
            $table->tinyInteger('active')->default('0');
            $table->Timestamps();

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
