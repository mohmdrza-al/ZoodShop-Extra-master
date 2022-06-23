<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100)->nullable()->default(null)->comment('address name');
            $table->integer('user_id')->unsigned();
            $table->integer('province_id')->unsigned();
            $table->string('address')->nullable()->default(null);
            $table->integer('city_id')->unsigned();
            $table->string('postal_code', 10)->nullable()->default(null);
            $table->string('phone', 50)->nullable()->default(null);
            $table->string('mobile_phone', 50)->nullable()->default(null);
            $table->mediumText('comment')->nullable()->default(null)->comment('details of address');

            $table->foreign('province_id')
                ->references('id')->on('province')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

           $table->foreign('city_id')
                ->references('id')->on('cities')
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
        Schema::dropIfExists('addresses');
    }
}





